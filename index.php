<?php
/**
 * The main template file
 *

 *
 * @link 
 * @package PowerOn
 * @author Mohammad Deris
 * @version 1.0.0
 * @license GNU General Public License v2.0 or later
 * This theme is open for anyone to use without restriction.
 */

get_header(); // Function to include header.php

// This content will be displayed if no more specific template is found.
// For this theme, it's primarily designed for the front-page (resume) and single posts (blog).
// This index.php acts as a general fallback or for archive pages if not explicitly handled.
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <h1 style="text-align: center; margin-top: 50px;">به وب‌سایت محمد دریس خوش آمدید!</h1>

        <p style="text-align: center; max-width: 600px; margin: 20px auto; line-height: 1.8;">
            این یک صفحه پیش‌فرض است.
        </p>


        <?php
        // Check if there are posts to display.
        if ( have_posts() ) :

            // If it's the blog homepage and not the static front page, display the blog title.
            if ( is_home() && ! is_front_page() ) :
                ?>
                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header>
                <?php
            endif;

            /* Start the Loop */
            // Loop through each post.
            while ( have_posts() ) :
                the_post();

                /*
                 * Include the Post-Format-specific template for the content.
                 * You might want to create content.php in a 'template-parts' folder
                 * for more complex themes. For now, this just uses the default post content.
                 */
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('post-content-entry'); ?>>
                    <header class="entry-header">
                        <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                    </header>
                    <?php
                    // Display the post thumbnail if available.
                    if ( function_exists( 'poweron_post_thumbnail' ) ) { // Check for the theme-specific post thumbnail function
                        poweron_post_thumbnail();
                    }
                    ?>

                    <div class="entry-content">
                        <?php
                        the_excerpt(); // Display excerpt for archive pages
                        ?>
                    </div>
                    <footer class="entry-footer">
                        <?php // You can add post meta like date, author, categories here ?>
                        <a href="<?php the_permalink(); ?>" class="read-more-button" style="display:inline-block; margin-top:10px; padding:8px 15px; background:#007bff; color:white; border-radius:5px; text-decoration:none;">ادامه مطلب</a>
                    </footer>
                </article>
                <?php

            endwhile;

            the_posts_navigation(); // Display pagination for navigating through posts.

        else :

            // If no posts are found, display a "Nothing Found" message and search form.
            ?>
            <section class="no-results not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'poweron' ); ?></h1> </header>
                <div class="page-content">
                    <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'poweron' ); ?></p> <?php get_search_form(); ?>
                </div>
            </section>
            <?php

        endif;
        ?>

    </main>
</div>
<?php
// get_sidebar(); // Uncomment if you want a sidebar on archive pages
get_footer();  // Function to include footer.php