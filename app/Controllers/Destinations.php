<?php
//XII RPL B_09_Faiq Varian

namespace App\Controllers;

use App\Models\DestinationModel;

class Destinations extends BaseController
{
    protected $destinationModel;

    public function __construct()
    {
        $this->destinationModel = new DestinationModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Destination List | Traveland',
            'destination' => $this->destinationModel->getDestination()
        ];
        return view('destination/index', $data);
    }

    public function detail($slug)
    {
        $destination = $this->destinationModel->getDestination($slug);
        $data = [
            'title' => "$destination[city] | Traveland",
            'destination' => $destination
        ];

        if (empty($destination)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Destination ' . $slug . 'is not found.');
        }

        return view('destination/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add Destination | Traveland',
            'validation' => \Config\Services::validation()
        ];
        return view('destination/create', $data);
    }

    public function save()
    {
        //validasi input
        if (!$this->validate([
            'city' => 'required|is_unique[destination.city]',
            'price' => 'required',
            'details' => 'required',
            'img' => 'mime_in[img,image/jpg,image/jpeg,image/png]|is_image[img]'
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('destinations/create')->withInput()->with('validation', $validation);
            return redirect()->to('destinations/create')->withInput();
        }

        //ambil gambar
        $imgFile = $this->request->getFile('img');
        //default img
        if ($imgFile->getError() == 4) {
            $imgName = 'default.jpg';
        } else {
            //random name
            $imgName = $imgFile->getRandomName();
            //pindah gambar
            $imgFile->move('img/uploaded', $imgName);
        }

        $slug = url_title($this->request->getVar('city'), '-', true);
        $this->destinationModel->save([
            'city' => $this->request->getVar('city'),
            'price' => $this->request->getVar('price'),
            'details' => $this->request->getVar('details'),
            'img' => $imgName,
            'slug' => $slug
        ]);

        session()->setFlashdata('message', 'Data has been added');
        return redirect()->to('/destinations');
    }

    public function delete($id)
    {
        //cari based id
        $data = $this->destinationModel->find($id);

        //if img default
        if ($data['img'] != 'default.jpg') {
            //delete img
            unlink('img/uploaded/' . $data['img']);
        }

        $this->destinationModel->delete($id);
        session()->setFlashdata('message', 'Data has been deleted');
        return redirect()->to('/destinations');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Edit Destination Data | Traveland',
            'validation' => \Config\Services::validation(),
            'destinations' => $this->destinationModel->getDestination($slug)
        ];
        return view('destination/edit', $data);
    }

    public function update($id)
    {
        //validasi input
        if (!$this->validate([
            'city' => 'required|is_unique[destination.city,id,' . $id . ']',
            'price' => 'required',
            'details' => 'required',
            'img' => 'mime_in[img,image/jpg,image/jpeg,image/png]|is_image[img]'
        ])) {
            return redirect()->to('destinations/create')->withInput();
        }

        //ambil gambar
        $imgFile = $this->request->getFile('img');
        //check
        if ($imgFile->getError() == 4) {
            $imgName = $this->request->getVar('oldImg');
        } else {
            //random name
            $imgName = $imgFile->getRandomName();
            //pindah gambar
            $imgFile->move('img/uploaded', $imgName);
            if ($this->request->getVar('oldImg') != 'default.jpg') {
                //delete old file
                unlink('img/uploaded/' . $this->request->getVar('oldImg') . '');
            }
        }

        $slug = url_title($this->request->getVar('city'), '-', true);
        $this->destinationModel->save([
            'id' => $id,
            'city' => $this->request->getVar('city'),
            'price' => $this->request->getVar('price'),
            'details' => $this->request->getVar('details'),
            'img' => $imgName,
            'slug' => $slug
        ]);

        session()->setFlashdata('message', 'Data has been edited');
        return redirect()->to('/destinations');
    }
}
