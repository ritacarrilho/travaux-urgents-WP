    </main>
<!-- FOOTER -->
    <footer>
        <?php wp_footer(); ?> <!-- load scripts -->
        
    <!-- Footer contacts -->
        <div id="footer-coordinates" class="white footer-padding">
            <div class="wrapper coordinates-wrapper">
                <div class="footer-logo-container">
<?php 
                $logo = get_field('info_general_logo', 'option'); 
?>
                    <a href="<?php echo home_url( '/' ); ?>"> 
                        <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_url($logo['alt']); ?>" class="footer-logo">
                    </a>
                </div>
                <div class="footer-contacts">
                    <ul class="home-contacts">
                        <li class="contact-flex">
                            <a href="#" class="white">
                                <img src="<?php bloginfo('template_url'); ?>/img/icons/location.svg" alt="location">
                                <p class="body-style no-padding"><?php the_field('info_general_adresse_rue', 'option') ?> - <?php the_field('info_general_adresse_code_postal', 'option') ?></p>
                            </a>
                        </li>
                        <span class="li-line"></span>
                        <li class="contact-flex">
                            <a href="callto:0468673770" class="white">
                                <img src="<?php bloginfo('template_url'); ?>/img/icons/phone.svg" alt="Contact">
                                <p class="body-style no-padding"><?php the_field('info_general_telephone_1', 'option') ?></p>
                            </a>
                        </li>
                        <span class="li-line"></span>
                        <li class="contact-flex">
                            <a href="#" class="white">
                                <img src="<?php bloginfo('template_url'); ?>/img/icons/clock.svg" alt="Schedule">
                                <p class="body-style no-padding"><?php the_field('info_general_horaire_jours', 'option') ?></p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Footer Menu -->
        <div class="footer-menu white bg-green footer-padding">
            <div class="wrapper footer-menu-style">
<?php      
            wp_nav_menu( 
                array( 
                    'theme_location' => 'footer', 
                    'container' => 'ul',
                    'menu_class' => 'footer-menu-ul footer-menu-style', 
                ) 
            ); 
?>
                <!-- <ul class="footer-menu-ul footer-menu-style">
                    <li><a href="index.html">Présentation</a></li>
                    <span class="li-line"></span>
                    <li><a href="prestations.html">Prestations</a></li>
                    <span class="li-line"></span>
                    <li><a href="actualities.html">Actualités</a></li>
                    <span class="li-line"></span>
                    <li><a href="contact.html">Contact</a></li>
                    <span class="li-line"></span>
                    <li><a href="#">Mentions légales</a></li>
                    <span class="li-line"></span>
                    <li><a href="#">RGPD</a></li>
                </ul> -->
            </div>
        </div>

        <!-- Footer Copyrights -->
        <div class="footer-copyrights white bg-dark footer-padding">
            <div class="copyrights-container wrapper">
                <p class="body-style">Copyright © 2022 Travaux Urgents, tous droits réservés</p>
                <p class="body-style">Site créé avec passion par <strong>Agence Point Com Perpignan</strong></p>
            </div>
        </div>
    </footer>

</body>
</html>