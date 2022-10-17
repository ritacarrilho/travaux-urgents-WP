<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<link rel="icon" type="image/svg+xml" href="/vite.svg" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<?php wp_head(); ?> <!-- load styles -->
</head>
<body>
	<!-- HEADER -->
	<header class="white">
		<div class="nav-wrapper body-style wrapper">
			<div class="header-logo-wrapper">
				<div class="logo-mobile-wrapper">
			<!-- MENU -->
					<!-- Burguer Menu -->
					<div class="main-menu">
						<button type="button" id="menu-btn">
							<span></span>
							<span></span>
							<span></span>
						</button>
					</div>
<?php
					$logo = get_field('info_general_logo', 'option');

?>
					<a href="callto:0468673770" class="white header-mobile-contact">
						<img src="<?php bloginfo('template_url'); ?> /img/icons/phone.svg" alt="Contact">
						<p class="body-style no-padding"><?php the_field('info_general_telephone_1', 'option') ?></p>
					</a>
				</div>

					<div class="logo-desktop-wrapper display-none">
						<!-- Logo desktop -->
						<a href="<?php echo home_url( '/' ); ?>" class="desktop-logo">
							<img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_url($logo['alt']); ?>" id="logo-desktop">
						</a>
					</div>

			<!-- Header Contacts -->
			<div class="wrapper-contacts">
				<ul class="home-contacts wrapper-contacts">
					<li class="contact-flex">
						<a href="#" class="white">
							<img src=" <?php bloginfo('template_url'); ?>/img/icons/location.svg" alt="location" class="header-icon">
							<div class="header-contacts-flex display-flex wrap">							
								<span class="body-style menu-contact-el no-padding"><?php the_field('info_general_adresse_rue', 'option') ?></span>
								<span class="body-style no-padding"><?php the_field('info_general_adresse_code_postal', 'option') ?></span>
							</div>
						</a>
					</li>
					<li class="contact-flex">
						<a href="callto:0468673770" class="white">
							<img src= "<?php bloginfo('template_url'); ?>/img/icons/phone.svg" alt="Contact" class="header-icon">
							<div class="header-contacts-flex display-flex wrap">
								<span class="body-style no-padding"><?php the_field('info_general_telephone_1', 'option') ?> </span>
								<span class="body-style no-padding"><?php the_field('info_general_telephone_2', 'option') ?></span>
							</div>
						</a>
					</li>
					<li class="contact-flex">
						<a href="#" class="white">
							<img src="<?php bloginfo('template_url'); ?>/img/icons/clock.svg" alt="Schedule" class="header-icon">
							<div class="header-contacts-flex display-flex wrap">
								<span class="body-style no-padding"><?php the_field('info_general_horaire_jours', 'option') ?></span>
								<span class="body-style no-padding"><?php the_field('info_general_horaire_heures', 'option') ?></span>
							</div>
						</a>
					</li>
				</ul>
			</div>
			
			<!-- Contact Button -->
			<div class="contact-btn-wrapper">
				<a href="<?php echo site_url('/contacts'); ?>" class="header-button btn btn-background btn-shadow">
					<p>Une Urgence ?<span class="contactez-nous-span">Contactez-nous</span></p>
				</a>
			</div>
		</div>

		<!-- Navbar -->
		<nav id="nav-bar" class="nav-menu">
				<!-- Close Menu btn -->
				<button type="button" id="close-menu-btn" class="is-hidden position-alsolute">
					<span class="close-menu-btn-el"></span>
					<span class="close-menu-btn-el"></span>
				</button>
				<a href="./index.html" id="mobile-ul-logo" class="mobile-ul-logo is-hidden position-alsolute">
					<img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_url($logo['alt']); ?>" id="logo-mobile">
				</a>

<?php 
					wp_nav_menu( 
						array( 
							'theme_location' => 'main', 
							'container' => 'ul',
							'menu_class' => 'menu-nav is-hidden', 
							'link-class' => 'link'
						)
					); 
					
					// $menu_name = 'main';
					// $locations = get_nav_menu_locations();
					// $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
					// // get all elements from menu
					// $menu_items = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
					// // get prestations element
					// $menu_li = wp_get_nav_menu_items($menu->term_id, array('title' => 'Prestations') ); 
			
					// // var_dump($menu_li);
			
					// foreach($menu_items as $item) {
					// 	$title = $item->title;
					// 	$url = $item->url;
					// }
			
					// 	if(isset($menu_li)) :
					// 		$args_prestations = array(
					// 			'post_type' => 'prestations',
					// 		);
						
					// 		$sub_cats = new WP_Query( $args_prestations );
					// 		// var_dump( $sub_cats );
					// 		?>
							<!-- <ul class="submenu"> -->
<?php
					// 		if( $sub_cats->have_posts() ) : while( $sub_cats->have_posts() ) : $sub_cats->the_post();
					// 			// var_dump(the_title()); ?>
					<!-- <li class="menu-item"> -->
 				<!-- <a href="<?php //echo the_permalink(); ?>"><?php //the_field('article_section_titre'); ?></a> -->
				<!-- </li> -->
			<?php
					// 	endwhile; endif; endif  ?>
					</ul>
		</nav>
	</header>

	<main>
