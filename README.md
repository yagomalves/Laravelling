🎬 Projeto Laravel - Sistema para Reviews de Filmes

Este é um projeto pessoal em Laravel, iniciado do zero sem seguir cursos ou vídeos, com o objetivo de consolidar meu aprendizado de forma prática.

🚀 Contexto do Desenvolvimento

O primeiro commit deste repositório foi inspirado em um CRUD que desenvolvi a partir de tutoriais.

Posteriormente, tentei integrar o Laravel Breeze, o que gerou conflitos irreversíveis no projeto inicial.

Por isso, decidi abandonar o código antigo e iniciar este novo projeto do zero, aplicando diretamente o que aprendi.

✅ Status Atual (terceiro commit)

Todas as funcionalidades de backend foram implementadas com sucesso. O sistema está funcional e preparado para as etapas de desenvolvimento frontend.

🔧 Funcionalidades Implementadas:

Página de exibição dos filmes com:
-Cartazes
-Título
-Descrição
-Ano de lançamento
-Categorias
-Comentários
-Avaliações (notas de 0 a 5)

Sistema de Comentários e Avaliações:
-Usuários comuns e administradores podem comentar e avaliar os filmes.
-Administradores podem excluir comentários.

Gerenciamento de Filmes:
-Apenas administradores podem criar, editar e excluir filmes.

Categorias:
-CRUD completo, acessível apenas por administradores.


🔐 Autenticação e Segurança

Implementação de envio de e-mails com:
-Confirmação de cadastro via link no e-mail.
-Redefinição de senha com link seguro por e-mail.
-Requisitos de senha forte ativados.
-Remoção do input redundante de e-mail na view ResetPassword.
-Proteção contra CSRF em todos os formulários.
-Uso de middlewares para proteger rotas conforme permissões de acesso.

Organização do Projeto:
-Estruturado segundo o padrão MVC (Model-View-Controller).
-Código limpo, modularizado e preparado para futuras melhorias no frontend.

🎯 Próximos Passos

A partir de agora, o foco será o desenvolvimento frontend deste projeto, bem como o início de novos projetos para ampliar ainda mais o aprendizado.

📝 Funcionalidades Planejadas

Interface de usuário amigável e responsiva.

Melhorias visuais e usabilidade com frameworks CSS/JS.

Integração com outros projetos para explorar conceitos como APIs, SPA, etc.

⚙️ Tecnologias Utilizadas

Laravel

PHP

MySQL

Seeders & Factories

Middleware

Autenticação via e-mail

Blade Templating Engine