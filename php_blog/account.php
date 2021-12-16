<?php
include_once 'connection_database.php';
include_once 'Class_Posts.php';
include_once 'Class_User.php';
$Post = new Class_Posts();
$User = new Class_User();
session_start();
$Post->deletePost($_SESSION['ID']);
$User->securePage($_SESSION['logged_in']);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="R.S">
    <title>blog</title>
    <!-- Bootstrap core CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/js/bootstrap.min.js" rel="stylesheet">

    
  </head>
  <body class="container py-4">
    
<?php include 'inc/nav.php'; ?>

    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Welkom op je account</h1>
        <p class="col-md-8 fs-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis iure minima illum minus quia temporibus nobis animi odit, ab, suscipit deleniti possimus saepe eos dolorem pariatur debitis, tenetur dolore perspiciatis?</p>
      </div>
    </div>

    <?php

    ?>

    
<div class="container">
<div class="row">

<div class="col-md-6">hoi</div>
<div class="col-md-6">
<div class="b-example-divider"></div>

  <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white">
    <div class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
      <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-5 fw-semibold">List group</span>
</div>
    <div class="list-group list-group-flush border-bottom">
 


    </div>
  </div>

  <div class="b-example-divider"></div>
  <?php
    $Post->displayPosts("account_page");
    ?>


</div>

</div>

</div>

    <footer class="pt-3 mt-4 text-muted border-top">
    <?php include 'inc/modals.php'; ?>
      &copy; 2021

      
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>