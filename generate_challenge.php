<?php
session_start();

$challenge = base64_encode(random_bytes(32));
$_SESSION['challenge'] = $challenge;

echo json_encode([
    'challenge' => $challenge
]);