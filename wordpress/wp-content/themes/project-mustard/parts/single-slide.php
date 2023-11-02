

<a href="<?=$args['link']['url'];?>" class="carSlide carousel-slide">
    <div class="slide-feature-img" style="background-image:url(<?=$args['feature-img'];?>);">

        <?php if($args['logo-img']):?>
            <img class="slide-logo" src="<?=$args['logo-img'];?>" />
        <?php endif;?>
    
    </div>
    <div class="slide-content lean"><p class="lean-fix" style=""><?=$args['content'];?></p></div>
</a>