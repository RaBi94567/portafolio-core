<?php
/*
Plugin Name: Portafolio Core Main
Description: Handles custom post types, shortcodes, and other core functionality for the Portafolio theme.
Version: 1.0
Author: Rabi Thakur
*/

if (!defined('ABSPATH')) exit;

// Custom Post Types
require_once plugin_dir_path(__FILE__) . 'includes/post-types.php';

// Shortcodes
require_once plugin_dir_path(__FILE__) . 'includes/shortcodes.php';
