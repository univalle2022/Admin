<?php 

    const BASE_URL = "http://localhost/Admin";

    //Zona horaria
	date_default_timezone_set('UTC');
    
    const DB_HOST = "localhost";
    const DB_NAME = "ecommerce";
    const DB_USER = "root";
    const DB_PASSWORD = "root";
    const DB_CHARSET = "utf8";

    const NOMBRE_REMITENTE = "Tienda de Ropa Romeo y Julieta";
	const EMAIL_REMITENTE = "no-reply@admin.com";
	const NOMBRE_EMPESA = "Tienda de Ropa Romeo y Julieta";
	const WEB_EMPRESA = "www.admin.com";
   

    //Deliminadores decimal y millar Ej. 24,1989.00
	const SPD = ".";
	const SPM = ",";

    //Simbolo de moneda
	const SMONEY = "Bs.";
    const KEY = "contraromeojuli";
    const METHODENCRIPT = "AES-128-ECB";

?>