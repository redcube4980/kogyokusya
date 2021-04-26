<?php if( is_archive() ) : ?>
<div class="search-input-wrap">
    <form method="get" id="searchform" action="<?php echo home_url('/'); ?>">
        <input type="search" placeholder="ニュース検索" name="s" value="">
        <!-- <input type="text" placeholder="検索" name="s" id="s"> -->
		<input type="hidden" name="post_type" value="投稿タイプ">
        <input type="submit" id="searchsubmit" value="">
    </form>
</div>
<?php elseif(is_single()): ?>
<div class="search-input-wrap">
    <form method="get" id="searchform" action="<?php echo home_url('/'); ?>">
        <input type="search" placeholder="ニュース検索" name="s" value="">
        <!-- <input type="text" placeholder="検索" name="s" id="s"> -->
		<input type="hidden" name="post_type" value="投稿タイプ">
        <input type="submit" id="searchsubmit" value="">
    </form>
</div>
<?php elseif(is_home('news-archive')): ?>
<div class="search-input-wrap">
    <form method="get" id="searchform" action="<?php echo home_url('/'); ?>">
        <input type="search" placeholder="ニュース検索" name="s" value="">
        <!-- <input type="text" placeholder="検索" name="s" id="s"> -->
		<input type="hidden" name="post_type" value="投稿タイプ">
        <input type="submit" id="searchsubmit" value="">
    </form>
</div>
<?php else: ?>
 <div class="search-input-wrap">
    <form method="get" id="searchform" action="<?php echo home_url('/'); ?>">
        <input type="search" placeholder="サイト内検索" name="s" value="">
        <!-- <input type="text" placeholder="検索" name="s" id="s"> -->
        <input type="submit" id="searchsubmit" value="">
    </form>
</div>
<?php endif; ?>