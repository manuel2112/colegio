@extends('layout')
@section('title','CURSO/ASIGNATURA')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Asignaturas del curso: {{ $curso->CURSO_NOMBRE }}</h1>
            
            <table class="table" id="tblAsignatura">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">CÓDIGO</th>
                        <th scope="col">ASIGNATURA</th>
                        <th scope="col">PROFESOR</th>
                        <th scope="col">ELIMINAR</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse( $asignaturascurso as $asig )
                    <tr>
                        <th scope="row">{{ $contador++ }} </th>
                        <td>{{ nmbAsignaturaByID($asig->ASIGNATURA_ID)->ASIGNATURA_COD }}</td>
                        <td>{{ nmbAsignaturaByID($asig->ASIGNATURA_ID)->ASIGNATURA_NOMBRE }}</td>
                        <td>
                            @if( $asig->FUNCIONARIO_ID )
                                <?php $profesor = funcionario($asig->FUNCIONARIO_ID); ?>
                                {{ $profesor->FUNCIONARIO_AP_PATERNO }} {{ $profesor->FUNCIONARIO_AP_MATERNO }}, {{ $profesor->FUNCIONARIO_NOMBRES }}
                            @else
                                <button type="button" class="btn btn-warning btn-sm btnCallProfesor" data-toggle='modal' data-target='#modalAddProfesor' nombreasignatura="{{ nmbAsignaturaByID($asig->ASIGNATURA_ID)->ASIGNATURA_NOMBRE }}" idasigcurso="{{ $asig->id }}">SELECCIONAR PROFESOR</button>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                @if( $asig->FUNCIONARIO_ID )
                                <button type="button" class="btn btn-warning btn-sm btnCallProfesor" data-toggle='modal' data-target='#modalAddProfesor' nombreasignatura="{{ nmbAsignaturaByID($asig->ASIGNATURA_ID)->ASIGNATURA_NOMBRE }}" idasigcurso="{{ $asig->id }}"><i class="fas fa-chalkboard-teacher"></i></button>
                                @endif

                                <form method="POST" action="{{ route('curso.cursoasignaturadelete', $curso) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="idAsig" value="{{ $asig->id }}">
                                    <button type="submit" class="btn btn-sm btn-danger delete-confirm"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <th colspan='3'>TABLA SIN DATOS</th>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <form method="POST" action="{{ route('curso.cursoasignaturainsert', $curso) }}">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="insAsignatura">Asignatura</label>
                            <select class="form-control chosen-select" id="insAsignatura" name="insAsignatura">
                                <option value="">SELECCIONAR ASIGNATURA</option>
                            @foreach( $asignaturas as $asignatura )
                                <option value="{{ $asignatura->id }}" {{ old('insAsignatura') == $asignatura->id ? 'selected' : ''  }}>
                                {{ $asignatura->ASIGNATURA_COD }} - {{ $asignatura->ASIGNATURA_NOMBRE }}
                                </option>
                            @endforeach
                            </select>
                            {!! $errors->first('insAsignatura','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">GUARDAR</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!--=====================================
MODAL AGREGAR EMPRESA
======================================-->
<div id="modalAddProfesor" class="modal fade" role="dialog">  
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="#" role="form" method="post" id="formAddProfesor">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
			<h4 class="modal-title">AGREGAR PROFESOR A LA ASIGNATURA DE <span id="nmb-asignatura"></span></h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
        	
        	<div class="row">
				
        		<div class="col-12">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id-asignatura" id="id-asignatura">
                    <div class="form-group">
                       <label>SELECCIONAR PROFESOR</label>
                       @foreach( $profesores as $profesor )
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optProfesor"  value="{{ $profesor->id }}">{{ $profesor->FUNCIONARIO_AP_PATERNO }} {{ $profesor->FUNCIONARIO_AP_MATERNO }}, {{ $profesor->FUNCIONARIO_NOMBRES }}
                            </label>
                        </div>
                        @endforeach
                        <div id="error-profesor"></div>
                    </div>
				</div>
        		
        	</div><!-- PIE ROW -->
        
		</div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
			<button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">SALIR</button>
			<button type="button" class="btn btn-primary" id="btnGuardarProfesor">GUARDAR</button>
        </div>

      </form>

    </div>

  </div>

</div>
@endsection

@section('scripts')
<script type="text/javascript">

    $('.chosen-select').chosen(
        {
            no_results_text: "BUSQUEDA, NO EXITOSA"
        }
    );

/*=============================================
GET PROFESORES
=============================================*/
    $(document).ready(function() {
        $("#tblAsignatura").on("click", ".btnCallProfesor", function() {
            $('#formAddProfesor')[0].reset();
            $("#nmb-asignatura").html($(this).attr("nombreasignatura"));
            $("#id-asignatura").val($(this).attr("idasigcurso"));
        });

        /*=============================================
        INSERT PROFESOR
        =============================================*/        
        $("#modalAddProfesor").on("click", "#btnGuardarProfesor", function() {

        var idProfesor      = $('input:radio[name=optProfesor]:checked').val();
        var idAsigCurso    = $('#id-asignatura').val();
        var _token          = $('#token').val();
        var dataString      = { idProfesor: idProfesor, idAsigCurso: idAsigCurso, _token: _token };

        $.ajax({

            url: '/ajaxprofesor',
            method: "POST",
            data: dataString,
            dataType: "json",
            success:  function (response) {
                
                if( response.ok === 1 ){   
                    $("#error-profesor").html('');
                    location.reload();
                }else{   
                    $("#error-profesor").html('<small class="text-danger">SELECCIONAR PROFESOR</small>'); 
                                    
                }
            },
            statusCode: {
                404: function() {
                    alert('web not found');
                }
            },
            error:function(x,xs,xt){
                alert(JSON.stringify(x));
            }

        });

        });        
    }); //FIN DOCUMENT



</script>
@endsection