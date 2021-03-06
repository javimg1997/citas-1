@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Citas</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'citas.create', 'method' => 'get','class'=>'inline-important']) !!}
                        {!!   Form::submit('Crear cita', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}
                        {!! Form::open(['route' => 'citas.muestra_historial_citas', 'method' => 'get','class'=>'inline-important']) !!}
                        {!!   Form::submit('Historial citas', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha</th>
                                <th>Hora fin</th>
                                <th>Lugar</th>
                                <th>Medico</th>
                                <th>Paciente</th>
                                <th colspan="2">Acciones</th>

                            </tr>

                            @foreach ($citas as $cita)




                                <tr>
                                    <td>{{ (new DateTime($cita->fecha_hora))->format('d-m-Y H:i:s') }}</td>
                                    <td>{{ (new Datetime($cita->fecha_hora))->add (new DateInterval('PT15M'))->format ('d-m-Y H:i:s') }}</td>
                                    <td>{{ $cita->localizacion }}</td>
                                    <td>{{ $cita->medico->full_name }}</td>
                                    <td>{{ $cita->paciente->full_name}}</td>

                                    <td>
                                        {!! Form::open(['route' => ['citas.edit',$cita->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['citas.destroy',$cita->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>

                                </tr>

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection