
<form id="test-form" class="white-popup-block mfp-hide" method="post">
   <div class="popup_box" id="popup_box">
       <div class="popup_inner">
           <div class="logo text-center">
               <a href="#">
                   <img src="img/login-logo.png" alt="">
               </a>
           </div>
           <h3>Hesaba Giriş</h3>
           <form action="" method="post" >
               <div class="row">
                   <div class="col-xl-12 col-md-12">
                       <input type="email" name="userMail" placeholder="E-Mail">
                   </div>
                   <div class="col-xl-12 col-md-12">
                       <input type="password" name="userPasswd" placeholder="Şifre">
                   </div>
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
                            $uye_varmi = $db->prepare("SELECT * FROM users WHERE userMail = ? AND userPasswd = ? AND (userAuth = ? or userAuth = ? or userAuth= ?)");
                            $uye_varmi->execute(array($userMail, $userPasswd, "1","2","3"));
                            if ($uye_varmi->rowCount() > 0) {
                                $uye = $uye_varmi->fetch(PDO::FETCH_OBJ);


                                $_SESSION["login"] = true;
                                $_SESSION["userMail"] = $uye->userMail;
                                $_SESSION["userId"] = $uye->userId;
                                $_SESSION["userName"] = $uye->userName;
                                $_SESSION["userSurname"] = $uye->userSurname;
                                $_SESSION["userAuth"] = $uye->userAuth;
                                $_SESSION["userImg"] = $uye->userImg;


                                echo '
                                <div class="col-xl-12 col-md-12">
                                <div class="alert alert-succes" role="alert">
                                Başarılı
                                </div>
                                </div>';
                                header("Location: index.php");



                            } else {
                              echo '
                              <div class="col-xl-12 col-md-12">
                              <div class="alert alert-danger" role="alert">
                              Başarısız
                              </div>
                              </div>';

                              echo "<script>$(''#test-form','.popup_inner').modal('show')</script>";

                            }
                        }
                    }
                    ?>
                   <div class="col-xl-12">
                       <button type="submit" class="boxed_btn_orange" id="formgitme" name="girisyap" onclick="form_submit()">Giriş Yap</button>
                   </div>
               </div>
           </form>
           <p class="doen_have_acc">Bir hesabın yok mu? <a class="dont-hav-acc" href="#test-form2">Kayıt Ol</a>
           </p>
       </div>
   </div>
</form>


<form id="test-form2" class="white-popup-block mfp-hide" method="post" >
   <div class="popup_box ">
       <div class="popup_inner">

           <h3>Üye Kayıt</h3>
           <form >
               <div class="row">
                   <div class="col-xl-12 col-md-12">
                       <input type="email" name="userMail" placeholder="E-Mail">
                   </div>
                   <div class="col-6">
                       <input type="ad" name="userName" placeholder="Ad">
                   </div>
                   <div class="col-6">
                       <input type="soyad" name="userSurname" placeholder="Soyad">
                   </div>

                   <div class="col">
                     <p class="p-2" >Doğum Tarihi</p>
                   </div>
                   <div class="col">
                     <input type="date" name="birthDate" placeholder="Yaş" >
                   </div>
                   <div class="col-xl-12 col-md-12">
                       <input type="username" name="userNickname" placeholder="Kullanıcı Adı">
                   </div>

                   <div class="col-xl-12 col-md-12">
                       <input type="password" name="userPasswd" placeholder="Şifre">
                   </div>


									 <?php

									 if (isset($_POST["kayitol"])) {

										 	 $userNickname = trim($_POST["userNickname"]);
										   $userMail = trim($_POST["userMail"]);
										 	 $userName = trim($_POST["userName"]);
										   $userSurname = trim($_POST["userSurname"]);
										   $userMail = trim($_POST["userMail"]);
										   $userPasswd = trim($_POST["userPasswd"]);
											 $birthDate = trim($_POST["birthDate"]);

											 $bugun = date("Y-m-d");
											 $uye_ekle = $db->prepare("INSERT INTO users (userName, userSurname, userMail, userNickname, userPasswd, userAuth, birthDate, regDate) VALUES (?,?,?,?,?,1,?,?)");
											 $uye_ekle -> execute(array($userName,$userSurname,$userMail,$userNickname,$userPasswd, $birthDate, $bugun));
											 header('Location: https://localhost/Pewoi/index.php');
											 if ($uye_ekle){
											 	echo '
											 	<div class="col-xl-12 col-md-12">
											  <div class="alert alert-danger" role="alert">
											  Başarılı
											  </div>
											  </div>';


											 }else{
											 	echo '
											 	<div class="col-xl-12 col-md-12">
											 	<div class="alert alert-danger" role="alert">
											 	Başarısız
											 	</div>
											 	</div>';
											  }

									 }
									 ?>
                   <div class="col-xl-12">
                       <button type="submit" name="kayitol" class="boxed_btn_orange">Kayıt Ol</button>
                   </div>
               </div>
           </form>
       </div>
   </div>
</form>
