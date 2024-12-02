<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['nama', 'email', 'password', 'role', 'reset_token', 'reset_expires'];
    protected $useTimestamps = true;

    public function getUserByResetToken($token)
    {
        return $this->where('reset_token', $token)
                    ->where('reset_expires >=', date('Y-m-d H:i:s'))
                    ->first();
    }

    public function setResetToken($email, $token)
    {
        $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
        return $this->where('email', $email)->set([
            'reset_token' => $token,
            'reset_expires' => $expires
        ])->update();
    }

    public function clearResetToken($userId)
    {
        return $this->update($userId, [
            'reset_token' => null,
            'reset_expires' => null
        ]);
    }
}
