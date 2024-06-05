<?php

$ENC_KEY = "50M3 EN K3WHY";

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

// Example usage:
$data_to_encrypt = 20;

// Encrypt data
$encrypted_data = encrypt($data_to_encrypt);
echo "Encrypted data: $encrypted_data\n";

// Decrypt data
$decrypted_data = decrypt($encrypted_data) + 4;
echo "Decrypted data: $decrypted_data\n";
?>
