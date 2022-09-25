<?php
include "../connect.php";
if(!$_SESSION["login"]) {
header("Location:../index.php");
}
?>

<?php
include 'header.php';
 ?>

 <?php
 $id = $_GET['id'];
 $user="root";
 $pass="";
 $dbh = new PDO('mysql:host=localhost;dbname=pewoi', $user, $pass);
 $sql = "SELECT event.eventId, event.eventTitle, event.eventContent AS content, DATE_FORMAT(event.eventDate,'%d.%m.%Y ') AS dt , location.location AS loct , users.userName, users.userSurname, event.eventImg AS eventimg FROM event
 INNER JOIN location ON event.location_FK = location.locationId
 INNER JOIN users ON event.creatorId = users.userId  WHERE event.eventId='$id'" ;

 $veriler = $db->prepare("SELECT event.eventId AS id, event.eventTitle AS title, event.eventContent AS content, DATE_FORMAT(event.eventDate,'%d.%m.%Y ') AS dt, location.location AS locationn, users.userName AS name, users.userSurname AS surname, event.eventImg AS img FROM event
 INNER JOIN location ON event.location_FK = location.locationId
 INNER JOIN users ON event.creatorId = users.userId WHERE event.eventId='$id'");
 $veriler->execute();
 $dizi = $veriler->fetchAll(PDO::FETCH_OBJ);
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
            if (!$filename || !$tempname || !$folder){
              $event_guncelle = $db->prepare("UPDATE event SET eventTitle=?, eventContent=?, eventDate=?, location_FK=? WHERE eventId='$id'");
              $event_guncelle -> execute(array($eventTitle,$eventContent,$eventDate,$location_FK));
              echo '
              <div class="col-xl-12 col-md-12">
              <div class="alert alert-succes" role="alert">
              Güncelleme başarılı ile tamamlandı, yönlendiriliyorsunuz...
              </div>
              </div>';
              header("Refresh: 2;");
            }
            else{
              $event_guncelle = $db->prepare("UPDATE event SET eventTitle=?, eventContent=?, eventDate=?, location_FK=?, eventImg=? WHERE eventId='$id'");
              $event_guncelle -> execute(array($eventTitle,$eventContent,$eventDate,$location_FK, $filename));


              if (move_uploaded_file($tempname, $folder))  {
                echo '
                <div class="col-xl-12 col-md-12">
                <div class="alert alert-succes" role="alert">
                Güncelleme başarılı ile tamamlandı, yönlendiriliyorsunuz...
                </div>
                </div>';
                header("Refresh: 2;");

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

      <form class="col-12 grid-margin stretch-card"  method="post"  enctype="multipart/form-data">



          <div class="card">
            <div class="card-body">

              <?php
              foreach ($dizi as $item) {
              ?>

              <h4 class="card-title">Etkinliği Düzenle</h4>
              <p class="card-description">
                Düzenlemek istediğin alanı düzenleyip kaydedebilirsiniz.
              </p>
              <form class="forms-sample">
                <div class="form-group">

                  <label for="exampleInputName1">Başlık</label>
                  <input value="<?php echo $item->title;?>" type="text" class="form-control" id="exampleInputName1" placeholder="Başlık giriniz..." name="eventTitle">
                </div>
                <div class="form-group">
                  <label for="location_FK">Konum</label>
                    <select class="form-control" name="location_FK" id="location_FK">

                      <option <?php if ($item->locationn=="Çevrimiçi") echo "selected"; ?> value="1">Çevrimiçi</option>
                      <option <?php if ($item->locationn=="Ankara") echo "selected"; ?> value="2">Ankara</option>
                      <option <?php if ($item->locationn=="Istanbul") echo "selected"; ?> value="3">İstanbul</option>
                      <option <?php if ($item->locationn=="İzmir") echo "selected"; ?> value="4">İzmir</option>
                      <option value="5">Antalya</option>
                      <option value="6">Eskişehir</option>
                    </select>
                  </div>



                  <div class="form-group">
                    <label>Tarih Seç</label>
                    <div class="input-group col-xs-12">
                    <input value="<?php echo date('Y-m-d',strtotime($item->dt))?>" type="date" name="eventDate">
                    </div>

                  </div>


                  <div class="form-group">
                    <div class="thumb">
                        <div class="event-img" style="cursor: pointer; ">


                          <img id="resim" alt="your image" width="362" height="204" src="image\\<?php echo $item->img;?>" />
                        </div>

                  </div>

                <div class="form-group">
                  <input type="file"
                        onchange="$('#resim')[0].src = window.URL.createObjectURL(this.files[0])"
                         name="uploadfile"
                         value="" />
                </div>


                <div class="form-group">
                  <label for="exampleTextarea1" >İçerik Yazısı</label>
                  <textarea class="form-control"  id="exampleTextarea1" rows="20" name="eventContent"><?php echo $item->content;?></textarea>
                </div>

                <?php
                }
                ?>
                <button type="submit" name="crtevent" class="btn btn-primary">Güncelle</button>
                <button onclick="window.close()" class="btn btn-light">İptal</button>
              </form>
            </div>

        </div>
      </form>

        </div>
      </div>

      <style media="screen">
      .event-img {
      height: 204px;
      width: 362px;
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      background-color: #f2efed;
      margin-bottom: 20px;
      }
      </style>

<?php
include 'footer.php';
?>
