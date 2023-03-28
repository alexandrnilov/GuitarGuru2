<?php
function add_my_css() {
  wp_enqueue_style( 'bootstrap_icon','https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css', array(), null );
 	wp_enqueue_style( 'bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css', array(), null );
}
add_action( 'wp_enqueue_scripts', 'add_my_css' );

function add_my_jquery() {
  wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.6.4.min.js');
  wp_enqueue_script( 'jquery' );
  wp_register_script( 'app', get_stylesheet_directory_uri().'/js/app.js');
  wp_enqueue_script( 'app' );
  wp_localize_script( 'app', 'app_obj', array(
      'url' => get_stylesheet_directory_uri().'/PHP/'
    )
  );
}
function add_my_scripts_to_footer(){
  echo '    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>';
}
add_action( 'wp_enqueue_scripts', 'add_my_jquery' );
add_action( 'wp_footer', 'add_my_scripts_to_footer', 25 );


class Main_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth, $args=null) {
    $output .='<ul class="dropdown-menu dropdown-menu-dark">';
  }
  function end_lvl(&$output, $depth, $args=null) {
    $output .='</ul>';
  }

  function start_el(&$output, $item, $depth, $args=null, $id=0) {
    //print_r($item);
    if ($args->walker->has_children) {
        $output .= '<li class="nav-item dropdown">';
        $output .= '<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">'.$item->title.'</a>';
    }
    else {
      if ($depth == 0) {
        if ($item->title == 'none'){
          $output .= '<li><hr>';
        }
        else if ($item->title == 'log'){
          if (is_user_logged_in()){
            $output .= '<li><a class="nav-link fs-6 d-inline-flex align-items-center text-uppercase p" href="#exitModal" data-bs-toggle="modal" data-bs-target="#exitModal"><i class="bi bi-box-arrow-in-left pe-2 fs-4"></i>Выйти</a>';
          }
          else {
            $output .= '<li>
                          <div>
                            <a class="nav-link fs-6 d-inline-flex align-items-center text-uppercase p" href="#regModal" data-bs-toggle="modal" data-bs-target="#regModal"><i class="bi bi-person-circle pe-2 fs-4"></i>Регистрация</a>
                            <a class="nav-link fs-6 d-inline-flex align-items-center text-uppercase p" href="#logModal" data-bs-toggle="modal" data-bs-target="#logModal"><i class="bi bi-box-arrow-in-right pe-2 fs-4"></i>Войти</a>
                          </div>';
          }
        }
        else {
          $output .= '<li class="nav-item">';
          $output .= '<a class="nav-link" href="' . $item->url . '">';
          $output .= $item->title;
          $output .= '</a>';
        }
      }
      else {
        $output .= '<li>';
        $output .= '<a class="dropdown-item" href="' . $item->url . '">';
        $output .= $item->title;
        $output .= '</a>';
      }
    }
  }

  function end_el(&$output, $depth, $args=null) {
    $output .= '</li>';
  }
}
