
# API de simulação de parcelamento de veículos - Listra




![Logo](https://ik.imagekit.io/lrrw3mrhils/320shots_so_zJ400VPgX.png?updatedAt=1715713934370)


## Stack utilizada


**Back-end:** Laravel, Postgresql



# Instalando o projeto

O projeto se utiliza de contêineres Docker, através do pacote *Laravel Sail* para facilitar a configuração do ambiente de desenvolvimento. Portanto, é necessário que já possua o Docker e o Docker Compose instalados na máquina.

Você é livre para rodar o projeto em ambiente local mas esse texto não tratará essa situação.

Links para instalação e configuração de Docker:

- [Windows](https://docs.docker.com/docker-for-windows/install/)
- [Linux (Debian based)](https://docs.docker.com/engine/install/ubuntu/)



### Observações
- O arquivo .env está sendo versionado somente para facilitar o setup do projeto, mas em hipótese alguma deve se versionar esse arquivo em ambientes de produção

## Funcionalidades

- End point de listagem de veículos
- End point de simulação de valores de um veículo


## Documentação da API

#### Retorna todos os veículos

```http
  GET /api/vehicles
```



#### Retorna um item

```http
  POST /api/vehicles/{id}/simulate
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `input_value`      | `number` | **Obrigatório**. O valor de entrada para o veículo |



## Rodando localmente



- Faça um clone do projeto para sua máquina local
- acesse a pasta do projeto via console (terminal/PowerShell/CMD)
- execute o comando:
```shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
 ```
- Após finalizado processamento, execute o comando `./vendor/bin/sail up -d`

O primeiro comando realiza a instalação dos pacotes via composer especificados no arquivo `composer.json` e uma vez que a instalação termina, a pasta *vendor* passa a ficar disponível no projeto. O comando seguinte levanta os contêineres baseado na descrição de serviços feita no arquivo `docker-compose.yml`.

Por padrão, não é necessária nenhuma configuração no arquivo *.env* do projeto. Caso seja necessária alguma edição na configuração padrão (relacionado a binding ports ou credenciais de banco de dados), basta editar o arquivo *.env*.


O projeto vai estar disponível na porta definida no arquivo .env e você poderá acessar com `localhost:{PORT}`


### Rodando as migrations
- As migrations são arquivos que populam a base de dados com as tabelas pré definidas. Para rodar basta executar o seguinte comando dentro do projeto. Esse comando além de criar as tabelas, também já vai colocar alguns registros na tabela de veículos

```shell
./vendor/bin/sail artisan migrate:fresh --seed

```


## Rodando os testes

Para rodar os testes, rode o seguinte comando

```bash
./vendor/bin/sail test
```

## Autores

- [@jeffersonsevero](https://www.github.com/octokatherine)
