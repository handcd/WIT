@extends('layouts.appuser')

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="purple">
                <i class="material-icons">new_releases</i>
            </div>
            <div class="card-content">
                <p class="category">Sin Aprobar</p>
                <h3 class="title">{{ $ordenes->where('aprobado',0)->count() }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-info">warning</i> <a href="{{ url('/ordenes') }}">Revisar...</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="orange">
                <i class="material-icons">info_outline</i>
            </div>
            <div class="card-content">
                <p class="category">Órdenes Totales</p>
                <h3 class="title">{{ $ordenes->count() }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">date_range</i> Desde hace un mes
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="green">
                <i class="material-icons">check</i>
            </div>
            <div class="card-content">
                <p class="category">Aprobados</p>
                <h3 class="title">{{ $ordenes->where('aprobado',1)->count() }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">local_offer</i> Desde el principio...
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="blue">
                <i class="material-icons">people</i>
            </div>
            <div class="card-content">
                <p class="category">Clients</p>
                <h3 class="title">{{ \WIT\Client::count() }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">update</i> Apenas actualizado
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header card-chart" data-background-color="green">
                <div class="ct-chart" id="dailySalesChart"></div>
            </div>
            <div class="card-content">
                <h4 class="title">Pedidos Diarios</h4>
                <p class="category">Incremento del <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55%  </span> en los pedidos hoy.</p>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">access_time</i> actualizado hace 5 minutos.
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header card-chart" data-background-color="orange">
                <div class="ct-chart" id="emailsSubscriptionChart"></div>
            </div>
            <div class="card-content">
                <h4 class="title">Nuevos Clientes</h4>
                <p class="category">Nuevos clientes por día</p>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">access_time</i> actualizado hace 3 minutos.
                </div>
            </div>

        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header card-chart" data-background-color="blue">
                <div class="ct-chart" id="completedTasksChart"></div>
            </div>
            <div class="card-content">
                <h4 class="title">Configurador</h4>
                <p class="category">Accesos por hora al configurador</p>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">access_time</i> actualizado hace 3 minutos.
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Ordenes sin Aprobar</h4>
                <p class="category">Ordenes ingresadas al sistema sin cotizar</p>
            </div>
            <div class="card-content table-responsive">
                <table class="table table-hover">
                    <thead>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Fecha de Evento</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($ordenes->where('aprobado',0) as $orden)
                            <tr>
                                <td>{{ $orden->id }}</td>
                                <td><a href="{{ url('/clients/'.$orden->client->id) }}">{{ $orden->client->nombre.' '.$orden->client->apellido }}</a></td>
                                <td>{{ $orden->fecha }}</td>
                                <td class="td-actions text-right">
                                    <a href="{{ url('/ordenes/'.$orden->id) }}" type="button" rel="tooltip" title="Ver Orden" class="btn btn-success btn-simple btn-xs">
                                        <i class="material-icons">remove_red_eye</i>
                                    </a>
                                    <a href="{{ url('/ordenes/'.$orden->id.'/edit') }}" type="button" rel="tooltip" title="Editar Orden" class="btn btn-primary btn-simple btn-xs">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <form action="{{ url('/ordenes/'.$orden->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-simple btn-xs" type="button" rel="tooltip" title="Eliminar Producto"><i class="material-icons">close</i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header" data-background-color="green">
                <h4 class="title">Ordenes Aprobadas</h4>
                <p class="category">Ordenes cotizadas</p>
            </div>
            <div class="card-content table-responsive">
                <table class="table table-hover">
                    <thead>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Fecha de Evento</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($ordenes->where('aprobado',1) as $orden)
                            <tr>
                                <td>{{ $orden->id }}</td>
                                <td><a href="{{ url('/clients/'.$orden->client->id) }}">{{ $orden->client->nombre.' '.$orden->client->apellido }}</a></td>
                                <td>{{ $orden->fecha }}</td>
                                <td class="td-actions text-right">
                                    <a href="{{ url('/ordenes/'.$orden->id) }}" type="button" rel="tooltip" title="Ver Orden" class="btn btn-success btn-simple btn-xs">
                                        <i class="material-icons">remove_red_eye</i>
                                    </a>
                                    <a href="{{ url('/ordenes/'.$orden->id.'/edit') }}" type="button" rel="tooltip" title="Editar Orden" class="btn btn-primary btn-simple btn-xs">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <form action="{{ url('/ordenes/'.$orden->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-simple btn-xs" type="button" rel="tooltip" title="Eliminar Producto"><i class="material-icons">close</i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
