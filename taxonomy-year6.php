<?php
/**
* Template Name: year1
*/
get_header();
?>
<?php custom_breadcrumb(); ?>

<div id="container" class="cf school-life">
	<?php if(have_posts()): while(have_posts()): the_post();?>
<?php endwhile; else: ?>
	<p>記事はありません</p>
<?php endif; ?>
<?php if( !post_password_required( $post->ID ) ) :  ?>
<!--パスワードが不要、あるいはパスワードが正しいときに表示する内容を記述する-->
	<div id="main" class="to-students_and_parents-main">
		<div class="left-menu">
			<div class="left-menu-list">
				<p class="left-menu-ttl">学年別お知らせ</p>
				<ul class="to-students_and_parents-menu">
					<li class=""><a href="/school_year1/">1年生</a></li>
					<li class=""><a href="/school_year2/">2年生</a></li>
					<li class=""><a href="/school_year3/">3年生</a></li>
					<li class=""><a href="/school_year4/">4年生</a></li>
					<li class=""><a href="/school_year5/">5年生</a></li>
					<li class=""><a href="/school_year6/">6年生</a></li>
				</ul>
<!--<li><a href="">調査書発行願（大学入試出願用 等）</a></li>
<li><a href="">卒業証明書等発行願</a></li>
<li><a href="">成績証明書等発行願</a></li>
<li><a href="">『攻玉社百五十年史』の購入を
希望される皆様へ</a></li>
-->
			</div>
		</div>
		<div class="right-wrap">
			<div class="ttl-area">
				<h2 class="to-students_and_parents-ttl">学年別お知らせ(6年生)</h2><p class="parents-p">■連絡事項<br>以下の項目をクリックすると詳細PDFをご覧いただけます。</p>

			</div>
			<div class="pdf-list-warp">
	<?php
      $args=array(
        'tax_query' => array( 
          array(
            'taxonomy' => 'school_year', //タクソノミーを指定
            'field' => 'slug', //ターム名をスラッグで指定する
            'terms' => 'year6', //表示したいタームをスラッグで指定
          ),
        ),
        'post_type' => 'school_year', //カスタム投稿名
        'posts_per_page'=> -1 //表示件数（-1で全ての記事を表示）
      );
     ?>
    <?php query_posts( $args ); ?>
    <?php if(have_posts()): ?>
    <?php while(have_posts()):the_post(); ?>
				<div class="document">
					<div class="document-icon"><img src="<?php echo get_template_directory_uri();?>/img/icon-pdf.jpg" />
					</div>
					<div class="document-txt">
						<p class="document-time"><?php echo get_the_date(); ?></p>
						<?php $file = get_field('file'); ?>
						<p class="document-ttl">
							<a href="<?php echo $file['url']; ?>" target="_blank" rel="noopener"><?php the_title(); ?></a>
						</p>
						<p><?php the_field('naiyou');?></p>
					</div>
				</div>
	<?php endwhile; else: ?>
    <p>記事はありません</p>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
				</div>
			</div>
		</div>
	<?php else:  ?>
	<?php echo get_the_password_form(); ?>
	<?php endif;  ?>
	</div>
<?php get_footer(); ?>