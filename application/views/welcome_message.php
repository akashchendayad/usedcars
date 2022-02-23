<!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/car.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/jquery.dataTables.min.css"/>
      <script type="text/javascript" src="<?php echo base_url()?>js/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>js/bootstrap.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>js/car.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>js/jquery.dataTables.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <div class="head">
         <h1>Used Cars</h1>
      </div>
      <div style="overflow:auto">
         <div class="menu">
		    <a onclick="changesection('3')"> Home Page</a>
            <a onclick="changesection('1')">Login</a>
            <a onclick="changesection('2')">Register</a>
            
         </div>
         <div class="main">
            <div class="container" id="report_section">
			</div>
         </div>
      </div>
      <div id="msg" class="container res">
         <span id="response"></span>
      </div>
   </body>
</html>