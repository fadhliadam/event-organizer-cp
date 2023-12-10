<?php

namespace App\Models;

use CodeIgniter\Model;

class UserEventRegistersModel extends Model
{
    protected $table            = 'user_event_registers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'event_id', 'status', 'is_completed'];

    public function getDataByEventAndUser($user_id, $event_id)
    {
        return $this->db->table($this->table)
            ->where('user_id', $user_id)
            ->where('event_id', $event_id)
            ->get()->getResult();
    }

    public function getEventsByUserId($userId, $isCompleted = 0)
    {
        return $this->select('user_event_registers.event_id, events.name, events.description, events.banner, events.event_type, events.price, events.date, events.category_id, events.street, user_event_registers.status, user_event_registers.is_completed, categories.name as category_name')
            ->join('events', 'events.id = user_event_registers.event_id')
            ->join('categories', 'categories.id = events.category_id')
            ->where('user_event_registers.user_id', $userId)
            ->where('user_event_registers.is_completed', $isCompleted)
            ->findAll();
    }

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
