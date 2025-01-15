<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table      = 'events';
    protected $primaryKey = 'id';

    protected $allowedFields = ['room_id', 'name', 'start_date', 'end_date'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getEventsByRoomId($roomId)
    {
        return $this->where('room_id', $roomId)->findAll();
    }

    public function getEventById($id)
    {
        return $this->find($id);
    }
}
