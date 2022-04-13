<h3 align="center">
    <p align="center">
      <b>TELZIR</b> 
    </p>
</h3>

<p align="center">
  <a href="https://github.com/Diogo-Freitas" target="_blank">
    <img alt="Made by Diogo-Freitas" src="https://img.shields.io/badge/By-Diogo--Freitas-green">
    <img alt="GitHub Last Commit" src="https://img.shields.io/github/last-commit/Diogo-Freitas/telzir" />
    <img alt="Repo Size" src="https://img.shields.io/github/repo-size/Diogo-Freitas/telzir" />
  </a>
</p>

<div align="center">
    <p>
        <a href="#sobre">Sobre</a> |
        <a href="#screenshots">Screenshots</a> |
        <a href="#tecnologias-utilizadas">Tecnologias Utilizadas</a> |
        <a href="#plugins">Plugins Utilizados</a> |
        <a href="#como-utilizar">Como Utilizar</a>
    </p>
</div>


<div id="sobre"></div>

## 🔖 Sobre

<p>A empresa de telefonia Telzir, especializada em chamadas de longa distância nacional, vai colocar um novo produto no mercado chamado FaleMais.</p>
<p>Normalmente um cliente Telzir pode fazer uma chamada de uma cidade para outra pagando uma tarifa fixa por minuto, com o preço sendo pré-definido em uma lista com os códigos DDDs de origem e destino:</p>

| Origem | Destino | $/min |
|--------|---------|-------|
| 011    | 016     | 1.90  |
| 016    | 011     | 2.90  |
| 011    | 017     | 1.70  |
| 017    | 011     | 2.70  |
| 011    | 018     | 0.90  |
| 018    | 011     | 1.90  |

<p>Com o novo produto FaleMais da Telzir o cliente adquire um plano e pode falar de graça até um determinado tempo (em minutos) e só paga os minutos excedentes. Os minutos excedentes tem um acréscimo de 10% sobre a tarifa normal do minuto. Os planos são FaleMais 30 (30 minutos), FaleMais 60 (60 minutos) e FaleMais 120 (120 minutos).</p>

<p>A Telzir, preocupada com a transparência junto aos seus clientes, quer disponibilizar uma página na web onde o cliente pode calcular o valor da ligação. Ali, o cliente pode escolher os códigos das cidades de origem e destino, o tempo da ligação em minutos e escolher qual o plano FaleMais. O sistema deve mostrar dois valores: (1) o valor da ligação com o plano e (2) sem o plano. O custo inicial de aquisição do plano deve ser desconsiderado para este problema</p>

<div id="screenshots"></div>

## 📷 Screenshots
<h1>
    <img width="270" alt="HOME" src="">
    <img width="270" alt="HOME" src="">
    <img width="270" alt="HOME" src="">
</h1>

<div id="tecnologias-utilizadas"></div>


## 🚀 Tecnologias Utilizadas


- [PHP 8.1](https://php.net/)
- [Laravel 9.x](https://laravel.com/)

<div id="plugins"</div>

## 🧩 Plugins Utilizados
 - [Laravel Sail](https://github.com/laravel/sail)

<a id="como-utilizar"></a>

## 💻 Como Utilizar

### 1. Faça um clone:

###### Clonando o repositório
```sh
git clone https://github.com/Diogo-Freitas/telzir.git
```

###### Entrando no diretório
```sh
cd telzir
```

### 2. Instalando a Aplicação Utilizando Sail com Docker:

###### Instalando dependências do Composer para aplicativos existentes
```sh
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
 ```
 
###### Configurando um Alias Bash
```sh
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

###### Criando um arquivo .env
```sh
cp .env.example .env
```

###### Iniciando Sail
```sh
sail up -d
```

###### Gerando uma nova chave
```sh
sail artisan key:generate
```

###### Execultando o composer
```sh
sail composer install
```

###### Execultando as migrações
```sh
sail artisan migrate --seed
```


### 3. Executando Testes:
```sh
sail test
```


### 4. Acessando a Aplicação:

###### Link:
    http://localhost/