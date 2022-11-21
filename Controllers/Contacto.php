<?php 
    class Contacto extends Controllers{
        public function __construct() {
            parent::__construct();
        }
        public function contacto(){

            $data['page_id'] = 2;
            $data['page_tag'] = "Contacto";
            $data['page_title']= "Pagina Contactos";
            $data['page_name'] = "Contacto";
            $data['page_content'] = "Lorem Ipsum is simply dumamy text; aute irure dolor in reprehenderit."; 
            $this->views->getview($this,"contacto",$data);
        }


    }
?>