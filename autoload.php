<?php

// Define the autoloader function
function my_autoloader($class) {
    
    $baseNamespace = 'app\\models\\class';  // The namespace prefix
 
    if (strpos($class, $baseNamespace) === 0) {
        
        $relativeClass = substr($class, strlen($baseNamespace));

        $relativeClass = str_replace('\\', '/', $relativeClass);

        $classFile = __DIR__ . '/app/models/class/' . $relativeClass . '.class.php';  // Assuming classes are inside the 'src' directory

        if (file_exists($classFile)) {
            require_once $classFile;
        }
    }
    $baseNamespace = 'app\\controllers\\class';
    
    if (strpos($class, $baseNamespace) === 0) {
        
        $relativeClass = substr($class, strlen($baseNamespace));
        
        $relativeClass = str_replace('\\', '/', $relativeClass);
       
        $classFile = __DIR__ . '/app/controllers/class/' . $relativeClass . '.class.php'; 

        if (file_exists($classFile)) {
            require_once $classFile;  
        }else{
            echo"classe não encontada";
        }
    } 
}


spl_autoload_register('my_autoloader');