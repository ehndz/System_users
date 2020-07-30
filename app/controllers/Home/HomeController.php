<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/system_users/app/models/Home/HomeModel.php';
require_once ROOT . FOLDER_PATH .'/app/models/Login/LoginModel.php';
require_once LIBS_ROUTE .'Session.php';
/**
 * Home controller
 */
class HomeController extends Controller
{
  /**
   * string 
   */
  public $nombre;

  /**
   * object 
   */
  public $model;

  /**
   * string 
   */
  private $session;
  /**
   * Inicializa valores 
   */
  public function __construct()
  {
    $this->model = new HomeModel();
    $this->nombre = 'Mundo';
    $this->session = new Session();
    $this->session->init();
    if($this->session->getStatus() === 1 || empty($this->session->get('email')))
      //exit('Acceso denegado');
      header('location: /system_users/login');
  }

  /**
  * Método estándar
  */
  public function exec()
  {
    header('location: /system_users/main');
  }

  /**
  * Método de ejemplo
  */
  public function show()
  {
    $params = array('nombre' => $this->nombre);
    $this->render(__CLASS__, $params); 
  }


}