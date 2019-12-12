<?php
use Prismic\Dom\Link;
use Prismic\Dom\RichText;


$prismic = $WPGLOBAL['prismic'];
$pageContent = $WPGLOBAL['pageContent'];
$menuContent = $WPGLOBAL['menuContent'];
$camContent = $WPGLOBAL['camContent'];


$title = SITE_TITLE;
$isHomepage = false;

?>
<?php include 'header.php'; 
?> 

    <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
  <div class = "mapTitle"><?= RichText::asHtml($pageContent->data->title);
  ?></div>
    <!--The div element for the map -->
    <div id="map"></div>
    <script>
// Initialize and add the map
function initMap() {
  
 
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 6, center: {lat: 60.2184777,lng: -1.5333939}});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: {lat: 60.2184777,lng: -1.5333939}, map: map});

  <?php 

foreach($camContent->results as $camera){
 

    ?>
    var camLoc = {lat: <?php echo $camera->data->location->latitude ?> , lng: <?php echo $camera->data->location->longitude ?> };

    var marker = new google.maps.Marker({position: camLoc, map: map});
    
    <?php   
}
?>

}
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKfWMslIcLKpgST8uf7oXw3DbdQrzZvd0&callback=initMap">
    </script>
<?php include 'footer.php'; ?>