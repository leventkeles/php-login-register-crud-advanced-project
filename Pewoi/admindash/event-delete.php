<?php
include "../connect.php";
if(!$_SESSION["login"]) {
header("Location:../index.php");
}
?>

<?php
$toplamVeri = $db->query("SELECT COUNT(*) FROM event")->fetchColumn(); // Tabloda kaç tane kayıt olduğunu buluyoruz
$goster = 3; // Her sayfada kaç veri görünsün
$toplamSayfa = ceil($toplamVeri / $goster);  // Toplam sayfa sayımızı buluyoruz sonucu yuvarlıyoruz
$sayfa = $_GET["s"]; // Sayfa numaramızı get metodu ile yolladığımız "s" değeri ile alıyoruz
if($sayfa < 1) $sayfa = 1; // Eğer kullanıcı sayfa numarasına 1'den küçük değer girerse 1.sayfayı gösteriyoruz
if($sayfa > $toplamSayfa) // Eğer kullanıcı sayfa numarasına toplam sayfadan daha fazla değer girerse en son sayfayı gösteriyoruz
{
    $sayfa = (int)$toplamSayfa;
}
$limit = ($sayfa - 1) * $goster;  // Veri tabanında listelemme yaparken limit ile kaçıncı veriden başladığını belirtiyoruz.
?>


<?php
$veriler = $db->prepare("SELECT event.eventId AS idd, event.eventTitle AS title, event.eventContent AS content, DATE_FORMAT(event.eventDate,'%d.%m.%Y ') AS dt, location.location AS locationn, users.userName AS name, users.userSurname AS surname, event.eventImg AS img FROM event
INNER JOIN location ON event.location_FK = location.locationId
INNER JOIN users ON event.creatorId = users.userId ORDER BY event.eventId DESC LIMIT :basla, :bitir");
$veriler->bindValue(":basla",$limit,PDO::PARAM_INT);
$veriler->bindValue(":bitir",$goster,PDO::PARAM_INT);
$veriler->execute();
$dizi = $veriler->fetchAll(PDO::FETCH_OBJ);
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
              <span class="menu-title">Etkinlikler</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="event-create.php">Etkinlik Ekle</a></li>
                <li class="nav-item active"> <a class="nav-link" href="event-delete.php">Etkinlik Sil</a></li>

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
                <li class="nav-item"><a class="nav-link" href="group-delete.php">Grup Sil</a></li>
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


            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Etkinlik Silme İşlemleri</h4>
                  <p class="card-description">
                    Bu tablodan herhangi bir etkinliği görüntüleyebilir, silebilirsiniz.
                  </p>
                  <div class="table-responsive">



                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                           Etkinlik Id
                          </th>
                          <th>
                           Etkinlik Adı
                           </th>
                          <th>
                            Etkinlik Tarihi
                          </th>
                          <th>
                            Konum
                          </th>
                          <th>
                            Oluşturan
                          </th>

                          <th>
                            İşlemler
                          </th>
                        </tr>
                      </thead>

                      <tbody>

                         <?php
                         foreach ($dizi as $item) {
                         ?>

                              <tr>
                               <td><?php echo "#"; echo $item->idd;  ?></td>
                               <td style="max-width:100px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><?php echo $item->title;?></td>
                               <td><?php echo $item->dt;?></td>
                               <td><?php echo $item->locationn;?></td>
                               <td><?php echo $item->name; echo " ";?><?php echo $item->surname;?></td>
                               <td>

                                 <button type="button" class="btn btn-info btn-sm" onClick=window.open("../eventdetail.php?id=<?=$item->idd;?>") ><i class="material-icons">visibility</i></button>
                                 <button type="button" class="btn btn-dark btn-sm"onClick=window.open("event-edit.php?id=<?=$item->idd;?>") data-toggle="modal"><i class="material-icons">edit</i></button>
                                 <button type="button" class="btn btn-danger btn-sm" onClick="location.href='eventdlt.php?pid=<?=$item->idd;?>'"  data-toggle="modal" data-target="#"><i class="material-icons">delete</i></button>
                               </td>
                             </tr>

                           </div>
                            <!-- etkinlik gösterim son -->

                            <?php
                          }
                          ?>

                          </div>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="more_place_btn text-center">
                          <ul class="sayfalama">
                          <?php
                          for($i = 1; $i<=$toplamSayfa;$i++)
                          {
                          ?>

                          <li><a class="listnumber" href="event-delete.php?s=<?php echo $i;?>"><?php echo $i;?></a></li>
                          <?php } ?>
                          </ul>
                        </div>
                    </div>
                </div>
              </div>
            </div>

                    <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bu etkinliği silmek istediğinizden emin misiniz?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Bu etkinliği silmek istediğinizden emin misiniz?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                <button type="button" onClick="" class="btn btn-primary">Etkinliği Sil</button>
              </div>
            </div>
          </div>
        </div>



          </div>
        </div>



<?php
include 'footer.php';
?>

<style>

ul li{
 display: inline;
}

ul li a:Hover{
  text-decoration: none;
}

.listnumber{

 background: #1c2331;
 padding: 7px 18px 4px 18px;
 display: inline-block;
 margin: 0 5px 30px;
 -webkit-border-radius: 18px;
 -moz-border-radius: 18px;
 border-radius: 18px;
 color: #fff;
 font-size: 16px;
 -webkit-transition: 0.3s;
 -moz-transition: 0.3s;
 -o-transition: 0.3s;
 transition: 0.3s;
}

.listnumber:hover {
 background: #FF4A52;
 color: #fff;
}


</style>
