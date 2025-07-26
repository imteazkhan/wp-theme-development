<aside class="sidebar bg-light p-3 mb-4 rounded">
  <h2 class="h5 border-bottom pb-2">Sidebar</h2>

  <!-- Navigation Menu -->
  <?php
    wp_nav_menu([
      'theme_location' => 'sidebar-menu',
      'container' => false,
      'depth' => 2,
      'menu_class' => 'list-unstyled mb-4',
      'fallback_cb' => false,
    ]);
  ?>

  <!-- Search Form -->
  <div class="mb-4">
    <h5 class="h6">Search</h5>
    <?php get_search_form(); ?>
  </div>

  <!-- Categories -->
  <div class="mb-4">
    <h5 class="h6">Categories</h5>
    <ul class="list-unstyled">
      <?php wp_list_categories(['title_li' => '']); ?>
    </ul>
  </div>

  <!-- Recent Posts -->
  <div class="mb-4">
    <h5 class="h6">Latest Posts</h5>
    <ul class="list-unstyled">
      <?php
        $recent_posts = wp_get_recent_posts(['numberposts' => 5]);
        foreach ($recent_posts as $post) : ?>
          <li>
            <a href="<?php echo get_permalink($post['ID']); ?>">
              <?php echo esc_html($post['post_title']); ?>
            </a>
          </li>
      <?php endforeach; wp_reset_query(); ?>
    </ul>
  </div>
</aside>
