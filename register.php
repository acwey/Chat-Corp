<?php
/* Tela de cadastro */
require 'config.php';
if (isset($_SESSION['user_id'])) {
    header('Location: chat.php');
    exit();
}

$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email    = $_POST['email'] ?? '';
    $senha    = $_POST['password'] ?? '';

    if (!$username || !$email || !$senha) {
        $erro = 'Preencha todos os campos.';
    } else {
        try {
            $hash = password_hash($senha, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare('INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)');
            $stmt->execute([$username, $email, $hash]);
            header('Location: index.php');
            exit();
        } catch (PDOException $e) {
            $erro = 'Usuário ou e‑mail já existem.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <title>Cadastro • Chat</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h2>Cadastro</h2>
        <?php if ($erro): ?><p class="error"><?= $erro ?></p><?php endif; ?>
        <form method="post">
            <input type="text" name="username" placeholder="Usuário" required>
            <input type="email" name="email" placeholder="E‑mail"
                   pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Insira um e‑mail válido" required>
            <input type="password" name="password" placeholder="Senha" required>
            <button type="submit">Registrar</button>
        </form>
        <p>Já possui conta? <a href="index.php">Entrar</a></p>
    </div>
</body>
</html>
