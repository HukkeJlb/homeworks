<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'homework9');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'E%So,y)>nNvbT=bWt,tY8P}e0%9X.*y=OpQ{_SrE>/g6*}Biy3,NAT(X4siAb|rY');
define('SECURE_AUTH_KEY',  'i3AKgBJ(O&D`G#EDCBmtwxv1Y#oLQY_`0[r|zSw(b1YWTWwnWEZ0c82>x+~ z:ub');
define('LOGGED_IN_KEY',    'KTu] sq LXI_:uN)fa/%PV?gC+jQ5&qq#+ERj6$W:[rqlE7yi.ZWE;aasId/U c)');
define('NONCE_KEY',        ',X;!T,u>Wkh0q.KBt$;p4Ok.%&hfuj1T0cZq$8fGSz%;lHyi**!?/|}R%)4 jEe;');
define('AUTH_SALT',        '97Zcq+>&}w&H3HDR[,:;YH;289M0)E=55j#K.V/~D`4#(,.OCWBNVdQWBL;j U3:');
define('SECURE_AUTH_SALT', 'zeLx0,k&R](R%Lx9cRdr]vWZ`fZP!o)9np)lDPie$]X l|MBY5Xrg^4+0aA(PXOF');
define('LOGGED_IN_SALT',   'p<md{ATVkiH#Y62kfHE0Z]HQc,>#yd_I!XW`z#B$je<7:nfyJ.Ldd(g~A0~vRo3&');
define('NONCE_SALT',       '%2&a4g%#dghi!fTG>Ps3SKzg1bC69Mb(gWj1(qG`-.Y>4)RMh4>oZYBvcSTHZ x-');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'ls_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
