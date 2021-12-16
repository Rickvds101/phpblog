<nav class="pb-3 border-bottom">

<div class="d-flex justify-content-between pt-3">
<div class="p-2"><span class="fs-4 text-center">Blog</span></div>
<div class="p-2">
  <?php
  if(isset($_SESSION['logged_in'])){
    echo "
    <div class='dropdown'>
  <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
  ".$_SESSION['username']."
  </button>
  <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
    <li><a class='dropdown-item' href='Account.php'>Account</a></li>
    <li><a class='dropdown-item' href='logout.php'>Logout</a></li>
  </ul>
</div>
    ";
    }else{
    echo "
    <button class='btn btn-outline-secondary' data-bs-toggle='modal' data-bs-target='#login'>Login</button>
    <button class='btn btn-outline-secondary' data-bs-toggle='modal' data-bs-target='#registration'>Create Account</button>
    ";
    }
  ?>
</div>

</nav>