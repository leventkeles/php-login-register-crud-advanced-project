

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Pewoi Admin</title>
  <!-- plugins:css -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">

  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />

  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->

</head>
<body>

  <!-- header başlangıç -->
  <div class="container-scroller">
    <!-- navbar bölümü - başlangıç -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="images/logo.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">


        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>


        <!-- arama bölümü - başlangıç -->
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control searchinpt" id="navbar-search-input" placeholder="Şimdi Ara" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <!-- arama bölümü - son -->


        <!-- navbar sağ taraf - profil isim ayar - başlangıç -->
        <ul class="navbar-nav navbar-nav-right">
          <!-- Profil resmi ve tıklanınca profil menüsünün açılması - başlangıç -->
          <li class="nav-item nav-profile dropdown" style="padding-left:30px;">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <?php if(!$_SESSION['userImg']==""){ echo '<img alt="profile"src="data:image/jpeg;base64,' . base64_encode( $_SESSION['userImg'] ) . '" />';  ?>
              <?php } else {
                echo '<img alt="profile" src="image/profile.png"/>';
              }
                ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Ayarlar
              </a>
              <a onClick="location.href='logout.php'" class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Çıkış

              </a>
            </div>
          </li>
          <!-- Profil resmi ve tıklanınca profil menüsünün açılması - son -->
        </ul>

          <!-- class a nav-settings eklenirse yan menü açılacak - başlangıç -->
          <ul style="vertical-align: middle;">
            <li class="nav-item  d-none d-lg-flex" style="padding-top:8px;">
              Hoş Geldin,

            </li>
            <li class="nav-item  d-none d-lg-flex" style="line-height:0.5 !important; font-weight:bold; color: #ffF; ">
             <?php echo $_SESSION["userName"];?>!
            </li>
          </ul>

          <!-- class a nav-settings eklenirse yan menü açılacak - son -->

        <!-- navbar sağ taraf - profil isim ayar - son -->


      </div>
    </nav>
    <!-- navbar bölümü - son -->

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->

       <!-- 3 nokta ayarlar - başlangıç -->
       <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>

            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>


          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>

          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- 3 nokta ayarlar bitiş -->
