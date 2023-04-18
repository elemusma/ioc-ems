<?php

/**
 * Template Name: Map
 */

 get_header();

 echo '<section class="pt-5 pb-5">';
    echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-12">';
    if ( have_posts() ) : while ( have_posts() ) : the_post();
    the_content();
    endwhile; else:
    echo '<p>Sorry, no posts matched your criteria.</p>';
    endif;
    echo '</div>';

            echo '<div class="col-lg-9">';
            echo '<div id="map" style="height:750px;width:100%;"></div>';
            echo '</div>';
            
            echo '<div class="col-lg-3">';
            if(have_rows('sections_repeater')): while(have_rows('sections_repeater')): the_row();

            echo '<p class="bold">' . get_sub_field('title') . '</p>';

            if(have_rows('locations_repeater')): while(have_rows('locations_repeater')): the_row();
            echo '<div class="d-flex">';
                echo '<div class="label d-flex justify-content-center align-items-center mr-2" style="background:' . get_sub_field('label_color') . ';width:30px;height:30px;border-radius:50%;">';
                echo '<span>' . get_sub_field('label') . '</span>';
                echo '</div>';
                echo '<div class="small">';
                echo '<span class="hospital-title bold">' . get_sub_field('title') . '</span>';
                // echo '<div class="small">';
                echo get_sub_field('description');
                // echo '</div>';
                echo '</div>';
            echo '</div>';
            endwhile; endif;

            endwhile; endif;
            echo '</div>';

        echo '</div>';
    echo '</div>';
 echo '</section>';

 ?>


