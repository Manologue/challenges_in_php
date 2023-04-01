<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
   <link rel="stylesheet" href="<?= DOC_ROOT ?>css/style.css">
</head>
<?php
if (isset($_COOKIE["theme"]) == "dark") {
   $mode = "dark";
} else {
   $mode = "light";
}
?>

<body class=<?= $mode ?>>
   <header>
      <nav class="<?= $mode ?> d-flex justify-content-between navbar navbar-expand-lg bg-body-tertiary">
         <div class="container-fluid">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <button class="<?= $mode ?> navbar-toggler" type="button" data-bs-toggle="collapse"
               data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
               aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="<?= $mode ?> navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="<?= DOC_ROOT ?>">Home</a>
                  </li>
                  <?php if (isset($_SESSION['role'])): ?>
                     <?php if ($_SESSION['role'] === 'admin'): ?>
                        <li class="nav-item">
                           <a class="nav-link" href="<?= DOC_ROOT ?>admin">Admin</a>
                        </li>
                     <?php endif ?>
                     <li class="nav-item">
                        <a class="<?= $mode ?> nav-link disabled">
                           <?= $_SESSION['role'] ?>:
                           <?= $_SESSION['username'] ?>
                        </a>
                     </li>
                     <li>
                        <a class="nav-link" href="<?= DOC_ROOT ?>logout">Logout</a>
                     </li>
                  <?php else: ?>
                     <li>
                        <a class="nav-link" href="<?= DOC_ROOT ?>login">Login</a>
                     </li>
                     <li>
                        <a class="nav-link" href="<?= DOC_ROOT ?>register">Register</a>
                     </li>
                  <?php endif ?>
               </ul>
            </div>
         </div>
         <p>
            <label class="switch m-5">
               <input type="checkbox" id="toggleTheme" <?php if (isset($_COOKIE["theme"]) == "dark") {
                  echo "checked";
               } ?>>
               <span class="slider round"></span>
            </label>
         </p>
      </nav>
   </header>
   <div class="d-flex align-items-center justify-content-center">
      <main>