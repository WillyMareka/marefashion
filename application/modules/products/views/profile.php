<?php foreach ($ownprofile as $key => $value) {
                      	 foreach ($value as $q => $data) {
                      		
                      		//echo '<pre>';print_r($ownprofile);echo'</pre>';die();
                      		for ($i=0; $i <= $key ; $i++) { 
                      			
                      		?>

<div class="container">
	<div class="profile-container">

		<div class="col-sm-12 upper-profile">
		   <div class="col-sm-4 image-profile">
		   	   <img style="width:250px;height:250px;" src="<?php echo $data['picture']; ?>" alt="Profile pic">
		   	   <div class="update-button">
		   	   	    <a href="#"><button type="button" class="btn btn-primary">Update Account</button></a>
		   	   </div>
		   </div>
		   <div class="col-sm-4 ac-profile">
		   	   <p>Account Number</p> 
		   	   <p><span class="text-color idno"><?php echo $data['ac_id']; ?></span></p>
		   </div>
		   <div class="col-sm-4 name-profile">
               <p>First Name : <span class="text-color first"><?php echo $data['f_name']; ?></span></p>
               <p>Middle Name : <span class="text-color middle"><?php echo $data['m_name']; ?></span></p>
               <p>Last Name : <span class="text-color last"><?php echo $data['l_name']; ?></span></p>
               <p>Age : <span class="text-color extra"><?php echo $data['age']; ?></span></p>
		   </div>
	    </div>

	    <div class="col-sm-12 lower-profile">
          <div class="col-sm-4 first-profile">
            <p>Phone Number : <span class="text-color extra">(0) <?php echo $data['phone_no']; ?></span></p>
            <p>Email : <span class="text-color extra"><?php echo $data['email']; ?></span></p>
          </div>
          <div class="col-sm-4 second-profile">
          	<p>Nationality : <span class="text-color extra"><?php echo $data['nationality']; ?></span></p>
            <p>Residence : <span class="text-color extra"><?php echo $data['residence']; ?></span></p>
          </div>
          <div class="col-sm-4 third-profile">
            <p>Religion : <span class="text-color extra"><?php echo $data['religion']; ?></span></p>
            <p>Gender : <span class="text-color extra"><?php echo $data['gender']; ?></span></p>
          </div>
	    </div>

	</div>
</div>


<?php 
                             }
                      	 }
                      	
                      } 
						?>