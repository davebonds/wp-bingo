<?php
/**
 * The plugin class to add our custom shortcode.
 */
class WP_Bingo_Shortcode {

	/**
	 * A reference to an instance of this class.
	 */
	private static $instance = false;

	/**
	 * Singleton
	 *
	 * Returns a single instance of the current class.
	 */
	public static function singleton() {

		if ( !self::$instance )
			self::$instance = new self;

		return self::$instance;
	}

	public function __construct() {

		// Register the wp_bingo shortcode
		add_shortcode( 'wp_bingo', array( $this, 'bingo_shortcode' ) );

	}

	/**
	 * Shortcode building function
	 *
	 * @return  string  Contains the markup for the bingo table
	 */
	public function bingo_shortcode() {

		// Get required metadata
		$post_ID		= get_the_ID();
		$buzzwords		= get_post_meta( $post_ID, '_bingo_buzzwords', true );

		// Header Word
		$header_word	= 'BINGO';
		$header_word	= apply_filters( 'wp-bingo-header-word', $header_word );

		$header_word_array	= str_split( $header_word, 1 );

		// Call up the needed style/script files
		wp_enqueue_style( 'wp-bingo' );
		wp_enqueue_script( 'wp-bingo' );

		// Start getting content of shortcode ready
		ob_start();

		echo '<div class="wp-bingo__header">';
			foreach ( $header_word_array as $letter ) {
				echo '<div>'. $letter .'</div>';
			}
		echo '</div>';

		echo '<div class="wp-bingo__wrapper">';

			if ( !empty( $buzzwords ) ) {

				//var_dump( $buzzwords);

				$count_words    = count( $buzzwords );

				for ( $i = 0; $i < $count_words; $i++ ) {

					if ( $i > 23 ) {
						continue;
					}

					// FREE TILE
					if ( $i == 12 ) {
						echo '<div class="wp-bingo__item active">FREE</div>'."\n\t\t\t\t";
					}

					$word = array_rand( $buzzwords, 1 );
					echo '<div class="wp-bingo__item">';
					echo $buzzwords[$word];
					echo '</div>'."\n\t\t\t\t";

					unset( $buzzwords[$word] );

				}

			} else {
				echo 'NEED BUZZWORDS TO BE POPULATED';
			}

		echo '</div>';

		return ob_get_clean();

	}

}
