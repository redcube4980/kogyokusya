<div class="left-menu">
<div class="left-menu-list">
<p class="left-menu-ttl">お問い合わせ</p>

<ul class="school-life_left-menu">
    <li class="category-top-ttl"><a href="/contact/">お問い合わせトップ</a></li>

    <?php if(preg_match('/contact\/exam/', $_SERVER['REQUEST_URI'])): ?>
    <li class="now-page">入試・説明会について</li>
    <?php else: ?>
    <li><a href="/contact/exam/">入試・説明会について</a></li>
    <?php endif; ?>

    <?php if(preg_match('/contact\/international/', $_SERVER['REQUEST_URI']) && !preg_match('/contact\/international-sp/', $_SERVER['REQUEST_URI'])): ?>
    <li class="now-page">国際学級「受験資格」有無のご確認</li>
    <?php else: ?>
    <li><a href="/contact/international/">国際学級「受験資格」有無のご確認</a></li>
    <?php endif; ?>

    <!--<?php if(preg_match('/contact\/international-sp/', $_SERVER['REQUEST_URI'])): ?>
    <li class="now-page">国際学級｢特別出願｣のお申し込み</li>
    <?php else: ?>
    <li><a href="/contact/international-sp/">国際学級｢特別出願｣のお申し込み</a></li>
    <?php endif; ?>-->

    <?php if(preg_match('/alumni/', $_SERVER['REQUEST_URI'])): ?>
    <li class="now-page">証明書発行について(卒業生)</li>
    <?php else: ?>
    <li><a href="/alumni/">証明書発行について(卒業生)</a></li>
    <?php endif; ?>

    <?php if(preg_match('/contact\/question/', $_SERVER['REQUEST_URI'])): ?>
    <li class="now-page">ご意見・ご質問</li>
    <?php else: ?>
    <li><a href="/contact/question/">ご意見・ご質問</a></li>
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