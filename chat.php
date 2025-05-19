<?php
/* Interface principal do chat */
require 'config.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <title>Chat</title>
    <link rel="stylesheet" href="assets/style.css">
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const listaMensagens   = document.getElementById('messages');
        const formularioEnvio  = document.getElementById('sendForm');
        const inputMensagem    = document.getElementById('content');
        let ultimoId = 0;

        async function buscarMensagens() {
            const res = await fetch('fetch_messages.php?last_id=' + ultimoId);
            const dados = await res.json();
            dados.forEach(m => {
                const li = document.createElement('li');
                li.textContent = `[${m.sent_at}] ${m.sender}: ${m.content}`;
                listaMensagens.appendChild(li);
                ultimoId = m.id;
            });
            listaMensagens.scrollTop = listaMensagens.scrollHeight;
        }
        setInterval(buscarMensagens, 2000);
        buscarMensagens();

        formularioEnvio.addEventListener('submit', async e => {
            e.preventDefault();
            const conteudo = inputMensagem.value.trim();
            if (!conteudo) return;
            await fetch('send_message.php', {
                method: 'POST',
                headers: {'Content-Type':'application/x-www-form-urlencoded'},
                body: 'content=' + encodeURIComponent(conteudo)
            });
            inputMensagem.value = '';
        });
    });
    </script>
</head>
<body>
    <div class="chat-container">
        <header>
            <h2>Olá, <?= htmlspecialchars($_SESSION['username']) ?> 👋</h2>
            <a class="logout" href="logout.php">Sair</a>
        </header>
        <ul id="messages"></ul>
        <form id="sendForm">
            <input type="text" id="content" placeholder="Digite uma mensagem..." autocomplete="off" required>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
