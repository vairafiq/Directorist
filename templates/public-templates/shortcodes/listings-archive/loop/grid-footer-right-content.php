<?php
if ($listings->display_view_count) { ?>
	<ul class="atbd_content_right">
		<li class="atbd_count"><?php $listings->loop_view_count_template(); ?></li>
	</ul>
	<?php
}