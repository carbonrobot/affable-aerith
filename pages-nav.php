<?php
/**
 * For displaying prev-next nav links on the bottom of the page.
 */

$prevClass = get_previous_posts_link() !== null ? '' : 'only-link';
$nextClass = get_next_posts_link() !== null ? '' : 'only-link';

?>
<nav class="wp-prev-next">
  <ul class="clearfix">
    <li class="prev-link <?php echo $prevClass; ?>"><?php next_posts_link(__('&laquo; Older', "bonestheme")) ?></li>
    <li class="next-link <?php echo $nextClass; ?>"><?php previous_posts_link(__('Newer &raquo;', "bonestheme")) ?></li>
  </ul>
</nav>
