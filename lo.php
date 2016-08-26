<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles/theme.css">
  </head>
  <style>
      html,body{
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #mainContent {
        height: 100%;
      }
    </style>
  <body>
  
     <script src="ajax.js"></script>
    <div id="mainContent"></div>
    
	  
	
  <script>
  //write the sql statement
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      function initMap() {
        var map = new google.maps.Map(document.getElementById('mainContent'), {
          center: {lat: -37.72, lng: 145.06},
          zoom: 10
        });
		var infoWindow = new google.maps.InfoWindow({map: map});
		
		<?php  
   $query = "select * from ITEM";
   $query2 = "SELECT * FROM REQUEST";
  //echo ($query);
  //including the connection page
  include('./connect_to_db.php');

  //get an instance
  $db = new Connection();

  //connect to database
  $db->connect();

  //query the database
  $result = mysql_query( $query );
  $result2 = mysql_query( $query2 );
  
  
  $count=0;
  $markername = "marker";
  $infowindow2 ="infowindow2";
  while( $row = mysql_fetch_array( $result ))
  {
	//echo ($row['itemname']);
    //fetch the higher order id
	$rows[] = $row;
    $itemname[] = $row['itemname'];
	$description[] = $row['description'];
	$imageurl10[] = $row['image'];
	$cost[] = $row['price'];
	$itemid[] = $row['itemid'];
	$username10 = $row['username'];
	$latitude = $row['latitude'];
    $longitude = $row['longitude'];
	//echo ($row['itemid']);
	
	if (($latitude != null) and ($longitude !=null))
	{	
  
  ?>
		
        
					   
        var <?php echo ($infowindow2)?> = new google.maps.InfoWindow({
          content: '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading"><?php echo $row['itemname']?></h1>'+
            '<div id="bodyContent">'+
            '<p> click to view <a href="itemdetails.php?x=<?php echo $row['itemid']?>" target="_parent">'+
            'item details</a> '+
            
            '</div>'+
            '</div>',
          maxWidth: 200
        });
					
		var <?php echo ($markername)?> = new google.maps.Marker({
		position: {lat: <?php echo ($latitude)?>, lng: <?php echo ($longitude)?>},
		map: map,
		icon: { url: '<?php echo ($imageurl10[$count])?>',
					  scaledSize: new google.maps.Size(50, 50)}
		});
		
		<?php echo ($markername)?>.addListener('click', function() {
          <?php echo ($infowindow2)?>.open(map, <?php echo ($markername)?>);
        });
		
	<?php 
	}
	$infowindow2 = $infowindow2."2";
	$markername = $markername."1";
	$count++;} 
		
	$count2=0;
	$markername3 = "marker3";
    $infowindow3 ="infowindow3";
	 while( $row2 = mysql_fetch_array( $result2 ))
    {
	  
	$rows2[] = $row2;
	$requestid = $row2['requestid'];
	$username3 = $row2['username'];
	$description = $row2['description'];
	$latitude2 = $row2['latitude'];
    $longitude2 = $row2['longitude'];
	
	$query3 = "SELECT image FROM USER where username='$username3'";
	$result3 = mysql_query( $query3 );
	$row3 = mysql_fetch_array( $result3 );	
	$imageurl3[] = $row3[0];
	
	
	if (($latitude2 != null) and ($longitude2 !=null))
	{	
	?>
	var <?php echo ($infowindow3)?> = new google.maps.InfoWindow({
          content: '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading"><?php echo $row2['username'];?></h1>'+
            '<div id="bodyContent">'+
            '<p> <?php echo $row2['description'];?> <p>'+
			'<p> click to view <a href="resquestdetails.php?x=<?php echo $row2['requestid']?>" target="_parent">'+
            'request details</a> '+
            '</div>'+
            '</div>',
          maxWidth: 200
        });
					
		var <?php echo ($markername3)?> = new google.maps.Marker({
		position: {lat: <?php echo ($latitude2)?>, lng: <?php echo ($longitude2)?>},
		map: map,
		icon: { url: '<?php echo ($imageurl3[$count2])?>',
					  scaledSize: new google.maps.Size(50, 50)}
		});
		
		<?php echo ($markername3)?>.addListener('click', function() {
          <?php echo ($infowindow3)?>.open(map, <?php echo ($markername3)?>);
        });

  <?php } 
       $infowindow3 = $infowindow3."3";
	  $markername3 = $markername3."3";
	  $count2++;
	  }
	  $db->close();
	  ?>
	
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
	/*		var user = new google.maps.Marker({
		position: {lat: position.coords.latitude, lng: position.coords.longitude},
		map: map,
		icon: { url: '<?php session_start(); echo $_SESSION['userimage']?>',
					  scaledSize: new google.maps.Size(50, 50)}
		    }); */
            infoWindow.setPosition(pos);
            infoWindow.setContent('Your position.');
			
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
    </script>
    
	
	<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC15k_xxZZzmGCN9QpOY04P1NcTeAgxBdU&callback=initMap">
    </script>
  </body>
</html>