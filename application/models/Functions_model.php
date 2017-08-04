<?php
defined('BASEPATH') OR exit('');

class Functions_model extends CI_Model
{
    private $mysql_pdo;
    private $mssql_pdo;

    function __construct() {
        parent::__construct();
        
        $this->mysql_pdo = $this->load->database('default', TRUE);;
        $this->load->library(array('session'));
    }

    public function query_my($sql, array $args = NULL) {
        if($args === NULL) {
            $stmt = $this->mysql_pdo->query($sql);
        } else {
            $stmt = $this->mysql_pdo->query($sql, $args);
        }
        
        //print_r($stmt);
        return $stmt->result_array();
    }

    public function update_my($sql, array $args = NULL) {
        if($args === NULL) {
            $this->mysql_pdo->query($sql);
        } else {
            $this->mysql_pdo->query($sql, $args);
        }
    }

    public function insert_my($sql, array $args = NULL) {
        if($args === NULL) {
            $this->mysql_pdo->query($sql);
        } else {
            $this->mysql_pdo->query($sql, $args);
        }
    }

    public function delete_my($sql, array $args = NULL) {
        if($args === NULL) {
            $this->mysql_pdo->query($sql);
        } else {
            $this->mysql_pdo->query($sql, $args);
        }
    }

    
    public function page_transfer($msg, $page = "home") {
        $data['msg'] = $msg;
        $data['url'] = $page;
        $this->load->view("transfer", $data);
    }

    public function destruct() {
        $this->mysql_pdo->close();
    }
}