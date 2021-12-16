<?php
include_once 'connection_database.php';
include_once 'Class_Posts.php';
include_once 'Class_User.php';
session_start();
$Post = new Class_Posts();
$User = new Class_User();
$User->securePage($_SESSION['logged_in']);
$Post->CreatePost();
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

    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
      <h2>Checkout form</h2>
      <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    </div>


    <?php
    $Post->displayPosts("update_page");
    $Post->updatePost();
    ?>

    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>