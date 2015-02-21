<?php foreach ($ownprofile as $key => $value) {
                         foreach ($value as $q => $data) {
                            
                            //echo '<pre>';print_r($ownprofile);echo'</pre>';die();
                            for ($i=0; $i <= $key ; $i++) { 
                                
                            ?>

<form enctype="multipart/form-data" method="POST" action="<?php echo base_url() . 'home/updatemember'?>" class="form-horizontal black" role="form">
                  
     <!-- <div class="well well-sm well-info">Please fill all fields</div> -->

<div class="container">
    <div class="profile-container">

        <div class="col-sm-12 upper-profile">
           <div class="col-sm-4 image-profile">
               <img style="width:250px;height:250px;" src="<?php echo $data['picture']; ?>" alt="Profile pic">
               
           </div>
           <div class="col-sm-4 ac-profile">
               <p>Account Number</p> 
               <p><span class="text-color idno"><?php echo $data['ac_id']; ?></span></p>
               <input class="form-control" name="id" type="hidden"  value="<?php echo $data['ac_id']; ?>" />
               <p class="update-button">
                    <button type="submit" class="btn btn-primary">Update Account</button>
               </p>
           </div>
           <div class="col-sm-4 name-profile">
               <p>First Name : <span class="text-color first"><input type="text" class="form-control" value="<?php echo $data['f_name']; ?>" name="fname" ></p>
               <p>Middle Name : <span class="text-color middle"><input type="text" class="form-control" value="<?php echo $data['m_name']; ?>" name="mname" ></p>
               <p>Last Name : <span class="text-color last"><input type="text" class="form-control" value="<?php echo $data['l_name']; ?>" name="lname" ></p>
               <p>Age : <span class="text-color extra"><input type="text" class="form-control" value="<?php echo $data['age']; ?>" name="age" ></p>
           </div>
        </div>

        <div class="col-sm-12 lower-profile">
          <div class="col-sm-4 first-profile">
            <p>Phone Number : (0)<span class="text-color extra"><input type="text" class="form-control" value="<?php echo $data['phone_no']; ?>" name="pnumber" ></p>
            <p>Email : <span class="text-color extra"><input type="text" class="form-control" value="<?php echo $data['email']; ?>" name="email" ></p>
          </div>
          <div class="col-sm-4 second-profile">
            <p>Nationality : <span class="text-color extra"><input type="text" class="form-control" value="<?php echo $data['nationality']; ?>" name="nationality" ></p>
            <p>Residence : <span class="text-color extra"><input type="text" class="form-control" value="<?php echo $data['residence']; ?>" name="residence" ></p>
          </div>
          <div class="col-sm-4 third-profile">
            <p>Religion : <span class="text-color extra"><input type="text" class="form-control" value="<?php echo $data['religion']; ?>" name="religion" ></p>
            <p>Gender : <span class="text-color extra"><input type="text" class="form-control" value="<?php echo $data['gender']; ?>" name="gender" ></p>
          </div>
        </div>

    </div>
</div>


                                <?php 
                                    echo form_close();
                                 ?>
                                 
                    </form>

                        <?php 
                             }
                         }
                        
                       }
                        ?>