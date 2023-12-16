<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'role', 'fullName', 'phoneNumber', 'email'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [
        'role'       => 'required',
        'fullName'   => 'required',
        'phoneNumber' => 'required',
        'email'      => 'required|valid_email|is_unique[users.email,id,{id}]',
    ];

    protected $validationMessages = [
        'role'       => [
            'required' => 'Role is required.',
        ],
        'fullName'   => [
            'required' => 'Full Name is required.',
        ],
        'phoneNumber' => [
            'required' => 'Phone Number is required.',
        ],
        'email'      => [
            'required'     => 'Email is required.',
            'valid_email'  => 'Please provide a valid email address.',
            'is_unique'    => 'Email already exists.',
        ],
    ];
}
