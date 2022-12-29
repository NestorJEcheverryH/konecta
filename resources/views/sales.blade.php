@extends('adminlte::page')

@section('title', 'Admin - Ventas')

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css">  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de Ventas</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="sales" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sales as $sales)
                        <tr>
                        	<td>{{ $sales->id }}</td>
                            <td>{{ $sales->product->nombre }}</td>
                            <td>{{ $sales->cantidad }}</td>
                            <td>{{ $sales->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Fecha</th>
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
@stop

@section('js')
<script>
$(document).ready(function() {
    $('#sales').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
@stop