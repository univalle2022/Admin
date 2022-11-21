<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/css/baguetteBox.min.css">
    <link rel="stylesheet" href="Assets/css/smoothproducts.min.css">
    <link rel="stylesheet" href="Assets/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="./login.html">Iniciar sesion</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.html">Inicio</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Nosotros.html">Nosotros</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Ofertas.html">Ofertas</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Catalogo.html">Recientes</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Catalogo.html">Catalogo</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="Carrito.html">Carrito</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Contacto.html">Contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page payment-page">
        <section class="clean-block payment-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Factura</h2>
                </div>
                <form>
                    <div class="products">
                        <h3 class="title">Carrito de compras</h3>
                        <div class="item"><span class="price">150 Bs</span>
                            <p class="item-name">Producto 1</p>
                            <p class="item-description">Blusa azul con chaleco</p>
                            <p class="item-description">1 unidad</p>
                        </div>
                        <div class="item"><span class="price">150 Bs</span>
                            <p class="item-name">Producto 1</p>
                            <p class="item-description">Blusa azul con chaleco</p>
                            <p class="item-description">2 unidades</p>
                        </div>
                        <div class="total"><span>Total</span><span class="price">450 Bs</span></div>
                    </div>
                    <div class="card-details">
                        <h3 class="title">Datos de tarjeta de credito</h3>
                        <div class="form-row">
                            <div class="col-sm-7">
                                <div class="form-group"><label for="card-holder">Titular</label><input class="form-control" type="text" placeholder="Card Holder"></div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group"><label>Fecha de expiracion</label>
                                    <div class="input-group expiration-date"><input class="form-control" type="text" placeholder="MM"><input class="form-control" type="text" placeholder="YY"></div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group"><label for="card-number">Numero de trajeta</label><input class="form-control" type="text" placeholder="Card Number" id="card-number"></div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group"><label for="cvc">CVC</label><input class="form-control" type="text" placeholder="CVC" id="cvc"></div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group"><button class="btn btn-primary btn-block" type="button">Comprar</button></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Mayor informacion</h5>
                    <ul>
                        <li><a href="https://wa.me/75881611?text=¡Necesito+hablar+con+un+operador!" target="_blank">Fernando Baldi - 75881611</a></li>
                        <li><a href="https://wa.me/72083638?text=¡Necesito+hablar+con+un+operador!" target="_blank">Johan Arraya - 72083638</a></li>
                        <li><a href="https://wa.me/72083638?text=¡Necesito+hablar+con+un+operador!" target="_blank">Carlos Vallejos - 2001800</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                </br></br>
                    <ul>
                        <li><a href="https://wa.me/73742697?text=¡Necesito+hablar+con+un+operador!" target="_blank">Jhonatan Cordori - 73742697</a></li>
                        <li><a href="https://wa.me/70540655?text=¡Necesito+hablar+con+un+operador!" target="_blank">Mateo de la barra - 70540655</a></li>
                        <li><a href="https://wa.me/67046780?text=¡Necesito+hablar+con+un+operador!" target="_blank">Mateo Ascarrunz - 67046780</a></li>
                    </ul>
                </div> 
                <div class="col-sm-3">
                </br></br>
                    <ul>
                        <li><a href="https://wa.me/61210301?text=¡Necesito+hablar+con+un+operador!" target="_blank">Jorge Flores - 61210301</a></li>
                        <li><a href="https://wa.me/68174137?text=¡Necesito+hablar+con+un+operador!" target="_blank">Jose Mayta - 68174137</a></li>
                        <li><a href="https://wa.me/76233755?text=¡Necesito+hablar+con+un+operador!" target="_blank">Rodrigo Chavez - 76233755</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                </br></br>
                    <ul>
                        <li><a href="https://wa.me/79530061?text=¡Necesito+hablar+con+un+operador!" target="_blank">Amos Paco - 79530061</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2022 Romeo & Julieta &middot; 
            </p>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="Assets/js/script.min.js"></script>
</body>

</html>