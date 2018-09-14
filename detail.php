<?php 
$id = $_GET['id'];
include_once "ambildata_id.php";
$obj = json_decode($data);
$titles="";
$ids="";
$website="";
$no_telepon="";
$alamat="";
$lat="";
$long="";
$foto="";
foreach($obj->results as $item){
  $titles.=$item->nama_rs;
  $ids.=$item->id_rs;
  $website.=$item->website;
  $no_telepon.=$item->no_telepon;
  $alamat.=$item->alamat;
  $lat.=$item->latitude;
  $long.=$item->longitude;
  $foto.=$item->foto; 
}

$title = "Detail dan Lokasi : ".$titles;
include_once "header.php"; ?>

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAbXF62gVyhJOVkRiTHcVp_BkjPYDQfH5w"></script>

<script>

function initialize() {
  var myLatlng = new google.maps.LatLng(<?php echo $lat ?>,<?php echo $long ?>);
  var mapOptions = {
    zoom: 10,
    center: myLatlng
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading"><?php echo $titles ?></h1>'+
      '<div id="bodyContent">'+
      '<p><?php echo $alamat ?></p>'+
      '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Maps Info',
      icon:'img/clinic1.png'
  });
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
      <div class="row">
      <div class="col-md-5">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong> - Lokasi - </strong></h4>
            </div>
            <div class="panel-body">
              <div id="map-canvas" style="width:100%;height:565px;"></div>
            </div>
          </div>
        </div>



        <div class="row">
      <div class="col-md-6">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong> - Gambar - </strong></h4>
            </div>
            <div class="panel-body">
              <div><center> <img src='<?php echo $foto ?>' width=350px height=150px /> </center>  </div>
            </div>
          </div>
        </div>
        


        <div class="col-md-6">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong> - Detail - </strong></h4>
            </div>
            <div class="panel-body">
             <table class="table">
               <tr>
                 <th>Item</th>
                 <th>Detail</th>
                   </tr>
               <tr>
                 <td>Nama Rumah Sakit</td>
                 <td><h4><?php echo $titles ?></h4></td>
               </tr>
               <tr>
                 <td>Alamat</td>
                 <td><h4><?php echo $alamat ?></h4></td>
               </tr>
               <tr>
                 <td>No Telepon</td>
                 <td><h4><?php echo $no_telepon ?></h4></td>
               </tr>
               <tr>
                 <td>Website</td>
                 <td><h4><a href="http://<?php echo $web ?>"><?php echo $website ?></a></h4></td>
               </tr>
               <tr>
               </tr>
             </table>
            </div>
            </div>
          </div>


        </div>
      </div>
    </div>
    <?php include_once "footer.php"; ?>