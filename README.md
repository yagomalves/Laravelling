🎬 Projeto Laravel - Sistema para Reviews de Filmes

Projeto pessoal desenvolvido em Laravel, iniciado totalmente do zero e sem apoio de cursos ou vídeos, com o objetivo de consolidar meu aprendizado de forma prática e autônoma.

🚀 Contexto do Desenvolvimento

O projeto surgiu como evolução de um CRUD que fiz a partir de tutoriais. Após problemas ao tentar integrar o Laravel Breeze, decidi abandonar a base anterior e recomeçar do zero, aplicando na prática todo o conhecimento adquirido até aqui.

✅ Status Atual (terceiro commit)

Todas as funcionalidades de backend foram concluídas com sucesso.

O sistema está funcional, testado e com frontend reduzido.

Alterações e melhorias recentes foram aplicadas com base em testes manuais e revisão de código

🔧 Funcionalidades Implementadas
📽️ Página de Filmes

Exibição com:

Cartazes

Título

Descrição

Ano de lançamento

Categorias

Comentários

Avaliações (notas de 0 a 5)

⭐ Sistema de Avaliações

Cada usuário pode avaliar um filme apenas uma vez.

A média das avaliações agora é calculada diretamente no controller, e não mais via PHP na view.

Avaliações visíveis em tempo real na página do filme.

💬 Comentários

Usuários autenticados (comuns e admins) podem comentar.

Administradores podem excluir comentários inadequados.

🎬 Gerenciamento de Filmes

CRUD completo de filmes disponível apenas para administradores.

🏷️ Categorias

CRUD de categorias com acesso restrito a administradores.

🔐 Autenticação e Segurança

Sistema de registro com confirmação de e-mail via link.

Redefinição de senha segura por e-mail.

Requisitos de senha forte melhorados na seção de alteração de senha do perfil.

Remoção do input redundante de e-mail na view ResetPassword.

Proteção CSRF em todos os formulários.

Uso de middlewares para proteger rotas com base em permissões de acesso.

🎠 Experiência Inicial

Adicionado carrossel de filmes na página inicial com Alpine.js.


💡 Nota: O frontend atual ainda deixa a desejar. Por enquanto, não investirei em aprimorar o Tailwind CSS, pois decidi concentrar meus esforços em evoluir com JavaScript puro.
O próximo projeto terá uma API REST robusta integrada a React ou Vue, com um backend mais complexo e desafiador.

Num futuro próximo, pretendo retornar a este projeto para lapidar a parte visual com Tailwind, unificando backend sólido com uma interface moderna e responsiva.


⚙️ Tecnologias Utilizadas

Laravel

PHP

MySQL

Blade Templating Engine

Middleware

Autenticação por E-mail

Seeders & Factories

Alpine.js

Se você leu até aqui, obrigado! Este repositório é um reflexo do meu esforço contínuo para crescer como desenvolvedor, aprendendo com cada erro e cada linha de código escrita do zero. 🚀