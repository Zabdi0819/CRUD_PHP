<?php

    include_once ('connection_class.php');

    class Employee{

        private $id;
        private $first_name;
        private $last_name;
        private $address;
        private $email;
        private $db;

        public function __construct()
        {
            $con = new DBConnection();
            $this->db = $con->getConnection();
        }

        public function set($attribute, $content) {
            $this->$attribute = $content;
        }

        public function get($attribute) {
            return $this->$attribute;
        }

        public function getList() {
            $sql = "SELECT * FROM employee";
            
            $resql = $this->db->query($sql);
            return $resql->fetch_all();
        }

        public function fetch(){
            $sql = "SELECT * FROM employee WHERE id = ".$this->id;
            
            $resql = $this->db->query($sql);

            if ($resql->num_rows > 0) {
                $row = $resql->fetch_object();
                return [
                    'id' => $row->id,
                    'first_name' => $row->first_name,
                    'last_name' => $row->last_name,
                    'address' => $row->address,
                    'email' => $row->email
                ];
            } else {
                return -1;
            }

        }

        public function create(){
            $existingEmail = $this->validEmail($this->email);

            if(!$existingEmail){
                $sql = "INSERT INTO employee (first_name, last_name, address, email)";
                $sql .= " VALUES(".($this->first_name ? "'".$this->first_name."'" : NULL);
                $sql .= ", ".($this->last_name ? "'".$this->last_name."'" : NULL);
                $sql .= ", ".($this->address ? "'".$this->address."'" : NULL);
                $sql .= ", ".($this->email ? "'".$this->email."'" : NULL);
                $sql .= ")";
    
                $resql = $this->db->query($sql);
                if($resql){
                    return $this->db->insert_id;
                } else {
                    return 0;
                }
            }else{
                return -1;
            }

        }

        public function update() {
            $existingEmail = $this->validEmail($this->email);

            if(!$existingEmail){
                $sql = "UPDATE employee SET";
                $sql .= " first_name = ".($this->first_name ? "'".$this->first_name."'" : NULL);
                $sql .= ", last_name = ".($this->last_name ? "'".$this->last_name."'" : NULL);
                $sql .= ", address = ".($this->address ? "'".$this->address."'" : NULL);
                $sql .= ", email = ".($this->email ? "'".$this->email."'" : NULL);
                $sql .= " WHERE id = ".$this->id;
    
                $resql = $this->db->query($sql);
    
                if($resql){
                    return 1;
                } else {
                    return $sql;
                }
            }else{
                return -1;
            }
        }

        public function delete() {
            $sql = "DELETE FROM employee WHERE id = ".$this->id;

            $resql = $this->db->query($sql);

            if($resql){
                return 1;
            } else {
                return -1;
            }
        }

        public function validEmail() {
            $sql = "SELECT * FROM employee WHERE email = '".$this->email."'";
            if($this->id > 0) $sql .= " AND id !=".$this->id;
            $resql = $this->db->query($sql);

            if($resql->num_rows > 0) return true;
            else return false;
        }
    }

?>