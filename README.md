# Sistema de Chat – PTI

Um chat web **simples, direto e 100 % em PHP + MySQL** feito para a 2ª entrega da PTI.  
Qualquer usuário cadastrado entra num único salão e conversa em tempo quase real

Protótipo desenvolvido para a 2ª entrega do Projeto Integrador.  
Grupo 43, Integrantes:

Andrius Gottems da Silva;

Antonio Carlos Wey Ribeiro;

Gabriel Huff Lemos;

Jean Vito Batista Felix;

Pedro Hortêncio Moreira Rosa.

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
## Caso você tenha tido a necessidade de mudar a porta do apache para sua execução, como eu, é necessário fazer a alteração no Localhost ao abrir, incluindo a porta alterada ex:
'http://localhost:8080/chat_system/

Cadastro / login `register.php` grava o usuário em **users**. `index.php` faz o login seguro. 
Chat global Todos os logados falam no mesmo salão. O JS pergunta ao servidor a cada 2 s se há mensagens novas. 
Histórico salvo Cada texto vai para a tabela **messages** e fica visível para quem entrar depois. 
Responsivo CSS puro com Flexbox e gradiente azul – fica ok em desktop e celular. 

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
```
##PrintScreen
LANDING-PAGE
![image](https://github.com/user-attachments/assets/3fcc3654-1b2e-46a1-a5b7-f57976903f95)

LOGIN
![image](https://github.com/user-attachments/assets/52b623d2-8548-48b6-b92d-f37937d88be5)

CADASTRO
![image](https://github.com/user-attachments/assets/76fc9d59-33f1-4bb4-a0a6-2fa4301d4087)

CHAT
![image](https://github.com/user-attachments/assets/5cd53a04-2dfc-4697-9c5d-c29b5f6c667d)
