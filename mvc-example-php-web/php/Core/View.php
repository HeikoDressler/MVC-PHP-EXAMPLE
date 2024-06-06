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
 * @copyright  16.11.2021 , Dresden-IT GmbH (http://www.dresden-it.de)
 * @license    http://www.dresden-it.de Commercial License
 * @version    $Id: View 12:48 DresslerHe $
 * @link       http://www.dresden-it.de/
 *
 */

namespace Core;

/**
 * view of mvc pattern
 */
class View
{

    private $_dynamicMembers = [];


    protected $ViewTemplate = "default.tpl";

    private $specialMethodName = '';

    /**
     * create the view
     */
    public function __construct()
    {
    }

    /**
     * render the Template and the view Content File
     * @param string $Name
     */
    public function render(string $Name): void
    {
        $this->specialMethodName = $Name;
        include($this->ViewTemplate);
    }

    public function getSpecialContent()
    {
        $ViewFile = VIEW_DIRECTORY . $this->specialMethodName . '.phtml';
        if (file_exists($ViewFile)) {
            include $ViewFile;
        }
    }

    public function setTemplate($aViewTemplate)
    {
        $this->ViewTemplate = TEMPLATE_DIRECTORY . $aViewTemplate . '.ptpl';
    }

    public function __set($MemberName, $Value)
    {
        $this->_dynamicMembers[$MemberName] = $Value;
    }

    public function __get($MemberName)
    {
        $Default = '';
        if (defined('DEBUG_MODE')) {
            $Default = $MemberName.'<br/>';
        }
        return $this->_dynamicMembers[$MemberName] ?? $Default;
    }

    public function __isset($MemberName)
    {
        return isset($this->_dynamicMembers[$MemberName]);
    }
}