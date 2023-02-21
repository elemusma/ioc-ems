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
}
endwhile; endif;
?>