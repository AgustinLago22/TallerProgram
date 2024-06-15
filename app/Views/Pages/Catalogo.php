<?=$header?>

<main class="catalog-container">
    <section class="catalog-section cafe">
        <div class="product-box">
            <h3 class="product-name">Café en Granos</h3>
            <a href="<?= base_url('/listado_productos/1'); ?>" class="product-link">Ver Productos</a>
        </div>
    </section>

    <section class="catalog-section cafeteras">
        <div class="product-box">
            <h3 class="product-name">Cafetera Moka</h3>
            <a href="<?= base_url('listado_productos/2'); ?>" class="product-link">Ver Productos</a>
        </div>
    </section>

    <section class="catalog-section tazas">
        <div class="product-box">
            <h3 class="product-name">Taza Cerámica</h3>
            <a href="<?= base_url('listado_productos/3'); ?>" class="product-link">Ver Productos</a>
        </div>
    </section>
</main>
<?=$footer?>