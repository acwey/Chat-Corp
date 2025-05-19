<?php
/* Tela de login */
require 'config.php';
if (isset($_SESSION['user_id'])) {
    header('Location: chat.php');
    exit();
}

$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $senha    = $_POST['password'] ?? '';

    $stmt = $pdo->prepare('SELECT id, password_hash FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($senha, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $username;
        header('Location: chat.php');
        exit();
    } else {
        $erro = 'Usuário ou senha inválidos.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <title>Login • Chat</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if ($erro): ?><p class="error"><?= $erro ?></p><?php endif; ?>
        <form method="post">
            <input type="text" name="username" placeholder="Usuário" required>
            <input type="password" name="password" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
        <p>Não possui conta? <a href="register.php">Cadastre‑se</a></p>
    </div>
</body>
</html>
