<?php 
    class Ofertas extends Controllers{
        public function __construct() {
            parent::__construct();
        }
        public function ofertas(){

            $data['page_id'] = 3;
            $data['page_tag'] = "Ofertas";
            $data['page_title']= "Pagina Ofertas";
            $data['page_name'] = "Ofertas";
            $data['page_content'] = "Lorem Ipsum is simply dumamy text; aute irure dolor in reprehenderit."; 
            $this->views->getview($this,"ofertas",$data);
        }


    }
?>