<?php get_header(); ?>
<?php custom_breadcrumb(); ?>
<?php
/* Start the Loop */
while ( have_posts() ) :
    the_post();
    the_content();

endwhile; // End of the loop.
?>

<?php get_footer(); ?>