<?php 
    class Dashboard extends Controllers{
        public function __construct() {
            parent::__construct();
            session_start();
            if(empty($_SESSION['login'])){
                header('Location: '.base_url()."/login");
            }
            getpermisos(1);
        }
        public function dashboard(){

            $data['page_id'] = 2;
            $data['page_tag'] = "Dashboard - Tienda Virtual";
            $data['page_title']= "Dashboard - Tienda Virtual";
            $data['page_name'] = "dashboard";
            $data['page_content'] = "Lorem Ipsum is simply dumamy text; aute irure dolor in reprehenderit."; 
            $this->views->getview($this,"dashboard",$data);
        }


    }
?>