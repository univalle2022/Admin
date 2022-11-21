<?php

    class Pagos extends Controllers{

        public function __construct() {
            parent::__construct();
            session_start();
            if(empty($_SESSION['login'])){
                header('Location: '.base_url()."/login");
            }
            if(empty($_SESSION["cart_contents"]["total_items"])){
                header('Location: '.base_url()."/catalogo");
               
            }else{
                if($_SESSION["cart_contents"]["total_items"] <= 0){
                    header('Location: '.base_url()."/catalogo");
                }
            }
          

        }

        public function pagos(){

     
            $data['page_tag'] = "pagos";
            $data['page_title']= "pagos";
            $data['page_name'] = "pagos";
            $data['page_js'] = "functionpagos.js";
            $this->views->getview($this,"pagos",$data);
        }

    }
?>