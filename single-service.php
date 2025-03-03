<?php
get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
?>
        <img class="single-header" src="http://localhost/znet/wp-content/uploads/2025/02/banner-3-2-1.jpg" />
        <div class="service-page">
            <div id="primary" class="content-area">
                <main id="main" class="service-single-container">

                    <article id="service-<?php the_ID(); ?>" <?php post_class(); ?>>


                        <div class="blog-header">
                            <h1 class="blog-title"><?php the_title(); ?></h1>
                        </div>

                        <div class="service-content">
                            <div class="blog-content">

                                <?php the_content(); ?>

                            </div>

                            <aside id="secondary" class="widget-area-service">
                                <?php if (is_active_sidebar('service-sidebar')) : ?>
                                    <?php dynamic_sidebar('service-sidebar'); ?>
                                <?php else : ?>
                                    <p>Ajoutez des widgets à la sidebar via l’admin WordPress.</p>
                                <?php endif; ?>
                            </aside>
                        </div>
                    </article>

                </main>
            </div>


        </div>

<?php
    endwhile;
endif;



get_footer();
?>