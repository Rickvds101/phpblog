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

    <form method="POST" enctype="multipart/form-data">
    <div class="container">

  <div class="row"> 
    <div class="col-4">
    <div class="form-group">
    <label for="">Title</label>
    <input name="title" type="text" class="form-control" placeholder="Title">
  </div>
    </div>

    <div class="col-4">
    <label for="">Choose a category</label>
    <select name="category" class="form-select">
  <option selected>Categories</option>
  <option value="history">History</option>
  <option value="travel">travel</option>
  <option value="philosophy">Philosophy</option>
</select>
    </div>


    <div class="col-4">
    <div class="form-group">
    <label for="">Thumbnail</label><br>
    <input name="file" type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>
    </div>

  </div>

  <div class="row"> 

    <div class="col-12">
    <div class="form-group">
<label for="">Introduction</label>
  <textarea name="introduction" class="form-control" aria-label="With textarea"></textarea>
  </div>
    </div>

  </div>

  <div class="row"> 

<div class="col-12">
<div class="form-group">
<label for="">Preface</label>
<textarea name="preface" class="form-control" aria-label="With textarea"></textarea>
</div>
</div>

</div>

<div class="row"> 

<div class="col-12">
<div class="form-group">
<label for="">Mid-Section</label>
<textarea name="midsection" class="form-control" aria-label="With textarea"></textarea>
</div>
</div>

</div>

<div class="row"> 

<div class="col-12">
<div class="form-group">
<label for="">Mid-Section 2</label>
<textarea name="midsection2" class="form-control" aria-label="With textarea"></textarea>
</div>
</div>

</div>

<div class="row"> 

<div class="col-12">
<div class="form-group">
<label for="">End</label>
<textarea name="end" class="form-control" aria-label="With textarea"></textarea>
</div>
</div>

</div>

<div class="row"> 

<div class="col-11">

</div>

<div class="col-1">
<div class="form-group">
<button type="submit" name="submit_post" class="btn btn-secondary m-1">Primary</button>
</div>
</div>

</div>

</div>
</form>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>