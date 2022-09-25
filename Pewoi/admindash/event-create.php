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
          <li class="nav-item active">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title ">Etkinlikler</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item active"> <a class="nav-link" href="event-create.php">Etkinlik Ekle</a></li>
                <li class="nav-item"> <a class="nav-link" href="event-delete.php">Etkinlik Sil</a></li>

              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Gruplar</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="group-create.php">Grup Ekle</a></li>
                <li class="nav-item"><a class="nav-link" href="group-deletephp">Grup Sil</a></li>
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
          <?php



             if (isset($_POST["crtevent"])) {
                $eventTitle = trim($_POST["eventTitle"]);
                $eventContent = trim($_POST["eventContent"]);
                $eventDate = trim($_POST["eventDate"]);
                $location_FK = trim($_POST["location_FK"]);
                $filename = md5($_FILES['uploadfile']['name']).".jpg";
                $tempname = ($_FILES["uploadfile"]["tmp_name"]);
                $folder = "image/".$filename;



                if (!$eventTitle || !$eventContent || !$eventDate ||!$location_FK){



                  echo '
                  <div class="col-xl-12 col-md-12">
                  <div class="alert alert-danger" role="alert">
                  Kayıt başarısız, boş alan bırakılamaz!
                  </div>
                  </div>';
                }
                else{
                  $event_ekle = $db->prepare("INSERT INTO event (eventTitle, eventContent, eventDate, eventImg, location_FK,creatorId) VALUES (?,?,?,?,?,?)");
                  $event_ekle -> execute(array($eventTitle,$eventContent,$eventDate,$filename,$location_FK,$_SESSION["userId"]));


                  if (move_uploaded_file($tempname, $folder))  {
                    echo '
                    <div class="col-xl-12 col-md-12">
                    <div class="alert alert-succes" role="alert">
                    Kayıt başarılı!
                    </div>
                    </div>';
                    header("Refresh: 2; url=https://localhost/Pewoi/admindash/event-create.php");

                 }else{
                   echo '
                   <div class="col-xl-12 col-md-12">
                   <div class="alert alert-danger" role="alert">
                   Kayıt başarısız, resim yüklenirken bir hata oluştu!
                   </div>
                   </div>';
               }


                }

                }
          ?>


      <form class="col-12 grid-margin stretch-card" action="event-create.php"  method="post"  enctype="multipart/form-data">



          <div class="card">
            <div class="card-body">

              <h4 class="card-title">Yeni Etkinlik Ekle</h4>
              <p class="card-description">
                Yeni bir etkinlik girmek için gerekli alanların doldurulması gerekli.
              </p>
              <form class="forms-sample">
                <div class="form-group">
                  <label for="exampleInputName1">Başlık</label>
                  <input type="text" class="form-control" id="exampleInputName1" placeholder="Başlık giriniz..." name="eventTitle">
                </div>

                <div class="form-group">
                  <label for="location_FK">Konum</label>
                    <select class="form-control" name="location_FK" id="location_FK">
                      <option value="1">Çevrimiçi</option>
                      <option value="2">Ankara</option>
                      <option value="3">İstanbul</option>
                      <option value="4">İzmir</option>
                      <option value="5">Antalya</option>
                      <option value="6">Eskişehir</option>
                    </select>
                  </div>



                  <div class="form-group">
                    <label>Tarih Seç</label>
                    <div class="input-group col-xs-12">
                    <input type="date" name="eventDate">
                    </div>
                    </div>

                <div class="form-group">
                  <input type="file"
                         name="uploadfile"
                         value="" />

                  <div>

                  </div>
                  </div>


                <div class="form-group">
                  <label for="exampleTextarea1" >İçerik Yazısı</label>
                  <textarea class="form-control"  id="exampleTextarea1" rows="20" name="eventContent"></textarea>

<div class="form-group">
  userId: <?php echo $_SESSION["userId"]?>

</div>
                </div>
                <button type="submit" name="crtevent" class="btn btn-primary">Kaydet</button>
                <button class="btn btn-light">İptal</button>
              </form>
            </div>

        </div>
      </form>

        </div>
      </div>

<?php
include 'footer.php';
?>
