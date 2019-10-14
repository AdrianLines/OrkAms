<?php
use Prismic\Dom\Link;
use Prismic\Dom\RichText;


$prismic = $WPGLOBAL['prismic'];
$pageContent = $WPGLOBAL['pageContent'];
$menuContent = $WPGLOBAL['menuContent'];

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
    <?= $pageContent->data->camera_link->html ?>
    </div>
    <div class = "flexcontainer flexcontainer-cameraEmbed">
      <div class = "feed">feed#1</div>
      <div class = "feed"> feed#2</div>
      <div class = "feed">feed#3</div>
    </div>
    </div>

</div><!-- flexcontainer close -->
<div class = "aboutTitle normal">
<div>
  information about who sponsors the cameras to go here 
</div>

</div>

<div class = "aboutTitle invert">
<div>
  Banner with cameras to go here
</div>

</div>
</div> <!-- container close -->

<?php include 'footer.php'; ?>