<div class="modal fade" id="modal-update-category-{{ $category->id }}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Categoría</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $category->nombre }}" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    {{-- <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button> --}}
                    <button type="submit" class="btn btn-outline-primary">Actualizar</button>
                </div>
            </form>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>