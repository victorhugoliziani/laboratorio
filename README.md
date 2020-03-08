
<h1>Instalação do ambiente</h1>
<p>git clone https://github.com/victorhugoliziani/laboratorio.git</p>
<p>cd /laboratorio</p>
<p>npm install</p>
<p>npm run dev</p>
<p>composer install</p>
<p>Renomear o arquivo <strong>.env.example</strong> que fica na raiz para <strong>.env</strong></p>
<p>Abrir o arquivo <strong>.env</strong> e editar a conexão com o banco, colocando o <strong>host, nome do banco e senha</strong></p>
<p>Rodar o comando <strong>php artisan migrate</strong> (Vai criar as tabelas automaticas que estão em database/migration)</p>
<p>Rodar o comando <strong>php artisan db:seed</strong> (Vai popular as tabelas médico, pacientes, posto de coletas e exames)</p>
<p>Rodar o comando <strong>php artisan server</strong> (vai startar o projeto, no terminal aparece a porta que está rodando, mas geralmente em localhost:8000)</p>
