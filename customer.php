<?php
  $page_title = 'Add Customer';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);
  $all_categories = find_all('categories');
  $all_photo = find_all('media');
?>

<?php

if(isset($_POST['edit_customer'])){

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
     
   
     
if(isset($_POST['edit_customer'])){
  $req_field = array('ID_No');
  validate_fields($req_field);
  
  if(empty($errors)){
        $sql = "UPDATE customer SET Name='{$Name}',Phone='{$Phone}',Date='{$Date}',Rex_No='{$Rex_No}',Lens_Tint='{$Lens_Tint}',Lens_Type='{$Lens_Type}',PD='{$PD}',JWO='{$JWO}',Receipt_No='{$Receipt_No}',Remarks='{$Remarks}',Frame='{$Frame}',D_R_Sph='{$D_R_Sph}',D_R_Cyl='{$D_R_Cyl}',D_R_Axis='{$D_R_Axis}',D_L_Sph='{$D_L_Sph}',D_L_Cyl='{$D_L_Cyl}',D_L_Axis='{$D_L_Axis}',R_R_Sph='{$R_R_Sph}',R_R_Cyl='{$R_R_Cyl}',R_R_Axis='{$R_R_Axis}',R_L_Sph='{$R_L_Sph}',R_L_Cyl='{$R_L_Cyl}',R_L_Axis='{$R_L_Axis}'";
       $sql .= " WHERE ID_No='$ID_No'";
     $result = $db->query($sql);
     if($result && $db->affected_rows() === 1) {
       $session->msg("s", "Successfully updated customer details");
       redirect('customer.php',false);
     } else {
       $session->msg("d", "Sorry! Failed to Update");
       redirect('customer.php',false);
     }
  } else {
    $session->msg("d", $errors);
    redirect('customer.php',false);
  }
}

    

}



?>





<?php include_once('layouts/header.php'); ?>

<div class="row">
<?php echo display_msg($msg); ?>
  <div class="col-md-6">
    
    <form method="post" action="">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-primary" name="fetch_btn">Find It</button>
            </span>
            <input type="text" class="form-control" name="get_id"  placeholder="Enter ID Number">
         </div>
         <div id="result" class="list-group"></div>
        </div>
    </form>
  </div>
</div>



<style>
    @media print {
        body * {
            visibility: hidden;
        }
        .print-container, .print-container * {
            visibility: visible;
        }
        .print-container{
            position: absolute;
            left: 0px;
            top: 0px;
        }
    }

</style>


      

