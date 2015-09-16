<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the main element and all content after
 *
 * @package nicko
 */
?>

</main><!-- .main -->

<?php if (!is_page('Dashboard') ) : ?>

  <footer class="footer">
    <div class="site-info">
      <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'nicko' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'nicko' ), 'WordPress' ); ?></a>
      <span class="sep"> | </span>
      <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'nicko' ), 'nicko', '<a href="http://www.moosedog.io/" rel="designer">MooseDog Studios</a>' ); ?>
    </div><!-- .site-info -->
  </footer><!-- .footer -->

<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
