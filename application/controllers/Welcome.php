<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Welcome extends CI_Controller
{

    function __construct()

    {
        parent::__construct();
        $this
            ->load
            ->model('Welcome_m');
            $this->load->library('session');

    }
    public function index()
    {
       
        if(isset($_SESSION['userid']))
        {  
           
            $user_id=$this->session->userdata('userid');
            $data['get_private_listing']=$this->Welcome_m->get_private_listing($user_id); 
			$this->load->view('dashboard',$data);
        }
        else
         $this->load->view('welcome_message');
    }

   
    public function login()
	{
        if(isset($_SESSION['userid']))
        {   $user_id=$this->session->userdata('userid');
            $data['get_private_listing']=$this->Welcome_m->get_private_listing($user_id); 
			$this->load->view('dashboard',$data);
        }
        else
		{
           
		      $login_check=$this->Welcome_m->login();  
             
		if ($login_check>0)
		   {
			 $this->session->set_userdata('userid', $login_check);
             $data['get_private_listing']=$this->Welcome_m->get_private_listing($login_check);  
             $this->load->view('dashboard',$data);

		   }
		   else
		   redirect(base_url(), 'refresh');

        }

    }
   
    public function logout()
	{
		$this->load->driver('cache');
		$this->session->sess_destroy();
		$this->cache->clean();
		redirect(base_url(), 'refresh');
	}

    public function usernamechk()
    {
        $usernamechk=$this->Welcome_m->check_user_availability();
        header('Content-Type: application/json');
	    echo json_encode(array('result' => $usernamechk));

    }
    public function registration()
    {
        if(isset($_SESSION['userid']))
        {   $user_id=$this->session->userdata('userid');
            $data['get_private_listing']=$this->Welcome_m->get_private_listing($user_id); 
			$this->load->view('dashboard',$data);
        }
        else
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST')
            {
           $save_reg=$this->Welcome_m->save_reg(); 
        if($save_reg==1)
        {
            $login_check=$this->Welcome_m->login();  
             
	   	if ($login_check>0)
		   {
			 $this->session->set_userdata('userid', $login_check);
             $data['get_private_listing']=$this->Welcome_m->get_private_listing($login_check);  
             $this->load->view('dashboard',$data);

		   }
		   else
		   redirect(base_url(), 'refresh');

        }

        } 
        else
		   redirect(base_url(), 'refresh');
      }
    }
    public function get_sec_det()
    {
        $id = $this
            ->input
            ->post('id');

        if ($id == 1)
        {
            $htmldata = '
		    <div style="margin: 2rem;"> 
			</div> 
            <form method="post" action="login"> 
		   <div class="form-group">
		   <input type="text" id="username" name="username" class="form-control" placeholder="User Name" required>
		 </div>
         <div class="form-group">
         <input type="password" id="pwd" name="pwd" class="form-control" placeholder="Password" required>
       </div>
		 <button type="submit" class="btn btn-default" style="width: 20rem;color: black;background: #41dd62bf;outline-style: none;">Login</button>
         </form>';

        }
        if ($id == 2)
        {
            $htmldata = ' <div style="margin: 2rem;"> 
		   </div>  
           <form method="post" action="registration"> 
           <div class="form-group">
		   <input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
		 </div>
		   <div class="form-group">
		   <input type="text" id="username" name="username" onkeyup="usernamechk()" class="form-control" placeholder="User Name" required>
		 </div>
         <div class="form-group">
         <input type="password" id="pwd" name="pwd" class="form-control" placeholder="Password" required>
       </div>
		 <button type="submit" class="btn btn-default" style="width: 20rem;color: black;background: #41dd62bf;outline-style: none;">Register</button>
         </form>';

        }

        if ($id == 3)
        {
            $htmldata = '<div class="container">
			   <div class="">
				 <h1>Public Listing</h1>
				 <div class="">
				 <table id="tble_urldata" class="display" width="100%" style="color:black" cellspacing="0">
				 <thead>
					 <tr>
						 <th>Car ID</th>
						 <th>Model</th>
						 <th>Year</th>
						 <th>Color</th>
						 <th>Mileage</th>
                        

					 </tr>
				 </thead>
			 </table>
			 </div>
			   </div>
			 </div>';

        }

        header('Content-Type: application/json');
        echo json_encode(array(
            'report' => $htmldata
        ));
    }

    public function get_tbldata()
    {
        $draw = intval($this
            ->input
            ->get("draw"));
        $start = intval($this
            ->input
            ->get("start"));
        $length = intval($this
            ->input
            ->get("length"));

        $reterive_data = $this
            ->Welcome_m
            ->reterive_data();
        

        $data = [];

        foreach ($reterive_data->result() as $r)
        {
            $data[] = array(
                $r->car_id,
                $r->car_model,
                $r->manuf_year,
                $r->car_color,
                $r->car_mileage
            );
        }

        $result = array(
            "draw" => $draw,
            "recordsTotal" => $reterive_data->num_rows() ,
            "recordsFiltered" => $reterive_data->num_rows() ,
            "data" => $data
        );

        echo json_encode($result);
        exit();
    }
    
    public function car_edit()
    {
        $car_edit=$this->Welcome_m->car_edit(); 
        $car_id=$car_edit->car_id;
        $car_model=$car_edit->car_model;
        $manuf_year=$car_edit->manuf_year;
        $car_color=$car_edit->car_color;
        $car_mileage=$car_edit->car_mileage;

        header('Content-Type: application/json');
        echo json_encode(array(
            'car_id' => $car_id,
            'car_model' => $car_model,
            'manuf_year' => $manuf_year,
            'car_color' => $car_color,
            'car_mileage' => $car_mileage
        ));
       
    }

    public function car_del()
    {
        $car_del=$this->Welcome_m->car_del(); 
    }
    public function save()
    {
        $car_save=$this->Welcome_m->save();

    }

    public function update()
    {
        $car_update=$this->Welcome_m->update();

    }

}

