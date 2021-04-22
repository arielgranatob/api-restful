### Comandos para instalar e rodar

- git clone *https://github.com/arielgranatob/api-restful*
- cd api-restful
- composer install
- copie o arquivo *api-restful/configurar* e substitua em *api-restful/vendor/laravel/lumen-framework/config*
- php -S localhost:8000 -t public

### Métodos API Restful

- GET /posts: Retorna todos os posts
- GET /posts/1: Retorna o post com respectivo ID
- POST /posts: Cria um novo post
- DELETE /posts/1: Delete o post com respectivo ID
- PUT /posts/1: Atualiza o post com respectivo ID
- PATCH /posts/1: Atualiza parcialmente o post com respectivo ID

### Parâmetros

title: "Título do post do blog"
description: "Descrição completa do post do blog"
by: "Autor do post do blog"