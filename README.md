# Sistema de Chat – PTI

Protótipo desenvolvido para a 2ª entrega do Projeto Integrador.  

## Estrutura
```
chat_system/
assets/style.css
landing-page/index.html
config.php
db.sql
index.php          # Login
register.php       # Cadastro
chat.php           # Tela principal
fetch_messages.php # GET (polling)
send_message.php   # POST (insert)
logout.php
```
## Caso você tenha tido a necessidade de mudar a porta do apache para sua execução, como eu, é necessário fazer a alteração no Localhost ao abrir, incluindo a porta alterada ex: 'http://localhost:8080/chat_system/
```
```
## Como rodar

1. Importe `db.sql` no MySQL .
2. Ajuste `config.php` com usuário, senha e host.
3. Copie o projeto para `htdocs` ou servidor Apache.
4. Abra `/register.php`, crie uma conta e teste o chat.
```
```
## Próximos passos
* Adicionar canais (grupos).
```