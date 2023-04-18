<?php

function ems_stylesheets() {
wp_enqueue_style('style', get_stylesheet_uri() );

wp_enqueue_style('bootstrap', get_theme_file_uri('/css/bootstrap.min.css'));
wp_enqueue_style('body', get_theme_file_uri('/css/sections/body.css'));
wp_enqueue_style('nav', get_theme_file_uri('/css/sections/nav.css'));
wp_enqueue_style('popup', get_theme_file_uri('/css/sections/popup.css'));
wp_enqueue_style('hero', get_theme_file_uri('/css/sections/hero.css'));

wp_enqueue_style('contact', get_theme_file_uri('/css/sections/contact.css'));
wp_enqueue_style('img', get_theme_file_uri('/css/elements/img.css'));

// if(is_front_page()){
	wp_enqueue_style('home', get_theme_file_uri('/css/sections/home.css'));
// }
// if(is_page_template('templates/about.php')){
// 	wp_enqueue_style('about-custom', get_theme_file_uri('/css/sections/about.css'));
// 	wp_enqueue_style('intro', get_theme_file_uri('/css/sections/intro.css'));
// }
// if( is_page_template('templates/content-page.php' ) ){
// 	wp_enqueue_style('content-page', get_theme_file_uri('/css/sections/content-page.css'));
// }
if(is_single() || is_page_template('templates/blog.php') || is_archive() || is_category() || is_tag() || is_404() ) {
wp_enqueue_style('blog', get_theme_file_uri('/css/sections/blog.css'));
}

wp_enqueue_style('photo-gallery', get_theme_file_uri('/css/sections/photo-gallery.css'));
wp_enqueue_style('footer', get_theme_file_uri('/css/sections/footer.css'));
wp_enqueue_style('sidebar', get_theme_file_uri('/css/sections/sidebar.css'));
wp_enqueue_style('social-icons', get_theme_file_uri('/css/sections/social-icons.css'));
wp_enqueue_style('btn', get_theme_file_uri('/css/elements/btn.css'));
// fonts
wp_enqueue_style('fonts', get_theme_file_uri('/css/elements/fonts.css'));
wp_enqueue_style('proxima-nova', get_theme_file_uri('/proxima-nova/proxima-nova.css'));
wp_enqueue_style('blair-itc', get_theme_file_uri('/blair-itc/blair-itc.css'));
wp_enqueue_style('aspira', get_theme_file_uri('/aspira-font/aspira-font.css'));
wp_enqueue_style('coromant-garamond', '//use.typekit.net/fqe2slt.css');

}
add_action('wp_enqueue_scripts', 'ems_stylesheets');
// for footer
function ems_stylesheets_footer() {
	// wp_enqueue_style('style-footer', get_theme_file_uri('/css/style-footer.css'));
	// owl carousel
	wp_enqueue_style('owl.carousel.min', get_theme_file_uri('/owl-carousel/owl.carousel.min.css'));
	wp_enqueue_style('owl.theme.default', get_theme_file_uri('/owl-carousel/owl.theme.default.min.css'));
	wp_enqueue_style('lightbox-css', get_theme_file_uri('/lightbox/lightbox.min.css'));
	// wp_enqueue_script('font-awesome', '//use.fontawesome.com/fff80caa08.js');

	// owl carousel
	wp_enqueue_script('jquery-min', get_theme_file_uri('/owl-carousel/jquery.min.js'));
	wp_enqueue_script('owl-carousel', get_theme_file_uri('/owl-carousel/owl.carousel.min.js'));
	wp_enqueue_script('owl-carousel-custom', get_theme_file_uri('/owl-carousel/owl-carousels.js'));
	wp_enqueue_script('lightbox-min-js', get_theme_file_uri('/lightbox/lightbox.min.js'));
	wp_enqueue_script('lightbox-js', get_theme_file_uri('/lightbox/lightbox.js'));
    // aos
    wp_enqueue_script('aos-js', get_theme_file_uri('/aos/aos.js'));
    wp_enqueue_script('aos-custom-js', get_theme_file_uri('/aos/aos-custom.js'));
    wp_enqueue_style('aos-css', get_theme_file_uri('/aos/aos.css'));

	// jquery fittext
	// wp_enqueue_script('jquery-min-js', get_theme_file_uri('/jquery-fittext/jquery.min.js'));
    // wp_enqueue_script('jquery-fittext', get_theme_file_uri('/jquery-fittext/jquery.fittext.js'));
    // wp_enqueue_script('jquery-fittext-custom', get_theme_file_uri('/jquery-fittext/fittext.js'));
	
	//counter

    // wp_enqueue_script('jquery-easing-counter', get_theme_file_uri('/js/jquery.easing.js'));
    // wp_enqueue_script('jquery-counter-min', get_theme_file_uri('/js/jquery.counter.min.js'));
    // wp_enqueue_script('counterup-cdn', '//unpkg.com/counterup2@2.0.2/dist/index.js');
    wp_enqueue_script('counter-custom', get_theme_file_uri('/js/counter.js'));
	// jquery modal
	// wp_enqueue_script('jquery-modal-js', get_theme_file_uri('/jquery-modal/jquery.modal.min.js'));
	// wp_enqueue_style('jquery-modal-css', get_theme_file_uri('/jquery-modal/jquery.modal.min.css'));
	// wp_enqueue_style('custom-modal', get_theme_file_uri('/jquery-modal/modal-custom.css'));
    // general
	wp_enqueue_script('nav-js', get_theme_file_uri('/js/nav.js'));
	wp_enqueue_script('popup-js', get_theme_file_uri('/js/popup.js'));
	
	if(is_single()){
		wp_enqueue_script('blog-js', get_theme_file_uri('/js/blog.js'));
		}
	}
	
