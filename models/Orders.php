<?php
  class Order {
    private $db;
    public function __construct() {
      $this->db = new Database;
    }
    public function addOrder($data) {
      // Prepare Query
      $this->db->query('INSERT INTO orders (id, full_name, email, product, price) VALUES (:id, :full_name, :email, :product, :price)');
      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':full_name', $data['full_name']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':product', $data['product']);
      $this->db->bind(':price', $data['price']);
      
    //   $this->db->bind(':address', $data['address']);
      // Execute
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }
    public function getOrder() {
      $this->db->query('SELECT * FROM orders ORDER BY created_at DESC');
      $results = $this->db->resultset();
      return $results;
    }
  }
  ?>