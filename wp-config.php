<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wordpress_db' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'AD?h,.WMycsoL__70!$iuG)JDA4noaLEd <{z6xbU`*$l9/,U?{m.>0M%1r*[_8Y' );
define( 'SECURE_AUTH_KEY',  ' V$sXRT,^D{w)K$N^:.BdDc Jz%w67hH&Erp=2Rzrquq-O#<X,%]CHORB&:EoJJM' );
define( 'LOGGED_IN_KEY',    'R#r<:fifW]05cL,E%%E>I%f 9I6LaNoiQ)+zbfeREep7uixE7k1#Y.MM2v)u@<[W' );
define( 'NONCE_KEY',        'R)w9V[cgagR^F7Ac5{tgBsB#/20S]];si|MiQZfnH+j4gtos+z|G]0tC]13I)d{9' );
define( 'AUTH_SALT',        'a ,{il4m[hX9NTw#cSV,cb8WPpQQ=W4_).NtT,`1C1s/8cx|OMr,HjrxyE7X&}i7' );
define( 'SECURE_AUTH_SALT', 'a#;skm8?8cdq(#Uep]g)J}fop;n8#b|p[OKkDLYMsrOqmtysHT)fDI#APAZbERwr' );
define( 'LOGGED_IN_SALT',   'kRC`K c8[M:Ip^$`at]g^m;0!3okU0ASg%hPP*@F(4.VR|FGoK5*{C+CYR#du@+]' );
define( 'NONCE_SALT',       '3c#4YA&i46T xQ-V48{v|~T>VoR2-+#2GP7f:e,L2m;n[#M%AG?_>u+J])%[T,ri' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
