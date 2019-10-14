<?php
use Prismic\Dom\Link;
use Prismic\Dom\RichText;

$prismic = $WPGLOBAL['prismic'];
$pageContent = $WPGLOBAL['pageContent'];
$menuContent = $WPGLOBAL['menuContent'];
$camContent = $WPGLOBAL['camContent'];

$title = SITE_TITLE;
$isHomepage = true;

?>
<div class = "splash">
<?php include 'header.php'; ?>

<?php $banner = $pageContent->data->homepage_banner[0]; ?> 
<?php $bannerUrl = !$banner->image ? $banner->image->url : ''; ?>
<section class="homepage-banner" >
  <div class="banner-content container">
    <h2 class="banner-title" data-aos="fade-up"><?= RichText::asText($banner->title) ?></h2>
    <p data-aos="fade-left"
     data-aos-anchor="#example-anchor"
     data-aos-offset="500"
     data-aos-duration="500"
     data-aos-delay="300"
     class="banner-description"><?= RichText::asText($banner->tagline) ?></p>
  


    <?php 
      // If both the button link and button text are defined in the prismic.io repo
      $button_link = $banner->button_link;
      $button_label = RichText::asText($banner->button_label);

      if ( $button_link->link_type != "Any" && strlen($button_label) > 1 )  {
    ?>
    <a href="<?= Link::asUrl($button_link, $prismic->linkResolver) ?>" class="banner-button"><?= $button_label ?></a>
    <?php } ?>
    
  </div>
</section>
<svg  class ="chevronCenter"xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M12.505 8.698L10 11L7.494 8.698a.512.512 0 0 0-.718 0a.5.5 0 0 0 0 .71l2.864 2.807a.51.51 0 0 0 .717 0l2.864-2.807a.498.498 0 0 0 0-.71a.51.51 0 0 0-.716 0zM10 .4A9.6 9.6 0 0 0 .4 10c0 5.303 4.298 9.6 9.6 9.6s9.6-4.297 9.6-9.6A9.6 9.6 0 0 0 10 .4zm0 17.954A8.353 8.353 0 0 1 1.646 10A8.354 8.354 0 1 1 10 18.354z" fill="#626262"/><rect x="0" y="0" width="20" height="20" fill="rgba(0, 0, 0, 0)" /></svg>
      </div><!-- splash close -->
<div class="container"  data-wio-id=<?= $pageContent->id ?>>
  

    <?php

$camtitle = $camContent->results[0]->data->camera_title;
$camvid  = $camContent->results[0]->data->camera_link->html;
  

$titleHtml = RichText::asHtml($camtitle, $linkResolver);
$siteInfo1 = $pageContent->data->page_content[0]->primary->site_information_1; 
$siteInfo2 = $pageContent->data->page_content[0]->primary->site_information_2; 
$siteInfo3 = $pageContent->data->page_content[0]->primary->site_information_3; 



?>
<div class = "siteInfo">


  <?= RichText::asHtml($siteInfo1); ?>
</div> 

<div class = "flexcontainer">  <!-- container -->
            


            <?php 
            // loop through each menu item
            foreach ( $camContent->results as $camera) { 
            

            ?>
            <a href = "/cameras/<?= $camera->uid ?>"><div class = "flexitem" data-aos="fade-up">
            <div class = "titlecard"><?= RichText::asHtml($camera->data->camera_title);
             ?></div>
            <div class = "img-hover-zoom">
            	
<img
    src="<?= $camera->data->card_image->url ?>"
    alt="<?= $camera->data->card_image->alt ?>"
/>
            
             </div></a>
            </div>
            <?php
          };

            ?>      
</div> <!-- container -->


<div class = "siteInfo">
<?= RichText::asHtml($siteInfo2);?>
</div> 
<div>
<div class = "siteInfo invert">
<?= RichText::asHtml($siteInfo3); ?>
</div> 
 </div>
    

  



  
</div>
<?php include 'footer.php'; ?>