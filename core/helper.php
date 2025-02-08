<?php

namespace App\Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
    public static function encode($data) {
        $key = hash('sha256', SECRET_KEY, true);  // Generate 256-bit key
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);  // Generate 128-bit IV (first 16 bytes)
        
        // Encrypt the data using AES-256-CBC
        $encryptedData = openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv);
        
        // Encode the encrypted data to base64 to make it URL-safe
        return base64_encode($encryptedData);
    }
    
    public static function decode($encodedData) {
        $key = hash('sha256', SECRET_KEY, true);  // Generate 256-bit key
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);  // Generate 128-bit IV (first 16 bytes)
        
        // Decode the data from base64
        $decodedData = base64_decode($encodedData);
        
        // Decrypt the data using AES-256-CBC
        return openssl_decrypt($decodedData, 'AES-256-CBC', $key, 0, $iv);
    }

    public static function decodeIds($encodedData)
    {
        // Decode the base64 encoded string
        $decodedData = base64_decode($encodedData);
        
        // Split the decoded string by the delimiter (e.g., '-')
        return explode('-', $decodedData);
    }

    public static function createToken() {
		$seed = self::urlSafeEncode(random_bytes(8));
		$t = time();
		$hash = self::urlSafeEncode(hash_hmac('sha256', session_id() . $seed . $t, CSRF_TOKEN_SECRET, true));
		return self::urlSafeEncode($hash . '|' . $seed . '|' . $t);
	}

	public static function validateToken($token) {
		$parts = explode('|', self::urlSafeDecode($token));
		if(count($parts) === 3) {
			$hash = hash_hmac('sha256', session_id() . $parts[1] . $parts[2], CSRF_TOKEN_SECRET, true);
			if(hash_equals($hash, self::urlSafeDecode($parts[0]))) {
				return true;
			}
		}
		return false;
	}

	public static function urlSafeEncode($m) {
		return rtrim(strtr(base64_encode($m), '+/', '-_'), '=');
	}
	public static function urlSafeDecode($m) {
		return base64_decode(strtr($m, '-_', '+/'));
	}

    public static function generateVerificationCode($length = 5) {
        $min = pow(10, $length - 1); // Minimum value (10000)
        $max = pow(10, $length) - 1; // Maximum value (99999)
    
        return random_int($min, $max); // Securely generate a random integer
    }

    public static function sendVerificationEmail($to, $toName, $subj, $msg,$link) {
        $mail = new PHPMailer(true);
    
        try {
            $mail->isSMTP();                                    // Set mailer to use SMTP
            $mail->Host       = SMTP_HOST;                // Set the SMTP server to Gmail
            $mail->SMTPAuth   = true;                            // Enable SMTP authentication
            $mail->Username   = SMTP_USERNAME;             // Your Gmail address
            $mail->Password   = SMTP_PASSWORD;                       // Your Gmail password (use App Password if 2FA enabled)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable STARTTLS encryption
            $mail->Port       = SMTP_PORT;                             // TCP port for Gmail
    
            // Recipients
            $mail->setFrom(SMTP_FROM, SMTP_FROM_NAME);     // Sender's email and name
            $mail->addAddress($to, $toName);
    
            // Content
            $mail->isHTML(true);
            $mail->Subject = $subj;
            $mail->Body    = '
            <!DOCTYPE html>
            <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <title>Email Verification</title>
                    <style>
                        /* Resetting some default browser styles */
                        * {
                            margin: 0;
                            padding: 0;
                            box-sizing: border-box;
                        }

                        body {
                            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
                            background-color: #f5f5f7;
                            padding: 0;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            min-height: 100vh;
                        }

                        .email-container {
                            width: 100%;
                            max-width: 600px;
                            background-color: #ffffff;
                            margin: 20px;
                            padding: 30px;
                            border-radius: 12px;
                            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                            text-align: center;
                            transition: transform 0.3s ease-in-out;
                        }

                        .email-container:hover {
                            transform: scale(1.02);
                        }

                        .email-header h1 {
                            font-size: 28px;
                            color: #333;
                            margin-bottom: 10px;
                        }

                        .email-body {
                            font-size: 16px;
                            color: #555;
                            line-height: 1.6;
                            margin-top: 20px;
                        }

                        .verification-container {
                            margin-top: 20px;
                        }

                        .verification-code {
                            font-size: 28px;
                            font-weight: bold;
                            color: #007aff;
                            padding: 12px;
                            background-color: #f2f2f7;
                            border-radius: 8px;
                            display: inline-block;
                            margin-bottom: 10px;
                        }

                        .copy-btn {
                            padding: 8px 16px;
                            background-color: #007aff;
                            color: white;
                            border: none;
                            border-radius: 4px;
                            cursor: pointer;
                            font-size: 14px;
                            margin-left: 10px;
                            transition: background-color 0.3s;
                        }

                        .copy-btn:hover {
                            background-color: #0056b3;
                        }

                        .copy-feedback {
                            font-size: 14px;
                            margin-top: 10px;
                            color: #999;
                            font-style: italic;
                        }

                        .email-footer {
                            margin-top: 30px;
                            font-size: 14px;
                            color: #999;
                        }

                        @media (max-width: 600px) {
                            .email-container {
                                padding: 20px;
                            }

                            .verification-code {
                                font-size: 24px;
                                padding: 10px;
                            }

                            .copy-btn {
                                font-size: 12px;
                                padding: 6px 12px;
                            }
                        }
                    </style>
                </head>

                <body>
                    <div class="email-container">
                        <header class="email-header">
                            <h1>Email Verification</h1>
                        </header>
                        <main class="email-body">
                            <p>Hello, Axel!</p>
                            <p>Please use the following verification code to complete your login:</p>
                            <div class="verification-container">
                                <p class="verification-code" id="verification-code">'.$msg.'</p>
                            </div>
                            <a href="'.APP_URL.'/'.$link.'">Validate email</a>
                            <p>If you didn’t request this, please ignore this email.</p>
                        </main>
                        <footer class="email-footer">
                            <p>&copy; <span id="year"></span> Your Company. All rights reserved.</p>
                        </footer>
                    </div>

                    <script>
                        // Dynamically set the current year in the footer
                        document.getElementById("year").textContent = new Date().getFullYear();
                    </script>
                </body>

            </html>';
    
            $mail->send();
            return true;
        } 
        catch(Exception $e) {
            return false;
        }
    }
}
?>