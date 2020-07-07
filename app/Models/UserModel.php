<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public function getData($email, $password)
    {
        return $this->db->table('user')
        ->where(array('email'=>$email,'pass'=>$password))
        ->get()->getRowArray();
    }
}