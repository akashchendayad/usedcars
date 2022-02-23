<?php
class Welcome_m extends CI_Model
{
   public function get_private_listing($id)
   {
       $query = $this ->db->query("SELECT car_id,car_model, date_format(manuf_year,'%Y') as manuf_year,car_color,car_mileage FROM tbl_cars where user_id='$id'");
        return $result = $query->result_array();

   }

    public function login()
    {
         $uname=$this->input->post('username');
         $pwd=$this->input->post('pwd');
         $query=$this->db->query("SELECT id from tbl_users where username='$uname' and password=md5('$pwd')");
         $res = $query->row();
         if(!empty($res))
         $login_check=$res->id;
         else
         $login_check=0;
         return $login_check;
 
    }
    public function reterive_data()
    {
        $base=base_url();
        $query = $this
            ->db
            ->query("SELECT car_id,car_model, date_format(manuf_year,'%Y') as manuf_year,car_color,car_mileage FROM `tbl_cars`");

        return $query;
    }
    public function check_user_availability()
    {
       $uname=strtolower($this->input->post('username'));
       $query=$this->db->query("select * from tbl_users where username='$uname'");
       if ($query->num_rows() == 0)
           return 0;
       else
           return 1;
    }

    public function car_edit()
    {
        $id=strtolower($this->input->post('id'));
        $query=$this->db->query("select  car_id,car_model,manuf_year,car_color,car_mileage from tbl_cars where car_id='$id'");
         
        return $res = $query->row();
       

    }

    public function car_del()
    {
        $id=strtolower($this->input->post('id'));
        $query=$this->db->query("delete from tbl_cars where car_id='$id'");
        return  $query;
       

    }


    public function save_reg()
    {
        $name=$this->input->post('name');
        $uname=$this->input->post('username');
        $pwd=$this->input->post('pwd');

        $query = $this ->db ->query("insert into tbl_users(name,username,password) values('$name','$uname',md5('$pwd'))");

         return $query;

    }

    public function save()
    {
        $car_model=$this->input->post('car_model');
        $manuf_year=$this->input->post('manuf_year');
        $car_color=$this->input->post('car_color');
        $car_mileage=$this->input->post('car_mileage');
        $user_id=$this->session->userdata('userid');


        $query = $this ->db ->query("insert into tbl_cars(user_id,car_model,manuf_year,car_color,car_mileage) 
        values('$user_id','$car_model','$manuf_year','$car_color','$car_mileage')");

        return $query;

    }



    public function update()
    {
        $car_id=$this->input->post('car_id');
        $car_model=$this->input->post('car_model');
        $manuf_year=$this->input->post('manuf_year');
        $car_color=$this->input->post('car_color');
        $car_mileage=$this->input->post('car_mileage');
        $user_id=$this->session->userdata('userid');


        $query = $this ->db ->query(" update tbl_cars set car_model='$car_model',manuf_year='$manuf_year',car_color='$car_color',car_mileage='$car_mileage' 
          where car_id='$car_id'");

        return $query;

    }

}

