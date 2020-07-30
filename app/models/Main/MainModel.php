<?php
defined('BASEPATH') or exit('No se permite acceso directo');
/**
 * Home Model
 */
class MainModel extends Model
{
  /**
  * Inicia conexión DB
  */
  public function __construct()
  {
    parent::__construct();
  }

  /**
  * Obtiene el usuario de la DB por ID
  */
  public function getUser($params)
  {
    $id = $params['id'];
    return $this->db->query("SELECT * FROM `usuarios` WHERE `id` = $id")->fetch_array(MYSQLI_ASSOC);
  }

  /**
  * Obtiene todos los usuarios de la DB
  */
  public function getUsers()
  {
    return $this->db->query("SELECT * FROM `usuarios`")->fetch_all(MYSQLI_ASSOC);
  }

  /**
  * Borra un usuario de la DB
  */
  public function deleteUser($params)
  {
    $id = $params['id'];
    return $this->db->query("DELETE FROM `usuarios` WHERE `id` = $id");
  }

  /**
  * Activa o desactiva un usuario de la DB
  */
  public function statusUser($params)
  {
    $id = $params['id'];
    $status = $params['status'];
    echo "UPDATE `usuarios` SET `status` = $status  WHERE `id` = $id";
    
    return $this->db->query("UPDATE `usuarios` SET `status` = $status  WHERE `id` = $id;");
  }

  /**
  * guarda un usuario en la DB
  */
  public function saveUser($params)
  {
    $password = password_hash($params['password'], PASSWORD_DEFAULT);
    return $this->db->query("INSERT INTO `usuarios`(nombre,apellido,password,dni,phone,email,about,address,thumbnail) VALUES('"
    .$params['nombre']
    ."','".$params['apellido']
    ."','".$password
    ."','".$params['dni']
    ."','".$params['phone']
    ."','".$params['email']
    ."','".$params['about']
    ."','".$params['address']
    ."','".$params['photo']."')");
    
  }

   /**
  * Actualiza un usuario en la DB
  */
  public function updateUser($params)
  {
    $password = password_hash($params['password'], PASSWORD_DEFAULT);
    return $this->db->query("UPDATE `usuarios` SET nombre = '"
    .$params['nombre']
    ."', apellido = '".$params['apellido']
    ."', email = '".$params['email']
    ."', password = '".$password
    ."', dni = '".$params['dni'] 
    ."', phone = '".$params['phone'] 
    ."', about = '".$params['about'] 
    ."', address = '".$params['address'] 
    ."' where id = '".$params['id']."'");
  }


 
}