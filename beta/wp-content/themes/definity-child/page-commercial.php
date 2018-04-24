<?php
/*
Template Name: Commercial Page
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
			<a class="navbar-brand" href="index.html">
				<img class="img-responsive" src="<?php echo site_url(). '/wp-content/uploads/2018/04/Aeon-Towers-logo-1.png'; ?>" alt="Definity - Logo">
			</a>
		</div><!-- / .navbar-header -->
		<!-- Navbar Links -->
		<div id="navbar" class="navbar-collapse collapse" style="max-height: 744px;">
			<ul class="nav navbar-nav">
				<li class="one">
					<a href="<?php echo site_url() . '/';?>" role="button" aria-haspopup="true" aria-expanded="false">HOME</a>
				</li>
				<li class="two active">
					<a href="<?php echo site_url() . '/commercial';?>" role="button" aria-haspopup="true" aria-expanded="false">Dining &amp; Office</a>
				</li>
				<li class="three">
					<a href="<?php echo site_url() . '/vividhotel';?>" role="button" aria-haspopup="true" aria-expanded="false">HOTEL</a>
				</li>
				<li class="four">
					<a href="<?php echo site_url() . '/vividresidence';?>" role="button" aria-haspopup="true" aria-expanded="false">Service Apartments</a>
				</li>
				<li class="five">
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
<div id="commercial-page" style="padding-top: 91px;">
	<div class="banner" style="background-image: url(<?php echo site_url(). '/wp-content/uploads/2018/04/PODIUM-VIEW-FROM-NORTH-EAST-e1524061451840.jpg';?>">
		<div class="container">
			<div class="container-inner">
				<h1 class="wow fadeInUp">DINING &amp; OFFICE</h1>
				<h2 class="wow fadeInUp">AVAILABLE FOR LEASE | CONTACT +63 2 894 0074 </h2>
			</div>
		</div>
	</div>
	<div class="container" style="padding-top: 60px;">
		<div class="cont-inner align-center text-center">
			<h2 class="wow fadeInUp">SPACES</h2>
			<div class="commercial-table wow fadeInUp">
				<table>
					<tr>
						<td class="head" style="
							font-weight: normal;
							text-transform: uppercase;
							font-size: 1.2em;
							letter-spacing: 5px;
							">Ground Floor <br><span style="
								font-size: 3em;
							">DINING</span>
						</td>
						<td style="font-size: 1.2em!important;">
							A fantastic dining experience awaits with six of the city’s best restaurants offering
							a delectable menu for everyone to enjoy.
						</td>
					</tr>
				</table>
			</div>
			<div class="row">
				<p class="col-md-offset-3 col-md-6 wow fadeInUp">
					<img src="<?php echo site_url(). '/wp-content/uploads/2018/04/GF-Plan.png'; ?>" alt="" class="img-responsive">
				</p>
			</div>
			<div class="commercial-table wow fadeInUp" style="margin-bottom: 0;">
				<table>
					<tr>
						<td class="head" style="
							font-weight: normal;
							text-transform: uppercase;
							font-size: 1.2em;
							letter-spacing: 5px;
							">Second Floor<br><span style="
								font-size: 3em;
							">OFFICE</span>
						</td>
						<td style="font-size: 1.2em!important;">International standard office spaces designed to optimize your business along with the latest technology and amenitites are available for your disposal.<td>
					</tr>
					<tr>
						<td class="subHead">UNIT NO <br>
							<br>
							1 <br>
							2 <br>
							3 <br>
							4 <br>
							5 <br>
							6 <br>
						</td>
						<td class="subHead row">
							<div class="col-md-3">
								FLOOR AREA <br>
								(sqm) <br>
								122.10 <br>
								146.40 <br>
								158.31 <br>
								321.93 <br>
								195.90 <br>
								500.16 <br>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<div class="row">
				<div class="col-md-offset-3 col-md-6 wow fadeInUp">
					
					<img src="<?php echo site_url().'/wp-content/uploads/2018/04/2F-Plan.png'; ?>" alt="" class="img-responsive">
					
				</div>
			</div>
			<!-- <header class="sec-heading" style="padding-top: 30px; margin-bottom: 30px;">
				<h2>GALLERY</h2>
			</header>
			<div class="testimonials-3col">
				<?php
				$args = array(
				'post_type' => 'aeon_tower_gallery',
				'category_name' => 'diningandoffice'
				);
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
				$query->the_post(); ?>
				<div class="col-md-4 mb-sm-50">
					<div class="t-item wow fadeIn">
						<div class="image-cont">
							<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false ); ?>
							<div class="image-desc">
								<img src="<?php echo $src[0]; ?>" alt="">
								<?php the_content(); ?>
								
							</div>
						</div>
						<div class="test-cont">
							<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>
						</div>
					</div>
				</div>
				<?php
				}
				wp_reset_postdata();
				}
				?>
			</div> -->
		</div>
	</div>
</div>
<?php get_footer() ?>