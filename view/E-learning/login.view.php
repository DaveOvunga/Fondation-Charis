<?php 
    use App\Core\Helper;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf_token" content="<?php echo Helper::createToken(); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Login Page</title>
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
    </style>
</head>
<body>
    <div class="login-container col-lg-4 col-md-7 col-auto">
        <h2 class="mb-4">Login</h2>

        <div id="responseMessage" class="mt-3 mb-3"></div>

        <form id="loginForm">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission

                // Get form data
                const email = $('#email').val();
                const password = $('#password').val();                
                var csrfToken = document.querySelector('meta[name="csrf_token"]').getAttribute('content');

                // AJAX request
                $.ajax({
                    url: '<?= APP_URL ?>/login', // Replace with your login endpoint
                    type: 'POST',
                    data: {
                        email: email,
                        password: password,
                        csrf_token : csrfToken
                    },
                    success: function(response) {
                        if (response.success && response.redirect) {
                            $('#responseMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                            // Redirect to the login page after a short delay or immediately
                            setTimeout(function() {
                                window.location.href = response.redirect; // Redirect to the login page
                            }, 2000); // Optional delay of 2 seconds
                        }
                        else 
                        {
                            var errorsHtml = '';
                            $.each(response.message, function(index, error) 
                            {
                                errorsHtml += '<div class="alert alert-danger">' + error + '</div>';
                            });
                            // Update the HTML content of the responseMessage element with errors
                            $('#responseMessage').html(errorsHtml);
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#responseMessage').html('<div class="alert alert-danger">An error occurred</div>');
                        console.error("Error fetching data: " + error);
                        console.error('Response Text:', xhr.responseText); // Log the response text for debugging
                    }
                });
            });
        });
    </script>
</body>
</html>