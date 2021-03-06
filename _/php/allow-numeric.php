<?php 
class Allow_Numeric_Stubs {

	function allow_numeric_stubs() {
		register_activation_hook( __FILE__, array( &$this, 'flush_rewrite_rules' ) );

		add_filter( 'page_rewrite_rules',   array( &$this, 'page_rewrite_rules' ) );

		add_action( 'save_post',            array( &$this, 'maybe_fix_stub' ), 2, 2 );
		add_filter( 'editable_slug',        array( &$this, 'maybe_fix_editable_slug' ) );
	}


	// Force a flush of the rewrite rules (for when this plugin is activated)
	function flush_rewrite_rules() {
		global $wp_rewrite;
		$wp_rewrite->flush_rules();
	}


	// Remove the rewrite rule that "breaks" it (paged content) and replace it with one that allows numeric stubs
	function page_rewrite_rules( $rules ) {
		unset( $rules['(.?.+?)(/[0-9]+)?/?$'] );

		$rules['(.?.+?)?/?$'] = 'index.php?pagename=$matches[1]';

		return $rules;
	}


	// WordPress will add "-2" to numeric stubs as they aren't normally allowed.
	// Undo that for numeric page slugs when the post is saved.
	function maybe_fix_stub( $post_ID, $post ) {
		error_log("debug");

		// Pages only
		if ( 'faculty_profile' != $post->post_type )
			return;

		// Only mess with numeric stubs or stubs that are 12345-2
		if ( ! is_numeric( $post->post_name ) && $post->post_name == $this->maybe_unsuffix_slug( $post->post_name ) )
			return;

		// Infinite loops are bad
		remove_action( 'save_post', array( &$this, 'maybe_fix_stub' ), 2, 2 );

		// Update the post with a filter active that'll fix the slug back to what it was supposed to be
		add_filter( 'wp_insert_post_data', array(&$this, 'slug_fixer'), 10, 2 );
		wp_update_post( $post );
		remove_filter( 'wp_insert_post_data', array(&$this, 'slug_fixer'), 10, 2 );

		// Put this filter back incase any other posts are updated on this pageload
		add_action( 'save_post', array( &$this, 'maybe_fix_stub' ), 2, 2 );
	}


	// Ensure that post_name stays as we pass it as wp_unique_post_slug() will try and add a "-2" to the end of it
	function slug_fixer( $data, $postarr ) {
		// $data['post_name'] = $postarr['post_name']; // Not sure why this isn't working

		$data['post_name'] = $this->maybe_unsuffix_slug( $postarr['post_name'] );

		return $data;
	}


	// Re-fix the page slug for the editable URL
	function maybe_fix_editable_slug( $slug ) {
		global $post;

		if ( empty( $post ) )
			$thispost = get_post( $_POST['post_id'] );
		else
			$thispost = $post;

		if ( empty( $thispost->post_type ) )
			return $slug;

		if ( 'faculty_profile' == $thispost->post_type )
			$slug = $this->maybe_unsuffix_slug( $slug );

		return $slug;
	}


	// Checks to see if a string is numeric with "-2" on the end of it
	// If so, it returns the original numeric string
	function maybe_unsuffix_slug( $slug ) {
		if ( '-2' == substr( $slug, -2 ) ) {
			$nonsuffixslug = substr( $slug, 0, -2 );

			if ( is_numeric( $nonsuffixslug ) )
				$slug = $nonsuffixslug;
		}

		return $slug;
	}
}

$Allow_Numeric_Stubs = new Allow_Numeric_Stubs();