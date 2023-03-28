<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
if (isset($_POST['action']) && $_POST['action'] != ''){
  $action = filter_var(trim($_POST['action']),FILTER_SANITIZE_STRING);
  switch ($action) {
    case 'userReg':
      if (isset($_POST['email']) && $_POST['email'] != '' && isset($_POST['pass']) && $_POST['pass'] != '' && isset($_POST['pass2']) && $_POST['pass2'] != ''){
        $email = $_POST['email'];
        if (filter_var($email,FILTER_VALIDATE_EMAIL) == true){
          $email = filter_var(trim($email),FILTER_SANITIZE_STRING);
        }
        else die(json_encode(array("result" => null,"message" => "Некорректный Email!")));
        if ($_POST['pass'] == $_POST['pass2']) $pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
        else die(json_encode(array("result" => null,"message" => "Пароли не совпадают!")));
        if(strlen($pass)< 5) die(json_encode(array("result" => null,"message" => "Пароль меньше 5 символов!")));
        if(!preg_match("/([0-9]+)/", $pass)) die(json_encode(array("result" => null,"message" => "Не хватает цифр!")));
        if(!preg_match("/([a-z]+)/", $pass)) die(json_encode(array("result" => null,"message" => "Не хватает маленьких букв!")));
        if(!preg_match("/([A-Z]+)/", $pass)) die(json_encode(array("result" => null,"message" => "Не хватает больших букв!")));
        userReg($email,$pass);
      }
      else die(json_encode(array("result" => null,"message" => "Заполните пустые поля!")));
    break;

    case 'userLog':
      if (isset($_POST['email']) && $_POST['email'] != '' && isset($_POST['pass']) && $_POST['pass'] != ''){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        if (filter_var($email,FILTER_VALIDATE_EMAIL) == true){
          $email = filter_var(trim($email),FILTER_SANITIZE_STRING);
        }
        else die(json_encode(array("result" => null,"message" => "Некорректный Email!")));
        $pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
        userLog($email,$pass);
      }
      else die(json_encode(array("result" => null,"message" => "Заполните пустые поля!")));
    break;

    case 'userExit':
      $user_id = get_current_user_id();
      wp_destroy_current_session();
      wp_clear_auth_cookie();
      wp_set_current_user( 0 );
      do_action( 'wp_logout', $user_id );
      //die(json_encode(array("result" => 1,"message" => "Вы вышли из профиля")));
    break;
  }
}
else die(json_encode(array("result" => null,"message" => "Что то пошло не так!")));

function userReg($email,$pass){
  $userdata = array(
        'user_pass' => $pass,
        'user_login' => stristr($email, '@', true),
        'user_email' => $email,
        'rich_editing' => false,
        'show_admin_bar_front' => 'false'
    );

  $user_id = wp_insert_user($userdata);

  if (is_wp_error($user_id)) {
    die(json_encode(array("result" => null,"message" => $user_id->get_error_message())));
  }
  else{
    $credentials = array();
    $credentials['user_login'] = stristr($email, '@', true);
    $credentials['user_password'] = $pass;
    $credentials['remember'] = true;
    $user = wp_signon( $credentials, false );
    if ( is_wp_error($user) ) {
      die(json_encode(array("result" => null,"message" => $user->get_error_message())));
    }
    else die(json_encode(array("result" => 1,"message" => "Регистрация прошла успешно")));
  }
}

function userLog($email,$pass){
  $credentials = array();
  $credentials['user_login'] = stristr($email, '@', true);
  $credentials['user_password'] = $pass;
  $credentials['remember'] = true;

  $user = wp_signon( $credentials, false );
  if ( is_wp_error($user) ) {
    die(json_encode(array("result" => null,"message" => $user->get_error_message())));
  }
  else die(json_encode(array("result" => 1,"message" => "Вы авторизовались")));
}
