<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laundry_m extends CI_Model{
    public function findAll(){
        return $this->db->get('laundry')->result();
    }

    public function create($pelanggan_id, $status,$berat,$jumlah_total,$status_pembayaran,$category_post,$keterangan, $created_by){
        $data = [
            'pelanggan_id' => $pelanggan_id,
            'status' => $status,
            'berat' => $berat,
            'jumlah_total' => $jumlah_total,
            'status_pembayaran' => $status_pembayaran,
            'category_id' => $category_post,
            'keterangan' => $keterangan,
            'created_by' => $created_by
        ];
        return $this->db->insert('laundry', $data);
    }

    public function edit($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function update($id, $pelanggan_id, $status,$berat,$jumlah_total,$status_pembayaran,$category_post,$keterangan, $created_by){
        $this->db->where('laundry_id', $id);
        $data = [
            'pelanggan_id' => $pelanggan_id,
            'status' => $status,
            'berat' => $berat,
            'jumlah_total' => $jumlah_total,
            'status_pembayaran' => $status_pembayaran,
            'category_id' => $category_post,
            'keterangan' => $keterangan,
            'created_by' => $created_by
        ];
        return $this->db->update('laundry', $data);
    }

    public function deleteLaundry($laundry_id){
        $this->db->where('laundry_id', $laundry_id);
        return $this->db->delete('laundry');
    }

    public function relationJoin($laundry_id){
        $this->db->select('*');
        $this->db->from('laundry');
        $this->db->join('pelanggan', 'pelanggan.pelanggan_id = laundry.pelanggan_id');
        $this->db->join('categories', 'categories.category_id = laundry.category_id');
        $this->db->where($laundry_id);
        return $this->db->get();
    }
}
