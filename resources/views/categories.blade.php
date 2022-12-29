@extends('adminlte::page')

@section('title', 'Admin - Categorías')

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css">  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
@stop

@section('content_header')
<h1>
    Categorías
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-category">
        Crear
    </button>
</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de categorías</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="categories" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Categoría</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->nombre }}</td>
                            <td>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#modal-update-category-{{ $category->id }}"><i class="bi bi-pencil-square"></i></button>
                            </td>
                            <td>
                                <form action="{{ route('categories.delete', $category->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <!-- modal update -->
                        @include('modal-update-category')
                        <!-- /.modal update -->
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Categoría</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

<!-- modal -->
<div class="modal fade" id="modal-create-category">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear Categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('categories.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Categoría</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
                </div>
            </form>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@stop

@section('js')
<script>
$(document).ready(function() {
    $('#categories').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
@stop