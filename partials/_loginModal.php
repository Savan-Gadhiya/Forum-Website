<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="loginModalLabel">Login to iDicuss</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="/php/Forum Project/partials/_handleLogin.php" method="POST">
					<div class="form-group">
						<label for="LogInemail">Email address</label>
						<input type="email" class="form-control" id="LogInemail" aria-describedby="emailHelp" name="LoginEmail">
						<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>
					<div class="form-group">
						<label for="LogInpassword">Password</label>
						<input type="password" class="form-control" id="LogInpassword" name="LoginPassword">
					</div>
					<div class="form-group form-check">
						<input type="checkbox" class="form-check-input" id="LogInCheck1">
						<label class="form-check-label" for="LogInCheck1">Check me out</label>
					</div>
					<button type="submit" class="btn btn-primary">Log in</button>
				</form>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
				</div>
			</div>
		</div>
	</div>
</div>