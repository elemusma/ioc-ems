<?php
if(have_rows('builder')): while(have_rows('builder')): the_row();
$layout = get_sub_field('layout');


if($layout == 'Content'){
// start of content
if(have_rows('content_group')): while(have_rows('content_group')): the_row();

echo '<section class="position-relative content-section ' . get_sub_field('classes') . '" style="padding:150px 0;' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

$bgImg = get_sub_field('background_image');

if($bgImg){
    echo wp_get_attachment_image($bgImg['id'],'full','',[
        'class'=>'w-100 h-100 position-absolute bg-img',
        'style'=>'top:0;left:0;object-fit:cover;'
    ]);
}

echo '<div class="container-fluid">';
echo '<div class="row justify-content-center">';

echo '<div class="col-lg-6 text-center">';
echo get_sub_field('content');
echo '</div>';

echo '</div>';
echo '</div>';
echo '</section>';
endwhile; endif;
// end of content
} elseif($layout == 'Content + Image'){
    if(have_rows('content_image_group')): while(have_rows('content_image_group')): the_row();
    $bgImg = get_sub_field('background_image');
    $image = get_sub_field('image');
    $imageSide = get_sub_field('image_side');
    $link = get_sub_field('link');

        echo '<section class="position-relative content-image ' . get_sub_field('classes') . '" style="padding:100px 0;' . get_sub_field('style') . '">';
        if($bgImg):
        echo wp_get_attachment_image($bgImg['id'],'full','',['class'=>'position-absolute w-100 h-100','style'=>'top:0;left:0;object-fit:cover;']);
        endif;
        echo '<div class="container-fluid">';

        if($imageSide == 'Right'){
            echo '<div class="row align-items-center">';
            // echo '</div>';
        } else {
            echo '<div class="row align-items-center flex-lg-row-reverse">';
        }
        
        echo '<div class="col-lg-5 col-md-6 p-5 ' . get_sub_field('content_column_classes') . '" style="' . get_sub_field('content_column_style') . '">';

        echo '<div class="position-relative" style="">';
        if($imageSide == 'Right'){
            echo '<div class="" data-aos="fade-right">';
            // echo '</div>';
        } else {
            echo '<div class="" data-aos="fade-left">';
        }
        echo '<div class="h-100 d-flex align-items-center">';
        echo '<div class="lead">';
        echo get_sub_field('content');
        echo '</div>';
        echo '</div>';

        echo '</div>';


        echo '</div>';
        echo '</div>'; // end of col

        echo '<div class="col-lg col-md-6 p-0 text-center ' . get_sub_field('image_column_classes') . '" style="' . get_sub_field('image_column_style') . '">';
        
        if($imageSide == 'Right'){
            echo '<div class="" data-aos="fade-left">';
            // echo '</div>';
        } else {
            echo '<div class="" data-aos="fade-right">';
        }

        if($image):
        echo wp_get_attachment_image($image['id'],'full','',['class'=>'w-100 h-100','style'=>'object-fit:cover;']);
        endif;
        
        echo '</div>';
        echo '</div>'; // end of col-md-6

        echo '</div>';


        echo '</div>';
        echo '</section>';
        
        // echo '<section class="mb-5" style="margin-top:-35px;">';
        // echo '<div class="container">';
        // if($link):
        //     echo '<div class="row">';
        //     echo '<div class="col-12 text-center">';
            
        //     $link_url = $link['url'];
        //     $link_title = $link['title'];
        //     $link_target = $link['target'] ? $link['target'] : '_self';
        //     echo '<a class="btn-main secondary" href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . '</a>';
            
        //     echo '</div>';
        //     echo '</div>';
        // endif;
        // echo '</div>';
        // echo '</section>';

    endwhile; endif;
} elseif($layout == 'Big Image'){
    if(have_rows('big_image_group')): while(have_rows('big_image_group')): the_row();
    echo '<section class="position-relative content-image pt-5 pb-5 ' . get_sub_field('classes') . '" style="' . get_sub_field('style') . '">';
        $bgImg = get_sub_field('background_image');
        if($bgImg):
        echo wp_get_attachment_image($bgImg['id'],'full','',['class'=>'position-absolute w-100 h-100','style'=>'top:0;left:0;object-fit:cover;']);
        endif;

        $img = get_sub_field('image');

        echo wp_get_attachment_image($img['id'],'full','',['class'=>'w-100 h-100']);

    echo '</section>';
    endwhile; endif;
}
endwhile; endif;
?>