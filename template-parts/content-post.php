<?php

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="ds_post_thumbnail">
		<?php the_post_thumbnail('medium', array( 'class' => 'ds_post_thumbnail_img' )); ?>
	</div>
    <header class="ds_post_header">
        <div class="ds_post_title">
            <?php
                the_title( '<h2 class="ds_post_title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" alt="">', '</a></h2>' );
            ?>
        </div>
    </header>
    <div class="ds_post_content">
        <?php
            the_excerpt();
        ?>
    </div>
    <div class="ds_post_meta">
        <div class="ds_post_meta_tags d-flex">
        <?php
            $posttags = get_the_tags();
            if ($posttags) {
                foreach($posttags as $tag) {
                    $bg=get_field('background',$tag);
                    echo '<span style="background-color:'.$bg.'">'.$tag->name . ' </span>';
                }
            }
        ?>
        </div>
        <div class="ds_post_meta_date">
            <?php echo '<span>'.get_the_date('j. n. Y') . '</span>';?>
        </div>
    </div>
</article>
