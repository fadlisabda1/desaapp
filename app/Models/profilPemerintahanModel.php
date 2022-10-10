<?php

namespace App\Models;

use CodeIgniter\Model;

class profilPemerintahanModel extends Model
{
    protected $table      = 'aparat';
    protected $primaryKey = 'id_aparat';
    protected $useTimestamps = true;
}
