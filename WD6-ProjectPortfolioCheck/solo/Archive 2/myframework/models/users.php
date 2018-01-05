<?php 
  class users {
    public function __construct($parent) {
      $this->db = $parent->db;
    }
    public function select($sql, $value=[]) {
      $this->sql = $this->db->prepare($sql);
      $result = $this->sql->execute($value);
      $data = $this->sql->fetchAll();
      return $data;
    }
    public function add($sql, $value=[]) {
      $this->sql = $this->db->prepare($sql);
      $result = $this->db->execute($value);
    }
    public function delete() {}
    public function update() {}
  }
?>