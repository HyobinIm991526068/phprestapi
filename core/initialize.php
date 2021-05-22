<?php

    //checking if directory separator is defined
    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
    
    //check if site root is defined
    defined('SITE_ROOT') ? null : define('SITE_ROOT', DS.'xampp' .DS.'htdocs' .DS. 'phprest');

    //define include path as the site root which is xampp/mysql/phprest/includes
    defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT.DS.'includes');

    //define include path as the site root which is xampp/mysql/phprest/core
    defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT.DS.'core');

    //load the config file first
    require_once(INC_PATH.DS.'config.php');

    //core classes
    require_once(CORE_PATH.DS.'post.php');
    require_once(CORE_PATH.DS.'category.php');

?>