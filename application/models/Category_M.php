<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_m extends CI_Model{
    public function findAll(){
        return $this->db->get('categories')->result();
    }

    public function create($nama,$harga,$created_by){
        $data = [
            'nama' => $nama,
            'harga' => $harga,
            'created_by' => $created_by
        ];

        return $this->db->insert('categories', $data);
    }

    public function edit($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function update($category_id, $nama, $harga, $created_by){
        $this->db->where('category_id', $category_id);
        $data = [
            'nama' => $nama,
            'harga' => $harga,
            'created_by' => $created_by
        ];
        $this->db->update('categories', $data);

        return true;
    }

    public function deleteCategory($category_id){
        $this->db->where('category_id', $category_id);
        $this->db->delete('categories');

        return true;
    }
}
