<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// ini_set('log_errors', 1);
// ini_set('error_log', '../logs/php-error.log');
// // Load configuration files
// foreach (glob("../config/*.php") as $filename) {
//     require $filename;
// }

// // Load core files
// foreach (glob("../core/*.php") as $filename) {
//     require $filename;
// }

// // Autoload classes
// spl_autoload_register(function ($class) {
//     // Convert namespace to file path
//     $file = "../" . str_replace('\\', '/', $class) . '.php';

//     // Check if the file exists before requiring it
//     if (file_exists($file)) {
//         require $file;
//     } else {
//         // Optional: Handle the error or log it
//         error_log("Class file not found: " . $file);
//     }
// });
// // Enable error reporting
// APP_DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);
// // Create and run the application
// $app = new App;
// $app->run();

?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', '../logs/php-error.log');
foreach (glob( __DIR__ ."/app/config/*.php") as $filename) {
    require $filename;
}
foreach (glob( __DIR__ ."/core/*.php") as $filename) {
    require $filename;
}
function myAutoloader($className) {
    // Define the base directory for the application
    $baseDir = __DIR__ . '/';

    // Replace namespace separator with directory separator
    $file = $baseDir . str_replace('\\', '/', $className) . '.php';

    // Debugging output
    // echo "Attempting to load class: <strong>$className</strong><br>";
    // echo "File path: <strong>$file</strong><br>";

    // Check if the file exists
    if (file_exists($file)) {
        require_once $file;
        // echo "Successfully loaded: <strong>$file</strong><br>";
    } else echo "File not found: <strong>$file</strong><br>"; // Indicate if the file is not found
    
}

// Register the autoloader
spl_autoload_register('myAutoloader');
session_start();
// Create and run the application
$app = new App\Core\App();
$app->run();
?>
