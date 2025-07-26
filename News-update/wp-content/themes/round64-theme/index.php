<?php get_header(); ?>
<!-- main  -->
<div class="row">
  <!-- sidebar -->
  <div class="col-md-4">
    <?php get_sidebar(); ?>
  </div>
  <!-- sidebar end -->
  <div id="main" class="col-md-8">
    <h1>Main Content</h1>
    <!-- loop start -->
    <?php
    if (have_posts()) :
      // Start the Loop.
      while (have_posts()) : the_post();
    ?>
        <div id="post-<?php the_ID(); ?>" class="card mb-3 border-success">
          <div class="card-body">
            <a href="<?= get_the_permalink(); ?>">
              <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="...">

              <h3 class="card-title article-title"><?php the_title(); ?> <small class="article-author"> - <?php the_author(); ?></small></h3>
            </a>
            <p>Published on: <?php echo get_the_date(); ?> ></p>
            <p class="card-text"><?php is_single() ? the_content() :  the_excerpt(); ?></p>
            <p>Categories: <?php the_category(); ?></p>
            <p>Post tags: <?php the_tags(); ?></p>
            <p class="card-text"><small class="text-body-secondary"></small></p>
          </div>
          <!-- card footer -->
          <div class="card-footer">
            <small class="text-body-secondary">Last updated - <?php the_date()?> - <?php the_time(); ?></small>
          </div>
        </div>
        <?php comments_template("my-comments.php"); ?>
    <?php
      endwhile;
    endif;
    ?>
    <!-- loop end -->
  </div>



</div>
<!-- main  end-->
<?php get_footer(); ?>