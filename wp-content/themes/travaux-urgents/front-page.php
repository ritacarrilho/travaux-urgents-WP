<?php
/*
 * Template Name: Accueil
 */ 

get_header(); ?> <!-- get header -->

<!-- MAIN -->
<main>
	<!-- INTO -->
		<section id="intro-home" class="position-relative width-100">
<?php 
			$slider_img_1 = get_field('slider_image_1');
			$slider_img_2 = get_field('slider_image_2');
			$slider_img_3 = get_field('slider_image_3');
			$logo = get_field('slider_logo');
?> 
			<div class="intro-slider splide position-absolute height-100 width-100" id="splide-home" aria-label="Splide Basic HTML Example">
				<div class="splide__track height-100">
					<ul class="splide__list">
						<li class="splide__slide">
							<img src="<?php echo esc_url($slider_img_1['url']); ?>" alt="<?php echo esc_attr($slider_img_1['alt']); ?>" class="home-slider-img height-100 width-100 obj-fit">
						</li>
						<li class="splide__slide">
							<img src="<?php echo esc_url($slider_img_2['url']); ?>" alt="<?php echo esc_attr($slider_img_2['alt']); ?>" class="home-slider-img height-100 width-100 obj-fit">
						</li>
						<li class="splide__slide">
							<img src="<?php echo esc_url($slider_img_2['url']); ?>" alt="<?php echo esc_attr($slider_img_3['alt']); ?>" class="home-slider-img height-100 width-100 obj-fit">
						</li>
					</ul>
				</div>
			</div>

			<div class="intro-info display-flex flex-column">
				<img src="<?php echo esc_url($logo['url']);  ?>" alt="<?php echo esc_attr( $logo['alt'] ) ?>;" class="intro-logo position-relative">
				<h1 class="h1-style white position-relative"><?php the_field('slider_titre'); ?></h1>
				<a href="<?php echo site_url('/contacts');  ?>" class="intro-btn btn btn-background button-style btn-shadow position-relative"><?php the_field('slider_btn_contenu'); ?></a>
				<p class="intro-home-p white body-style position-relative text-center"><?php the_field('slider_phrase'); ?></p>
				<a href="#company-home">
					<img src="<?php bloginfo('template_url'); ?>/img/icons/scroll_down.svg" alt="Scroll Down" class="scroll-down-icon position-relative">
				</a>
			</div>
		</section>

	<!-- SERVICES - Cards -->
		<section id="services-home" class="services-home position-absolute width-100">
			<div class="services-splider splide" id="splide-services" role="group" aria-label="Services Slider">
				<div class="splide__track">
					<div class="splide__list">
<?php
                        $args = array( 'post_type' => 'prestations' );

                        $my_query = new WP_Query( $args );

                        if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post();
                        $icon = get_field('article_icon');
                        $title = get_field('article_section_titre');
		?>
                        <div class="services-card btn-background btn-shadow splide__slide">
                            <a href="<?php the_permalink() ?>">
								<img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_url($icon['alt']); ?>">
								<span class="card-line"></span>
								<span class="body-style white"><?php echo $title; ?></span>
                            </a>
						</div>
					<?php endwhile; endif;
					wp_reset_postdata(); ?> 	
					</div>
				</div>
			</div>
		</section>

		<!-- COMPANY INFO -->
		<section id="company-home" class="bg-dark position-relative">

			<img src="<?php bloginfo('template_url'); ?>./img/icons/horizontal-liine.svg" alt="Background Wave" class="hr-line position-absolute">
			<div class="wrapper">
				<div class="company-home-info display-flex flex-column">
					<div class="company-p-div display-flex flex-column flex-start">
						<h2 class="company-home-title h2-style white">
							<span class="light-green">
							<?php if( !empty( the_field('intro_titre_yellow') ) ) : ?>
								<?php echo the_field('intro_titre_yellow'); ?> 
							<?php endif; ?>
							</span>
							<?php if( !empty( the_field('intro_titre_white') ) ) : ?>
								<?php echo the_field('intro_titre_white'); ?>
							<?php endif; ?>
						</h2>
						<p class="company-home-p body-style white"><?php echo the_field('intro_contenu'); ?></p>
						<a href="<?php echo site_url('/actualites');  ?>" class="company-btn btn btn-background button-style btn-shadow"><?php echo the_field('intro_btn_contenu'); ?></a>
					</div>
					
					<div class="company-home-image margin-auto">
						<?php $intro_image = get_field('intro_image'); ?>
						<img src="<?php echo esc_url($intro_image['url']); ?>" alt="<?php echo esc_attr($intro_image['alt']); ?>">
					</div>
				</div>
				<img src="<?php bloginfo('template_url'); ?>./img/backgrounds/background_wave.svg" alt="Background Wave" class="company-bg-wave position-absolute width-100 left-0">
			</div>

		</section>
		
		<!-- DERNIERES ACTUALITES -->
		<section id="actuality-home" class="actuality-home text-center padding">
			<h2 class="h2-style wrapper">
				<span class="dar">
				<?php if( !empty( the_field('actualites_titre_noir') ) ) : ?>
					<?php echo the_field('actualites_titre_noir'); ?> 
				<?php endif; ?>
				<span class="main-green">
				<?php if( !empty( the_field('actualites_titre_vert') ) ) : ?>
					<?php echo the_field('actualites_titre_vert'); ?> 
				<?php endif; ?>
				</span>
			</h2>
			<div class="actuality-cards-wrapper wrapper">
		<?php 	
		// request arguments
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 3,
			);

			// WP Query execution
			$my_query = new WP_Query( $args );

			// WP loop
			if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post();
				$image_top = get_field('image_top');
				$content = get_field('contenu_top');
		?>
				<div class="actuality-card-div img-hover bg-white border-box">
					<img src="<?php echo esc_url($image_top['url']); ?>" alt="Titre actualité 1" class="actuality-card-img">
					<div class="actuality-cards-content">
						<h3 class="h3-style"><?php the_field('titre'); ?></h3>
						<p class="body-style main-green"><?php echo date('j F Y', get_post_time()); ?></p>
						<p class="body-style actuality-content"><?php echo mb_strimwidth($content, 0, 215, ' [...]'); ?></p>
						<a href="<?php echo get_permalink(); ?>" class="intro-btn btn button-style btn-background btn-shadow"><?php the_field('btn_lire_plus'); ?></a>
					</div>
				</div>	
		<?php 
			endwhile; endif;

			// reboot main request (important)
			wp_reset_postdata();
		?>
			</div>
			<a href="<?php echo site_url('/actualites');  ?>" class="company-btn btn btn-background button-style btn-shadow"><?php the_field('actualites_btn_contenu'); ?></a>
		</section>

	<!-- TESTIMONY -->
		<section id="testimony-home" class="padding bg-medium position-relative text-center">
			<img src="<?php bloginfo('template_url'); ?>./img/backgrounds/background_wave.svg" alt="Background Wave" class="testimony-bg-wave position-absolute width-100 left-0">
			<h2 class="h2-style testimony-title">
				<span class="main-green">
				<?php if( !empty( the_field('temoignage_titre_vert') ) ) : ?>
						<?php echo the_field('temoignage_titre_vert'); ?> 
				<?php endif; ?>
				</span>
				<?php if( !empty( the_field('temoignage_titre_noir') ) ) : ?>
					<?php echo the_field('temoignage_titre_noir'); ?> 
				<?php endif; ?>
			</h2>


			<div class="splide testimony-cards-wrapper wrapper position-relative" id="parlent-splide" aria-label="Splide Basic HTML Example">
				<div class="splide__track">
					<ul class="splide__list">	
