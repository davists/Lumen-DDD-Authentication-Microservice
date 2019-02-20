# Petdrive Authentication and Register API Service

A Plataforma digital para o cuidado dos Pets.
Instrucoes: 
 
Criar tabela de cache

Quando criar nova interface lembre de registrar em:     
Application/core/Providers/Domain/NomeDoDominio/NomeDoServicoProvider.php  
Application/bootstrap/app.php
  
Gerar Mapeamentos e Entities
php artisan  doctrine:mapping:import yml ../Infrastructure/Persistence/Doctrine/Mappings/NomeDoDominio --namespace='Domain\NomeDoDominio\Entities\'

php Application/artisan doctrine:generate:entities --generate-methods  

criar senhas com bcrypit  
password_hash("123456", PASSWORD_DEFAULT)  

parametros para logar
{"email":"davi@petdrive.com.br","senha":"123456","platform":"web","permanent":"1"}
