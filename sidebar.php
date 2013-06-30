        <div id="sidebar1" class="sidebar fourcol last clearfix" role="complementary">

          <div id="side-blog-info">
            <a href="<?php echo home_url(); ?>" rel="nofollow">
              <img class="logo" title="<?php bloginfo('name'); ?>" src="http://2.gravatar.com/avatar/712d3b0602d7909dd3ba1527fef154e3?size=840" />
            </a>
            <div>
              <p class="title"><?php bloginfo('name'); ?></p>
              <p class="description"><?php echo html_entity_decode(get_bloginfo('description')); ?></p>
            </div>
          </div>

					<nav role="navigation">
						<?php echo affable_html_sidebar_main_nav(); ?>
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
