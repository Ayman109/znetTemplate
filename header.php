<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="wrapper" class="hfeed">

        <header class="site-header">
            <div class="container">
                <div class="header-content">
                    <!-- Logo -->
                    <div class="logo">
                        <?php if (has_custom_logo()) {
                            the_custom_logo();
                        } else { ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>"> <?php bloginfo('name'); ?> </a>
                        <?php } ?>
                    </div>


                    <!-- Menu Navigation -->
                    <nav class="main-navigation">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'nav-menu',
                            'container'      => false,
                            'walker'         => new Custom_Walker_Nav_Menu()
                        ));
                        ?>
                    </nav>


                    <!-- Menu Toggle Button for Mobile -->
                    <div class="hamburger" id="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

    

                </div>
            </div>
        </header>
        <div id="container">
          
            <main id="content" role="main">
                                  <!------ Mobile Menu --------->
                    <div class="mobile-menu">
                        <nav class="main-navigation">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'mobile-nav-menu',
                            'container'      => false,
                            'walker'         => new Custom_Walker_Nav_Menu()
                        ));
                        ?>
                    </nav>
                    </div>

                    <a href="#" class="toTop">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="70" height="70" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" fill-rule="evenodd" class="hovered-paths"><g><path d="m12 9.414-6.293 6.293a1 1 0 0 1-1.414-1.414l7-7a.999.999 0 0 1 1.414 0l7 7a1 1 0 0 1-1.414 1.414z" fill="#ffffff" opacity="1" data-original="#000000" class="hovered-path"></path></g></svg>
                    </a>


                    <div class="social-media">
                        <a class="social-icon" href=<?php echo esc_url( get_theme_mod( 'facebook_link' ) );?> >
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" height="40" x="0" y="0" viewBox="0 0 60 60" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M22.316 12.234v7.985h-5.85v9.766h5.85V59h12.021V29.985H42.4s.754-4.684 1.121-9.803H34.38v-6.677c0-.997 1.309-2.34 2.605-2.34h6.547V.999h-8.9C22.02 1 22.316 10.774 22.316 12.234z" style="stroke-width:1.5;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10" fill="none" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="1" data-original="#231f20" opacity="1" class=""></path></g></svg>
                        </a>
                        <a class="social-icon" href=<?php echo esc_url( get_theme_mod( 'instagram_link' ) );?> >
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" height="40" x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M188.385 248.941H67.615a60.626 60.626 0 0 1-60.558-60.556V67.615A60.626 60.626 0 0 1 67.615 7.06h120.77a60.626 60.626 0 0 1 60.558 60.556v120.77a60.626 60.626 0 0 1-60.558 60.556zM67.615 17.1A50.573 50.573 0 0 0 17.1 67.615v120.77A50.573 50.573 0 0 0 67.615 238.9h120.77a50.573 50.573 0 0 0 50.516-50.516V67.615A50.573 50.573 0 0 0 188.385 17.1z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path><path d="M128 189.846a61.846 61.846 0 1 1 61.846-61.847A61.916 61.916 0 0 1 128 189.846zm0-113.65a51.805 51.805 0 1 0 51.804 51.803A51.862 51.862 0 0 0 128 76.195zM192.088 76.016a18.004 18.004 0 1 1 18.005-18.004 18.025 18.025 0 0 1-18.005 18.004zm0-25.968a7.963 7.963 0 1 0 7.963 7.964 7.973 7.973 0 0 0-7.963-7.964z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path></g></svg>                        </a>
                        <a class="social-icon" href=<?php echo esc_url( get_theme_mod( 'linkedin_link' ) );?> >
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" height="40" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M69.12 4.267c-18.773 0-35.84 6.827-48.64 19.627C6.827 37.547 0 54.613 0 72.533c0 18.773 7.68 35.84 20.48 48.64 12.8 12.8 30.72 20.48 47.787 19.627h1.707c17.067 0 33.28-6.827 46.08-19.627 12.8-12.8 20.48-29.867 20.48-48.64.853-17.92-6.827-34.987-19.627-47.787C104.107 11.093 87.04 4.267 69.12 4.267zm34.987 104.96c-9.387 9.387-22.187 15.36-35.84 14.507-12.8 0-26.453-5.12-35.84-14.507-10.24-9.387-15.36-23.04-15.36-36.693s5.12-26.453 15.36-36.693c9.387-9.387 22.187-14.507 36.693-14.507 12.8 0 25.6 5.12 34.987 14.507 10.24 10.24 15.36 23.04 15.36 36.693s-5.12 27.306-15.36 36.693zM102.4 157.867H33.28c-13.653 0-24.747 11.093-24.747 25.6v298.667c0 13.653 11.947 25.6 25.6 25.6H102.4c13.653 0 25.6-11.947 25.6-24.747v-299.52c0-13.654-11.947-25.6-25.6-25.6zm8.533 325.12c0 4.267-4.267 7.68-8.533 7.68H34.133c-4.267 0-8.533-4.267-8.533-8.533V183.467c0-4.267 3.413-8.533 7.68-8.533h69.12c4.267 0 8.533 4.267 8.533 8.533v299.52zM392.533 149.333h-17.92c-33.28 0-64.853 14.507-85.333 37.547v-11.947c0-8.533-8.533-17.067-17.067-17.067H186.88c-7.68 0-17.067 6.827-17.067 16.213v318.293c0 9.387 9.387 15.36 17.067 15.36h93.867c7.68 0 17.067-5.973 17.067-15.36v-184.32c0-28.16 20.48-50.347 46.933-50.347 13.653 0 26.453 5.12 35.84 14.507 8.533 7.68 11.947 19.627 11.947 34.987v183.467c0 8.533 8.533 17.067 17.067 17.067h85.333c8.533 0 17.067-8.533 17.067-17.067v-220.16C512 202.24 459.947 149.333 392.533 149.333zm102.4 340.48-.853.853h-83.627L409.6 307.2c0-20.48-5.12-35.84-16.213-46.933-12.8-12.8-29.867-19.627-47.787-19.627-35.84.853-64 29.867-64 67.413v182.613h-93.867V174.933h84.48l.853.853v53.76l23.04-23.04.853-.853c17.067-23.893 46.933-39.253 78.507-39.253h17.92c57.173 0 101.547 46.08 101.547 104.107v219.306z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path></g></svg>
                        </a>


                    </div>