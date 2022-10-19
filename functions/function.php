<?php
// Function to verify password
function verify_pass($hash_pass, $login_pass){
    return password_verify($login_pass, $hash_pass);
}

?>