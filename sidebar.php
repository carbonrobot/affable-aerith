        <div id="sidebar1" class="sidebar fourcol last clearfix" role="complementary">

          <?php include(dirname(__FILE__) . '/blog-info.php'); ?>

					<nav class="side-nav" role="navigation">
						<?php echo affable_html_main_nav(); ?>
					</nav>

          <?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

            <?php dynamic_sidebar( 'sidebar1' ); ?>

          <?php else : ?>

            <!-- This content shows up if there are no widgets defined in the backend. -->

            <div class="alert alert-help">
              <p><?php _e("Please activate some Widgets.", "bonestheme");  ?></p>
            </div>

          <?php endif; ?>

        </div>
