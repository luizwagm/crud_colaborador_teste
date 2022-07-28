# TESTE CRUD

## Requisitos

1. PHP 8.x
2. Criar o arquivo `database.sqlite` na pasta `database/`
3. Copiar o arquivo `.env.example` para `.env`

## Rodar os comandos abaixo:

`composer install`

`php artisan migrate`

`php artisan test` Testes de feature e unitário

`php artisan serve`

## Testes de api

Os testes serão possíveis via chamada de API com Postman, Insomnia ou CRUD

## Endpoints

`api/collaborators`

    method: GET
    params: 
        cpf: nullable|string
        id: nullable|integer    
    return: json

`api/collaborators`

    method: POST
    params: 
        full_name: required|string,
        cpf: required|string|unique,    
        email: required|string|unique,    
        rg: required|string,    
        birthdate: required|string|Y-m-d,    
        cep: required|string,    
        address: required|string,    
        number: required|string,    
        city: required|string,    
        state: required|string,    
        salary: required|string    
    return: json

`api/collaborators`

    method: DELETE
    params: 
        id: required|integer    
    return: json
