<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MY_Controller {

    public $alertLabel = 'Doctor';
    public $doctorIds = array();

    public function __construct() {
        parent::__construct();
        $this->load->helper();
        $this->load->model('User_model');
        $this->load->model('Master_Model');
        $this->load->model('Doctor_Model');
        $this->load->model('Encryption');
        $this->load->library('form_validation');
    }

    public function index() {

        $data = array();
        $message = '';
        if ($this->input->post()) {
            if ($this->input->post('username') == $this->input->post('password')) {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $tmexist = $this->User_model->tmauthentication($username, $password);

                if (!empty($tmexist)) {
                    $this->session->set_userdata('Emp_Id', $tmexist['TM_Emp_Id']);
                    $this->session->set_userdata('smswayid', $tmexist['smsWayID']);
                    $this->session->set_userdata('Full_Name', $tmexist['TM_Name']);
                    $this->session->set_userdata('TM_Emp_Id', $tmexist['TM_Emp_Id']);
                    $this->session->set_userdata('BM_Emp_Id', $tmexist['BM_Emp_Id']);
                    $this->session->set_userdata('SM_Emp_Id', $tmexist['SM_Emp_Id']);
                    $this->session->set_userdata('SSM_Emp_Id', $tmexist['SSM_Emp_Id']);
                    $this->session->set_userdata('Reporting_Id', $tmexist['BM_Emp_Id']);
                    $this->session->set_userdata('Designation', 'TM');
                    redirect('User/addDoctor', 'refresh');
                } else {
                    $bmexist = $this->User_model->bmauthentication($username, $password);
                    if (!empty($bmexist)) {
                        $this->session->set_userdata('Emp_Id', $bmexist['BM_Emp_Id']);
                        $this->session->set_userdata('TM_Emp_Id', $bmexist['TM_Emp_Id']);
                        $this->session->set_userdata('BM_Emp_Id', $bmexist['BM_Emp_Id']);
                        $this->session->set_userdata('SM_Emp_Id', $bmexist['SM_Emp_Id']);
                        $this->session->set_userdata('SSM_Emp_Id', $bmexist['SSM_Emp_Id']);
                        $this->session->set_userdata('Reporting_Id', $bmexist['SM_Emp_Id']);
                        $this->session->set_userdata('Full_Name', $bmexist['BM_Name']);
                        $this->session->set_userdata('smswayid', $bmexist['smsWayID']);
                        $this->session->set_userdata('Designation', 'BM');
                        redirect('User/view_doctor', 'refresh');
                    } else {
                        $smexist = $this->User_model->smauthentication($username, $password);
                        if (!empty($smexist)) {
                            $this->session->set_userdata('Emp_Id', $smexist['SM_Emp_Id']);
                            $this->session->set_userdata('TM_Emp_Id', $smexist['TM_Emp_Id']);
                            $this->session->set_userdata('BM_Emp_Id', $smexist['BM_Emp_Id']);
                            $this->session->set_userdata('SM_Emp_Id', $smexist['SM_Emp_Id']);
                            $this->session->set_userdata('SSM_Emp_Id', $smexist['SSM_Emp_Id']);
                            $this->session->set_userdata('Reporting_Id', $smexist['SSM_Emp_Id']);
                            $this->session->set_userdata('Full_Name', $smexist['SM_Name']);
                            $this->session->set_userdata('smswayid', $smexist['smsWayID']);
                            $this->session->set_userdata('Designation', 'SM');
                            redirect('User/dashboard', 'refresh');
                        } else {
                            $this->session->set_userdata('message', $this->Master_Model->DisplayAlert('Incorrect Username/Password', 'danger'));
                        }
                    }
                }
            } else {
                $this->session->set_userdata('message', $this->Master_Model->DisplayAlert('Incorrect Username/Password', 'danger'));
            }
        }
        $data = array('title' => 'Login', 'content' => 'User/login', 'view_data' => $data);
        $this->load->view('template1', $data);
    }

    public function dashboard() {
        if ($this->is_logged_in('TM')) {
            
        }
    }

    public function addDoctor() {

        if ($this->is_logged_in('TM')) {
            if ($this->input->post()) {
                $data = array(
                    'Doctor_Name' => $this->input->post('Doctor_Name'),
                    'MSL_Code' => $this->input->post('MSL_Code'),
                    'address' => $this->input->post('address'),
                    'Mobile_Number' => $this->input->post('Mobile_Number'),
                    'Years_Practice' => $this->input->post('Years_Practice'),
                    'DOB' => $this->input->post('DOB'),
                    'CiplaSerice' => $this->input->post('CiplaSerice'),
                    'FITB' => $this->input->post('FITB'),
                    'ANNIVERSARY' => $this->input->post('ANNIVERSARY'),
                    'email' => $this->input->post('email'),
                    'Degree' => $this->input->post('Degree'),
                    'Passoutcollege' => $this->input->post('Passoutcollege'),
                    'Region' => $this->input->post('Region'),
                    'State' => $this->input->post('state'),
                    'delstatus' => 1,
                    'DrStatus' => 1,
                    'TM_EmpID' => $this->Emp_Id,
                    'smswayid' => $this->smswayid,
                );
                $this->User_model->addDoctor($data);
                redirect('User/addDoctor', 'refresh');
            }
            $data = array('title' => 'Add Young Doctor', 'content' => 'User/add_doctor', 'view_data' => 'blank', 'page_title' => 'Add Doctor');
            $this->load->view('template3', $data);
        } else {
            $this->logout();
        }
    }

    public function addpgDoctor() {
        if ($this->is_logged_in('TM')) {
            if ($this->input->post()) {
                $data = array(
                    'Doctor_Name' => $this->input->post('Doctor_Name'),
                    'MSL_Code' => $this->input->post('MSL_Code'),
                    'address' => $this->input->post('address'),
                    'Mobile_Number' => $this->input->post('Mobile_Number'),
                    'Years_Practice' => $this->input->post('Years_Practice'),
                    'DOB' => $this->input->post('DOB'),
                    'CiplaSerice' => $this->input->post('CiplaSerice'),
                    'FITB' => $this->input->post('FITB'),
                    'ANNIVERSARY' => $this->input->post('ANNIVERSARY'),
                    'email' => $this->input->post('email'),
                    'Institution' => $this->input->post('Institution'),
                    'Region' => $this->input->post('Region'),
                    'State' => $this->input->post('state'),
                    'delstatus' => 1,
                    'DrStatus' => 2,
                    'TM_EmpID' => $this->Emp_Id,
                    'smswayid' => $this->smswayid,
                );
                $this->User_model->addDoctor($data);
                redirect('User/addpgDoctor', 'refresh');
            }
            $data = array('title' => 'Add PG Doctor', 'content' => 'User/pg_doctor', 'view_data' => 'blank', 'page_title' => 'Add PG Doctor');
            $this->load->view('template3', $data);
        } else {
            $this->logout();
        }
    }

    public function view_doctor() {
        $conditions = array();
        if ($this->is_logged_in('TM') || $this->input->get('TM_Emp_Id')) {
            $conditions = array(
                'DrStatus = 1', 'delstatus = 1'
            );

            $tm_id = $this->is_logged_in('TM') ? $this->TM_Emp_Id : $this->input->get('TM_Emp_Id');
            array_push($conditions, 'TM_EmpID = ' . $tm_id);
        }
        if ($this->is_logged_in('BM')) {
            $BM_Emp_Id = $this->Emp_Id;
            $tmlist = $this->User_model->getEmployee(array('BM_Emp_Id = ' . $BM_Emp_Id));
            $data['tmlist'] = '<select class="btn btn-default" name="TM_Emp_Id"><option value="0" >Select TM</option>' . $this->Master_Model->generateDropdown($tmlist, 'TM_Emp_Id', 'TM_Name') . '</select>';
            if ($this->input->get('TM_Emp_Id') > 0) {
                $data['tmlist'] = '<select class="btn btn-default" name="TM_Emp_Id"><option value="0"  >Select TM</option>' . $this->Master_Model->generateDropdown($tmlist, 'TM_Emp_Id', 'TM_Name', $this->input->get('TM_Emp_Id')) . '</select>';
            }
        }

        if (!empty($conditions)) {
            $data['show'] = $this->User_model->getDoctor($conditions);
        }

        $data = array('title' => 'Young Doctor List', 'content' => 'User/view_doctor', 'view_data' => $data, 'page_title' => ' Doctor List');
        $this->load->view('template3', $data);
    }

    public function youngdoc_del() {
        $id = $_GET['id'];
        $data = array('delstatus' => 0);
        $this->User_model->del_youngdoc($id, $data);

        redirect('User/view_doctor', 'refresh');
    }

    public function view_pgdoctor() {
        $data['Institution'] = null;
        $conditions = array();
        if ($this->is_logged_in('BM')) {
            $BM_Emp_Id = $this->Emp_Id;
            $tmlist = $this->User_model->getEmployee(array('BM_Emp_Id = ' . $BM_Emp_Id));
            $data['tmlist'] = '<select class="btn btn-default" name="TM_Emp_Id"><option value="0"  >Select TM</option>' . $this->Master_Model->generateDropdown($tmlist, 'TM_Emp_Id', 'TM_Name') . '</select>';
            if ($this->input->get('TM_Emp_Id') > 0) {
                $data['tmlist'] = '<select class="btn btn-default" name="TM_Emp_Id"><option value="0"  >Select TM</option>' . $this->Master_Model->generateDropdown($tmlist, 'TM_Emp_Id', 'TM_Name', $this->input->get('TM_Emp_Id')) . '</select>';
            }
        }

        if ($this->is_logged_in('TM') || $this->input->get('TM_Emp_Id') != '') {
            $conditions = array(
                'DrStatus = 2', 'delstatus = 1'
            );

            $tm_id = $this->is_logged_in('TM') ? $this->TM_Emp_Id : $this->input->get('TM_Emp_Id');
            $result = $this->User_model->find_Institution($tm_id);
            $data['Institution'] = $this->Master_Model->generateDropdown($result, 'Institution', 'Institution');
            if ($this->input->get('id') != '') {
                $data['Institution'] = $this->Master_Model->generateDropdown($result, 'Institution', 'Institution', $this->input->get('id'));
            }
            array_push($conditions, 'TM_EmpID = ' . $tm_id);
        }

        if ($this->input->get('id') != '') {
            $institute = $this->input->get('id');
            array_push($conditions, "Institution = '$institute' ");
        }

        if (!empty($conditions)) {
            $data['show'] = $this->User_model->getDoctor($conditions);
        }

        $data = array('title' => 'PG Doctor List', 'content' => 'User/view_pgdoctor', 'view_data' => $data, 'page_title' => 'PG Doctor List');
        $this->load->view('template3', $data);
    }

    public function pgdoc_del() {
        $id = $_GET['id'];
        $data = array('delstatus' => 0);
        $this->User_model->del_youngdoc($id, $data);

        redirect('User/view_pgdoctor', 'refresh');
    }

}
