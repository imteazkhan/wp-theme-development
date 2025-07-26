<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
    <fieldset>
        <legend>Popular Template Tags for loop</legend>
        <ul>
            <li>the_title</li>
            <li>the_content</li>
            <li>the_author</li>
            <li>the_date</li>
            <li>the_time</li>
            <li>the_category</li>
            <li>the_tags</li>
            <li>the_permalink</li>

        </ul>
    </fieldset>
    <h1>this is home.php</h1>
    <?php

 if ( have_posts() ) :
 while ( have_posts() ) : the_post(); 
 //loop content (template tags, html, etc)
 ?>
 <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3> by <?php the_author(); ?></a>
 <p><?php the_content(); ?></p>
 <p><?php edit_post_link(); ?></p>
 <!-- <a href="<?php the_permalink(); ?>">Details</a> -->
 <?php
 endwhile;
 endif;

    ?>
    <!--  -->
    <!--  -->
    <!--  -->
    <!--  -->
    <?php wp_footer(); ?>
</body>
</html>
