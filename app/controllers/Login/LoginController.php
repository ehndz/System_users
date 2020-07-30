<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT . FOLDER_PATH .'/app/models/Login/LoginModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Login controller
*/
class LoginController extends Controller
{
  private $model;

  private $session;

  private $arreglo;

  public function __construct()
  {
    $this->model = new LoginModel();
    $this->session = new Session();
  }

  public function exec()
  {
    $this->render(__CLASS__);
  }

  public function signin($request_params)
  {
    if($this->verify($request_params))
      return $this->renderErrorMessage('El email y password son obligatorios');

    $result = $this->model->signIn($request_params['email']);

    if(!$result->num_rows)
      return $this->renderErrorMessage("El email {$request_params['email']} no fue encontrado");

    $result = $result->fetch_object();
    
    // echo password_hash("123123", PASSWORD_DEFAULT)."\n";
    if(!password_verify($request_params['password'], $result->password))
      return $this->renderErrorMessage('La contraseña es incorrecta');

    $activos = $this->model->activos(); 
    $activos = $activos->fetch_object();
    
    $inactivos = $this->model->inactivos();  
    $inactivos = $inactivos->fetch_object();
    
    $todos = $this->model->todos();  
    $todos = $todos->fetch_object();
    
    $this->session->init();
    $this->session->add('email', $result->email);
    $this->session->add('activos', $activos->cantidad);
    $this->session->add('inactivos', $inactivos->cantidad);
    $this->session->add('todos', $todos->cantidad);
    $this->session->add('thumbnail', $result->thumbnail);
    $this->arreglo['nombre'] = $result->nombre;
    $this->arreglo['apellido'] = $result->apellido;
    $this->arreglo['email'] = $result->email;
    $this->arreglo['dni'] = $result->dni;
    $this->arreglo['phone'] = $result->phone;
    $this->arreglo['about'] = $result->about;
    $this->arreglo['address'] = $result->address;
    $this->arreglo['ciudad'] = "Santiago";
    $this->arreglo['pais'] = "Chile";
    $this->arreglo['edad'] = "34";
    $this->arreglo['profesion'] = "Fullstack Developer";
    $this->arreglo['thumbnail'] = $result->thumbnail;
    
    $this->session->addSessionUser('user', $this->arreglo);
    
    header('location: /system_users/main');
  }

  private function verify($request_params)
  {
    return empty($request_params['email']) OR empty($request_params['password']);
  }

  private function renderErrorMessage($message)
  {
    $params = array('error_message' => $message);
    $this->render(__CLASS__, $params);
  }

}