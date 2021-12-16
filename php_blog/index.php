<?php
include_once 'connection_database.php';
include_once 'Class_Posts.php';
include_once 'Class_User.php';
$Post = new Class_Posts();
$User = new Class_User();
session_start();
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
  <body>
    
  <div class="container py-4">
<?php include 'inc/nav.php'; ?>
</div>

<header class="container-fluid p-0 text-center">
    <div class="rounded-3 p-4 h-75" style="background-image: url('images/thumbnail.jpg'); padding: 8.5rem!important;">
        <h1 class="display-5 fw-bold">Welkom op deze Blog</h1>
        <p class="fs-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis iure minima illum minus quia temporibus nobis animi odit, ab, suscipit deleniti possimus saepe eos dolorem pariatur debitis, tenetur dolore perspiciatis?</p>

    </div>
</header>

    <?php
    $User->logIn();
    $User->createAccount();
    ?>

    <main class="container py-4">

    <form method="GET">
    <div class="d-flex justify-content-center mt-5 mb-5">
      <div class="p-2 w-50">
    <button name="category" value="history" class="btn btn-outline-secondary w-100">History <?php $Post->getAmountCategory("history"); ?></button>
      </div>
      <div class="p-2 w-50">
    <button  name="category" value="travel" class="btn btn-outline-secondary w-100">Travel <?php $Post->getAmountCategory("travel"); ?></button>
      </div>
    </div>
    </form>

<div class="container">
<div class="row">

<?php
    $Post->displayPosts("home_page");
    ?>
    


</div>
</div>

    <footer class="pt-3 mt-4 text-muted border-top">
    <?php include 'inc/modals.php'; ?>
      &copy; 2021

      
    </footer>
</main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
