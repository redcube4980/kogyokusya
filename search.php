<?php
    get_header();
    custom_breadcrumb();
    $count = count($posts);
    // global $posts;
?>

<div class="site-map-container">
    <div class="guide">
        <p><a href="#" onclick="javascript:return false;" ontouchstart="javascript:return false;" style="pointer-events: none;">検索結果（<?php echo $count; ?>件）：「<?php echo $_GET['s']; ?>」</a></p>
        <ul>
<?php
if (have_posts()):
    while (have_posts()):
        the_post();
?>
            <li style="width: 100%"><a href="<?php the_permalink(); ?>"><span>•</span> <?php the_title(); ?></a></li>
<?php
    endwhile;
else:
?>
            <li><a href="#" onclick="javascript:return false;" ontouchstart="javascript:return false;" style="pointer-events: none;"><span>•</span> 検索結果はありませんでした。</a></li>
<?php
endif;
?>
        </ul>
    </div>
</div>

<?php get_footer(); ?>