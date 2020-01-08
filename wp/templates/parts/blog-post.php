<?php
$minPostHeight = _f('listing_post_min_height',1);
$postImage = _f('listing_image',$postID)['url'];
$authorImage = _f('image',$postID)['url'];
?>

<div class="col-md-3">
    <a href="<?php the_permalink() ?>"class="post" style="background-image: url(<?=$postImage?>); min-height: <?=$minPostHeight?>px;">
        <div class="post-overlay"></div>
        <h6><?php the_title();?></h6>
        <p><?=get_the_date('l F j, Y');?></p>
        <h6 class="author"><?=__('AUTHOR BIO',THEME_TEXT_DOMAIN);?></h6>
        <div class="author author-image" style="background-image: url(<?=$authorImage;?>)"></div>
        <p class="author author-name"><?=_f('name',$postID)?></p>
        <p class="author author-description"><?=_f('description',$postID);?></p>
        <p class="author author-read-more">Read more <span class="author">&#10230;</span></p>
    </a>
</div>