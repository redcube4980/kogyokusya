<div class="left-menu">
<div class="left-menu-list">
<p class="left-menu-ttl">スクールライフ</p>

<ul class="school-life_left-menu">
    <li class="category-top-ttl"><a href="/school-life/">スクールライフトップ</a></li>

    <?php if(preg_match('/school-life\/event/', $_SERVER['REQUEST_URI'])): ?>
    <li class="now-page">学校行事</li>
    <?php else: ?>
    <li><a href="/school-life/event/">学校行事</a></li>
    <?php endif; ?>

    <?php if(preg_match('/school-life\/club/', $_SERVER['REQUEST_URI'])): ?>
    <li class="now-page">クラブ活動</li>
    <?php else: ?>
    <li><a href="/school-life/club/">クラブ活動</a></li>
    <?php endif; ?>

    <?php if(preg_match('/school-life\/day/', $_SERVER['REQUEST_URI'])): ?>
    <li class="now-page">１日の流れ</li>
    <?php else: ?>
    <li><a href="/school-life/day/">１日の流れ</a></li>
    <?php endif; ?>

    <li><a href="http://kigyoku.com/" target="_blank">輝玉祭<i style="margin-left: 5px;" class="fas fa-external-link-alt"></i></a></li>
</ul>
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