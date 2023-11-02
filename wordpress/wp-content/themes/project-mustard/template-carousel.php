<?php

/* Template Name: Carousel */

get_header();


$slider = pm__get_slider_main(get_the_ID());


if($slider['slides'] && is_array($slider['slides'])): 
?>
    <div class="bg-mustard overflow-hidden">
        <div class="container">
            <div class="d-flex align-items-center justify-content-start">
                
                <div>

                    <div id="carousel" class="d-flex carousel-container gap-20">
                    
                        <?php foreach($slider['slides'] as $slide) { ?>
                            <?php get_template_part('parts/single-slide', null, $slide); ?>
                        <?php } ?>
                        
                    </div>
                    
                </div>
                
            </div>

            <?php if($slider['isSlider']):?>

                <div class="gap-10 d-flex mt-50">
                    <button id="prev" class="nextprev lean"><span class="lean-fix">&lsaquo;</span><span class="sr-only">Next slide</span></button>
                    <button id="next" class="nextprev lean-fix"><span class="lean">&rsaquo;</span><span class="sr-only">Previous slide</span></button>
                </div>

            <?php endif;?>
        </div>
    </div>

<?php endif;?>

<?php get_footer(); ?>
