<?php

class Viewowner extends CI_Controller{

  function __construct()
    {
        parent::__construct();
        $this->load->helper(array("url","form"));
        $this->load->library(array("session","form_validation"));
        $this->load->database();
    }



    public function viewownerprof(){

      $this->load->model('Personmodel');

      if ($this->Personmodel->viewownerprof1() && $this->Personmodel->viewownerprof2() && $this->Personmodel->viewownerprof3() && $this->Personmodel->viewownerprof4()) {
        $data['results1']= $this->Personmodel->viewownerprof1();
        $data['results2']= $this->Personmodel->viewownerprof2();
        $data['results3']= $this->Personmodel->viewownerprof3();
        $data['results4']= $this->Personmodel->viewownerprof4();
        $this->load->view('ownerprof1',$data);
      }
      else {
        $this->session->set_flashdata('success8','Invalid Vehicle Owner ID');

        $this->load->view('ownerprof1');
        session_unset();
      }

    }

    public function deleteownerprof(){

      $this->load->model('Personmodel');

      if ($this->Personmodel->deleteownerprof()) {
        $this->session->set_flashdata('success8','Vehicle Owner Profile Deleted');
        $this->load->view('ownerprof1');
        session_unset();
      }
      else {
        $this->session->set_flashdata('success8','Invalid NIC');
        $this->load->view('ownerprof1');
        session_unset();
      }

    }
    public function updateowner(){

      $this->load->model('Personmodel');
      if ($this->Personmodel->updateowner()) {
        $this->session->set_flashdata('success8','Vehicle Owner profile Updated');
        $this->load->view('ownerprof1');
        session_unset();
      }
      else {
        $this->session->set_flashdata('success8','Invalid NIC');
        $this->load->view('ownerprof1');
        session_unset();
      }


    }


  }










 ?>
