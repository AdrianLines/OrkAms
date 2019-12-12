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
<div style = "position:absolute; bottom: 0; padding: 1%;  transform: translateX(-50%); left:50%;"> <p>Take a listen to our radio station while you view the scenery</p> 
<iframe src="https://r1.zetcast.net/public/adrian_lines/embed" frameborder="0" allowtransparency="true" style="width: 100%; min-height: 150px; border: 0; "></iframe>
</div>
      </div><!-- splash close -->

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
            <a href = "/cameras/<?= $camera->uid ?>"><div class = "flexitem camcard" data-aos="fade-up">
            <div class = "titlecard"><?= RichText::asHtml($camera->data->camera_title);
             ?></div>
             
           
            	
<img
    src="<?= $camera->data->card_image->url ?>"
    alt="<?= $camera->data->card_image->alt ?>"
/>
            
            </a>
            <div style = "padding: 1%"><?= RichText::asHtml($camera->data->camera_desc);
             ?></div>
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
<div>
<a href = "/map">
Click Here to See the map
</a>

</div>
</div> 
 </div>
    

  



  
</div>
<?php include 'footer.php'; ?>