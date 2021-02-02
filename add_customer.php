<?php
  $page_title = 'Add Customer';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);
  $all_categories = find_all('categories');
  $all_photo = find_all('media');
  $all_products = find_all('products');
?>

<?php

if(isset($_POST['add_Customer'])){

     $Name  = remove_junk($db->escape($_POST['Name']));
     $ID_No  = remove_junk($db->escape($_POST['ID_No']));
     $Phone  = remove_junk($db->escape($_POST['Phone']));
     $Date  = remove_junk($db->escape($_POST['Date']));
     $Rex_No  = remove_junk($db->escape($_POST['Rex_No']));
     $Lens_Tint  = remove_junk($db->escape($_POST['Lens_Tint']));
     $Lens_Type  = remove_junk($db->escape($_POST['Lens_Type']));
     $PD  = remove_junk($db->escape($_POST['PD']));
     $JWO  = remove_junk($db->escape($_POST['JWO']));
     $Receipt_No  = remove_junk($db->escape($_POST['Receipt_No']));
     $Remarks  = remove_junk($db->escape($_POST['Remarks']));
     $Frame  = remove_junk($db->escape($_POST['Frame']));
     $D_R_Sph  = remove_junk($db->escape($_POST['D_R_Sph']));
     $D_R_Cyl  = remove_junk($db->escape($_POST['D_R_Cyl']));
     $D_R_Axis  = remove_junk($db->escape($_POST['D_R_Axis']));
     $D_L_Sph  = remove_junk($db->escape($_POST['D_L_Sph']));
     $D_L_Cyl  = remove_junk($db->escape($_POST['D_L_Cyl']));
     $D_L_Axis  = remove_junk($db->escape($_POST['D_L_Axis']));
     $R_R_Sph  = remove_junk($db->escape($_POST['R_R_Sph']));
     $R_R_Cyl  = remove_junk($db->escape($_POST['R_R_Cyl']));
     $R_R_Axis  = remove_junk($db->escape($_POST['R_R_Axis']));
     $R_L_Sph  = remove_junk($db->escape($_POST['R_L_Sph']));
     $R_L_Cyl  = remove_junk($db->escape($_POST['R_L_Cyl']));
     $R_L_Axis  = remove_junk($db->escape($_POST['R_L_Axis']));
     
   
     $date    = make_date();
     $query  = "INSERT INTO customer (";
     $query .=" Name,ID_No,Phone,Date,Rex_No,Lens_Tint,Lens_Type,PD,JWO,Receipt_No,Remarks,Frame,D_R_Sph,D_R_Cyl,D_R_Axis,D_L_Sph,D_L_Cyl,D_L_Axis,R_R_Sph,R_R_Cyl,R_R_Axis,R_L_Sph,R_L_Cyl,R_L_Axis";
     $query .=") VALUES (";
     $query .=" '{$Name}','{$ID_No}','{$Phone}','{$Date}','{$Rex_No}','{$Lens_Tint}','{$Lens_Type}','{$PD}','{$JWO}','{$Receipt_No}','{$Remarks}','{$Frame}','{$D_R_Sph}','{$D_R_Cyl}','{$D_R_Axis}','{$D_L_Sph}','{$D_L_Cyl}','{$D_L_Axis}','{$R_R_Sph}','{$R_R_Cyl}','{$R_R_Axis}','{$R_L_Sph}','{$R_L_Cyl}','{$R_L_Axis}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE ID_No=ID_No";
     if($db->query($query)){
      $session->msg('s',"Customer added ");
      redirect('add_customer.php', false);
    } else {
      $session->msg('d',' Sorry failed to added!');
      redirect('add_customer.php', false);
    }
    

}



?>



<?php include_once('layouts/header.php'); ?>

