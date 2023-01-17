<?php

namespace App\Models;

use CodeIgniter\Model;

class userrModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['email', 'username', 'fullname', 'user_image'];
    public function checkboxDelete($id)
    {
        return $this->whereIn('id', $id)->delete();
    }
}