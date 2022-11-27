<?php
headerprincipal($data);

?>

<main class="page catalog-page">
    <?php
    getmodal('modaldetalles', $data);
    ?>
    <section class="clean-block clean-catalog dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Catalogo</h2>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="content h-100">
                        <div class="d-none d-md-block">
                            <div class="filters">
                                <h3>Categorias</h3>
                                <div class="categoriaslist">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row catalogolist"></div>
                </div>
            </div>
        </div>
    </section>
</main>


<?php
footerprincipal($data);

?>