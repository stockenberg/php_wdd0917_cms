<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 20.06.18
 * Time: 11:52
 */

namespace sae\app\helpers;


use sae\app\App;
use sae\app\configs\PageAction;

class Route
{

    public static $whitelist = ['home', 'about', 'contact', 'gallery', 'login', 'register', "404", "edit-users"];

    /**
     * Gets a Page parameter, Classname and Action
     * If Classname and Action are set, then the Class will be instanciated.
     * If the action is set, the method of the given class will be executed.
     * If the return is not null, the result of the action will be placed in App::$data
     * @param $get
     * @param null $classname
     * @param null $action
     */
    public static function get($get, $classname = null,  $action = null)
    {
        if (isset($get)) {
            if (in_array($get, self::$whitelist)) {
                if ($action !== null && $classname !== null) {
                    if(in_array($_SESSION['role'] ?? '' , $action['allowed'])
                        || empty($action['allowed'])){

                        $classObj = new $classname();
                        $func = $action['method'];
                        $return = $classObj->$func();

                        if(!is_null($return)){
                            App::$data = $return;
                        }
                    }else{
                        StatusLog::write('auth_failed', AUTH_NOT_ALLOWED);
                    }
                }
            }
        }
    }

    /**
     * Checks if the given GET-Parameter is in the Whitelist,
     * checks if File Exists, return valid page string
     * @return string
     */
    public static function validPage(): string
    {
        if (isset($_GET['p'])) {
            if (in_array($_GET['p'], self::$whitelist)) {
                if (file_exists('pages/' . $_GET['p'] . '.php')) {
                    return $_GET['p'];
                }
                return '404';
            }
        }
        return 'home';
    }

    public static function post()
    {
        
    }

}