<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Home_model');
        $this->load->model('user');
    }

    public function index() {
        $data = array();
        if ($this->session->userdata('isUserLoggedIn')) {
            $data['user'] = $this->user->getRows(array('id' => $this->session->userdata('userId')));

            $this->load->model("Home_model");
            $data["fetch_cus"] = $this->Home_model->fetch_cus();
            $data["fetch_debit"] = $this->Home_model->fetch_debit_dash();
            $data["fetch_credit"] = $this->Home_model->fetch_credit_dash();
            $data["expense"] = $this->Home_model->expense();
            $data["income"] = $this->Home_model->income();
            $data["count"] = $this->Home_model->count();
            $this->load->view('header', $data);
            $this->load->view('index', $data);
            $this->load->view('footer');
        } else {

            redirect('Users');
        }
    }

    public function debit_credit_p() {
        if ($this->session->userdata('isUserLoggedIn')) {
            $data['user'] = $this->user->getRows(array('id' => $this->session->userdata('userId')));
            $id = $this->input->get('id');
            $this->load->model("Home_model");
            $data["fetch_cus"] = $this->Home_model->fetch_cus();
            $data["fetch_debit_p"] = $this->Home_model->fetch_debit_p($id);
            $data["fetch_credit_p"] = $this->Home_model->fetch_credit_p($id);
            $data["fetch_sum_p"] = $this->Home_model->fetch_sum_p($id);


            $this->load->view('header', $data);
            $this->load->view('d_c_view', $data);
            $this->load->view('footer');
        } else {
            redirect('Users');
        }
    }

    public function add_client() {
        if ($this->session->userdata('isUserLoggedIn')) {
            $data['user'] = $this->user->getRows(array('id' => $this->session->userdata('userId')));
            if (isset($_POST['add'])) {
                $userData = array(
                    'name' => strip_tags($this->input->post('name')),
                    'area' => strip_tags($this->input->post('area')),
                    'mobile' => strip_tags($this->input->post('mobile')),
                    'city' => strip_tags($this->input->post('city')),
                    'address' => strip_tags($this->input->post('address')),
                    'gender' => strip_tags($this->input->post('gender')),
                );

                $this->db->insert('customers', $userData);
                $this->session->set_userdata('msg', 'toastitem();');


                redirect('Home/add_client');
            }

            $this->load->model("Home_model");
            $data["fetch_cus"] = $this->Home_model->fetch_cus();
            $this->load->view('header', $data);
            $this->load->view('add_client');
            $this->load->view('footer');
        } else {
            redirect('Users');
        }
    }

    public function today_report() {
        if ($this->session->userdata('isUserLoggedIn')) {
            $data['user'] = $this->user->getRows(array('id' => $this->session->userdata('userId')));
            $this->load->model("Home_model");
            $data["fetch_cus"] = $this->Home_model->fetch_cus();
            $data["fetch_debit"] = $this->Home_model->fetch_debit_dash();
            $data["fetch_credit"] = $this->Home_model->fetch_credit_dash();


            $this->load->view('header', $data);
            $this->load->view('today_report', $data);
            $this->load->view('footer');
        } else {
            redirect('Users');
        }
    }

    public function report() {
        if ($this->session->userdata('isUserLoggedIn')) {
            $data['user'] = $this->user->getRows(array('id' => $this->session->userdata('userId')));
            if (isset($_POST['view'])) {
                $from = $this->input->post('from');
                $to = $this->input->post('to');
            }
            $this->load->model("Home_model");
            $data["fetch_cus"] = $this->Home_model->fetch_cus();
            $data["fetch_report_debit"] = $this->Home_model->fetch_report_debit($from, $to);
            $data["fetch_report_credit"] = $this->Home_model->fetch_report_credit($from, $to);

            $this->load->view('header', $data);
            $this->load->view('report', $data);
            $this->load->view('footer');
        } else {
            redirect('Users');
        }
    }

    public function view_clients() {
        if ($this->session->userdata('isUserLoggedIn')) {
            $data['user'] = $this->user->getRows(array('id' => $this->session->userdata('userId')));
            $this->load->model("Home_model");
            $data["fetch_cus"] = $this->Home_model->fetch_cus();

            $del_id = $this->input->get('del');
            if (isset($del_id)) {
                // deleting Customer
                $this->db->where('id', $del_id);
                $this->db->delete('customers');

                //deleteing debit of customer
                $this->db->where('cus_id', $del_id);
                $this->db->delete('debit');

                //deleteing credit of customer
                $this->db->where('cus_id', $del_id);
                $this->db->delete('credit');
                $this->session->set_userdata('msg', 'deletetoast();');
                redirect('Home/view_clients');
            }
            $this->load->view('header', $data);
            $this->load->view('view_clients', $data);
            $this->load->view('footer');
        } else {
            redirect('Users');
        }
    }

    public function add_credit() {
        if ($this->session->userdata('isUserLoggedIn')) {
            $data['user'] = $this->user->getRows(array('id' => $this->session->userdata('userId')));
            if (isset($_POST['credit'])) {

                $userData = array(
                    'cus_id' => strip_tags($this->input->post('name')),
                    'discription' => strip_tags($this->input->post('discription')),
                    'date' => strip_tags($this->input->post('date')),
                    'amount' => strip_tags($this->input->post('amount')),
                    'dis_cat' => "badge-gradient-success",
                );

                $this->db->insert('credit', $userData);
                $this->session->set_userdata('msg', 'toastitem();');
                redirect('Home/');
            }
            if (isset($_POST['update_credit'])) {


                $userData = array(
                    'discription' => strip_tags($this->input->post('discription')),
                    'cus_id' => strip_tags($this->input->post('name')),
                    'amount' => strip_tags($this->input->post('amount')),
                );
                $id = $this->input->get('id');

                $this->db->where('cre_id', $id);
                $this->db->update('credit', $userData);
                $this->session->set_userdata('msg', 'toastupdate();');
                redirect('Home/');
            }

            $del_id = $this->input->get('del');

            if (isset($del_id)) {
                $this->db->where('cre_id', $del_id);
                $this->db->delete('credit');
                $this->session->set_userdata('msg', 'deletetoast();');
                redirect('Home/');
            }
            $this->load->model("Home_model");
            $data["fetch_cus"] = $this->Home_model->fetch_cus();
            $this->load->view('header', $data);
            $this->load->view('view_clients');
            $this->load->view('footer');
        } else {
            redirect('Users');
        }
    }

    public function add_debit() {
        if ($this->session->userdata('isUserLoggedIn')) {
            $data['user'] = $this->user->getRows(array('id' => $this->session->userdata('userId')));
            if (isset($_POST['debit'])) {

                $userData = array(
                    'cus_id' => strip_tags($this->input->post('name')),
                    'discription' => strip_tags($this->input->post('discription')),
                    'date' => strip_tags($this->input->post('date')),
                    'category_id' => strip_tags($this->input->post('item')),
                    'amount' => strip_tags($this->input->post('amount')),
                    'dis_cat' => "badge-gradient-warning",
                );

                $this->db->insert('debit', $userData);
                $this->session->set_userdata('msg', 'toastitem();');
                redirect('Home/');
            }
            if (isset($_POST['update_debit'])) {


                $userData = array(
                    'discription' => strip_tags($this->input->post('discription')),
                    'cus_id' => strip_tags($this->input->post('name')),
                    'date' => strip_tags($this->input->post('date')),
                    'category_id' => strip_tags($this->input->post('item')),
                    'amount' => strip_tags($this->input->post('amount')),
                );
                $id = $this->input->get('id');

                $this->db->where('deb_id', $id);
                $this->db->update('debit', $userData);
                $this->session->set_userdata('msg', 'toastupdate();');
                redirect('Home/');
            }


            $del_id = $this->input->get('del');

            if (isset($del_id)) {
                $this->db->where('deb_id', $del_id);
                $this->db->delete('debit');
                $this->session->set_userdata('msg', 'deletetoast()');
                redirect('Home/');
            }
            $this->load->model("Home_model");
            $data["fetch_cus"] = $this->Home_model->fetch_cus();
            $this->load->view('header', $data);
            $this->load->view('view_clients');
            $this->load->view('footer');
        } else {
            redirect('Users');
        }
    }

    public function view_detail() {
        if ($this->session->userdata('isUserLoggedIn')) {
            $data['user'] = $this->user->getRows(array('id' => $this->session->userdata('userId')));
            $this->load->model("Home_model");
            $data["fetch_cus"] = $this->Home_model->fetch_cus();
            $this->load->view('header', $data);
            $this->load->view('view_detail', $data);
            $this->load->view('footer');
        } else {
            redirect('Users');
        }
    }

}
