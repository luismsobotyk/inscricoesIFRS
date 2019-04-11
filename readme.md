<h1>Módulo de inscrição IFRS</h1>

<strong>SISTEMA EM DESENVOLVIMENTO*.</strong>
<br />
<i>*ainda sem todas funcionalidades</i>

## Requisitos

- Composer;

## Como instalar

- Copie os arquivos para o seu servidor.
- Dentro da raiz do projeto, execute <i>"composer install"</i>.
- Edite o seu arquivo .env.
    - Campos que você precisa editar:
        - APP_URL
        - Configurações do DB
        - Configurações de MAIL
- Gere a key do seu projeto - <i>"php artisan key:generate"</i>.
- Crie o Banco de Dados conforme o nome que você especificou no arquivo .env
- Gere as tabelas do banco com o comando <i>"php artisan migrate"</i>.

<br />
<i>using Laravel</i>