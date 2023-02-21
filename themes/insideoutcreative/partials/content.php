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

        echo '<section class="position-relative content-image ' . get_sub_field('classes') . '" style="padding:100px 0;margin:50px 0;' . get_sub_field('style') . '">';
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
    echo '<section class="position-relative content-image ' . get_sub_field('classes') . '" style="' . get_sub_field('style') . '">';
        $bgImg = get_sub_field('background_image');
        if($bgImg):
        echo wp_get_attachment_image($bgImg['id'],'full','',['class'=>'position-absolute w-100 h-100','style'=>'top:0;left:0;object-fit:cover;']);
        endif;

        $img = get_sub_field('image');

        echo wp_get_attachment_image($img['id'],'full','',['class'=>'w-100 h-100']);

    echo '</section>';
    endwhile; endif;
} elseif($layout == 'News'){
    if(have_rows('news_group')): while(have_rows('news_group')): the_row();
    echo '<section class="position-relative content-image ' . get_sub_field('classes') . '" style="padding:100px 0;' . get_sub_field('style') . '">';
        $bgImg = get_sub_field('background_image');
        if($bgImg):
        echo wp_get_attachment_image($bgImg['id'],'full','',['class'=>'position-absolute w-100 h-100','style'=>'top:0;left:0;object-fit:cover;']);
        endif;

        echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-12">';

        echo get_sub_field('content');

        echo '</div>';
        echo '</div>';
        echo '</div>';

        $featured_posts = get_sub_field('relationship');

        if( $featured_posts ):
            echo '<div class="container">';
            echo '<div class="row">';
            $postsCounter = 0;
            foreach( $featured_posts as $post ): 
                // Setup this post for WP functions (variable must be named $post).
                setup_postdata($post);
                $postsCounter++;
                echo '<div class="col-lg-4 col-md-6">';

                echo '<div class="aos-animation" data-aos="fade-up" data-aos-delay="' . $postsCounter . '00">';
                echo '<div class="bg-accent w-100 mb-5" style="height:3px;"></div>';

                echo '<a href="' . get_the_permalink() . '" class="">';
                echo '<div class="img-hover overflow-h">';
                    the_post_thumbnail('full',array(
                        'class'=>'w-100',
                        'style'=>'height:250px;object-fit:cover;'
                    ));
                echo '</div>';
                echo '</a>';
                
                echo '<span class="d-block mt-3 mb-4">' . get_the_date() . '</span>';
                echo '<h3 class="h5 mb-0"><a href="' . get_the_permalink() . '" class="text-black bold">' . get_the_title() . '</a></h3>';
                echo get_the_excerpt();
                
                echo '</div>';
                echo '</div>'; // end of col
            endforeach;
            // Reset the global post object so that the rest of the page works correctly.
            wp_reset_postdata(); 
            echo '</div>';
            echo '</div>';
        endif;

    echo '</section>';
    endwhile; endif;
} elseif($layout == 'Process'){
    if(have_rows('process_group')): while(have_rows('process_group')): the_row();
    echo '<section class="position-relative content-section ' . get_sub_field('classes') . '" style="background:#464646;padding:75px 0;' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

    // echo get_template_part('partials/borders-gold');

    $bgImg = get_sub_field('background_image');

    if($bgImg){
        echo wp_get_attachment_image($bgImg['id'],'full','',[
            'class'=>'w-100 h-100 position-absolute bg-img',
            'style'=>'top:0;left:0;object-fit:cover;'
        ]);
    }

    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-12 text-center pb-5">';

    echo get_sub_field('content_top');

    echo '</div>';
    echo '</div>';

    // $pages = get_sub_field('pages');

    if(have_rows('columns_repeater')):
        echo '<div class="container">';
        echo '<div class="row justify-content-center">';
        $pagesCounter=0;
        while(have_rows('columns_repeater')): the_row();

        $pagesCounter++;
        // sprintf("%02d", $pagesCounter)

        echo '<div class="col-lg-4 col-md-6 text-white mb-5 col-services" style="text-decoration:none;">';

        echo '<div class="aos-animation" data-aos="fade-in" data-aos-delay="' . $pagesCounter . '00">';
        if(get_sub_field('title_above')){
            echo '<span class="bold text-accent-secondary text-center d-block">' . get_sub_field('title_above') . '</span>';
        }

        // echo '<a href="' . get_the_permalink() . '" class="col-lg-4 col-md-6 text-white mb-5 col-services" style="text-decoration:none;">';
        echo '<div class="position-relative pl-5 pr-5 h-100 col-services-hover" style="padding-top:50px;padding-bottom:50px;">';

        // start of hover box
        // echo '<div class="hover-box bg-accent-dark position-absolute w-100 h-100 z-1 d-flex align-items-center justify-content-center pl-5 pr-5 col-services-hover-content" style="border:6px solid #fbcf02;top:0;left:0;transition:all .25s ease-in-out;">';

        // echo '<div>';
        // echo get_sub_field('content_hover');
        // echo '</div>';

        // echo '</div>';
        // end of hover box

        echo '<div class="position-absolute w-100 h-100 bg-accent" style="top:0;left:0;mix-blend-mode:multiply;box-shadow: inset 0px 0px 5px rgba(0,0,0,.9);"></div>';

        echo '<div class="hover-box bg-accent position-absolute w-100 h-100" style="top:0;left:0;transition:all .25s ease-in-out;box-shadow: inset 0px 0px 5px rgba(0,0,0,.9);"></div>';

        echo '<div class="position-absolute w-100 h-100 bg-accent-quaternary" style="top:0;left:0;mix-blend-mode:overlay;opacity:.28;border:2px solid var(--accent-primary);"></div>';

        echo '<div class="position-relative pb-3 h-100">';
        echo '<span class="h1 d-block coromant-garamond" style="font-size:41px;">' . sprintf("%02d", $pagesCounter) . '</span>';

        // echo '<span class="mb-5 d-block coromant-garamond pl-5 h4" style="">' . get_sub_field('title') . '</span>';

        echo '<div class="d-flex align-items-start">';
        // echo '<div style="height: 35px;
        // width: 35px;
        // border: 1px solid var(--accent-primary);
        // display: flex;
        // align-items: center;
        // justify-content: center;
        // border-radius: 50%;
        // margin-right: 15px;">';
        // echo '<span class="plus-sign">&plus;</span>';
        // echo '</div>';

        echo '<img src="https://insideoutcreative.io/wp-content/uploads/2023/02/Circle-Ellipses.png" alt="" height="30px" width="auto" class="pr-3">';

        echo '<div class="position-relative">';
        echo '<h3 class="" style="color:#4d4c4c;font-size:32px;">' . get_sub_field('title') . '</h3>';

        // echo '<div class="position-absolute" style="border-bottom:8px solid var(--accent-primary);width:75px;bottom:-15px;left:0;"></div>';

        echo '</div>';
        echo '</div>';


        
        echo '</div>';

        echo '</div>';

        echo '</div>';
        echo '</div>'; // end of col
        // echo '</a>';
        endwhile;
            
            echo '</div>'; // end of row
            echo '</div>'; // end of container
        endif;
    
        echo '<div class="row">';
    echo '<div class="col-12 text-center pb-5">';

    echo get_sub_field('content_bottom');

    echo '</div>';
    echo '</div>';

    echo '</div>';
    
    echo '</section>';
endwhile; endif;    
} elseif($layout == 'Text Columns'){
    if(have_rows('text_columns_group')): while(have_rows('text_columns_group')): the_row();
    echo '<section class="position-relative text-columns text-white ' . get_sub_field('classes') . '" style="background:#00adb7;padding:75px 0;' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

    // echo get_template_part('partials/borders-gold');

    $bgImg = get_sub_field('background_image');

    if($bgImg){
        echo wp_get_attachment_image($bgImg['id'],'full','',[
            'class'=>'w-100 h-100 position-absolute bg-img',
            'style'=>'top:0;left:0;object-fit:cover;'
        ]);
    }

    if(have_rows('columns_repeater')):
        $columnsRepeater = 0;
        echo '<div class="container-fluid">';
            echo '<div class="row justify-content-center">';
            while(have_rows('columns_repeater')): the_row();
            $columnsRepeater++;
            echo '<div class="col-lg-2 col-md-4 text-center mb-4">';

            if($columnsRepeater != 1){
                echo '<div class="bg-accent h-100 position-absolute d-md-block d-none" style="top:0;left:0;width:2px;"></div>';

                // echo '<div class="text-center">';
                echo '<div class="bg-accent w-50 ml-auto mr-auto d-md-none d-block mt-4 mb-4" style="top:0;left:0;height:2px;"></div>';
                // echo '</div>';
            }

            echo '<span class="d-block" style="font-size:40px;">' . get_sub_field('title') . '</span>';
            echo '<span class="d-block bold">' . get_sub_field('subtitle') . '</span>';

            echo '</div>';
            endwhile;
            echo '</div>';
        echo '</div>';
    endif;

    echo '</section>';
    endwhile; endif;
}
endwhile; endif;
?>