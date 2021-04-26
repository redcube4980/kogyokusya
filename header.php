<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>攻玉社</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta property="og:image" content="">
    <meta property="og:type" content="article">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:site_name" content="攻玉社">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/img/favicon.ico">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/common/reset.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/common/common.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/common/pc.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/common/sp.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/common/tablet.css">
    <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/common/news-list-pc.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/common/news-list-sp.css"> -->
    <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/common/news-list-tablet.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/common/news-single-pc.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/common/news-single-sp.css"> -->
    <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/common/news-single-tablet.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/common/ob-view-pc.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/common/ob-view-sp.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/common/ob-view-tablet.css"> -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/style-pc.css?v=201112">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/style-sp.css?v=201112">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/style-tablet.css?v=201112">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/top-pc.css?v=201112">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/top-sp.css?v=201112">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/top-tablet.css?v=201112">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/for_adjustment-pc.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/for_adjustment-sp.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/for_adjustment-tablet.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/hamburger.css?v=201112">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/fresco/fresco.css"/>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/common/tablepress.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <?php
    $url = $_SERVER['REQUEST_URI'];
    if(strstr($url,'/std-form/' ) == true && !isset($_GET['post_id'])):
        header('Location: '.(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/'));
        exit();
    endif;
    ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-137420624-1"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!-- <script async src="<?php echo get_template_directory_uri();?>/js/user.js"></script> -->
<!-- <script async src="<?php echo get_template_directory_uri();?>/js/user.js"></script> -->
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-137420624-1');
</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
<link type="text/css" rel="stylesheet"  href="https://code.jquery.com/ui/1.10.3/themes/cupertino/jquery-ui.min.css" />
<script>
</script>

<?php wp_head();?>
</head>

<body class="<?php if (is_page('introduction')) : ?>introduction-top<?php else : ?><?php endif; ?>">
<?php $url = $_SERVER['REQUEST_URI'];?>
    <?php if (is_front_page()) : ?>
    <header id="education-hd" class="top-page">
        <div class="video-black"></div>
        <div class="mv-people"><img src="<?php echo get_template_directory_uri();?>/img/message-mv-item1.png"></div>
        <div class="top-video">
            <video src="<?php echo get_template_directory_uri();?>/img/header-video.mp4" poster="" autoplay loop muted playsinline></video>
        </div>		
    <?php elseif(is_page(245)||is_page(252)||is_page(256)||is_page(262)||is_page(254)||is_page(247)||is_page(260)||is_page(267)||is_page(265)) : ?>
        <header id="education-hd" class="introduction">
            <div class="mv-itmes-warp">
                <div class="mv-itmes mv-itme1"><img src="<?php echo get_template_directory_uri();?>/img/message-mv-item1.png" alt="people"></div>
                <div class="mv-itmes mv-itme2"><img src="<?php echo get_template_directory_uri();?>/img/message-mv-item2.png" alt="people"></div>
            </div>
    <?php elseif(is_page(269)||is_page(271)||is_page(484)||is_page(273)||is_page(488)||is_page(19)) : ?>
        <header id="education-hd" class="educatiion">
    <?php elseif(is_page(242)||is_page(238)||is_page(215)||is_page(232)) : ?>
        <header id="education-hd" class="school_life">
    <?php elseif(is_page(154)||is_page(168)||is_post_type_archive('interview')||is_singular('interview')) : ?>
        <header id="education-hd" class="ob-interview">
    <?php elseif(is_archive('news-archive')||is_page(79)||is_page(107)||is_home()||is_singular('post')||is_category()||is_date()): ?>
        <header id="education-hd" class="news">
    <?php elseif(is_page(21)||is_page(42)||is_page(23)||is_page(26)||is_page(44)||is_page(17)||is_page(48)||is_page(19)||is_page(46)) : ?>
        <header id="education-hd" class="form">
    <?php elseif(is_page(284)) : ?>
        <header id="education-hd" class="to-graduates">
    <?php elseif(is_page(490)||is_page(481)||is_page(350)||is_page(797)||is_page(474)||is_page(472)||is_page(478)||is_page(476)||is_page(10006)) : ?>
        <header id="education-hd" class="student">
    <?php elseif(is_page(17) || is_page(21) || is_page(23) || is_page(26) || is_page(44) || is_page(916) || is_page(918) || is_page(892) || is_page(813) || is_page(493) || is_page(822) || is_page(1245)): ?>
        <header id="education-hd" class="form">
    <?php else: ?>
        <header id="education-hd" class="form">
    <?php endif; ?>

        <div id="header-top" class="cf">
            <section id="logo" class="cf">
				<?php if (is_front_page()) : ?>
 				<a href="/"><h1><img src="<?php echo get_template_directory_uri();?>/img/logo.png" alt="攻玉社 中学校・高等学校"></h1></a>
				<?php elseif(is_page(array('news-archive','faq','students-parents','recruit','admission','guidance','exam-info','exam-data','tuition'))):?>
				<a href="/"><h1><img src="<?php echo get_template_directory_uri();?>/img/logo-blue.png" alt="攻玉社 中学校・高等学校"></h1></a>
				<?php else : ?>
				<a href="/"><h1><img src="<?php echo get_template_directory_uri();?>/img/logo.png" alt="攻玉社 中学校・高等学校"></h1></a>
				<?php endif; ?>  
            </section>
            <div id="hamburger-btn-wrap">
                <div id="hamburger-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div id="menu-ttl">
                    <span>MENU</span>
                </div>
            </div>
        </div>
      <section id="school-life-ttl">
            <?php if (is_front_page()) : ?>
                <!-- <h2><img src="<?php echo get_template_directory_uri();?>/img/img-top-ttl.png" alt="次代を創る人材に"></h2> -->
                <div class="page-ttl-area">
                    <div>
                        <img src="<?php echo get_template_directory_uri();?>/img/icon_logo.png" alt="logo">
                        <p class="page-ttl-en">CHANGE IT!</p>
                    </div>
                        <p id="top-copy" class="page-ttl-jp">次代を創る人材に─</p>
                </div>
            <?php elseif(is_page(245)||is_page(252)||is_page(256)||is_page(262)||is_page(254)||is_page(247)||is_page(260)||is_page(267)||is_page(265)) : ?>
                <!-- <h2><img src="<?php echo get_template_directory_uri();?>/img/outline-logo.png" alt="OUT LINE 学校紹介"></h2> --> 
                <div class="page-ttl-area">
                    <div>
                        <img src="<?php echo get_template_directory_uri();?>/img/icon_logo.png" alt="logo">
                        <p class="page-ttl-en">OUTLINE</p>
                    </div>
                        <p class="page-ttl-jp">学校紹介</p>
                </div>
            <?php elseif(is_page(269)||is_page(271)||is_page(484)||is_page(273)||is_page(488)||is_page(19)) : ?>
                <!-- <h2><img src="<?php echo get_template_directory_uri();?>/img/education-ttl.png" alt="education 教育内容"></h2> -->
                <div class="page-ttl-area">
                    <div>
                        <img src="<?php echo get_template_directory_uri();?>/img/icon_logo.png" alt="logo">
                        <p class="page-ttl-en">EDUCATION</p>
                    </div>
                        <p class="page-ttl-jp">教育内容</p>
                </div>
            <?php elseif(is_page(242)||is_page(238)||is_page(215)||is_page(232)) : ?>
                <!-- <h2><img src="<?php echo get_template_directory_uri();?>/img/img_school-life-title.png" alt="SCHOOL LIFE スクールライフ"></h2> -->
                <div class="page-ttl-area">
                    <div>
                        <img src="<?php echo get_template_directory_uri();?>/img/icon_logo.png" alt="logo">
                        <p class="page-ttl-en">SCHOOL LIFE</p>
                    </div>
                        <p class="page-ttl-jp">スクールライフ</p>
                </div>
            <?php elseif(is_page(481)||is_page(472)||is_page(474)||is_page(476) ||is_page(478)||is_page(797)||is_page(10006)): ?>
                <!-- <h2><img src="<?php echo get_template_directory_uri();?>/img/img_to-studens-title.png" alt="受験生の方へ"></h2> -->
                <div class="page-ttl-area long">
                    <div>
                        <img src="<?php echo get_template_directory_uri();?>/img/icon_logo.png" alt="logo">
                        <p class="page-ttl-en small">FOR PROSPECTIVE<span>STUDENTS</span></p>
                    </div>
                        <p class="page-ttl-jp">受験生の方へ</p>
                </div>
            <?php elseif(is_page(350)): ?>
                <!-- <h2><img src="<?php echo get_template_directory_uri();?>/img/img_to-graduates-title.png" alt="卒業生の方へ"></h2> -->
                <div class="page-ttl-area">
                    <div>
                        <img src="<?php echo get_template_directory_uri();?>/img/icon_logo.png" alt="logo">
                        <p class="page-ttl-en">FOR GRADUATES</p>
                    </div>
                        <p class="page-ttl-jp">卒業生の方へ</p>
                </div>
            <?php elseif(is_page(107)||is_archive('news-archive')||is_singular('post')||is_category()||is_date()): ?>
                <!-- <h2><img src="<?php echo get_template_directory_uri();?>/img/img_news-title.png" alt="ニュース一覧"></h2> -->
                <div class="page-ttl-area">
                    <div>
                        <img src="<?php echo get_template_directory_uri();?>/img/icon_logo.png" alt="logo">
                        <p class="page-ttl-en">NEWS</p>
                    </div>
                        <p class="page-ttl-jp">ニュース一覧</p>
                </div>
            <?php elseif(is_page(154)||is_page(168)||is_post_type_archive('interview')||is_singular('interview')): ?>
                <!-- <h2><img src="<?php echo get_template_directory_uri();?>/img/OB-logo.png" alt="次代を創る人材にー"></h2> -->
                <div class="page-ttl-area">
                    <div>
                        <img src="<?php echo get_template_directory_uri();?>/img/icon_logo.png" alt="logo">
                        <p class="page-ttl-en">OB INTERVIEW</p>
                    </div>
                        <p class="page-ttl-jp">OBインタビュー</p>
                </div>
            <?php elseif(is_page(481)): ?>
                <!-- <h2><img src="<?php echo get_template_directory_uri();?>/img/students-logo.png" alt="次代を創る人材にー"></h2> -->
                <div class="page-ttl-area">
                    <div>
                        <img src="<?php echo get_template_directory_uri();?>/img/icon_logo.png" alt="logo">
                        <p class="page-ttl-en">FOR STUDENTS</p>
                    </div>
                        <p class="page-ttl-jp">受験生の方へ</p>
                </div>
            <?php elseif(is_page(284)): ?>
                <!-- <h2><img src="<?php echo get_template_directory_uri();?>/img/img_recruit-title.png" alt="採用情報"></h2> -->
                <div class="page-ttl-area">
                    <div>
                        <img src="<?php echo get_template_directory_uri();?>/img/icon_logo.png" alt="logo">
                        <p class="page-ttl-en">RECRUIT</p>
                    </div>
                        <p class="page-ttl-jp">教職員採用情報</p>
                </div>
            <?php elseif(is_page(490)): ?>
                <!-- <h2><img src="<?php echo get_template_directory_uri();?>/img/img_to-students_and_parents-title.png" alt="在校生・保護者の方へ"></h2> -->
                <div class="page-ttl-area long">
                    <div>
                        <img src="<?php echo get_template_directory_uri();?>/img/icon_logo.png" alt="logo">
                        <p class="page-ttl-en">FOR STUDENTS<span>and PARENTS</span>
                    </div>
                        <p class="page-ttl-jp">在校生・保護者の方へ</p>
                </div>
                <?php elseif(is_page(17) || is_page(21) || is_page(23) || is_page(26) || is_page(44) || is_page(916) || is_page(918) || is_page(892) || is_page(1245) || strstr($url,'/contact/' ) == true): ?>
                <!-- <h2><img src="<?php echo get_template_directory_uri();?>/img/form-ttl.png" alt="Education 教育内容　7つのステージ"></h2> -->
                <div class="page-ttl-area">
                    <div>
                        <img src="<?php echo get_template_directory_uri();?>/img/icon_logo.png" alt="logo">
                        <p class="page-ttl-en">CONTACT</p>
                    </div>
                        <p class="page-ttl-jp">お問い合わせ</p>
                </div>
                <?php elseif(is_page(813)): ?>
                <div class="page-ttl-area">
                    <div>
                        <img src="<?php echo get_template_directory_uri();?>/img/icon_logo.png" alt="logo">
                        <p class="page-ttl-en">SITEPOLICY</p>
                    </div>
                        <p class="page-ttl-jp">サイトポリシー</p>
                </div>
                <?php elseif(is_page(493)): ?>
                <div class="page-ttl-area">
                    <div>
                        <img src="<?php echo get_template_directory_uri();?>/img/icon_logo.png" alt="logo">
                        <p class="page-ttl-en">SITEMAPS</p>
                    </div>
                        <p class="page-ttl-jp">サイトマップ</p>
                </div>
                <?php elseif(is_page(822)): ?>
                <div class="page-ttl-area">
                    <div>
                        <img src="<?php echo get_template_directory_uri();?>/img/icon_logo.png" alt="logo">
                        <p class="page-ttl-en">PRIVACY POLICY</p>
                    </div>
                        <p class="page-ttl-jp">プライバシーポリシー</p>
                </div>
		        <?php elseif(is_404()): ?>
                <div class="page-ttl-area">
                    <div>
                        <img src="<?php echo get_template_directory_uri();?>/img/icon_logo.png" alt="logo">
                        <p class="page-ttl-en">NOT FOUND</p>
                    </div>
                        <p class="page-ttl-jp">お探しのページが見つかりません。</p>
                </div>
                <?php elseif(is_search()): ?>
                <div class="page-ttl-area">
                    <div>
                        <img src="<?php echo get_template_directory_uri();?>/img/icon_logo.png" alt="logo">
                        <p class="page-ttl-en">SITE SEARCH</p>
                    </div>
                        <p class="page-ttl-jp">検索結果：「<?php echo $_GET['s']; ?>」</p>
                </div>
		  
            <?php else:?>
            <?php endif; ?> 
        </section>
		<div id="naviarea">
		<div id="sp-news-box-box">
		<!--緊急ニュースを出力-->
		<?php if (is_front_page()) : ?>
		<?php
		$args = array(
		  'post_type' => 'top_news',
		  'posts_per_page' => 2
		); ?>
		<?php $my_posts = get_posts( $args ); ?>

		<?php global $post;
		  foreach ( $my_posts as $post ) :
		  setup_postdata( $post ); ?>
			<!-- ▽ ループ開始 ▽ -->
			<div id="sp-news-box">
			<div class="sp-news">
			<time><?php the_time('Y/m/d'); ?></time>
			<?php the_content(); ?>
			</div>
			</div>
			<!-- △ ループ終了 △ -->	
		<?php endforeach; ?>
		<?php wp_reset_postdata(); ?>
			<div class="PC-top-banner">
				<div class="PC-top-banner-box">
					<!--<a href="https://mirai-compass.net/usr/kogyokuj/common/login.jsf"><img class="top-banner-img" src="<?php echo get_template_directory_uri();?>/img/bunner.png" alt="bunner"></a>-->
				</div>
				<?php date_default_timezone_set('Asia/Tokyo');?>
				<?php if (date('Y-m-d H:i:s') < '2021-02-07 06:00:00') :?>
				<div class="PC-top-banner-box">
					<a href="https://www.go-pass.net/kogyokuj"><img class="top-pass-banner-img" src="<?php echo get_template_directory_uri();?>/img/pass-banner.png" alt="pass-banner"></a>
				</div>
				<?php else:?>
				<div class="PC-top-banner-box">
					<a href="https://www.go-pass.net/kogyokuj"><img class="top-pass-banner-img" style="display: none;" src="<?php echo get_template_directory_uri();?>/img/pass-banner.png" alt="pass-banner"></a>
				</div>
				<?php endif;?>
			</div>
		<!--緊急ニュースを出力-->
		<?php elseif(is_page()): ?>
		<?php else:?>
        <?php endif; ?> 
		</div>
        <nav>
            <ul class="cf">
                <li><a href="/introduction/">
                    <span>
                        学校紹介
                    </span>
                </li></a>
                <li><a href="/education/">
                    <span>
                        教育内容
                    </span>
                </li></a>
                <li><a href="/school-life/">
                    <span>
                        スクールライフ
                    </span>
                </li></a>
                <li><a href="/admission/">
                    <span>
                        受験生の方へ
                    </span>
                </li></a>
                <li><a href="/students-parents/">
                     <span>
                        在校生・保護者の方へ
                     </span>
                </li></a>
                <li><a href="/admission/faq/">
                    <span>
                        FAQ
                    </span>
                </li></a>
            </ul>
        </nav>
		</div>
        <div class="hamburger-bg">
            <img src="<?php echo get_template_directory_uri();?>/img/img-menu-bg.jpg">
			        <div class="hamburger">
            <div class="hamburger-txt-area">
                <ul class="hamburger-txt-top">
                    <li class="hamburger-txt-top-logo sp"><a href=""><img src="<?php echo get_template_directory_uri();?>/img/logo-blue.png" alt="攻玉社 中学校・高等学校"></a></li>
                    <li class="pc"><a href="/">トップページ</a></li>
                </ul>
                <ul class="hamburger-txt-sub blue">
                    <li><a href="/introduction/about/">攻玉社の魅力</a></li>
                    <li><a href="/introduction/">学校見学・入試説明会</a></li>
                    <li><a href="/education/career/">進学実績</a></li>
                </ul>
                <ul class="hamburger-txt-main">
                    <li><a href="/introduction/">学校紹介</a></li>
                    <li><a href="/education/">教育内容</a></li>
                    <li><a href="/school-life/">スクールライフ</a></li>
                    <li><a href="/admission/">受験生の方へ</a></li>
                    <li><a href="/students-parents/">在校生・保護者の方へ</a></li>
                    <li><a href="/admission/faq/">FAQ</a></li>
                </ul>
                <ul class="hamburger-txt-sub">
                    <li><a href="/news-archive/">News一覧</a></li>
                    <li><a href="/alumni/">卒業生の方へ</a></li>
                    <li><a href="/ob-interview/">OBインタビュー</a></li>
                    <li><a href="/recruit/">教職員採用情報</a></li>
                    <li><a href="/admission/faq/">よくある質問</a></li>
                    <li><a href="/contact/">お問い合わせ</a></li>
                    <li><a href="/privacy-policy/">プライバシー・ポリシー</a></li>
                    <li><a href="/site-policy/">サイトポリシー</a></li>
                    <li><a href="/sitemap/">サイトマップ</a></li>
                </ul>
            </div>
            <div class="hamburger-search">
                <?php get_search_form(); ?>
                <!-- <input type="search" placeholder="サイト内検索"> -->
            </div>
			<?php date_default_timezone_set('Asia/Tokyo');?>
				<?php if (date('Y-m-d H:i:s') < '2021-02-07 06:00:00') :?>
				<div class="hamburger-banner">
					<a href="https://www.go-pass.net/kogyokuj"><img class="top-pass-banner-img" src="<?php echo get_template_directory_uri();?>/img/pass-banner.png" alt="pass-banner"></a>
				</div>
				<?php else:?>
				<div class="hamburger-banner">
					<a href="https://www.go-pass.net/kogyokuj"><img style="display: none;" class="top-pass-banner-img" src="<?php echo get_template_directory_uri();?>/img/pass-banner.png" alt="pass-banner"></a>
				</div>
				<?php endif;?>
			<div class="hamburger-banner">
				<!--<a href="https://mirai-compass.net/usr/kogyokuj/common/login.jsf"><img class="top-banner-img" src="<?php echo get_template_directory_uri();?>/img/bunner.png" alt="bunner"></a>-->
            </div>
        </div>
        </div>

    </header>
