<?php 
    class Nosotros extends Controllers{
        public function __construct() {
            parent::__construct();
        }
        public function nosotros(){

            $data['page_id'] = 1;
            $data['page_tag'] = "nosotros";
            $data['page_title']= "Pagina Principal";
            $data['page_name'] = "nosotros";
            $data['page_content'] = "Lorem Ipsum is simply dumamy text; aute irure dolor in reprehenderit."; 
            $this->views->getview($this,"nosotros",$data);
        }


    }
?>