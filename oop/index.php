<?php
spl_autoload_register(function($className) {
    $classFilePath = "lib/classes/{$className}.php";
    if(is_file($classFilePath)) {
	require_once($classFilePath);
   }
});

try {
    $dobManager = new DOBManger();
    $dob = '';// a valid dob
    $dobManager->setDOB($dob)->displayAgeInfo();

} catch(Exception $e) {
    echo $e->getMessage();
}
