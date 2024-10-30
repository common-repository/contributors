<div class="wrap about-wrap">

	<?php include 'admin-home-data.php'; ?>

	<div class="wrap seomix">
		<p class="about-description"><?php esc_html_e( "Here's a few people working on this website:", 'contributors' );?></p>
		<?php
			$final = array();
			$roles = apply_filters( 'seomix.contributors.roles', array(
				'Super Admin',
				'Administrator',
				'Editor',
				'Author',
				'Contributor',
				'Subscriber',
			) );
			foreach ( $roles as $role ) {
				$authors = get_users( array(
					'role'                => $role,
					'orderby'             => 'post_count',
					'order'               => 'DESC',
					'has_published_posts' => true,
				) );
				foreach ( $authors as $author ) {
						$desc       = get_the_author_meta( 'shortdesc', $author->ID );
						$url        = get_author_posts_url( $author->ID, $author->nicename );
						$grav_url   = 'http://www.gravatar.com/avatar/' . md5( strtolower( $author->user_email ) ) . '?&s=60';
						$posts_count = count_user_posts( $author->ID );
						$final[ $role ][] = '<li class="wp-person"  id="wp-person-' . sanitize_title( $author->nicename ) . '">
							<img class="gravatar" src="' . esc_attr( $grav_url ) . '"/>
							<a target="_blank" class="web" href="' . esc_attr( $url ) . '">'
							. esc_html( $author->display_name ) . '</a> - '
							. sprintf( _n( '1 post.', '%d posts.', $posts_count, 'contributors' ), $posts_count )
							. '<span class="title">' . wp_trim_words( esc_html( $author->description ), 5 ) . '</span>
							</li>';
				}
				if ( ! empty( $final[ $role ] ) ) {
					$final[ $role ] = '<h4 class="wp-people-group">' . esc_html( $role ) . '</h4>
						<ul class="wp-people-group">' . implode( PHP_EOL, $final[ $role ] ) . '</ul>';
				}
			}
			echo implode( PHP_EOL, $final );
		?>

	</div>

</div>