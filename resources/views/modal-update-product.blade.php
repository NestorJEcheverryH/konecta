<div class="modal fade" id="modal-update-product-{{ $product->id }}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $product->nombre }}" required>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" class="form-control" name="precio" id="precio" value="{{ $product->precio }}"  required>
                    </div>
                    <div class="form-group">
                        <label for="peso">Peso</label>
                        <input type="number" class="form-control" name="peso" id="peso" placeholder="Gramos" value="{{ $product->peso }}"  required>
                    </div>
                     <div class="form-group">
                        <label for="category-id">Categoría</label>
                        <select class="form-control" name="categoria_id" id="categoria-id" required>
                            <option value={{ $product->category->id }}>{{ $product->category->nombre }}</option>
                            @foreach ($categories as $category)
                                <option value={{ $category->id }}>{{ $category->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" class="form-control" name="cantidad" id="cantidad" value="{{ $product->cantidad }}" required>
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