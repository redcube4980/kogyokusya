<div class="left-menu">
<div class="left-menu-list left-menu-list-bottom">
    <p class="left-menu-ttl">受験生の方へ</p>
    <ul class="to-studens_tuition-menu">
        <li class="category-top-ttl"><a href="/admission/">受験生の方へトップ</a></li>

        <?php if(preg_match('/admission\/guidance/', $_SERVER['REQUEST_URI'])): ?>
        <li class="now-page">入学説明会一覧</li>
        <?php else: ?>
        <li><a href="/admission/guidance/">入学説明会一覧</a></li>
        <?php endif; ?>

        <?php if(preg_match('/admission\/exam-info/', $_SERVER['REQUEST_URI'])): ?>
        <li class="now-page">中学入試要項</li>
        <?php else: ?>
        <li><a href="/admission/exam-info/">中学入試要項</a></li>
        <?php endif; ?>

        <?php if(preg_match('/admission\/exam-data/', $_SERVER['REQUEST_URI'])): ?>
        <li class="now-page">過去三か年入試データ</li>
        <?php else: ?>
        <li><a href="/admission/exam-data/">過去三か年入試データ</a></li>
        <?php endif; ?>

        <?php if(preg_match('/admission\/tuition/', $_SERVER['REQUEST_URI'])): ?>
        <li class="now-page">学費等学納金</li>
        <?php else: ?>
        <li><a href="/admission/tuition/">学費等学納金</a></li>
        <?php endif; ?>

        <?php if(preg_match('/admission\/faq/', $_SERVER['REQUEST_URI'])): ?>
        <li class="now-page">FAQ</li>
        <?php else: ?>
        <li><a href="/admission/faq/">FAQ</a></li>
        <?php endif; ?>
    </ul>
    <div class="calendar-area">
        <div class="calendar-ttl">入試関連イベント・年間カレンダー</div>
        <div class="calendar">
<iframe src="//kogyokusha.ed.jp/admission/guidance/calender/" id="calendar"></iframe></div>
        <div class="calendar-txt">
            <p class="calendar-txt-ttl">日付下の<span class="purple">■</span><span class="green">■</span><span class="red">■</span>をClick!</p>
            <div class="calendar-txt-description"><p><span class="purple">■</span>校内での説明会開催日</p>
            <p><span class="green">■</span>学外での説明会開催日</p>
            <p><span class="red">■</span>土曜説明会・オープンスクール申し込み受付開始日<br>※申し込み受付開始は、実施日の2週間前の土曜9:00〜となります。</p></div>
        </div>
    </div>
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