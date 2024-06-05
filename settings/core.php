<?php
//start session
session_start();

$ENC_KEY = "50M3 EN K3WHY";

    //for header redirection
    ob_start();

    //funtion to check for login

    function isLoggedIn() {
        return !empty($_SESSION['id']);
    }


    //function to get user ID


    //function to check for role (admin, customer, etc)

    function isAdmin() {
        return !empty($_SESSION["role"]) && $_SESSION["role"] === "1";
    }

    function encrypt($data) {
        global $ENC_KEY;

        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted_data = openssl_encrypt($data, 'aes-256-cbc', $ENC_KEY, 0, $iv);
        $encoded_data = base64_encode($iv . $encrypted_data);

        return $encoded_data;
    }

    function decrypt($encoded_data) {
        global $ENC_KEY;

        $decoded_data = base64_decode($encoded_data);
        $iv_length = openssl_cipher_iv_length('aes-256-cbc');
        $iv = substr($decoded_data, 0, $iv_length);
        $encrypted_data = substr($decoded_data, $iv_length);
        $decrypted_data = openssl_decrypt($encrypted_data, 'aes-256-cbc', $ENC_KEY, 0, $iv);

        return $decrypted_data;
    }




?>