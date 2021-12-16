<?php
include_once 'connection_database.php';
Class Class_Posts extends db{


public function countView($post_id){
  $sql = $this->connect()->prepare( "UPDATE posts SET views = views + 1 WHERE ID = ?"); // keertje fixen want als 2 mensen op zelfde moment viewen kan er probleempje komen want view in de database is zelfde voor alle 2 de gebruikers
  $sql->execute(array($post_id));
  }


public function getAmountCategory($wantedCategory){

    $sql = "SELECT COUNT(category) AS amountCategory FROM posts WHERE category = '$wantedCategory'";
    $result = $this->connect()->query($sql);
if ($result->rowCount() > 0){

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "(".$row["amountCategory"].")";
}

}
}





public function displayPosts($location){ 

    if($location == "home_page"){
    if(isset($_GET["category"])){
        switch ($_GET["category"]) {
          case "travel":
            $sql = "SELECT * FROM posts WHERE category = 'travel' ORDER BY views DESC";
            break;
          case "history":
            $sql = "SELECT * FROM posts WHERE category = 'history' ORDER BY views DESC";
            break;
          default:
            echo "something went wrong lol";
        }
    }else{
        $sql = "SELECT * FROM posts ORDER BY views DESC";
    }
$result = $this->connect()->query($sql);
if ($result->rowCount() > 0){

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
     
    if(strlen($row["introduction"] > 30)){
      $cutIntroduction = substr($row["introduction"], 0, 100);
      $cutIntroduction = substr($cutIntroduction, 0, strrpos($cutIntroduction, ' ')).'...';
    }

      echo "
      <div class='col-lg-4 col-md-6 mt-3'>
    <div class='card shadow-sm'>
      <img src='uploads/".$row["thumbnail"]."'class='card-img-top' style='height: 300px'>
      <div class='card-body' style='height: 250px'>
      <h4 class='card-title'>".$row["title"]."</h4>
      <h5><span class='badge bg-secondary'>".$row["category"]."</span></h5>
        <p class='card-text'>
        ".$cutIntroduction."
        </p>
        <div class='d-flex justify-content-between align-items-center'>
          <div class='btn-group'>
          <a href='blog.php?".$row["id"]."'><button type='button' class='btn btn-sm btn-outline-secondary'>View</button></a>
          </div>
          <small class='text-muted'>".$row["date"]."</small>
        </div>
      </div>
    </div>
  </div>
  ";
}
}
}elseif($location == "account_page"){
    $sql = "SELECT * FROM posts WHERE user_id =".$_SESSION['ID']." ORDER BY views DESC";
    $result = $this->connect()->query($sql);
if ($result->rowCount() > 0){

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      echo "
      <div class='list-group-item list-group-item-action py-3 lh-tight'>
      <div class='container'>
      <div class='row'>
      <div class='col-md-3'>
      <img src='uploads/".$row["thumbnail"]."'class='img-fluid img-thumbnail'>
      </div>
      <div class='col-md-8'>
      <div class='d-flex w-100 justify-content-between'>
        <strong class='position-relative'>".$row["title"]."</strong>
        <small class='text-muted'>".$row["date"]."</small>
      </div>
      <a href='update_post.php?".$row["id"]."'>
      <button type='button' class='btn btn-outline-secondary'>Update</button>
      </a>
      <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#delete_post' data-bs-whatever='".$row["title"]."' data-bs-whatever='".$row["id"]."'>Delete</button>
      </div>
      </div>
      </div>
    </div>
    ";
}


}
}elseif($location == "update_page"){

    $id_of_URL = $_SERVER['REQUEST_URI'];   
    $url_id = substr($id_of_URL, strpos($id_of_URL, "?") + 1); 

    $sql = "SELECT * FROM posts WHERE id = '$url_id'";
    $result = $this->connect()->query($sql);
if ($result->rowCount() > 0){

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      echo "
      <form method='POST' enctype='multipart/form-data'>
      <div class='container'>
  
    <div class='row'> 
      <div class='col-4'>
      <div class='form-group'>
      <label>Title</label>
      <input name='title' type='text' class='form-control' value='".$row["title"]."' placeholder='Title'>
    </div>
      </div>
  
      <div class='col-4'>
      <label>Choose a category</label>
      <select name='category' class='form-select'>
    <option value='".$row["category"]."'>".$row["category"]."</option>
    <option value='history'>History</option>
    <option value='travel'>travel</option>
    <option value='philosophy'Philosophy</option>
  </select>
      </div>
  
  
      <div class='col-4'>
      <div class='form-group'>
      <label>Thumbnail</label><br>
      <input name='file' type='file' class='form-control-file' value='".$row["thumbnail"]."' id='exampleFormControlFile1'>
    </div>
      </div>
  
    </div>
  
    <div class='row'> 
  
      <div class='col-12'>
      <div class='form-group'>
  <label>Introduction</label>
    <textarea name='introduction' class='form-control' aria-label='With textarea'>".$row["introduction"]."</textarea>
    </div>
      </div>
  
    </div>
  
    <div class='row'> 
  
  <div class='col-12'>
  <div class='form-group'>
  <label>Preface</label>
  <textarea name='preface' class='form-control' aria-label='With textarea'>".$row["preface"]."</textarea>
  </div>
  </div>
  
  </div>
  
  <div class='row'> 
  
  <div class='col-12'>
  <div class='form-group'>
  <label>Mid-Section</label>
  <textarea name='midsection' class='form-control' aria-label='With textarea'>".$row["midsection"]."</textarea>
  </div>
  </div>
  
  </div>
  
  <div class='row'> 
  
  <div class='col-12'>
  <div class='form-group'>
  <label>Mid-Section 2</label>
  <textarea name='midsection2' class='form-control' aria-label='With textarea'>".$row["midsection2"]."</textarea>
  </div>
  </div>
  
  </div>
  
  <div class='row'> 
  
  <div class='col-12'>
  <div class='form-group'>
  <label>End</label>
  <textarea name='end' class='form-control' aria-label='With textarea'>".$row["end"]."</textarea>
  </div>
  </div>
  
  </div>
  
  <div class='row'> 
  
  <div class='col-11'>
  
  </div>
  
  <div class='col-1'>
  <div class='form-group'>
  <button type='submit' name='update_post' class='btn btn-secondary m-1'>Primary</button>
  </div>
  </div>
  
  </div>
  
  </div>
  </form>
    ";
}
}
}elseif($location == "blog_page"){
  $id_of_URL = $_SERVER['REQUEST_URI'];   
  $url_id = substr($id_of_URL, strpos($id_of_URL, "?") + 1);    // <---- je moet nog ff en paar checks maken

  $sql = "SELECT * FROM posts WHERE id = $url_id";
  $result = $this->connect()->query($sql);
if ($result->rowCount() > 0){
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      echo "
      <div class='p-5 mb-4 bg-light rounded-3 text-center'>
      <div class='container-fluid py-5'>
        <h1 class='display-5 fw-bold'>".$row["title"]."</h1>
        <p class='col-md-12 fs-4'>".$row["introduction"]."</p>
      </div>
    </div>
    
<div class='container'>
<div class='row'>
    <div class='col-md-6'>
    ".$row["preface"]."
    </div>
    <div class='col-md-6'>
    <img src='uploads/".$row["thumbnail"]."' class='h-100 img-thumbnail' style='float: right'>
    </div>
</div>

<div class='row'>
    <div class='col-md-12'>
    ".$row["midsection"]."
    </div>
</div>

<div class='row'>
    <div class='col-md-12'>
    ".$row["midsection2"]."
    </div>
</div>
</div>
      ";
  
}
}
}

}


