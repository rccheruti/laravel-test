# Teste backend

- Este projeto utiliza o framework Laravel 10.

***

## Instalação

Clone Repositório

```sh
git clone https://github.com/rccheruti/teste-back.git
```

Instalar as dependências do projeto

```sh
composer install
```

Gerar a key do projeto Laravel

```sh
php artisan key:generate
```

Subir o servidor Laravel

```sh
php artisan serve
```
***

## Produtos

>> Cadastrar
> - Utilizando uma requisição POST para enviar um JSON.
>
>```dosini
> /api/v1/produtos/cadastrar
>```
>
>Conteúdo do JSON
>
>```dosini
>    {
>        "nome" : "Nome do produto",
>        "descricao" : "Descrição do produto",
>        "preco" : "123.00",
>        "quantidade": "10"
>    }
>```
>
>

>> #### Ver todos os registros
> 
> - Enviar uma requisição GET para
> ```dosini
> /api/v1/produtos/listar
>```
>  - Irá listar todos os items do banco de dados.

>> #### Ver um registro específico via ID
>
> - Enviar uma requisição GET para
> ```dosini
> /api/v1/produtos/listar/{id}
>```
> - Contendo o ID retornara um item conforme seu ID.


>> #### Alterar registro
> 
> - Enviar uma requisição PATCH com o ID do produto que deseja alterar alguma informação.
> ```dosini
> /api/v1/produtos/atualizar/{id}
>```

>> ##### Deletar um registro
> 
>  - Enviar uma requisição DELETE com o ID do produto que deseja excluir.
> ```dosini
> /api/v1/produtos/deletar/{id}
>```
***
## Teste

Para rodar o teste, abra o terminal na pasta do projeto e digite o comando a seguir:

```sh
php artisan test
```
O resultado esperado é 3 testes com sucesso.

***

###### Roger Cheruti 
###### Whatsapp (51) 99192-5242
