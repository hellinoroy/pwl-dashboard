<?php
  namespace App\Controllers;
  use App\Models\UserModel;
  use App\Models\ProvinsiModel;
  use CodeIgniter\Controller;
  
  class Dashboard extends Controller {
  
    public function dashboard_profile($id){
      $UserModel = new UserModel();
      $ProvinsiModel = new ProvinsiModel();
      $object = $ProvinsiModel->findAll();
      $data["provinsi_list"] = array_column($object, "nama_provinsi", "id");
      $data["user"] = $UserModel->find($id);
      // log_message("error", print_r($data, true));
      return view("profile", $data);
    }

    public function dashboard_get(){
      $UserModel = new UserModel();
      $ProvinsiModel = new ProvinsiModel();
      // Paginate
      $object = $ProvinsiModel->findAll();
      $data["provinsi_list"] = array_column($object, "nama_provinsi", "id");
      if($this->request->getGet("firstName")) {
        $data["users"] = $UserModel->like("nama_depan", $this->request->getGet("firstName"))->paginate(3);
      } else {
        $data["users"] = $UserModel->paginate(3);
      }
      $data["pager"] = $UserModel->pager;
      return view("users_list", $data);      
    }

    public function dashboard_edit_get($id){
      $ProvinsiModel = new ProvinsiModel();
      $UserModel = new UserModel();
      $object = $ProvinsiModel->findAll();
      $data["provinsi_list"] = array_column($object, "nama_provinsi", "id");
      $data["user"] = $UserModel->find($id);
      return view("users_list_edit", $data);      
    }

    public function dashboard_edit_patch($id){
      $UserModel = new UserModel();
      $userData = $UserModel->find($id);
      $session = session();

      $file = $this->request->getFile('photo');
      $fileRule = [
        "photo"       => "uploaded[photo]|is_image[photo]"
      ];


      if($file != "") {
        // check uploaded file  
        
        if (! $this->validateData([], $fileRule)) {
          $session->setFlashdata("error", "File bukan foto");
          return redirect()->to('/register', null, 'refresh');
        }
        unlink(FCPATH . "fotoProfil/" . $userData["foto"]);
        $nameImgFile = $file->getRandomName();
        $file->move(ROOTPATH.'public/fotoProfil', $nameImgFile);
  
      } else {
        $nameImgFile = $userData["foto"];
      }

      $data = [
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
        "foto"           => $nameImgFile,
        "komentar"       => $this->request->getPost("comment")
      ];
      
      if($UserModel->update($id, $data)){
        $session->setFlashdata("success", "Update Data Berhasil");
        return redirect()->to('/profile/' . $id, null, 'refresh');
      } else {
        $session->setFlashdata("error", "Update Data Gagal");
        return redirect()->back();
      }

    }

    public function dashboard_delete($id){
      $session = session();
      $UserModel = new UserModel();
      log_message("info", $session->get("id_registrasi") . $session->get("nama_depan") . "menghapus" . $id);
      $data = $UserModel->find($id);
      unlink(FCPATH . "fotoProfil/" . $data["foto"]);
      $UserModel->delete($id);
      $session->setFlashdata("success", "Data berhasil dihapus");
      return redirect()->to('/dashboard');        
    }
  }
?>