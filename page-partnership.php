<?php
/**
* Template Name: partnership
*/
get_header();
?>
<?php custom_breadcrumb(); ?>
<div id="container" class="cf school-life">
	<div id="main" class="to-students_and_parents-main">
		<div class="left-menu">
		<div class="left-menu-list">
			<p class="left-menu-ttl">在校生・保護者の方へ</p>
				<ul class="to-students_and_parents-menu">
					<?php 
	                    $query = new WP_Query(array(
	                      'posts_per_page' => -1,
	                      'post_type' => 'partnership'
	                    ));

	                    while ($query -> have_posts()) {
	                      $query -> the_post();          
	                ?>
	                <?php $files = get_field('partner_file'); ?>
				 	<li class="category-top-ttl"><a href="<?php echo $files['url']; ?>"><?php the_title(); ?></a></li>
				 	<?php } ?>
				</ul>
<!--
 	<li><a href="">調査書発行願（大学入試出願用 等）</a></li>
 	<li><a href="">卒業証明書等発行願</a></li>
 	<li><a href="">成績証明書等発行願</a></li>
 	<li><a href="">『攻玉社百五十年史』の購入を
希望される皆様へ</a></li>
-->

		</div>
			<?php date_default_timezone_set('Asia/Tokyo');?>
				<?php if (date('Y-m-d H:i:s') < '2021-02-07 06:00:00') :?>
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
				<h2 class="to-students_and_parents-ttl">在校生・保護者の方へ</h2><p class="parents-p">■連絡事項<br>攻玉社に在籍中の生徒や保護者の方へのお知らせを掲載しています。<br>以下の項目をクリックすると詳細PDFをご覧いただけます。</p>

			</div>
			<div class="pdf-list-warp">
                <?php 
                    $query = new WP_Query(array(
                      'posts_per_page' => -1,
                      'post_type' => 'partnership'
                    ));

                    while ($query -> have_posts()) {
                      $query -> the_post();          
                ?>
				<div class="document">
					<div class="document-icon"><img src="<?php echo get_template_directory_uri();?>/img/icon-pdf.jpg" />
					</div>
					<div class="document-txt">
						<p class="document-time"><?php echo get_the_date(); ?></p>
						<?php $file = get_field('partner_file'); ?>
						<p class="document-ttl">
							<a href="<?php echo $file['url']; ?>" target="_blank" rel="noopener"><?php the_title(); ?></a>
						</p>
						<p><?php the_field('partner_text');?></p>
					</div>
				</div>
				<?php } ?>
				</div>
			</div>

		</div>
	</div>
<?php get_footer(); ?>