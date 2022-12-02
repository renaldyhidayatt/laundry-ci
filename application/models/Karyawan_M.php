<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_m extends CI_Model{
    public function findAll(){
        return $this->db->get('karyawan')->result();
    }

    public function create($user_id,$nama_karyawan, $jenis_kelamin, $alamat, $no_hp,$tgl_bergabung,$created_by){
        $data = [
            'user_id' => $user_id,
            'nama_karyawan' => $nama_karyawan,
            'jeniskelamin' => $jenis_kelamin,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'tgl_bergabung' => $tgl_bergabung,
            'created_by' => $created_by
        ];

        return $this->db->insert('karyawan', $data);
    }

    public function edit($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function update($karyawan_id, $user_id,$nama_karyawan, $jenis_kelamin, $alamat, $no_hp,$tgl_berhenti, $created_by){
        $this->db->where('karyawan_id', $karyawan_id);
        $data = [
            'user_id' => $user_id,
            'nama_karyawan' => $nama_karyawan,
            'jeniskelamin' => $jenis_kelamin,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'tgl_berhenti' => $tgl_berhenti,
            'created_by' => $created_by
        ];
        $this->db->update('karyawan', $data);
    }

    public function deleteKaryawan($karyawan_id){
        $this->db->where('karyawan_id', $karyawan_id);
        $this->db->delete('karyawan');
    }
}
