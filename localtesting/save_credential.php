<?php
$data = json_decode(file_get_contents('php://input'), true);

$email = $data['email'];
$credential_id = $data['id'];
$public_key = $data['publicKey'];

$conn = new mysqli("localhost", "root", "", "webauthn");

$stmt = $conn->prepare("INSERT INTO users (email, credential_id, public_key) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $email, $credential_id, $public_key);
$stmt->execute();

echo json_encode(['status' => 'ok']);