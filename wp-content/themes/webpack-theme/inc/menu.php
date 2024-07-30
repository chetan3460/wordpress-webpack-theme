<?php

/*
  =============================================================
  1.0 - Register Menu
  =============================================================
 */

function register_menus()
{
    register_nav_menus(
        array(
            'main-menu' => __('Main Menu'),
            'ham-menu' => __('Ham Menu'),
            'footer-menu_1' => __('Footer menu 1'),
            'footer-menu_2' => __('Footer menu 2'),
            'footer-menu_3' => __('Footer menu 3'),
            'footer-menu_3' => __('Footer menu 3'),
            'footer-menu_4' => __('Footer menu 4'),
        )
    );
}
add_action('init', 'register_menus');



/*
=============================================================
1.1 - Footer Transient
=============================================================
*/

// Common Footer menu for caching  - Transient
function transient_footerMenu($menu_location)
{
    $transient_key = 'transient_footer_menu_' . $menu_location;
    $footer_menu = get_transient($transient_key);
    if (!$footer_menu) {
        $menu_args = array(
            'theme_location' => $menu_location,
            'container' => 'nav',
            'menu_class' => 'flex flex-col grow text-2xl leading-6 text-white whitespace-nowrap  prose prose-a:text-[1.5rem] max-md:prose-a:text-[1.25rem]  prose-a:text-white prose-a:no-underline prose-a:mb-6 max-md:prose-a:mb-4 prose-a:transition-all prose-a:duration-700 [&>a:hover]:opacity-50',
            'echo' => false,
            'walker' => new Walker_Nav_Menu_Custom(),
        );
        $menu = wp_nav_menu($menu_args);
        set_transient($transient_key, $menu, WEEK_IN_SECONDS);
    } else {
        $menu = $footer_menu;
    }
    return $menu;
}

// Clear footer transition when save,delete or update
function clear_footer_menu_transient($menu_id)
{
    // Get the menu location based on the menu ID
    $menu_locations = get_nav_menu_locations();
    $dynamic_menu_location = '';
    foreach ($menu_locations as $location => $id) {
        if ($id == $menu_id) {
            $dynamic_menu_location = $location;
            break;
        }
    }

    if (!empty($dynamic_menu_location)) {
        $transient_key = 'transient_footer_menu_' . $dynamic_menu_location;
        delete_transient($transient_key);
    }
}
add_action('wp_update_nav_menu', 'clear_footer_menu_transient', 10, 2);
add_action('wp_create_nav_menu', 'clear_footer_menu_transient', 10, 2);
add_action('wp_delete_nav_menu', 'clear_footer_menu_transient', 10, 2);

/*
=============================================================
1.2 - Footer Nav Walker
=============================================================
*/

class Walker_Nav_Menu_Custom extends Walker_Nav_Menu
{
    // Start the element output.
    public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
        $attributes  = '';
        !empty($item->attr_title) and $attributes .= ' title="' . esc_attr($item->attr_title) . '"';
        !empty($item->target) and $attributes .= ' target="' . esc_attr($item->target) . '"';
        !empty($item->xfn) and $attributes .= ' rel="' . esc_attr($item->xfn) . '"';
        !empty($item->url) and $attributes .= ' href="' . esc_attr($item->url) . '"';

