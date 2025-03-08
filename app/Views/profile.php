<?= $this->include("components/header") ?>

<div class="bg-secondary-subtle mx-auto my-3 p-3 border border-secondary d-flex flex-column align-items-center justify-content-center" style="max-width: 500px">
  <h1 class="row py-1 fw-bold">Profile</h1>
  <img class="img-fluid border border-3 border-primary" src="/fotoProfil/<?= esc($user['foto']) ?>" alt="">

  <!-- id_registrasi 	nama_depan 	nama_tengah 	nama_belakang 	
  tanggal_lahir 	tempat_lahir 	jenis_kelamin 	nomor_hp 	email 	
  alamat 	kota 	provinsi 	negara 	kode_pos 	username 	password 	foto 	komentar  -->
</div>

<div class="container-fluid bg-secondary-subtle rounded mb-3">
    <!-- user_id 	nama_pelanggan 	alamat 	kontak 	email 	username  tanggal_lahir jenis_kelamin status 	foto_profil -->
  <?php helper('form'); ?>
  <?= form_open_multipart("#", $attributes = ["class" => "text-dark font-weight-bold py-3"]); ?>
    <div class="container-fluid">
      <div class="row flex-nowrap justify-content-end">
        <a href="<?= base_url('dashboard/edit/' . $user['id_registrasi']) ?>" class=" btn btn-success btn-sm m-2" style="max-width: 80px"><i class="fa-solid fa-pencil" ></i> Edit</a>
        <a href="<?= base_url('dashboard/delete/' . $user['id_registrasi']) ?>" class=" btn btn-danger btn-sm m-2"  style="max-width: 80px" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa-solid fa-trash"></i> Delete</a>
      </div>
    
      <div class="row">
        <div class="form-group col-sm-4 mb-3">
            <label for="firstName">First Name</label>
            <?= form_input(["class" => "form-control", "id" => "firstName", "placeholder" => "First Name", "name" => "firstName", "required" => "required", "value" => esc($user["nama_depan"]), "disabled" => "disabled"]); ?>
        </div>

        <div class="form-group col-sm-4 mb-3">
          <label for="middleName">Middle Name</label>
          <?= form_input(["class" => "form-control", "id" => "middleName", "placeholder" => "Middle Name", "name" => "middleName", "required" => "required", "value" => esc($user["nama_tengah"]), "disabled" => "disabled"]); ?>
        </div>

        <div class="form-group col-sm-4 mb-3">
          <label for="lastName">Last Name</label>
          <?= form_input(["class" => "form-control", "id" => "lastName", "placeholder" => "Last Name", "name" => "lastName", "required" => "required", "value" => esc($user["nama_belakang"]), "disabled" => "disabled"]); ?>
        </div>
      </div>

      <div class="row">
          <div class="form-group col-sm-6 mb-3">
              <label for="dateOfBirth">Date of Birth</label>
              <?= form_input(["type" => "date", "class" => "form-control", "id" => "dateOfBirth", "name" => "dateOfBirth", "required" => "required", "value" => esc($user["tanggal_lahir"]), "disabled" => "disabled"]); ?>
          </div>
          <div class="form-group col-sm-6 mb-3">
              <label for="placeOfBirth">Place of Birth</label>
              <?= form_input(["class" => "form-control", "id" => "placeOfBirth", "placeholder" => "Place of Birth", "name" => "placeOfBirth", "required" => "required", "value" => esc($user["tempat_lahir"]), "disabled" => "disabled"]); ?>
          </div>
      </div>

      <div class="row">
          <div class="form-group col-sm-6 mb-3">
              <label for="gender">Gender</label>
              <?= form_dropdown($name = "gender", $options = ["laki-laki" => "Laki-laki", "perempuan" => "Perempuan"], $selected = "laki-laki", $extra = ["class" => "form-control", "id" => "gender", "required" => "required", "value" => esc($user["jenis_kelamin"]), "disabled" => "disabled"]); ?>
          </div>
          <div class="form-group col-sm-6 mb-3">
              <label for="phoneNumber">Phone Number</label>
              <?= form_input(["type" => "number", "class" => "form-control", "id" => "phoneNumber", "placeholder" => "Phone Number", "name" => "phoneNumber", "required" => "required", "value" => esc($user["nomor_hp"]), "disabled" => "disabled"]); ?>
          </div>
      </div>

      <div class="row">
          <div class="form-group col-sm-6 mb-3">
              <label for="email">Email</label>
              <?= form_input(["type" => "email", "class" => "form-control", "id" => "email", "placeholder" => "email", "name" => "email", "required" => "required", "value" => esc($user["email"]), "disabled" => "disabled"]); ?>
          </div>
          <div class="form-group col-sm-6 mb-3">
              <label for="address">Address</label>
              <?= form_input(["class" => "form-control", "id" => "address", "placeholder" => "Address", "name" => "address", "required" => "required", "value" => esc($user["alamat"]), "disabled" => "disabled"]); ?>
          </div>
      </div>

      <div class="row">
          <div class="form-group col-sm-6 mb-3">
              <label for="kota">Kota</label>
              <?= form_input(["class" => "form-control", "id" => "kota", "placeholder" => "Kota", "name" => "kota", "required" => "required", "value" => esc($user["kota"]), "disabled" => "disabled"]); ?>
          </div>
          <div class="form-group col-sm-6 mb-3">
              <label for="provinsi">Provinsi</label>
              <?= form_dropdown($name = "provinsi", $options = $provinsi_list, $selected = esc($user["provinsi"]), $extra = ["class" => "form-select", "id" => "provinsi", "required" => "required", "disabled" => "disabled"]); ?>
          </div>
      </div>

      <div class="row">
          <div class="form-group col-sm-6 mb-3">
              <label for="negara">Negara</label>
              <?= form_input(["class" => "form-control", "id" => "negara", "placeholder" => "Negara", "name" => "negara", "required" => "required", "value" => esc($user["negara"]), "disabled" => "disabled"]); ?>
          </div>
          <div class="form-group col-sm-6 mb-3">
              <label for="kodePos">Kode Pos</label>
              <?= form_input(["type" => "number","class" => "form-control", "id" => "kodePos", "placeholder" => "Kode Pos", "name" => "kodePos", "required" => "required", "value" => esc($user["kode_pos"]), "disabled" => "disabled"]); ?>
          </div>
      </div>

      <div class="row">
          <div class="form-group col-12">
              <label for="comment">Comment</label>
              <?= form_textarea(["rows" => 4, "class" => "form-control", "id" => "comment", "placeholder" => "Comment", "name" => "comment", "required" => "required", "value" => esc($user["komentar"]), "disabled" => "disabled"]); ?>
          </div>
      </div>
    </div>
  <?= form_close(); ?>
</div>
  

<?= $this->include("components/footer") ?>