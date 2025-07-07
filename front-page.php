<?php
/**
 * The template for displaying the front page
 * @package resume
 */

get_header();

// --- Centralized Content Management ---
// By defining content in variables, you can easily update it without touching the HTML structure.
$profile_name = "محمد دریس";
$profile_job_title = "مهندس برق و ابزار دقیق | توسعه‌دهنده پایتون";
$profile_bio = "مهندس برق قدرت با تخصص در حوزه برق صنعتی، ابزار دقیق، و تحلیل نقشه‌های فنی. دارای تجربه عملی در پروژه‌های پالایشگاهی و توسعه نرم‌افزارهای مهندسی با زبان پایتون. مسلط بر تحلیل داده‌های مالی، طراحی الگوریتم‌های معاملاتی و توسعه ابزارهای خودکارسازی. علاقه‌مند به حل مسئله از طریق یادگیری مداوم، مشورت فنی و بهره‌گیری از هوش مصنوعی.";

$personal_details = [
    "تاریخ تولد" => "1379/01/07",
    "وضعیت تاهل" => "مجرد",
    "تحصیلات" => "کارشناسی برق قدرت (۹۴-۹۷)",
    "دانشگاه" => "آزاد اسلامی واحد اهواز"
];

$contact_info = [
    "ایمیل" => "mohder1379@gmail.com",
    "تلفن" => "09034568778",
    "وب‌سایت" => "mohder.ir",
    "موقعیت" => "اهواز"
];

$skills_engineering = [
    "بررسی و تحلیل مدارک برق (Single Line Diagram, Wiring Diagram, Cable Routing) و ابزار دقیق (Loop Diagram, Hook-up, Instrument Index, PFD, P&ID)",
    "بررسی مدارک مهندسی شامل Datasheet، Material Requisition، و Specificationهای تجهیزات",
    "بررسی صورت وضعیت کارگاهی پیمانکاران",
    "بررسی و تهیه گزارش روزانه کارگاهی",
    "آشنایی با سیستم‌های کنترل (DCS - FGS و ...)"
];

$skills_programming = [
    "Python، Pine Script، Pandas، NumPy، TA-Lib",
    "Selenium، Telegram Bot API",
    "تحلیل، بک‌تست و بهینه‌سازی استراتبی‌های معاملاتی",
    "توسعه ابزارهای خودکارسازی و اسکریپت‌نویسی",
    "توسعه کتابخانه‌های پایتون",
    "آشنایی با مفاهیم هوش مصنوعی و کاربردهای آن در تحلیل داده",
    "مدیریت محتوای وب‌سایت و تولید محتوای فنی (مقالات)"
];

$certifications = [
    [
        "title" => "برق صنعتی - جامع و کاربردی",
        "image" => "assets/images/IndustrialElectricity ComprehensiveandPractical.jpg",
        "data_title" => "Industrial Electricity - Comprehensive and Practical"
    ],
    [
        "title" => "دوره جامع مهارت‌های ICDL",
        "image" => "assets/images/ICDL Comprehensive Skill Course.jpg",
        "data_title" => "ICDL Comprehensive Skill Course"
    ],
    [
        "title" => "تسلط بر Automation Studio",
        "image" => "assets/images/Mastering Automation Studio Simulating Industrial Control Systems.jpg",
        "data_title" => "Mastering Automation Studio: Simulating Industrial Control Systems"
    ]
];

$work_experience = [
    [
        "logo" => "assets/images/faradast-energy-falat-logo.png",
        "job_title" => "مهندس برق و ابزار دقیق",
        "company" => "شرکت Faradast Energy Falat - NGL3200",
        "period" => "فوریه 2024 - تاکنون",
        "location" => "اهواز، خوزستان، ایران | حضوری",
        "tasks" => [
            "بررسی گزارش‌های پیمانکاران و ثبت داده‌ها.",
            "بررسی مدارک فنی پروژه (شامل نقشه‌ها و مستندات).",
            "تهیه و ارائه گزارش‌های پیشرفت دوره‌ای به کارفرما.",
            "نظارت بر اجرای صحیح نصب تجهیزات مطابق با هوکاپ (Hook-up).",
            "ارسال درخواست‌های فنی (TQ) به تیم‌های طراحی جهت حل مسائل.",
            "بررسی صورت وضعیت‌های پیمانکاران.",
            "همکاری با تیم‌های مهندسی، اجرا، کنترل پروژه، کنترل کیفیت، و کارفرما." // 
        ]
    ],
    [
        "logo" => "assets/images/independent-team-logo.png",
        "job_title" => "توسعه‌دهنده پایتون",
        "company" => "تیم مستقل",
        "period" => "ژوئن 2023 - سپتامبر 2023",
        "location" => "اهواز، خوزستان، ایران | دورکاری",
        "tasks" => [
            "طراحی، پیاده‌سازی و بهینه‌سازی سیستم‌های بک‌تست و الگوریتم‌های تریدینگ با استفاده از Python و Pine Script.",
            "توسعه ربات‌های معاملاتی برای تحلیل و پردازش داده‌های مالی.",
            "توسعه ابزارهای خودکارسازی و اسکریپت‌نویسی برای بهینه‌سازی فرآیندها."
        ]
    ],
    [
        "logo" => "/assets/images/khuzestan-steel-logo.png",
        "job_title" => "مهندس برق (کارآموزی)",
        "company" => "شرکت فولاد خوزستان",
        "period" => "آگوست 2022 - اکتبر 2022",
        "location" => "اهواز، خوزستان، ایران | حضوری",
        "tasks" => [
            "آشنایی عملی با تجهیزات برق صنعتی و مکانیک در محیط فولاد سازی.",
            "کسب تجربه ارزشمند در فرآیندهای نصب، راه‌اندازی و نگهداری سیستم‌های صنعتی."
        ]
    ],
    [
        "logo" => "assets/images/web - colory.png",
        "job_title" => "مدیر و تولیدکننده محتوا",
        "company" => "وب‌سایت خبری",
        "period" => "آگوست 2016 - تاکنون",
        "location" => "دورکاری",
        "tasks" => [
            "مدیریت کامل و تولید محتوای فنی و تخصصی برای وب‌سایت خبری.",
            "طراحی و توسعه وب‌سایت با استفاده از WordPress و ابزارهای مرتبط.",
            "تجربه مدیریت چندین وب‌سایت، با تمرکز بر وب‌سایت اصلی از سال 2016."
        ]
    ]
];

