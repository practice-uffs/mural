<p align="center">
    <img width="600" src=".github/logo.png" title="Logo do projeto"><br />
    <img src="https://img.shields.io/maintenance/yes/2021?style=for-the-badge" title="Status do projeto">
    <img src="https://img.shields.io/github/workflow/status/practice-uffs/mural/ci.uffs.cc?label=Build&logo=github&logoColor=white&style=for-the-badge" title="Status do build">
</p>

# Mural

O mural é um sistema cujo principal objetivo é estreitar a comunicação entre a comunidade da [Universidade Federal da Fronteira Sul (UFFS)](https://www.uffs.edu.br) e o programa [Practice](https://practice.uffs.edu.br). Esse estreitamento visa que ideias e demandas voltadas à melhoria da educação possam ser publicadas, discutidas, discorridas e desenvolvidas.

> **IMPORTANTE:** o Practice Mural está em funcionamento em: [practice.uffs.edu.br/mural](https://practice.uffs.edu.br/mural).

## ✨ Features

O mural possui um conjunto considerável de features:

* Autenticação a partir do idUFFS;
* Categorias de serviços, com campos dinâmicos para cada;
* Acompanhamento de solicitações;
* Ingragração com [Github](https://github.com) e [Google Drive](https://drive.google.com);

## 🚀 Começando

### 1. Dependências

Para executar o projeto, você precisa ter o seguinte instalado:

- [Git](https://git-scm.com);
- [PHP](https://www.php.net/downloads);
- [Composer](https://getcomposer.org/download/);
- [NodeJS](https://nodejs.org/en/);
- [NPM](https://www.npmjs.com/package/npm);

Você precisa de várias extensões PHP instaladas também:

```
sudo apt install php-cli php-mbstring php-zip php-xml php-curl
```

O mural, desde sua versão `v2`, exige `php >= 8.0`.

### 2. Configuração

Feito a instalação das dependências, é necessário obter uma cópia do projeto. A forma recomendada é clonar o repositório para a sua máquina.

Para isso, rode:

```
git clone --recurse-submodules https://github.com/practice-uffs/mural && cd mural
```

Isso criará e trocará para a pasta `mural` com o código do projeto.

#### 2.1 PHP

Instale as dependências do PHP usando o comando abaixo:

```
composer install
```

#### 2.2 Banco de Dados

O banco de dados mais simples para uso é o SQLite. Para criar uma base usando esse SGBD, rode:

```
touch database/database.sqlite
```

#### 2.3 Node

Instale também as dependências do NodeJS executando:

```
npm install
```

#### 2.4 Laravel

Crie o arquivo `.env` a partir do arquivo `.env.example` gerado automaticamente pelo Laravel:

```
cp .env.example .env
```

Criação as tabelas do banco de dados com as migrações esquemas:

```
php artisan migrate
```

Rode os seeders (que crias as categorias/serviços padrão):

```
php artisan db:seed
```

Gere aa chave de autenticação da aplicação:

```
php artisan key:generate
```

Por fim gere os recursos JavaScript e CSS:

```
npm run dev
```

>*DICA:* enquanto estiver desenvolvendo, rode `npm run watch` para manter os scripts javascript sendo gerados sob demanda quando alterados.

### 3. Utilizacão

#### 3.1 Rodando o projeto

Depois de seguir todos os passos de instalação, inicie o servidor do Laravel:

```
php artisan serve
```

Após isso a aplicação estará rodando na porta 8000 e poderá ser acessada em [localhost:8000](http://localhost:8000).

#### 3.2 Utilização da API

Se você utilizar a API dessa aplicacão, todos endpoints estarão acessivel em `/api`, por exemplo [localhost:8000/api](http://localhost:8000/api). Os endpoints que precisam de uma chave de autenticação devem ser utilizar o seguinte cabeçalho HTTP:

```
Authorization: Bearer XXX
```

onde `XXX` é o valor da sua chave de acesso (api token do Jetstream), por exemplo `c08cbbfd6eefc83ac6d23c4c791277e4`.
Abaixo está um exemplo de requisição para o endpoint `user` utilizando a chave de acesso acima:

```bash
curl -H 'Accept: application/json' -H "Authorization: Bearer c08cbbfd6eefc83ac6d23c4c791277e4" http://localhost:8080/api/user
```

## 🤝 Contribua

Sua ajuda é muito bem-vinda, independente da forma! Confira o arquivo [CONTRIBUTING.md](CONTRIBUTING.md) para conhecer todas as formas de contribuir com o projeto. Por exemplo, [sugerir uma nova funcionalidade](https://github.com/practice-uffs/mural/issues/new?assignees=&labels=&template=feature_request.md&title=), [reportar um problema/bug](https://github.com/practice-uffs/mural/issues/new?assignees=&labels=bug&template=bug_report.md&title=), [enviar um pull request](https://github.com/ccuffs/hacktoberfest/blob/master/docs/tutorial-pull-request.md), ou simplemente utilizar o projeto e comentar sua experiência.

Veja o arquivo [ROADMAP.md](ROADMAP.md) para ter uma ideia de como o projeto deve evoluir.


## 🎫 Licença

Esse projeto é licenciado nos termos da licença open-source [MIT](https://choosealicense.com/licenses/mit) e está disponível de graça.

## 🧬 Changelog

Veja todas as alterações desse projeto no arquivo [CHANGELOG.md](CHANGELOG.md).

## 🧪 Links úteis

Abaixo está uma lista de links interessantes e projetos similares:

* [Universidade Federal da Fronteira Sul](https://www.uffs.edu.br)
* [Programa Practice](https://practice.uffs.cc)
* [Practice Maker](https://github.com/practice-uffs/maker)
* [Practice Bot](https://github.com/practice-uffs/bot)
* [Practice Forms](https://github.com/practice-uffs/forms)
