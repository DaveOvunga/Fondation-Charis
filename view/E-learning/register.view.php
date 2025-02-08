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
    <!-- <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style> -->

    
    <style>
        :root {
    --charis-blue: #0066cc;    /* Bleu de Charis */
    --charis-red: #b80c31;     /* Rouge de Charis */
}
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}

body {
    /* Remplacer le gradient existant */
    background: linear-gradient(-45deg, var(--charis-blue), #4d94ff, var(--charis-blue), #4d94ff);
    background-size: 400% 400%;
    animation: gradient 15s ease infinite;
}

@keyframes gradient {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

.login-container {
    width: 100%;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(0, 0, 0, 0.4);
    backdrop-filter: blur(10px);
}

.login-box {
    background: rgba(255, 255, 255, 0.1);
    padding: 2rem;
    border-radius: 15px;
    width: 90%;
    max-width: 400px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transform: translateY(20px);
    opacity: 0;
    animation: slideUp 0.5s ease forwards;
}

@keyframes slideUp {
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.animate-title {
    color: white;
    text-align: center;
    margin-bottom: 2rem;
    font-size: 2rem;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    animation: fadeIn 1s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

.input-group {
    position: relative;
    margin-bottom: 2rem;
}

.input-group input {
    width: 100%;
    padding: 15px;
    border: none;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 8px;
    color: white;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.input-group label {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: rgba(255, 255, 255, 0.7);
    pointer-events: none;
    transition: all 0.3s ease;
}

.input-group input:focus + .input-line + label,
.input-group input:valid + .input-line + label {
    top: -5px;
    left: 5px;
    font-size: 0.8rem;
    color: white;
}

.input-line {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(to right, var(--charis-blue), var(--charis-red));
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.input-group input:focus + .input-line {
    transform: scaleX(1);
}

button {
    width: 100%;
    padding: 15px;
    border: none;
    border-radius: 8px;
    background: var(--charis-red);
    color: white;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

button span {
    position: relative;
    z-index: 1;
}


.ripple {
    position: absolute;
    background: rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    transform: scale(0);
    animation: ripple 0.6s linear;
    pointer-events: none;
}

@keyframes ripple {
    to {
        transform: scale(4);
        opacity: 0;
    }
}

button:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(184, 12, 49, 0.3);
    background: #d1324f;
}

/* Responsive */
@media (max-width: 480px) {
    .login-box {
        padding: 1.5rem;
    }

    .animate-title {
        font-size: 1.5rem;
    }

    .input-group input {
        padding: 12px;
    }
}

/* Animation pour le message de réponse */
/* ... autres styles existants ... */

/* Styles pour le message de réponse */
#responseMessage {
    color: white;
    text-align: center;
    padding: 10px;
    margin: 10px 0;
    border-radius: 8px;
    font-size: 0.9rem;
    opacity: 0;
    transform: translateY(-10px);
    transition: all 0.3s ease;
}

#responseMessage.show {
    opacity: 1;
    transform: translateY(0);
}

#responseMessage.error {
    background: rgba(184, 12, 49, 0.2);
    border: 1px solid rgba(184, 12, 49, 0.3);
    backdrop-filter: blur(5px);
}

#responseMessage.success {
    background: rgba(0, 102, 204, 0.2);
    border: 1px solid rgba(0, 102, 204, 0.3);
    backdrop-filter: blur(5px);
}
/* Divider */
.divider {
    text-align: center;
    margin: 1.5rem 0;
    position: relative;
}

.divider::before,
.divider::after {
    content: '';
    position: absolute;
    top: 50%;
    width: 45%;
    height: 1px;
    background: rgba(255, 255, 255, 0.2);
}

.divider::before { left: 0; }
.divider::after { right: 0; }

.divider span {
    color: rgba(255, 255, 255, 0.7);
    background: transparent;
    padding: 0 10px;
}

/* Options du formulaire */
.form-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
}

.remember-me {
    display: flex;
    align-items: center;
    gap: 8px;
    color: rgba(255, 255, 255, 0.7);
}

.remember-me input[type="checkbox"] {
    width: 16px;
    height: 16px;
    accent-color: var(--charis-red);
}

.forgot-password {
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    font-size: 0.9rem;
    transition: color 0.3s ease;
}

.forgot-password:hover {
    color: white;
}

/* Toggle mot de passe */
/* Styles pour l'icône de l'œil */
.password-toggle {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: rgba(255, 255, 255, 0.7);
    cursor: pointer;
    transition: all 0.3s ease;
    padding: 5px;
    z-index: 2;
}

.password-toggle:hover {
    color: white;
    transform: translateY(-50%) scale(1.1);
}

.password-toggle.active {
    color: #b80c31;
}

/* Animation pour l'icône */
@keyframes eyeBlink {
    0% { transform: translateY(-50%) scaleY(1); }
    50% { transform: translateY(-50%) scaleY(0.1); }
    100% { transform: translateY(-50%) scaleY(1); }
}

.password-toggle.blink {
    animation: eyeBlink 0.2s ease;
}

/* Lien d'inscription */
.register-link {
    text-align: center;
    margin-top: 1.5rem;
    color: rgba(255, 255, 255, 0.7);
}

.register-link a {
    color: white;
    text-decoration: none;
    font-weight: 500;
    transition: opacity 0.3s ease;
}

.register-link a:hover {
    opacity: 0.8;
}

/* Responsive adjustments */
@media (max-width: 480px) {
    .social-login {
        flex-direction: column;
    }

    .form-options {
        flex-direction: column;
        gap: 1rem;
        align-items: flex-start;
    }
}
h1{
    text-align: center;
    font-weight: bold;
    font-size: 25px;
}

.checkbox-group {
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 10px;
}

.checkbox-group input[type="checkbox"] {
    width: 18px;
    height: 18px;
    accent-color: #b80c31;
}

.checkbox-group label {
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.9rem;
}


    </style>
</head>
<body>
    <!-- <div class="container-fluid justify-content-center d-flex align-items-center">
        <div class="login-container col-md-7 col-auto">
            <h2>Register</h2>

            <div id="responseMessage" class="mt-3 mb-3"></div>

            <form id="loginForm">
            <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="username" placeholder="Name"  pattern="[A-Za-z0-9 ]+" required>
                </div>

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" required>
                </div>

                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" placeholder="Confirm Password" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                <div class="text-center mt-3">
                    <a href="#">Forgot password?</a>
                </div>
            </form>
        </div>
    </div> -->

    <div class="login-container">
    <div class="login-box">
                    <a href="./E-learning/index.html" >
                        <h1 class="text-primary mb-0">fondation <span style="color: #b80c31;">charis</span></h1>
                        
                    </a>
        <h2 class="animate-title">Inscription</h2>
       
        <div id="responseMessage" class="mt-3 mb-3"></div>

        <!-- Boutons de connexion sociale -->

        <form id="loginForm">
            <!-- Première rangée : Nom et Email -->
<div class="row mb-3">
    <div class="col-md-6">
        <div class="input-group">
            <input type="text" class="form-control" id="username" pattern="[A-Za-z0-9 ]+" required>
            <span class="input-line"></span>
            <label>Nom</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="input-group">
            <input type="email" class="form-control" id="email" required>
            <span class="input-line"></span>
            <label>Email</label>
        </div>
    </div>
</div>

<!-- Deuxième rangée : Password et Confirm Password -->
<div class="row mb-3">
    <div class="col-md-6">
        <div class="input-group">
            <input type="password" class="form-control" id="password" required>
            <span class="input-line"></span>
            <label>Password</label>
            <span class="password-toggle" onclick="togglePassword(this)">
                <i class="fa-regular fa-eye"></i>
            </span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="input-group">
            <input type="password" class="form-control" id="confirm-password" required>
            <span class="input-line"></span>
            <label>Confirm Password</label>
            <span class="password-toggle" onclick="togglePassword(this)">
                <i class="fa-regular fa-eye"></i>
            </span>
        </div>
    </div>
</div>

<div class="checkbox-group">
                <input type="checkbox" id="terms" required>
                <label for="terms">J'accepte les conditions d'utilisation</label>
            </div>

            <button type="submit" class="login-btn">
                <span>S'inscrire</span>
                <div class="ripple"></div>
            </button>
        </form>

        <div class="register-link">
            Déjà inscrit? <a href="login">Se connecter</a>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission

                // Get form data
                const email = $('#email').val();
                const password = $('#password').val();
                const username = $('#username').val();
                const confirm_password = $('#confirm-password').val();
                var csrfToken = document.querySelector('meta[name="csrf_token"]').getAttribute('content');

                // AJAX request
                $.ajax({
                    url: '<?= APP_URL ?>/register', // Replace with your login endpoint
                    type: 'POST',
                    data: {
                        email: email,
                        username: username,
                        password: password,
                        confirm_password: confirm_password,
                        csrf_token : csrfToken
                    },
                    success: function(response) {
                        if (response.success) {
                            showMessage(response.message,'success');
                            // Redirect to the login page after a short delay or immediately
                            if(response.redirect != ""){
                                setTimeout(function() {
                                
                                window.location.href = response.redirect; // Redirect to the login page
                            
                        }, 2000); // Optional delay of 2 seconds
                            }
                        }
                        else 
                        {
                            var errorsHtml = '';
                            $.each(response.message, function(index, error) 
                            {
                                errorsHtml += '' + error + '';
                            });
                            // Update the HTML content of the responseMessage element with errors
                            showMessage(errorsHtml,'error');
                        }
                    }
,
                    error: function(xhr) {
                        $('#responseMessage').html('<div class="alert alert-danger">An error occurred: ' + xhr.responseText + '</div>');
                    }
                });
            });
        });
    </script>

    <script>
        //DESIGN LOGIN
        
        //design 
        // Effet de ripple sur le bouton
