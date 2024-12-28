<?php

namespace App\Core;

class Helper {

    public static function parseText($text) {
        // Split the text into lines
        $lines = explode("\n", trim($text));
        
        // Initialize an array to hold the parsed data
        $parsedData = [];
        
        // Variable to hold the current title (if applicable)
        $currentTitle = '';
        $description = '';
    
        // Loop through each line to extract key points
        foreach ($lines as $line) {
            // Trim the line to remove excess whitespace
            $line = trim($line);
            
            // Check if the line contains a title followed by a colon
            if (strpos($line, ':') !== false) {
                // If there is a current title, store it before moving to the new one
                if ($currentTitle) {
                    $parsedData[] = ['title' => trim($currentTitle), 'description' => trim($description)];
                }
                
                // Split the line into title and description
                list($currentTitle, $description) = explode(':', $line, 2);
                $description = trim($description);
            } elseif ($currentTitle) {
                // If we are still on the same title, append the description
                $description .= " $line"; // Append the line to the current description
            }
        }
    
        // Don't forget to add the last title and its description
        if ($currentTitle) {
            $parsedData[] = ['title' => trim($currentTitle), 'description' => trim($description)];
        }
    
        return $parsedData;
    }
    public static function objectiveCard($content) {

        $content = self::parseText($content); 
    
        // Convert content array to properly formatted HTML
        $objectiveCard = ' 
                                    
                                    <ul class="list-group">';
        foreach ($content as $item) {
            $objectiveCard .= "<li class='list-group-item border-0 bg-dark text-white px-0 px-md-3'>
                                <i class='fas fa-check pe-2 text-primary'></i>
                                <strong>$item[title]</strong>
                            </li>";
        }
        $objectiveCard .="</ul>";
        return $objectiveCard;
    }

    public static function prerequiseCard($content) {

        $content = self::parseText($content); 
    
        // Convert content array to properly formatted HTML
        $objectiveCard = ' 
                                    
                                    <ul class="list-group">';
        foreach ($content as $item) {
            $objectiveCard .= "<li class='list-group-item border-0 bg-dark text-white px-0 px-md-3'>
                                <i class='fa-solid fa-bullseye pe-2 text-success'></i>
                                <strong>$item[title]</strong>
                            </li>";
        }
        $objectiveCard .="</ul>";
        return $objectiveCard;
    }

    public static function generateChapterCard($parsedData) {
        // Initialize card content
        $parsedData = self::parseText($parsedData); 
        $cardContent = '';

        // Loop through parsed data to construct the card content
        foreach ($parsedData as $item) {
            $cardContent .= "<h6 class=\"text-gray-600 text-sm mt-4\">{$item['title']} :</h6>";
            $cardContent .= "<p class=\"mt-2\">{$item['description']}</p>";
        }

        // Construct the complete card HTML
        return "
                $cardContent";
    }

    public static function encodeIds($idCourse, $idLesson)
    {
        // Combine the course ID and lesson ID into a string
        $combinedData = $idCourse . '-' . $idLesson;
        
        // Encode the combined data using base64 encoding
        return base64_encode($combinedData);
    }
    
    public static function decodeIds($encodedData)
    {
        // Decode the base64 encoded string
        $decodedData = base64_decode($encodedData);
        
        // Split the decoded string by the delimiter (e.g., '-')
        return explode('-', $decodedData);
    }    
}
?>