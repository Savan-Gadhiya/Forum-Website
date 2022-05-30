<!-- SignUp -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Signup for an iDiscuss Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/php/Forum Project/partials/_handleSignup.php" method="POST">
          <div class="form-group">
            <label for="Username">User Name</label>
            <input type="text" class="form-control" id="Username" name="SignupUsername">
          </div>
          <div class="form-group">
            <label for="SignpEmail">Email address</label>
            <input type="email" class="form-control" id="SignpEmail" aria-describedby="emailHelp" name="SignupEmail">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="SignpPassword">Password</label>
            <input type="password" class="form-control" id="SignpPassword" name="SignupPassword">
          </div>
          <div class="form-group">
            <label for="SignpcPassword">Confirm Password</label>
            <input type="password" class="form-control" id="SignpcPassword" name="SignupcPassword">
          </div>
          <!-- <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="SignpCheck1">
            <label class="form-check-label" for="SignpCheck1">Check me out</label>
          </div> -->
          <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>