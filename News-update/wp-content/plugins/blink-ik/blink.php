<?php
/**
 * Plugin Name: News Marquee with Blinking Label
 * Description: Displays a scrolling marquee of the latest 10 posts with a blinking "News Update" label.
 * Version: 1.1
 * Author: Nurolhoda
 */

function nm_news_marquee_shortcode() {
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 10,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    $query = new WP_Query($args);
    if ($query->have_posts()) {
        ob_start(); ?>
        <style>
            .news-marquee-container {
                display: flex;
                align-items: center;
                background-color: #f9f9f9;
                padding: 8px;
                border: 1px solid #ccc;
            }

            .news-label {
                background-color: red;
                color: white;
                padding: 5px 10px;
                font-weight: bold;
                margin-right: 10px;
                animation: blink 1s linear infinite;
            }

            @keyframes blink {
                0%, 50%, 100% { opacity: 1; }
                25%, 75% { opacity: 0; }
            }

            .news-marquee {
                flex-grow: 1;
            }

            .news-marquee a {
                margin-right: 30px;
                color: #333;
                text-decoration: none;
                font-weight: 500;
            }

            .news-marquee a:hover {
                text-decoration: underline;
            }
        </style>

        <div class="news-marquee-container">
            <div class="news-label">News Update</div>
            <marquee class="news-marquee" behavior="scroll" direction="left" scrollamount="5" onmouseover="this.stop();" onmouseout="this.start();">
                <?php while ($query->have_posts()) {
                    $query->the_post();
                    echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
                } ?>
            </marquee>
        </div>

        <?php
        wp_reset_postdata();
        return ob_get_clean();
    } else {
        return '<p>No news available.</p>';
    }
}
add_shortcode('news_marquee', 'nm_news_marquee_shortcode');