<div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
   <div class="row">
   <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-user"></span>
            <span>Add New Customer</span>
         </strong>
        </div>
        <div class="panel-body">
        <div class="col-md-12">
          <form method="post" action="add_customer.php">

            <div class="form-group">
                <input type="text" class="form-control" name="Name" placeholder="Name" required>
            </div>

            <div class="form-group">
            <div class="row">
            <div class="col-md-6">
                <input type="number" class="form-control" name="ID_No" placeholder="ID Number"required>
            </div>
            <div class="col-md-6">
                <input type="number" class="form-control" name="Phone" placeholder="Contact Number"required>
            </div>
            </div>
            </div>

            <?php

              date_default_timezone_get("asia/colombo");
            ?>

            <div class="form-group">
            <div class="row">
            <div class="col-md-6">
                <input type="date" class="form-control" name="Date" value="<?php echo date('Y-m-d');   ?>">
            </div>
            <div class="col-md-6">
                <input type="number" class="form-control" name="Rex_No" placeholder="Rex Number">
            </div>
            </div>
            </div>

            <br>
            


            <div class="form-group">
            <div class="row">
            <div class="col-md-2">
                <input type="input" class="form-control" name="D_R_Sph" placeholder="Sph">
            </div>
            <div class="col-md-2">
                <input type="input" class="form-control" name="D_R_Cyl" placeholder="Cyl">
            </div>
            <div class="col-md-2">
                <input type="input" class="form-control" name="D_R_Axis" placeholder="Axis">
            </div>
            <div class="col-md-2">
                <input type="input" class="form-control" name="D_L_Sph" placeholder="Sph">
            </div>
            <div class="col-md-2">
                <input type="input" class="form-control" name="D_L_Cyl" placeholder="Cyl">
            </div>
            <div class="col-md-2">
                <input type="input" class="form-control" name="D_L_Axis" placeholder="Axis">
            </div>
            </div>
            </div>



            <div class="form-group">
            <div class="row">
            <div class="col-md-2">
                <input type="input" class="form-control" name="R_R_Sph" placeholder="Sph">
            </div>
            <div class="col-md-2">
                <input type="input" class="form-control" name="R_R_Cyl" placeholder="Cyl">
            </div>
            <div class="col-md-2">
                <input type="input" class="form-control" name="R_R_Axis" placeholder="Axis">
            </div>
            <div class="col-md-2">
                <input type="input" class="form-control" name="R_L_Sph" placeholder="Sph">
            </div>
            <div class="col-md-2">
                <input type="input" class="form-control" name="R_L_Cyl" placeholder="Cyl">
            </div>
            <div class="col-md-2">
                <input type="input" class="form-control" name="R_L_Axis" placeholder="Axis">
            </div>
            </div>
            </div>

            <br>


            <div class="form-group">
            <div class="row">
            <div class="col-md-4">
                
                <select class="form-control" name="Lens_Tint">
                      <option value="">Select Lens Tint</option>
                    <?php  foreach ($all_products as $pod): ?>
                      <option value="<?php echo $pod['name'] ?>">
                        <?php echo $pod['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
            </div>
            <div class="col-md-4">
                
                <select class="form-control" name="Lens_Type">
                      <option value="">Select Lens Type</option>
                    <?php  foreach ($all_products as $pod): ?>
                      <option value="<?php echo $pod['name'] ?>">
                        <?php echo $pod['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
            </div>
            <div class="col-md-4">
                <input type="input" class="form-control" name="PD" placeholder="PD">
            </div>
            </div>
            </div>



            <div class="form-group">
            <div class="row">
            <div class="col-md-12">
               
                <select class="form-control" name="Frame">
                      <option value="">Select Frame Model</option>
                    <?php  foreach ($all_products as $pod): ?>
                      <option value="<?php echo $pod['name'] ?>">
                        <?php echo $pod['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
            </div>
            </div>
            </div>


            <div class="form-group">
            <div class="row">
            <div class="col-md-1">
               <center> 
                <h6>Wanted On</h6>
                </center>
            </div>
            <div class="col-md-5">
                <input type="Date" class="form-control" name="JWO" placeholder="Job Wanted On">
            </div>
            <div class="col-md-6">
                <input type="input" class="form-control" name="Receipt_No" placeholder="Receipt No">
            </div>
            </div>
            </div>


            <div class="form-group">
            <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control" name="Remarks" placeholder="Remarks">
            </div>
            </div>
            </div>

            

            <button type="submit" name="add_Customer" class="btn btn-primary">Add</button>
        </form>
        </div>
        </div>
    </div>
    </div>


   </div>



<?php include_once('layouts/footer.php'); ?>
