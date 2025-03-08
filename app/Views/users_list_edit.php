<?= $this->include("components/header") ?>
  
<!-- id_registrasi 	nama_depan 	nama_tengah 	nama_belakang 	
tanggal_lahir 	tempat_lahir 	jenis_kelamin 	nomor_hp 	email 	
alamat 	kota 	provinsi 	negara 	kode_pos 	username 	password 	foto 	komentar  -->

<?php helper('form'); ?>
<?= form_open_multipart("/dashboard/edit/" . esc($user["id_registrasi"]), $attributes = ["class" => "text-dark font-weight-bold"]); ?>
    <div class="row">
        <div class="form-group col-sm-4 mb-3">
            <label for="firstName">First Name</label>
            <?= form_input(["class" => "form-control", "id" => "firstName", "placeholder" => "First Name", "name" => "firstName", "required" => "required", "value" => esc($user["nama_depan"])]); ?>
        </div>
        <div class="form-group col-sm-4 mb-3">
            <label for="middleName">Middle Name</label> 
            <?= form_input(["class" => "form-control", "id" => "middleName", "placeholder" => "Middle Name", "name" => "middleName", "required" => "required", "value" => esc($user["nama_tengah"])]); ?>
        </div>
        <div class="form-group col-sm-4 mb-3">
            <label for="lastName">Last Name</label>
            <?= form_input(["class" => "form-control", "id" => "lastName", "placeholder" => "Last Name", "name" => "lastName", "required" => "required", "value" => esc($user["nama_belakang"])]); ?>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-sm-6 mb-3">
            <label for="dateOfBirth">Date of Birth</label>
            <?= form_input(["type" => "date", "class" => "form-control", "id" => "dateOfBirth", "name" => "dateOfBirth", "required" => "required", "value" => esc($user["tanggal_lahir"])]); ?>
        </div>
        <div class="form-group col-sm-6 mb-3">
            <label for="placeOfBirth">Place of Birth</label>
            <?= form_input(["class" => "form-control", "id" => "placeOfBirth", "placeholder" => "Place of Birth", "name" => "placeOfBirth", "required" => "required", "value" => esc($user["tempat_lahir"])]); ?>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-sm-6 mb-3">
            <label for="gender">Gender</label>
            <?= form_dropdown($name = "gender", $options = ["laki-laki" => "Laki-laki", "perempuan" => "Perempuan"], $selected = "laki-laki", $extra = ["class" => "form-control", "id" => "gender", "required" => "required", "value" => esc($user["jenis_kelamin"])]); ?>
        </div>
        <div class="form-group col-sm-6 mb-3">
            <label for="phoneNumber">Phone Number</label>
            <?= form_input(["type" => "number", "class" => "form-control", "id" => "phoneNumber", "placeholder" => "Phone Number", "name" => "phoneNumber", "required" => "required", "value" => esc($user["nomor_hp"])]); ?>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-sm-6 mb-3">
            <label for="email">Email</label>
            <?= form_input(["type" => "email", "class" => "form-control", "id" => "email", "placeholder" => "email", "name" => "email", "required" => "required", "value" => esc($user["email"])]); ?>
        </div>
        <div class="form-group col-sm-6 mb-3">
            <label for="address">Address</label>
            <?= form_input(["class" => "form-control", "id" => "address", "placeholder" => "Address", "name" => "address", "required" => "required", "value" => esc($user["alamat"])]); ?>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-sm-6 mb-3">
            <label for="kota">Kota</label>
            <?= form_input(["class" => "form-control", "id" => "kota", "placeholder" => "Kota", "name" => "kota", "required" => "required", "value" => esc($user["kota"])]); ?>
        </div>
        <div class="form-group col-sm-6 mb-3">
            <label for="provinsi">Provinsi</label>
            <?= form_dropdown($name = "provinsi", $options = $provinsi_list, $selected = esc($user["provinsi"]), $extra = ["class" => "form-select", "id" => "provinsi", "required" => "required"]); ?>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-sm-6 mb-3">
            <label for="negara">Negara</label>
            <?= form_input(["class" => "form-control", "id" => "negara", "placeholder" => "Negara", "name" => "negara", "required" => "required", "value" => esc($user["negara"])]); ?>
        </div>
        <div class="form-group col-sm-6 mb-3">
            <label for="kodePos">Kode Pos</label>
            <?= form_input(["type" => "number","class" => "form-control", "id" => "kodePos", "placeholder" => "Kode Pos", "name" => "kodePos", "required" => "required", "value" => esc($user["kode_pos"])]); ?>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-6">
            <label for="photo">Photo</label>
            <?= form_upload(["class" => "form-control", "id" => "photo", "name" => "photo"]); ?>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-12">
            <label for="comment">Comment</label>
            <?= form_textarea(["rows" => 4, "class" => "form-control", "id" => "comment", "placeholder" => "Comment", "name" => "comment", "required" => "required", "value" => esc($user["komentar"])]); ?>
        </div>
    </div>

    <div class="row">
        <?= form_submit(["class" => "btn btn-primary my-3 ml-auto mr-3 px-5 py-2"], $value = "Submit") ?>
    </div>

<?= form_close(); ?>

<?= $this->include("components/footer") ?>