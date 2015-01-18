<!-- content.php -->
<div style="width: 180px;">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
    <?php if ( has_post_thumbnail() ) { ?>
        <div>
        <?php the_post_thumbnail(); ?>
        </div>
    <?php } ?>
<?php the_excerpt(); ?><br>
</div>
