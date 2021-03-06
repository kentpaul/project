<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Loanclerk extends CI_Controller {

	public function index(){
		$this->check_logged();
      	$this->main_contents();
    }
    //menu options

    public function logout(){
    	session_destroy();
    	redirect();
    }

    public function error404(){
        $this->load->view('templates/error');
    }


    private function main_contents(){
        $this->load->model('Mem_model','members');
        $res = $this->members->getMembers();
        $data = array('title' => "LoanClerk",'contents' => "pages/l-table",'page' => "LoanClerk","links" => "main","res" => $res);
        $this->load->view('templates/dashboard-header',$data);
        $this->load->view('pages/loan-main',$data);
    }

    private function edit(){
        $this->load->view('pages/edit');
    }

    private function check_logged(){
        if($this->session->has_userdata('logged_in')==false){
                redirect();
        }else if($this->session->userdata('user_type')!='loanclerk'){
            echo '<script type="text/javascript">'; 
            echo 'alert("Access Forbidden!");'; 
            echo 'window.location.href = "Error404";';
            echo '</script>';
            // $userType = $this->session->userdata('user_type');
            // if('cashier'==$userType){
            //     redirect('cashier');
            // }else if ('admin'==$userType){
            //     redirect('admin');
            // }else if ('manager'==$userType){
            //     redirect('manager');
            // }else{
            //     echo '<script type="text/javascript">'; 
            //     echo 'alert("Access Forbidden!");'; 
            //     echo 'window.location.href = "Error404";';
            //     echo '</script>';
            //     exit;
            // }
        }
        else{
            return true;
        }
           
    }
}

