<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="google-site-verification" content="IoEymr3yLXeNPq224v_8IWAMPwOFo7sOlB3Jpu5P3KA" />

    <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>

    <?php // Dynamic Meta Tags for better SEO and maintainability ?>
    <meta name="description" content="<?php echo is_front_page() ? 'وب‌سایت شخصی محمد دریس، مهندس برق قدرت و ابزار دقیق و برنامه‌نویس پایتون.' : wp_strip_all_tags(get_the_excerpt(), true); ?>">
    <meta name="keywords" content="محمد دریس, مهندس برق, ابزار دقیق, برنامه‌نویس پایتون, دفتر فنی, تحلیل داده, خوزستان, اهواز">
    <meta name="author" content="محمد دریس">
    <link rel="canonical" href="<?php echo home_url(); ?>">

    <?php // Dynamic Open Graph Tags for social media sharing previews ?>
    <meta property="og:title" content="<?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?>">
    <meta property="og:description" content="<?php echo is_front_page() ? 'وب‌سایت شخصی محمد دریس، مهندس برق قدرت و ابزار دقیق و برنامه‌نویس پایتون.' : wp_strip_all_tags(get_the_excerpt(), true); ?>">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/on.png">
    <meta property="og:url" content="<?php echo is_front_page() ? home_url() : get_permalink(); ?>">
    <meta property="og:type" content="<?php echo is_front_page() ? 'website' : 'article'; ?>">
    <meta property="og:locale" content="fa_IR">

    <?php // Dynamic Twitter Card Tags for Twitter sharing previews ?>
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?>">
    <meta name="twitter:description" content="<?php echo is_front_page() ? 'وب‌سایت شخصی محمد دریس، مهندس برق قدرت و ابزار دقیق و برنامه‌نویس پایتون.' : wp_strip_all_tags(get_the_excerpt(), true); ?>">
    <meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/on.png">

    <?php // Favicons for different devices and contexts ?>
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon.ico" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/apple-touch-icon.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/site.webmanifest">

    <?php // Preload assets only on the front page for better performance and faster loading ?>
    <?php if (is_front_page()): ?>
        <link rel="preload" as="image" href="<?php echo get_template_directory_uri(); ?>/assets/images/on.png">
        <link rel="preload" as="image" href="<?php echo get_template_directory_uri(); ?>/assets/images/off.png">
        <link rel="preload" as="audio" href="<?php echo get_template_directory_uri(); ?>/assets/audio/power-on.mp3">
        <link rel="preload" as="audio" href="<?php echo get_template_directory_uri(); ?>/assets/audio/power-off.mp3">
        <link rel="preload" as="audio" href="<?php echo get_template_directory_uri(); ?>/assets/audio/noise.mp3">
    <?php endif; ?>
    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Person",
      "name": "محمد دریس",
      "url": "<?php echo home_url(); ?>",
      "image": "<?php echo get_template_directory_uri(); ?>/assets/images/on.png", "sameAs": [
        "https://t.me/mohder",
        "https://www.linkedin.com/in/mohammad-deris-a842b2230/",
        "https://instagram.com/mohder79",
        "https://github.com/mohder79"
      ],
      "jobTitle": "مهندس برق و ابزار دقیق و برنامه‌نویس پایتون",
      "worksFor": {
        "@type": "Organization",
        "name": "Faradast Energy Falat"
      },
      "alumniOf": {
        "@type": "CollegeOrUniversity",
        "name": "دانشگاه آزاد اسلامی واحد اهواز"
      },
      "knowsAbout": ["مهندسی برق", "ابزار دقیق", "پایتون", "تحلیل داده", "Pine Script", "Selenium", "MATLAB", "WordPress", "PFD", "P&ID", "SLD", "DCS", "ESD", "محمد دریس", "Automation Studio"],
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "اهواز",
        "addressRegion": "خوزستان",
        "addressCountry": "IR"
      }
    }
    </script>
    
    <?php wp_head(); ?>
</head>
<body id="page" <?php body_class(); ?>>