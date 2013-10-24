<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
/*
Template Name: Testimonials
*/
get_header(); ?>

<?php $testimonial_type = null; ?>
<?php include(locate_template('loop-testimonial.php')); ?>


<?php get_footer(); ?>
