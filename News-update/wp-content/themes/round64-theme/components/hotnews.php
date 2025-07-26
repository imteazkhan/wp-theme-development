<main id="main" class="site-main">
    <div class="container">
        <div id="hotnewsCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $args = array(
                    'post_type'      => 'hotnews',
                    'posts_per_page' => 6, // Adjust the number of posts
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                );
                $hotnews_query = new WP_Query( $args );
                $index = 0;

                if ( $hotnews_query->have_posts() ) :
                    while ( $hotnews_query->have_posts() ) : $hotnews_query->the_post();
                        $active_class = ( $index === 0 ) ? ' active' : '';
                        ?>
                        <div class="carousel-item<?php echo $active_class; ?>">
                            <div class="card h-100 mx-auto">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <img src="<?php the_post_thumbnail_url( 'large' ); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>" style="height: 200px; object-fit: cover;">
                                <?php else : ?>
                                    <img src="https://via.placeholder.com/800x400" class="card-img-top" alt="Placeholder" style="height: 200px; object-fit: cover;">
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php the_title(); ?></h5>
                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                        <?php
                        $index++;
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <div class="carousel-item active">
                        <div class="card h-100 mx-auto" style="max-width: 350px;">
                            <img src="https://via.placeholder.com/800x400" class="card-img-top" alt="No News" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">No Hot News Available</h5>
                                <p class="card-text">Check back later for the latest updates!</p>
                            </div>
                        </div>
                    </div>
                    <?php
                endif;
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#hotnewsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#hotnewsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</main>