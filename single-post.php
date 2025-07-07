<?php
/**
 * The template for displaying all single posts.
 *
 * This template uses inline CSS and JavaScript for demonstration purposes.
 * For production, it's generally better to enqueue scripts and styles
 * using functions.php for better performance and maintainability.
 *
 * @link 
 * @package PowerOn
 * @author Mohammad Deris
 * @version 1.0.0
 * @license GNU General Public License v2.0 or later
 * This theme is open for anyone to use without restriction.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="preload" as="image" href="<?php echo get_template_directory_uri(); ?>/assets/images/off-post.png">
    <link rel="preload" as="image" href="<?php echo get_template_directory_uri(); ?>/assets/images/on-post.png">
    <link rel="preload" as="audio" href="<?php echo get_template_directory_uri(); ?>/assets/audio/power-off.mp3"> <style>
        /* Variables for Dark/Light Mode Theming */
        :root{
            --bg-primary-dark:#0A0A0A;
            --bg-secondary-dark:#141414;
            --bg-content-dark:#0F0F0F;
            --text-primary-dark:#EAEAEA;
            --text-secondary-dark:#C0C0C0;
            --accent-primary-dark:#00C2FF;
            --accent-secondary-dark:#7F00FF;
            --border-color-dark:#282828;
            --sidebar-item-hover-bg-dark:#00C2FF;
            --sidebar-item-hover-text-dark:#0A0A0A;
            --icon-fill-dark:#EAEAEA;
            --shadow-color-dark:rgba(0,194,255,.3);

            --bg-primary-light:#F0F2F5;
            --bg-secondary-light:#FFFFFF;
            --bg-content-light:#FAFAFA;
            --text-primary-light:#1C1E21;
            --text-secondary-light:#555555;
            --accent-primary-light:#007BFF;
            --accent-secondary-light:#581C87;
            --border-color-light:#D1D5DB;
            --sidebar-item-hover-bg-light: #E0F2FE; /* A light blue for light mode hover */
            --sidebar-item-hover-text-light: #007BFF; /* A darker blue for light mode hover text */
            --icon-fill-light:#1C1E21; /* Darker icon for light mode */
            --shadow-color-light:rgba(0,123,255,.2); /* Blue shadow for light mode */

            /* Default values, overridden by .light-mode or body:not(.light-mode) */
            --bg-primary:var(--bg-primary-dark);
            --bg-secondary:var(--bg-secondary-dark);
            --bg-content:var(--bg-content-dark);
            --text-primary:var(--text-primary-dark);
            --text-secondary:var(--text-secondary-dark);
            --accent-primary:var(--accent-primary-dark);
            --accent-secondary:var(--accent-secondary-dark);
            --border-color:var(--border-color-dark);
            --sidebar-item-hover-bg:var(--sidebar-item-hover-bg-dark);
            --sidebar-item-hover-text:var(--sidebar-item-hover-text-dark);
            --icon-fill:var(--icon-fill-dark);
            --shadow-color-accent:var(--shadow-color-dark);
        }

        /* Global Body and Layout */
        body{
            margin:0;
            font-family:"Outfit","Vazirmatn",sans-serif; /* Keep your custom font */
            display:flex; /* Layout sidebar and content side-by-side */
            height:100vh; /* Make body fill viewport height */
            direction:rtl; /* Overall RTL direction, puts main scrollbar on left */
            background:var(--bg-primary); /* Use theme variables */
            color:var(--text-primary); /* Use theme variables */
            overflow-y:auto; /* Main scrollbar for the entire page content, positioned on the left due to direction:rtl */
            overflow-x:hidden; /* Prevent horizontal scroll */
            transition:background-color .3s,color .3s; /* Smooth theme transition */
        }
        /* Light Mode Specific Styles */
        body.light-mode{
            --bg-primary:var(--bg-primary-light);
            --bg-secondary:var(--bg-secondary-light);
            --bg-content:var(--bg-content-light);
            --text-primary:var(--text-primary-light);
            --text-secondary:var(--text-secondary-light);
            --accent-primary:var(--accent-primary-light);
            --accent-secondary:var(--accent-secondary-light);
            --border-color:var(--border-color-light);
            --sidebar-item-hover-bg:var(--sidebar-item-hover-bg-light);
            --sidebar-item-hover-text:var(--sidebar-item-hover-text-light);
            --icon-fill:var(--icon-fill-light);
            --shadow-color-accent:var(--shadow-color-light);
        }

        /* Main Content Area - Scrolls with Body, No Individual Scrollbar */
        .content{
            flex:1; /* Take up remaining space in flex container */
            padding:30px;
            background:var(--bg-content); /* Use theme variable */
            position:relative; /* For absolute positioning of toggle buttons */
            transition:background-color .3s,padding-right .3s ease; /* Smooth transition */
            display:flex;
            flex-direction:column;
            align-items:center; /* Center content horizontally */
            justify-content:flex-start; /* Align content to top */
        }

        /* Post Content Entry Styles (from previous iteration) */
        .post-content-entry{
            display:block;
            color:var(--text-secondary);
            line-height:1.7;
            width:100%;
            max-width:800px;
            text-align:right;
            padding-top:120px; /* Space for fixed elements above */
        }
        .post-content-entry h2, .post-content-entry h3, .post-content-entry h4, .post-content-entry h5, .post-content-entry h6{
            color:var(--accent-primary);
            border-bottom:2px solid var(--accent-secondary);
            padding-bottom:10px;
            margin-bottom:20px;
            display:inline-block
        }
        .post-content-entry p{margin-bottom:1.5em}
        .post-content-entry a{color:var(--accent-primary);text-decoration:none}
        .post-content-entry a:hover{text-decoration:underline;color:var(--accent-secondary)}
        .post-content-entry img.post-thumbnail-image{
            width:100%;
            max-width:600px;
            border-radius:12px;
            margin:0 auto 25px;
            box-shadow:0 0 20px var(--shadow-color-accent);
            display:block;
            border:3px solid var(--accent-primary);
            background-color:var(--bg-secondary)
        }
        .post-content-entry .post-actual-content img{
            max-width:100%!important;height:auto!important;display:block;border-radius:8px;margin:10px auto;background-color:transparent;opacity:1!important;visibility:visible!important;border:none!important;padding:0!important;box-shadow:none!important
        }
        .post-content-entry .foogallery{display:block;width:100%;overflow:visible;background-color:transparent!important;border:none!important;padding:0!important;margin:20px 0;text-align:center}
        .post-content-entry .foogallery .fg-item,.post-content-entry .foogallery .fg-thumb{border:none!important;padding:0!important;background-color:transparent!important;box-shadow:none!important;margin:5px!important;display:inline-block!important;vertical-align:top}
        .post-content-entry .foogallery img{max-width:100%!important;height:auto!important;display:block!important;border-radius:6px!important;border:none!important;padding:0!important;box-shadow:none!important;margin:0!important}

        /* Dark/Light Mode Toggle Button - Fixed to Top-Right of Viewport */
        .theme-toggle-button{
            position:fixed; /* Fixed to viewport */
            top:20px;
            right:20px;
            background:transparent; /* Make background transparent */
            border: 2px solid var(--accent-primary); /* Blue border from accent color */
            color:var(--icon-fill); /* Icon color */
            padding:8px;
            border-radius:50%; /* Fully circular */
            cursor:pointer;
            display:flex;
            align-items:center;
            justify-content:center;
            width:40px;
            height:40px;
            filter: drop-shadow(0 0 8px var(--accent-primary)); /* Glow effect */
            z-index:1001; /* High z-index, but will be covered by sidebar's 1002 */
            transition: border-color .3s, filter .3s, transform .2s ease-in-out; /* Smooth transitions */
        }
        .theme-toggle-button:hover {
            transform: scale(1.05); /* Slight scale on hover */
            filter: drop-shadow(0 0 12px var(--accent-primary)); /* More intense glow on hover */
        }
        .theme-toggle-button svg{width:20px;height:20px;fill:var(--icon-fill)}
        .theme-toggle-button .sun-icon{display:none}
        .theme-toggle-button .moon-icon{display:block}
        body.light-mode .theme-toggle-button .sun-icon{display:block}
        body.light-mode .theme-toggle-button .moon-icon{display:none}

        /* Circuit Breaker Toggle Button - Fixed to Top-Left of Viewport */
        .sidebar-toggle-button {
            display: block; /* Default state: visible */
            position: fixed; /* Fixed to viewport */
            top: 20px;
            left: 20px;
            width: 80px; /* Fixed width for the button */
            height: 80px; /* Fixed height for the button to make it square */
            object-fit: contain; /* Ensure the button content (image) fits */
            cursor: pointer;
            z-index: 1003; /* Highest z-index when visible, but will be hidden by JS when sidebar is open */
            border: none; /* No border as per request */
            border-radius: 8px; /* Slightly rounded corners */
            padding: 5px; /* Padding inside the button */
            background-color: transparent; /* Transparent background as per request */
            box-shadow: none; /* No box-shadow as per request */
            display: flex; /* Use flexbox to center the image */
            align-items: center;
            justify-content: center;
            transition: opacity 0.3s ease; /* Add transition for a smoother hide/show if using opacity */
        }
        .sidebar-toggle-button img {
            width: 100%; /* Make the image fill the button */
            height: 100%; /* Make the image fill the button */
            object-fit: contain; /* Ensure the image content is contained */
            border-radius: 4px;
            background-color: transparent;
            padding: 0;
            border: none;
            box-shadow: none;
        }

        /* Sidebar Styles - Scrollbar on Left of Sidebar (RTL content) */
        .sidebar{
            width:300px;
            background:var(--bg-secondary); /* Use theme variable */
            overflow-y:auto; /* Sidebar scrolls independently */
            border-left:1px solid var(--border-color); /* Use theme variable */
            transition:right .3s ease,background-color .3s,border-color .3s; /* Smooth transitions */
            position:fixed;
            top:0;
            right:-300px; /* Hidden off-screen by default */
            height:100%;
            z-index:1002; /* Covers theme-toggle-button */
            box-shadow:-5px 0 15px rgba(0,0,0,.1);
            direction: rtl; /* Set RTL for scrollbar to be on the left and content to be RTL */
            padding-left: 15px; /* Add padding to prevent content overlap with scrollbar */
        }
        .sidebar.active-sidebar{right:0} /* Slide in when active */

        .sidebar-item{padding:15px;border-bottom:1px solid var(--border-color);cursor:pointer;color:var(--text-secondary);display:flex;align-items:center;transition:background-color .3s,color .3s;text-decoration:none;}
        .sidebar-item:hover{background:var(--sidebar-item-hover-bg);color:var(--sidebar-item-hover-text)}.sidebar-item:hover h4{color:var(--sidebar-item-hover-text)}
        .sidebar-item img{width:50px;height:50px;border-radius:50%;margin-left:15px;object-fit:cover;border:2px solid var(--accent-primary);background-color:var(--bg-content)}.sidebar-item h4{margin:0;font-size:16px;color:var(--text-primary);transition:color .3s}
        
        /* Overlay for Mobile Sidebar */
        .mobile-menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none; /* Hidden by default */
        }
        .mobile-menu-overlay.active {
            display: block; /* Show when active */
        }

        /* Custom Scrollbar Styling (Default color and on Left) for Body */
        /* WebKit browsers (Chrome, Safari, Edge, Opera) */
        body::-webkit-scrollbar {
            width: 10px; /* Width of the scrollbar */
            background-color: transparent; /* Transparent track background */
        }
        body::-webkit-scrollbar-track {
            background: transparent; /* No track background */
        }
        body::-webkit-scrollbar-thumb {
            background-color: var(--text-secondary); /* Default color, e.g., gray */
            border-radius: 5px; /* Rounded corners for the thumb */
            border: 2px solid var(--bg-primary); /* Border around the thumb to match background */
        }
        body::-webkit-scrollbar-thumb:hover {
            background-color: var(--text-primary); /* Slightly darker on hover */
        }
        /* Firefox scrollbar for body */
        body {
            scrollbar-width: thin; /* "auto" or "thin" */
            scrollbar-color: var(--text-secondary) transparent; /* thumb color and track color */
        }

        /* Custom Scrollbar Styling for Sidebar (left side, grayish) */
        .sidebar::-webkit-scrollbar {
            width: 8px; /* Slightly thinner for sidebar */
        }
        .sidebar::-webkit-scrollbar-thumb {
            background-color: rgba(128, 128, 128, 0.7); /* Grayish thumb for sidebar */
            border-radius: 4px;
            border: 2px solid var(--bg-secondary); /* Border matching sidebar background */
        }
        .sidebar::-webkit-scrollbar-thumb:hover {
            background-color: rgba(100, 100, 100, 0.9);
        }
        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }
        /* Firefox scrollbar for sidebar */
        .sidebar {
            scrollbar-color: rgba(128, 128, 128, 0.7) transparent;
        }

        /* Responsive Adjustments */
        @media (max-width:768px){
            .content{width:100%;padding:20px;box-sizing:border-box;justify-content:flex-start}
            .theme-toggle-button{top:15px;right:15px;width:35px;height:35px;padding:6px;} /* Mobile adjustment for theme toggle */
            .sidebar-toggle-button{width: 60px;height: 60px;top: 15px;left: 15px;padding: 3px;} /* Mobile adjustment for circuit breaker */
        }
    </style>
