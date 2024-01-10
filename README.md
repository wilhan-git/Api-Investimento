# Api-Investimento
Api criada para armazenar e gerenciar investimentos

## Documentação

### Linguagem e Ferramentas
Para a criação, foram utilizadas como linguagens principais o PHP e o MySQL, e teve como ferramentas o Visual Studio para elaboração da API e o MySQL Workbench.

### Modo de Uso
Esta API tem como base calcular e gerenciar investimentos. Para isso, foram criadas duas tabelas no Banco de Dados: uma tabela para o cadastro de usuários (tb_user) e uma tabela para o Investimento (tb_Investimento). Essas tabelas foram desenvolvidas exclusivamente para testar a aplicação.

Inicialmente, é necessário criar um cadastro para que as informações do usuário sejam armazenadas. Para realizar essa operação, foi criada uma página (PgCadastro.php) que se comunica com a página Usuario.php. Esta página, por sua vez, comunica-se com a página Cadastrar para executar o cadastro e salvar no banco de dados. Após a conclusão do cadastro, o usuário será redirecionado para a página de login, onde poderá efetuar o acesso com e-mail e senha. Após o login bem-sucedido, será direcionado para a página Home (TelaHome.php).

Na tela Home, o usuário encontrará campos para digitar o valor do investimento e as datas de início e fim. As datas podem ser atuais, passadas ou futuras. Para realizar um saque, o usuário deverá inserir a data do saque, permitindo que a API identifique o tributo a ser cobrado. Além disso, as datas não devem ser anteriores à data de início ou posteriores à data final preconfigurada, foi adicionado um link que leva o usuario ate uma pagina com a listagem dos seus investimentos já feitos, incluindo os que ainda não foi sacado, foi criado um limit de registros por 'pagina', se o usuario quiser podera clicar em proximo para visualizar os outros registros, se ouver. Para voltar o usuario precisa somente clicar em voltar, ou podera clicar em voltar para pagina Principal, para voltar direto para pagina Principa('TelaHome.php').


### Como Funciona
Essa Api foi utilizado a arquitetura MVC para organização do codigo, PDO para Desenvolvimento e para tratamento de Erros foi utilizado o Try Catch. Para Cadastrar, o Usuario deve clicar no botão Cadastrar, com isso e feito uma requisição para a Classe Usuario encontrada na pagina(Usuario.php), essa clase se extende com a classe User da pagina('PgCadastro.php') que se comunica com o BD gravando o Usuario no Banco ou retornando um erro. 

Para Efetuar Login se faz nescessario a informaçao do login e Senha. nela E feito uma requisição para a classe Login passando os parametros(email,senha), A classe login se estende com a classe ValidaLogin informando os paramentros, essa clase chama uma função chamada Valida, que ao executar busca o registro com a informação do login correspondente e logo apos verifica se as senhas se corespondem, validando e retornado um valor verdadeiro onde a index redieciona para a pagina principal.


Na tela Principal e Possivel visualizar o Valor Em caixa e Tambem e possivel Fazer o investimento, todo investimento que for sendo feito aparecera abaixo do formulario do investimento com um botão de Sacar e um campo para informação da data de saque. Para conseguir Criar um investimento o Usuario devera informar uum valor e as datas correspondentes, ao clicar em investir, será feito uma requisição para classe Investimento que ativa uma função criar, essa função chama uma requisição a classe Investir passando todos os parametros necessarios, essa classe ativa uma função investe, essa função tem como base se comunicar com o BD e Realizar a gravação do investimento, realizando esse processo e feito um retorno verdadeiro.

Se ouver algum investimento disponivel para saque, o usuario pode sacar informando a data de retirada, assim que ele cicar em sacar, será feito uma requisição para classe ContaUser acionando a função sacar, essa função por sua Vez se comunica com a classe Investir, ao comunicar e feito a ativação da função saqueInvest, essa função tem como base a atualização do invvestimento em questão, ela utiliza do paramentro idInvestimento e o id USer para conseguir localizar o registro Correto dentro do banco, ao localizar e feito a atualização dos dados como valor já tributado, e data de retirada.

Na pagina de listagem de Investimento a classe Lista ja faz uma requisição pela função lilstaLimitada, para buscar o numero especificado de registros por paginas, para ser feito a Paginação dos dados e nescessario, que seja realizado uma oura consulta buscando todos os registros referente ao usuario e feita uma conta simples para definir o total de paginas necessarias, esse total e passado para uma vriavel que faz o controle de toda lista.



