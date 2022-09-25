<?php
include "connect.php";

$user="root";
$pass="";
$dbh = new PDO('mysql:host=localhost;dbname=pewoi', $user, $pass);
$sql = "SELECT event.eventId, event.eventTitle, event.eventContent, DATE_FORMAT(event.eventDate,'%d.%m.%Y '), location.location, users.userName, users.userSurname, event.eventImg FROM event
INNER JOIN location ON event.location_FK = location.locationId
INNER JOIN users ON event.creatorId = users.userId ORDER BY event.eventId DESC LIMIT 0,6" ;

?>


    <div class="popular_places_area">
        <div class="container">


            <!-- icerik baslik baslangıc -->
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>Etkinlikler</h3>
                        <p>Suffered alteration in some form, by injected humour or good day randomised booth anim 8-bit hella wolf moon beard words.</p>
                    </div>
                </div>
            </div>
            <!-- icerik baslik son -->
            <div class="row">

              <?php
              foreach ($dbh->query($sql) as $row) {
              ?>

                <!-- etkinlik gösterim başlangıç -->
                <div class="col-lg-4 col-md-6">
                    <div class="single_place">
                        <div class="thumb">
                            <div class="event-img" onClick="location.href='eventdetail.php?id=<?=$row[0]?>'" style="cursor: pointer; background-image: url('admindash\\image\\<?php print $row[7];?>');">

                            </div>
                            <a onClick="location.href='eventdetail.php?id=<?=$row[4]?>'" class="prise"><?php print $row[4];?></a>
                        </div>

                        <div class="place_info">
                            <a style="display: -webkit-box;
                          -webkit-line-clamp: 2;
                          -webkit-box-orient: vertical;
                          overflow:hidden; cursor: pointer;
                          " onClick="location.href='eventdetail.php?id=<?=$row[0]?>'">
                          <h3 class="eventhead"><?php print $row[1];?></h3></a>
                          <br>
                            <p class="ikincidonemikitarihgunfarki"></p>
                            <div class="rating_days d-flex justify-content-between">
                                <span class="d-flex justify-content-center align-items-center">
                                     <!-- <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i> -->
                                     <a href="#"><?php print $row[5]; echo " "; print $row[6];?></a>
                                </span>
                                <div class="days">
                                    <i class="fa fa-clock-o"></i>
                                    <a href="#"><?php print $row[3];?></a>
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
                        <a class="boxed-btn4" href="eventlist.php">Daha Fazla Etkinlik</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>


    .event-img {
    height: 204px;
    width: 362px;
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */

    background-repeat: no-repeat;
    background-size: cover;
    background-color: #f2efed;
    }


    .eventhead{
      text-transform:capitalize;
    }
    </style>
