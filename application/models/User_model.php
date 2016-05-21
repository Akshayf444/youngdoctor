<?php

class User_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->table_name = 'tbl_employee_master';
    }

    public function tmauthentication($username, $password) {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where(array('TM_Emp_Id' => $username, 'password' => $password));
        $query = $this->db->get();
        // echo $this->db->last_query();
        return $query->row_array();
    }

    public function bmauthentication($username, $password) {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where(array('BM_Emp_Id' => $username, 'password' => $password));
        $query = $this->db->get();
        // echo $this->db->last_query();
        return $query->row_array();
    }

    public function smauthentication($username, $password) {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where(array('SM_EMP_Id' => $username, 'password' => $password));
        $query = $this->db->get();
        // echo $this->db->last_query();
        return $query->row_array();
    }

    public function addDoctor($data) {
        $this->db->insert('tbl_doctor', $data);
        return $this->db->insert_id;
    }

    public function view_doctor($tm_id) {
        $sql = "SELECT dm.*,em.TM_Emp_Id,em.BM_Name,em.SM_Name FROM tbl_doctor dm Inner JOIN  tbl_employee_master  em ON dm.TM_EmpID=em.TM_Emp_Id  where dm.delstatus='1' and dm.DrStatus='1' and dm.TM_EmpID='$tm_id' ";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function del_youngdoc($id, $data) {
        $query = $this->db->where('DoctorId', $id);
        $query = $this->db->update('tbl_doctor', $data);
        return $query;
    }

    public function view_pgdoctor($tm_id) {
        $sql = "SELECT dm.*,em.TM_Emp_Id,em.BM_Name,em.SM_Name FROM tbl_doctor dm Inner JOIN  tbl_employee_master  em ON dm.TM_EmpID=em.TM_Emp_Id  where dm.delstatus='1' and dm.DrStatus='2' and dm.TM_EmpID='$tm_id' ";
        $query = $this->db->query($sql);
        return $query->result();
    }
       public function find_Institution($tm_id) {
        $sql = "SELECT DoctorId, Institution FROM tbl_doctor where TM_EmpID='$tm_id' And DrStatus='2' ";
        $query = $this->db->query($sql);
       
        return $query->result();
    }
      public function find_TM($bm_id) {
        $sql = "SELECT DoctorId, Institution FROM tbl_employee_master where BM_EmpID='$tm_id' And DrStatus='1' ";
        $query = $this->db->query($sql);
       
        return $query->result();
    }
    
  public function namefilter($tm_id,$Institution) {
        $sql = "SELECT dm.*,em.TM_Emp_Id,em.BM_Name,em.SM_Name FROM tbl_doctor dm Inner JOIN  tbl_employee_master  em ON dm.TM_EmpID=em.TM_Emp_Id  where dm.delstatus='1' and dm.DrStatus='2' and dm.TM_EmpID='$tm_id' and dm.Institution='$Institution' "; 
        $query = $this->db->query($sql);
      
        return $query->result();
    }

    public function del_pgdoc($id, $data) {
        $query = $this->db->where('DoctorId', $id);
        $query = $this->db->update('tbl_doctor', $data);
        return $query;
    }

    function calculateMonth($current_month, $no_of_month) {
        $month = $current_month - $no_of_month;
        if ($month <= 0) {
            switch ($month) {
                case 0:
                    $month = 12;
                    break;
                case -1:
                    $month = 11;
                    break;
                case -2:
                    $month = 10;
                    break;
                case -3:
                    $month = 9;
                    break;
                case -4:
                    $month = 8;
                    break;
                case -5:
                    $month = 7;
                    break;
                case -6:
                    $month = 6;
                    break;
            }
        } else {
            $month = $month;
        }
        return $month;
    }

    function calculateYear($current_month, $no_of_month) {
        $month = $current_month - $no_of_month;
        if ($month <= 0) {
            $year = date('Y') - 1;
        } else {
            $year = date('Y');
        }
        return $year;
    }

    function getMonthName($month) {
        switch ($month) {
            case 1:
                $monthname = 'Jan';
                break;
            case 2:
                $monthname = 'Feb';
                break;
            case 3:
                $monthname = 'Mar';
                break;
            case 4:
                $monthname = 'Apr';
                break;
            case 5:
                $monthname = 'May';
                break;
            case 6:
                $monthname = 'Jun';
                break;
            case 7:
                $monthname = 'Jul';
                break;
            case 8:
                $monthname = 'Aug';
                break;
            case 9:
                $monthname = 'Sep';
                break;
            case 10:
                $monthname = 'Oct';
                break;
            case 11:
                $monthname = 'Nov';
                break;
            case 12:
                $monthname = 'Dec';
                break;
        }
        return $monthname;
    }

    function getMonthObject() {
        $Parameter = array();
        ///Parameter array
        $array = array(
            '1' => 'Jan',
            '2' => 'Feb',
            '3' => 'Mar',
            '4' => 'Apr',
            '5' => 'May',
            '6' => 'Jun',
            '7' => 'Jul',
            '8' => 'Aug',
            '9' => 'sep',
            '10' => 'Oct',
            '11' => 'Nov',
            '12' => 'Dec',
        );

        foreach ($array as $key => $value) {
            $Object = new stdClass();
            $Object->month = $key;
            $Object->monthname = $value;
            array_push($Parameter, $Object);
        }
        return $Parameter;
    }

    function getYearObject() {
        $Parameter = array();
        $array = array();

        $current_month = 2016;
        for ($i = 0; $i < 10; $i++) {
            $array[$current_month] = $current_month;
            $current_month ++;
        }
        foreach ($array as $key => $value) {
            $Object = new stdClass();
            $Object->Year = $key;
            $Object->Yearname = $value;
            array_push($Parameter, $Object);
        }
        return $Parameter;
    }

    function PasswordMail($data) {
        $this->db->insert('Send_Email', $data);
    }

    function CutOfDate() {
        $current_day = date('d');
        if ($current_day == 9 || $current_day == 10) {
            $current_month = date('n', strtotime('-1 month'));
            $created_at = date("Y-m-d", mktime(0, 0, 0, date("m"), 0, date("Y")));
        } else {
            $current_month = date('n');
            $created_at = date('Y-m-d H:i:s');
        }
        return array($current_month, $created_at);
    }

}
