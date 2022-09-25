<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pewoi - enjoy together!</title>
    <meta name="keywords" content="etkinlikler, meetup, ankara etkinlikler, ankara konser">
    <meta name="description" content="Meetup ve Etkinlikler">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="img/favicon.png" />

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>


    <header>
      <nav class="main-nav">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
              rel="stylesheet">
      </nav>
    <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="index.php">
                                        <img src="img/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a class="active" href="index.php">Anasayfa</a></li>

                                            <li><a class="" href="eventlist.php">Etkinlikler</a></l/li>
                                            <!-- <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                        <li><a href="destination_details.html">Destinations details</a></li>
                                                        <li><a href="elements.html">elements</a></li>
                                                </ul>
                                            </li> -->

                                            <li><a class="" href="#">Gruplar</a></l/li>
                                            <li><a class="" href="#">Yardım</a></l/li>
                                                <ul class="submenu">
                                                    <li><a href="#">Sıkça Sorulan Sorular (SSS)</a></li>
                                                    <li><a href="#">İletişim</a></li>
                                            </ul>


                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                                <div class="social_wrap d-flex align-items-center justify-content-end">
                                </div>
                            </div>

                            <?php
                            include "../connect.php";
                            if(!$_SESSION["login"]) {
                            echo '
                            <div class="seach_icon">
                                <a href="#test-form" class="login popup-with-form">
                                    <i class="fa fa-user-o fa-lg"></i>
                                </a>
                            </div>
                            ';
                            }
                            else {
                              echo '
                              <div class="logined-area dropdown">
                                <a>
                                  <i class="dropbtn" style="left: 20% !important;" href="#">
                              ';
                              if(!$_SESSION['userImg']==""){
                                echo '<img style=" width: 45px;height: 45px;border: 3px solid #f2f6fc; vertical-align: middle; border-radius: 100%;" alt="profile"src="data:image/jpeg;base64,' . base64_encode( $_SESSION['userImg'] ) . '" />';
                                } else {
                                echo '<img alt="profile" style="margin-right:20px; width: 45px;height: 45px;vertical-align: middle; border: 3px solid #f2f6fc;border-radius: 100%;" src="admindash/image/profile.png"/>';
                                }

                              echo '
                              </i>
                              <i style="padding-left:20px !important;">Merhaba,'; ?>  <?php session_start(); echo $_SESSION["userName"]; echo " "; echo $_SESSION["userSurname"];?>  <?php echo '</i>
                              </a>
                              <div class="dropdown-content">
                                <a href="#"><span class="material-icons">event</span>Etkinlik Gir</a>
                                <a href="#"><span class="material-icons">favorite</span>Favori Etkinlikler</a>
                                <a href="#"><span class="material-icons">settings</span>Ayarlar</a>
                                ';
                                ?>

                                <?php
                                if ($_SESSION["userAuth"] == "3") {
                                  echo '
                                  <a  style="cursor: pointer;" onClick=window.open("admindash/index.php")><span class="material-icons">admin_panel_settings</span>Admin Paneli Giriş</a>
                                  ';
                                }
                                ?>

                                <?php
                                echo '
                                <a href="logout.php"><span class="material-icons">logout</span>Çıkış</a>
                                </div>
                                </div>
                                ';
                                }
                                 ?>






                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>

                    </div>

                </div>
            </div>
        </div>
    </header>
