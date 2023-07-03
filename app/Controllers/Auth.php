<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function register()
    {
        // Validasi input
        $validationRules = [
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
            'confirm_password' => 'required|matches[password]'
        ];

        if ($this->validate($validationRules)) {
            // Simpan data ke database
            $userModel = new UserModel();
            $userModel->save([
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
            ]);

            return redirect()->to('/')->with('success', 'Registration successful! You can now login.');
        } else {
            return view('register');
        }
    }

    public function login()
    {
        // Validasi input
        $validationRules = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];

        if ($this->validate($validationRules)) {
            $userModel = new UserModel();
            $user = $userModel->where('email', $this->request->getPost('email'))->first();

            if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
                // Set session user
                $session = session();
                $session->set('user', $user['id']);

                return redirect()->to('image');
            } else {
                return redirect()->back()->with('error', 'Invalid email or password.');
            }
        } else {
            return view('login');
        }
    }

    public function logout()
    {
        // Hapus session user
        $session = session();
        $session->remove('user');

        return redirect()->to('/');
    }
}
