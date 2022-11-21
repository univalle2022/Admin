<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de compras</title>
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
    <main class="page shopping-cart-page">
        <section class="clean-block clean-cart dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Carrito de compras</h2>
                </div>
                <div class="content">
                    <div class="row no-gutters">
                        <div class="col-md-12 col-lg-8">
                            <div class="items">
                                <div class="product">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="Assets/img/Ropa/ropa1.jpg"></div>
                                        </div>
                                        <div class="col-md-5 product-info"><a href="#" class="product-name">Blusa azul</a>
                                            <div class="product-specs">
                                                <div><span>Color:&nbsp;</span><span class="value">azul</span></div>
                                                <div><span>Talla:&nbsp;</span><span class="value">L</span></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity">Cantidad</label><input type="number" value="1" id="number" class="form-control quantity-input"></div>
                                        <div class="col-6 col-md-2 price"><span>150 Bs</span></div>
                                    </div>
                                </div>
                                <div class="product">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="Assets/img/Ropa/ropa1.jpg"></div>
                                        </div>
                                        <div class="col-md-5 product-info"><a href="#" class="product-name">Blusa azul</a>
                                            <div class="product-specs">
                                                <div><span>Color:&nbsp;</span><span class="value">azul</span></div>
                                                <div><span>Talla:&nbsp;</span><span class="value">L</span></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity">Cantidad</label><input type="number" value="1" id="number" class="form-control quantity-input"></div>
                                        <div class="col-6 col-md-2 price"><span>150 Bs</span></div>
                                    </div>
                                </div>
                                <div class="product">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="Assets/img/Ropa/ropa1.jpg"></div>
                                        </div>
                                        <div class="col-md-5 product-info"><a href="#" class="product-name">Blusa azul</a>
                                            <div class="product-specs">
                                                <div><span>Color:&nbsp;</span><span class="value">azul</span></div>
                                                <div><span>Talla:&nbsp;</span><span class="value">L</span></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity">Cantidad</label><input type="number" value="1" id="number" class="form-control quantity-input"></div>
                                        <div class="col-6 col-md-2 price"><span>150 Bs</span></div>
                                    </div>
                                </div>
                              
                                
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="summary">
                                <h3>TOTAL</h3>
                                <h4><span class="text">Subtotal</span><span class="price">150 Bs</span></h4>
                                <h4><span class="text">Descuento</span><span class="price">Si</span></h4>
                                <h4><span class="text">Total</span><span class="price">0 Bs</span></h4>
                                <a href="./Factura.html"><button class="btn btn-primary btn-block btn-lg" type="button">Comprar en linea</button></a>
                                <button class="btn btn-primary btn-block btn-lg" type="button">Reservar</button>
                            </div>
                        </div>
                    </div>
                </div>
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