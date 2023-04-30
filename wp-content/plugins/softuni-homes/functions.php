<?php
/**
 * Homes Enqueue function
 */
function softuni_enqueue_scripts() {
	wp_enqueue_script( 'softuni-script', plugins_url( 'assets/scripts/scripts.js', __FILE__ ), array( 'jquery' ), 1.1 );
	wp_localize_script( 'softuni-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

}
add_action( 'wp_enqueue_scripts', 'softuni_enqueue_scripts' );

/**
 *  Function that display a single post term
 */
function softuni_display_single_term( $post_id, $taxonomy ) {

    if ( empty( $post_id ) || empty( $taxonomy ) ) {
        return;
    }

    $terms = get_the_terms( $post_id, $taxonomy );

    $output = '';
    if ( ! empty( $terms ) && is_array( $terms ) ) {
        foreach( $terms as $term ) {
            $output .= $term->name . ', ' ;
        }
    }

    return $output;
}
/**
 *  Function that display the count of home visit 
 */
function softuni_update_home_visit_count( $post_id = 0 ) {
    if ( empty( $post_id ) ) {
        return;
    }

    $visit_count = get_post_meta( $post_id, 'visits_count', true );

    if ( ! empty( $visit_count ) ) {
        $visit_count = $visit_count + 1;

        update_post_meta( $post_id, 'visits_count', $visit_count );
    } else {
        update_post_meta( $post_id, 'visits_count', 1 );
    }
}

function display_twitter_share( $content ) {

    $post_title = get_the_title( get_the_ID() );

    $twitter = '<a class="twitter-share-button" href="https://twitter.com/intent/tweet?text='. $post_title .'">Tweet</a>';

    $content .= '<div>'. $twitter .'</div>';

    return $content;
}
add_filter( 'the_content', 'display_twitter_share' );


function softuni_home_like() {
	$home_id = esc_attr( $_POST['home_id'] );

	$like_number = get_post_meta( $home_id, 'likes', true );

    if ( empty( $like_number ) ) {
        update_post_meta( $home_id, 'likes', 1 );
    } else {
        $like_number = $like_number + 1;
        update_post_meta( $home_id, 'likes', $like_number );
    }

    wp_die();
}
add_action( 'wp_ajax_nopriv_softuni_home_like', 'softuni_home_like' );
add_action( 'wp_ajax_softuni_home_like', 'softuni_home_like' );

/**
 * This function displays 2 other offers from the same seller
 */
function softuni_display_other_homes_per_seller( $home_id ) {
    if ( empty( $home_id ) ) {
        return;
    }

    $homes_args = array(
        'post_type'         => 'home',
        'post_status'       => 'publish',
        'orderby'           => 'name',
        'posts_per_page'    => 2,

        // set a taxonomy query
    );

    $homes_query = new WP_Query( $homes_args );

    if ( ! empty( $homes_query ) ) {
        ?>
        <ul class="properties-listing">
            <?php foreach( $homes_query->posts as $home ) { ?>
                <<li class="property-card">
		<div class="property-primary">
			<h2 class="property-title"><a href="<?php the_permalink(); ?>"><?php echo $home->post_title; ?></a></h2>
			<div class="property-meta">
				<span class="meta-location">Ovcha Kupel, Sofia</span>
				<span class="meta-total-area">Total area: 99.50 sq.m</span>
			</div>
			<div class="property-details">
				<span class="property-price">€ 100,815</span>
				<span class="property-date">Posted <?php the_date(); ?></span>
			</div>
		</div>
		<div class="property-image">
			<div class="property-image-box">
            <?php if ( has_post_thumbnail() ) :  ?>

                <?php the_post_thumbnail( $home->home_thumbnail ); ?>

                <?php else : ?>

                <img src="wp-content\themes\homes-softuni\assets\images\bedroom.jpg" alt="property image">

            <?php endif; ?>
			</div>
		</div>
	</li>

            <?php } ?>
		</ul>
    <?php
    }
}

function softuni_display_home_details( $post_id ) {
    $output = '';

    if( empty ( $post_id ) ){
        return;
    }
         
    $output = $output . "<h2>" .get_the_title() . "</h2>";
    $output = $output . "<div>" .get_the_post_thumbnail() . "<div>";
    $output = $output . "<a>" .get_the_permalink() . "</a>";
                    

    return $output;
    
}
add_shortcode( 'home-details', 'softuni_display_home_details' );


function softuni_display_homes() {
    $output = '';
    $args = array (
                    'post_type' => 'homes',
                    'posts_per_page' => '10',
                    'publish_status' => 'published',
    );

    $query = new WP_Query( $args );

    if( $query -> have_posts() ) :
        while( $query -> have_posts() ):
                    $query -> the_post();
                    
                    $output = $output . "<h2>" .get_the_title() ."</h2>";
                    $output = $output . "<div>" .get_the_post_thumbnail() ."<div>";
                    
        endwhile;

         wp_reset_postdata();
        
    endif;

    return $output;
    
}
add_shortcode( 'homes_list', 'softuni_display_homes' );
