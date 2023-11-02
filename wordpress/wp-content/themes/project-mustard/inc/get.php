<?php

/**
 * Retrieves a single slide data.
 *
 * @param array $slideData The slide data to retrieve.
 * @return array $arr The slide data as an array.
 */
function pm__get_single_slide($slideDataRaw){

    // Predefine variables null
    $logoImg = $featureImg = null;

    // Feature image id
    $featureImgID = $slideDataRaw['feature-img'];

    // If feature image id exists, get the image url
    if($featureImgID){
        $featureImg = wp_get_attachment_image_src($featureImgID,'full')[0];
    }

    // Logo image id
    $logoImgID = $slideDataRaw['logo-img'];

    // If logo image id exists, get the image url
    if($logoImgID){
        $logoImg = wp_get_attachment_image_src($logoImgID,'full')[0];
    }


    // Get the rest of the data (required)
    $content = $slideDataRaw['content']; 
    $link = $slideDataRaw['link'];

    // Create the array
    $arr = array(
        'content' => $content,
        'feature-img' => $featureImg,
        'link' => $link,
    );

    // If logo image exists, add it to the array (optional field)
    if($logoImg){
        $arr['logo-img'] = $logoImg;
    }

    return $arr;
}


/**
 * Retrieves the main slider for a given post ID.
 *
 * @param int $postID The ID of the post to retrieve the slider for.
 * @return array|false The slider data as an array, or false if no slider is found.
 */
function pm__get_slider_main($postID){

    // If no post ID is given, return false
    if($postID == null) return false;

    // Get the slides
    $slides = get_field('mod-slides',$postID);

    // Define empty array
    $arr = array();

    // Default for carousel is to not be a slider, we can use this to load html elements, scripts etc
    $arr['isSlider'] = false;

    // If slides exist, loop through them and add them to the array
    if($slides){

        // Loop through slides and add them to the array
        foreach($slides as $slide){
            $arr['slides'][] = pm__get_single_slide($slide);
        }

        // If there are more than 2 slides, we can load the carousel scripts
        if(count($arr['slides']) > 2){
            wp_enqueue_script('carouselJS');
            $arr['isSlider'] = true;
        }
        
    }


    return $arr;

}