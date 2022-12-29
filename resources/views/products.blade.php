@extends('adminlte::page')

@section('title', 'Admin - Productos')

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css">  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
@stop

@section('content_header')
<h1>
    Productos
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-product">
        Crear
    </button>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create-sale">
        Vender
    </button>
</h1>
<hr>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de Productos</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="products" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Valor</th>
                            <th>Peso</th>
                            <th>Categoria</th>
                            <th>Cantidad</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->nombre }}</td>
                            <td>{{ $product->precio }}</td>
                            <td>{{ $product->peso }} gr</td>
                            <td>{{ $product->category->nombre }}</td>
                            <td>{{ $product->cantidad }}</td>
                            <td>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#modal-update-product-{{ $product->id }}"><i class="bi bi-pencil-square"></i></button>
                            </td>
                            <td>
                                <form action="{{ route('products.delete', $product->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <!-- modal update -->
                        @include('modal-update-product')
                        <!-- /.modal update -->
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Valor</th>
                            <th>Peso</th>
                            <th>Categoria</th>
                            <th>Cantidad</th>
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

<!-- modal productos-->
<div class="modal fade" id="modal-create-product">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear Producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('products.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" class="form-control" name="precio" id="precio" required>
                    </div>
                    <div class="form-group">
                        <label for="peso">Peso</label>
                        <input type="number" class="form-control" name="peso" id="peso" placeholder="Gramos" required>
                    </div>
                     <div class="form-group">
                        <label for="category-id">Categoría</label>
                        <select class="form-control" name="categoria_id" id="categoria-id" required>
                            <option value="">-- Elegir Categoría --</option>
                            @foreach ($categories as $category)
                                <option value={{ $category->id }}>{{ $category->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" class="form-control" name="cantidad" id="cantidad" required>
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


<!-- modal ventas-->
<div class="modal fade" id="modal-create-sale">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Vender</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('sales.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Producto</label>
                        <select class="form-control" name="producto_id" id="producto-id" required>
                            <option value="">-- Elegir Producto --</option>
                            @foreach ($products as $product)
                                <option value={{ $product->id }}>{{ $product->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" class="form-control" name="cantidad" id="cantidad" required>
                    </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-outline-primary">Vender</button>
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
    $('#products').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
@stop