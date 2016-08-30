<?php
/**
 * @package Supimpa
 * @version 1.6
 */
/*
Plugin Name: Supimpa
Plugin URI: https://wordpress.org/plugins/supimpa/
Description: This is not just a plugin, it symbolizes the happiness and friendship of an entire community summed up in one word spoken by Leo Baiano.
Author: Mário Valney
Version: 1.0
Author URI: http://www.facebook.com/groups/wordpress.brasil/
*/

function supimpa_get_sentence() {
	/** These are the sentences to Supimpa */
	$sentences = array(
		"Supimpa!"
	);

	// And then randomly choose a line
	return wptexturize( $sentences[ mt_rand( 0, count( $sentences ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function supimpa() {
	$chosen = supimpa_get_sentence();
	echo "<p id='supimpa'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'supimpa' );

// We need some CSS to position the paragraph
function supimpa_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#supimpa {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'supimpa_css' );

?>
