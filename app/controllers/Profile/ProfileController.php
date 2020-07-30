<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT . FOLDER_PATH .'/app/models/Login/LoginModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Main controller
*/
class ProfileController extends Controller
{
  private $session;

  public function __construct()
  {
    $this->session = new Session();
    $this->session->init();
    if($this->session->getStatus() === 1 || empty($this->session->get('email')))
      //exit('Acceso denegado');
      header('location: /system_users/login');
  }

  public function exec()
  {
    $params = array('email' => $this->session->get('email'),'user' => $this->session->get('user'));
    
    $this->render(__CLASS__, $params);
  }

  public function logout()
  {
    $this->session->close();
    header('location: /system_users/login');
  }

}
