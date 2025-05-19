<?php
require 'config.php';
if (!isset($_SESSION['user_id'])) { http_response_code(403); exit(); }

$content = trim($_POST['content'] ?? '');
if ($content === '') { exit(); }

$stmt = $pdo->prepare('INSERT INTO messages (sender_id, content) VALUES (?, ?)');
$stmt->execute([$_SESSION['user_id'], $content]);