<script>
function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
            // 43.42564548895474, -88.18134401131695
          center: { lat: 43.42564548895474, lng: -88.18134401131695 },
          zoom: 8,
        });

        const markers = [
            {
  position: { lat: 43.043682, lng: -88.041992 },
  label: "1",
  color: "green",
  title: "Ascension St. Francis Hospital",
  description: "3327 S. 16th Street Milwaukee, WI 53215",
  link: "https://www.google.com/maps?q=3327+S.+16th+Street+Milwaukee,+WI+53215"
},
{
  position: { lat: 42.836579, lng: -88.736246 },
  label: "2",
  color: "green",
  title: "Ascension All Saints Hospital",
  description: "3801 Spring Street Racine, WI 53405",
  link: "https://www.google.com/maps?q=3801+Spring+Street+Racine,+WI+53405"
},
{
  position: { lat: 43.072384, lng: -89.404068 },
  label: "3",
  color: "green",
  title: "Ascension Calumet Hospital",
  description: "614 Memorial Drive Chilton, WI 53014",
  link: "https://www.google.com/maps?q=614+Memorial+Drive+Chilton,+WI+53014"
},
{
  position: { lat: 44.511236, lng: -88.013275 },
  label: "4",
  color: "green",
  title: "Ascension Franklin Hospital",
  description: "10101 S. 27th Street Franklin, WI 53132",
  link: "https://www.google.com/maps?q=10101+S.+27th+Street+Franklin,+WI+53132"
},
{
  position: { lat: 43.0505559, lng: -87.8807118 },
  label: "5",
  color: "green",
  title: "Ascension Columbia St. Mary's - Milwaukee",
  description: "2301 N. Lake Drive Milwaukee, WI 53211",
  link: "https://www.google.com/maps?q=2301+N.+Lake+Drive+Milwaukee,+WI+53211"
},
{
  position: { lat: 43.1499089, lng: -88.1274731 },
  label: "6",
  color: "green",
  title: "Ascension Menomonee Falls Hospital",
  description: "N88 W14275 Main Street Menomonee Falls, WI 53051",
  link: "https://www.google.com/maps?q=N88+W14275+Main+Street+Menomonee+Falls,+WI+53051"
},
{
  position: { lat: 43.0468583, lng: -88.1571906 },
  label: "7",
  color: "green",
  title: "Ascension Elmbrook Hospital",
  description: "19333 W. North Avenue Brookfield, WI 53045",
  link: "https://www.google.com/maps?q=19333+W.+North+Avenue+Brookfield,+WI+53045"
},{
    position: { lat: 43.221862, lng: -88.088620 },
    label: "8",
    color: "green",
    title: "Ascension SE Wisconsin Hospital - Elmbrook Campus",
    description: "19333 W. North Ave Brookfield, WI 53045",
    link: "https://www.google.com/maps?q=19333+W.+North+Ave+Brookfield,+WI+53045"
},
{
    position: { lat: 43.117838, lng: -89.358313 },
    label: "9",
    color: "green",
    title: "Ascension St. Mary's Hospital",
    description: "700 S. Park Street Madison, WI 53715",
    link: "https://www.google.com/maps?q=700+S.+Park+Street+Madison,+WI+53715"
},
{
    position: { lat: 42.936647, lng: -87.924484 },
    label: "10",
    color: "green",
    title: "Ascension SE Wisconsin Hospital - St. Francis Campus",
    description: "3237 S. 16th Street Milwaukee, WI 53215",
    link: "https://www.google.com/maps?q=3237+S.+16th+Street+Milwaukee,+WI+53215"
},
{
    position: { lat: 43.159808, lng: -89.331621 },
    label: "11",
    color: "green",
    title: "Ascension St. Clare's Hospital",
    description: "1510 Jefferson Street Baraboo, WI 53913",
    link: "https://www.google.com/maps?q=1510+Jefferson+Street+Baraboo,+WI+53913"
},
{
    position: { lat: 42.579376, lng: -87.822382 },
    label: "12",
    color: "green",
    title: "Ascension All Saints - Spring Street Campus",
    description: "3801 Spring Street Racine, WI 53405",
    link: "https://www.google.com/maps?q=3801+Spring+Street+Racine,+WI+53405"
},
{
    position: { lat: 44.015744, lng: -88.530555 },
    label: "13",
    color: "green",
    title: "Ascension Calumet Hospital",
    description: "614 Memorial Dr Chilton, WI 53014",
    link: "https://www.google.com/maps?q=614+Memorial+Dr+Chilton,+WI+53014"
},

// start of urgent cares
{
  position: { lat: 43.047389, lng: -88.008559 },
  label: "A",
  color: "yellow",
  title: "Ascension at Mayfair Road - St. Joseph's Urgent Care",
  description: "201 North Mayfair Road Wauwatosa, WI 53226",
  link: "https://www.google.com/maps?q=201+North+Mayfair+Road+Wauwatosa,+WI+53226"
},
{
  position: { lat: 43.089665, lng: -87.916547 },
  label: "B",
  color: "yellow",
  title: "Ascension Riverwoods Urgent Care",
  description: "375 W. River Woods Parkway Glendale, WI 53212",
  link: "https://www.google.com/maps?q=375+W.+River+Woods+Parkway+Glendale,+WI+53212"
},
{
  position: { lat: 43.325543, lng: -87.951575 },
  label: "C",
  color: "yellow",
  title: "Ascension Grafton Urgent Care",
  description: "2061 Cheyenne Court Grafton, WI 53024",
  link: "https://www.google.com/maps?q=2061+Cheyenne+Court+Grafton,+WI+53024"
},
{
  position: { lat: 44.262234, lng: -88.427334 },
  label: "D",
  color: "red",
  title: "Ascension St. Elizabeth Hospital",
  description: "1506 S. Oneida Street Appleton, WI 54915",
  link: "https://www.google.com/maps?q=1506+S.+Oneida+Street+Appleton,+WI+54915"
},

        ];

        markers.forEach((marker) => {
          const markerOptions = {
            position: marker.position,
            map: map,
            label: marker.label,
            icon: {
              path: google.maps.SymbolPath.CIRCLE,
              fillColor: marker.color,
              fillOpacity: 1,
              strokeWeight: 0,
              scale: 12,
            },
          };
          const markerObject = new google.maps.Marker(markerOptions);
          const infoWindow = new google.maps.InfoWindow({
            content: `<div><h3>${marker.title}</h3><p>${marker.description}</p><a href="${marker.link}" target="_blank">Learn more</a></div>`,
          });
          markerObject.addListener("click", () => {
            infoWindow.open(map, markerObject);
          });
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqmsW5-PBWrbZP0ixZJSsUsrYNOHWFYjI&callback=initMap"
    async defer></script>



 <?php

 get_footer();

?>