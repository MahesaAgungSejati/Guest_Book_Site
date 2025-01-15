<?php

namespace App\Controllers;

use App\Models\GuestModel;
use App\Models\EventModel; // Model untuk Event
use CodeIgniter\Controller;

class GuestController extends Controller
{
    // Menampilkan daftar seluruh tamu
    public function index()
    {
        $guestModel = new GuestModel();
        $eventModel = new EventModel();

        // Mendapatkan seluruh tamu beserta nama acara
        $guests = $guestModel->select('guests.*, events.name as event_name')
                             ->join('events', 'events.id = guests.event_id')
                             ->findAll();

        return view('guests_view', ['guests' => $guests]);
    }

    // Menampilkan form untuk menambah tamu baru
    public function create()
    {
        $eventModel = new EventModel();

        // Mendapatkan semua acara
        $events = $eventModel->findAll();

        // Mengirimkan data acara ke tampilan
        return view('create_guest', ['events' => $events]);
    }

    // Menyimpan tamu baru
    public function store()
    {
        $guestModel = new GuestModel();

        // Validasi input tamu
        $validation = \Config\Services::validation();
        if (!$this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email',
            'message' => 'permit_empty|max_length[500]',
            'event_id' => 'required|is_not_unique[events.id]' // Validasi event_id
        ])) {
            return redirect()->to('/guest/create')->withInput()->with('errors', $validation->getErrors());
        }

        // Menyimpan data tamu baru ke dalam tabel guests
        $guestModel->addGuest([
            'event_id' => $this->request->getVar('event_id'),
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'message' => $this->request->getVar('message')
        ]);

        return redirect()->to('/guest');  // Redirect kembali ke halaman daftar tamu
    }

    // Menampilkan form untuk mengedit tamu
    public function edit($id)
    {
        $guestModel = new GuestModel();
        $eventModel = new EventModel();

        // Mendapatkan data tamu berdasarkan id
        $guest = $guestModel->find($id);

        // Mendapatkan semua acara untuk dropdown
        $events = $eventModel->findAll();

        // Mengirimkan data tamu dan acara ke tampilan
        return view('edit_guest', ['guest' => $guest, 'events' => $events]);
    }

    // Menyimpan perubahan data tamu
    public function update($id)
    {
        $guestModel = new GuestModel();

        // Validasi input tamu
        if (!$this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email',
            'message' => 'permit_empty|max_length[500]',
            'event_id' => 'required|is_not_unique[events.id]' // Validasi event_id
        ])) {
            return redirect()->to("/guest/edit/$id")->withInput()->with('errors', \Config\Services::validation()->getErrors());
        }

        // Menyimpan perubahan data tamu
        $guestModel->update($id, [
            'event_id' => $this->request->getVar('event_id'),
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'message' => $this->request->getVar('message')
        ]);

        return redirect()->to('/guest');  // Redirect kembali ke halaman daftar tamu
    }

    // Menghapus tamu
    public function delete($id)
    {
        $guestModel = new GuestModel();

        // Menghapus tamu berdasarkan id
        $guestModel->delete($id);

        return redirect()->to('/guest');  // Redirect kembali ke halaman daftar tamu
    }
}