// --- End of Content ---
?>
    <p id="activate-message">سیستم را فعال کنید</p>

    <img id="switch-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/off.png" alt="سوئیچ برق برای نمایش اطلاعات محمد دریس" role="button" aria-pressed="false">
    <audio id="audio-on" src="<?php echo get_template_directory_uri(); ?>/assets/audio/power-on.mp3" preload="auto"></audio>
    <audio id="audio-off" src="<?php echo get_template_directory_uri(); ?>/assets/audio/power-off.mp3" preload="auto"></audio>
    <audio id="audio-noise" src="<?php echo get_template_directory_uri(); ?>/assets/audio/noise.mp3" preload="auto"></audio>

    <div id="message">
        <div class="personal-info-section">
            <div class="profile-header">
                <img class="profile-image" src="<?php echo get_template_directory_uri(); ?>/assets/images/محمد دریس.png" alt="تصویر پروفایل <?php echo $profile_name; ?>">
                <div class="profile-text-top">
                    <h1><?php echo $profile_name; ?></h1>
                    <p class="job-title"><?php echo $profile_job_title; ?></p>
                </div>
            </div>
            <div class="short-bio">
                <p><?php echo $profile_bio; ?></p>
            </div>
        </div>

        <h3>اطلاعات شخصی</h3>
        <div class="skills-grid">
            <div class="skill-box">
                <h4>جزئیات فردی</h4>
                <ul>
                    <?php foreach ($personal_details as $key => $value): ?>
                        <li><strong><?php echo $key; ?>:</strong> <?php echo $value; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="skill-box">
                <h4>اطلاعات تماس</h4>
                <ul>
                    <?php foreach ($contact_info as $key => $value): ?>
                        <li><strong><?php echo $key; ?>:</strong> <?php echo $value; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <h3>مهارت‌ها</h3>
        <div class="skills-grid">
            <div class="skill-box">
                <h4>مهندسی برق و ابزار دقیق (دفتر فنی)</h4>
                <ul>
                    <?php foreach ($skills_engineering as $skill): ?>
                        <li><?php echo $skill; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="skill-box">
                <h4>برنامه‌نویسی و تحلیل داده</h4>
                <ul>
                    <?php foreach ($skills_programming as $skill): ?>
                        <li><?php echo $skill; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <h3>گواهینامه‌ها</h3>
        <div class="certifications-grid">
            <?php foreach ($certifications as $cert): ?>
                <div class="certification-item">
                    <a href="<?php echo get_template_directory_uri() . '/' . $cert['image']; ?>" data-lightbox="cert-gallery" data-title="<?php echo $cert['data_title']; ?>">
                        <img src="<?php echo get_template_directory_uri() . '/' . $cert['image']; ?>" alt="گواهینامه <?php echo $cert['title']; ?>">
                    </a>
                    <p><?php echo $cert['title']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <h3>تجربه کاری</h3>
        <?php foreach ($work_experience as $job): ?>
            <div class="company">
                <img src="<?php echo get_template_directory_uri() . '/' . $job['logo']; ?>" alt="لوگوی شرکت <?php echo $job['company']; ?>">
                <div>
                    <h3><?php echo $job['job_title']; ?></h3>
                    <p><?php echo $job['company']; ?> | <?php echo $job['period']; ?></p>
                    <p><?php echo $job['location']; ?></p>
                    <ul>
                        <?php foreach ($job['tasks'] as $task): ?>
                            <li><?php echo $task; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php get_footer(); ?>