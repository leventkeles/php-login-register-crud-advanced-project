<?php
    include "connect.php";
    include 'header.php';
    include 'logreg.php';
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
$veriler = $db->prepare("SELECT event.eventId AS id, event.eventTitle AS title, event.eventContent AS content, DATE_FORMAT(event.eventDate,'%d.%m.%Y ') AS dt, location.location AS locationn, users.userName AS name, users.userSurname AS surname, event.eventImg AS img FROM event
INNER JOIN location ON event.location_FK = location.locationId
INNER JOIN users ON event.creatorId = users.userId ORDER BY event.eventId DESC LIMIT :basla, :bitir");
$veriler->bindValue(":basla",$limit,PDO::PARAM_INT);
$veriler->bindValue(":bitir",$goster,PDO::PARAM_INT);
$veriler->execute();
$dizi = $veriler->fetchAll(PDO::FETCH_OBJ);
 ?>

 <div class="popular_places_area" style="padding-top: 60px !important; padding-bottom: 0px !important;">
     <div class="container">
       <div class="row justify-content-center">

           <div class="col-lg">
               <div class="section_title text-center mb_70">
                 <h3>Etkinlikler</h3>
<?php
$user="root";
$pass="";
$dbh = new PDO('mysql:host=localhost;dbname=pewoi', $user, $pass);
$sqlloc = "SELECT * FROM location";
 ?>


<?php
foreach ($dbh->query($sqlloc) as $row) { //baştaki lokasyon tag'leri
?>
<a class="eventtag" onClick="location.href='eventlist.php?id=<?=$row[0]?>'" href="#"><?=$row[1]?></a>
<?php
}
?>





               </div>
           </div>
       </div>
       <!-- icerik baslik son -->
       <div class="row">



 <?php
 foreach ($dizi as $item) {
 ?>

 <div class="col-lg-4 col-md-6">
     <div class="single_place">
         <div class="thumb">
             <div class="event-img" onClick="location.href='eventdetail.php?id=<?php echo $item->id;?>'" style="cursor: pointer; background-image: url('admindash\\image\\<?php echo $item->img;?>');">

             </div>
             <a onClick="location.href='eventdetail.php?id=<?php echo $item->locationn;?>'" class="prise"><?php echo $item->locationn;?></a>
         </div>

         <div class="place_info">
             <a style="display: -webkit-box;
           -webkit-line-clamp: 2;
           -webkit-box-orient: vertical;
           overflow:hidden; cursor: pointer;
           " onClick="location.href='eventdetail.php?id=<?php echo $item->id;?>'">
           <h3 class="eventhead"><?php echo $item->title;?></h3></a>
           <br>
             <p class="ikincidonemikitarihgunfarki"></p>
             <div class="rating_days d-flex justify-content-between">
                 <span class="d-flex justify-content-center align-items-center">
                      <!-- <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i> -->
                      <a href="#"><?php echo $item->name; echo " ";?><?php echo $item->surname;?></a>
                 </span>
                 <div class="days">
                     <i class="fa fa-clock-o"></i>
                     <a href="#"><?php echo $item->dt;?></a>
                 </div>
             </div>
         </div>
     </div>
 </div>
  <!-- etkinlik gösterim son -->

  <?php
}
?>

</div>
<div class="row">
    <div class="col-lg-12">
        <div class="more_place_btn text-center">
          <ul class="sayfalama">
          <?php
          for($i = 1; $i<=$toplamSayfa;$i++)
          {
          ?>

          <li><a class="listnumber" href="eventlist.php?s=<?php echo $i;?>"><?php echo $i;?></a></li>
          <?php } ?>
          </ul>
        </div>
    </div>
</div>
</div>







<?php
    include 'footer.php';
 ?>

 <style>


 .event-img {
 height: 204px;
 width: 362px;
 background-color: rgb(0,0,0); /* Fallback color */
 background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
 background-position: center;
 background-repeat: no-repeat;
 background-size: cover;
 background-color: #f2efed;
 }

 .eventhead{
   text-transform:capitalize;
 }

.eventtag{

  background: #1EC6B6;
  padding: 7px 18px 4px 18px;
  display: inline-block;
  margin: 15px;
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

.eventtag:hover {
  background: #FF4A52;
  color: #fff;
}

ul li{
  display: inline;
}

.listnumber{

  background: #1EC6B6;
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



.eventlistarea {
  padding-top: 142px;
  padding-bottom: 150px;
  background: #F7FAFD;
}
 </style>
