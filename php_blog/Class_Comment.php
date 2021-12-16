<?php
include_once 'connection_database.php';

Class Class_Comment extends db{


public function makeComment(){
    if(isset($_POST["makeComment"])){
  if(isset($_SESSION['logged_in'])){
  if(!empty($_POST['post_id']) || !empty($_POST['user_id']) || !empty($_POST['comment'])){
    $post_id = $_POST["post_id"];
    $user_id = $_SESSION['ID'];
    $comment = $_POST["comment"];
    $date = date("d-m-Y");

    $sql = $this->connect()->prepare("INSERT INTO comments (post_id, user_id, comment, date) VALUES (?,?,?,?)");
    $sql->execute(array($post_id, $user_id, $comment, $date));
}
}else{ header("Location: index.php?not?logged?in");  } 
}
}

public function displayComments($post_id){

    $sql = "SELECT * FROM comments INNER JOIN users ON comments.user_id=users.ID WHERE post_id = '$post_id' ORDER BY DATE DESC";

    if(!isset($_SESSION['logged_in'])){
        $_SESSION['username'] = "";
    }

    $result = $this->connect()->query($sql);
    if ($result->rowCount() > 0){
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "
        <div class='card p-3 mb-2'
                <div class='d-flex flex-row'>
                    <div class='d-flex flex-column ms-2'>
                        <h6 class='mb-1 text-primary'>".$row["username"]."</h6>
                        <p>".$row["comment"]."</p>
                        <div class='d-flex justify-content-between'>
                        <div class='d-flex flex-row gap-3 align-items-center'>
                            <div class='d-flex align-items-center'> <i class='fa fa-heart-o'></i> <span class='ms-1 fs-10'>".$row["date"]."</span> </div>";
                            if($row["username"] == $_SESSION['username']){
                                echo "
                            <form method='POST'>
                            <input type='hidden' name='comment' value='".$row["comment"]."'>
                            <input type='submit' id='delete_button' name='delete_comment' value='delete' style='background: none!important;
                            border: none;'>
                            </form>
                            "; }else{ echo "
                                ";}echo "
                        </div>
                    </div>
                    </div>
                </div>
                

            ";
}

}
}

public function deleteComment(){
if(isset($_POST["delete_comment"])){
    $sql = $this->connect()->prepare("DELETE FROM comments WHERE comment=? AND user_id=?");
    $sql->execute(array($_POST["comment"], $_SESSION['ID']));
}

}



public function countComments($post_id){
    $sql = "SELECT COUNT(comment) as total FROM comments WHERE post_id = '$post_id'";
    
    $result = $this->connect()->query($sql);
    if ($result->rowCount() > 0){
        
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

   echo $row["total"];
    }

}
}
}