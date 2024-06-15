<?=$header?> 
<section class="banner">
    <div class="content-banner">
        <!-- Contenido de tu página aquí -->
        <p>Granos de Cafe Tostados</p>
        <h2 >Tostado por Artesanos</h2>
        <a href="<?=base_url("/Catalogo") ?>">Comprar ahora</a>
    </div>
</section>
    <main class="main-content">
        <section class="container container-feature">
            <!--Tarjetas -->
            <div class="card-feature">
            <i class="fa-solid fa-truck-plane"></i>
                <div class="feature-content">
                    <span>Envios a todo el Pais!</span>
                    <p>No se preocupe por donde se encuentre</p>
                </div>
            </div>
            <div class="card-feature">
            <i class="fa-solid fa-money-bill-transfer"></i>
                <div class="feature-content">
                    <span>Total Garantia!</span>
                    <p>100% de garantia si algo falla</p>
                </div>
            </div>
            <div class="card-feature">
            <i class="fa-solid fa-headset"></i>
                <div class="feature-content">
                    <span>Atencion al Cliente 8:00 - 18:00</span>
                    <p>Llamenos al 0800-123-456</p>
                </div>
            </div>
        </section>
        <!-- seccion de productos -->
        <section class="container categorias">
            <h1 class="encabezado-1">Lo que ofrecemos</h1>
            <div class="container-categorias">
                <div class="card-category category-beans">
                    <p>Granos de Café</p>
                    <span><a href="<?=base_url("/Construccion") ?>"> Ver mas</a></span>
                </div>
                <div class="card-category category-cafeteras">
                    <p>Cafeteras</p>
                    <span><a href="<?=base_url("/Construccion") ?>"> Ver mas</a></span>
                </div>
                <div class="card-category category-tazas">
                    <p>Tazas</p>
                    <span><a href="<?=base_url("/Construccion") ?>"> Ver mas</a></span>
                </div>
            </div>
        </section>
    </main>

<?=$footer?>