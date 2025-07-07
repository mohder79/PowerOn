<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @link
 * @package PowerOn
 * @author Mohammad Deris
 * @version 1.0.0
 * @license GNU General Public License v2.0 or later
 * This theme is open for anyone to use without restriction.
 */

get_header(); // Include the theme header.
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e( '404 - صفحه پیدا نشد', 'poweron' ); ?></h1> </header>
            <div class="page-content">
                <p><?php esc_html_e( 'به نظر می‌رسد صفحه مورد نظر شما وجود ندارد. شاید لینکی اشتباه وارد کرده‌اید یا صفحه حذف شده است.', 'poweron' ); ?></p> <p><?php esc_html_e( 'می‌توانید به صفحه اصلی بازگردید:', 'poweron' ); ?></p> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button-back-to-home">
                    <?php esc_html_e( 'بازگشت به صفحه اصلی', 'poweron' ); ?>
                </a> </div>
        </section>

    </main>
</div>

<?php
get_footer(); // Include the theme footer.
?>

<style>
/* Ensure the body takes full viewport height for proper centering */
html, body {
    height: 100%;
}
body {
    display: flex;
    flex-direction: column;
    /* Default background and text colors are managed by style.css */
}
#main {
    flex-grow: 1; /* Allows the main content area to take up available space */
    display: flex;
    align-items: center; /* Vertically centers content */
    justify-content: center; /* Horizontally centers content */
}

/* Main styling for the 404 section */
.error-404 {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: calc(100vh - 100px); /* Adjust minimum height, accounting for header/footer space */
    text-align: center;
    padding: 40px 20px;
    box-sizing: border-box;
    max-width: 800px;
    margin: 0 auto;
    background-color: transparent; /* Allows the main body background to show through */
}

.page-header {
    margin-bottom: 30px;
}

.page-title {
    font-size: 3em; /* Larger size for prominence */
    margin-bottom: 15px;
    color: #f0f0f0; /* Default color (off state) from style.css */
    transition: color 0.4s ease;
    font-family: "Vazirmatn", sans-serif; /* Explicit font setting */
}

/* Title color change in 'on' state */
body.on .page-title {
    color: #333; /* Color in 'on' state from style.css */
}

.page-content p {
    font-size: 1.2em;
    line-height: 1.8;
    margin-bottom: 20px;
    color: #c0c0c0; /* Slightly darker color for secondary text in dark mode */
    transition: color 0.4s ease;
    font-family: "Vazirmatn", sans-serif; /* Explicit font setting */
}

/* Text color change in 'on' state */
body.on .page-content p {
    color: #555; /* Secondary text color for 'on' state */
}

/* Styling for the back-to-home button */
.button-back-to-home {
    display: inline-block;
    background-color: #2c2c2c; /* Consistent with default load-more-button and blog-button */
    color: white;
    padding: 14px 30px;
    border: none;
    border-radius: 8px;
    text-decoration: none;
    font-size: 1.1em;
    font-weight: bold;
    transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    font-family: "Vazirmatn", sans-serif; /* Explicit font setting */
}

/* Hover effect for the button */
.button-back-to-home:hover {
    background-color: #008fa7; /* Consistent with blog-button hover */
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 8px 18px rgba(0, 0, 0, 0.35);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .page-title {
        font-size: 2.5em;
    }
    .page-content p {
        font-size: 1em;
    }
    .button-back-to-home {
        padding: 12px 25px;
        font-size: 1em;
    }
}

@media (max-width: 480px) {
    .page-title {
        font-size: 2em;
    }
    .page-content p {
        font-size: 0.9em;
    }
    .button-back-to-home {
        padding: 10px 20px;
        font-size: 0.9em;
    }
}
</style>