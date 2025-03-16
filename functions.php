
<?php



add_action('wp_enqueue_scripts', 'theme_enqueue_styles');



if (is_user_logged_in()) 
{
add_filter('wp_nav_menu_items', 'menu_admin', 10, 2);
}



function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}


function menu_admin($menuItems, $args) {
    $menuModifie = $menuItems;  
    if ($args->theme_location == 'topbar_menu') {
        $adminUrl = get_admin_url();  
        $menuModifie = $menuItems . "<li><a href='{$adminUrl}'>Admin</a></li>";
    }
    return $menuModifie;
}

?>

