<?php

  class Collections_Model extends CoreApp\Model
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function getCollections() {
        $stmt = $this->db->prepare("SELECT * FROM collections");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return($result);
    }
  }
