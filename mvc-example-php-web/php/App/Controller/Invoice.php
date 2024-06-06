<?php
declare(strict_types=1);
/**
* Dresden-IT GmbH
*
* LICENSE
*
* This source file is subject to the license bundled
* with this package in the file LICENSE.txt.
*
* If you did not receive a copy of the license and are unable to
* get it through the worldwide-web, please send mail
* to info@dresden-it.de, and we send you a copy immediately.
*
* This file is created for php version 8 or higher.
* @author     Heiko Dreßler <Heiko.Dressler@dresden-it.de>
* @copyright  06.06.2024, Dresden-IT GmbH (http://www.dresden-it.de)
* @license    http://www.dresden-it.de Commercial License
* @version    $Id: Invoice 06.06.2024 12:10 DresslerHe $
* @link       http://www.dresden-it.de/
* @build  06.06.2024 12:10
*/
namespace App\Controller;

use Core\Controller;

class Invoice extends Controller
{

    public function index(): void
    {
        // TODO: Implement index() method.
        // Laden der Rechnungen per Sql
        $Invoices = ['123', '456', '789'];
        $this->View->Invoices = $Invoices;
        // dem View geben
        $this->View->render('Invoice/index');
    }
}