<?php

Route::get('/', function () {
    return view('welcome');
});


// Rotas autenticadas
Auth::routes();

// Rotas de Home
Route::get('/home', 'HomeController@indexView')->name('home');
Route::get('/sobre', 'HomeController@sobre')->name('sobre');

// Atualizar Perfil
Route::prefix('/perfil')->group(function(){
    Route::get('/editar/{id}', 'AtualizarPerfilController@editar')->name('editar.perfil');
    Route::post('/atualizar/{id}', 'AtualizarPerfilController@atualizar')->name('atualizar.perfil');
});

// Rotas de biblioteca
Route::prefix('bibliotecas')->group(function() {
    Route::get('/biblioteca', 'BibliotecaController@index')->name('biblioteca');
    Route::get('/mostrarbiblioteca/{id}', 'BibliotecaController@mostrar')->name('lista.bibliotecas');
    Route::get('/mostrarbiblioteca/{id}/pesquisar', 'BibliotecaController@pesquisar')->name('pesquisar');
    Route::get('/biblioteca/novo', 'BibliotecaController@novo');
    Route::post('/biblioteca', 'BibliotecaController@criar');
    Route::get('/editar/{id}', 'BibliotecaController@editar');
    Route::post('/biblioteca/{id}', 'BibliotecaController@atualizar');
    Route::get('/apagar/{id}', 'BibliotecaController@apagar')->name('apagar.biblioteca');

    // Rota dos Autores
    Route::get('/biblioteca/{id}/autor', 'AutorController@index')->name('lista.autores');
    Route::get('/biblioteca/{id}/autor/pesquisar', 'AutorController@pesquisar')->name('pesquisar.autor');
    Route::get('/biblioteca/{id}/autor/novo', 'AutorController@novo');
    Route::post('/biblioteca/{id}/autor/criar', 'AutorController@criar')->name('criar.autor');
    Route::get('/autor/apagar/{autor}', 'AutorController@apagar')->name('apagar.autor');
    Route::get('/biblioteca/{id}/autor/editar/{autor}', 'AutorController@editar')->name('editar.autor');
    Route::post('/biblioteca/{id}/autor/atualizar/{autor}', 'AutorController@atualizar')->name('atualizar.autor');

    // Rotas Categoria
    Route::get('/biblioteca/{id}/categoria', 'CategoriaController@index')->name('lista.categorias');
    Route::get('/biblioteca/{id}/categoria/novo' ,'CategoriaController@novo')->name('nova.categoria');
    Route::post('/biblioteca/{id}/categoria/criar', 'CategoriaController@criar')->name('criar.categoria');
    Route::get('/biblioteca/{id}/categoria/apagar/{categoria}', 'CategoriaController@apagar')->name('apagar.categoria');

    // Rotas Livros
    Route::get('/biblioteca/{id}/livro', 'LivroController@index')->name('lista.livros');
    Route::get('/biblioteca/{id}/livro/{livro}/visualizar', 'LivroController@visualizar')->name('visualizar.livro');
    Route::get('/biblioteca/{id}/livro/novo', 'LivroController@novo')->name('novo.livro');
    Route::post('/biblioteca/{id}/livro/criar', 'LivroController@criar')->name('criar.livro');
    Route::get('/biblioteca/{id}/livro/editar/{livro}', 'LivroController@editar')->name('editar.livro');
    Route::post('/biblioteca/{id}/livro/atualizar/{livro}', 'LivroController@atualizar')->name('atualizar.livro');
    Route::get('/biblioteca/{id}/livro/apagar/{livro}', 'LivroController@apagar')->name('apagar.livro');

    // Rota Cópias
    Route::get('/biblioteca/{id}/livro/{livro}/copia', 'CopiaController@index')->name('lista.copias');
    Route::get('/biblioteca/{id}/livro/{livro}/copia/apagar/{copia}', 'CopiaController@apagar')->name('apagar.copia');
    Route::get('/biblioteca/{id}/livro/{livro}/copia/novo', 'CopiaController@novo')->name('nova.copia');
    Route::post('/biblioteca/{id}/livro/{livro}/copia/criar', 'CopiaController@criar')->name('criar.copia');
    Route::get('/biblioteca/{id}/livro/{livro}/copia/editar/{copia}', 'CopiaController@editar')->name('editar.copia');
    Route::post('/biblioteca/{id}/livro/{livro}/copia/atualizar/{copia}', 'CopiaController@atualizar')->name('atualizar.copia');

    // Rotas Editora
    Route::get('/biblioteca/{id}/editora', 'EditoraController@index')->name('lista.editoras');
    Route::get('/biblioteca/{id}/editora/pesquisar', 'EditoraController@pesquisar')->name('pesquisar.editora');
    Route::get('/biblioteca/{id}/editora/novo', 'EditoraController@novo')->name('nova.editora');
    Route::post('/biblioteca/{id}/editora/criar', 'EditoraController@criar')->name('criar.editora');
    Route::get('/biblioteca/{id}/editora/apagar/{editora}', 'EditoraController@apagar')->name('apagar.editora');
    Route::get('/biblioteca/{id}/editora/editar/{editora}', 'EditoraController@editar')->name('editar.editora');
    Route::post('/biblioteca/{id}/editora/atualizar/{editora}', 'EditoraController@atualizar')->name('atualizar.editora');

    // Rotas Locação
    Route::get('/biblioteca/{id}/locacao', 'LocacaoController@index')->name('lista.locacao');
    Route::get('/biblioteca/{id}/copia/{copia}/locacao/nova', 'LocacaoController@novo')->name('nova.locacao');
    Route::post('/biblioteca/{id}/copia/{copia}/locacao/locar', 'LocacaoController@criar')->name('criar.locacao');
    Route::post('/biblioteca/{id}/copia/{copia}/devolver', 'LocacaoController@devolver')->name('devolver.locacao');

    // Rotas Alunos
    Route::get('/biblioteca/{id}/aluno', 'AlunoController@index')->name('lista.alunos');
    Route::get('/biblioteca/{id}/aluno/pesquisar', 'AlunoController@pesquisar')->name('pesquisar.aluno');
    Route::get('/biblioteca/{id}/aluno/novo', 'AlunoController@novo')->name('novo.aluno');
    Route::post('/biblioteca/{id}/aluno/criar', 'AlunoController@criar')->name('criar.aluno');
    Route::get('/biblioteca/{id}/aluno/{aluno}/editar', 'AlunoController@editar')->name('editar.aluno');
    Route::post('/biblioteca/{id}/aluno/{aluno}/atualizar', 'AlunoController@atualizar')->name('atualizar.aluno');
    Route::get('/biblioteca/{id}/aluno/{aluno}/apagar', 'AlunoController@apagar')->name('apagar.aluno');
});