<?php	
					if( have_rows('temoignage_repeteur') ) : while( have_rows('temoignage_repeteur')) : the_row();
						$image = get_sub_field('temoignage_image');
						$content = get_sub_field('temoignage_contenu');
						$name = get_sub_field('temoignage_prenon');
?>
						<li class="splide__slide">
							<div class="testimony-card bg-white splide__slide__container position-relative display-flex flex-column justify-space-between">
							<?php if(null != $image) : ?>
								<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?>" class="testimony-card-img obj-fit">
                            <?php endif ?>
								<div class="testimony-card-content">
								<?php if(null != $content) : ?>
									<p class="body-style"><?php echo $content ?></p>
								<?php endif ?>
								<?php if(null != $name) : ?>
									<span class="subtitle-style prenon position-relative"><?php echo $name ?></span>
								<?php endif ?>

								</div>
							</div>
						</li>
					<?php endwhile; endif; ?>
					</ul>
				</div>
			</div>
			</section>

		<!-- CONTACTS -->
		<section id="contact" class="contact position-relative">
			<img src="<?php bloginfo('template_url'); ?>/img/backgrounds/top-wave-medium.svg" alt="Background Wave" class="contact-bg-wave position-absolute left-0 width-100">
			<!-- Map -->
			<?php echo the_field('contacts_map'); ?> 
			<!-- <iframe class="contact-map width-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2932.8278368654815!2d2.8124801158007267!3d42.68618907916638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b06d67481e8f65%3A0x652ec0021b4fe9ec!2sTravaux%20Urgents!5e0!3m2!1spt-PT!2sfr!4v1663581914365!5m2!1spt-PT!2sfr"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
			<!-- Nous Contacter -->
			<div id="contact-info" class="contact-info padding">
				<div class="contact-wrapper wrapper display-flex flex-column flex-center">
					<h2 class="h2-style section6-title white"><span class="light-green">
						<?php if( !empty( the_field('titre_contacts_vert') ) ) : ?>
							<?php echo the_field('titre_contacts_vert'); ?> 
						<?php endif; ?>
						</span> 
						<?php if( !empty( the_field('titre_contacts_blanc') ) ) : ?>
							<?php echo the_field('titre_contacts_blanc'); ?> 
						<?php endif; ?>
					</h2>
					<div class="phone-contact display-flex">
						<img src="<?php bloginfo('template_url'); ?>/img/icons/phone.svg" alt="Contact" class="light-green">
						<p class="contact-p h3-style white"><?php the_field('telephone_contacts'); ?></p>
					</div>
					<p class="body-style white"><?php the_field('phrase_1_contacts'); ?></p>
					<p class="h3-style contact-p-h3 light-green"><?php the_field('phrase_2_contacts'); ?></p>

					<!-- Contact Form -->
					<?php echo do_shortcode(get_field('contact_form')); ?>
				</div>
			</div>
		</section>

		<!-- Scroll Up btn -->
		<div class="scroll-up-btn-container btn-background position-fixed right-0">
			<a href="#">
				<img src="<?php bloginfo('template_url'); ?>/img/icons/scroll_up_btn.svg" alt="Scroll Up" class="scroll-up-img">
			</a>
		</div>
	</main>
<?php get_footer(); ?>
