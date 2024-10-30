<div class="wrap about-wrap">

	<?php include 'admin-home-data.php';

	$actions = apply_filters( 'seomix.contributors.actions', array(
		'edit.php'     => __( 'See all posts', 'contributors' ),
		'post-new.php' => __( 'Add new post', 'contributors' ),
		'profile.php'  => __( 'Edit my profil', 'contributors' ),
	) );
	?>
	<div class="wrap seomix">
		<ol start="0">
		<?php
		foreach ( $actions as $link => $anchor ) {
			printf( '<li>+ <a href="%1$s">%2$s</a></li>', esc_attr( $link ), esc_html( $anchor ) );
		}
		?>
		</ol>
	</div>

</div>