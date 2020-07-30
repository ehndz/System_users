<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/system_users/app/models/Main/MainModel.php';
require_once ROOT . FOLDER_PATH .'/app/models/Login/LoginModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Main controller
*/
class MainController extends Controller
{
  private $session;

  public $usuario;

  private $model;

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
    //$this->show();
    $this->usuarios();
  }

  public function show()
  {
    $params = array('todos' => $this->session->get('todos'),'inactivos' => $this->session->get('inactivos'),'activos' => $this->session->get('activos'),'email' => $this->session->get('email'),'usuario' => $this->usuario, 'user' => $this->session->get('user'));
    $this->render(__CLASS__, $params);
  }

  public function usuarios(){
    $this->model = new MainModel();
    $res = $this->model->getUsers();

    $this->usuario = array();
    $this->usuario = $res;
    $this->show();
  }

  public function logout()
  {
    $this->session->close();
    header('location: /system_users/login');
  }

  private function verify($request_params)
  {
    return empty($request_params['email']) OR empty($request_params['nombre']) OR empty($request_params['apellido']);
  }

  private function renderErrorMessage($message)
  {
    $params = array('error_message' => $message);
    //$this->render(__CLASS__, $params);
    header('location: /system_users/main');
  }

  public function guardarusuario($request_params)
  {
    
    if($this->verify($request_params)){
      return $this->renderErrorMessage('Debe completar los campos obligatorios');
    }

    $dir_subida = ROOT . FOLDER_PATH .'/uploads/';
    $fichero_subido = $request_params['dni'].'.jpg';

    if (move_uploaded_file($_FILES['image']['tmp_name'], $dir_subida.$fichero_subido)) {
      echo "El fichero es válido y se subió con éxito.\n";

    $dir_subida = PHOTO_PATH;
    $fichero_subido = $request_params['dni'].'.jpg';

    $ruta = $dir_subida.$fichero_subido;
    $array1 = array("photo" => $ruta);
    $request_params = array_merge($request_params,$array1);
    
    } else {
      echo "¡Posible ataque de subida de ficheros!\n";
    }

    //print_r($request_params);
    //exit;
    
    $this->model = new MainModel();
    $result = $this->model->saveUser($request_params);
    
   header('location: /system_users/main');
  }

  public function editarusuario($request_params)
  {
    if($this->verify($request_params)){
      return $this->renderErrorMessage('Debe completar los campos obligatorios');
    }
    
    $this->model = new MainModel();
    $result = $this->model->updateUser($request_params);
    
   header('location: /system_users/main');
  }

  public function getusuario($id)
  { 
    $this->model = new MainModel();
    $result = $this->model->getUser($id);
    print json_encode($result);
  }

  public function deleteusuario($id)
  { 
    $this->model = new MainModel();
    $result = $this->model->deleteUser($id);
    print json_encode($result);
  }

  public function statususuario($data)
  { //print_r($data);
    $this->model = new MainModel();
    $result = $this->model->statusUser($data);
    print json_encode($result);
  }
}
