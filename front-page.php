<?php
/**
* Template Name: top
*/
get_header();
 ?>
  <div id="container" class="cf top-page">
	  <?php date_default_timezone_set('Asia/Tokyo');?>
	  <?php if (date('Y-m-d H:i:s') < '2021-02-07 06:00:00') :?>
	  <div class="banner-box">
		  <p>合格発表はこちらから確認できます。</p>
		  <div class="sp-top-banner">
            <a href="https://www.go-pass.net/kogyokuj"><img class="top-pass-banner-img" src="<?php echo get_template_directory_uri();?>/img/pass-banner.png" alt="pass-banner"></a>
		  </div>
	  </div>
	  <?php else:?>
	  <div  style="display: none;" class="banner-box">
		  <p>合格発表はこちらから確認できます。</p>
		  <div class="sp-top-banner">
            <a href="https://www.go-pass.net/kogyokuj"><img style="display: none;" class="top-pass-banner-img" src="<?php echo get_template_directory_uri();?>/img/pass-banner.png" alt="pass-banner"></a>
		  </div>
	  </div>
	  <?php endif;?>
	  <div class="banner-box">
		  <!--<p>出願を希望される方は、下記専用サイトから出願手続きを行ってください。</p>
		  <div class="sp-top-banner">
            <a href="https://mirai-compass.net/usr/kogyokuj/common/login.jsf"><img class="sp-top-banner-img" src="<?php echo get_template_directory_uri();?>/img/bunner.png" alt="bunner"></a>
		  </div>-->
	  </div>
  </div>
  <div>
    <div class="top-link-area">
        <div class="top-navi">
            <div class="top-navi-item navi01">
                <a href="/introduction/about/">
                <img src="<?php echo get_template_directory_uri();?>/img/img_menu01.jpg">
                <div class="content-ttl entry">
                    <!-- <img class="icon-web" src="<?php echo get_template_directory_uri();?>/img/icon-web.png" alt="ウェブ出願アイコン"> -->
                    <div class="content-ttl-wrapper">
                        <p class="content-ttl-sub">芯の通ったスマートな人材を育てる</p>
                        <p class="content-ttl-main">攻玉社の魅力</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="top-navi-item navi02">
                <a href="/education/three-stages/">
                <img src="<?php echo get_template_directory_uri();?>/img/img_menu03.jpg">
                <div class="content-ttl stage">
                    <p class="content-ttl-sub">攻玉社の独自教育システム</p>
                    <p class="content-ttl-main">3つのステージ</p>
                </div>
                </a>
            </div>
            <div class="top-navi-item navi03">
                <a href="/admission/guidance/">
                <img src="<?php echo get_template_directory_uri();?>/img/img_menu02.jpg">
                <div class="content-ttl visit">
                    <p class="content-ttl-sub">攻玉社の日々を覗きに行こう</p>
                    <p class="content-ttl-main">学校見学・入試説明会</p>
                </div>
                </a>
            </div>
            <div class="top-navi-item navi04">
                <a href="/ob-interview/">
                <img src="<?php echo get_template_directory_uri();?>/img/img_menu04.jpg">
                <div class="content-ttl bo-interview">
                    <p class="content-ttl-sub">社会で活躍する先輩が語る</p>
                    <p class="content-ttl-main">OBインタビュー</p>
                </div>
                </a>
            </div>
        </div>
        <div class="btn-wrap cf toppage-btn">
            <button class="doc-req" onclick="location.href='/introduction/download/'">資料ダウンロード</button>
            <button class="inquiry" onclick="location.href='/contact/'">お問い合わせ</button>
        </div>
		<h2 style="text-align: center;">学年別のお知らせはこちらから</h2>
		<p style="text-align: center;margin-bottom: 20px;">※ページをご覧になるにはパスワードが必要です。</p>
		<div class="btn-wrap cf toppage-btn schoolyearbtn">
					<button class="" onclick="location.href='/school_year1/'">1年生</button>
					<button class="" onclick="location.href='/school_year2/'">2年生</button>
					<button class="" onclick="location.href='/school_year3/'">3年生</button>
					<button class="" onclick="location.href='/school_year4/'">4年生</button>
					<button class="" onclick="location.href='/school_year5/'">5年生</button>
					<button class="" onclick="location.href='/school_year6/'">6年生</button>
		</div>
    </div>
    <div id="main" class="top-main">
        <a href="/introduction/about/">
            <div class="top-main-mv">
                <img src="<?php echo get_template_directory_uri();?>/img/img-top-sub-ttl.png">
                <div class="top-mv-bg"><video src="<?php echo get_template_directory_uri();?>/img/TOP_sample.mp4" autoplay loop muted playsinline class="pc"></video>
                <video src="<?php echo get_template_directory_uri();?>/img/gyokusya_short_19032516_720p.mp4" autoplay loop muted playsinline class="sp"></video></div>
                <!-- <div id="youtube"></div> -->
            </div>
        </a>
		<?php get_template_part('news-archives'); ?>
    </div>
        <div class="interview-area">
            <?php 
                $query = new WP_Query(array(
                'posts_per_page' => -1,
                'post_type' => 'interview'
              ));
            if ($query->have_posts()) : 
                while ($query->have_posts()) { $query->the_post();
            ?>
	            <div class="interview">
	                <a href="<?php the_permalink(); ?>">
	                	<?php $photo = get_field('ob_list_img');?>
	                	<?php if(isset($photo)):?>
	                    	<img src="<?php echo $photo['sizes']['large']; ?>" alt="○○ ○○○">
	                    <?php endif;?>
	                    <p class="interview-txt"><?php the_field('ob_graduate');?><br><?php the_field('ob_job');?><span><?php the_field('ob_name');?></span></p>
	                </a>
	            </div>
            <?php 
            }
            endif;
            wp_reset_postdata(); 
            ?>
        </div>
  </div>

<?php get_footer(); ?>