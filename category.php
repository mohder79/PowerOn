<?php
/**
 * The template for displaying Category Archive pages.
 *
 * This template uses inline CSS and JavaScript for demonstration purposes.
 * For production, it's generally better to enqueue scripts and styles
 * using functions.php for better performance and maintainability.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package resume
 */

// Ensure no content is sent before the header if this is not the first template part
if (ob_get_length()) {
    ob_end_clean();
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;700&display=swap" rel="stylesheet">

    <style>
        /* CSS for Category Page - All in one file as requested */
        body {
            margin: 0;
            min-height: 100vh;
            background-color: #f0f0f0; /* Light background for blog posts */
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: "Vazirmatn", sans-serif;
            color: #333;
            direction: rtl; /* For RTL content */
            text-align: right;
            padding: 20px;
            box-sizing: border-box;
        }

        .container {
            max-width: 960px;
            width: 100%;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        h1.page-title {
            color: #2c2c2c;
            text-align: center;
            margin-bottom: 30px;
            font-size: 32px;
            border-bottom: 2px solid #00bcd4;
            padding-bottom: 10px;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }

        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-top: 20px;
            justify-content: center;
        }

        .post-item {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .post-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        .post-item a {
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .post-item img {
            width: 100%;
            height: 200px; /* Fixed height for consistency */
            object-fit: cover;
            border-bottom: 1px solid #eee;
        }

        .post-item h2 {
            font-size: 20px;
            margin: 15px;
            color: #333;
            text-align: center;
            flex-grow: 1; /* Allows title to take available space */
            display: -webkit-box;
            -webkit-line-clamp: 2; /* Limit title to 2 lines */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .post-item .excerpt {
            font-size: 15px;
            color: #555;
            padding: 0 15px 15px;
            line-height: 1.6;
            text-align: justify;
            flex-grow: 1;
        }

        /* Load more button and message are removed as all posts load initially */
        /* You can remove these if you are sure they are not used elsewhere */
        .load-more-button {
            display: none; /* Hide the button */
        }
        #no-more-posts-message {
            display: none; /* Hide the message */
        }


        .back-to-home {
            margin-top: 40px;
            margin-bottom: 20px;
            font-size: 18px;
            text-align: center;
        }
        .back-to-home a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        .back-to-home a:hover {
            color: #0056b3;
        }


        @media (max-width: 768px) {
            h1.page-title {
                font-size: 28px;
            }
            .posts-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            }
        }

        @media (max-width: 600px) {
            h1.page-title {
                font-size: 24px;
            }
            .posts-grid {
                grid-template-columns: 1fr; /* Stack posts vertically on small screens */
            }
            .post-item img {
                height: 180px;
            }
            .post-item h2 {
                font-size: 18px;
            }
            .post-item .excerpt {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="page-title">
            <?php
            // Display the category title
            if ( is_category() ) {
                single_cat_title();
            } elseif ( is_tax() ) {
                single_term_title();
            } else {
                echo 'دسته بندی مطالب'; // Fallback title
            }
            ?>
        </h1>

        <div class="posts-grid" id="category-posts-container">
            <?php
            $current_category = get_queried_object();
            $category_id = 0;

            if ($current_category instanceof WP_Term && isset($current_category->term_id)) {
                $category_id = $current_category->term_id;
            }

            if ($category_id) {
                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => -1, // Load all posts for this category
                    'cat'            => $category_id,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                    'post_status'    => 'publish',
                );
                $category_posts = new WP_Query($args);

                if ($category_posts->have_posts()) :
                    while ($category_posts->have_posts()) : $category_posts->the_post();
                        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                        if (!$thumbnail_url) {
                            $thumbnail_url = get_template_directory_uri() . '/default-post-thumbnail.png'; // Fallback
                        }
                        ?>
                        <div class="post-item">
                            <a href="<?php the_permalink(); ?>" target="_blank" rel="noopener noreferrer">
                                <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>">
                                <h2><?php the_title(); ?></h2>
                                <div class="excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                            </a>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p style="text-align: center;">هیچ مطلبی در این دسته‌بندی یافت نشد.</p>';
                endif;
            } else {
                echo '<p style="text-align: center;">دسته‌بندی مورد نظر یافت نشد یا مشکلی در دریافت آن وجود دارد.</p>';
            }
            ?>
        </div>
        </div>

    <div class="back-to-home">
        <a href="<?php echo esc_url( home_url() ); ?>">بازگشت به صفحه اصلی</a>
    </div>

    <script>
        // No JavaScript for Load More functionality in category.php anymore
        // As all posts are loaded initially.
    </script>
</body>
</html>