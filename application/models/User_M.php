<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_M extends CI_Model{
    public function findAll(){
        return $this->db->get('user')->result();
    }

    public function create($data=null){
        $this->db->insert('user', $data);
    }

    public function edit($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function update($user_id, $firstname, $lastname,$email,$password){
        $this->db->where('user_id', $user_id);
        $data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ];
        $this->db->update('user', $data);
        return true;
    }

    public function deleteUser($user_id){
        $this->db->where('user_id', $user_id);
        $this->db->delete('user');

        return true;
    }
}
