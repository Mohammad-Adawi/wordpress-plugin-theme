					</div>
				</div>
      </div><!-- #main -->
      
      <?php get_template_part( 'postscript' ); ?>

      <footer id="footer">
      	<div class="footer-inner">
      		<div class="container">
        		Copyright <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?><br />
            WordPress theme designed by <a href="<?php echo esc_url( 'http://siteturner.com' ) ?>">Siteturner</a>
        	</div>
        </div>
      </footer><!-- #footer-->

  </div><!-- #page -->
  <?php wp_footer(); ?>
</body>
</html>