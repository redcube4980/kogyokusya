<div class="club-news">
    <h3 class="club-news-ttl">クラブ活動 NEWS</h3>
    <div class="club-news-items">
        <div class="club-news--items active">
            <?php 
                $news = new WP_Query(array(
                'posts_per_page' => 4,
                'post_type' => 'post',
                'category_name' => 'club'
              ));
            if ($news->have_posts()) : 
                while ($news->have_posts()) { $news->the_post();
            ?>
            <div class="top-news-box">
                <div class="club-news-box">
                    <div class="news-img">
                        <?php $image1 = get_field('news_image');?>
                        <?php if(isset($image1)):?>
                        <img src="<?php echo $image1['sizes']['large']; ?>">
                        <?php endif;?>
                    </div>
                    <div class="new-txt-area">
                        <?php $category = get_the_category(); ?>
                        <div class="tag"><?php echo $category[0]->name; ?></div>
                        <p class="news-time"><?php echo get_the_date(); ?></p>
                        <p class="news-ttl"><a href="<?php the_permalink(); ?>" target=""><?php the_title(); ?></a></p>
                        <p class="news-txt"><?php the_field('news_catch_phrase');?></p>
                    </div>
                </div>
            </div>
            <?php
            }
            endif;
            wp_reset_postdata(); 
            ?>
        </div>
    </div>
    <div class="club-news-btn"><a href="/news-archive/club/">NEWS一覧へ</a></div>
</div>