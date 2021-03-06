<?php get_header(); ?>

<!-- Body satart -->
    <?php
    if (have_posts()):
        while (have_posts()): the_post();
            $category = get_the_category();
    ?>

  <div id="container" class="cf school-life news-single">
        <div id="breadcrumb">
            <ul>
                <li>
                    <a href="/">トップ</a>
                </li>
                <li>
                    <a href="/news-archive/">NEWS一覧</a>
                </li>
                <li>
                    <a href="/news-archive/<?php echo $category[0]->slug; ?>/"><?php echo $category[0]->name; ?></a>
                </li>
                <li>
                    <?php the_title(); ?>　
                </li>
            </ul>
        </div>
        <div id="main" class="news-single-main">
			<div class="left-menu">
            <div class="left-menu-list">
                <p class="left-menu-ttl">NEWS一覧</p>
                <ul class="news-single-menu">
                    <li><a href="/news-archive/">NEWS一覧トップ</a></li>
                    <?php
                        $categories = get_categories(array('hide_empty' => 0)); 
                        foreach ($categories as $cat) {
                            if ($cat->cat_name === '未分類') {
                                continue;
                            }
                            $list_item = '<li><a href="/news-archive/'.$cat->slug.'/">'.$cat->cat_name.'</a></li>';
                            echo $list_item;
                        }
                    ?>
					<?php wp_get_archives('type=yearly'); ?>
                </ul>
				<div style="margin: 30px 0;"><?php get_search_form(); ?></div>
            </div>
				<?php date_default_timezone_set('Asia/Tokyo');?>
				<?php if (date('Y-m-d H:i:s') < '2021-02-07 6:00:00') :?>
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
                    <h2 class="news-single-ttl"><?php the_title(); ?></h2>
                    <p><span></span></p>
                </div>
                <div class="news-single-txt-area">
                    <div class="div-icon">
                        <div class="tag"><?php echo $category[0]->name; ?></div>
                        <div class="icon1">
                            <img src="<?php echo get_template_directory_uri();?>/img/clock.svg" class="small-icon">
                            <a href="" class="tag-words"><?php echo get_the_date(); ?></a>
                        </div>
<!--                         <?php $tags = get_the_tags(); ?>
                        <div class="icon2">
                            <img src="<?php echo get_template_directory_uri();?>/img/tags.svg" class="small-icon">
                            <?php 
                            if ( $tags ) {
                                foreach( $tags as $tag ) {
                            ?>
                                    <a href="#" class="tag-words"><span><?php echo $tag->name . ', ' ;?></span></a>
                            <?php 
                                }
                            }
                            ?>
                        </div> -->
                    </div>
                    <div>
                        <?php while (have_rows('section')) {
                            the_row();
                        ?><!-- flexible content -->
                            <?php  if(get_row_layout() === 'news_style1'):?>
                                <div class="img-style">
                                    <?php $img = get_sub_field('news_img');?>
                                    <img src="<?php echo $img['sizes']['large']; ?>">
                                </div>

                            <?php elseif(get_row_layout() === 'news_style2'):?>
                                <div class="div-pgroup">
                                    <p class="p-title1"><?php the_sub_field('news_title'); ?></p>
                                    <p class="p-pragraph1"><?php the_sub_field('news_text'); ?></p>
                                </div>
                            <?php endif; ?>
                        <?php } ?><!-- end of flexible content -->
                    </div>


                    <div class="pagi-border">
                        <div class="pagi"> &laquo; PREV <?php previous_post_link('%link', '%title', true, ''); ?></div>
                        <div class="pagi"> &laquo; NEXT <?php next_post_link('%link', '%title', true, ''); ?></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php 
    endwhile;
    endif; 
    wp_reset_postdata();
    ?>

<!-- Body end -->

<?php get_footer(); ?>