        $item_output = sprintf(
            '<a%s>%s%s%s</a>',
            $attributes,
            $args->link_before,
            apply_filters('the_title', $item->title, $item->ID),
            $args->link_after
        );

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

/*
=============================================================
1.3- Add custom class to Wp-nav anchor tag
=============================================================
*/

function add_class_on_a_tag($classes, $item, $args)
{
    if (isset($args->add_a_class)) {
        $classes['class'] = $args->add_a_class;
    }
    return $classes;
}

add_filter('nav_menu_link_attributes', 'add_class_on_a_tag', 1, 3);


/*
=============================================================
1.4- Mega Menu structure - Walker
=============================================================
*/

class Mega_Menu_Walker extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = null)
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat($t, $depth);
        $classes = array('sub-menu');

        $class_names = join(' ', apply_filters('nav_menu_submenu_css_class', $classes, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        if ($depth == 0) {
            $menu_heading = get_field('menu_heading', 'option');
            $menu_content = get_field('menu_content', 'option');
            $menu_image = get_field('menu_image', 'option');
            $output .= "{$n}{$indent}<div class=\"mega-menu-wrapper\">{$n}";
            if ($menu_heading || $menu_content || $menu_image) {
                $output .= "<div class=\"menu-content\">";

                if ($menu_heading) {
                    $output .= "<h3>" . htmlspecialchars($menu_heading) . "</h3>";
                }

                if ($menu_content) {
                    $output .= "<p>" . htmlspecialchars($menu_content) . "</p>";
                }

                if ($menu_image) {
                    $output .= "<img src='" . htmlspecialchars($menu_image) . "' alt='test' />";
                }

                $output .= "</div>{$n}";
            }
            $output .= "<div class='menu-list'><ul$class_names>{$n}";
        } else {
            $output .= "{$n}{$indent}<ul$class_names>{$n}";
        }
    }

    function end_lvl(&$output, $depth = 0, $args = null)
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat($t, $depth);

        if ($depth == 0) {
            $output .= "{$indent}</ul>{$n}";
            $output .= "<div class=\"image-hover\"><img src=\"\" alt=\"Hover Image\"></div>{$n}";
            $output .= "</div></div>{$n}";
        } else {
            $output .= "{$indent}</ul>{$n}";
        }
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ($depth) ? str_repeat($t, $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target)     ? $item->target     : '';
        $atts['rel']    = !empty($item->xfn)        ? $item->xfn        : '';
        $atts['href']   = !empty($item->url)        ? $item->url        : '';

        // Add hover image data attribute
        $hover_image = get_field('hover_image', $item);
        if ($hover_image) {
            $atts['data-hover-image'] = esc_url($hover_image);
        }

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after . '';

        // Add arrow span if the item has children
        if (in_array('menu-item-has-children', $classes)) {
            $item_output .= '<span class="icon-arrow-down"></span>';
        }

        $item_output .= '</a>';

        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}


/*
=============================================================
1.5- Ham desktop menu - Walker
=============================================================
*/
class Ham_Walker_Nav_Menu extends Walker_Nav_Menu
{
    // Start Level
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }

    // Start Element
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target)     ? $item->target     : '';
        $atts['rel']    = !empty($item->xfn)        ? $item->xfn        : '';
        $atts['href']   = !empty($item->url)        ? $item->url        : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;

        // Check if the menu item is a custom link
        if ($item->type == 'custom') {
            // Add your custom structure here with the same link and title
            $item_output .= '<div class="custom-link-wrapper">';
            $item_output .= '<a' . $attributes . ' target="_self" class="primary-btn mt-8 mb-4 orange !flex after:!bg-transparent">';
            $item_output .= '<span class="btn-text"><span>' . $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after . '</span></span>';
            $item_output .= '<span class="btn-arrow">';
            $item_output .= '<span><span class="icon-arrow-right"></span></span>';
            $item_output .= '</span>';
            $item_output .= '</a>';
            $item_output .= '</div>';
        } else {
            // Default structure for non-custom links
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</a>';
        }

        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    // End Element
    function end_el(&$output, $item, $depth = 0, $args = array())
    {
        $output .= "</li>\n";
    }

    // End Level
    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}



/*
=============================================================
1.5- Mobile sub menu walker with custom structure
=============================================================
*/

class mobile_menu_Navwalker extends Walker_Nav_Menu {

    // Starts the list before the elements are added.
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }

    // Ends the list of after the elements are added.
    public function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    // Start the element output.
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        $atts = array();
        $atts['title']  = ! empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = ! empty($item->target)     ? $item->target     : '';
        $atts['rel']    = ! empty($item->xfn)        ? $item->xfn        : '';
        $atts['href']   = ! empty($item->url)        ? $item->url        : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;

        $item_output .= '<div class="nav-item">';
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';

        if (in_array('menu-item-has-children', $classes)) {
            $item_output .= '<span class="icon-arrow-down"></span>';
        }

        $item_output .= '</div>';

        if ($depth == 1 && in_array('menu-item-has-children', $classes)) {
            $item_output .= '<div class="sub-nav-wrap">';
            $item_output .= '<button class="back-to flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&amp;.swiper-button-disabled]:pointer-events-none [&amp;.disabled]:pointer-events-none" aria-label="left slide arrow">';
            $item_output .= '<span class="icon-arrow-left text-[0.85rem]"></span>';
            $item_output .= '</button>';
            $item_output .= '<h3>' . apply_filters('the_title', $item->title, $item->ID) . '</h3>';
        }

        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    // End the element output, if needed.
    public function end_el(&$output, $item, $depth = 0, $args = null) {
        if ($depth == 1 && in_array('menu-item-has-children', $item->classes)) {
            $output .= '</div>'; // Close sub-nav-wrap
        }
        $output .= "</li>\n";
    }
}
