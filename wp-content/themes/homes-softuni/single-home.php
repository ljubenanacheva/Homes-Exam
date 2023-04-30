<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

	<?php while( have_posts() ) : ?>

		<?php the_post(); ?>
        <div class="property-single">
	<main class="property-main">
		<div class="property-card">
			<div class="property-primary">
				<header class="property-header">
					<h1 class="property-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></a></h1>
					<div class="property-meta">
                        <span class="meta-seller" href="#">Seller: <?php echo softuni_display_single_term( get_the_ID(), 'seller' ); ?></span>
                        </br>
						<span class="meta-location">Loation: <?php echo softuni_display_single_term( get_the_ID(), 'location' ); ?></span>
						<span class="meta-total-area">Price: 1,100 €/sq.m</span>
                        </br>
                        <span class="meta-date"> Homes visits: <?php echo get_post_meta( get_the_ID(), 'visits_count', true ); ?></span>
					</div>

					<div class="property-details grid">
						<div class="property-details-card">
							<div class="property-details-card-title">
								<h3>Rooms</h3>
							</div>
							<div class="property-details-card-body">
								<ul>
									<li>2 Bedrooms</li>
									<li>1 Bathroom</li>
									<li>1 Living room</li>
									<li>Separated kitchen</li>
								</ul>
							</div>
						</div>
						<div class="property-details-card">
							<div class="property-details-card-title">
								<h3>Additional Details</h3>
							</div>
							<div class="property-details-card-body">
								<ul>
									<li>Floor: 6</li>
									<li>Elevator/Lift</li>
									<li>Brick-built</li>
									<li>Electricity</li>
									<li>Water Supply</li>
									<li>Heating</li>
								</ul>
							</div>
						</div>
					</div>
		
				</header>

				<div class="property-body">
                <?php the_content(); ?>
				</div>
			</div>
		</div>
	</main>
	<aside class="property-secondary">
		<div class="property-image property-image-single">
			<div class="property-image-box property-image-box-single">

				<?php if ( has_post_thumbnail() ) :  ?>

							<?php the_post_thumbnail( 'home-thumbnail' ); ?>

						<?php else : ?>

							<img src="wp-content\themes\homes-softuni\assets\images\bedroom.jpg" alt="property image">

						<?php endif; ?>
				
			</div>
		</div>
		<a id="<?php echo get_the_ID(); ?>" href="#" class="button-wide">Like the property  (<?php echo get_post_meta( get_the_ID(), 'likes', true ) ?>)</a>
	</aside>
</div>

<h2 class="section-heading">Other properties from the company:</h2>

<?php echo softuni_display_other_homes_per_seller( get_the_ID() ); ?>

<?php softuni_update_home_visit_count( get_the_ID() ) ?>

    <?php endwhile; ?>

<?php endif; ?>


<?php get_footer();