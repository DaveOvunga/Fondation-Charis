<?php

namespace App\Core;

class App {
    public function run() {
        
        require "./routes/web.php";
        require "./routes/static.php";

        // Route the request
        $path = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        Router::route($_SERVER['REQUEST_METHOD'], $path);
    }
}
?>