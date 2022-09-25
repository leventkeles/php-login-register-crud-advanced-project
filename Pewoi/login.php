<?php
include "connect.php";
if ($_POST) {
    $userMail = trim($_POST["userMail"]);
    $userPasswd = trim($_POST["userPasswd"]);
    if (!$userMail || !$userPasswd) {
      echo '
      <div class="col-xl-12 col-md-12">
      <div class="alert alert-danger" role="alert">
      Boş alan bırakılamaz
      </div>
      </div>';
    } else {
        $uye_varmi = $db->prepare("SELECT * FROM user WHERE userMail = ? AND userPasswd = ? AND (userAuth = ? OR userAuth = ? OR userAuth = ? )");
        $uye_varmi->execute(array($userMail, $userPasswd, "1","2","3" ));
        if ($uye_varmi->rowCount() > 0) {
            $uye = $uye_varmi->fetch(PDO::FETCH_OBJ);

            $_SESSION["login"] = true;
            $_SESSION["userMail"] = $uye->userMail;
            $_SESSION["userId"] = $uye->userId;
            $_SESSION["userAuth"] = $uye->userAuth;
            header("Refresh: 1; url=admindash/index.php");


            echo '
            <div class="col-xl-12 col-md-12">
            <div class="alert alert-danger" role="alert">
            Başarılı
            </div>
            </div>';
        } else {
          echo '
          <div class="col-xl-12 col-md-12">
          <div class="alert alert-danger" role="alert">
          Başarısız
          </div>
          </div>';

        }
    }
}
?>
<body>
<!-- partial:index.partial.html -->
<header role="banner">
		<div id="cd-logo"><a href="#0"><img src="https://codyhouse.co/demo/login-signup-modal-window/img/cd-logo.svg" alt="Logo"></a></div>

		<nav class="main-nav">

      	<li><a class="cd" href="#0">Sign in</a></li>
			<ul>
				<!-- inser more links here -->

				<li><a class="cd-signin" href="#0">Sign in</a></li>
				<li><a class="cd-signup" href="#0">Sign up</a></li>
			</ul>
		</nav>
	</header>

	<div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
		<div class="cd-user-modal-container"> <!-- this is the container wrapper -->
			<ul class="cd-switcher">
				<li><a href="admindash.php">Sign in</a></li>
				<li><a href="#0">New account</a></li>
			</ul>

			<div id="cd-login"> <!-- log in form -->
				<form class="cd-form" method="post">

					<p class="fieldset" >
						    <input type="text" class="form-control" placeholder="Kullanıcı adınızı giriniz" name="userMail">


					</p>

					<p class="fieldset">
						<label class="image-replace cd-password" for="signin-password">Password</label>
						<input class="full-width has-padding has-border" id="signin-password" type="password"  name="userPasswd" placeholder="Password">
						<a href="#0" class="hide-password">Hide</a>

					</p>

						 <button type="submit" href="admindash.php" class="btn btn-primary">Giriş Yap</button>
					</p>
				</form>

				<p class="cd-form-bottom-message"><a href="#0">Forgot your password?</a></p>
				<!-- <a href="#0" class="cd-close-form">Close</a> -->
			</div> <!-- cd-login -->

			<div id="cd-signup"> <!-- sign up form -->
				<form class="cd-form">
					<p class="fieldset">
						<label class="image-replace cd-username" for="signup-username">Username</label>
						<input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Username">
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<label class="image-replace cd-email" for="signup-email">E-mail</label>
						<input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail">
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<label class="image-replace cd-password" for="signup-password">Password</label>
						<input class="full-width has-padding has-border" id="signup-password" type="text"  placeholder="Password">
						<a href="#0" class="hide-password">Hide</a>
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<input type="checkbox" id="accept-terms">
						<label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
					</p>

					<p class="fieldset">
						<input class="full-width has-padding" type="submit" value="Create account">
					</p>
				</form>

				<!-- <a href="#0" class="cd-close-form">Close</a> -->
			</div> <!-- cd-signup -->

			<div id="cd-reset-password"> <!-- reset password form -->
				<p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

				<form class="cd-form">
					<p class="fieldset">
						<label class="image-replace cd-email" for="reset-email">E-mail</label>
						<input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<input class="full-width has-padding" type="submit" value="Reset password">
					</p>
				</form>

				<p class="cd-form-bottom-message"><a href="#0">Back to log-in</a></p>
			</div> <!-- cd-reset-password -->
			<a href="#0" class="cd-close-form">Close</a>
		</div> <!-- cd-user-modal-container -->
	</div> <!-- cd-user-modal -->

</body>
