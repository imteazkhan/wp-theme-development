<?php get_header(); ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="mb-4">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <small>Posted on <?php the_time('F j, Y'); ?></small>
                    <?php the_post_thumbnail('medium'); ?>
                    <p><?php the_excerpt(); ?></p>
                </div>
            <?php endwhile; else: echo '<p>No news found.</p>'; endif; ?>
        </div>

        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
