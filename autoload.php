<?php

// Define the autoloader function
function my_autoloader($class) {
    
    $baseNamespace = 'core\\model\\class';  // The namespace prefix
 
    if (strpos($class, $baseNamespace) === 0) {
        
        $relativeClass = substr($class, strlen($baseNamespace));

        $relativeClass = str_replace('\\', '/', $relativeClass);

        $classFile = __DIR__ . '/core/model/class/' . $relativeClass . '.class.php';  // Assuming classes are inside the 'src' directory

        if (file_exists($classFile)) {
            require_once $classFile;
        }
    }
    $baseNamespace = 'core\\controler\\class';
    
    if (strpos($class, $baseNamespace) === 0) {
        
        $relativeClass = substr($class, strlen($baseNamespace));
        
        $relativeClass = str_replace('\\', '/', $relativeClass);
       
        $classFile = __DIR__ . '/core/controler/class/' . $relativeClass . '.class.php'; 

        if (file_exists($classFile)) {
            require_once $classFile;  
        }else{
            echo"classe não encontada";
        }
    } 
}



spl_autoload_register('my_autoloader');
