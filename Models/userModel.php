<?php
namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields =[
        'username','password','role'
    ];
}

?>