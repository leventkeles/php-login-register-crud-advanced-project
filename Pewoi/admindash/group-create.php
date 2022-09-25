<?php
include "../connect.php";
if(!$_SESSION["login"]) {
header("Location:../index.php");
}
?>

<?php
include 'header.php';

?>

       <!-- yan menü başlangıç -->
       <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Anasayfa</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Etkinlikler</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="event-create.php">Etkinlik Ekle</a></li>
                <li class="nav-item"> <a class="nav-link" href="event-delete.php">Etkinlik Sil</a></li>

              </ul>
            </div>
          </li>
          <li class="nav-item active">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Gruplar</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item active"><a class="nav-link" href="group-create.php">Grup Ekle</a></li>
                <li class="nav-item "><a class="nav-link" href="group-delete.php">Grup Sil</a></li>
              </ul>
            </div>
          </li>



          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Kullanıcı</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="user-delete.php">Kullanıcı Sil</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">Profil Resmi</a></li>
              </ul>
            </div>
          </li>

        </ul>
      </nav>
      <!-- yan menü bitiş -->



  <!-- iç kısım panel başlangıç -->
  <div class="main-panel">

  <div class="content-wrapper">
        <div class="row">




          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Yeni Grup Ekle</h4>
                <p class="card-description">
                  Yeni bir grup girmek için gerekli alanların doldurulması gerekli.
                </p>
                <form class="forms-sample">
                  <div class="form-group">
                    <label for="exampleInputName1">Başlık</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Başlık giriniz...">
                  </div>


                  <div class="form-group">
                    <label>Grup Görseli</label>
                    <input type="file" name="img[]" class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Görsel Yükle">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Görseli Seç</button>
                      </span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleTextarea1">Grup Hakkında</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="20"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Kaydet</button>
                  <button class="btn btn-light">İptal</button>
                </form>
              </div>
            </div>
          </div>
          </div>
<?php
include 'footer.php';
?>
