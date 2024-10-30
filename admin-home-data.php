<?php
	/* Get URL for menus */
	$pages = apply_filters( 'seomix.contributors.pages', array(
		'dashboard_page_contributors'     => array(
			'url'    => admin_url( 'index.php?page=contributors' ),
			'anchor' => __( 'Welcome', 'contributors' ),
		),
		'dashboard_page_contributors-who' => array(
			'url'    => admin_url( 'index.php?page=contributors-who' ),
			'anchor' => sprintf( __( 'Who is behind %s?', 'contributors' ), get_bloginfo( 'name' ) ),
		),
	) );

	/* Get current user informations */
	global $current_user;
?>

<h1><?php echo $current_user->display_name;?>,<br><?php echo esc_html( sprintf( __( 'welcome on %s', 'contributors' ), get_bloginfo( 'name' ) ) ); ?></h1>

<div class="about-text"><?php bloginfo( 'description' ); ?></div>

<h2 class="nav-tab-wrapper">
	<?php
	if ( ! empty( $pages ) ) {
		$screen = get_current_screen();
		foreach ( $pages as $id => $page ) {
			printf( '<a href="%1$s" class="nav-tab%2$s">%3$s</a>',
			    esc_attr( $page['url'] ),
			    0 === strcmp( $id, $screen->id ) ? ' nav-tab-active' : '',
			    esc_html( $page['anchor'] )
			);
		}
	}
	?>
</h2>