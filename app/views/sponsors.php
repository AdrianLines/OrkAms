<?php
use Prismic\Dom\Link;
use Prismic\Dom\RichText;


$prismic = $WPGLOBAL['prismic'];
$pageContent = $WPGLOBAL['pageContent'];
$menuContent = $WPGLOBAL['menuContent'];
$sponsorContent = $WPGLOBAL['sponsorContent'];

$title = SITE_TITLE;
$isHomepage = false;

?>

<?php include 'header.php'; ?>
    
<div class="container" data-wio-id=<?= $pageContent->id ?>>
<?php 
    // Get the slices from the page

    $aboutitem = $pageContent->data->page_content[0]->items;

    //print_r($aboutitem);
    
    
    foreach($aboutitem as $item){ 
    

      ?>
      <div class = "sponsorTitle">
      <?= RichText::asHtml($item->about_title);?>
      <?= RichText::asHtml($item->about_desc);?>
      </div>



      </div>
      
    <?php
    }
?>
<div class = "flexcontainer-sponsor">

<?php 
foreach ( $sponsorContent->results as $sponsor) { 
  
 ?> 
 <div class = "flexitem-sponsor">
   <div class = "sponsorName"><?= RichText::asHtml($sponsor->data->sponsor_name);
  ?></div>
  <div class = "sponsorDesc"><?= RichText::asHtml($sponsor->data->sponsor_desc);
  ?></div>
  </div>
<?php
}


?>
      </div>
      

</div>

<?php include 'footer.php'; ?>