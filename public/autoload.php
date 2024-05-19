<?php 
define("DS",DIRECTORY_SEPARATOR);
define("ROOT_PATH",dirname(__DIR__).DS);
define("APP",ROOT_PATH.'app'.DS);
define("CONFIG",APP.'config'.DS);
define("CONTROLLERS",APP.'controllers'.DS);
define("CORE",APP.'core'.DS);
define("EMAIL",APP.'email'.DS);
define("LIBS",APP.'libs'.DS);
define("FPDF",LIBS.'fpdf'.DS);
define("MODELS",APP.'models'.DS);
define("VIEWS",APP.'views'.DS);
define("PUBL",ROOT_PATH.'public'.DS);
define("ASSETS",PUBL.'assets'.DS);
define("IMAGES",ASSETS.'images'.DS);
define("UPLOADS",PUBL.'uploads'.DS);


require_once(CONFIG.'config.php');
require_once(CONFIG.'helpers.php');




// autoload all classes 
$modules = [ROOT_PATH,APP,CORE,EMAIL,LIBS,FPDF,VIEWS,CONTROLLERS,MODELS,CONFIG,PUBL,ASSETS,IMAGES,UPLOADS];
set_include_path(get_include_path(). PATH_SEPARATOR.implode(PATH_SEPARATOR,$modules));
spl_autoload_register('spl_autoload'); // false




new App();