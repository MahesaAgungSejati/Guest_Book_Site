<?php

namespace App\Controllers;

use App\Models\RoomModel;
use CodeIgniter\Controller;

class RoomController extends Controller
{
    // Menampilkan semua ruang acara
    public function index()
    {
        $roomModel = new RoomModel();
        $rooms = $roomModel->findAll();  // Mengambil semua data room
        return view('rooms_view', ['rooms' => $rooms]);  // Mengirim data ke view
    }

    // Menampilkan form untuk membuat ruangan baru
    public function create()
    {
        return view('create_room');  // Menampilkan form pembuatan room
    }

    // Menyimpan ruangan baru
    public function store()
    {
        $roomModel = new RoomModel();

        // Validasi input
        $validation = \Config\Services::validation();
        if (!$this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
            'location' => 'required|min_length[3]|max_length[255]',
            'capacity' => 'required|is_natural_no_zero'
        ])) {
            return redirect()->to('/room/create')->withInput()->with('errors', $validation->getErrors());
        }

        // Menyimpan data ruangan baru ke dalam tabel rooms
        $roomModel->save([
            'name' => $this->request->getVar('name'),
            'location' => $this->request->getVar('location'),
            'capacity' => $this->request->getVar('capacity')
        ]);

        return redirect()->to('/room');
    }

    // Menampilkan form untuk mengedit ruang yang sudah ada
    public function edit($id)
    {
        $roomModel = new RoomModel();
        $room = $roomModel->find($id);  // Mengambil data ruangan berdasarkan ID

        if (!$room) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Room with ID $id not found");
        }

        return view('edit_room', ['room' => $room]);
    }

    // Mengupdate data ruangan yang sudah ada
    public function update($id)
    {
        $roomModel = new RoomModel();

        // Validasi input
        $validation = \Config\Services::validation();
        if (!$this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
            'location' => 'required|min_length[3]|max_length[255]',
            'capacity' => 'required|is_natural_no_zero'
        ])) {
            return redirect()->to('/room/edit/' . $id)->withInput()->with('errors', $validation->getErrors());
        }

        // Mengupdate data ruangan
        $roomModel->update($id, [
            'name' => $this->request->getVar('name'),
            'location' => $this->request->getVar('location'),
            'capacity' => $this->request->getVar('capacity')
        ]);

        return redirect()->to('/room');
    }

    // Menghapus ruangan berdasarkan ID
    public function delete($id)
    {
        $roomModel = new RoomModel();
        $roomModel->delete($id);  // Menghapus data ruangan berdasarkan ID
        return redirect()->to('/room');
    }
}
