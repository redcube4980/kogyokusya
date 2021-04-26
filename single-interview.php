<?php
/**
* Template Name: obinterview
*/
get_header();
?>

    <div id="container" class="cf top-page ob-page">
                <div id="breadcrumb">
            <ul>
                <div id="breadcrumb"><ul><li><a href="/">トップ</a></li><li><a href="/ob-interview/">OBインタビュー</a></li><li><?php the_title(); ?></li></ul></div>            </ul>
            </ul>
        </div>


        <div class="ob-detail-contain">

            <?php
            if (have_posts()) : 
                while (have_posts()) : the_post();  
            ?>
            <div class="detail-box-a">
                <div class="detail-catch-box">
                    <?php $hero = get_field('ob_hero_img');?>
                    <?php if(isset($hero)):?>
                        <img src="<?php echo $hero['sizes']['large']; ?>" alt="ob-img1">
                    <?php endif;?>
                    <div class="detail-catch <?php if (is_single(array('satoh','fuke'))): ?>black<?php endif; ?><?php if (is_single(array('ohkuma','muradate','masuda'))): ?>shadow<?php endif; ?>">
                        <p class="f1"><?php the_field('ob_graduate');?></p>
                        <p class="f2"><?php the_field('ob_job');?></p>
                        <p class="f3"><?php the_field('ob_name');?></p>
                    </div>
                </div>
                <p class="f16B-detail mg-t20-detail pd-lr20-detail"><?php the_field('ob_rido1');?></p>
            </div>
            <div class="detail-box-b">
                <h2 class="ob-catch"><?php the_field('ob_rido2');?></h2>
                <!-- <p class="f16-detail">だから私のような地味で目立たない生徒でも伸び伸びと過ごすことができた。</p> -->
                <?php while ( have_rows('ob_section') ) : the_row(); ?>
                    <div class="detail-inner">
                        <p class="f36B-detail"><?php the_sub_field('ob_title'); ?></p>
                        <p class="f16-detail"><?php the_sub_field('ob_text'); ?></p>
                        <div>
                            <?php $img = get_sub_field('ob_img');?>
                            <img src="<?php echo $img['sizes']['large']; ?>" alt="ob-img2">
                        </div>
                    </div>
                <?php endwhile; ?><!-- end of repeater field -->
            </div>
            <?php 
            endwhile;
            endif; 
            wp_reset_postdata();
            ?>
            
            <div class="ob-title">
               <h4>社会で活躍する<span>先輩が語る</span></h4>
               <p>OBインタビュー</p>
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
                    <a href="<?php
echo get_permalink( $id );
?>">
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
    </div>

<?php get_footer(); ?>