<div class="panel panel-default">
        
        <div class="panel-body   print-container">

        <?php 
        $connection = mysqli_connect("localhost","root","","Inventorydb");
        if(isset($_POST['fetch_btn']))
        {
        
          $id = $_POST['get_id'];
          $query = "SELECT * FROM customer WHERE ID_No='$id' ";
          $quer_run = mysqli_query($connection, $query);

          if(mysqli_num_rows($quer_run) > 0)
          {
              while($row = mysqli_fetch_array($quer_run))
              {
                  ?>

<div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>

  
        <div class="col-md-12">
          
        <form method="post" action="customer.php">


        

            <div class="form-group ">
            <div class="row">
            <div class="col-md-1">
               <h5>Name</h5>
            </div>
            <div class="col-md-11">
                <input type="text" class="form-control" name="Name" placeholder="Name" value="<?php echo $row['Name']; ?>">
            </div>
            </div>
            </div>


            <div class="form-group">
            <div class="row">
            <div class="col-md-1">
               <h5>ID Number</h5>
            </div>
            <div class="col-md-5">
                <input type="number" class="form-control" name="ID_No" placeholder="ID Number" value="<?php echo $row['ID_No']; ?>">
            </div>
            <div class="col-md-1">
               <h5>Phone No</h5>
            </div>
            <div class="col-md-5">
                <input type="number" class="form-control" name="Phone" placeholder="Contact Number" value="<?php echo $row['Phone']; ?>"> 
            </div>
            </div>
            </div>

            <?php

              date_default_timezone_get("asia/colombo");
            ?>

            <div class="form-group">
            <div class="row">
            <div class="col-md-1">
               <h5>Date</h5>
            </div>
            <div class="col-md-5">
                <input type="date" class="form-control" name="Date" value="<?php echo $row['Date']; ?>">
            </div>
            <div class="col-md-1">
               <h5>Rex No</h5>
            </div>
            <div class="col-md-5">
                <input type="number" class="form-control" name="Rex_No" placeholder="Rex Number" value="<?php echo $row['Rex_No']; ?>">
            </div>
            </div>
            </div>

            <br>
            <center>
            <div class="">
            <div class="row">
            <div class="col-md-2">
            <h5>Sph</h5>
            </div>
            <div class="col-md-2">
            <h5>Cyl</h5>
            </div>
            <div class="col-md-2">
            <h5>Axis</h5>
            </div>
            <div class="col-md-2">
            <h5>Sph</h5>
            </div>
            <div class="col-md-2">
            <h5>Cyl</h5>
            </div>
            <div class="col-md-2">
            <h5>Axis</h5>
            </div>
            </div>
            </div>
            </center>


            <div class="form-group">
            <div class="row">
            <div class="col-md-2">
                <input type="input" class="form-control" name="D_R_Sph" placeholder="Sph" value="<?php echo $row['D_R_Sph']; ?>">
            </div>
            <div class="col-md-2">
                <input type="input" class="form-control" name="D_R_Cyl" placeholder="Cyl" value="<?php echo $row['D_R_Cyl']; ?>">
            </div>
            <div class="col-md-2">
                <input type="input" class="form-control" name="D_R_Axis" placeholder="Axis" value="<?php echo $row['D_R_Axis']; ?>">
            </div>
            <div class="col-md-2">
                <input type="input" class="form-control" name="D_L_Sph" placeholder="Sph" value="<?php echo $row['D_L_Sph']; ?>">
            </div>
            <div class="col-md-2">
                <input type="input" class="form-control" name="D_L_Cyl" placeholder="Cyl" value="<?php echo $row['D_L_Cyl']; ?>">
            </div>
            <div class="col-md-2">
                <input type="input" class="form-control" name="D_L_Axis" placeholder="Axis" value="<?php echo $row['D_L_Axis']; ?>">
            </div>
            </div>
            </div>



            <div class="form-group">
            <div class="row">
            <div class="col-md-2">
                <input type="input" class="form-control" name="R_R_Sph" placeholder="Sph" value="<?php echo $row['R_R_Sph']; ?>">
            </div>
            <div class="col-md-2">
                <input type="input" class="form-control" name="R_R_Cyl" placeholder="Cyl" value="<?php echo $row['R_R_Cyl']; ?>">
            </div>
            <div class="col-md-2">
                <input type="input" class="form-control" name="R_R_Axis" placeholder="Axis" value="<?php echo $row['R_R_Axis']; ?>">
            </div>
            <div class="col-md-2">
                <input type="input" class="form-control" name="R_L_Sph" placeholder="Sph" value="<?php echo $row['R_L_Sph']; ?>">
            </div>
            <div class="col-md-2">
                <input type="input" class="form-control" name="R_L_Cyl" placeholder="Cyl" value="<?php echo $row['R_L_Cyl']; ?>">
            </div>
            <div class="col-md-2">
                <input type="input" class="form-control" name="R_L_Axis" placeholder="Axis" value="<?php echo $row['R_L_Axis']; ?>">
            </div>
            </div>
            </div>

            <br>


            <div class="form-group">
            <div class="row">
            <div class="col-md-1">
               <h5>Lens Tint</h5>
            </div>
            <div class="col-md-3">
                <input type="input" class="form-control" name="Lens_Tint" placeholder="Lens Tint" value="<?php echo $row['Lens_Tint']; ?>">
            </div>
            <div class="col-md-1">
               <h5>Lens Type</h5>
            </div>
            <div class="col-md-3">
                <input type="input" class="form-control" name="Lens_Type" placeholder="Lens Type" value="<?php echo $row['Lens_Type']; ?>">
            </div>
            <div class="col-md-1">
               <h5>PD</h5>
            </div>
            <div class="col-md-3">
                <input type="input" class="form-control" name="PD" placeholder="PD" value="<?php echo $row['PD']; ?>">
            </div>
            </div>
            </div>



            <div class="form-group">
            <div class="row">
            <div class="col-md-1">
               <h5>Frame</h5>
            </div>
            <div class="col-md-11">
                <input type="input" class="form-control" name="Frame" placeholder="Frame Model" value="<?php echo $row['Frame']; ?>">
            </div>
            </div>
            </div>


            <div class="form-group">
            <div class="row">
            <div class="col-md-1">
               
                <h6>Wanted On</h6>
                
            </div>
            <div class="col-md-5">
                <input type="Date" class="form-control" name="JWO" placeholder="Job Wanted On" value="<?php echo $row['JWO']; ?>">
            </div>
            <div class="col-md-1">
               <h6>Receipt No</h6>
            </div>
            <div class="col-md-5">
                <input type="input" class="form-control" name="Receipt_No" placeholder="Receipt No" value="<?php echo $row['Receipt_No']; ?>">
            </div>
            </div>
            </div>


            <div class="form-group">
            <div class="row">
            <div class="col-md-1">
               <h5>Remarks</h5>
            </div>
            <div class="col-md-11">
                <input type="text" class="form-control" name="Remarks" placeholder="Remarks" value="<?php echo $row['Remarks']; ?>">
            </div>
            </div>
            </div>

            <div class="">
  <span class="input-group-btn">
              <button type="submit" class="btn btn-danger" name="edit_customer">Update</button>
            </span>
        
      </div>

            
      </form>

        
        </div>
        </div>
    </div>
    </div>

    


                  <?php
              }
          }
          else
          {
            echo "No Record Found";
          }
        }
      
      
      ?>


     


   </div>



<?php include_once('layouts/footer.php'); ?>