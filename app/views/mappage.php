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
<?php include 'header.php'; ?>

<?
foreach($camContent->results as $camera){
    print_r($camera->data->location->latitude);

    print_r($camera->data->location->longitude);
    print_r("break   ");
}


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
  // The location of Uluru
  var uluru = {lat: -25.344, lng: 131.036};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
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