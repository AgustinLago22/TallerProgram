
<div class= fondo-gestores>
    <div class="coffee-product-add-container">
        <h2 class="coffee-product-add-title">Agregar Producto</h2>
        <?php if (!empty($error)): ?>
                <div class="alert alert-danger">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($mensaje)): ?>
                <div class="alert alert-success">
                    <?= $mensaje ?>
                </div>
            <?php endif; ?>
        <form class="coffee-product-add-form" action="<?=base_url('/guardarProducto') ?>" method="post">
            <div class="coffee-form-group">
                <label for="coffee-product-name">Nombre:</label>
                <input type="text" name="nombre" id="coffee-product-name" required>
            </div>
            <div class="coffee-form-group">
                <label for="coffee-product-description">Descripción:</label>
                <textarea name="descripcion" id="coffee-product-description" rows="4" required></textarea>
            </div>
            <div class="coffee-form-group">
                <label for="coffee-product-price">Precio:</label>
                <input type="number" name="precio" id="coffee-product-price" step="0.01" required>
            </div>
            <div class="coffee-form-group">
                <label for="coffee-product-stock">Stock:</label>
                <input type="number" name="stock" id="coffee-product-stock" required>
            </div>
            <div class="coffee-form-group">
                <label for="coffee-product-category">Categoría:</label>
                <select name="categoriaID" id="coffee-product-category" required>
                    <option value="1">Café</option>
                    <option value="2">Cafetera</option>
                    <option value="3">Tazas</option>
                </select>
            </div>
            <div class="coffee-form-group">
                <label for="coffee-product-image">Imagen:</label>
                <input type="file" name="img" id="coffee-product-image" accept="image/*">
            </div>
            <div class="coffee-form-group">
                <label for="coffee-product-category">Categoría:</label>
                <select name="activado" id="coffee-product-category" required>
                    <option value="0">Desactivado</option>
                    <option value="1">Activado</option>
                </select>
            </div>
            <button type="submit" class="coffee-submit-button">Agregar Producto</button>
        </form>
    </div>
</div>