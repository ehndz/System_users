<?php 
/**
* 
*/
class LoginModel extends Model
{
  
  public function __construct()
  {
    parent::__construct();
  }

  public function signIn($email)
  {
    $email = $this->db->real_escape_string($email);
    //$sql = "SELECT email, password FROM usuarios WHERE email = '{$email}'";
    $sql = "SELECT * FROM usuarios WHERE email = '{$email}'";
    return $this->db->query($sql);
  }

  public function activos()
  {
    $sql = "SELECT count(*) as cantidad FROM usuarios WHERE status = 1";
    return $this->db->query($sql);
  }

  public function inactivos()
  {
    $sql = "SELECT count(*) as cantidad  FROM usuarios WHERE status = 0";
    return $this->db->query($sql);
  }

  public function todos()
  {
    $sql = "SELECT count(*) as cantidad  FROM usuarios";
    return $this->db->query($sql);
  }
}