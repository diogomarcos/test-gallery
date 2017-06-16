## Projeto Test Gallery (Exibição de fotos)

### Breve introdução
Esse projeto tem como a finalidade didática para a exibição de fotos em formato de galeria, além disso o projeto desenvolvimento conta com a listagem das fotos cadastradas com as ações de editar e excluir a foto, e uma página para adicionar novas fotos. Foi utilizado o Composer para fazer o autoloader das classes, além de colocar em prática o conceito MVC e o uso de rotas para facilitar a navegabilidade entre as páginas.

### Regras da aplicação
+ Uma página para para cadastrar uma nova foto
+ Uma página para exibir as fotos em formato de galeria
+ Uma página para listar as fotos cadastradas. Esta listagem deve conter um link para remover a imagem do banco de dados e do disco

### Tecnologias usadas
Para o desenvolmento da aplicação foram utilizadas os seguintes recursos:
+ PHP 7
+ PDO
+ SQLite
+ jQuery

### Ambiente de Desenvolvimento
+ IDE PHPStorm

### Requisitos da Aplicação
+ Git
+ PHP 7

### Execução da Aplicação
1. Através do 'prompt command' ou 'git bash', realize o glone do projeto pelo comando \
`git clone git@github.com:diogomarcos/test-gallery.git test-gallery`
2. Através do 'prompt command' ou 'git bash' navegue até o seguinte diretório `test-gallery\public`
3. Através do 'prompt command' ou 'git bash' execute o seguinte comando `php -S localhost:8181`
4. Em seu navegador de preferência acesso o endereço `http://localhost:8181` para ter acesso a aplicação

### Resultado do Desenvolvimento
+ Página Inícial:
![alt tag](https://raw.githubusercontent.com/diogomarcos/test-gallery/master/public/screens/01-Home.PNG)

+ Página de adicionar fotos:
![alt tag](https://raw.githubusercontent.com/diogomarcos/test-gallery/master/public/screens/02-AdicionarFotos.PNG)

+ Página com a listagens das fotos:
![alt tag](https://raw.githubusercontent.com/diogomarcos/test-gallery/master/public/screens/03-ListarFotos.PNG)

+ Página de atualizar a foto:
![alt tag](https://raw.githubusercontent.com/diogomarcos/test-gallery/master/public/screens/04-AtualizarFoto.PNG)

+ Página com o modal para excluir a foto:
![alt tag](https://raw.githubusercontent.com/diogomarcos/test-gallery/master/public/screens/05-ExcluirFoto.PNG)