<?php
/**
 * Search Form Template
 *
 * The search form template displays the search form.
 *
 * @package happy
 * @subpackage Template
 */
?>
			<div class="search">

				<form method="get" class="search-form" action="<?php echo trailingslashit( esc_url( home_url( '/' ) ) ); ?>">
				<div>
					<input class="search-text" type="text" name="s" value="<?php if ( is_search() ) echo esc_attr( get_search_query() ); else esc_attr_e( 'Search this site...', 'happy' ); ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
					<input class="search-submit button" name="submit" type="submit" value="<?php esc_attr_e( 'Search', 'happy' ); ?>" />
				</div>
				</form><!-- .search-form -->

			</div><!-- .search -->