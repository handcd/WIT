@extends('layouts.appuser')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header" data-background-color="wit">
                <h4 class="title">Registrar nuevo producto</h4>
                <p class="category">Registrar un nuevo producto en el sistema.</p>
            </div>
            <div class="card-content">
                <form action="/productos/@yield('editId')" method="post">
                    {{ csrf_field() }}
                    @section('editMethod')
                        @show
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Nombre del Producto:</label>
                                <input name="nombre" type="text" class="form-control"  required="true" value="@yield('editNombre')">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Descripción:</label>
                                <input  name="descripcion" type="text" class="form-control" required="true" value="@yield('editDescripcion')">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Precio:</label>
                                <input name="precio" type="number" class="form-control" min="0.00"  value="@yield('editPrecio')">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label  class="control-label">Selecciona el campo:</label>
                                <select class="form-control" name="campo">
                                    @foreach ($campos as $campo)
                                        <option value="{{ $campo->id }}">{{ $campo->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">Subir</button>
                    <a href="{{ url('/productos') }}" class="btn btn-default">Cancelar</a>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection