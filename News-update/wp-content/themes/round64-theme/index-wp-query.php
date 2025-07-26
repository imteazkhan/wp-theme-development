<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 style="background-color: green;">First Custom Query</h1>
    <?php
    
    //$myPosts = new WP_Query('posts_per_page=5');
    // $myPosts = new WP_Query('post_status=draft');
    // $myPosts = new WP_Query('post_status=pending');
    // $myPosts = new WP_Query('posts_per_page=5&post_status=publish');
    // $myPosts = new WP_Query('post_type=hotnews&posts_per_page=5');
    // $myPosts = new WP_Query('post_type=goodnews&posts_per_page=5');
    // $myPosts = new WP_Query('cat=2&posts_per_page=5');
    // $myPosts = new WP_Query('cat=2&posts_per_page=5');
    // $myPosts = new WP_Query('year=2025&monthnum=6&day=22');
    $myPosts = new WP_Query('tag=wordpress');

    while ($myPosts->have_posts()) : $myPosts->the_post();
    ?>
<h3><?php the_title(); ?></h3>
<p><?php the_content(); ?></p>
<p><?php the_category();?></p>
<p><?php the_date();?> - <?php the_time();?></p>
<p><?php the_tags(); ?></p>
    <?php endwhile; ?>
    
</body>

</html>