<p align="center">
    <img width="400" height="200" src=".github/logo.png" title="Logo do projeto"><br />
    <img src="https://img.shields.io/maintenance/yes/2020?style=for-the-badge" title="Status do projeto">
    <img src="https://img.shields.io/github/workflow/status/ccuffs/template/ci.uffs.cc?label=Build&logo=github&logoColor=white&style=for-the-badge" title="Status do build">
</p>

# Web Feedback

Web Feedback é um sistema cujo principal objetivo é estreitar a comunicação entre a comunidade da UFFS e o programa [Practice](https://practice.uffs.cc/). Esse estreitamento possibilitará que ideias e demandas voltadas para o âmbito da melhoria da educação possam ser publicadas, discutidas, discorridas e desenvolvidas. O Web Feedback irá funcionar como um mural onde qualquer pessoa da comunidade UFFS poderá expor suas ideias, comentários, solicitar serviços, etc, no formato de _post_. A partir desse ***feedback*** o [Practice](https://practice.uffs.cc/) terá facilidade em direcionar o fluxo de desenvolvimento e priorizar projetos.

## Features

Aqui você pode colocar uma screenshot do produto resultante desse projeto. Descreva também suas features usando uma lista:

* Fácil integração;
* Poucas dependências;
* Utiliza um template lindo para organizar o `README`;
* Possui ótima documentação e testes.

## Começando

### 1. Dependências

Para executar o projeto, inicialmente será preciso instalar as seguintes dependências:

- [PHP](https://www.php.net/downloads);
- [Composer](https://getcomposer.org/download/);
- [MySQL](https://www.mysql.com/downloads/);
- [NodeJS](https://nodejs.org/en/);
- [NPM](https://www.npmjs.com/package/npm);

### 2. Configuração

Feito a instalação das dependências, é necessário obter uma cópia do projeto, para isso faça o `fork` dele através do botão situado no canto superior direito e depois clone-o em sua máquima. Em seguida será preciso configurar a interação entre o projeto e suas dependências.

#### Banco de Dados

O SGBD utilizado no projeto é o MySQL sabendo disso acesse seu gerenciador e crie sua base de dados executando o seguinte comando:

```
CREATE DATABASE <nome-do-banco>
```

#### PHP

Instale as dependências do PHP usando o comando abaixo:

```
composer install
```

#### Pacotes

Instale os pacotes php necessários para rodar o projeto:
```
sudo apt install php-cli
```
```
sudo apt install php-mbstring
```
```
sudo apt install php-zip
```
```
sudo apt install php-xml
```
```
sudo apt install php-mysql
```
```
sudo apt install php-curl
```

#### Node

Instale também as dependências do NodeJS executando:
```
npm install
```

#### Laravel

Crie o arquivo `.env` a partir do arquivo `.env.example` gerado automaticamente pelo Laravel:

```
cp .env.example .env
```

Após isso, no arquivo `.env` altere o valor do campo `DB_DATABASE` para `<nome-do-banco>` criado anteriormente e substitua também o valor dos campos `DB_USERNAME` e `DB_PASSWORD` para seu usuário e senha do banco de dados, respectivamente.

Feita as alterações no `.env` execute o seguinte comando para a criação dos esquemas:
```
php artisan migrate
```

Por fim execute o comando abaixo para a geração da chave de autenticação da aplicação:
```
php artisan key:generate
```

#### Rodando o projeto

Finalmente, após seguido os passos anteriores, gere os recursos JavaScript e CSS:
```
npm run dev
```

e por fim inicie o servidor do Laravel:

```
php artisan serve
```
Após isso a aplicação estará rodando na porta 8000 e poderá ser acessada em [localhost:8000](http://localhost:8000).

## Contribua

Sua ajuda é muito bem-vinda, independente da forma! Confira o arquivo [CONTRIBUTING.md](CONTRIBUTING.md) para conhecer todas as formas de contribuir com o projeto. Por exemplo, [sugerir uma nova funcionalidade](https://github.com/ccuffs/template/issues/new?assignees=&labels=&template=feature_request.md&title=), [reportar um problema/bug](https://github.com/ccuffs/template/issues/new?assignees=&labels=bug&template=bug_report.md&title=), [enviar um pull request](https://github.com/ccuffs/hacktoberfest/blob/master/docs/tutorial-pull-request.md), ou simplemente utilizar o projeto e comentar sua experiência.

Veja o arquivo [ROADMAP.md](ROADMAP.md) para ter uma ideia de como o projeto deve evoluir.


## Licença

Esse projeto é licenciado nos termos da licença open-source [Apache 2.0](https://choosealicense.com/licenses/apache-2.0/) e está disponível de graça.

## Changelog

Veja todas as alterações desse projeto no arquivo [CHANGELOG.md](CHANGELOG.md).

## Projetos semelhates

Abaixo está uma lista de links interessantes e projetos similares:

* [Google Keep](https://keep.google.com)
