<?php

namespace App\Core;

class View {
    public static function render($name, $data = []) {
        $filename = "./view/" . $name . ".view.php";

        if (file_exists($filename)) {
            if (!empty($data)) {
                extract($data);
            }
            require $filename;
        } else {
            self::redirect('miscellaneous/500');
        }
    }

    public static function renderStatic($name, $data = []) {
        $filename = "./" . $name . ".html";

        if (file_exists($filename)) {
            if (!empty($data)) {
                extract($data);
            }
            require $filename;
        } else {
            self::redirect('miscellaneous/500');
        }
    }

    public static function redirect($path) {
        header("Location: " . APP_URL . '/' . $path);
        exit();
    }
}
?>