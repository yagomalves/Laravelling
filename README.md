🎬 Projeto Laravel - Sistema para Reviews de Filmes

Projeto pessoal desenvolvido em Laravel, iniciado totalmente do zero e sem apoio de cursos ou vídeos, com o objetivo de consolidar meu aprendizado de forma prática e autônoma.

🚀 Contexto do Desenvolvimento

O projeto surgiu como evolução de um CRUD que fiz a partir de tutoriais. Após problemas ao tentar integrar o Laravel Breeze, decidi abandonar a base anterior e recomeçar do zero, aplicando na prática todo o conhecimento adquirido até aqui.

✅ Status Atual

Todas as funcionalidades de backend foram concluídas com sucesso.

O sistema está funcional, testado, com frontend básico e diversas melhorias visuais aplicadas recentemente.

🔄 Alterações deste commit

loader-link adicionado aos botões de login e register, exibindo spinner com texto "aguarde..." até que a requisição seja concluída.

Componente primary-button foi removido para permitir interatividade individual em cada botão.

Arquivo guest.blade.php excluído – a página dashboard agora assume o papel de ambas.

Melhorias visuais na navbar para uma navegação mais clara.

Retoques visuais aplicados em todas as páginas, padronizando estilos.

Carrossel de filmes adicionado à página inicial com Alpine.js.

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

A média das avaliações agora é calculada no controller, e não mais na view.

Avaliações atualizadas em tempo real na página do filme.

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

Requisitos de senha forte aprimorados na alteração de perfil.

Remoção do input redundante de e-mail na view ResetPassword.

Proteção CSRF em todos os formulários.

Uso de middlewares para proteger rotas com base em permissões.

🎠 Experiência Inicial

Adicionado carrossel de filmes na página inicial com Alpine.js.

💡 Nota sobre o Frontend

Este projeto me reaproximou bastante do Tailwind CSS, porém, decidi esperar por concentrar meus esforços em evoluir com frontend e aprofundarei meus conhecimentos desta área no próximo ato.

O próximo projeto terá uma API REST robusta integrada a React ou Vue, com um backend mais complexo e desafiador que acredito que me dará um conhecimento mais robusto e palpável.


📌 Alterações planejadas para o próximo commit

Melhorar carrossel da página dashboard.

Remover validação is_admin dos botões de edição/cadastro e aplicar verificação antes do carregamento da página.

Criar componente reutilizável para o carrossel.

Criar componente para títulos, similar ao uso de x-slot, para padronizar.

⚙️ Tecnologias Utilizadas

Laravel

PHP

MySQL

Blade Templating Engine

Middleware

Autenticação por E-mail

Seeders & Factories

Alpine.js