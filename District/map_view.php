
<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 


<style type="text/css">
    #map img { 
    max-width: none;
    }
    
    #map label { 
    width: auto; display:inline; 
    } 
</style>

</head> 
<body>
<h2 id="headings">Loactions </h2>
<a href='index.php?mod=District&pg=District_view'><i class="icon-list"></i>List View</a>
  <div id="map" style="width: 100%; height: 400px;"></div>

  <script type="text/javascript">
    var locations = [
   <?php
    include('inc/config.php');
    $sql_lokasi="select nama,lat,lng
    from provinsi  ";
    $result=query($sql_lokasi);
    while($data=mysql_fetch_object($result)){
    	 ?>
    	    ['<?php echo $data->nama;?>', <?php echo $data->lat;?>, <?php echo $data->lng;?>],
    <?php
    }
    ?>
    
    
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 7,
	  scaleControl: true,
      center: new google.maps.LatLng(24.006355, 89.249298 ),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();
    var marker, i;
    
    for (i = 0; i < locations.length; i++) {  
        marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
      
    }
  </script>
</body>
</html>