<p align="center">
<img src="https://github.com/diogolimas/e-Denuncie/blob/master/public/img/logo_f_black.png" width="120px"></img>
</p>
    
# e-Denuncie: rede social para denúncias com indicadores 
###  Projeto criado para o evento [Hackfest](https://hackfest.imd.ufrn.br/) (2019), do Ministério Público do Rio Grande do Norte
####  Equipe de desenvolvimento:

<a  href="https://github.com/alanigma">Alan Sol Dias Aves</a>
<br>
<a  href="http://github.com/anaribeiros">Ana Ribeiro Soares</a>
<br>
[Daniel Victor](http://github.com/victordaniel102)
<br>
[Diogo da Silva Lima](http://github.com/diogolimas)
<br>
[Luciano Sizilio](http://github.com/lusizilio)
<br>

# Como usar e instalar o projeto e-Denuncie

## Nas distribuições Linux e Windows:
   
 - Pré-requisitos:
      - PHP>=7.1;
      - Banco de dados com MySQL;
      - Composer;   
***- Para windows é necessário baixar o git bash; para linux, o git;***
- Clone o projeto por desse repositório:
- Abra seu terminal dentro do repositório já clonado;
- Execute o seguinte comando no terminal:
```
composer install
```
- Abra o projeto no seu editor de texto ou IDE:
- Entre no arquivo ".env.example" na raiz do projeto;
    - Dê Ctrl+Shift+S e retire o ".example", salve-o como ".env";
        - Dentro do arquivo env configure o seu banco de dados;
        - db_host: localhost;
        - db_database: nome do banco de dados que você criar agora na sua máquina;
        - db_username: nome do seu usuário mysql;
        - db_password: senha do seu usurio mysql;
- Execute no seu terminal: 
```
    php artisan key:generate
```
- depois faça a migração para sua máquina:
```
    php artisan migrate:fresh --seed
```
-  Execute o seguinte comando no terminal para linkar as imagens:
```
    php artisan storage:link
```

-  Execute no terminal também:
```
    php artisan serve
```
- Acesse a url no navegador por "localhost:8000" ou "127.0.0.1:8000";
      
