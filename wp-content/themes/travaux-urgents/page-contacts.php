<?php 
/*
 * Template Name: Contacts
 */

get_header(); ?>

    <section id="banner-contacts" class="banner-section padding">
        <div class="wrapper banner-title-wrapper">
            <h1 class="banner-title body-style"><?php the_field('titre_contacts') ?></h1>
        </div>
    </section>

    <section id="submenu-contacts" class="actualites">
        <div class="wrapper banner-title-wrapper body-style">
            <!-- Search -->
            <div class="submenu-wrapper">
                <a href="<?php echo home_url( '/' ); ?>" class="dark">Accueil</a>
                <span class="">/</span>
                <p class="main-green display-block"><?php the_field('titre_contacts') ?></p>
                <!-- <a href="#" class="main-green">Nos contacter</a> -->
            </div>
        </div>
    </section>

    <section id="contacts" class="contact wrapper">
        <h2 class="h2-style text-center"><?php the_field('horaires_titre_noir') ?><span class="main-green"><?php the_field('horaires_titre_vert') ?></span></h2>
    </section>

	<!-- CONTACTS -->
		<section id="" class="contact position-relative">
			<img src="<?php bloginfo('template_url'); ?>/img/backgrounds/top-wave-light.svg" alt="Background Wave" class="contact-bg-wave position-absolute left-0 width-100">
		<!-- Map -->
			<?php echo the_field('contacts_map'); ?> 
			<!-- <iframe class="contact-map width-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2932.8278368654815!2d2.8124801158007267!3d42.68618907916638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b06d67481e8f65%3A0x652ec0021b4fe9ec!2sTravaux%20Urgents!5e0!3m2!1spt-PT!2sfr!4v1663581914365!5m2!1spt-PT!2sfr"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
		<!-- Nous Contacter -->
			<div id="" class="contact-info padding">
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