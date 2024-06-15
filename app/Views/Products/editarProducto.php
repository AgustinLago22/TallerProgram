<div class='fondo-gestores'>
    <div class="coffee-product-edit-container">
        <h2 class="coffee-product-edit-title">Editar Producto</h2>
        <form class="coffee-product-edit-form" action="<?= base_url('/updateProducto') ?>" method="post">
            <input type="hidden" name="id" value="<?= esc($product['id']); ?>"> <!-- Aquí va el ID del producto a editar -->
            
            <div class="coffee-product-form-group">
                <label for="coffee-product-nombre-label">Nombre:</label>
                <input type="text" name="nombre" id="coffee-product-nombre-label" value="<?= esc($product['nombre']); ?>" required>
            </div>
            
            <div class="coffee-product-form-group">
                <label for="coffee-product-descripcion-label">Descripción:</label>
                <textarea name="descripcion" id="coffee-product-descripcion-label" rows="4" required><?= esc($product['descripcion']); ?></textarea>
            </div>
            
            <div class="coffee-product-form-group">
                <label for="coffee-product-precio-label">Precio:</label>
                <input type="number" name="precio" id="coffee-product-precio-label" step="0.01" value="<?= esc($product['precio']); ?>" required>
            </div>
            
            <div class="coffee-product-form-group">
                <label for="coffee-product-stock-label">Stock:</label>
                <input type="number" name="stock" id="coffee-product-stock-label" value="<?= esc($product['stock']); ?>" required>
            </div>
            
            <div class="coffee-product-form-group">
                <label for="coffee-product-categoria-label">Categoría:</label>
                <select name="categoriaID" id="coffee-product-categoria-label" required>
                    <option value="1" <?= $product['categoriaID'] == 1 ? 'selected' : ''; ?>>Café</option>
                    <option value="2" <?= $product['categoriaID'] == 2 ? 'selected' : ''; ?>>Cafetera</option>
                    <option value="3" <?= $product['categoriaID'] == 3 ? 'selected' : ''; ?>>Tazas</option>
                </select>
            </div>
            
            <div class="coffee-product-form-group">
                <label for="coffee-product-img-label">Imagen:</label>
                <input type="file" name="img" id="coffee-product-img-label" accept="image/*">
            </div>
            
            <div class="coffee-product-form-group">
                <label for="coffee-product-categoria-label">Categoría:</label>
                <select name="activado" id="coffee-product-categoria-label" required>
                    <option value="1" <?= $product['activado'] == 1 ? 'selected' : ''; ?>>Activado</option>
                    <option value="0" <?= $product['activado'] == 0 ? 'selected' : ''; ?>>Desactivado</option>
                </select>
            </div>
            
            <button type="submit" class="coffee-submit-button">Guardar Cambios</button>
        </form>
    </div>
</div>
