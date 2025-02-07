<?php

use App\Core\Helper;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf_token" content="<?php echo Helper::createToken(); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .btn-primary {
            width: 100%;
        }

        .form-title {
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .btn-link {
            padding: 0;
            font-size: 0.875rem;
            text-align: center;
            display: block;
            margin-top: 10px;
        }
    </style>
</head>



<div class="form-container">
    <h2 class="form-title">Verify Your Email</h2>
    <div id="responseMessage" class="mt-3 mb-3"></div>
    <form id="emailVerificationForm">
        <div class="form-group">
            <label for="verificationCode">Enter the code sent to your email</label>
            <input type="text" class="form-control" id="verificationCode" placeholder="Verification code" required>
        </div>
        <button type="submit" class="btn btn-primary">Verify Code</button>
    </form>
    <form id="emailAgain" class="d-flex justify-content-center mt-2">
        <button type="submit" class="btn">Resend Code</button>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#emailVerificationForm').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Get form data
            const verificationCode = $('#verificationCode').val();
            var csrfToken = document.querySelector('meta[name="csrf_token"]').getAttribute('content');
            const url = window.location.href;
            const id = String(url.substring(url.lastIndexOf('/') + 1));

            // AJAX request
            $.ajax({
                url: '<?= APP_URL ?>/emailVerification', // Replace with your login endpoint
                type: 'POST',
                data: {
                    code: id,
                    verificationCode: verificationCode,
                    csrf_token: csrfToken
                },
                success: function(response) {
                    if (response.success && response.redirect) {
                        $('#responseMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                        // Redirect to the login page after a short delay or immediately
                        setTimeout(function() {
                            window.location.href = response.redirect; // Redirect to the login page
                        }, 2000); // Optional delay of 2 seconds
                    } else {
                        var errorsHtml = '';
                        $.each(response.message, function(index, error) {
                            errorsHtml += '<div class="alert alert-danger">' + error + '</div>';
                        });
                        // Update the HTML content of the responseMessage element with errors
                        $('#responseMessage').html(errorsHtml);
                    }
                },
                error: function(xhr) {
                    $('#responseMessage').html('<div class="alert alert-danger">An error occurred: ' + xhr.responseText + '</div>');
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#emailAgain').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Get form data
            var csrfToken = document.querySelector('meta[name="csrf_token"]').getAttribute('content');
            const url = window.location.href;
            const id = String(url.substring(url.lastIndexOf('/') + 1));
            console.log("id is",id)
            // AJAX request
            $.ajax({
                url: '<?= APP_URL ?>/verificationEmail', // Replace with your login endpoint
                type: 'POST',
                data: {
                    code: id,
                    csrf_token: csrfToken
                },
                success: function(response) {
                    if (response.success) {
                        $('#responseMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                        // Redirect to the login page after a short delay or immediately
                        if (response.redirect != "") {
                            setTimeout(function() {

                                window.location.href = response.redirect; // Redirect to the login page

                            }, 2000); // Optional delay of 2 seconds
                        } // Optional delay of 2 seconds
                    } else {
                        var errorsHtml = '';
                        $.each(response.message, function(index, error) {
                            errorsHtml += '<div class="alert alert-danger">' + error + '</div>';
                        });
                        // Update the HTML content of the responseMessage element with errors
                        $('#responseMessage').html(errorsHtml);
                    }
                },
                error: function(xhr) {
                    $('#responseMessage').html('<div class="alert alert-danger">An error occurred: ' + xhr.responseText + '</div>');
                }
            });
        });
    });
</script>

</body>

</html>