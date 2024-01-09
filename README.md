# Api-Investimento
Api criada para armazenar e gerenciar investimentos

## Documentação

### Linguagem e Ferramentas
Para a criação, foram utilizadas como linguagens principais o PHP e o MySQL, e teve como ferramentas o Visual Studio para elaboração da API e o MySQL Workbench.

### Como Funciona
Esta API tem como base calcular e gerenciar investimentos. Para isso, foram criadas duas tabelas no Banco de Dados: uma tabela para o cadastro de usuários (tb_user) e uma tabela para o Investimento (tb_Investimento). Essas tabelas foram desenvolvidas exclusivamente para testar a aplicação.

Inicialmente, é necessário criar um cadastro para que as informações do usuário sejam armazenadas. Para realizar essa operação, foi criada uma página (PgCadastro.php) que se comunica com a página Usuario.php. Esta página, por sua vez, comunica-se com a página Cadastrar para executar o cadastro e salvar no banco de dados. Após a conclusão do cadastro, o usuário será redirecionado para a página de login, onde poderá efetuar o acesso com e-mail e senha. Após o login bem-sucedido, será direcionado para a página Home (TelaHome.php).

Na tela Home, o usuário encontrará campos para digitar o valor do investimento e as datas de início e fim. As datas podem ser atuais, passadas ou futuras. Para realizar um saque, o usuário deverá inserir a data do saque, permitindo que a API identifique o tributo a ser cobrado. Além disso, as datas não devem ser anteriores à data de início ou posteriores à data final preconfigurada.

