<?php

    class Views{
        function getview($controller,$view,$data=""){
            $controller = get_class($controller);
            if($controller == "Home"){
                $view = "Views/".$view.".php";
            }else{
                $view = "Views/".$controller.'/'.$view.".php";
            }
            require_once($view);
        }
    }

?>