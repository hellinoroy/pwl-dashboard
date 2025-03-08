<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registrasi - Undira</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>

<style>
  body {
    background-image:url(<?php echo base_url('images/bangunanUndira.jpg'); ?>);
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;

    font-family: 'Roboto', sans-serif;
  }

  #tint {
    background-color: rgba(0, 0, 255, 0.2);
  }

  label{
    font-size: 18px;
  }

</style>

<body class="vh-100 position-relative">
    <div class="h-100 w-100 position-absolute" id="tint">
        <div class="position-relative">

        <?= $this->include("components/toast") ?>
            <a href="/" class="link-primary link-offset-2 link-underline-opacity-0 link-underline-opacity-0-hover position-absolute top-0 end-0 m-sm-3 m-2"><button type="button" class="btn btn-primary p-3">< Kembali Ke Login</button></a>
        
            <main class="container d-flex flex-column p-3 rounded bg-secondary-subtle my-3">
            
            <h3 class="mx-auto mb-3 fw-bold">REGISTRASI</h3>

                <?php helper('form'); ?>
                <?= form_open_multipart("register", $attributes = ["class" => "text-dark font-weight-bold"]); ?>
                    <div class="row">
                        <div class="form-group col-sm-4 mb-3">
                            <label for="firstName">First Name</label>
                            <?= form_input(["class" => "form-control", "id" => "firstName", "placeholder" => "First Name", "name" => "firstName", "required" => "required"]); ?>
                        </div>
                        <div class="form-group col-sm-4 mb-3">
                            <label for="middleName">Middle Name</label>
                            <?= form_input(["class" => "form-control", "id" => "middleName", "placeholder" => "Middle Name", "name" => "middleName", "required" => "required"]); ?>
                        </div>
                        <div class="form-group col-sm-4 mb-3">
                            <label for="lastName">Last Name</label>
                            <?= form_input(["class" => "form-control", "id" => "lastName", "placeholder" => "Last Name", "name" => "lastName", "required" => "required"]); ?>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-sm-6 mb-3">
                            <label for="dateOfBirth">Date of Birth</label>
                            <?= form_input(["type" => "date", "class" => "form-control", "id" => "dateOfBirth", "name" => "dateOfBirth", "required" => "required"]); ?>
                        </div>
                        <div class="form-group col-sm-6 mb-3">
                            <label for="placeOfBirth">Place of Birth</label>
                            <?= form_input(["class" => "form-control", "id" => "placeOfBirth", "placeholder" => "Place of Birth", "name" => "placeOfBirth", "required" => "required"]); ?>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-sm-6 mb-3">  
                            <label for="gender">Gender</label>
                            <?= form_dropdown($name = "gender", $options = ["laki-laki" => "Laki-laki", "perempuan" => "Perempuan"], $selected = "laki-laki", $extra = ["class" => "form-select", "id" => "gender", "required" => "required"]); ?>
                        </div>
                        <div class="form-group col-sm-6 mb-3">
                            <label for="phoneNumber">Phone Number</label>
                            <?= form_input(["type" => "number", "class" => "form-control", "id" => "phoneNumber", "placeholder" => "Phone Number", "name" => "phoneNumber", "required" => "required"]); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6 mb-3">
                            <label for="email">Email</label>
                            <?= form_input(["type" => "email", "class" => "form-control", "id" => "email", "placeholder" => "email", "name" => "email", "required" => "required"]); ?>
                        </div>
                        <div class="form-group col-sm-6 mb-3">
                            <label for="address">Address</label>
                            <?= form_input(["class" => "form-control", "id" => "address", "placeholder" => "Address", "name" => "address", "required" => "required"]); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6 mb-3">
                            <label for="kota">Kota</label>
                            <?= form_input(["class" => "form-control", "id" => "kota", "placeholder" => "Kota", "name" => "kota", "required" => "required"]); ?>
                        </div>
                        <div class="form-group col-sm-6 mb-3">
                            <label for="provinsi">Provinsi</label>
                            <?= form_dropdown($name = "provinsi", $options = $provinsi_list, $selected = "" ,$extra = ["class" => "form-select", "id" => "provinsi", "required" => "required"]); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6 mb-3">
                            <label for="negara">Negara</label>
                            <?= form_input(["class" => "form-control", "id" => "negara", "placeholder" => "Negara", "name" => "negara", "required" => "required"]); ?>
                        </div>
                        <div class="form-group col-sm-6 mb-3">
                            <label for="kodePos">Kode Pos</label>
                            <?= form_input(["type" => "number","class" => "form-control", "id" => "kodePos", "placeholder" => "Kode Pos", "name" => "kodePos", "required" => "required"]); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6 mb-3">
                            <label for="username">Username</label>
                            <?= form_input(["class" => "form-control", "id" => "username", "placeholder" => "Username", "name" => "username", "required" => "required"]); ?>
                        </div>
                        <div class="form-group col-sm-6 mb-3">
                            <label for="password">Password</label>
                            <?= form_password(["type" => "password","class" => "form-control", "id" => "password", "placeholder" => "Password", "name" => "password", "required" => "required"]); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="photo">Photo</label>
                            <?= form_upload(["class" => "form-control", "id" => "photo", "name" => "photo", "required" => "required"]); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label for="comment">Comment</label>
                            <?= form_textarea(["rows" => 4, "class" => "form-control", "id" => "comment", "placeholder" => "Comment", "name" => "comment", "required" => "required"]); ?>
                        </div>
                    </div>

                    <div class="row">
                        <?= form_submit(["class" => "btn btn-primary my-3 ml-auto mr-3 px-5 py-2"], $value = "Submit") ?>
                    </div>

                <?= form_close(); ?>
            
            
            
            </main>
        </div>
    </div>



</body>


<script>
  window.onload = (event) => {
    let toastElement = document.querySelector('.toast');
    if(toastElement) {
      const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastElement)
      toastBootstrap.show()
    }

  };
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
