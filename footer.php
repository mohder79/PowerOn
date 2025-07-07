<?php
/**
 * The template for displaying the footer
 *
 * @package PowerOn
 * @author Mohammad Deris
 * @version 1.0.0
 * @license GNU General Public License v2.0 or later
 * This theme is open for anyone to use without restriction.
 */
?>
    <footer id="colophon" class="site-footer">
        <div class="footer-content">
            <?php
            // Query for posts from the "Industrial Training" category to display in the footer.
            $industrial_category_slug = 'اموزش صنعتی'; // Category slug for industrial training articles.
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 4, // Display 4 posts initially.
                'category_name'  => $industrial_category_slug,
                'orderby'        => 'meta_value_num',
                'meta_key'       => 'my_custom_order_field', // IMPORTANT: Replace with your actual custom field name for ordering posts.
                'order'          => 'DESC', // Order posts in descending order (newest first).
                'post_status'    => 'publish', // Only retrieve published posts.
            );
            $industrial_posts = new WP_Query($args);

            if ($industrial_posts->have_posts()) :
            ?>
                <div class="industrial-blog-posts">
                    <h3>منتخب مقالات منتشر شده</h3> <div class="posts-grid" id="industrial-posts-container">
                        <?php
                        while ($industrial_posts->have_posts()) : $industrial_posts->the_post();
                            // Get post thumbnail URL, or use a default placeholder if none exists.
                            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium') ?: get_template_directory_uri() . '/assets/images/default-post-thumbnail.png';
                            ?>
                            <div class="industrial-post-item">
                                <a href="<?php the_permalink(); ?>" target="_blank" rel="noopener noreferrer">
                                    <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>">
                                    <h4><?php the_title(); ?></h4>
                                </a>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata(); // Restore original post data to avoid conflicts.
                        ?>
                    </div>
                    </div>
            <?php else : ?>
                <div class="industrial-blog-posts">
                    <p>مقاله‌ای در این دسته یافت نشد.</p> </div>
            <?php endif; ?>

            <a id="blog-button" href="<?php echo home_url('/blog/'); ?>" target="_blank" rel="noopener noreferrer">جهت مشاهده بلاگ کلیک کنید</a>

            <div class="social-links">
                <a href="https://t.me/mohder" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/telegram.png" alt="Telegram Mohammad Deris"></a>
                <a href="https://www.linkedin.com/in/mohammad-deris-a842b2230/" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin.png" alt="LinkedIn Mohammad Deris"></a>
                <a href="https://instagram.com/mohder79" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.png" alt="Instagram Mohammad Deris"></a>
                <a href="https://github.com/mohder79" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/github.png" alt="GitHub Mohammad Deris"></a>
            </div>
        </div>
    </footer>
<?php wp_footer(); ?>
</body>
</html>