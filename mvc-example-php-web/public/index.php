<?php
include(dirname(__DIR__, 1).'/php/Core/Bootstrap.php');
// laden der Umgebung

use Core\Application;
use Core\Bootstrap;

Bootstrap::boot();
$Application = new Application();
$Application->run();

?>