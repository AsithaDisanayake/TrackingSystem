<?php



Class Detailmodel extends CI_Model {


    public function assigned(){
      $this->db->select('*');
      $this->db->from('vehicle');
      $this->db->join('employee', 'employee.VehicleNo = vehicle.VehicleNo', 'inner');
      $query1 = $this->db->get();

      if ( $query1->num_rows() > 0 )
      {
          return $query1->result_array();
      }
      else {
        return false;
      }

    }

    public function notassigned(){
      $q1 =$this->db->select(array(
          't1.VehicleNo as VehicleNo',
          't1.RegNo',
          't1.Brand',
          't1.Model'))
          ->from('vehicle AS t1')
          ->where('t1.VehicleNo NOT IN (select VehicleNo from employee)',NULL,FALSE)
          ->get();

          if ( $q1->num_rows() > 0 )
          {
              return $q1->result_array();
          }
          else {
            return false;
          }

    }
    public function foo(){
      $vehicleno=$this->input->post('vehicleno');
      $this->db->select('*');
      $this->db->from('person');
      $this->db->join('employee', 'employee.NIC = person.NIC', 'inner');
      $this->db->where('VehicleNo',$vehicleno);
      $query1 = $this->db->get();

      if ( $query1->num_rows() > 0 )
      {
          return $query1->result_array();
      }
      else {
        return false;
      }

    }
    public function foo1(){
      $vehicleno=$this->input->post('vehicleno');
      $this->db->select('*');
      $this->db->from('employee');
      $this->db->where('VehicleNo',$vehicleno);
      $query1 = $this->db->get();

      if ( $query1->num_rows() > 0 )
      {
          return $query1->result_array();
      }
      else {
        return false;
      }

    }
    public function foo2(){
      $vehicleno=$this->input->post('vehicleno');
      $this->db->select('*');
      $this->db->from('vehicle');
      $this->db->where('RegNo',$vehicleno);
      $query1 = $this->db->get();

      if ( $query1->num_rows() > 0 )
      {
          return $query1->result_array();
      }
      else {
        return false;
      }

    }




  }

?>
