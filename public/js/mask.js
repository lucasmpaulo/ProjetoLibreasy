$(document).ready(function(){
    $("#titulo").on("input", function(){
        var titulo = /[^a-zA-ZÀ-ú 0-9]/g;
        if(this.value.match(titulo)){
          $(this).val(this.value.replace(titulo,''));
        }
    });
    $("#subtitulo").on("input", function(){
        var subtitulo = /[^a-zA-ZÀ-ú 0-9]/g;
        if(this.value.match(subtitulo)){
          $(this).val(this.value.replace(subtitulo,''));
        }
    });
    $("#nome_aluno").on("input", function(){
        var nome_aluno = /[^a-z A-ZÀ-ú]/g;
        
        if(this.value.match(nome_aluno)){
          $(this).val(this.value.replace(nome_aluno,''));
        }
    });
    $("#sobrenome_aluno").on("input", function(){
        var sobrenome_aluno = /[^a-z A-ZÀ-ú]/g;
        if(this.value.match(sobrenome_aluno)){
          $(this).val(this.value.replace(sobrenome_aluno,''));
        }
    });
    $('#telefone_aluno').mask('(00)00000-0000');
    $('#telephone').mask('(00)00000-0000');
    $('#telefoneEditora').mask('(00)00000-0000');
    $('#anoMorte').mask('0000');
    $('#anoNascimento').mask('0000');
    $('#anolivro').mask('0000');
    $('#numpagina').mask('0000');
    $('#isbn').mask('000-00-000-0000-0');
    $('#cep').mask('00000-000');
    $('#cepperfil').mask('00000-000');
    $('#cepEditora').mask('00000-000');
    
    $('#numero_copias').mask('00');
    var mascaras = {
        isbn: '000-00-000-0000-0',
        codigo: '000000',
      }
    $('#filtro').on('change', function() {
      var mask = mascaras[this.value];
      if (mask) $('#buscar').mask(mask);
      else $('#buscar').unmask();
    });
    
    $('#nome_locador').select2();


});

