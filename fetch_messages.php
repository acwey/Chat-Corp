<?php
require 'config.php';
if (!isset($_SESSION['user_id'])) { http_response_code(403); exit(); }

$lastId = isset($_GET['last_id']) ? (int)$_GET['last_id'] : 0;
$stmt = $pdo->prepare("
    SELECT m.id, m.content, DATE_FORMAT(m.sent_at,'%H:%i') as sent_at,
           u.username AS sender
    FROM messages m
    JOIN users u ON u.id = m.sender_id
    WHERE m.id > ?
    ORDER BY m.id ASC");
$stmt->execute([$lastId]);
echo json_encode($stmt->fetchAll());
