<p align="center" border-bottom="none">
	<img width="150" src="https://user-images.githubusercontent.com/79942050/147711788-2dc92d87-7f20-4abf-9216-8da5f80c4064.png">
</p>
<h1 align="center" border-bottom="none">Confecção</h1>
<h2 align="center" border-bottom="none"><em>Sistema Gerenciador de Confecção de Camisas</em></h2>

## Tabela de conteúdos
1. [Sobre o projeto](#sobre-o-projeto)
2. [Tecnologias](#tecnologias)
3. [Funcionalidades](#funcionalidades)
4. [Demonstração](#demonstração)
5. [Como rodar](#como-rodar)
5. [Autor](#autor)

***

## Sobre o projeto
Confecção é um sistema gerenciador de pedidos de confecção de camisas.

***

## Propósito
O projeto foi feito em **2019** para a aula de **Programação WEB** do curso de **Análise e Desenvolvimento de Sistemas**.

***

## Funcionalidades
- Cadastro de usuários
- Controle de usuários
- Cadastro de clientes
- Cadastro de modelos
- Cadastro de tamanhos
- Cadastro de pedidos
- Situação do pedido (entregue ou não)

***

## Tecnologias
- [PHP][1]
- [MySQL][2]
- [HTML][3]
- [CSS][4]
- [JS][5]

***

## Como rodar
Para testar o projeto é necessário criar o banco de dados no [MySQL][3] com o arquivo [banco/banco.sql](banco/banco.sql) e [banco/usuario.sql](banco/usuario.sql) para criar o usuário do banco de dados.  
Para rodar o projeto, basta utilizar um servidor [PHP][1], como [php-cli][6] ou [Apache][7].  
Para popular o banco de dados com dados para teste é necessário rodar o projeto e abrir a página em /src/popular.php.  
Há um usuário administrador que pode adicionar, editar e deletar usuários, chamado admin com senha admin.
A senha do user1 é user1, e do user2 é user2.

***

## Demonstração
[![Demonstração do sistema](https://img.youtube.com/vi/tLwV8yyNZNw/hqdefault.jpg)](https://www.youtube.com/watch?v=tLwV8yyNZNw)

***

## Autor
Willian Carlos  
<wcs7777git@gmail.com>  
<https://www.linkedin.com/in/williancarlosdasilva/>

[1]: https://www.php.net/
[2]: https://www.mysql.com/
[3]: https://developer.mozilla.org/en-US/docs/Web/HTML
[4]: https://developer.mozilla.org/en-US/docs/Web/CSS
[5]: https://developer.mozilla.org/en-US/docs/Web/JavaScript
[6]: https://www.php.net/manual/pt_BR/features.commandline.webserver.php
[7]: https://www.apache.org/