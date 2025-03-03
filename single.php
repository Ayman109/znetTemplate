<?php get_header(); ?>
<img class="single-header" src="http://localhost/znet/wp-content/uploads/2025/02/banner-3-2-1.jpg"/>

<main class="blog-single-container">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php 
    function estimated_reading_time($post_id) {
        $content = get_post_field('post_content', $post_id);
        $word_count = str_word_count(strip_tags($content));
        $reading_speed = 200; // mots par minute
        $time = ceil($word_count / $reading_speed);
    
        return $time . ' min de lecture';
    }
    ?>
    
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="blog-header">
                <h1 class="blog-title"><?php the_title(); ?></h1>

                <div class="blog-meta-container">
               <?php echo get_avatar( get_the_author_meta( 'ID' ), 44)?> 
               <div class="blog_meta_info">
               <a href="#" class="author_name"><?php the_author(); ?></a>
               <p class="blog-meta"> <?php echo estimated_reading_time(get_the_ID())." . ".get_the_date(); ?> </p>
               </div>
                </div>

                <div class="blog_reaction">
                    <p><?php echo get_comments_number() . ' commentaires'; ?></p>
                </div>

</div>


            
            <div class="blog-content">
                <?php the_content(); ?>
            </div>
            
            <footer class="blog-footer">
                <div class="blog-categories">
                    <strong>Catégories :</strong> <?php the_category(', '); ?>
                </div>
                <div class="blog-tags">
                    <?php the_tags('<strong>Tags :</strong> ', ', ', ''); ?>
                </div>
            </footer>
        </article>
        
        <nav class="blog-navigation">
            <div class="prev-post"> <?php previous_post_link(); ?> </div>
            <div class="next-post"> <?php next_post_link(); ?> </div>
        </nav>
       
    <?php endwhile; endif; ?>

    <?php comments_template();?>
</main>

<?php get_footer(); ?>
