<?php
defined('BASEPATH') OR exit('');

class defaultload extends CI_Model
{
    private $mysql_pdo;
    // private $mssql_pdo;

    function __construct() {
        parent::__construct();
        $this->mysql_pdo = $this->load->database();
        //$this->mssql_pdo = $this->load->database('mssql', TRUE);
        $this->load->library(array('session'));
    }

    public function query_my($sql = '', array $args = NULL) {
        echo $sql;
        printf($args);
        die();
        if($args === NULL) {
            $stmt = $this->mysql_pdo->query($sql);
        } else {
            $stmt = $this->mysql_pdo->query($sql, $args);
        }
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

    // public function query_srv($sql, array $args = NULL) {
    //     if($args === NULL) {
    //         $stmt = $this->mssql_pdo->query($sql);
    //     } else {
    //         $stmt = $this->mssql_pdo->query($sql, $args);
    //     }
    //     return $stmt->result_array();
    // }

    // public function update_srv($sql, array $args = NULL) {
    //     if($args === NULL) {
    //         $this->mssql_pdo->query($sql);
    //     } else {
    //         $this->mssql_pdo->query($sql, $args);
    //     }
    // }

    // public function insert_srv($sql, array $args = NULL) {
    //     if($args === NULL) {
    //         $this->mssql_pdo->query($sql);
    //     } else {
    //         $this->mssql_pdo->query($sql, $args);
    //     }
    // }

    // public function delete_srv($sql, array $args = NULL) {
    //     if($args === NULL) {
    //         $this->mssql_pdo->query($sql);
    //     } else {
    //         $this->mssql_pdo->query($sql, $args);
    //     }
    // }

    public function page_transfer($msg, $page = "home") {
        $data['msg'] = $msg;
        $data['url'] = $page;
        $this->load->view("transfer", $data);
    }

    public function destruct() {
        $this->mysql_pdo->close();
        //$this->mssql_pdo->close();
    }
}