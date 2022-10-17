<?php get_header(); 
setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro');
?> <!-- get header -->

<section id="banner-actualities" class="banner-section padding">
            <div class="wrapper banner-title-wrapper">
                <h1 class="banner-title body-style">Nos Actualités</h1>
            </div>
        </section>
		<section id="articles-actuality" class="actualites position-relative">
            <div class="banner-title-wrapper no-padding body-style">
                <!-- Submenu -->
                <div class="submenu-wrapper wrapper">
                    <a href="<?php echo home_url( '/' ); ?>" class="dark">Accueil</a>
                    <span class="">/</span>
                    <a href="<?php echo site_url('/actualites');  ?>" class="dark">Actualités</a>
					<span class="">/</span>
                    <a href="#" class="main-green"><?php the_field('titre'); ?></a>
                </div>
			</div>

			<!-- Big banner -->
			<div class="large-image-banner-wrapper position-relative">
				<?php $image_banner = get_field('banner_image'); ?>

				<img src="<?php echo esc_url($image_banner['url']); ?>" class="banner-bg-img position-absolute" alt="<?php echo esc_url($image_banner['alt']); ?>">
			</div>
			<!-- Background wave -->
			<img class="position-absolute top-wave" src="<?php echo get_template_directory_uri(); ?>/img/backgrounds/top-wave-light.svg" alt="Background-wave">
		</section>

		<!-- Arcticles -->
			<section id="articles" class="position-relative padding">
				<div class="article-section-wrapper wrapper">
				<!-- Get post ID -->
				<?php $article_id = get_the_ID(); ?> 
					<h1 class="h1-style padding-text"><?php the_field('titre'); ?></h1>

					<div class="article-info display-flex">
						<div class="display-article-info display-flex">
							<img src="<?php echo get_template_directory_uri(); ?>/img/icons/clock_icon.svg" alt="Horaire" class="border-box">
							<span class="body-style no-padding main-green"><?php echo date('d/m/Y', get_post_time()); ?></span>
						</div>
						<div class="display-article-info display-flex">
							<img src="<?php echo get_template_directory_uri(); ?>/img/icons/folder_icon.svg" alt="Rubrique">
							<span class="body-style no-padding main-green"><?php the_field('rubrique'); ?></span>
						</div>
					</div>
					<div class="article display-flex body-style">
						<!-- Article top section -->
						<div class="article-top-section display-flex">
<?php
							$image_top = get_field('image_top');
							$image_bottom = get_field('image_bottom'); 
?>
							
							<img src="<?php echo esc_url($image_top['url']); ?>" alt="<?php echo esc_attr($image_top['alt']); ?>" class="obj-fit border-box">
				
								<p><?php the_field('contenu_top'); ?></p>
					
						</div>
						<!-- Article Bottom Section -->
						<div class="article-bottom-section display-flex justify-space-between">
							<div class=" no-padding display-flex justify-space-between">
								<p class="article-bottom-section-p1"><?php the_field('contenu_bottom_1'); ?></p>
								<p class="article-bottom-section-p2"><?php the_field('contenu_bottom_2'); ?></p>
							</div>
							<img src="<?php echo esc_url($image_bottom['url']); ?>" alt="<?php echo esc_attr($image_bottom['alt']); ?>" class="obj-fit">
						</div>
					</div>
				</div>

			<!-- Background wave -->
			<img class="position-absolute bottom-wave" src="<?php echo get_template_directory_uri(); ?>/img/backgrounds/top-wave-medium.svg" alt="Background-wave">
		</section>

		<!-- Other Articles -->
		<section class="actuality-home actuality-articles bg-medium padding position-relative text-center">
			<h2 class="h2-style wrapper text-left">Articles dans la même catégorie</h2>
			<div class="actuality-cards-wrapper wrapper">
<?php 

			$category = get_the_category();
			$category_name = $category[0]->name;

			// 1. Query arguments
			$args = array(
				'post_type' => 'post',
				'category_name' => $category_name,
				'posts_per_page' => 3,
			);

			// 2. WP Query execution
			$my_query = new WP_Query( $args );

			// 3. Loop to get posts
			if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post();
				// var_dump( get_the_ID() );
				if($article_id !== get_the_ID() ) :
				
					$content = get_field('contenu_top');
					$image = get_field('image_top');
	?>
					<div class="actuality-card-div img-hover bg-white border-box">
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?>" class="actuality-card-img">
						<div class="actuality-cards-content">
							<h3 class="h3-style"><?php the_field('titre'); ?></h3>
							<p class="body-style main-green"><?php echo date('j F Y', get_post_time()); ?></p>
							<p class="body-style actuality-content"><?php echo mb_strimwidth($content, 0, 215, ' [...]'); ?></p>
							<a href="<?php echo get_permalink(); ?>" class="intro-btn btn button-style btn-background btn-shadow">Lire la suite</a>
						</div>
					</div>	
				<?php endif; 
				endwhile; else: echo '<p class="body-style">Aucun article en ce moment...</p>'; // if there are not posts from the same category
		
				endif;

			// 4. reboot main query
				wp_reset_postdata(); ?>
			</div> 
			<a href="<?php echo site_url('/actualites');  ?>" class="company-btn btn btn-background button-style btn-shadow">Toutes nos actualités</a>
		</section>

		<!-- Scroll Up btn -->
		<div class="scroll-up-btn-container btn-background position-fixed right-0">
			<a href="#">
				<img src="<?php echo get_template_directory_uri(); ?>/img/icons/scroll_up_btn.svg" alt="Scroll Up" class="scroll-up-img">
			</a>
		</div>

<?php get_footer(); ?>