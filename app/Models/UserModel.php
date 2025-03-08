<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {
  protected $table = "tbl_register";
  protected $primaryKey = "id_registrasi";
  //  id_registrasi 	nama_depan 	nama_tengah 	nama_belakang 	
  // tanggal_lahir 	tempat_lahir 	jenis_kelamin 	nomor_hp 	email 	
  // alamat 	kota 	provinsi 	negara 	kode_pos 	username 	password 	foto 	komentar 
  protected $allowedFields = [
    "nama_depan",
    "nama_tengah",
    "nama_belakang",
    "tanggal_lahir",
    "tempat_lahir",
    "jenis_kelamin",
    "nomor_hp",
    "email",
    "alamat",
    "kota",
    "provinsi",
    "negara",
    "kode_pos",
    "username",
    "password",
    "foto",
    "komentar"
  ];

  public function get_provinsi_count() {
    $query = $this->db->query("
      SELECT 
          p.nama_provinsi,
          COUNT(p.nama_provinsi) AS jumlah
      FROM tbl_register t
      LEFT JOIN provinsi p ON p.id = t.provinsi
      GROUP BY p.nama_provinsi;
    ");
    return $query->getResultArray();

  }


}




?>