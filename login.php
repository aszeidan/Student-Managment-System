
<?php
require_once('Header.php');
?>

<!-- Page content -->
<div>
<h2 class="" style="padding-top:50px; text-align:center">Login Form</h2>
</div>

<div class="container" style="padding-left:300px; padding-right:300px;">
<form action="/action_page.php" method="post">
  <div class="imgcontainer">
    <img src="C:\Users\Admin\Desktop\Project\images\profile-male-circle2-512.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit" >Login</button>
	
	<div>
		<label>
			<input type="checkbox" checked="checked" name="remember"> Remember me
		</label>
		<a href="#" class="psw" style="float: right;">Forgot password?</a>
	</div>
	
  </div>
</form>
</div>



<?php
require_once('Footer.php');?>


