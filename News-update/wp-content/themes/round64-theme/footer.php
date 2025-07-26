<!-- footer start -->
<footer class="bg-dark text-white mt-5 pt-5 pb-3">
  <div class="container">
    <div class="row text-start">
      
      <!-- About Section -->
      <div class="col-md-4 mb-4">
        <h5>About Us</h5>
        <p><?php bloginfo('name'); ?> is a trusted source for breaking news, exclusive stories, and expert insights.</p>
      </div>
      
      <!-- Useful Links Menu -->
      <div class="col-md-4 mb-4">
        <h5>Quick Links</h5>
        <?php
          wp_nav_menu([
            'theme_location' => 'footer-menu',
            'container' => false,
            'depth' => 1,
            'menu_class' => 'list-unstyled',
            'fallback_cb' => false
          ]);
        ?>
      </div>
      
      <!-- Contact Info -->
      <div class="col-md-4 mb-4">
        <h5>Contact Us</h5>
        <p>Email: info@example.com</p>
        <p>Phone: +880 123 456 789</p>
        <p>Location: Dhaka, Bangladesh</p>
      </div>
    </div>

    <hr class="bg-secondary" />

    <!-- Bottom Row -->
    <div class="row text-center">
      <div class="col-md-12">
        <p class="mb-0">&copy; <?= date("Y") ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
