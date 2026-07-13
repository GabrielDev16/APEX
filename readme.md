# APEX
 
Aplicação web pessoal de produtividade desenvolvida em **PHP** e **MySQL**, com interface em **Bootstrap 5**. O APEX centraliza em um único painel o acompanhamento de rotina, metas, leitura e finanças pessoais.
 
![Status](https://img.shields.io/badge/status-em%20desenvolvimento-yellow)
![PHP](https://img.shields.io/badge/PHP-8.0-777bb4)
![MySQL](https://img.shields.io/badge/MySQL-MariaDB-4479A1)
 
## 📋 Sobre o projeto
 
O APEX nasceu como um dashboard pessoal para organizar diferentes áreas da vida em um só lugar. A partir da tela inicial, o usuário acessa quatro módulos independentes, cada um com seu próprio CRUD conectado ao banco de dados:
 
| Módulo | Descrição |
|---|---|
| 🗓️ **Rotina** | Cadastro de hábitos com meta mensal e registro diário de conclusão |
| 🎯 **Metas** | Criação de metas com prazo e acompanhamento de status (concluída/pendente) |
| 📚 **Leitura** | Controle de livros lidos, com capa, total de páginas e progresso de leitura |
| 💰 **Finanças** | Lançamento de entradas e saídas, com cálculo automático de saldo |
 
## 🛠️ Tecnologias utilizadas
 
- **PHP 8** (procedural, com `mysqli`)
- **MySQL / MariaDB**
- **Bootstrap 5.3**
- **Bootstrap Icons**
- **JavaScript** (vanilla)
- **HTML5 / CSS3**
## 📁 Estrutura do projeto
 
```
APEX/
├── assets/
│   ├── css/          # Estilos customizados
│   ├── img/           # Imagens estáticas
│   └── js/             # Scripts (main.js, pagesConf.js)
├── bootstrap/        # Bootstrap local (CSS e JS)
├── conf/
│   ├── db.php         # Conexão com o banco de dados
│   └── url.php        # Definição da BASE_URL
├── crud/              # Scripts de criação/atualização/exclusão
│   ├── atualizar.php
│   ├── concluirHabito.php
│   ├── concluirMeta.php
│   ├── deleteMeta.php
│   ├── financasCRUD.php
│   ├── metaCreat.php
│   ├── rotinaCreat.php
│   └── upload.php
├── includes/           # Componentes reutilizáveis
│   ├── conexao.php
│   ├── footer.php
│   ├── header.php
│   ├── navbar.php
│   └── navbarPages.php
├── pages/              # Páginas de cada módulo
│   ├── financas.php
│   ├── leitura.php
│   ├── metas.php
│   └── rotina.php
├── uploads/            # Uploads de capas de livros
├── gabriel.sql         # Dump do banco de dados
└── index.php           # Dashboard principal
```
 
## 🗄️ Banco de dados
 
O projeto utiliza um banco chamado `gabriel`, com as seguintes tabelas principais:
 
- `habitos` / `registros_habito` / `progresso_habitos` — controle de hábitos e progresso diário
- `metas` — metas pessoais com título, descrição, prazo e status
- `boks` — livros cadastrados (título, autor, páginas totais/lidas, capa)
- `transacoes` — lançamentos financeiros (entrada/saída, categoria, valor, data)
- `perfil` / `meses` — tabelas de apoio
O dump completo está disponível em [`gabriel.sql`](./gabriel.sql).
 
## 🚀 Como rodar o projeto localmente
 
### Pré-requisitos
 
- [XAMPP](https://www.apachefriends.org/) (ou WAMP/MAMP) com Apache, PHP 8+ e MySQL/MariaDB
- Um cliente de banco de dados (phpMyAdmin, DBeaver, etc.)
### Passo a passo
 
1. Clone o repositório dentro da pasta `htdocs` do XAMPP:
```bash
   cd C:\xampp\htdocs   # ou /opt/lampp/htdocs no Linux
   git clone https://github.com/GabrielDev16/APEX.git
```
 
2. Crie o banco de dados `gabriel` e importe o dump `gabriel.sql` (via phpMyAdmin ou terminal):
```bash
   mysql -u root -p gabriel < gabriel.sql
```
 
3. Confira as credenciais em `conf/db.php` — por padrão, usuário `root` sem senha:
```php
   $host = "localhost";
   $user = "root";
   $senha = "";
   $db = "gabriel";
```
 
4. Ajuste a `BASE_URL` em `conf/url.php` de acordo com o caminho onde o projeto foi clonado:
```php
   define('BASE_URL', 'http://localhost/APEX/');
```
 
5. Inicie o Apache e o MySQL pelo painel do XAMPP e acesse:
```
   http://localhost/APEX/
```
 
## 🗺️ Roadmap
 
- [ ] Sistema de autenticação (login/perfil de usuário)
- [ ] Deploy em ambiente de produção
- [ ] Novo módulo (em desenvolvimento)
## 👤 Autor
 
Desenvolvido por **Gabriel** como projeto de portfólio para atuação como desenvolvedor júnior.
 
- GitHub: [@GabrielDev16](https://github.com/GabrielDev16)