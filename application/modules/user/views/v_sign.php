


  <div class="container">
     
     <span>
      <div id="signupbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        			
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                            
                        </div>  
                        <div class="panel-body" >

                                                         
                            <?php 
                            
                                  echo validation_errors('<p class="error">'); 
                             

                              ?>
                             
                            <form id="signupform" enctype="multipart/form-data" method="POST" action="<?php echo base_url() . 'user/create_member'?>" class="form-horizontal black" role="form">
                  
                            <div class="well well-sm well-info">Please fill all fields</div>



                              <?php 
                                  echo form_open_multipart(base_url().'user/create_member');
                              ?>
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" required class="form-control" value="<?php echo set_value('firstname'); ?>" name="firstname" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="middlename" class="col-md-3 control-label">Middle Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="middlename" value="<?php echo set_value('middlename'); ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" required class="form-control" name="lastname" value="<?php echo set_value('lastname'); ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Picture</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" id="picture" name="picture" value="<?php echo set_value('picture'); ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="age" class="col-md-3 control-label">Age</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="age" value="<?php echo set_value('age'); ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nationality" class="col-md-3 control-label">Nationality</label>
                                    <div class="col-md-9">
                                        <input type="text" required class="form-control" name="nationality" value="<?php echo set_value('nationality'); ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phonenumber" class="col-md-3 control-label">Phone Number</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="phonenumber" value="<?php echo set_value('phonenumber'); ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" required class="form-control" name="email" value="<?php echo set_value('email'); ?>" >
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="residence" class="col-md-3 control-label">Residence</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="residence" value="<?php echo set_value('residence'); ?>" >
                                    </div>
                                </div>   
                                <div class="form-group">
                                    <label for="religion" class="col-md-3 control-label">Religion</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="religion" value="<?php echo set_value('religion'); ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="genders" class="col-md-3 control-label">Gender</label>
                                    <div class="genders" name="genders">
                                       <div class="col-md-3">
                                        <label for="gender" class="control-label">Male</label>
                                        <input type="radio" class="gender" name="gender" value="Male">
                                       </div>
                                       <div class="col-md-3">
                                        <label for="gender" class="control-label">Female</label>
                                        <input type="radio" class="gender" name="gender" value="Female">
                                       </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-md-3 control-label">User Name</label>
                                    <div class="col-md-9">
                                        <input type="text" required class="form-control" value="<?php echo set_value('username'); ?>" name="username" >
                                    </div>
                                </div>
                          
                                <div class="form-group">
                                    <label for="pass1" class="col-md-3 control-label">Enter Password</label>
                                    <div class="col-md-9">
                                        <input type="password" required class="form-control" name="pass1" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pass2" class="col-md-3 control-label">Re-Enter Password</label>
                                    <div class="col-md-9">
                                        <input type="password" required class="form-control" name="pass2" >
                                    </div>
                                </div>
                               
                                <div class="form-group">                                    
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" name="signup_button" type="submit" class="btn btn-success signup"><i class="icon-hand-right"></i> Sign Up</button>  
                                    </div>
                                </div>

                                 <?php 
                                    echo form_close();
                                 ?>
                                </form>


                         </div>
                    </div>
         </div> 
         </span>
    </div>


