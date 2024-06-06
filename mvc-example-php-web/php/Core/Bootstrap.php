<?php
/**
* Dresden-IT GmbH
*
* LICENSE
*
* This source file is subject to the license that is bundled
* with this package in the file LICENSE.txt.
*
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send mail
* to info@dresden-it.de, and we send you a copy immediately.
*
* This file is created for php version 8 or higher.
* @author     Heiko Dreßler <Heiko.Dressler@dresden-it.de>
* @copyright  26.05.2023, Dresden-IT GmbH (http://www.dresden-it.de)
* @license    http://www.dresden-it.de Commercial License
* @version    $Id: Bootstrap 26.05.2023 10:40 DresslerHe $
* @link       http://www.dresden-it.de/
* @refactored IT0040 26.05.2023 10:40
*/
namespace Core;



/**
 * prepare the application and load all needed classes
 */
class Bootstrap
{
    public static function initPhp(): void
    {

        \define('CLASS_DIR', \dirname(__FILE__, 2));
        \set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
        \spl_autoload_register();
        ini_set('error_reporting', E_ALL);
        \date_default_timezone_set('Europe/Berlin');
    }

    public static function setApplicationVars() {
        \define('VIEW_DIRECTORY', CLASS_DIR.'/App/Views/');
        \define('TEMPLATE_DIRECTORY', CLASS_DIR.'/App/Templates/');
        \define('DEBUG_MODE', true);
        \define('DEFAULT_TEMPLATE', 'default');
    }
    static function boot(): void
    {
        self::initPhp();
        self::setApplicationVars();
        self::registerConstants();
        self::setRoot();
    }
    /**
     * register constants from urbic.ini
     * @return void
     */
    private static function registerConstants(): void
    {
        $iniFile = \dirname(__FILE__,2) .DIRECTORY_SEPARATOR. 'application.ini';
        if (file_exists($iniFile)){
            $Parsed = parse_ini_file($iniFile) ;
            foreach($Parsed as $Key=>$Value){
                \define($Key, $Value);
            }
        }
    }

    /**
     * setup root path and link basics
     * @return void
     */
    private static function setRoot(): void
    {
        ($_SERVER['SERVER_NAME'] === 'localhost')? \define('ROOT', LOCAL_ROOT): \define('ROOT', PRODUCTION_ROOT);
    }


}