document.querySelector('button').addEventListener('click', function(e) {
    let ripple = document.createElement('div');
    ripple.className = 'ripple';
    this.appendChild(ripple);
    
    let rect = this.getBoundingClientRect();
    let x = e.clientX - rect.left;
    let y = e.clientY - rect.top;
    
    ripple.style.left = x + 'px';
    ripple.style.top = y + 'px';
    
    setTimeout(() => {
        ripple.remove();
    }, 600);
});

// Animation du fond en mouvement
document.addEventListener('mousemove', function(e) {
    let moveX = (e.clientX * 0.05) + 'deg';
    let moveY = (e.clientY * 0.05) + 'deg';
    document.body.style.backgroundPosition = moveX + ' ' + moveY;
});

// Animation des labels
document.querySelectorAll('.input-group input').forEach(input => {
    input.addEventListener('focus', function() {
        this.parentElement.classList.add('focused');
    });
    
    input.addEventListener('blur', function() {
        if (!this.value) {
            this.parentElement.classList.remove('focused');
        }
    });
});

// Fonction pour afficher les messages
function showMessage(message, type) {
    const messageElement = document.getElementById('responseMessage');
    messageElement.textContent = message;
    messageElement.className = 'mt-3 mb-3'; // Réinitialise les classes
    messageElement.classList.add(type, 'show');
}

function togglePassword(element) {
    const passwordInput = document.getElementById('password');
    const icon = element.querySelector('i');
    
    // Toggle du type de l'input
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
        element.classList.add('active');
    } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
        element.classList.remove('active');
    }
    
    // Ajout de l'animation de clignotement
    element.classList.add('blink');
    setTimeout(() => {
        element.classList.remove('blink');
    }, 200);
}

// Bonus : Animation au survol du champ password
document.getElementById('password').addEventListener('focus', function() {
    const toggleElement = document.querySelector('.password-toggle');
    toggleElement.style.opacity = '1';
});

document.getElementById('password').addEventListener('blur', function() {
    const toggleElement = document.querySelector('.password-toggle');
    if (this.value === '') {
        toggleElement.style.opacity = '0.7';
    }
});

// Animation périodique de l'œil
setInterval(() => {
    const toggleElement = document.querySelector('.password-toggle');
    if (!toggleElement.classList.contains('active')) {
        toggleElement.classList.add('blink');
        setTimeout(() => {
            toggleElement.classList.remove('blink');
        }, 200);
    }
}, 5000); // L'œil clignote toutes les 5 secondes
    
    </script>
</body>
</html>