</head>
<body <?php body_class(); ?>>
    <div class="mobile-menu-overlay" id="contentOverlay" onclick="closeSidebar()"></div>

    <div class="sidebar" id="blogSidebar">
        <div class="sidebar-inner-rtl-wrapper">
            <?php
            // Arguments for fetching posts for the sidebar
            $args_sidebar = [
                'category_name' => 'اموزش صنعتی', // Fetch posts from 'اموزش صنعتی' category
                'posts_per_page' => 50,
                'orderby' => 'date',
                'order' => 'DESC'
            ];
            $sidebar_query = new WP_Query($args_sidebar);

            // Check if there are posts to display in the sidebar
            if ($sidebar_query->have_posts()) {
                while ($sidebar_query->have_posts()) {
                    $sidebar_query->the_post();
                    // Get the post thumbnail URL, or use a placeholder if none exists
                    $img_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                    if (!$img_url) {
                        $current_theme_is_light = in_array('light-mode', get_body_class());
                        $placeholder_bg_color = $current_theme_is_light ? 'E9ECEF' : '1A1A1A';
                        $placeholder_text_color = $current_theme_is_light ? '555555' : 'C0C0C0';
                        $img_url = 'https://placehold.co/50x50/' . $placeholder_bg_color . '/' . $placeholder_text_color . '?text=' . urlencode(' ');
                    }
                    ?>
                    <a class="sidebar-item" href="<?php the_permalink(); ?>" target="_blank" rel="noopener noreferrer">
                        <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" />
                        <h4><?php the_title(); ?></h4>
                    </a>
                    <?php
                }
                wp_reset_postdata(); // Restore original post data
            } else {
                // Message if no posts are found
                echo '<p style="color:var(--text-secondary);padding:15px;text-align:center;">هیچ پستی یافت نشد.</p>';
            }
            ?>
        </div>
    </div>

    <div class="content">
        <button id="sidebarToggleButton" class="sidebar-toggle-button" aria-label="نمایش/پنهان کردن منوی بلاگ">
            <img id="sidebarToggleImage" src="<?php echo get_template_directory_uri(); ?>/assets/images/on-post.png" alt="Toggle Sidebar" loading="eager"> </button>

        <button class="theme-toggle-button" id="themeToggle" aria-label="Toggle theme">
            <svg class="sun-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5h2.25a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.166 7.758a.75.75 0 001.06-1.06L5.634 5.106a.75.75 0 00-1.06 1.06L6.166 7.758z"/></svg>
            <svg class="moon-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 003.463-.69.75.75 0 01.981.98 10.503 10.503 0 01-9.694 6.46c-5.799 0-10.5-4.701-10.5-10.5 0-3.51 1.713-6.625 4.332-8.518a.75.75 0 01.819.162z" clip-rule="evenodd"/></svg>
        </button>
        
        <?php
        // The main post content loop
        if (have_posts()) :
            while (have_posts()) : the_post();
                $thumbnail_url_main = get_the_post_thumbnail_url(get_the_ID(), 'large');
                ?>
                <div class="post-content-entry">
                    <h2><?php the_title(); ?></h2>
                    <?php if ($thumbnail_url_main): ?>
                        <img src="<?php echo esc_url($thumbnail_url_main); ?>" alt="<?php the_title_attribute(); ?>" class="post-thumbnail-image" loading="lazy" />
                    <?php endif; ?>
                    <div class="post-actual-content">
                        <?php the_content(); // This is where FooGallery shortcodes are processed by WordPress ?>
                    </div>
                </div>
                <?php
            endwhile;
        else :
            echo '<p style="color:var(--text-secondary);padding:15px;text-align:center;">محتوایی یافت نشد.</p>';
        endif;
        ?>
        
        <audio id="clickOnSound" class="hidden-audio" src="<?php echo get_template_directory_uri(); ?>/assets/audio/power-on.mp3" preload="auto"></audio> <audio id="clickOffSound" class="hidden-audio" src="<?php echo get_template_directory_uri(); ?>/assets/audio/power-off.mp3" preload="auto"></audio> <audio id="powerOffSound" class="hidden-audio" src="<?php echo get_template_directory_uri(); ?>/assets/audio/power-off.mp3" preload="auto"></audio> </div>

    <script>
        // Get references to DOM elements
        const themeToggleButton = document.getElementById('themeToggle');
        const bodyElement = document.body;
        const clickOnSound = document.getElementById('clickOnSound');
        const clickOffSound = document.getElementById('clickOffSound');

        // Elements for sidebar toggle
        const sidebarToggleButton = document.getElementById('sidebarToggleButton');
        const sidebarToggleImage = document.getElementById('sidebarToggleImage');
        const blogSidebar = document.getElementById('blogSidebar');
        const contentOverlay = document.getElementById('contentOverlay');
        const powerOffSound = document.getElementById('powerOffSound');
        
        // Image paths for the toggle switch
        const offImageUrl = '<?php echo get_template_directory_uri(); ?>/assets/images/off-post.png';
        const onImageUrl = '<?php echo get_template_directory_uri(); ?>/assets/images/on-post.png';
        
        /**
         * Plays a given sound element.
         * @param {HTMLAudioElement} soundElement - The audio element to play.
         */
        function playSound(soundElement) {
            if (soundElement && typeof soundElement.play === 'function') {
                soundElement.currentTime = 0;
                soundElement.play().catch(error => console.error("Audio play failed:", error));
            }
        }

        /**
         * Plays the 'power-off' sound.
         */
        function playPowerOffSound() {
            playSound(powerOffSound);
        }

        /**
         * Sets the initial theme based on localStorage and updates sidebar placeholder images.
         */
        function setInitialTheme() {
            const savedTheme = localStorage.getItem('poweron-blog-theme'); // Changed localStorage key
            bodyElement.classList.toggle('light-mode', savedTheme === 'light');
            // Update sidebar placeholders based on initial theme
            updateSidebarPlaceholders(savedTheme === 'light');
        }
        
        /**
         * Updates the placeholder images in the sidebar based on the current theme.
         * @param {boolean} isLight - True if the light theme is active, false otherwise.
         */
        function updateSidebarPlaceholders(isLight) {
            const sidebarImages = blogSidebar.querySelectorAll('.sidebar-item img');
            const placeholderBase = 'https://placehold.co/50x50/';
            const bgColor = isLight ? 'E9ECEF' : '1A1A1A';
            const textColor = isLight ? '555555' : 'C0C0C0';
            const placeholderText = encodeURIComponent(' ');

            sidebarImages.forEach(img => {
                // Only update if the image is a placeholder
                if (img.src.includes('placehold.co')) {
                    img.src = `${placeholderBase}${bgColor}/${textColor}?text=${placeholderText}`;
                }
            });
        }

        // Event listener for theme toggle button (sun/moon)
        themeToggleButton.addEventListener('click', () => {
            bodyElement.classList.toggle('light-mode');
            const isLight = bodyElement.classList.contains('light-mode');
            localStorage.setItem('poweron-blog-theme', isLight ? 'light' : 'dark'); // Changed localStorage key
            // Play sound based on new theme state
            if (isLight) { // Just switched to light mode (ON)
                playSound(clickOnSound);
            } else { // Just switched to dark mode (OFF)
                playSound(clickOffSound);
            }
            updateSidebarPlaceholders(isLight); // Update sidebar placeholder images
        });
        
        /**
         * Opens the sidebar and updates the main toggle image and plays sound.
         */
        function openSidebar() {
            playPowerOffSound(); // Play 'power-off' sound as requested
            blogSidebar.classList.add('active-sidebar'); // Add active class to sidebar
            contentOverlay.classList.add('active'); // Show overlay
            sidebarToggleImage.src = offImageUrl; // Update sidebar toggle image to 'off' state as requested
            sidebarToggleButton.setAttribute('aria-pressed', 'true'); // Set ARIA pressed state
            bodyElement.style.overflow = 'hidden'; // Disable body scroll when sidebar is open
            sidebarToggleButton.style.display = 'none'; // Hide the sidebar toggle button when sidebar is open
        }

        /**
         * Closes the sidebar and updates the main toggle image.
         * No sound is played when closing.
         */
        function closeSidebar() {
            blogSidebar.classList.remove('active-sidebar'); // Remove active class from sidebar
            contentOverlay.classList.remove('active'); // Hide overlay
            sidebarToggleImage.src = onImageUrl; // Update sidebar toggle image to 'on' state as requested
            sidebarToggleButton.setAttribute('aria-pressed', 'false'); // Set ARIA pressed state
            bodyElement.style.overflow = 'auto'; // Re-enable body scroll when sidebar is closed
            sidebarToggleButton.style.display = 'block'; // Show the sidebar toggle button when sidebar is closed
        }

        // Event listener for the sidebar toggle button
        sidebarToggleButton.addEventListener('click', () => {
            if (blogSidebar.classList.contains('active-sidebar')) {
                closeSidebar(); // If sidebar is open, close it (no sound)
            } else {
                openSidebar(); // If sidebar is closed, open it (play 'power-off' sound)
            }
        });

        // Keyboard accessibility for the sidebar toggle button
        sidebarToggleButton.addEventListener('keydown', (event) => {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault(); // Prevent default scroll behavior for spacebar
                sidebarToggleButton.click(); // Simulate a click
            }
        });

        // When the DOM is fully loaded, set the initial theme and ensure sidebar is closed
        document.addEventListener('DOMContentLoaded', function() {
            setInitialTheme(); // Apply saved theme
            closeSidebar(); // Ensure sidebar is closed on initial load (sets image to 'on' and shows button)
        });
    </script>

    <?php wp_footer(); ?>
</body>
</html>