<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table            = 'events';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\EventEntity';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'description', 'banner', 'target_audience', 'quota', 'event_type', 'link', 'price', 'date', 'country', 'province', 'city', 'postal_code', 'street', 'host', 'host_email', 'required_approval', 'category_id', 'owner'];

    public function getEvents(array $keyword = [], int $perPage = null)
    {
        $category = $keyword['category'] == 'all' ? '' : $keyword['category'];
        $name = $keyword['name'];
        
        if($name && $keyword['category']) {
            $this->builder()
            ->select('events.*, categories.name category_name')
            ->join('categories', 'events.category_id = categories.id', 'left')
            ->where('events.name like', "%$name%")
            ->orderBy('events.created_at', 'DESC');

            return [
                'events'  => $this->paginate($perPage, 'events'),
                'pager' => $this->pager->links('event', 'event_pagination'),
            ];
        }
        
        if($keyword['category']) {
            $this->builder()
            ->select('events.*, categories.name category_name')
            ->join('categories', 'events.category_id = categories.id', 'left')
            ->where('categories.name like', "%$category%")
            ->orderBy('events.created_at', 'DESC');

            return [
                'events'  => $this->paginate($perPage, 'events'),
                'pager' => $this->pager->links('event', 'event_pagination'),
            ];
        }

        return $this->db->table('events')
            ->select('events.*, categories.name category_name, users.username username')
            ->join('users', 'users.id = events.owner', 'left')
            ->join('categories', 'categories.id = events.category_id', 'left')
            ->orderBy('events.created_at', 'DESC')
            ->get()->getResult();
    }

    public function getEventById(int $id)
    {
        return $this->db->table('events')
            ->select('events.*, user_owner.email owner_email, user_collabrator.email collaborator')
            ->join('users user_owner', 'user_owner.id = events.owner', 'left')
            ->join('event_collaborators', 'event_collaborators.event_id = events.id', 'left')
            ->join('users user_collabrator', 'user_collabrator.id = event_collaborators.user_id', 'left')
            ->where(['events.id' => $id])
            ->get()->getResult();
    }

    public function getEventsWithOwner(int $owner_id)
    {
        return $this->db->table('events')
            ->select('events.*, categories.name category_name, users.username username')
            ->join('users', 'users.id = events.owner', 'left')
            ->join('categories', 'categories.id = events.category_id', 'left')
            ->where('events.owner', $owner_id)  // Adding the where condition
            ->orderBy('events.created_at', 'DESC')
            ->get()
            ->getResult();
    }

    // public function deleteEvent($id = null)
    // {
    //     return $this->db->table('events')
    //     ->update(['deleted_at' => date('Y-m-d H:i:s')], $id);
    // }

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
