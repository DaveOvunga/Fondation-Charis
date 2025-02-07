<?php

define('APP_NAME', 'FORMATION MEDICAL');
define('APP_URL',  'http://localhost/NouveauP/Fondation-Charis');
define('APP_DEBUG', true);
define('VIMEO_CLIENT_ID', 'd145c6bafd5f22b736ac222c52ed7238c5abe111');
define('VIMEO_CLIENT_SECRET', 'h72CpGX7UnJ1uFHcSNmsitj4EcDozlfuR9s3sCw/evIDjAIoN1Mhml+GUKnmtE0oci6YEsJ+9FzzDamhvqIE+gaXSixd1/l7gj9w7UALNHP1YXO+6Zv4T1pleKsbrSoM');
define('VIMEO_ACCESS_TOKEN', '137d52286f5054318b827ef99773b886');

define('SMTP_HOST','smtp.gmail.com');
define('SMTP_PORT',587);
define('SMTP_USERNAME','shongoaxel580@gmail.com');
define('SMTP_PASSWORD','vyimqccoyuutgyef');
define('SMTP_FROM','shongoaxel580@gmail.com');
define('SMTP_FROM_NAME','Fondation charis');


define('MAX_LOGIN_ATTEMPS_PER_HOUR',6);
define('MAX_EMAIL_VERIFICATION_REQUESTS_PER_DAY',5);
define('MAX_PASSWORD_RESET_REQUESTS_PER_DAY',3);
define('CSRF_TOKEN_SECRET', '12ZSC9AFH09AI4EAHF09A34');

// Secret key for encryption and decryption
define('SECRET_KEY', '1YDBNW.SKIEBC83BDYSJAODNXBDUR7384059');  // 256-bit key (32 characters)
define('SECRET_IV', 'Anbhsyegdbxàéç&_');    // 128-bit IV (16 characters)

date_default_timezone_set('UTC');
session_set_cookie_params(['samesite' => 'strict']);