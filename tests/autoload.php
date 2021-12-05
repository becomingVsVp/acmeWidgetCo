<?php
spl_autoload_register(function ($class_name) {
    include_once '/Users/bbecker/vid1/classes/' . $class_name . '.class.php';
});