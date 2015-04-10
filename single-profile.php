<?php

	get_header();

	if (have_posts()) :
		while (have_posts()) :
			the_post();
			$class = '';
			$classes = '';
			$margin = ' non-landing-page';
?>

<div id="main" class="clearfix<?php echo $margin; ?>">

	<div id="page-background-r"></div>
	<div id="page-background-l"></div>

	<div class="wrapper">
		<?php get_sidebar(); ?>

		<article<?php echo $classes; ?>>
			<?php
					the_title('<h1>', '</h1>');
					the_post_thumbnail('landing-page');

					echo "<p><span style='font-weight:700;'>" . get_field('student_profile_class_of') . "</span> &#8226; " . get_field('student_profile_program') . "</p>";
					the_content();

				endwhile;
			endif;
			?>
		</article>

	</div>

</div>

<?php get_footer(); ?>