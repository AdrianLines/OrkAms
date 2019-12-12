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
    
<div class="container" data-wio-id=<?= $pageContent->id ?>>

<div class = "flexcontainer-camera">
  <div class = "flexitem-camera">
    <div class = "cameraTitle"><?= RichText::asText($pageContent->data->camera_title);?></div>
    <div class = "cameraDesc"><?= RichText::asText($pageContent->data->camera_desc);?></div>
    
    </div><!-- flexitem close -->
  	
    <div class = "cameraEmbed">
      <div class = "cameraLink">
      <video-js id=vid1 width=720  height=480 class="vjs-default-skin" controls>
  <source
     src="https://uk-gos-edge-01.zetcast.net/dB8b7MWD0jx2UkuB/2520684020441552/playlist.m3u8"
     type="application/x-mpegURL">
</video-js>
<script>
var player = videojs('vid1');
player.play();
</script> </div>
    <div class = "flexcontainer flexcontainer-cameraEmbed">
      <div class = "feed">feed#1</div>
      <div class = "feed"> feed#2</div>
      <div class = "feed">feed#3</div>
    </div>
    </div>

</div><!-- flexcontainer close -->
<div class = "aboutTitle normal">

SPONSOR INFORMATION TO  GO HERE *****

<?php print_r($pageContent->data->sponsor) ?>
<div>

</div>

</div>

<div class = "aboutTitle invert">
  <section id="slideshow">  <!-- This works now. todo - add in dynamic approach to adding cameras to the bar. --> 
<div class="slick multiple-items">
    <?php 
            // loop through each menu item
            foreach ( $camContent->results as $camera) { 
            

            ?>
            <a style ="padding :1%"href = "/cameras/<?= $camera->uid ?>"><div>
            <div class = "titlecard2"><?= RichText::asHtml($camera->data->camera_title);
             ?></div>
            
            	
<img
    src="<?= $camera->data->card_image->url ?>"
    alt="<?= $camera->data->card_image->alt ?>"
/>

            </div>
            </a>
            
            <?php
          };

            ?>   
  </div>
  </section>
</div>
</div> <!-- container close -->
<script type="text/javascript">
    $(document).ready(function(){
      $('#slideshow .slick').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 5,
  slidesToScroll: 5,
  autoplay: true,
  autoplaySpeed: 2000,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 770,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
    });
  </script>
 
<?php include 'footer.php'; ?>