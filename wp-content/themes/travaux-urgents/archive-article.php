<?php 
/*
 * Template Name: Actualités
 */
get_header(); ?> <!-- get header -->

<section id="banner-actualities" class="banner-section padding">
            <div class="wrapper banner-title-wrapper">
                <h1 class="banner-title body-style">Nos actualités</h1>
            </div>
        </section>

        <section id="actualites" class="actualites padding">
            <div class="wrapper banner-title-wrapper body-style">
                <!-- Search -->
                <div class="submenu-wrapper">
                    <a href="<?php echo home_url( '/' ); ?>" class="dark">Accueil</a>
                    <span class="">/</span>
                    <a href="<?php echo site_url('/actualites'); ?>" class="main-green">Actualités</a>
                </div>

                <?php // $categories= get_categories(); ?>
                <form action="<?php echo admin_url( 'admin-ajax.php' ); ?>" id="search-form" class="js-load-posts" method="post" >

        
                    <select name="categories" id="category"  class="btn-shadow">

                    <?php $cat_args = array(
                            // 'exclude' => array(1),
                            // 'show_option_none' => __( '- Toutes les catégories -', 'textdomain' ),
                            'show_count'       => 0,
                            'orderby'          => 'name',
                            'echo'             => 0,
                            // 'option_all'       => 'all',
                        );

                        $categories = get_categories($cat_args); ?>
                        <option value="default">- Toutes les catégories -</option>
                        <?php foreach ($categories as $category): ?>
                            
                            
                            <option value="<?php echo $category->term_id ?>"><?php echo $category->name ?></option>
                            <?php  endforeach; ?>

                        <?php // $select  = wp_dropdown_categories( $args ); 
                        // $replace = "<select$1 onchange='return this.form.submit()'>";
                        // $select  = preg_replace( '#<select([^>]*)>#', $replace, $select );

                        // echo $select; ?>

                    
                    <input type="search" name="" id="search-category" placeholder="Rechercher..." class="btn-shadow">
                    <img src="<?php echo bloginfo('template_url'); ?>/img/icons/search.svg" alt="Search" class="search-icon">
                </form>
            </div>

            <!-- Cards -->
            <div id="actuality-page" class="actuality-home cards-section">
                <div class="actuality-cards-wrapper wrapper">

                    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                    // 1. Query arguments
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 4,
                        'paged' => $paged,
                    );

                    // 2. WP Query execution
                    $my_query = new WP_Query( $args );

                    // 3. Loop to get posts
                    if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post();
                        $image_top = get_field('image_top');
                        $content = get_field('contenu_top'); ?>

                        <div class="actuality-card-div img-hover bg-white border-box">
                            <img src="<?php echo esc_url($image_top['url']); ?>" alt="Titre actualité 1" class="actuality-card-img">
                            <div class="actuality-cards-content">
                                <h3 class="h3-style"><?php the_field('titre'); ?></h3>
                                <p class="body-style main-green"><?php echo date('j F Y', get_post_time()); ?></p>
                                <p class="body-style actuality-content"><?php echo mb_strimwidth($content, 0, 215, ' [...]'); ?></p>
                                <a href="<?php echo get_permalink(); ?>" class="intro-btn btn button-style btn-background btn-shadow">Lire la suite</a>
                            </div>
                        </div>	
                    <?php endwhile; endif; 
                    // 4. reboot main query
                    wp_reset_postdata(); ?>

                </div>
            </div>

            <div class="pagination-articles body-style dark">
                <?php // Posts Pagination
                    echo paginate_links( array(
                        'total' => $my_query->max_num_pages,
                        'mid_size' => 2
                    ));
                ?>
            </div>
        </section>

		<!-- Scroll Up btn -->
		<div class="scroll-up-btn-container btn-background position-fixed right-0">
			<a href="#">
				<img src="<?php echo get_template_directory_uri(); ?>/img/icons/scroll_up_btn.svg" alt="Scroll Up" class="scroll-up-img">
			</a>
		</div>

<?php get_footer(); ?>