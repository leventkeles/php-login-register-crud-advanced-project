<?php
include "connect.php";

$id = $_GET['id'];
$user="root";
$pass="";
$dbh = new PDO('mysql:host=localhost;dbname=pewoi', $user, $pass);
$sql = "SELECT event.eventId, event.eventTitle, event.eventContent, DATE_FORMAT(event.eventDate,'%d.%m.%Y '), location.location, users.userName, users.userSurname, event.eventImg FROM event
INNER JOIN location ON event.location_FK = location.locationId
INNER JOIN users ON event.creatorId = users.userId  WHERE event.eventId='$id' ORDER BY event.eventId" ;

?>


<?php
foreach ($dbh->query($sql) as $row) {
?>

<div class="parent" >
  <div class="event-bg"></div>
</div>


<div class="eventitle">
  <h1 style="color:black; text-transform:capitalize"><?php print $row[1];?></h1>
</div>


<div class="event-group">
<div class="event-img" ></div>
</div>


<div class="event-info row">
  <ul class="evntinitem col-lg">
    <li><a style="text-decoration:none; color: inherit; cursor: default;" ><span class="material-icons col">calendar_month</span><?php print $row[3];?></a></li>
    <li><a style="text-decoration:none; color: inherit; cursor: default;"><span class="material-icons col">my_location</span><?php print $row[4];?></a></li>
    <li><a style="text-decoration:none; color: inherit; cursor: default; width: 160px;overflow: hidden; text-overflow: ellipsis; " ><span class="material-icons col">create</span><?php print $row[5]; echo " "; print $row[6];?></a></li>
    <li><a style="text-decoration:none; color: inherit; cursor: default;" ><span class="material-icons col">people</span>Katılımcı: ----</a></li>
    <li><a href="#about"><span class="material-icons col">favorite_border</span>Favorilere Ekle</a></li>
  </ul>
</div>



  <div class="event-content">
    <i style="padding-right:15px; padding: 20px;" class="fa-map-marker-alt fa-lg"></i>
    <p style="padding: 20px; "><?php print nl2br($row[2]);?></p>
      <div class="event-button" onClick="location.href='index.php'" type="submit">
        <span style="padding-left:40%; padding-right:10px; "class="material-icons">group_add </span>Etkinliğe Katıl
      </div>


  </div>





<?php
}
?>

<style>

  .parent {
    width: 100%;
    height: 78%;
    overflow: hidden;
  }

  .eventitle{
    font-weight: bold;
    position: absolute;
    left: 50%;
    transform: translate(-50%, -680%);
    width: 60%;
    height: 10%;
    padding: auto;
    z-index: 1;
    text-align: center;
    text-shadow: 0px 0px 7px rgba(0, 0, 0, 0.39);
  }





  body, html {
  height: 100%;

  }



  .event-bg {
  background: rgb(0,176,155);
  background: linear-gradient(90deg, rgba(0,201,255,1) 0%, rgba(146,254,157,0.2) 100%), url("admindash\\image\\<?php print $row[7];?>");


  /* Add the blur effect */
  filter: blur(10px);
  -webkit-filter: blur(10px);
  -moz-filter: blur(10px);
  -o-filter: blur(10px);
  -ms-filter: blur(10px);
  z-index: -1;
   transform: scale(1.5);

  /* Full height */
  height: 60%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;

  }

  /* Position text in the middle of the page/image */
  .event-img {

  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  background-image: url("admindash\\image\\<?php print $row[7];?>");
  background-repeat: no-repeat;
  background-size: cover;
  background-color: #f2efed;
  font-weight: bold;
  position: absolute;
  border-radius: 10px 10px 0 0;
  left: 50%;
  transform: translate(-50%, -100%);
  width: 60%;
  height: 50%;
  z-index: 1;
  }

  .event-info{
    display: inline-block;
    z-index: 1;
    border:5px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 60%;
    color: #fff;
    background-color: #161c27;
    padding-bottom: 20px;
    padding-top: 30px;
  }


  ul{

    list-style-type: none;
   overflow: hidden;
   //background-color: #333333;
  }


  li {

    float: left;
  }

  li a {
    display: block;
    color: #fff;
    text-align: center;
    text-decoration: none;
  }

  li a:hover{
      color: #ff4a52;
  }

  .event-button:hover{
    background-color: #ff1822;
  }



  .rainbow{
    background-color: #343A40;
    border-radius: 4px;
    color: #fff;
    cursor: pointer;
    padding: 8px 16px;

  }

  .rainbow-5:hover{
     background-image:     linear-gradient(
        to right,
        #E7484F,
        #E7484F 16.65%,
        #F68B1D 16.65%,
        #F68B1D 33.3%,
        #FCED00 33.3%,
        #FCED00 49.95%,
        #009E4F 49.95%,
        #009E4F 66.6%,
        #00AAC3 66.6%,
        #00AAC3 83.25%,
        #732982 83.25%,
        #732982 100%,
        #E7484F 100%



      );
    animation:slidebg 2s linear infinite;
  }


  @keyframes slidebg {
    to {
      background-position:20vw;
    }
  }



  .event-button{
    cursor:pointer;
    display: inline-flex;
    align-items: center;
    margin-left: auto;
    margin-right: auto;
    margin-top: auto;
    margin-bottom: auto;
    padding: 20px;
    border: none;
    width: 100%;
    background-color: #FF4A52;
    color: white;
  }

  .event-content {
    border-radius: 0 0 10px 0;
    z-index: 1;
    background-color: #f7fafd;

    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 60%;
    border: 4px black;
    margin-bottom: 50px;


    /* position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, 80%); */

  }
</style>
