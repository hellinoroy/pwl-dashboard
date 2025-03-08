<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>411221221 - Ryo Marchellino</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">411221221</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item">
          <a class="nav-link <?php if(uri_string() == "dashboard" ){echo "active"; }?>" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <?php $session = service('session') ?>
          <a class="nav-link <?php if(strpos(uri_string(), 'profile') !== false) { echo "active"; } ?>" aria-current="page" href="/profile/<?= $session->get('id_registrasi') ?>">Profile</a>
        </li>

    </ul>

    <div class="d-flex ml-auto nav-item ">
      <a class="nav-link" aria-current="page" href="/logout"><button type="button" class="btn btn-danger px-5">Logout</button></a>
    </div>  

  </div>
</nav>

<main class="container d-flex flex-column">
 
<?= $this->include("components/toast") ?>