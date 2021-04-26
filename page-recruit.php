<?php
/**
* Template Name: recruit
*/
get_header();
 ?>
  <div id="container" class="cf school-life">
        <div id="breadcrumb">
            <ul>
                <?php custom_breadcrumb();?>
            </ul>
        </div>
        <div id="main" class="recruit-main">
			<div class="left-menu">
				<div class="left-menu-list">
					<p class="left-menu-ttl">教職員採用情報</p>
					<ul class="recruit-menu">
						<li class="category-top-ttl"><a href="">教職員採用情報トップ</a></li>
						<?php
						$query = new WP_Query(array(
				          'posts_per_page' => -1,
				          'post_type' => 'heir'
				        ));

						while ($query -> have_posts()) {
				          $query -> the_post();
						?>
						<?php $files = get_field('recruit_file'); ?>
						<li><a href="<?php echo $files['url']; ?>"><?php the_title(); ?></a></li>
						<?php } ?>
						<!--<li><a href="">嘱託職員〔理科助手〕募集の<br>お知らせ</a></li>
                        <li><a href="">嘱託職員〔養護〕募集のお知らせ</a></li>
                        <li><a href="">非常勤講師（〔音楽〕〔書道〕）募集の<br>お知らせ</a></li>
                        <li><a href="">非常勤講師〔情報〕募集のお知らせ</a></li>
                        <li><a href="">非常勤講師（理科〔物理〕〔化学〕<br>〔地学〕）募集のお知らせ</a></li>
                        <li><a href="">履歴書</a></li> -->
					</ul>
				</div>
			</div>
            <div class="right-wrap">
                <div class="ttl-area">
                    <h2 class="recruit-ttl">教職員採用情報</h2>
                    <div class="recruit-ttl-img pc"><img src="<?php echo get_template_directory_uri();?>/img/img-teachers.jpg"></div>
                    <div class="recruit-ttl-img sp"><img src="<?php echo get_template_directory_uri();?>/img/img-teachers-sp.jpg"></div>
                    <p><span>現在、攻玉社では以下の教職員を募集しております。<br>詳しくはリンクをクリックし、詳細PDFをご確認ください。</span></p>
                </div>
                <div class="pdf-list-warp">
					<?php 
				        $query = new WP_Query(array(
				          'posts_per_page' => -1,
				          'post_type' => 'heir'
				        ));

						while ($query -> have_posts()) {
				          $query -> the_post();          
				    ?>
                    <div class="document">
                        <div class="document-icon"><img src="<?php echo get_template_directory_uri();?>/img/icon-pdf.jpg"></div>
                        <div class="document-txt">
                            <p class="document-time"><?php echo get_the_date(); ?></p>
                            <?php $file = get_field('recruit_file'); ?>
                            <p class="document-ttl"><a href="<?php echo $file['url']; ?>" target="_blank"><?php the_title(); ?></a></p>
                            <p><?php the_field('recruit_text');?></p>
                        </div>
                    </div>
                	<?php } ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>