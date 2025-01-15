<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\RoomModel;  // Model untuk Room
use CodeIgniter\Controller;

class EventController extends Controller
{
    // Menampilkan semua acara
    public function index()
    {
        $eventModel = new EventModel();
        $roomModel = new RoomModel();

        // Mengambil semua data acara
        $events = $eventModel->findAll();
        
        // Menambahkan nama ruangan untuk setiap acara
        foreach ($events as &$event) {
            $room = $roomModel->find($event['room_id']); // Ambil data ruangan berdasarkan room_id
            $event['room_name'] = $room ? $room['name'] : 'Tidak Ditemukan'; // Jika tidak ditemukan, tampilkan 'Tidak Ditemukan'
        }

        return view('events_view', ['events' => $events]);  // Mengirim data ke view
    }

    // Menampilkan form untuk membuat acara baru
    public function create()
    {
        $roomModel = new RoomModel();
        $rooms = $roomModel->findAll();  // Mengambil semua data ruangan
        return view('create_event', ['rooms' => $rooms]);  // Mengirim data ruangan ke view
    }

    // Menyimpan acara baru
    public function store()
    {
        $eventModel = new EventModel();

        // Validasi input
        $validation = \Config\Services::validation();
        if (!$this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
            'start_date' => 'required|valid_date',
            'end_date' => 'required|valid_date',
            'room_id' => 'required|is_natural_no_zero'
        ])) {
            return redirect()->to('/event/create')->withInput()->with('errors', $validation->getErrors());
        }

        // Menyimpan data acara baru ke dalam tabel events
        $eventModel->save([
            'name' => $this->request->getVar('name'),
            'start_date' => $this->request->getVar('start_date'),
            'end_date' => $this->request->getVar('end_date'),
            'room_id' => $this->request->getVar('room_id')
        ]);

        return redirect()->to('/event');
    }

    // Menampilkan form untuk mengedit acara
    public function edit($id)
    {
        $eventModel = new EventModel();
        $roomModel = new RoomModel();

        // Mengambil data acara berdasarkan ID
        $event = $eventModel->find($id);
        if (!$event) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Event dengan ID $id tidak ditemukan.");
        }

        // Mengambil semua data ruangan
        $rooms = $roomModel->findAll();

        return view('edit_event', ['event' => $event, 'rooms' => $rooms]);
    }

    // Menyimpan perubahan acara
    public function update($id)
    {
        $eventModel = new EventModel();

        // Validasi input
        $validation = \Config\Services::validation();
        if (!$this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
            'start_date' => 'required|valid_date',
            'end_date' => 'required|valid_date',
            'room_id' => 'required|is_natural_no_zero'
        ])) {
            return redirect()->to("/event/edit/$id")->withInput()->with('errors', $validation->getErrors());
        }

        // Mengupdate data acara berdasarkan ID
        $eventModel->update($id, [
            'name' => $this->request->getVar('name'),
            'start_date' => $this->request->getVar('start_date'),
            'end_date' => $this->request->getVar('end_date'),
            'room_id' => $this->request->getVar('room_id')
        ]);

        return redirect()->to('/event');
    }

    // Menghapus acara
    public function delete($id)
    {
        $eventModel = new EventModel();

        // Menghapus data acara berdasarkan ID
        $eventModel->delete($id);

        return redirect()->to('/event');
    }
}
