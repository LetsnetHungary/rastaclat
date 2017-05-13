<?php
    class Test_Model extends CoreApp\Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function category() {
          $this->db->exec("use rastacla_cms");
            $this->db->exec("TRUNCATE TABLE `cms_image`");

        }
    }
