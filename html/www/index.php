<?php

namespace soron2;

// Include autoload
require_once ('autoload.php');

$controller = new BaseController();

$controller->actions();

$controller->render();
