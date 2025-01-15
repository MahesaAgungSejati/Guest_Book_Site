<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomModel extends Model
{
    protected $table      = 'rooms';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'location', 'capacity'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getAllRooms()
    {
        return $this->findAll();
    }

    public function getRoomById($id)
    {
        return $this->find($id);
    }
}
