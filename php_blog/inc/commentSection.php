<div class="container login-container pt-4">
<div class="row">
<div class="col-xl-6 login-form-1">

<?php
$Comment->makeComment();

$id_of_URL = $_SERVER['REQUEST_URI'];   
$url_id = substr($id_of_URL, strpos($id_of_URL, "?") + 1);

if(isset($_SESSION['logged_in'])): ?>
<h3>Write your comment</h3>
<form method="POST">
<div class="form-group">
    <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
    </div>
    <div class="form-group">
        <input name="post_id" type="hidden" value="<?php echo $url_id ?>"/>
    </div>
    <div class="form-group">
        <button name="makeComment" type="submit" class="btn btn-primary">Comment</button>
    </div>
    
</form>
<?php else: ?>

<div class="container">
<h3>Log in to create a comment</h3>
<ul class="list-inline">
  <li class="list-inline-item">
  <a href='#login' data-toggle='modal'><button type="button" class="btn btn-secondary">Login</li></button></a>
  <a href='#registrate' data-toggle='modal'><button type="button" class="btn btn-secondary">registrate</li></button></a>
</ul>
  
</div>


  <?php endif ?>

<?php $Comment->deleteComment(); ?>



                </div>
                <div class="col-xl-6 login-form-2">
                <div class="text-left">
                <h6>All comment(<?php $Comment->countComments($url_id); ?>)</h6>
            </div>
            <?php $Comment->displayComments($url_id);
            
            ?>
            
                </div>
            </div>
        </div>