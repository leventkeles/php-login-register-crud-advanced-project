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
                <li class="nav-item"><a class="nav-link" href="group-create.php">Grup Ekle</a></li>
                <li class="nav-item active"><a class="nav-link" href="group-delete.php">Grup Sil</a></li>
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
                  <h4 class="card-title">Grup Silme İşlemleri</h4>
                  <p class="card-description">
                    Bu tablodan herhangi bir grubu görüntüleyebilir, silebilirsiniz.
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                           Grup
                          </th>
                          <th>
                            Grup Id
                           </th>
                          <th>
                            Grup İsmi
                          </th>
                          <th>
                            Oluşturan
                          </th>
                          <th>
                            Üye Sayısı
                          </th>
                          <th>
                            İşlemler
                          </th>
                        </tr>
                      </thead>

                      <tbody>

                        <tr>
                          <td class="py-1">
                            <img src="images/faces/face1.jpg" alt="image"/>
                          </td>
                          <td>
                            #1
                          </td>
                          <td>
                            Example Name
                          </td>
                          <td>
                            Multan Scwartz
                          </td>
                          <td>
                           20.282
                          </td>
                          <td>
                            <button type="button" class="btn btn-info btn-sm">Görüntüle</button>
                            <button type="button" class="btn btn-danger btn-sm">Sil</button>
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="images/faces/face1.jpg" alt="image"/>
                          </td>
                          <td>
                            #1
                          </td>
                          <td>
                            Example Name
                          </td>
                          <td>
                            Multan Scwartz
                          </td>
                          <td>
                           20.282
                          </td>
                          <td>
                            <button type="button" class="btn btn-info btn-sm">Görüntüle</button>
                            <button type="button" class="btn btn-danger btn-sm">Sil</button>
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="images/faces/face1.jpg" alt="image"/>
                          </td>
                          <td>
                            #1
                          </td>
                          <td>
                            Example Name
                          </td>
                          <td>
                            Multan Scwartz
                          </td>
                          <td>
                           20.282
                          </td>
                          <td>
                            <button type="button" class="btn btn-info btn-sm">Görüntüle</button>
                            <button type="button" class="btn btn-danger btn-sm">Sil</button>
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="images/faces/face1.jpg" alt="image"/>
                          </td>
                          <td>
                            #1
                          </td>
                          <td>
                            Example Name
                          </td>
                          <td>
                            Multan Scwartz
                          </td>
                          <td>
                           20.282
                          </td>
                          <td>
                            <button type="button" class="btn btn-info btn-sm">Görüntüle</button>
                            <button type="button" class="btn btn-danger btn-sm">Sil</button>
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="images/faces/face1.jpg" alt="image"/>
                          </td>
                          <td>
                            #1
                          </td>
                          <td>
                            Example Name
                          </td>
                          <td>
                            Multan Scwartz
                          </td>
                          <td>
                           20.282
                          </td>
                          <td>
                            <button type="button" class="btn btn-info btn-sm">Görüntüle</button>
                            <button type="button" class="btn btn-danger btn-sm">Sil</button>
                          </td>
                        </tr>



                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>



          </div>
        </div>
<?php
include 'footer.php';
?>
