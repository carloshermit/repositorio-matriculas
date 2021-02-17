$(document).ready(function(){
    $('#Nivel').on('change', function(){
      var codNivel = $(this).val();
      if($.trim(codNivel) != ''){
        $.get('/listarGrados/'+codNivel, function(data){
          $('#Grado').empty();
          $('#Grado').append("<option value=''>Selecciona un grado </option>");
          $.each(data, function(i, item) {
            $('#Grado').append("<option value='" + data[i].codgrado + "'>"+ data[i].descripcion + "</option>");
          })
        });
      }
    });
  });

$(document).ready(function(){
    $('#Grado').on('change', function(){
      var codNivel = $(this).val();
      if($.trim(codNivel) != ''){
        $.get('/listarSecciones/'+codNivel, function(data){
          $('#Seccion2').empty();
          $('#Seccion2').append("<option value=''>Selecciona una seccion</option>");
          $.each(data, function(i, item) {
            $('#Seccion2').append("<option value='" + data[i].codseccion + "'>"+ data[i].descripcion + "</option>");
          })
        });
      }
    });
  });


  $(document).ready(function(){
    $('#Grado').on('change', function(){
      var codGrado = $(this).val();
      if($.trim(codGrado) != ''){
        $.get('/listarSecciones/'+codGrado, function(data){
            console.log(data);
          $('#Seccion').html("");
            for(var i=0;i<data.length;i++){
                var tr = `<tr>
                
                <td>`+data[i].descripcion+`</td>
                <td><a href=seccion/`+data[i].codseccion +`/edit class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
                <a href=seccion/`+data[i].codseccion +`/confirmar class="btn btn-danger btn-sm"><i class="fas fa-edit"></i>Eliminar</a> </td>
                </tr>`;
                $("#Seccion").append(tr)
            }
        });
      }
    });
  });

  $(document).ready(function(){
    $('#Pais2').on('change', function(){
      var codPais  = $(this).val();
      if($.trim(codPais) != ''){
        $.get('/listarDepartamentos/'+codPais, function(data){
          $('#Departamento2').empty();
          $('#Departamento2').append("<option value=''>Selecciona un departamento </option>");
          $.each(data, function(i, item) {
            $('#Departamento2').append("<option value='" + data[i].coddepartamento + "'>"+ data[i].descripcion + "</option>");
          })
        });
      }
    });
  });

  $(document).ready(function(){
    $('#Pais').on('change', function(){
      var codPais  = $(this).val();
      if($.trim(codPais) != ''){
        $.get('/listarDepartamentos/'+codPais, function(data){
          $('#Departamento').empty();
          $('#Departamento').append("<option value=''>Selecciona un departamento </option>");
          $.each(data, function(i, item) {
            $('#Departamento').append("<option value='" + data[i].coddepartamento + "'>"+ data[i].descripcion + "</option>");
          })
        });
      }
    });
  });

  $(document).ready(function(){
    $('#Departamento2').on('change', function(){
      var codDepartamento = $(this).val();
      if($.trim(codDepartamento) != ''){
        $.get('/listarProvincias/'+codDepartamento, function(data){
            console.log(data);
          $('#Provincia2').html("");
            for(var i=0;i<data.length;i++){
                var tr = `<tr>
                <td>`+data[i].codprovincia+`</td>
                <td>`+data[i].descripcion+`</td>
                </tr>`;
                $("#Provincia2").append(tr)
            }
        });
      }
    });
  });

  
  $(document).ready(function(){
    $('#Departamento').on('change', function(){
      var codPais  = $(this).val();
      if($.trim(codPais) != ''){
        $.get('/listarProvincias/'+codPais, function(data){
          $('#Provincia').empty();
          $('#Provincia').append("<option value=''>Selecciona una provincia </option>");
          $.each(data, function(i, item) {
            $('#Provincia').append("<option value='" + data[i].codprovincia + "'>"+ data[i].descripcion + "</option>");
          })
        });
      }
    });
  });


  
  $(document).ready(function(){
    $('#Provincia').on('change', function(){
      var codPais  = $(this).val();
      if($.trim(codPais) != ''){
        $.get('/listarDistritos/'+codPais, function(data){
          $('#Distrito').empty();
          $('#Distrito').append("<option value=''>Selecciona un distrito </option>");
          $.each(data, function(i, item) {
            $('#Distrito').append("<option value='" + data[i].coddistrito + "'>"+ data[i].descripcion + "</option>");
          })
        });
      }
    });
  });




  function FbotonOn() {
    var codAlumno = document.getElementById('codalumno').value;
    console.log(codAlumno);
    $.get('/buscarAlumno/'+codAlumno, function(data){
      console.log(data);
      $('#appaterno').val(data[0].apellidopaterno);
      $('#apmaterno').val(data[0].apellidomaterno);
      $('#nombre1').val(data[0].primernombre);
      $('#nombre2').val(data[0].otrosnombres);
    })
  }