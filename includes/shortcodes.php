<?php


/**
 * Shortcode for About Me Hero section
 */
function cv_about_me_hero_shortcode($atts) {

    // Start output buffering
    ob_start();

    // Load the template and pass all attributes
    get_template_part('template-parts/about-me-hero', null, $atts);

    return ob_get_clean();
}
add_shortcode('cv_about_me_hero', 'cv_about_me_hero_shortcode');





/**
 * Shortcode for About Me section
 */
function cv_about_me_shortcode($atts) {
    // Start output buffering
    ob_start();

    // Load the template and pass all attributes
    get_template_part('template-parts/about-me', null, $atts);

    return ob_get_clean();
}
add_shortcode('cv_about_me', 'cv_about_me_shortcode');


/**
 * Shortcode for Skills section
 */
function cv_skills_shortcode($atts) {
    // Start output buffering
    ob_start();

    // Load the template and pass all attributes
    get_template_part('template-parts/skills', null, $atts);

    return ob_get_clean();
}
add_shortcode('cv_skills', 'cv_skills_shortcode');




/**
 * Shortcode for Portfolio section
 */
function cv_portfolio_shortcode($atts) {
    // Start output buffering
    ob_start();

    // Load the template and pass all attributes
    get_template_part('template-parts/portfolio', null, $atts);

    return ob_get_clean();
}
add_shortcode('cv_portfolio', 'cv_portfolio_shortcode');


/**
 * Shortcode for resume section
 */
function cv_resume_shortcode($atts) {
    // Start output buffering
    ob_start();

    // Load the template and pass all attributes
    get_template_part('template-parts/resume', null, $atts);

    return ob_get_clean();
}
add_shortcode('cv_resume', 'cv_resume_shortcode');




/**
 * Shortcode for testimonials section
 */
function cv_testimonials_shortcode($atts) {
    // Start output buffering
    ob_start();

    // Load the template and pass all attributes
    get_template_part('template-parts/testimonials', null, $atts);

    return ob_get_clean();
}
add_shortcode('cv_testimonials', 'cv_testimonials_shortcode');
 
