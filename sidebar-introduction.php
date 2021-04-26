<div class="left-menu">
<div class="left-menu-list">
    <p class="left-menu-ttl">学校紹介</p>
    <ul class="school-life_left-menu">
        <li class="category-top-ttl"><a href="/introduction/">学校紹介トップ</a></li>

        <?php if(preg_match('/introduction\/about/', $_SERVER['REQUEST_URI'])): ?>
        <li class="now-page">攻玉社の魅力</li>
        <?php else: ?>
        <li><a href="/introduction/about/">攻玉社の魅力</a></li>
        <?php endif; ?>

        <?php if(preg_match('/introduction\/messages/', $_SERVER['REQUEST_URI'])): ?>
        <li class="now-page">学校長挨拶</li>
        <?php else: ?>
        <li><a href="/introduction/messages/">学校長挨拶</a></li>
        <?php endif; ?>

        <?php if(preg_match('/introduction\/educational-policy/', $_SERVER['REQUEST_URI'])): ?>
        <li class="now-page">教育理念</li>
        <?php else: ?>
        <li><a href="/introduction/educational-policy/">教育理念</a></li>
        <?php endif; ?>

        <?php if(preg_match('/introduction\/history/', $_SERVER['REQUEST_URI'])): ?>
        <li class="now-page">歴史</li>
        <?php else: ?>
        <li><a href="/introduction/history/">歴史</a></li>
        <?php endif; ?>

        <?php if(preg_match('/introduction\/brand/', $_SERVER['REQUEST_URI'])): ?>
        <li class="now-page">校章・校旗・校歌・制服</li>
        <?php else: ?>
        <li><a href="/introduction/brand/">校章・校旗・校歌・制服</a></li>
        <?php endif; ?>

        <?php if(preg_match('/introduction\/facilities/', $_SERVER['REQUEST_URI'])): ?>
        <li class="now-page">施設</li>
        <?php else: ?>
        <li><a href="/introduction/facilities/">施設</a></li>
        <?php endif; ?>

        <?php if(preg_match('/introduction\/access/', $_SERVER['REQUEST_URI'])): ?>
        <li class="now-page">アクセス</li>
        <?php else: ?>
        <li><a href="/introduction/access/">アクセス</a></li>
        <?php endif; ?>

        <?php if(preg_match('/introduction\/download/', $_SERVER['REQUEST_URI'])): ?>
        <li class="now-page">資料ダウンロード</li>
        <?php else: ?>
        <li><a href="/introduction/download/">資料ダウンロード</a></li>
        <?php endif; ?>
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