<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    // Fields allowed for insert or update
    protected $allowedFields = ['username', 'email', 'password', 'role', 'profile', 'created_at', 'updated_at'];

    // Enable automatic handling of created_at and updated_at fields
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';


    public function getUserProfile()
    {

        if (session()->get('user_type') == 'employee') {
            return $this->select('profile.*, users.*')
                ->join('profile', 'users.id = profile.user_id')
                ->where('id', session()->get('user_id'))
                ->first();
        } elseif (session()->get('user_type') == 'employer') {
            return $this->select('users.*')
                ->where('id', session()->get('user_id'))
                ->first();
        }
    }
}
