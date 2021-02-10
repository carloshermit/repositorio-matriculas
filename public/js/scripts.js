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
      var codGrado = $(this).val();
      if($.trim(codGrado) != ''){
        $.get('/listarSecciones/'+codGrado, function(data){
            console.log(data);
          $('#Seccion').html("");
            for(var i=0;i<data.length;i++){
                var tr = `<tr>
                
                <td>`+data[i].descripcion+`</td>
                <td><a href="" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
                <a href="" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i>Eliminar</a> </td>
                </tr>`;
                $("#Seccion").append(tr)
            }
        });
      }
    });
  });

