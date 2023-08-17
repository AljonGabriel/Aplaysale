<?php

declare(strict_types = 1);

function is_user_match(object|bool $pdo, string $emailInput, string $pwdInput) {
   return check_email_password_match($pdo, $emailInput, $pwdInput);

}