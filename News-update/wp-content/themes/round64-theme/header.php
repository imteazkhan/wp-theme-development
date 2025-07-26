<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php bloginfo( 'name' ); ?>- <?= is_home()?"HOME": get_the_title(); ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">

</head>

<body <?php body_class(); ?>>
  <div class="container">
    <!-- navbar start -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="main-menu">
      <?php
      wp_nav_menu([
        'theme_location' => 'header-menu',
        'container' => false,
        'depth' => 2,
        'menu_class' => 'navbar-nav ms-auto mb-2 mb-lg-0',
        'fallback_cb' => '__return_false',
        'walker' => new bootstrap_5_wp_nav_menu_walker()
      ]);
      ?>
    </div>
  </div>
</nav>

    <!-- navbar end -->
     <div class="row">
      <!-- <div class="col-5"> -->
         <!-- hotnews start -->
<!-- <?php get_template_part('components/hotnews'); ?> -->
 <!-- hotnews end -->
      </div>
      <div class="col-12">
            <!-- carousel start -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://picsum.photos/id/238/900/300" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="https://picsum.photos/id/240/900/300" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="https://picsum.photos/id/239/900/300" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- carousel end -->
      </div>
     </div>

     <!-- header image -->
<?php if ( get_header_image() ) : ?>
  <div class="custom-header">
    <img src="<?php header_image(); ?>" 
         width="<?php echo get_custom_header()->width; ?>" 
         height="<?php echo get_custom_header()->height; ?>" 
         alt="Header Image" />
  </div>
<?php endif; ?>

     <!-- header image end -->
<!--      <div>
        testing: <?php echo get_template_directory_uri(); ?>, <?php echo get_template_directory(); ?>
     </div> -->