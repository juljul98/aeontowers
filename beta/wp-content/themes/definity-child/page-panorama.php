<?php 
/*
Template Name: Panorama Page
Template Post Type: post, page, event
*/
// Page code here...
  get_header();
?>
    <nav class="nextNav active navbar navbar-default mega trans-helper navbar-trans navbar-trans-dark row">
      <div class="container">
        <div class="navbar-header">
          <button id="nav-icon1" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <!-- Logo -->
          <a class="navbar-brand" href="index.html"><img class="img-responsive" src="<?php echo site_url(). '/wp-content/uploads/2018/04/Aeon-Towers-logo-1.png'; ?>" alt="Definity - Logo"></a>
        </div><!-- / .navbar-header -->

        <!-- Navbar Links -->
        <div id="navbar" class="navbar-collapse collapse" style="max-height: 744px;">
          <ul class="nav navbar-nav">

            <li class="one">
              <a href="<?php echo site_url() . '/';?>" role="button" aria-haspopup="true" aria-expanded="false">HOME</a>
            </li>
                            <li class="two">
              <a href="<?php echo site_url() . '/commercial';?>" role="button" aria-haspopup="true" aria-expanded="false">Dining &amp; Office</a>
            </li>
                            <li class="three">
              <a href="<?php echo site_url() . '/vividhotel';?>" role="button" aria-haspopup="true" aria-expanded="false">HOTEL</a>
            </li>           
                            <li class="four">
              <a href="<?php echo site_url() . '/vividresidence';?>" role="button" aria-haspopup="true" aria-expanded="false">Service Apartments</a>
            </li>

                            <li class="five active">
              <a href="<?php echo site_url() . '/rooftop';?>" role="button" aria-haspopup="true" aria-expanded="false">Roof Top</a>
            </li>
                            <li class="six">
              <a href="<?php echo site_url() . '/condominium';?>" role="button" aria-haspopup="true" aria-expanded="false">CONDOMINIUM</a>
            </li>
                            <li class="seven">
              <a href="<?php echo site_url() . '/#contact';?>" role="button" aria-haspopup="true" aria-expanded="false">CONTACT</a>
            </li>
            <hr>
          </ul><!-- / .nav .navbar-nav .navbar-right -->
        </div><!--/.navbar-collapse -->
      </div><!-- / .container -->
    </nav>
    <div id="t_pages" class="skydeck" style="padding-top: 91px;">
      
      <div class="banner" style="background-image: url(<?php echo site_url(). '/wp-content/uploads/2018/04/panorama-overlay.png'; ?>);">
              <img src="<?php echo site_url(). '/wp-content/uploads/2018/04/vivid-skydeck-banner.jpg'; ?>" alt="Project Example">
         
      </div>
      <div class="common-desc wow fadeInUp" style="width: 70%; padding-bottom: 1em;">
            <p>Catch your breath as your gaze sweeps across the city. Drink, dine or just 
chillout at Davao’s best and latest: The Panorama.</p>
        </div>
       <div class="sec-heading">
          <h2>GALLERY</h2>
        </div>
          <div class="gallery-items grid clearfix" style="margin-bottom: 6em;">
              

        <?php
        $args = array(
          'post_type' => 'aeon_tower_gallery',
          'category_name' => 'rooftop'
        );
$query = new WP_Query( $args );
if ( $query->have_posts() ) {
  while ( $query->have_posts() ) {
    $query->the_post(); ?>
 
            <figure class="effect-winston wow fadeInUp">
              <?php 
                $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false );
                $tmb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false );
              ?>
              
            <img src="<?php echo $tmb[0]; ?>" alt="img30">
            <figcaption>
              <a href="<?php echo $src[0]; ?>" data-caption="<?php echo  the_title() . '<br>' . the_content(); ?>" data-fancybox="roadtrip1">
                <h2><?php the_title(); ?></h2>
                </a>  
              <p>
                <a href="<?php echo $src[0]; ?>" data-caption="<?php echo  the_title() . '<br>' . the_content(); ?>" data-fancybox="roadtrip2">Read More...</a>
              </p>
            </figcaption>
               
          </figure>
<?php
  }
  wp_reset_postdata();
}
?>
            </div>
            
        </div>
    </div>
<?php get_footer(); ?>