add_action('get_footer', 'ems_stylesheets_footer');

// loads enqueued javascript files deferred
function mind_defer_scripts( $tag, $handle, $src ) {
	$defer = array( 
	  'jquery-min',
	  'owl-carousel',
	  'owl-carousel-custom',
	  'lightbox-min-js',
	  'lightbox-js',
	  'aos-js',
	  'aos-custom-js',
	  'nav-js',
	  'blog-js',
	  'contact-js'
	);
	if ( in_array( $handle, $defer ) ) {
	   return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
	}
	  
	  return $tag;
  } 
  add_filter( 'script_loader_tag', 'mind_defer_scripts', 10, 3 );

function ems_menus() {
 register_nav_menus( array(
   'primary' => __( 'Primary' )));
register_nav_menus( array(
'secondary' => __( 'Secondary' )));
 register_nav_menu('footer',__( 'Footer' ));
 add_theme_support('title-tag');
 add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'ems_menus');

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();
}

// removes gutenberg styles from all pages but the blog posts
// function smartwp_remove_wp_block_library_css(){

// 	if(!is_single()) {
// 		wp_dequeue_style( 'wp-block-library' );
// 		wp_dequeue_style( 'wp-block-library-theme' );
// 		wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
// 	}
// } 
// add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

// add_filter('show_admin_bar', '__return_false');

// add_filter('comment_form_default_fields', 'remove_website_field_from_comment_form');
function remove_website_field_from_comment_form($fields)
{
    if (isset($fields['url'])) {
        unset($fields['url']);
    }
    return $fields;
}

/*Base URL shorcode*/
add_shortcode( 'base_url', 'baseurl_shortcode' );
function baseurl_shortcode( $atts ) {

    return site_url();
	// [base_url]

}

function divider_shortcode( $atts, $content = null ) {

	$a = shortcode_atts( array(

		'class' => '',

		'style' => ''

	), $atts );

	return '<div class="divider ' . esc_attr($a['class']) . '" style="' . esc_attr($a['style']) . '"></div>';

	// [divider class="" style=""]
}

add_shortcode( 'divider', 'divider_shortcode' );

function btn_shortcode( $atts, $content = null ) {

	$a = shortcode_atts( array(
	
	'class' => '',
	
	'href' => '#',
	
	'style' => '',
	
	'target' => ''
	
	), $atts );
	
	// return '<a class="btn-accent-primary" href="' . esc_attr($a['href']) . '" target="' . esc_attr($a['target']) . '">' . $content . '</a>';
	
	return '<a class="btn-main ' . esc_attr($a['class']) . '" href="' . esc_attr($a['href']) . '" style="' . esc_attr($a['style']) . '" target="' . esc_attr($a['target']) . '">' . $content . '</a>';
	
	// [button href="#" class="btn-main" style=""]Learn More[/button]
	
	}
	
	add_shortcode( 'button', 'btn_shortcode' );

