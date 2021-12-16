<?php
include_once 'connection_database.php';
include_once 'Class_Posts.php';
include_once 'Class_User.php';
include_once 'Class_Comment.php';
$Post = new Class_Posts();
$User = new Class_User();
$Comment = new Class_Comment();
$User->logIn();
$User->createAccount();
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
  <body class="container py-4">
    
<?php 
include 'inc/nav.php';
$Post->displayPosts("blog_page");
?>


<div class="container bg-2 text-left pt-5">
<div class="row mb-2">

<?php include_once 'inc/commentSection.php'; ?>

</div>

    <footer class="pt-3 mt-4 text-muted border-top">
    <?php include 'inc/modals.php'; ?>
      &copy; 2021

      
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
