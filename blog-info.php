<?php
?>
<div class="blog-info">
  <a href="<?php echo home_url(); ?>" rel="nofollow">
    <img class="logo" title="<?php bloginfo('name'); ?>" src="<?php echo affable_get_avatar_image_url(); ?>" />
  </a>
  <div>
    <p class="title"><?php bloginfo('name'); ?></p>
    <p class="description"><?php echo html_entity_decode(get_bloginfo('description')); ?></p>
  </div>
</div>
