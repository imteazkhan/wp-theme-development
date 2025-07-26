<?php
/**
 * Plugin Name: News Marquee
 * Description: A simple plugin to display the latest 10 news posts in a marquee.
 * Version: 1.0
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
        $output = '<marquee behavior="scroll" direction="left" scrollamount="5" onmouseover="this.stop();" onmouseout="this.start();" style="background:#f5f5f5; padding:10px; font-weight:bold;">';
        while ($query->have_posts()) {
            $query->the_post();
            $output .= '<a href="http://192.168.54.68/Imteaz-/Wordpress/News-update/' . get_permalink() . '" style="margin-right:30px; color:#333;">' . get_the_title() . '</a>';
        }
        $output .= '</marquee>';
        wp_reset_postdata();
        return $output;
    } else {
        return '<p>No news available.</p>';
    }
}
add_shortcode('news_marquee', 'nm_news_marquee_shortcode');
