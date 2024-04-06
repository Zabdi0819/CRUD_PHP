<?php

    include_once('../class/employee_class.php');

    class employeeControllerAjax{

        private $employee;

        public function __construct()
        {
            $this->employee = new Employee();
        }

        public function index() {
            $res = $this->employee->getList();
            return $res;
        }

        public function create($first_name, $last_name, $address, $email) {
            $this->employee->set("first_name", $first_name);
            $this->employee->set("last_name", $last_name);
            $this->employee->set("address", $address);
            $this->employee->set("email", $email);

            $res = $this->employee->create();

            return $res;
        }

        public function delete($id) {
            $this->employee->set("id", $id);
            return $this->employee->delete();

        }

        public function fetch($id) {
            $this->employee->set("id", $id);
            $array = $this->employee->fetch();
            return $array;
        }

        public function update($id, $first_name, $last_name, $address, $email) {
            $this->employee->set("id", $id);
            $this->employee->set("first_name", $first_name);
            $this->employee->set("last_name", $last_name);
            $this->employee->set("address", $address);
            $this->employee->set("email", $email);
            return  $this->employee->update();
        }

    }

?>