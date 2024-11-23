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

    // Password hashing before saving
    protected function setPassword(string $password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = $this->setPassword($data['data']['password']);
        }
        return $data;
    }
}
