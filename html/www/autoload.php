<?php

// Include controllers
foreach(glob('controller/*.php') as $file){
    require_once $file;
}

// Include models
foreach(glob('model/*.php') as $file){
    require_once $file;
}
