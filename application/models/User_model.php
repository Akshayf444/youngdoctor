<?php

class User_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->table_name = 'tbl_employee_master';
    }

    public function tmauthentication($username, $password) {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where(array('TM_Emp_Id' => $username, 'TM_Emp_Id' => $username));
        $query = $this->db->get();
        // echo $this->db->last_query();
        return $query->row_array();
    }

    public function bmauthentication($username, $password) {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where(array('BM_Emp_Id' => $username, 'BM_Emp_Id' => $username));
        $query = $this->db->get();
        // echo $this->db->last_query();
        return $query->row_array();
    }

    public function smauthentication($username, $password) {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where(array('SM_Emp_Id' => $username, 'SM_Emp_Id' => $username));
        $query = $this->db->get();
        // echo $this->db->last_query();
        return $query->row_array();
    }

    public function addDoctor($data) {
        $this->db->insert('tbl_doctor', $data);
        return $this->db->insert_id;
    }

    public function del_youngdoc($id, $data) {
        $this->db->where('DoctorId', $id);
        $this->db->update('tbl_doctor', $data);
         
    }

    public function find_by_id($id) {
        $sql = "Select * from tbl_doctor where DoctorId ='$id'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function find_Institution($tm_id) {
        $sql = "SELECT DoctorId, Institution FROM tbl_doctor where TM_EmpID='$tm_id' And DrStatus='2' ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getDoctor($conditions = array()) {
        $sql = "SELECT dm.*,em.TM_Emp_Id,em.BM_Name,em.SM_Name FROM ( SELECT * FROM tbl_doctor ";
        if (!empty($conditions)) {
            $sql.=" WHERE " . join(" AND ", $conditions);
        }
        $sql.= " ) AS dm Inner JOIN  tbl_employee_master  em ON dm.TM_EmpID=em.TM_Emp_Id  ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getEmployee($conditions = array()) {
        $sql = "SELECT DISTINCT(TM_Emp_Id) AS TM_Emp_Id , DISTINCT(BM_Emp_Id) AS BM_Emp_Id , DISTINCT(SM_Emp_Id) AS SM_Emp_Id,*  FROM tbl_employee_master ";
        if (!empty($conditions)) {
            $sql.=" WHERE " . join(" AND ", $conditions);
        }
        $query = $this->db->query($sql);
        return $query->result();
    }

}
