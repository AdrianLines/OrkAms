<?php
use Prismic\Dom\Link;
use Prismic\Dom\RichText;

$prismic = $WPGLOBAL['prismic'];
$pageContent = $WPGLOBAL['pageContent'];
$menuContent = $WPGLOBAL['menuContent'];

$title = SITE_TITLE;
$isHomepage = false;

?>
<div class = "aboutheader">
<?php include 'header.php'; ?>
</div>

<div class="container" data-wio-id=<?= $pageContent->id ?>>
  <?php 
    // Get the slices from the page

    $aboutitem = $pageContent->data->page_content[0]->items;
    
    
    foreach($aboutitem as $item){
      ?>
      
<div  class = "flexcontainer-about">
  <div class  = "flexitem-abouttitle" data-aos="fade-right" >  
 
  <img
    src="<?= $item->about_image->url ?>"
    alt="<?= $item->about_image->alt ?>"
/>
<?= RichText::asHtml($item->about_title);?>
  </div><!-- item -->

  <div class = "flexitem-about" data-aos="fade-up"
     data-aos-anchor-placement="center-bottom"    >  
  <?= RichText::asHtml($item->about_desc);?>
  </div><!-- item -->
</div> <!-- container -->
      <?php
    }
?>


</div>

<?php include 'footer.php'; ?>