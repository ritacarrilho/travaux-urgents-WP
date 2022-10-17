/*
 * Template Name: Prestations
 */

<?php get_header(); ?>

    <!-- Banner -->
    <section id="banner-prestations" class="banner-section">
            <div class="wrapper banner-title-wrapper">
                <h1 class="banner-title body-style">Nos Prestations</h1>
            </div>
        </section>

    <!-- Pages submenu -->
        <section id="prestations" class="actualites">
            <div class="banner-title-wrapper wrapper body-style">
                <!-- Search -->
                <div class="submenu-wrapper">
                    <a href="<?php echo home_url( '/' ); ?>" class="dark">Accueil</a>
                    <span class="">/</span>
                    <a href="#" class="dark">Nos Prestations</a>
                    <span class="">/</span>
                    <a href="<?php echo site_url('/prestations');  ?>" class="main-green"><?php the_title();?></a>
                </div>
            </div>

        <!-- SERVICES - Cards -->
            <div id="services-prestations" class="services-home position-absolute width-100">
                <div class="services-splider splide" id="splide-services" role="group" aria-label="Services Slider">
                    <div class="splide__track">
                        <div class="splide__list">
<?php
                        $args = array(
                            'post_type' => 'prestations',
                        );

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

    <!-- Cards -->
    <section class="prestations-articles">
        <?php if( have_rows('article_repeteur') ) : ?>
            <?php while( have_rows('article_repeteur')) : the_row();
                $sub_value = get_sub_field('titre_article');
                $image = get_sub_field('image_article');
                $sub_value = get_sub_field('liste_article_1');
                $sub_value = get_sub_field('liste_article_2');
                $sub_value = get_sub_field('liste_article_3');
                $sub_value = get_sub_field('liste_article_4'); 
            ?>

                <div id="prestations-card" class="prestations-cards prestations-padding">
                    <div class="prestations-wrapper wrapper position-relative">
                        <img src="<?php echo esc_url($image['url']);?>" alt="<?php echo esc_attr($image['alt']); ?>" class="card-img border-box">
                        
                        <div class="prestations-card-content body-style no-padding">
                            <h2 class="h2-style main-green"><?php the_sub_field('titre_article'); ?></h2>
                            <p><?php the_sub_field('contenu_article'); ?></p>
                            <ul class="no-padding article-content-list">
                                <?php if(null != the_sub_field('liste_article_1')) : ?>
                                    <li class="list-element"><?php the_sub_field('liste_article_1'); ?></li>
                                <?php endif ?>
                                <?php if(null != the_sub_field('liste_article_2')) : ?>
                                    <li class="list-element"><?php the_sub_field('liste_article_2'); ?></li>
                                <?php endif ?>
                                <?php if(null != the_sub_field('liste_article_3')) : ?>
                                    <li class="list-element"><?php the_sub_field('liste_article_3'); ?></li>
                                <?php endif ?>
                                <?php if(null != the_sub_field('liste_article_4')) : ?>
                                    <li class="list-element"><?php the_sub_field('liste_article_4'); ?></li>
                                <?php endif ?>
                            </ul>
                            <a href="#"class="button-style btn-background btn-shadow prestation-btn">En savoir +</a>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php else : ?>
            <h2 class="h2-style wrapper padding">Aucun Article en ce moment...</h2>
        <?php endif ?>

        </section>

		<!-- Scroll Up btn -->
		<div class="scroll-up-btn-container btn-background position-fixed right-0">
			<a href="#">
				<img src="<?php echo get_template_directory_uri(); ?>/img/icons/scroll_up_btn.svg" alt="Scroll Up" class="scroll-up-img">
			</a>
		</div>


<?php get_footer(); ?>