public function inputSecurity($rawData){
    $rawData = trim($rawData);
    $rawData = stripslashes($rawData);
    $rawData = htmlspecialchars($rawData);
    return $rawData;
}

public function updatePost(){
    if(isset($_POST["update_post"])){
        if(!empty($_SESSION['ID']) && !empty($_POST['category']) && !empty($_POST['file'])  && !empty($_POST['title'])  && !empty($_POST['introduction'])  && !empty($_POST['preface'])  && !empty($_POST['midsection'])  && !empty($_POST['midsection2'])  && !empty($_POST['end'])){
      

          $user_id = $_SESSION['ID'];
          $category = $_POST["category"];
          $thumbnail = $_FILES['file'];
          $title = $_POST["title"];
          $introduction = $_POST["introduction"];
          $preface = $_POST["preface"];
          $midsection = $_POST["midsection"];
          $midsection2 = $_POST["midsection2"];
          $end = $_POST["end"];
          $date = date("Y-m-d");
          $views = 0;
          $status = 0;

          $inputArray = array($user_id, $category, $thumbnail, $title, $introduction, $preface, $midsection, $midsection2, $end, $views, $date, $status);
          for($x =  0; $inputArray <= $x; $x++){
          $this->inputSecurity($rawData);
          }
          $id_of_URL = $_SERVER['REQUEST_URI'];   
          $url_id = substr($id_of_URL, strpos($id_of_URL, "?") + 1); 
          

          $thumbnail = $this->uploadThumbnail($thumbnail);
      
   
          $sql = $this->connect()->prepare("UPDATE posts SET user_id = ?, category = ?,thumbnail = ?,title = ?,introduction = ?,preface = ?,midsection = ?,midsection2 = ?,end = ?,views = ?,date = ?,status = ? WHERE id = ?");
          $sql->execute(array($user_id, $category, $thumbnail, $title, $introduction, $preface, $midsection, $midsection2, $end, $views, $date, $status, $url_id));
      }
      }
}

