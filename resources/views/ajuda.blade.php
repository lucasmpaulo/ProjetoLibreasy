@extends('layouts.app')

@section('content')
<div class="container page-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="tabela-custom m-t-md">
                <div class="card-body">
                <div class="header-custom ">
                    <h3 class="pb-2" style="font-size:1.5em; text-align:left; text-transform:capitalize;">
                        Seção de Ajuda
                    </h3>
                </div>
                <div class="secao-ajuda">
                    <p>Nossa seção de ajuda consiste em pequenas descrições das funcionalidades do sistema. Para voltar
                        para a <strong>página inicial</strong> clique no logo <strong>Libreasy</strong>
                    </p>
                    <h4>Criando uma biblioteca</h4>
                    <p>Após estar logado, o usuário será redirecionado para a página principal do 
                        sistema onde serão exibidas as bibliotecas cadastradas. O usuário terá disponível a função para 
                        cadastrar uma nova biblioteca, e no canto superior e direito da tela será exibido o nome da pessoa 
                        logada com a opção de atualizar alguma informação se necessário.</p>
                    <h4>Atualizando Perfil</h4>
                    <p>Caso o usuário desejar atualizar suas informações de cadastro, ele poderá acessar a opção de 
                        editar perfil, clicando sobre o nome exibido, será apresentado as opções disponíveis, basta acessar a 
                        opção de <strong>editar perfil</strong> e será mostrado um formulário com os seus dados atuais, 
                        após reescrever as informações desejadas basta clicar em atualizar para salvar as informações.</p>
                    <h4>Acessando Catálogo</h4>
                    <p>Após cadastrar a biblioteca, clique em <strong>operações</strong> e depois em <strong>acessar</strong>,
                        após acessar a biblioteca, caso possua livros registrado no acervo será apresentado uma listagem 
                        dos mesmos e possui também um campo de pesquisa com alguns filtros para buscar o livro desejado</p>
                    <p>Após ir na opção acessar, possui outras opções de acesso para outros módulos como o das categorias, dos autores, 
                        os alunos, das editoras e os livros.</p>
                    <h4>Cartão de Descrição</h4>
                    <p>Já no cartão que exibe as informações dos livros, tem a função de <strong>atualização</strong> e 
                        <strong>exclusão</strong> diretamente, tem também a opção de acessar as <strong>cópias</strong> 
                        desse livro cadastrado, onde terá a possibilidade de registrar uma <strong>nova cópia</strong> ou <strong>apagar</strong> e <strong>alterar seu status.</strong></p>
                    <h4>Classificação</h4>
                    <p>Após ter acessado uma biblioteca específica poderá <strong>acessar</strong>  as <strong>classificações</strong> desta biblioteca, 
                        ele irá redirecionar para uma página onde exibe as classificações registradas, terá também duas opções 
                        disponíveis, registrar <strong>novas classificações</strong> ou <strong>apagar</strong> alguma já existente</p>
                    <h4>Editoras</h4>
                    <p>Após acessar uma determinada biblioteca vá em <strong>acessar</strong> e clique em 
                        <strong>editoras</strong> o sistema irá redireciona-lo para a página principal das editoras, 
                        lá exibirá as editoras registradas na biblioteca, caso possua alguma editora cadastrada exibirá as 
                        operações disponíveis, as opções serão a <strong>atualização de informações</strong> ou a <strong>exclusão</strong> dessa respectiva editora, tem também outro botão para o cadastro de novas editoras</p>
                    <h4>Campos de Busca</h4>
                    <p>Dentro de cada módulo do sistema tem a disponibilidade de campos de busca, 
                        em cada parte deste módulo tem o seu próprio filtro de pesquisa, podendo assim, escolher a <strong>opção desejada</strong> e 
                        preencher o <strong>campo disponível</strong> e clicar no botão de pesquisar, ele trará um cartão com as informações 
                        daquele respectivo registro, caso exista.</p>
                    <h4>Empréstimos das Cópias</h4>
                    <p> Após ter um livro registrado, poderá ser regisrado suas réplicas, cada um vai receber um código único 
                        e alguns dados do livro original, como o título, o ISBN e também, cada unidade terá uma <strong>situação atual.</strong></p>
                    <p>Quando o status estiver como <strong>disponível</strong> será exibido a opção de <strong>emprestar cópia</strong>, 
                        ele irá solicitar o <strong>nome do aluno</strong> que está emprestando e pedirá para escolher a <strong>data da locação</strong> e a 
                        <strong>data de devolução</strong>, caso se encontre <strong>emprestada</strong> será demonstrado a função para 
                        <strong>devolver a réplica</strong> ao acervo.</p>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
