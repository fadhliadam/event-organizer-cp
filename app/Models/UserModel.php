<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\UserEntity';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_google', 'username', 'password', 'email', 'image', 'role_id', 'deleted_at'];

    public function getUsers($id_user_loggin) 
    {
        return $this->db->table('users')
        ->select('users.*, roles.name role_name')
        ->join('roles', 'roles.id = users.role_id')
        ->whereNotIn('users.id', [$id_user_loggin])
        ->orderBy('users.created_at', 'DESC')
        ->get()->getResult();
    }

    public function getIdUserByEmail($email)
    {
        return $this->db->table('users')
        ->select('id')
        ->where('email', $email)
        ->get()->getResult();
    }

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
}
