<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Layout Settings
    |--------------------------------------------------------------------------
    |
    | These settings define the default configuration for layouts across
    | the application. You can override these in individual components.
    |
    */

    'defaults' => [
        'title' => env('APP_NAME', 'LMS'),
        'body_class' => 'bg-white',
        'language' => 'en',
    ],

    /*
    |--------------------------------------------------------------------------
    | Layout Specific Settings
    |--------------------------------------------------------------------------
    |
    | Configuration for specific layout types
    |
    */

    'app' => [
        'title' => 'LMS - Learning Management System',
        'body_class' => 'bg-white',
        'show_header' => true,
        'show_footer' => true,
        'show_scroll_top' => true,
    ],

    'auth' => [
        'title' => 'Authentication - LMS',
        'body_class' => 'bg-white',
        'show_header' => false,
        'show_footer' => false,
        'show_scroll_top' => false,
    ],

    'instructor' => [
        'title' => 'Instructor Dashboard - LMS',
        'body_class' => '',
        'show_navbar' => true,
        'show_sidebar' => true,
        'show_scroll_top' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Asset Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration for CSS and JS assets. Assets are loaded in the order
    | they appear in the arrays. You can also specify conditions for loading.
    |
    | Asset structure:
    | 'asset_name' => [
    |     'path' => 'path/to/asset.css',
    |     'priority' => 1,                    // Lower numbers load first
    |     'condition' => 'feature_enabled',   // Optional condition key
    |     'load_in_head' => true,            // For JS only - load in <head>
    | ]
    |
    | Or simple string format:
    | 'asset_name' => 'path/to/asset.css'
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Asset Loading Conditions
    |--------------------------------------------------------------------------
    |
    | Define conditions for conditional asset loading. You can check for
    | features, user roles, environment, etc.
    |
    */

    'conditions' => [
        'slider_enabled' => true, // Example: enable/disable slider assets
        'charts_enabled' => false, // Example: enable/disable chart libraries
        'admin_features' => fn() => auth()->check() && auth()->user()->hasRole('admin'),
    ],

    'assets' => [
        'favicon' => 'assets/images/favicon/favicon.ico',
        'canonical_url' => 'https://geeksui.codescandy.com/geeks/index.html',


    ],


];
