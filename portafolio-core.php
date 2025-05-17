<?php
/*
Plugin Name: Portafolio Core
Description: Handles custom post types, shortcodes, and other core functionality for the Portafolio theme.
Version: 1.0
Author: Your Name
*/

if (!defined('ABSPATH')) exit;

// Custom Post Types
require_once plugin_dir_path(__FILE__) . 'includes/post-types.php';

// Shortcodes
require_once plugin_dir_path(__FILE__) . 'includes/shortcodes.php';
