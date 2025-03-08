<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ProvinsiModel;
use CodeIgniter\Controller;

class User extends Controller
{  

  public function login_get() {
    $session = session();
    if($session->isLoggedIn == True) {
      return redirect()->to("/dashboard");
    }

    return view('/login');
  }

  public function login_post() {
    $session = session();
    $UserModel = new UserModel();

    $username = $this->request->getPost("username"); 
    $password = $this->request->getPost("password");

    $data = $UserModel->where("username", $username)->first(); 

    if ($data) {
      $hashed_password = $data["password"];

      if (password_verify($password, $hashed_password)) {

        $session->set([
          "nama_depan" => $data["nama_depan"],
          "id_registrasi" => $data["id_registrasi"],
          "isLoggedIn" => True
        ]);
        $session->setFlashdata('success', "Welcome " . $data["nama_depan"]);
        
        return redirect()->to('/profile/' . $data["id_registrasi"], null, 'refresh');
      } else {
        $session->setFlashdata('error', "Password Salah");
        return redirect()->to('/');
      }
    } else {
      $session->setFlashdata('error', "Username Tidak Ada");
      return redirect()->to('/', null, 'refresh');
    }      
  }

  public function register_get() {
    $ProvinsiModel = new ProvinsiModel();
    $object = $ProvinsiModel->findAll();
    $data["provinsi_list"] = array_column($object, "nama_provinsi", "id");
    return view('/register', $data);
  }

  public function register_post() {
    $session = session();
    $UserModel = new UserModel();

    $file = $this->request->getFile('photo');
    
    $fileRule = [
      "photo"       => "uploaded[photo]|is_image[photo]"
    ];

    // check if foto exist, if it is assign random name and move to fotoProfil folder
    if($file != "") {
      // check uploaded file  
      if (! $this->validateData([], $fileRule)) {
        $session->setFlashdata("error", "File bukan foto");
        return redirect()->back();
      }
      $nameImgFile = $file->getRandomName();
      $file->move(ROOTPATH.'public/fotoProfil', $nameImgFile);

    } else {
      $nameImgFile = "";
    }

    // id_registrasi 	nama_depan 	nama_tengah 	nama_belakang 	
    // tanggal_lahir 	tempat_lahir 	jenis_kelamin 	nomor_hp 	email 	
    // alamat 	kota 	provinsi 	negara 	kode_pos 	username 	password 	foto 	komentar

    $data = [
      "id_registrasi"  => $this->request->getPost("id_registrasi"),
      "nama_depan"     => $this->request->getPost("firstName"),
      "nama_tengah"    => $this->request->getPost("middleName"),
      "nama_belakang"  => $this->request->getPost("lastName"),
      "tanggal_lahir"  => $this->request->getPost("dateOfBirth"),
      "tempat_lahir"   => $this->request->getPost("placeOfBirth"),
      "jenis_kelamin"  => $this->request->getPost("gender"),
      "nomor_hp"       => $this->request->getPost("phoneNumber"),
      "email"          => $this->request->getPost("email"),
      "alamat"         => $this->request->getPost("address"),
      "kota"           => $this->request->getPost("kota"),
      "provinsi"       => $this->request->getPost("provinsi"),
      "negara"         => $this->request->getPost("negara"),
      "kode_pos"       => $this->request->getPost("kodePos"),
      "username"       => $this->request->getPost("username"),
      "password"       => $this->hashPassword($this->request->getPost("password")),
      "foto"           => $nameImgFile,
      "komentar"       => $this->request->getPost("comment")
    ];

    // rule validation
    $rule = [
      "nomor_hp"       => "is_unique[tbl_register.nomor_hp]",
      "email"       => "is_unique[tbl_register.email]",
      "username"       => "is_unique[tbl_register.username]",
    ];
    
    $errorMessages = [
      'nomor_hp' => [
        'is_unique' => 'No Hp sudah terdaftar',
      ],
      'email' => [
        'is_unique' => 'Email sudah terdaftar',
      ],
      'username' => [
        'is_unique' => 'Username sudah terdaftar',
      ]
    ];
    
    if (! $this->validateData($data, $rule, $errorMessages)) {
      $session->setFlashdata("error", $this->validator->getErrors());
      log_message("error", print_r("test", true));
      return redirect()->back();
    }

    if ($UserModel->insert($data)) {
      $session->setFlashdata("success", "Pendaftaran Berhasil");
      return redirect()->to('/', null, 'refresh');
    } else {
      $session->setFlashdata("error", "Registrasi Gagal");
      return redirect()->back();
    }
  }

  public function logout() {
    $session = session();
    $session->destroy();
    return redirect()->to('/');
  }

  private function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
  }



}
