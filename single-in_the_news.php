<html>
<head>
<meta charset="utf-8" />
<meta name="description" content="As National Leaders in Medicine, we are frequently featured in the media both locally and nationally. Here are highlights." />
<meta name="author" content="Washington University School of Medicine in St. Louis" />
<meta name="googlebot" content="noodp" />
<meta http-equiv="cache-control" content="no-cache">
<?php if ( extension_loaded('newrelic') ) {
	newrelic_disable_autorum();
} ?>

<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<title>
In The News | Washington University School of Medicine in St. Louis</title>
<link rel="shortcut icon" href="/favicon.ico">
</head>
<style type="text/css">
body { font-family: Arial, sans-serif; margin: 0;}
a {color: #336699;}
p > strong { font-size: 16px; }
</style>
<body>
<div style="width: 660px; margin: 0 auto;">
	<div style="text-align: center;">
		<span style="color: #707070; font-size: 10px; line-height: 20px; padding-bottom: 20px; display: inline-block;">A bi-weekly review of Barnes-Jewish Hospital, St. Louis Children's Hospital and Washington University School of Medicine media appearances.</span>
		<a href="http://www.barnesjewish.org"><img src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/itn_BJH.png" style="border: 0px"></a>
		<a href="http://medicine.wustl.edu"><img src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/itn_WUSM.png" style="border: 0px"></a>
		<a href="http://www.stlouischildrens.org/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/itn_SLC.png" style="border: 0px"></a>
	</div>
	<div style="color: #fff; background: #4a824c; padding: 10px 12px; margin: 23px 0 0 0;">
		<span style="font-size: 23px; font-weight: bold;">IN THE NEWS</span>
		<span style="font-size: 23px; font-weight: bold; float: right;"><?php

	// The Loop
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			// do something
			the_title();?></span>
			</div>
			<div style="color: #505050;margin: 28px; font-size: 14px; line-height: 150%;">
				As leaders in medicine, we are frequently featured in the media both locally and nationally. Here are highlights from the past two weeks:<br>

			<?php
					the_content();

		}
	} else {
		// no posts found
	}

	// Restore original Post Data
	wp_reset_postdata();

/*	if (have_posts()) :
		while (have_posts()) :
			the_post();
			the_title();
	?></span>
	</div>
	<div style="color: #505050;margin: 28px; font-size: 14px; line-height: 150%;">
		As leaders in medicine, we are frequently featured in the media both locally and nationally. Here are highlights from the past two weeks:<br>

	<?php
			the_content();
		endwhile;
	endif;*/
	?>

	</div>
</div>
	<div style="color: #fff; background: #4a824c; font-size: 12px; padding: 10px 12px; margin: 23px 0 0 0; text-align: center; width: 100%;">
		<span style="width: 100%; font-size: 16px; padding-top: 10px; text-transform: uppercase; float: left;">Contact us with your story ideas</span>
		<div style="width: 630px; margin: 33px auto; height: auto; display: inline-block;">
			<div style="width: 210px; float: left; display: inline-block;">
				<p style="margin: 0 0 10px 0; font-weight: bold; font-size: 14px;">Nicholas McLaren</p>
				<p style="margin: 0 0 10px 0;">Barnes-Jewish Hospital<br>
					Marketing/Communications</p>
				<p style="margin: 0 0 10px 0;"><a style="color: #fff; text-decoration: none;" href="mailto:nicholas.mclaren@bjc.org">nicholas.mclaren@bjc.org</a></p>
				<p style="margin: 0 0 10px 0;">314.286.0051</p>
					<a href="https://twitter.com/Barnesjewish"><img src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/twitter.png" style="margin-right: 4px;" alt="Twitter"><a>
					<a href="https://www.facebook.com/barnesjewishhospital"><img src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/facebook.png" style="height: 24px; width: 24px;" alt="Facebook"></a>
				<p><a style="color: #fff; text-decoration: none;" href="http://www.barnesjewish.org/news">barnesjewish.org/news</a></p>
			</div>
			<div style="width: 210px; float: left; display: inline-block;">
				<p style="margin: 0 0 10px 0; font-weight: bold; font-size: 14px;">Judy Martin</p>
				<p style="margin: 0 0 10px 0;">Washington University<br>
					School of Medicine<br>
					Media Relations</p>
				<p style="margin: 0 0 10px 0;"><a style="color: #fff; text-decoration: none;" href="mailto:martinju@wustl.edu">martinju@wustl.edu</a></p>
				<p style="margin: 0 0 10px 0;">314.286.0105</p>
					<a href="https://twitter.com/WUSTLmed"><img src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/twitter.png" style="margin-right: 4px;" alt="Twitter"><a>
					<a href="https://www.facebook.com/WUSTLmedicine.health"><img src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/facebook.png" style="height: 24px; width: 24px;" alt="Facebook"></a>
				<p><a style="color: #fff; text-decoration: none;" href="http://medicine.wustl.edu">medicine.wustl.edu</a></p>
			</div>
			<div style="width: 210px; float: left; display: inline-block;">
				<p style="margin: 0 0 10px 0; font-weight: bold; font-size: 14px;">Jackie Ferman</p>
				<p style="margin: 0 0 10px 0;">St. Louis Children's Hospital<br>
					Marketing/Communications</p>
				<p style="margin: 0 0 10px 0;"><a style="color: #fff; text-decoration: none;" href="mailto:jferman@bjc.org">jferman@bjc.org</a></p>
				<p style="margin: 0 0 10px 0;">314.286.0304</p>
					<a href="https://twitter.com/STLChildrens"><img src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/twitter.png" style="margin-right: 4px;" alt="Twitter"><a>
					<a href="https://www.facebook.com/stlchildrens"><img src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/facebook.png" style="height: 24px; width: 24px;" alt="Facebook"></a>
				<p><a style="color: #fff; text-decoration: none;" href="http://stlouischildrens.org/media-center">stlouischildrens.org/media-center</a></p>
			</div>

	</div>
</div>

<?php
   /* Always have wp_footer() just before the closing </body>
	* tag of your theme, or you will break many plugins, which
	* generally use this hook to reference JavaScript files.
	*/
	wp_footer();
?>
</body>
</html>
