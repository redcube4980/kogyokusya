<div class="left-menu">
<div class="left-menu-list">
    <p class="left-menu-ttl">教育内容</p>
    <ul class="school-life_left-menu">
        <li class="category-top-ttl"><a href="/education/">教育内容トップ</a></li>

        <?php if(preg_match('/education\/three-stages/', $_SERVER['REQUEST_URI'])): ?>
        <li class="now-page">３つのステージ</li>
        <?php else: ?>
        <li><a href="/education/three-stages/">３つのステージ</a></li>
        <?php endif; ?>

        <?php if(preg_match('/education\/curriculum/', $_SERVER['REQUEST_URI'])): ?>
        <li class="now-page">カリキュラム</li>
        <?php else: ?>
        <li><a href="/education/curriculum/">カリキュラム</a></li>
        <?php endif; ?>

        <?php if(preg_match('/education\/international/', $_SERVER['REQUEST_URI'])): ?>
        <li class="now-page">国際学級</li>
        <?php else: ?>
        <li><a href="/education/international/">国際学級</a></li>
        <?php endif; ?>

        <?php if(preg_match('/contact\/international/', $_SERVER['REQUEST_URI'])): ?>
        <li class="sub-menu now-page">国際学級｢受験資格｣有無のご確認</li>
        <?php else: ?>
        <li class="sub-menu"><a href="/contact/international/">国際学級｢受験資格｣有無のご確認</a></li>
        <?php endif; ?>

        <!--<?php if(preg_match('/contact/international-sp/', $_SERVER['REQUEST_URI'])): ?>
        <li class="sub-menu now-page">国際学級｢特別出願｣のお申し込み</li>
        <?php else: ?>
        <li class="sub-menu"><a href="/contact/international-sp/">国際学級｢特別出願｣のお申し込み</a></li>
        <?php endif; ?>-->

        <?php if(preg_match('/education\/career/', $_SERVER['REQUEST_URI'])): ?>
        <li class="now-page">進学実績 </li>
        <?php else: ?>
        <li><a href="/education/career/">進学実績 </a></li>
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