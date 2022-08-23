# Loja-ficticia-com-Laravel
Fiz uma loja fictícia utilizando as rotas do Laravel que carregam suas views.


Para rodar o projeto:

Utilize o ambiente de desenvolvimento de sua preferência, no meu caso eu utilizei o XAMPP. 


1° Dentro da pasta htdocs, clique no terminal e digite o comando abaixo: 

composer create-project laravel/laravel Projeto


2° Faça o download deste repositório e substitua os arquivos que estão na pasta do projeto, no meu caso é htdocs/Projeto:


3° Dentro da pasta raiz do projeto, no terminal de comando digite o comando para criar a base de dados do projeto:

mysql -u root -e "DROP DATABASE IF EXISTS m3;CREATE DATABASE m3"

Observação: Estou utilizando baco de dados PHPmyAdmin mas vc pode utilizar outro banco de dados de sua preferÊncia;


4° Em seguida, no terminal digite o comando:
php artisan migrate;


5° Ainda no terminal digite o comando:
php artisan serve.

Com isto você iniciará o servidor e poderá testar a loja através do seu browser, no seu navageador de internet através da porta http://127.0.0.1:8000/


