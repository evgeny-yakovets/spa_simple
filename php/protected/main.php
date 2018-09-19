<?php
    class Base{
        public $config;

        public function __construct(){
            $this->config = include('config.php');
        }

        function loadArticles(){
            $connect = mysqli_connect($this->config->db->address, $this->config->db->user, $this->config->db->password, $this->config->db->db_name);
            $connect->multi_query('select * from test_articles');
            $store_result = $connect->store_result();
            $result = [];
            while($row = $store_result->fetch_assoc()){
                $result[] = $row;
            }

            $connect->close();

            return $result;
        }

        function saveArticle($text){
            $connect = mysqli_connect($this->config->db->address, $this->config->db->user, $this->config->db->password, $this->config->db->db_name);
            $insert = $connect->query('INSERT INTO test_articles (id,text) VALUES (null,\''.$connect->real_escape_string($text).'\')');

            if($insert === true){
                $result = $connect->insert_id;
            }else{
                $result = false;
            }

            $connect->close();

            return $result;
        }
    }


