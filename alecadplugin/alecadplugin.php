<?php

/**
 * @package AlecadPlugin
 * 
 * Plugin Name: Alecad Plugin
 * Description: This plugin is made for practise purpose
 * Author: Sifat
 * Version: 1.1.0
 */

if(!defined('ABSPATH')){
    die;
}

class AlecadPlugin{

    public $plugin;

    function __construct() {
        $this->plugin = plugin_basename( __FILE__ );
    }

    function register(){

        add_action('admin_menu', array($this, 'add_admin_pages'));

        add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link') );
    }

    function settings_link($links){
        $settings_link = '<a href="admin.php?page=alecad_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }

    function add_admin_pages(){
        add_menu_page('Alecad Plugin', 'Alecade Plugin', 'manage_options', 'alecad_plugin', array($this, 'admin_index'),'dashicons-columns', 112 );
    }

    function admin_index(){
        require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
    }


    function acivate(){
        flush_rewrite_rules();
    }

    function deactivate(){
        flush_rewrite_rules();
    }

    function custom_post_type(){
        register_post_type('book', ['public' => true, 'label'=> 'Books']);
    }
}

if( class_exists( 'AlecadPlugin' )){
    $alicadePlugin = new AlecadPlugin();
    $alicadePlugin->register();
}

// activation
register_activation_hook(__FILE__, array($alicadePlugin, 'acivate'));

//deactivation
register_deactivation_hook(__FILE__, array($alicadePlugin, 'deactivate'));

?>