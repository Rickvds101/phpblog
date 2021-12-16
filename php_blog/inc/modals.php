
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

	  <form method="POST">
	  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" name="submit_login" class="btn btn-primary">Submit</button>
</form>

      </div>
      <div class="modal-footer">
	  <a href="#" class="text-decoration-none">password forgotton?</a>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="registration" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create a account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

	  <form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="Help" class="form-text">* Your username can be between 4 and 23 characters</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email again</label>
    <input type="email" name="emailAgain" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    <div id="emailHelp" class="form-text">* More then eight characters</div>
    <div id="emailHelp" class="form-text">* one number required</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password Again</label>
    <input type="password" name="passwordAgain" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" name="submit_registration" class="btn btn-primary">Submit</button>
</form>

      </div>
      <div class="modal-footer">
	  <a href="#" class="text-decoration-none">password forgotton?</a>
      </div>
    </div>
  </div>
</div>

<!-- delete post modal -->
<div class="modal fade" id="delete_post" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="mb-3">
            <label class="col-form-label">are you sure you want to delete the post:</label>
            <input type="text" name="title" class="form-control" readonly>
          </div>
          <div class="mb-3">
          <button type="submit" name="yes" class="btn btn-secondary" data-bs-dismiss="modal">Yes</button>
          <button type="button" name="no" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>

  var exampleModal = document.getElementById('delete_post')
exampleModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var post = button.getAttribute('data-bs-whatever')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalTitle = exampleModal.querySelector('.modal-title')
  var modalBodyInput = exampleModal.querySelector('.modal-body input')

  modalTitle.textContent = 'New message to ' + post
  modalBodyInput.value = post
})
</script>