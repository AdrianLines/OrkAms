<?php

/*
 * This is the main file of the application, including routing and controllers.
 *
 * $app is a Slim application instance, see the framework documentation for more details:
 * http://docs.slimframework.com/
 *
 * The order of the routes matter, as it will define the priority of routes. For that reason we
 * need to keep the more "generic" routes, such as the pages route, at the end of the file.
 *
 * If you decide to change the URLs, make sure to change PrismicLinkResolver in LinkResolver.php
 * as well to make sures links in your site are correctly generated.
 */

use Prismic\Api;
use Prismic\LinkResolver;
use Prismic\Predicates;

require_once 'includes/http.php';

// Index page
$app->get('/', function ($request, $response) use ($app, $prismic) {
  
  // Query the homepage content
  $api = $prismic->get_api();
  $pageContent = $api->getSingle('homepage');

  	
		

$response = $api->query(
    Predicates::at('document.type', 'campage'),
    [ 'orderings' => '[my.campage.date desc]' ]
);
  
 
  


  // Query the menu content
  $menuContent = $api->getSingle('menu');
  if (!$menuContent) {
    $menuContent = null;
  }
  
  // Render the homepage
  render($app, 'homepage', array('pageContent' => $pageContent, 'menuContent' => $menuContent, 'camContent'=>$response));
});





// Map page
$app->get('/map', function ($request, $response) use ($app, $prismic) {
  
  // Query the homepage content
  $api = $prismic->get_api();
  $pageContent = $api->getSingle('mappage');

  	
		// Query the menu content
  $menuContent = $api->getSingle('menu');
  if (!$menuContent) {
    $menuContent = null;
  }

$camContent = $api->query(
    Predicates::at('document.type', 'campage'),
    [ 'orderings' => '[my.campage.date desc]' ]
);
  
 
  
  // Render the homepage
  render($app, 'mappage', array('pageContent' => $pageContent,'menuContent' => $menuContent,'camContent'=>$camContent));
});


// Index page
$app->get('/{uid}', function ($request, $response, $args) use ($app, $prismic) {
  
  // Retrieve the uid from the url
  $uid = $args['uid'];
  
  // Query the API by the uid 
  $api = $prismic->get_api();
  $pageContent = $api->getByUID('page', $uid);

  // Query the menu content
  $menuContent = $api->getSingle('menu');
  if (!$menuContent) {
    $menuContent = null;
  }

  // Render the 404 page if no page document is found
  if (!$pageContent) {
    render($app, '404', array('pageContent' => null, 'menuContent' => $menuContent));
    return;
  }
  
  if($uid == 'sponsors'){
    
    $response = $api->query(
      Predicates::at('document.type', 'sponsorpage'),
      [ 'orderings' => '[my.sponsorpage.date desc]' ]);

      render($app, 'sponsors', array('pageContent' => $pageContent, 'menuContent' => $menuContent, 'sponsorContent'=>$response));
  

  }else{
  // Otherwise render the page
  render($app, 'page', array('pageContent' => $pageContent, 'menuContent' => $menuContent));
  }
});


// camera page
$app->get('/cameras/{uid}', function ($request, $response, $args) use ($app, $prismic) {
  
  // Retrieve the uid from the url
  $uid = $args['uid'];
  
  // Query the API by the uid 
  $api = $prismic->get_api();
  $pageContent = $api->getByUID('campage', $uid);

  // Query the menu content
  $menuContent = $api->getSingle('menu');
  if (!$menuContent) {
    $menuContent = null;
  }

  //Get content for other cameras to display on bar at the bottom of camera page.
  $cameras = $api->query(
    Predicates::at('document.type', 'campage'),
    [ 'orderings' => '[my.campage.date desc]' ]
);

  // Render the 404 page if no page document is found
  if (!$pageContent) {
    render($app, '404', array('pageContent' => null, 'menuContent' => $menuContent));
    return;
  }
  
  // Otherwise render the page
  render($app, 'campage', array('pageContent' => $pageContent, 'menuContent' => $menuContent, 'camContent' => $cameras));
});
