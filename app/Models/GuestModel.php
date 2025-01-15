<?php

namespace App\Models;

use CodeIgniter\Model;

class GuestModel extends Model
{
    protected $table      = 'guests';
    protected $primaryKey = 'id';

    protected $allowedFields = ['event_id', 'name', 'email', 'message'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';

    public function getGuestsByEventId($eventId)
    {
        return $this->where('event_id', $eventId)->findAll();
    }

    public function getGuestById($id)
    {
        return $this->find($id);
    }

    public function addGuest($data)
    {
        return $this->save($data);
    }
}
