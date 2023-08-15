<?php 

declare(strict_types=1);

function is_input_empty(string $username, string $pwd, string $email) 
{
    if(empty($username) || empty($pwd) || empty($email)) 
    {
        return true;
    } else 
    {
        return false;
    }
}


function is_email_regsitered(object $pdo, string $email) 
{
    if(get_email( $pdo, $email)) 
    {
        return true;
    } else {
        return false;
    }
}

function create_user(object $pdo, string $email, string $pwd) {
    set_user($pdo, $email, $pwd);
}