function spacer_shortcode( $atts, $content = null ) {

	$a = shortcode_atts( array(

		'class' => '',

		'style' => ''

	), $atts );

	return '<div class="spacer ' . esc_attr($a['class']) . '" style="' . esc_attr($a['style']) . '"></div>';

	// [spacer class="" style=""]
}

add_shortcode( 'spacer', 'spacer_shortcode' );

function current_year( $atts, $content = null ) {

	$current_year = date("Y");

	return $current_year;

	// [currentyear]
}

add_shortcode( 'currentyear', 'current_year' );



function my_map_shortcode() {
    $output = '<div id="map" style="height:750px;width:100%;"></div>';
    $output .= '<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqmsW5-PBWrbZP0ixZJSsUsrYNOHWFYjI&callback=initMap"></script>';
    $output .= '
	
	<script>
        function initMap() {
        // Map option
        var options = {
            center: {lat: 40.14775040259533, lng:-105.03824784895373}, 
            zoom:5
        }

        // New Map
        map = new google.maps.Map(document.getElementById("map"),options);

        
        // // InfoWindow
        // const infowindow = new google.maps.InfoWindow({
        //     content: `<div class="pt-4 pb-3">
        //     <p>5012 Buchanon Trail E<br>Zullinger, PA 17272</p>
        //     <a href="https://goo.gl/maps/HM1nCJbxXdLiP6w69" target="_blank">Click Here for Address</a>
        //     </div>`,
        //     // ariaLabel: "First Address",
        // });

        // // Marker
        // const marker = new google.maps.Marker({
        //     position: {lat: 39.76786030574004, lng: -77.62187373050699},
        //     map:map,
        //     // title: "Uluru (Ayers Rock)",
        //     // icon:"https://img.icons8.com/nolan/2x/marker.png" // to add a custom marker
        // })

        // =============

        // Add Markers to Array
        let MarkerArray = [
            {
                location:{lat: 39.76786031, lng: -77.62187373},
                content:`<div class="pt-4 pb-3">
                <p>5012 Buchanon Trail E<br>Zullinger, PA 17272</p>
                <a href="https://goo.gl/maps/HM1nCJbxXdLiP6w69" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 47.2872536, lng: -101.9241151},
                content:`<div class="pt-4 pb-3">
                <p>113 Main St<br>Zap, ND 58580</p>
                <a href="https://goo.gl/maps/rh5YjKNnJmeby4oV7" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 46.78306519, lng: -98.56428316},
                content:`<div class="pt-4 pb-3">
                <p>218 1st St<br>Ypsilanti, ND 58497</p>
                <a href="https://goo.gl/maps/h7NnBaDSxFXYx1fP6" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 41.10141193, lng: -80.77462499},
                content:`<div class="pt-4 pb-3">
                <p>6000 Mahoning Ave<br>Youngstown, OH 44515</p>
                <a href="https://goo.gl/maps/7td1bvopJx3WBMXy8" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 40.1105499, lng: -76.71404549},
                content:`<div class="pt-4 pb-3">
                <p>15 Pennsylvania ave<br>York Haven, PA 17370</p>
                <a href="https://goo.gl/maps/jFczUgY7SResHYpw5" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 42.91082275, lng: -85.69581253},
                content:`<div class="pt-4 pb-3">
                <p>2929 Michael Ave SW<br>Wyoming, MI 49509</p>
                <a href="https://goo.gl/maps/UnvbxpvzQMNnxx8JA" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 39.45391081, lng: -99.09887563},
                content:`<div class="pt-4 pb-3">
                <p>508 Main Street<br>Woodston, KS 67675</p>
                <a href="https://goo.gl/maps/pmiSiUJxFUjcGM2v7" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 35.77289429, lng: -80.58597027},
                content:`<div class="pt-4 pb-3">
                <p>4220 Potneck Rd<br>Woodleaf, NC 27054</p>
                <a href="https://goo.gl/maps/7qecYe3nRTMrdwyQ7" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 33.78009287, lng: -89.0516948},
                content:`<div class="pt-4 pb-3">
                <p>109 Market St<br>Woodland, MS 39776</p>
                <a href="https://goo.gl/maps/aou9W3uffaQmx7iA8" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 41.12566472, lng: -84.85669246},
                content:`<div class="pt-4 pb-3">
                <p>22133 Main St<br>Woodburn, IN 46797</p>
                <a href="https://goo.gl/maps/dR2cVHUCzMDJmC5J6" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 48.49991869, lng: -99.70487676},
                content:`<div class="pt-4 pb-3">
                <p>201 3rd Ave N<br>Wolford, ND 58385</p>
                <a href="https://goo.gl/maps/ZgDVDdN43DQnic1B8" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 41.40404142, lng: -94.8908262},
                content:`<div class="pt-4 pb-3">
                <p>405 Pioneer Ave<br>Wiota, IA 50274</p>
                <a href="https://goo.gl/maps/xwUtKt39gXojunSz9" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 32.73848652, lng: -114.6355844},
                content:`<div class="pt-4 pb-3">
                <p>2127 Winterhaven Drive<br>Winterhaven, CA 92283</p>
                <a href="https://goo.gl/maps/gAMxn5f1gKRuCGrJA" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 33.91103847, lng: -90.74994167},
                content:`<div class="pt-4 pb-3">
                <p>300 E Winston St<br>Winstonville, MS 38781</p>
                <a href="https://goo.gl/maps/nKzC6iBsBB9TsnAZ7" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 38.2110206, lng: -81.52952893},
                content:`<div class="pt-4 pb-3">
                <p>303 Fields Creek Rd<br>Winifrede, WV 25214</p>
                <a href="https://goo.gl/maps/CU4b4ofF8NB1Nhb66" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 42.07576941, lng: -75.64920873},
                content:`<div class="pt-4 pb-3">
                <p>652 Old Route 17<br>Windsor, NY 13865</p>
                <a href="https://goo.gl/maps/gtttMoNxWWvaUz937" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 41.53572495, lng: -80.9334099},
                content:`<div class="pt-4 pb-3">
                <p>5103 State Route 322<br>Windsor, OH 44099</p>
                <a href="https://goo.gl/maps/xxzG1CMeLx2yTSFBA" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 45.99731976, lng: -110.6607024},
                content:`<div class="pt-4 pb-3">
                <p>310 Elliot St N<br>Wilsall, MT 59086</p>
                <a href="https://goo.gl/maps/dEzwsGXFsZz8wmHA6" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 41.73704602, lng: -87.86942873},
                content:`<div class="pt-4 pb-3">
                <p>8448 Archer Ave<br>Willow Springs, IL 60480</p>
                <a href="https://goo.gl/maps/6WFLF32tdbMZ3bYd6" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 29.38823084, lng: -82.44868136},
                content:`<div class="pt-4 pb-3">
                <p>29 NW 1st Ave<br>Williston, FL 32696</p>
                <a href="https://goo.gl/maps/YoGpj3NoYzSs919k8" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 37.5155744, lng: -75.80611303},
                content:`<div class="pt-4 pb-3">
                <p>4457 Willis Wharf Rd<br>Willis Wharf, VA 23486</p>
                <a href="https://goo.gl/maps/BcAbkEJFUvPwdxX2A" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 40.28869989, lng: -87.2926422},
                content:`<div class="pt-4 pb-3">
                <p>115 East 2nd Street<br>Williamsport, IN 47993</p>
                <a href="https://goo.gl/maps/SnUwRmCBSswkNDdz5" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 48.63249986, lng: -103.1844997},
                content:`<div class="pt-4 pb-3">
                <p>507 Main St<br>Wildrose, ND 58795</p>
                <a href="https://goo.gl/maps/LRzk2CnXyDqF9jSe7" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 36.96523782, lng: -89.08991283},
                content:`<div class="pt-4 pb-3">
                <p>330 Court Street<br>Wickliffe, KY 42087</p>
                <a href="https://goo.gl/maps/MpUB3GYRQQEzWs2E9" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 46.98588463, lng: -104.1885776},
                content:`<div class="pt-4 pb-3">
                <p>211 S Wibaux Street<br>Wibaux, MT 59353</p>
                <a href="https://goo.gl/maps/ibkKzgCSn9tVbWxB6" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 35.44356844, lng: -100.2745605},
                content:`<div class="pt-4 pb-3">
                <p>507 S. Candian St<br>Wheeler, TX 79096</p>
                <a href="https://goo.gl/maps/3ky4yLQzAKqhHCCb9" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 37.89752314, lng: -81.67133893},
                content:`<div class="pt-4 pb-3">
                <p>35665 Pond Fork Rd<br>Wharton, WV 25208</p>
                <a href="https://goo.gl/maps/UWyQMo7sXgu1TvbEA" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 41.71029579, lng: -72.6621899},
                content:`<div class="pt-4 pb-3">
                <p>67 Beaver Road<br>Wethersfield, CT 6109</p>
                <a href="https://goo.gl/maps/6raTEy8dsQwJhHK97" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 40.75265094, lng: -78.6698127},
                content:`<div class="pt-4 pb-3">
                <p>103 Church<br>Westover, PA 16692</p>
                <a href="https://goo.gl/maps/BMVnCiaj9HBas1kT7" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 48.91021306, lng: -101.0206984},
                content:`<div class="pt-4 pb-3">
                <p>180 Main St<br>Westhope, ND 58793</p>
                <a href="https://goo.gl/maps/WZhhhzaWHTZuGXbW8" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 42.58046898, lng: -71.48887143},
                content:`<div class="pt-4 pb-3">
                <p>5 W Prescott St<br>Westford, MA 1886</p>
                <a href="https://goo.gl/maps/mNnw1i9fe7Zhvj588" target="_blank">Click Here for Address</a>
                </div>`
            },
{
                location:{lat: 43.88612146, lng: -89.49299607},
                content:`<div class="pt-4 pb-3">
                <p>108 E 2nd Street<br>Westfield, WI 53964</p>
                <a href="https://goo.gl/maps/g5KLnNf5FuWr43fs5" target="_blank">Click Here for Address</a>
                </div>`
            },
        ]

        // for loop
        for (i = 0; i < MarkerArray.length; i++) {
            addMarker(MarkerArray[i])
        }

        // Add Markers
        function addMarker(props){
            const marker = new google.maps.Marker({
                position:props.location,
                map:map,
                content:props.content,
                animation: google.maps.Animation.DROP
                // title: "Uluru (Ayers Rock)",
                // icon:"https://img.icons8.com/nolan/2x/marker.png" // to add a custom marker
            })
            const infowindow = new google.maps.InfoWindow({
                content: props.content,
                // ariaLabel: "First Address",
            });

            if(props.content){
                marker.addListener("click", () => {
                    infowindow.open({
                        anchor: marker,
                        map,
                    });
                });
            } // end of if statement for content

        } // addMarker function


        // addMarker({
        //     location:{lat: 39.76786030574004, lng: -77.62187373050699},
        //     content:`<div class="pt-4 pb-3">
        //     <p>5012 Buchanon Trail E<br>Zullinger, PA 17272</p>
        //     <a href="https://goo.gl/maps/HM1nCJbxXdLiP6w69" target="_blank">Click Here for Address</a>
        //     </div>`
        // });


    }
    window.initMap = initMap;
    </script>';

    return $output;
}
add_shortcode('my_map', 'my_map_shortcode');




