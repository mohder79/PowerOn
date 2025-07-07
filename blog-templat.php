<?php
/**
 * Template Name: PowerOn Themed Blog
 *
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
  <style>
    :root{--bg-primary-dark:#0A0A0A;--bg-secondary-dark:#141414;--bg-content-dark:#0F0F0F;--text-primary-dark:#EAEAEA;--text-secondary-dark:#C0C0C0;--accent-primary-dark:#00C2FF;--accent-secondary-dark:#7F00FF;--border-color-dark:#282828;--sidebar-item-hover-bg-dark:#00C2FF;--sidebar-item-hover-text-dark:#0A0A0A;--icon-fill-dark:#EAEAEA;--shadow-color-dark:rgba(0,194,255,.3);--bg-primary-light:#F0F2F5;--bg-secondary-light:#FFFFFF;--bg-content-light:#FAFAFA;--text-primary-light:#1C1E21;--text-secondary-light:#555555;--accent-primary-light:#007BFF;--accent-secondary-light:#581C87;--border-color-light:#D1D5DB;--sidebar-item-hover-bg:var(--sidebar-item-hover-bg-light);--sidebar-item-hover-text:var(--sidebar-item-hover-text-light);--icon-fill:var(--icon-fill-light);--shadow-color-accent:var(--shadow-color-light)}body{margin:0;font-family:"Outfit","Vazirmatn",sans-serif;display:flex;height:100vh;direction:rtl;background:var(--bg-primary);color:var(--text-primary);overflow-x:hidden;transition:background-color .3s,color .3s}body.light-mode{--bg-primary:var(--bg-primary-light);--bg-secondary:var(--bg-secondary-light);--bg-content:var(--bg-content-light);--text-primary:var(--text-primary-light);--text-secondary:var(--text-secondary-light);--accent-primary:var(--accent-primary-light);--accent-secondary:var(--accent-secondary-light);--border-color:var(--border-color-light);--sidebar-item-hover-bg:var(--sidebar-item-hover-bg-light);--sidebar-item-hover-text:var(--sidebar-item-hover-text-light);--icon-fill:var(--icon-fill-light);--shadow-color-accent:var(--shadow-color-light)}body:not(.light-mode){--bg-primary:var(--bg-primary-dark);--bg-secondary:var(--bg-secondary-dark);--bg-content:var(--bg-content-dark);--text-primary:var(--text-primary-dark);--text-secondary:var(--text-secondary-dark);--accent-primary:var(--accent-primary-dark);--accent-secondary:var(--accent-secondary-dark);--border-color:var(--border-color-dark);--sidebar-item-hover-bg:var(--sidebar-item-hover-bg-dark);--sidebar-item-hover-text:var(--sidebar-item-hover-text-dark);--icon-fill:var(--icon-fill-dark);--shadow-color-accent:var(--shadow-color-dark)}.sidebar{width:300px;background:var(--bg-secondary);overflow-y:auto;border-left:1px solid var(--border-color);transition:right .3s ease,background-color .3s,border-color .3s;position:fixed;top:0;right:-300px;height:100%;z-index:1000;box-shadow:-5px 0 15px rgba(0,0,0,.1)}.sidebar.active-sidebar{right:0}.sidebar-item{padding:15px;border-bottom:1px solid var(--border-color);cursor:pointer;color:var(--text-secondary);display:flex;align-items:center;transition:background-color .3s,color .3s;text-decoration:none;}.sidebar-item:hover{background:var(--sidebar-item-hover-bg);color:var(--sidebar-item-hover-text)}.sidebar-item:hover h4{color:var(--sidebar-item-hover-text)}.sidebar-item img{width:50px;height:50px;border-radius:50%;margin-left:15px;object-fit:cover;border:2px solid var(--accent-primary);background-color:var(--bg-content)}.sidebar-item h4{margin:0;font-size:16px;color:var(--text-primary);transition:color .3s}.content{flex:1;padding:30px;overflow-y:auto;background:var(--bg-content);position:relative;transition:background-color .3s,padding-right .3s ease;display:flex;flex-direction:column;align-items:center;justify-content:center}.theme-toggle-button{position:absolute;top:20px;right:20px;background:var(--bg-secondary);border:1px solid var(--border-color);color:var(--icon-fill);padding:8px;border-radius:50%;cursor:pointer;display:flex;align-items:center;justify-content:center;width:40px;height:40px;box-shadow:0 2px 5px rgba(0,0,0,.1);z-index:100}.theme-toggle-button svg{width:20px;height:20px;fill:var(--icon-fill)}.theme-toggle-button .sun-icon{display:none}.theme-toggle-button .moon-icon{display:block}body.light-mode .theme-toggle-button .sun-icon{display:block}body.light-mode .theme-toggle-button .moon-icon{display:none}#electrical-intro-container{display:flex;flex-direction:column;align-items:center;justify-content:center;padding:40px 20px;text-align:center;width:100%;max-width:500px;margin:auto;color:var(--text-primary)}#electrical-intro-container h2{font-size:2em;color:var(--accent-primary);margin-bottom:10px}#electrical-intro-container p{font-size:1.1em;color:var(--text-secondary);margin-bottom:30px}.interactive-panel{display:flex;justify-content:center;align-items:center}.toggle-switch-container{cursor:pointer;width:40vw;height:20vw;max-width:600px;max-height:300px;min-height:100px;border:none;border-radius:15px;overflow:hidden;box-shadow:none;padding:5px;background-color:transparent}#interactiveToggleImage{display:block;width:100%;height:100%;object-fit:contain}@media (max-width:768px){.content{width:100%;padding:20px;box-sizing:border-box;justify-content:flex-start}.theme-toggle-button{top:15px;right:15px}#electrical-intro-container{margin-top:60px;padding:20px}.toggle-switch-container{width:70vw;height:35vw;max-width:480px;max-height:240px;min-height:80px}}
  </style>
</head>
<body <?php body_class(); ?>>
  <div class="mobile-menu-overlay" id="contentOverlay" onclick="closeSidebar()"></div>

  <div class="sidebar" id="blogSidebar">
    <?php
    $args_sidebar = [
      'category_name' => 'اموزش صنعتی',
      'posts_per_page' => 50,
      'orderby' => 'date',
      'order' => 'DESC'
    ];
    $sidebar_query = new WP_Query($args_sidebar);

    if ($sidebar_query->have_posts()) {
      while ($sidebar_query->have_posts()) {
        $sidebar_query->the_post();
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
      wp_reset_postdata();
    } else {
      echo '<p style="color:var(--text-secondary);padding:15px;text-align:center;">هیچ پستی یافت نشد.</p>';
    }
    ?>
  </div>

  <div class="content">
    <button class="theme-toggle-button" id="themeToggle" aria-label="Toggle theme">
      <svg class="sun-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5h2.25a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.166 7.758a.75.75 0 001.06-1.06L5.634 5.106a.75.75 0 00-1.06 1.06L6.166 7.758z"/></svg>
      <svg class="moon-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 003.463-.69.75.75 0 01.981.98 10.503 10.503 0 01-9.694 6.46c-5.799 0-10.5-4.701-10.5-10.5 0-3.51 1.713-6.625 4.332-8.518a.75.75 0 01.819.162z" clip-rule="evenodd"/></svg>
    </button>
    
    <div class="toggle-switch-container" id="interactiveToggleContainer" aria-pressed="false" tabindex="0">
        <img id="interactiveToggleImage" src="<?php echo get_template_directory_uri(); ?>/assets/images/off-post.png" alt="کلید خاموش/روشن" loading="eager">
    </div>

  </div>

  <audio id="clickOnSound" class="hidden-audio" src="<?php echo get_template_directory_uri(); ?>/power-on.mp3" preload="auto"></audio>

  <script>
    // حذف electricalIntroContainer از اینجا
    // const electricalIntroContainer = document.getElementById('electrical-intro-container');
    const themeToggleButton = document.getElementById('themeToggle');
    const bodyElement = document.body;
    const interactiveToggleContainer = document.getElementById('interactiveToggleContainer');
    const interactiveToggleImage = document.getElementById('interactiveToggleImage');
    const blogSidebar = document.getElementById('blogSidebar');
    const contentOverlay = document.getElementById('contentOverlay');
    const clickOnSound = document.getElementById('clickOnSound');

    const offImageUrl = '<?php echo get_template_directory_uri(); ?>/assets/images/off-post.png';
    const onImageUrl = '<?php echo get_template_directory_uri(); ?>/assets/images/on-post.png';
    
    function playOnSound() {
      if (clickOnSound && typeof clickOnSound.play === 'function') {
        clickOnSound.currentTime = 0;
        clickOnSound.play().catch(error => console.error("خطا در پخش صدا:", error));
      }
    }

    function setInitialTheme() {
      const savedTheme = localStorage.getItem('mohder-blog-theme');
      bodyElement.classList.toggle('light-mode', savedTheme === 'light');
      updateSidebarPlaceholders(savedTheme === 'light');
    }
    
    function updateSidebarPlaceholders(isLight) {
      const sidebarImages = blogSidebar.querySelectorAll('.sidebar-item img');
      const placeholderBase = 'https://placehold.co/50x50/';
      const bgColor = isLight ? 'E9ECEF' : '1A1A1A';
      const textColor = isLight ? '555555' : 'C0C0C0';
      const placeholderText = encodeURIComponent(' ');

      sidebarImages.forEach(img => {
        if (img.src.includes('placehold.co')) {
          img.src = `${placeholderBase}${bgColor}/${textColor}?text=${placeholderText}`;
        }
      });
    }

    themeToggleButton.addEventListener('click', () => {
      bodyElement.classList.toggle('light-mode');
      const isLight = bodyElement.classList.contains('light-mode');
      localStorage.setItem('mohder-blog-theme', isLight ? 'light' : 'dark');
      updateSidebarPlaceholders(isLight);
    });
    
    function openSidebar() {
      playOnSound();
      blogSidebar.classList.add('active-sidebar');
      contentOverlay.classList.add('active');
      interactiveToggleImage.src = onImageUrl;
      interactiveToggleContainer.setAttribute('aria-pressed', 'true');
    }

    function closeSidebar() {
      blogSidebar.classList.remove('active-sidebar');
      contentOverlay.classList.remove('active');
      interactiveToggleImage.src = offImageUrl;
      interactiveToggleContainer.setAttribute('aria-pressed', 'false');
    }

    interactiveToggleContainer.addEventListener('click', () => {
      if (blogSidebar.classList.contains('active-sidebar')) {
        closeSidebar();
      } else {
        openSidebar();
      }
    });

    interactiveToggleContainer.addEventListener('keydown', (event) => {
      if (event.key === 'Enter' || event.key === ' ') {
        event.preventDefault();
        interactiveToggleContainer.click();
      }
    });

    document.addEventListener('DOMContentLoaded', function() {
      setInitialTheme();
      closeSidebar();
    });
  </script>

  <?php wp_footer(); ?>
</body>
</html>