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
                            redirect('User/view_doctor', 'refresh');
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
        $condition = array('delstatus = 1');
        if ($this->is_logged_in('TM')) {
            $condition[] = "TM_EmpID = '" . $this->Emp_Id . "'";
        }

        if ($this->is_logged_in('BM')) {
            $condition[] = "BM_Emp_Id = '" . $this->Emp_Id . "'";
        }

        if ($this->is_logged_in('SM')) {
            $condition[] = "SM_Emp_Id = '" . $this->Emp_Id . "'";
        }

        $data['dashboardstatus'] = $this->User_model->dashboardStatus($condition);
        $data = array('title' => 'Dashboard', 'content' => 'User/dashboard', 'view_data' => $data, 'page_title' => 'Dashboard');
        $this->load->view('template3', $data);
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
                    'CiplaSerice' => $this->input->post('ClipaSerice'),
                    'FITB' => $this->input->post('FITB'),
                    'ANNIVERSARY' => $this->input->post('ANNIVERSARY'),
                    'email' => $this->input->post('email'),
                    'Degree' => $this->input->post('Degree'),
                    'Passoutcollege' => $this->input->post('Passoutcollege'),
                    'Region' => $this->input->post('Region'),
                    'State' => $this->input->post('State'),
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
            $result = $this->User_model->getInstitute(array('TM_EmpID' => $this->Emp_Id));
            $data['institute'] = $this->Master_Model->generateDropdown($result, 'inst_id', 'name');
            if ($this->input->post()) {
                $data = array(
                    'Doctor_Name' => $this->input->post('Doctor_Name'),
                    'MSL_Code' => $this->input->post('MSL_Code'),
                    'address' => $this->input->post('address'),
                    'Mobile_Number' => $this->input->post('Mobile_Number'),
                    'Years_Practice' => $this->input->post('Years_Practice'),
                    'DOB' => $this->input->post('DOB'),
                    'CiplaSerice' => $this->input->post('ClipaSerice'),
                    'FITB' => $this->input->post('FITB'),
                    'ANNIVERSARY' => $this->input->post('ANNIVERSARY'),
                    'email' => $this->input->post('email'),
                    'Institution' => $this->input->post('Institution'),
                    'Region' => $this->input->post('Region'),
                    'State' => $this->input->post('State'),
                    'delstatus' => 1,
                    'DrStatus' => 2,
                    'TM_EmpID' => $this->Emp_Id,
                    'smswayid' => $this->smswayid,
                );
                $this->User_model->addDoctor($data);
                redirect('User/addpgDoctor', 'refresh');
            }
            $data = array('title' => 'Add PG Doctor', 'content' => 'User/pg_doctor', 'view_data' => $data, 'page_title' => 'Add PG Doctor');
            $this->load->view('template3', $data);
        } else {
            $this->logout();
        }
    }

    public function addinstitute() {
        if ($this->is_logged_in('TM')) {
            $data['states'] = $this->Master_Model->generateDropdown($this->User_model->getState(), 'state', 'state');

            if ($this->input->post()) {
                $data = array(
                    'name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'state' => $this->input->post('state'),
                    'city' => $this->input->post('city'),
                    'TM_EmpID' => $this->Emp_Id,
                    'smswayid' => $this->smswayid,
                    'created_at' => date('Y-m-d H:i:s')
                );
                $this->User_model->addinstitute($data);
                redirect('User/viewinstitute', 'refresh');
            }
            $data = array('title' => 'Add Institute', 'content' => 'User/addinstitute', 'view_data' => $data, 'page_title' => 'Add Institute');
            $this->load->view('template3', $data);
        } else {
            $this->logout();
        }
    }

    public function editinstitute($id) {
        if ($this->is_logged_in('TM')) {
            $result = $this->User_model->getInstitute(array('inst_id' => $id));
            $data['institute'] = array_shift($result);
            $data['state'] = $this->Master_Model->generateDropdown($this->User_model->getState(), 'state', 'state', $data['institute']->state);
            if ($this->input->post()) {
                $data = array(
                    'name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'state' => $this->input->post('state'),
                    'city' => $this->input->post('city'),
                    'TM_EmpID' => $this->Emp_Id,
                    'smswayid' => $this->smswayid,
                    'updated_at' => date('Y-m-d H:i:s')
                );
                $this->User_model->updateinstitute($data, $this->input->post('inst_id'));
                redirect('User/viewinstitute', 'refresh');
            }
            $data = array('title' => 'Add Institute', 'content' => 'User/editinstitute', 'view_data' => $data, 'page_title' => 'Edit Institute');
            $this->load->view('template3', $data);
        } else {
            $this->logout();
        }
    }

    public function viewinstitute() {
        $data['institute'] = $this->User_model->getInstitute(array("TM_EmpID = '" . $this->Emp_Id . "'"));
        $data = array('title' => 'View Institute', 'content' => 'User/viewinstitute', 'view_data' => $data, 'page_title' => 'View Institute');
        $this->load->view('template3', $data);
    }

    public function view_doctor() {
        $conditions = array();
        $data = array();
        if ($this->is_logged_in('TM') || $this->input->get('TM_Emp_Id')) {
            $conditions = array(
                'DrStatus = 1', 'delstatus = 1'
            );
            $tm_id = $this->is_logged_in('TM') ? $this->TM_Emp_Id : $this->input->get('TM_Emp_Id');
            array_push($conditions, 'TM_EmpID = ' . $tm_id);
        }
        if ($this->is_logged_in('SM')) {
            $SM_Emp_Id = $this->Emp_Id;
            $bmlist = $this->User_model->getbm(array('SM_Emp_Id = ' . $SM_Emp_Id));
            $data['bmlist'] = '<select class="btn btn-default" name="BM_Emp_Id"><option value="0" >Select BM</option>' . $this->Master_Model->generateDropdown($bmlist, 'BM_Emp_Id', 'BM_Name') . '</select>';
            if ($this->input->get('Bm_Emp_Id') > 0) {
                $data['tmlist'] = '<select class="btn btn-default" name="TM_Emp_Id"><option value="0"  >Select TM</option>' . $this->Master_Model->generateDropdown($tmlist, 'TM_Emp_Id', 'TM_Name', $this->input->get('TM_Emp_Id')) . '</select>';
            }
            $data['show'] = $this->User_model->view_all(array(
                'DrStatus = 1', 'delstatus = 1', 'SM_Emp_Id = ' . $SM_Emp_Id
            ));
        }
        if ($this->is_logged_in('BM') || $this->input->get('BM_Emp_Id')) {
            $BM_Emp_Id = $this->is_logged_in('BM') ? $this->Emp_Id : $this->input->get('BM_Emp_Id');
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
        $conditions = array(
            'DrStatus = 2', 'delstatus = 1'
        );
        if ($this->is_logged_in('SM')) {
            $SM_Emp_Id = $this->Emp_Id;
            $tmlist = $this->User_model->getbm(array('SM_Emp_Id = ' . $SM_Emp_Id));
            $data['bmlist'] = '<select class="btn btn-default" name="BM_Emp_Id"><option value="0" >Select BM</option>' . $this->Master_Model->generateDropdown($tmlist, 'BM_Emp_Id', 'BM_Name') . '</select>';
            if ($this->input->get('TM_Emp_Id') > 0) {
                $data['bmlist'] = '<select class="btn btn-default" name="BM_Emp_Id"><option value="0"  >Select BM</option>' . $this->Master_Model->generateDropdown($tmlist, 'BM_Emp_Id', 'BM_Name', $this->input->get('BM_Emp_Id')) . '</select>';
            }
            $conditions[] = 'SM_Emp_Id = ' . $SM_Emp_Id;
        }
        if ($this->is_logged_in('BM') || $this->input->get('BM_Emp_Id')) {
            $BM_Emp_Id = $this->is_logged_in('BM') ? $this->Emp_Id : $this->input->get('BM_Emp_Id');
            $tmlist = $this->User_model->getEmployee(array('BM_Emp_Id = ' . $BM_Emp_Id));
            $data['tmlist'] = '<select class="btn btn-default" name="TM_Emp_Id"><option value="0"  >Select TM</option>' . $this->Master_Model->generateDropdown($tmlist, 'TM_Emp_Id', 'TM_Name') . '</select>';
            if ($this->input->get('TM_Emp_Id') > 0) {
                $data['tmlist'] = '<select class="btn btn-default" name="TM_Emp_Id"><option value="0"  >Select TM</option>' . $this->Master_Model->generateDropdown($tmlist, 'TM_Emp_Id', 'TM_Name', $this->input->get('TM_Emp_Id')) . '</select>';
            }
        }
        if ($this->is_logged_in('TM') || $this->input->get('TM_Emp_Id') != '') {

            $tm_id = $this->is_logged_in('TM') ? $this->TM_Emp_Id : $this->input->get('TM_Emp_Id');
            $result = $this->User_model->getInstitute(array('TM_EmpID = '.$tm_id));
            $data['Institution'] = $this->Master_Model->generateDropdown($result, 'inst_id', 'name');
            if ($this->input->get('id') != '') {
                $data['Institution'] = $this->Master_Model->generateDropdown($result, 'inst_id', 'name', $this->input->get('id'));
            }
            array_push($conditions, 'dm.TM_EmpID = ' . $tm_id);
        }
        if ($this->input->get('id') != '') {
            $institute = $this->input->get('id');
            array_push($conditions, "Institution = '$institute' ");
        }

        if (!empty($conditions)) {
            $data['show'] = $this->User_model->view_all($conditions);
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

    public function update_doc() {
        $id = $_GET['id'];
        $data['rows'] = $this->User_model->find_by_id($id);
        if ($this->input->post()) {
            $data = array(
                'Doctor_Name' => $this->input->post('Doctor_Name'),
                'MSL_Code' => $this->input->post('MSL_Code'),
                'address' => $this->input->post('address'),
                'Mobile_Number' => $this->input->post('Mobile_Number'),
                'Years_Practice' => $this->input->post('Years_Practice'),
                'DOB' => $this->input->post('DOB'),
                'CiplaSerice' => $this->input->post('ClipaSerice'),
                'FITB' => $this->input->post('FITB'),
                'ANNIVERSARY' => $this->input->post('ANNIVERSARY'),
                'email' => $this->input->post('email'),
                'Degree' => $this->input->post('Degree'),
                'Passoutcollege' => $this->input->post('Passoutcollege'),
                'Region' => $this->input->post('Region'),
                'State' => $this->input->post('State'),
                'delstatus' => 1,
                'DrStatus' => 1,
                'TM_EmpID' => $this->Emp_Id,
                'smswayid' => $this->smswayid,
            );
            $this->User_model->del_youngdoc($this->input->post('DoctorId'), $data);
            redirect('User/view_doctor', 'refresh');
        }

        $data = array('title' => 'Upadte Doctor', 'content' => 'User/edit_doc', 'page_title' => 'Update Doctor', 'view_data' => $data);
        $this->load->view('template3', $data);
    }

    public function update_pgdoc() {
        $id = $_GET['id'];
        $data['rows'] = $this->User_model->find_by_id($id);
        $result = $this->User_model->getInstitute(array('TM_EmpID' => $this->Emp_Id));
        $data['institute'] = $this->Master_Model->generateDropdown($result, 'inst_id', 'name', $data['rows']->Institution);

        if ($this->input->post()) {
            $data = array(
                'Doctor_Name' => $this->input->post('Doctor_Name'),
                'MSL_Code' => $this->input->post('MSL_Code'),
                'address' => $this->input->post('address'),
                'Mobile_Number' => $this->input->post('Mobile_Number'),
                'Years_Practice' => $this->input->post('Years_Practice'),
                'DOB' => $this->input->post('DOB'),
                'CiplaSerice' => $this->input->post('ClipaSerice'),
                'FITB' => $this->input->post('FITB'),
                'ANNIVERSARY' => $this->input->post('ANNIVERSARY'),
                'email' => $this->input->post('email'),
                'Institution' => $this->input->post('Institution'),
                'Region' => $this->input->post('Region'),
                'State' => $this->input->post('State'),
                'delstatus' => 1,
                'DrStatus' => 2,
                'TM_EmpID' => $this->Emp_Id,
                'smswayid' => $this->smswayid,
            );

            $this->User_model->del_youngdoc($this->input->post('DoctorId'), $data);
            redirect('User/view_pgdoctor', 'refresh');
        }

        $data = array('title' => 'Upadte Doctor', 'content' => 'User/edit_pgdoc', 'page_title' => 'Update Doctor', 'view_data' => $data);
        $this->load->view('template3', $data);
    }

}
