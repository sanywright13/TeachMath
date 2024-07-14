<!DOCTYPE html>
<html lang="fr-FR">
<head>
<title>
<?php wp_title(' ',true,'right');?> 
 </title>
<meta charset="utf-8 ;X-Content-Type-Options=nosniff">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php wp_head(); ?>
</head>
<body>
<header class="sthyiik">
<div class="head-nav">

</div>
<div class="steaky-element ">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo get_home_url(); ?>"><?php 
   // echo wp_get_attachment_image( 13, "full", "", array( "class" => "img-responsive" ) ); 
    ?>
   <img src="http://localhost/wp-content/uploads/2024/06/White-Black-M-Letter-Design-Business-Identity-for-Digital-Design-Company-Logo.png" width="70" height="70" alt="">
    
</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php   /****  add wordpress nav*/ ?>
<?php 
wp_nav_menu(array(
'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'navbar-nav',
                        'fallback_cb' => '__return_false',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth' => 2,
                       'walker' => new wp_bootstrap_navwalker()

));
?>



      <?php /*** search form */ ?>
      <form class="search-container d-flex">
        <input class="form-control me-2" type="search" placeholder="" aria-label="Search">

        <?php echo wp_get_attachment_image( 18, "full", "", array( "class" => "search-icon" ) );  ?>

      </form>
    </div>
  </div>
</nav>
</div>


</header>