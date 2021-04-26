<?php
/**
* Template Name: to-graduate
*/
get_header();
 ?>
  <div id="container" class="cf school-life">
        <div id="breadcrumb">
            <ul>
                <?php custom_breadcrumb();?>
            </ul>
        </div>
        <div id="main" class="to-graduates-main">
			<div class="left-menu">
            <div class="left-menu-list">
                <p class="left-menu-ttl">卒業生の方へ</p>
                <ul class="to-graduates-menu">
                    <li class="category-top-ttl"><a href="">卒業生の方へトップ</a></li>
                    <?php 
                        $query = new WP_Query(array(
                          'posts_per_page' => -1,
                          'post_type' => 'grad'
                        ));

                        while ($query -> have_posts()) {
                          $query -> the_post();          
                    ?>
                    <?php $files = get_field('graduate_file'); ?>
                    <li><a href="<?php echo $files['url']; ?>"><?php the_title(); ?></a></li>
                    <?php } ?>
                </ul>
            </div>
				<?php date_default_timezone_set('Asia/Tokyo');?>
				<?php if (date('Y-m-d H:i:s') < '2021-02-07 00:00:00') :?>
				<div class="sidebar-banner">
					<a href="https://www.go-pass.net/kogyokuj"><img class="sidebar-banner-img" src="<?php echo get_template_directory_uri();?>/img/pass-banner.png" alt="pass-banner"></a>
				</div>
				<?php else:?>
				<div class="sidebar-banner">
					<a href="https://www.go-pass.net/kogyokuj"><img style="display: none;" class="sidebar-banner-img" src="<?php echo get_template_directory_uri();?>/img/pass-banner.png" alt="pass-banner"></a>
				</div>
				<?php endif;?>
				<div class="sidebar-banner">
					<!--<a href="https://mirai-compass.net/usr/kogyokuj/common/login.jsf"><img class="sidebar-banner-img" src="<?php echo get_template_directory_uri();?>/img/bunner.png" alt="bunner"></a>-->
				</div>
			</div>
            <div class="right-wrap">
                <div class="ttl-area">
                    <h2 class="to-graduates-ttl">卒業生の方へ</h2>
                    <p><span>攻玉社を卒業されたOBの方へのお知らせや<br>各種証明発行の申請書データを掲載しています。</span></p>
                </div>
                <div class="pdf-list-warp">
                <?php 
                    $query = new WP_Query(array(
                      'posts_per_page' => -1,
                      'post_type' => 'grad'
                    ));

                    while ($query -> have_posts()) {
                      $query -> the_post();          
                ?>
                    <div class="document">
                        <div class="document-icon"><img src="<?php echo get_template_directory_uri();?>/img/icon-pdf.jpg"></div>
                        <div class="document-txt">
                            <p class="document-time"><?php echo get_the_date(); ?></p>
                            <?php $file = get_field('graduate_file'); ?>
                            <p class="document-ttl"><a href="<?php echo $file['url']; ?>" target="_blank"><?php the_title(); ?></a></p>
                            <p><?php the_field('graduate_text');?></p>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>


<?php get_footer(); ?>