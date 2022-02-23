<!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/car.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/jquery.dataTables.min.css"/>
      <script type="text/javascript" src="<?php echo base_url()?>js/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>js/bootstrap.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>js/private.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>js/jquery.dataTables.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <div class="head">
         <h1>Used Cars</h1>
      </div>
      <div style="overflow:auto">
         <div class="menu">
            <a href="logout">Log Out</a>
         
            
         </div>
         <div class="main">
            <div class="container" id="report_section">

            <h2>Private Listing</h2>
             
          <table class="table table-bordered">
            <thead>
              <tr>
                <td> <a onclick="newentry();"> + add new entry</a></td>
              </tr>
            <tr style="background: antiquewhite;">
                <th>Car ID</th>
                <th>Model</th>
                <th>Manufacturing Year</th>
                <th>Color</th>
                <th>Mileage</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
    <?php
            foreach($get_private_listing as $list)
            {
                echo '<tr>
                <td>'.$list['car_id'].'</td>
                <td>'.$list['car_model'].'</td>
                <td>'.$list['manuf_year'].'</td>
                <td>'.$list['car_color'].'</td>
                <td>'.$list['car_mileage'].'</td>
                <td><button type="submit" class="btn btn-default" id="'.$list['car_id'].'" onclick="edit(this.id)">Edit</button></td>
                <td><button type="submit" class="btn btn-default" id="'.$list['car_id'].'" onclick="del(this.id)">Delete</button></td>
              </tr>';
            } 
  ?>
  
              </tbody>
          </table>
			</div>
         </div>
      </div>
      
   </body>
</html>




 <!-- Modal -->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">update</h4>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" id="car_id" disabled>
          <input type="text" class="form-control" id="car_model" >
          <input type="date" class="form-control" id="manuf_year" >
          <input type="text" class="form-control" id="car_color" >
          <input type="text" class="form-control" id="car_mileage" >
          <button type="button" onclick="update();" class="form-control" style=" background: gray;">Update</button>
        </div>
        <div class="modal-footer">
          <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>





  <div class="modal fade" id="myModalc" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Entry</h4>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" id="car_model_save" placeholder="car model">
          <input type="date" class="form-control" id="manuf_year_save" placeholder="car year" >
          <input type="text" class="form-control" id="car_color_save" placeholder="car color" >
          <input type="text" class="form-control" id="car_mileage_save" placeholder="car mileage" >
          <button type="button" onclick="save();" class="form-control" style=" background: gray;">Save</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
