<?php

namespace App\Controllers;

use App\Models\ImageModel;

class ImageController extends BaseController
{
    public function __construct()
    {
        $this->model = new ImageModel();
        $this->helpers = ['form', 'url'];
    }

    public function index()
    {
        $data = [
            'images' => $this->model->paginate(6),
            'pager' => $this->model->pager,
            'title' => 'Image Gallery'
        ];

        return view('images/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Upload new image'
        ];

        return view('images/create', $data);
    }
    public function store()
    {
        if ($this->request->getMethod() !== 'post') {
            return redirect('index');
        }

        $validationRule = [
            'image' => [
                'label' => 'Image File',
                'rules' => 'uploaded[image]'
                    . '|is_image[image]'
                    . '|mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[image,1000]'
                    . '|max_dims[image,4000,4000]',
            ],
        ];
        $validated = $this->validate($validationRule);

        if ($validated) {
            $caption = $this->request->getPost('caption');
            $image = $this->request->getFile('image');
            $filename = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads', $filename);

            $uploadedImage = [
                'caption' => $caption,
                'path' => $image->getName()
            ];

            $save = $this->model->save($uploadedImage);
            if ($save) {
                return redirect()->to(base_url('image'))
                    ->with('success', 'Gambar diunggah');
            } else {
                session()->setFlashdata('error', $this->model->errors());
                return redirect()->back();
            }
        }

        session()->setFlashdata('error', $this->validator->getErrors());
        return redirect()->back();
    }
    public function delete($id)
    {
        $image = $this->model->find($id);

        if (!$image) {
            return redirect()->back()->with('error', 'Gambar tidak ditemukan');
        }

        // Delete the image file from the uploads directory
        $imagePath = ROOTPATH . 'public/uploads/' . $image['path'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Delete the image record from the database
        $deleted = $this->model->delete($id);

        if ($deleted) {
            return redirect()->back()->with('success', 'Gambar berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus gambar');
        }
    }

    // ...
    public function show($id)
    {
        // Mendapatkan data gambar berdasarkan ID dari database
        $image = $this->model->find($id);

        if (!$image) {
            return redirect()->back()->with('error', 'Gambar tidak ditemukan');
        }

        // Menyiapkan data untuk ditampilkan di halaman detail
        $data = [
            'title' => 'Detail Image',
            'image' => $image
        ];

        return view('images/show', $data);
    }
}