public function deletePost($user_id){
  if(isset($_POST["yes"]) && isset($_POST["title"])){

    $title = $_POST["title"];
 
    $this->inputSecurity($title);
    $sql = $this->connect()->prepare("DELETE FROM posts WHERE title=? AND user_id =?;");
    $sql->execute(array($title, $user_id));
  }
}


public function CreatePost(){
    if(isset($_POST["submit_post"])){
  if(!empty($_SESSION['ID']) || !empty($_POST['category']) || !empty($_POST['file'])  || !empty($_POST['title'])  || !empty($_POST['introduction'])  || !empty($_POST['preface'])  || !empty($_POST['midsection'])  || !empty($_POST['midsection2'])  || !empty($_POST['end'])){


    $user_id = $_SESSION['ID'];
    $category = $_POST["category"];
    $thumbnail = $_FILES['file'];
    $title = $_POST["title"];
    $introduction = $_POST["introduction"];
    $preface = $_POST["preface"];
    $midsection = $_POST["midsection"];
    $midsection2 = $_POST["midsection2"];
    $end = $_POST["end"];
    $date = date("Y-m-d");
    $views = 0;
    $status = 0;

 
    $inputArray = array($user_id, $category, $thumbnail, $title, $introduction, $preface, $midsection, $midsection2, $end, $views, $date, $status);
    for($x =  0; $inputArray <= $x; $x++){
    $this->inputSecurity($rawData);
    }

    
    $thumbnail = $this->uploadThumbnail($thumbnail);

    $sql = $this->connect()->prepare("INSERT INTO posts (user_id, category, thumbnail, title, introduction, preface, midsection, midsection2, end, views, date, status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
    $sql->execute(array($user_id, $category, $thumbnail, $title, $introduction, $preface, $midsection, $midsection2, $end, $views, $date, $status));
}
}
}

public function uploadThumbnail($file){    
    

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileSplit = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileSplit));

    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($fileActualExt, $allowed)){
    if($fileError === 0){
    if($fileSize < 5000000){
    $fileNameNew = "thumbnail_".$fileName;
    $fileDestination = 'uploads/'.$fileNameNew;
    move_uploaded_file($fileTmpName, $fileDestination);
    $thumb = $fileNameNew;
    return $thumb;
    
    }else{ echo "foto is te groot"; }
    }else{ echo "er ging iets verkeerd bij het uploaden"; }
    }else{ echo "verkeerde type foto"; }
    }


}