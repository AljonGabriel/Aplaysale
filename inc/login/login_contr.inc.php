<?php

declare(strict_types = 1);

function is_email_not_exist(bool $result) {
    return !$result;
}


function is_password_mismatch(string $pwd, string $hashedPassword) {
    return !password_verify($pwd, $hashedPassword);
}