<?php

declare(strict_types = 1);

function is_email_not_exist(bool $result) {
    return !$result;
}


function is_password_wrong(string $pwd, string $hashedPwd) {
    
    if(!password_verify($pwd, $hashedPwd)) {
        return true;
    }else {
        return false;
    }
}