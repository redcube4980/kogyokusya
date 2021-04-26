<?php
/**
* Template Name: お問い合わせ
*/
get_header(); ?>
  <div id="container" class="cf school-life">
        <div id="breadcrumb">
            <ul>
                <?php custom_breadcrumb();?>
            </ul>
        </div>
        <div id="main" class="recruit-main">
            <?php get_sidebar('contact');?>
            <div class="right-wrap">
                <div class="ttl-area">
                   
                    <?php 
                if (have_posts()) : // WordPress ループ
                    while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
                        <?php the_content(); ?>
                        <?php 
                    endwhile; // 繰り返し処理終了       
                else : // ここから記事が見つからなかった場合の処理 ?>
                        <div class="post">
                            <h2>記事はありません</h2>
                            <p>お探しの記事は見つかりませんでした。</p>
                        </div>
                <?php
                endif;
                ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>