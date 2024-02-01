<?php 
/**
 * Trigger this file on plugin unistall
 * 
 * @package AlecadPlugin
 */

 if(! defined('WP_UNINSTALL_PLUGIN')){
    die;
 }

 //Clear Database stored
 $books = get_posts( array ('post_type'=> 'book', 'numberposts'=> -1));

 foreach($books as $book){
    wp_delete_post($book->ID, true);
 }