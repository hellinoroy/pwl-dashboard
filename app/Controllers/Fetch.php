<?php
  namespace App\Controllers;
  use App\Models\UserModel;
  use App\Models\ProvinsiModel;
  use CodeIgniter\Controller;
  
  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
  use PhpOffice\PhpSpreadsheet\Writer\Csv;
  use PhpOffice\PhpSpreadsheet\IOFactory;
  class Fetch extends Controller {
    
    public function userProvinsi_get() {
      $UserModel = new UserModel();
      $data = $UserModel->get_provinsi_count();
      // log_message("info", print_r($data, true));
      return $this->response->setJSON($data);
    }

    public function export() {
      $UserModel = new UserModel();
      $Spreadsheet = new Spreadsheet();

      $db = \Config\Database::connect();
      // $builder = $db->table('tbl_register');

      $usersData = $UserModel->findAll();
      $builder = $db->table('tbl_register');
      $builder->select('*');
      $builder->join('provinsi', 'tbl_register.provinsi  = provinsi.id');
      $query = $builder->get();

      $option = $this->request->getPost("export-select");

      $this->spreadsheet($Spreadsheet, $usersData);

      switch($option) {
        case "excel":                

          $filename = date("Y-m-d") . "-userData.xlsx";
          $writer = new Xlsx($Spreadsheet);
          header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          header('Content-Disposition: attachment; filename="'. urlencode($filename).'"');
          $writer->save('php://output');

          break;
        case "csv":

          $writer = new Csv($Spreadsheet);
          $writer->setDelimiter(',')
              ->setEnclosure('"')
              ->setSheetIndex(0);

          $filename = date("Y-m-d") . "-userData.csv";
          header('Content-Disposition: attachment; filename="'. urlencode($filename).'"');
          $writer->save("php://output");

          break;
        case "txt":

          $writer = new Csv($Spreadsheet);
          $writer->setDelimiter(',')
              ->setEnclosure('"')
              ->setSheetIndex(0);

          $filename = date("Y-m-d") . "-userData.txt";
          header('Content-Disposition: attachment; filename="'. urlencode($filename).'"');
          $writer->save("php://output");

          break;

          $filename = date("Y-m-d") . "-Transaksi.pdf";
          header('Content-Disposition: attachment; filename="'. urlencode($filename).'"');
          $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($Spreadsheet, 'Dompdf');
          $writer->save("php://output");
          break;
      }

    }

    private function spreadsheet($Spreadsheet, $usersData) {

      //  id_registrasi 	nama_depan 	nama_tengah 	nama_belakang 	
      // tanggal_lahir 	tempat_lahir 	jenis_kelamin 	nomor_hp 	email 	
      // alamat 	kota 	provinsi 	negara 	kode_pos 	username 	password 	foto 	komentar 

      $Spreadsheet->setActiveSheetIndex(0)
        ->setCellValue("A1", "id_registrasi")
        ->setCellValue("B1", "nama_depan")
        ->setCellValue("C1", "nama_tengah")
        ->setCellValue("D1", "nama_belakang")
        ->setCellValue("E1", "tanggal_lahir")
        ->setCellValue("F1", "tempat_lahir")
        ->setCellValue("G1", "jenis_kelamin")
        ->setCellValue("H1", "nomor_hp")
        ->setCellValue("I1", "email")
        ->setCellValue("J1", "alamat")
        ->setCellValue("K1", "kota")
        ->setCellValue("L1", "provinsi")
        ->setCellValue("M1", "negara")
        ->setCellValue("N1", "kode_pos")
        ->setCellValue("O1", "komentar");

      $column = 2;
      foreach($usersData as $userData) {
        $Spreadsheet->setActiveSheetIndex(0)
          ->setCellValue("A" . $column, $userData["id_registrasi"])
          ->setCellValue("B" . $column, $userData["nama_depan"])
          ->setCellValue("C" . $column, $userData["nama_tengah"])
          ->setCellValue("D" . $column, $userData["nama_belakang"])
          ->setCellValue("E" . $column, $userData["tanggal_lahir"])
          ->setCellValue("F" . $column, $userData["tempat_lahir"])
          ->setCellValue("G" . $column, $userData["jenis_kelamin"])
          ->setCellValue("H" . $column, $userData["nomor_hp"])
          ->setCellValue("I" . $column, $userData["email"])
          ->setCellValue("J" . $column, $userData["alamat"])
          ->setCellValue("K" . $column, $userData["kota"])
          ->setCellValue("L" . $column, $userData["provinsi"])
          ->setCellValue("M" . $column, $userData["negara"])
          ->setCellValue("N" . $column, $userData["kode_pos"])
          ->setCellValue("O" . $column, $userData["komentar"]);
          $column++;
      }
    }

  }
?>