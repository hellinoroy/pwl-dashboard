<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login - Undira</title>
  <meta name="description" content="The small framework with powerful features">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="/favicon.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
  body {
    background-image:url(<?php echo base_url('images/bangunanUndira.jpg'); ?>);
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
  }

  #tint {
    background-color: rgba(0, 0, 255, 0.2);
  }
</style>


<!-- Mengecek jika ada response dari controller register -->

<!-- ganti input jadi input-group bootstrap -->
<body class="vh-100">
  <div class="w-100 h-100 d-flex align-items-center justify-content-center position-relative" id="tint">

    <div>
      <?= $this->include("components/toast") ?>
    </div>

    <main class="container d-flex flex-column p-3 rounded bg-secondary-subtle" style="width: 500px">

      <img src="<?php echo base_url('images/logoUndira.png'); ?>" class="img-fluid mb-3">
      <?php helper('form'); ?>
      <?= form_open("/", $attributes = ["class" => "d-flex flex-column d-flex gap-2"]); ?>

        <div class="input-group mb-3">
          <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
          <?= form_input(["class" => "form-control", "id" => "username", "placeholder" => "Username", "name" => "username", "required" => "required"]); ?>
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text"><i class="fas fa-key"></i></span>
          <?= form_password(["type" => "password","class" => "form-control", "id" => "password", "placeholder" => "Password", "name" => "password", "required" => "required"]); ?>
        </div>
      <?= form_submit(["class" => "btn btn-success mt-2"], $value = "Login") ?>

      <div class="container d-flex flex-row align-items-center justify-content-evenly my-2">
        <a href="/register" class="link-warning  link-underline-opacity-0 link-underline-opacity-0-hover ">Buat Akun Baru</a>
      </div>


       <?= form_close(); ?>
    </main>



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