// ENABLE WOOCOMMERCE
// add_action('after_setup_theme',function() {
//     add_theme_support('woocommerce');
// });
// add_theme_support('wc-product-gallery-zoom');
// add_theme_support('wc-product-gallery-lightbox');
// add_theme_support('wc-product-gallery-slider');


// WOOCOMMERCE CONTENT WITH NO SIDEBAR
// add_action('woocommerce_before_main_content','add_container_class',9);
// function add_container_class(){
// echo '<div class="container pt-5 pb-5">';
// echo '<div class="row justify-content-center">';
// echo '<div class="col-md-12">';
// }

// add_action('woocommerce_after_main_content','close_container_class',9);
// function close_container_class(){
// echo '</div>';
// echo '</div>';
// echo '</div>';
// }

// removes sidebar
// remove_action('woocommerce_sidebar','woocommerce_get_sidebar');



// WOOCOMMERCE CONTENT WITH CUSTOM SIDEBAR
// add_action('woocommerce_before_main_content','add_container_class',9);
// function add_container_class(){
// echo '<div class="container pt-5 pb-5" style="">';
// echo '<div class="row">';

// echo get_template_part('partials/sidebar');

// echo '<div class="col-md-9 order-1 order-md-2">';
// }

// add_action('woocommerce_after_main_content','close_container_class',9);
// function close_container_class(){
// echo '</div>';
// echo '</div>';
// echo '</div>';
// }

// removes sidebar
// remove_action('woocommerce_sidebar','woocommerce_get_sidebar');