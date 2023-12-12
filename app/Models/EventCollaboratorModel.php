<?php

namespace App\Models;

use CodeIgniter\Model;

class EventCollaboratorModel extends Model
{
    protected $table            = 'event_collaborators';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\EventCollaboratorEntity';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'event_id'];

    // Dates
    protected $useTimestamps = true;
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

    public function getCollaborators()
    {
        return $this->db->table('event_collaborators')->join('users', 'users.id = event_collaborators.user_id')
            ->join('events', 'events.id = event_collaborators.event_id')
            ->select('event_collaborators.*,users.id as user_id,
             users.email as user_email,
             users.username as user_username, 
             events.name as event_name, 
             events.owner as event_owner, 
             events.country as event_country,
             events.province as event_province,
             events.city as event_city,
             events.postal_code as event_postal_code,
             events.street as event_street,
             events.date as event_date,
             event_collaborators.id as collaborator_id,
             event_collaborators.deleted_at as deleted_at
             ')->get()->getResult();
    }

    public function getCollaboratorById(int $id)
    {
        return $this->db->table('event_collaborators')->join('users', 'users.id = event_collaborators.user_id')
            ->join('events', 'events.id = event_collaborators.event_id')
            ->select('event_collaborators.*,users.id as user_id,
             users.email as user_email,
             users.username as user_username, 
             events.name as event_name, 
             events.owner as event_owner, 
             events.country as event_country,
             events.province as event_province,
             events.city as event_city,
             events.postal_code as event_postal_code,
             events.street as event_street,
             events.date as event_date,
             event_collaborators.id as collaborator_id,
             event_collaborators.deleted_at as deleted_at
             ')
            ->where(['event_collaborators.id' => $id])
            ->get()->getResult();
    }

    public function getCollaboratorEventsByUserId(int $userId)
    {
        return $this->db->table('event_collaborators')
            ->join('events', 'events.id = event_collaborators.event_id')
            ->select('event_collaborators.*,
             events.name as event_name, 
             events.banner as event_banner,
             events.description as event_description,
             events.price as event_price,
             events.date as event_date,
             events.target_audience as event_target_audience,
             events.quota as event_quota,
             events.country as event_country,
             events.province as event_province,
             events.city as event_city,
             events.postal_code as event_postal_code,
             events.street as event_street,
             events.date as event_date,
             events.required_approval as event_required_approval,
             event_collaborators.id as collaborator_id,
             event_collaborators.deleted_at as deleted_at
             ')
            ->where(['event_collaborators.user_id' => $userId])
            ->get()->getResult();
    }
}
