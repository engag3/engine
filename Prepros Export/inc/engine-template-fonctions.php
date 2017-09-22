<?php

if ( ! function_exists( 'engine_display_comments' ) ) {
	/**
	 * engine display comments
	 *
	 * @since  1.0.0
	 */
	function engine_display_comments() {

    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) {
			echo '<div class="comments-wrap container">';
      comments_template();
			echo '</div>';
    }
	}
}






if ( ! function_exists( 'engine_do_header' ) ) {
	/**
	 * Display engine sidebar
	 *
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function engine_do_header() {


	  if ( class_exists( 'flbuilder' )) {
	    $header_template_toggle = get_theme_mod( 'header_template_toggle', 0 );
	    $header_template        = get_theme_mod( 'header_template', 0 );
	  } ?>

		<?php // Check if "use template for header" is set in the customizer
		if ( $header_template_toggle == 1 && class_exists( 'flbuilder' ) ) { ?>

      <?php echo do_shortcode( "[fl_builder_insert_layout id=\"$header_template\"]" );

		} else { ?>

			<div class="site-header-wrap container">

				<div class="site-branding">

					<h1 class="site-title h2">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

							<?php // No Custom Logo, just display the site's name
							if ( !has_custom_logo() ) { ?>
								<?php bloginfo('name'); ?>
							<?php } else {
								the_custom_logo();
							} ?>

						</a>
					</h1>

				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					<button id="menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						Menu
						<div class="menu-icon">
							<span class="bar-1"></span>
							<span class="bar-2"></span>
							<span class="bar-3"></span>
						</div>

					</button>
				</nav><!-- #site-navigation -->
			</div>

	<?php }
	}
}


// Footer
if ( ! function_exists( 'engine_do_footer' ) ) {
	/**
	 * Display engine sidebar
	 *
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function engine_do_footer() {

	// Get customzer info
	$footer_template = get_theme_mod( 'footer_template_toggle', 0);
	$template = get_theme_mod( 'footer_template', 'Select' );

	// Announcement Bar
	$abar_toggle  = get_theme_mod( 'abar_toggle', 0 );
	$abar_positon = get_theme_mod( 'abar_positon', 'top' );


	if ( $footer_template == 1 ) { ?>

		<?php echo do_shortcode( "[fl_builder_insert_layout id=\"$template\"]" );

	} else { ?>

		<div class="site-info">

			<div class="container">

				<?php bloginfo('name'); ?> &copy;<?php echo date('Y'); ?> - All Rights Reserved.
			</div>

		</div>

	<?php }
	}
}

// Footer ENGAG#
if ( ! function_exists( 'engine_do_engag3_link' ) ) {
	/**
	 * Display engine sidebar
	 *
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function engine_do_engag3_link() {

	// Get customzer info
	$footer_template = get_theme_mod( 'footer_template_toggle', 0);
	$template = get_theme_mod( 'footer_template', 'Select' );

	// Announcement Bar
	$abar_toggle  = get_theme_mod( 'abar_toggle', 0 );
	$abar_positon = get_theme_mod( 'abar_positon', 'top' );



	if ( true == get_theme_mod( 'e3_footer_link', true ) ) { ?>

		<div class="engag3_footer">
			<div class="container">

				<a href="https://www.engag3.media/" target="_blank">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/engag3_logo_white.svg" alt="powered By ENGAG#">
				</a>

			</div>
		</div>

	<?php }
	}
}


if ( ! function_exists( 'engine_get_tobar' ) ) {
	/**
	 * Display engine sidebar
	 *
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function engine_get_tobar() {

		$topbar_toggle 						= get_theme_mod( 'topbar_toggle', 0 );
		$topbar_template_toggle 	= get_theme_mod( 'topbar_template_toggle', 0 );
		$topbar_template 					= get_theme_mod( 'topbar_template' );
		$topbar_content 					= get_theme_mod( 'topbar_content' );
		$topbar_social 						= get_theme_mod( 'topbar_social', 1 );

		$topbar_desktop 					= get_theme_mod( 'topbar_desktop', '1' );
		$topbar_tablet 						= get_theme_mod( 'topbar_tablet', '1' );
		$topbar_phone 						= get_theme_mod( 'topbar_phone', '1' );

		if ( $topbar_desktop ) {
			$topbar_desktop_display = "display-desktop";
		}
		if ( $topbar_tablet ) {
			$topbar_tablet_display = "display-tablet";
		}
		if ( $topbar_phone ) {
			$topbar_phone_display = "display-phone";
		}

		if ($topbar_template_toggle == 0 ) {
			$topbar_class = "default-layout";
		} else {
			$topbar_class = "custom-layout";
		}


		if ( $topbar_toggle == 1) { ?>

			<div class="topbar <?php echo $topbar_class . ' ' . $topbar_desktop_display . ' ' . $topbar_tablet_display . ' ' . $topbar_phone_display ?>">

				<?php if ( $topbar_template_toggle  == 1 ) {


				} else { ?>

					<div class="container">

						<div class="tapbar-content">
							<?php echo $topbar_content; ?>
						</div>

						<?php if ($topbar_social == 1 ) { ?>

							<div class="tapbar-icons">
								<?php echo do_shortcode( "[social_links]" ); ?>
							</div>

						<?php } ?>

					</div>

				<?php } ?>

			</div>

		<?php }
	}
}





if ( ! function_exists( 'engine_get_abar' ) ) {
	/**
	 * Display engine sidebar
	 *
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function engine_get_abar () {
		$abar_template_toggle	= get_theme_mod( 'abar_template_toggle', 0 );
		$abar_template				= get_theme_mod( 'abar_template');
		$abar_positon 		 		= get_theme_mod( 'abar_positon', 'top' );
		$abar_link 				 		= get_theme_mod( 'abar_link' );
		$abar_button_title 		= get_theme_mod( 'abar_button_title', "Shop Now" );
		$abar_message 		 		= get_theme_mod( 'abar_message', 'Free Shipping on all orders over $00' );

		if ( $abar_template_toggle == 0 ) {
			$abar_template_status = "default";
		} else {
			$abar_template_status = "custom-template";
		}

		?>


		<div id="abar" class="abar <?php echo $abar_positon . ' ' . $abar_template_status;?>">
			<div class="abar-content-wrap">

				<?php  if ( $abar_template_toggle == 0 ) {

					echo $abar_message;

					if ($abar_link != "") {
						echo "<a class='abar-link button' href='" . $abar_link . "'>" . $abar_button_title . "</a>";
					}

				} else {

					echo do_shortcode( "[fl_builder_insert_layout id=\"$abar_template\"]" );

				} ?>

			</div>
		</div>

	<?php }
}








if ( ! function_exists( 'engine_get_slideout_menu' ) ) {
	/**
	 * Display engine Slideout Menu
	 *
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function engine_get_slideout_menu() { ?>

		<div class="slideout-menu-wrap">

			<div id="slideout-navigation" class="slideout-navigation" aria-expanded="false">

				<?php do_action( 'engine_sidebar_before' ); ?>

				<div class="slideout-inner">

					<?php do_action( 'engine_sidebar' ); ?>

					<?php // Check if slideout Menu is using template
					if ( true == get_theme_mod( 'slideout_menu_template_toggle', false ) ) {

						$template = get_theme_mod( 'slideout_menu_template', 'Select' );

						echo do_shortcode( "[fl_builder_insert_layout id=\"$template\"]" );

					} else { ?>

						<div class="default-layout">
							<button id="menu-close" class="menu-close">
								Close Menu
								<div class="menu-icon">
									<span class="bar-1"></span>
									<span class="bar-2"></span>
									<span class="bar-3"></span>
								</div>
							</button>

							<nav>
								<?php wp_nav_menu( array( 'theme_location' => 'slideout', 'menu_id' => 'slideout-menu' ) ); ?>
							</nav>
						</div>

					<?php } ?>

				</div>

				<?php do_action( 'engine_sidebar_after' ); ?>

			</div>

		</div>

	<?php }
}


if ( ! function_exists( 'engine_get_post_nav' ) ) {
	/**
	 * Display engine Slideout Menu
	 *
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function engine_get_post_nav() {
		echo '<div class="comments-wrap container">';
			the_post_navigation();
		echo "</div>";
	}
}