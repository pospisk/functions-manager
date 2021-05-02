<?php

    /**
     *  Remove WordPress Dashboard Widgets
     */
    function fm_remove_dashboard_widgets() {
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' ); 			// WordPress.com Blog
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' ); 			// Plugins
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' ); 		// Right Now
        remove_action( 'welcome_panel', 'wp_welcome_panel' ); 					// Welcome Panel
        remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel' );		// Try Gutenberg
        remove_meta_box('dashboard_quick_press', 'dashboard', 'side' ); 		// Quick Press widget
        remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side' ); 		// Recent Drafts
        remove_meta_box('dashboard_secondary', 'dashboard', 'side' ); 			// Other WordPress News
        remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal' ); 	// Incoming Links
        remove_meta_box('rg_forms_dashboard', 'dashboard', 'normal' ); 			// Gravity Forms
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal' ); 	// Recent Comments
        remove_meta_box('icl_dashboard_widget', 'dashboard', 'normal' ); 		// Multi Language Plugin
        remove_meta_box('dashboard_activity', 'dashboard', 'normal' ); 			// Activity
        remove_meta_box('dashboard_site_health', 'dashboard', 'normal' ); 		// Site Health
    }
    add_action( 'wp_dashboard_setup', 'fm_remove_dashboard_widgets' );
    
?>