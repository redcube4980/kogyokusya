<?php
/**
* Template Name: obinterview一覧
*/
get_header();
 ?>
    <div id="container" class="cf top-page ob-page">
        <div id="breadcrumb">
            <ul>
                <?php custom_breadcrumb();?>
            </ul>
        </div>
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