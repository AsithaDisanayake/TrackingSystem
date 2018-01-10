<?php


class AttendanceController extends CI_Controller{
    public function attendance()	{

        $Username = $this->input->post('search');      /*Use the post method*/
        $this->load->model('Personmodel');

        if($this->Personmodel->getAttendance($Username)){
            $data['result1'] = $this->Personmodel->getAttendance($Username);
            $this->load->view('reports',$data);
        }
        else{
//            $this->session->set_flashdata('success8','Invalid username..!');
            $this->load->view('reports');
            session_unset();
        }






    }
}