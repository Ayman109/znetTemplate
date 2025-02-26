</main>
</div>

<footer>
    <?php 
    $email = get_theme_mod('contact_email', 'default@email.com');
    $phone = get_theme_mod('contact_phone', '000-000-0000');
    ?>
<div class="footer-container">
<img src="http://localhost/znet/wp-content/uploads/2025/02/6.png" class="animationim"/>

    <div class="first-row-bg">

    <div class="footer-row-first">
    <div class="logo">
                <?php if (has_custom_logo()) {
                    the_custom_logo();
                } else { ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>"> <?php bloginfo('name'); ?> </a>
                <?php } ?>
            </div>
            
          
            <p>
            Are off under folly death writter transforming cold regular. Almost do am or limits of hearts.

            </p>
          
          
            <div class="social-media">

            </div>
    
    </div>

    </div>

<div class="footer-row-info">
<div class="footer-first">
    <div class="logo">
                <?php if (has_custom_logo()) {
                    the_custom_logo();
                } else { ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>"> <?php bloginfo('name'); ?> </a>
                <?php } ?>
            </div>
            
          
            <p>
            Are off under folly death writter transforming cold regular. Almost do am or limits of hearts.

            </p>
          
          
            <div class="social-media">

            </div>
    
    </div>

    <div class="footer-row">
        <h4>Services</h4>
        <?php
        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'menu_class'     => 'footer-nav-menu',
                            'container'      => false,
                       
                        ));
    ?>
    </div>



    <div class="footer-row">
        <h4>Contact</h4>
        <strong>EMAIl</strong>
        <p><?php echo  esc_html($email); ?> </p>
        <strong>PHONE</strong>
        <p><?php echo  esc_html($phone); ?> </p>
    </div>




    <div class="footer-row">
        <h4>NewsLetter</h4>
        <p>Join our subscribers list to get the instant latest news and special offers.</p>
    </div>
    </div>

</div>


<div class="sous-footer">
                    <p>Copyright 2024 Dilabs. All Rights Reserved by Validthemes</p>
</div>
</footer>
<script src=<?php echo get_template_directory_uri()."/scripts/scripts.js" ?> ></script>

<?php wp_footer(); ?>
</body>

</html>