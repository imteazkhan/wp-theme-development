<?php
// bootstrap_5_wp_nav_menu_walker
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu {
  private $current_item;
  private $dropdown_menu_alignment_values = [
    'dropdown-menu-start','dropdown-menu-end','dropdown-menu-sm-start',
    'dropdown-menu-sm-end','dropdown-menu-md-start','dropdown-menu-md-end',
    'dropdown-menu-lg-start','dropdown-menu-lg-end','dropdown-menu-xl-start',
    'dropdown-menu-xl-end','dropdown-menu-xxl-start','dropdown-menu-xxl-end'
  ];

  function start_lvl(&$output, $depth = 0, $args = null) {
    $dropdown_menu_class = [];
    foreach ($this->current_item->classes as $class) {
      if (in_array($class, $this->dropdown_menu_alignment_values)) {
        $dropdown_menu_class[] = $class;
      }
    }
    $indent = str_repeat("\t", $depth);
    $submenu = ($depth > 0) ? ' sub-menu' : '';
    $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ", $dropdown_menu_class)) . " depth_$depth\">\n";
  }

  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
    $this->current_item = $item;
    $indent = ($depth) ? str_repeat("\t", $depth) : '';
    $classes = empty($item->classes) ? [] : (array) $item->classes;
    $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
    $classes[] = 'nav-item';
    $classes[] = 'nav-item-' . $item->ID;

    if ($depth && $args->walker->has_children) {
      $classes[] = 'dropdown-menu-end';
    }

    $class_names = ' class="' . esc_attr(join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args))) . '"';
    $id_attr = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
    $id_attr = strlen($id_attr) ? ' id="' . esc_attr($id_attr) . '"' : '';
    $output .= "$indent<li$id_attr$class_names>";

    $atts = [];
    if (!empty($item->attr_title)) { $atts['title'] = $item->attr_title; }
    if (!empty($item->target)) { $atts['target'] = $item->target; }
    if (!empty($item->xfn)) { $atts['rel'] = $item->xfn; }
    if (!empty($item->url)) { $atts['href'] = $item->url; }

    $active = ($item->current || $item->current_item_ancestor) ? ' active' : '';
    $link_class = ($depth > 0) ? 'dropdown-item ' : 'nav-link ';
    $atts['class'] = $link_class . $active;
    if ($args->walker->has_children) {
      $atts['class'] .= ' dropdown-toggle';
      $atts['data-bs-toggle'] = 'dropdown';
      $atts['aria-expanded'] = 'false';
    }

    $attributes = '';
    foreach ($atts as $attr => $value) {
      $attributes .= " $attr=\"" . esc_attr($value) . '"';
    }

    $item_output = $args->before;
    $item_output .= "<a$attributes>";
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;
    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}
?>