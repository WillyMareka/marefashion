
  
 <div id="top_info">
   <?php
       if(isset($new_user)){ ?>
         <div class="well well-sm well-warn"><h4><?php echo $new_user; ?></h4></div>
   <?php

       }elseif(validation_errors()){
                              
   ?>
         <div class="well well-sm well-warn"><h4><?php echo validation_errors('<p class="error">'); ?></h4></div>
   <?php
       }else{ 
        ?>
         <div class="well well-sm well-info"><h4>Please log into the system</h4></div>

   <?php
       }
   ?>



</div> 

</div>




  	    <div class="container logspace">    
        <div id="loginbox" style="margin-top:120px;margin-bottom:100px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    

            <div class="panel panel-info" >
                    <div class="panel-heading headerback">
                        <div class="panel-title  ">Log In</div>
                    </div> 
                    <div style="padding-top:30px" class="panel-body" >

                        <!-- <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div> -->
                            
                        <form id="loginform" method="POST" action="<?php echo base_url() . 'user/validate_member'?>" class="form-horizontal" role="form">
                          
                               <?php 
                                  echo form_open('user/validate_member');
                               ?>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" required class="form-control" name="l_username" value="" placeholder="Username">                                        
                                    </div>
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" required class="form-control password" name="l_password" placeholder="Password">
                                    </div>
                                <div style="margin-top:10px" class="form-group">
                                    <div class="col-sm-9 ">
                                      <button id="btn-login" name="login_button" type="submit" class="btn btn-success">Login</button>
                                    </div>
                                    <div class="col-sm-3 ">
                                      <a id="btn-sign" name="signup_button" href="<?php echo base_url(). 'user/sign'?>" class="btn btn-warning">Sign Up</a>
                                    </div>
                                </div>
                                <!-- <div class="form-group">                                    
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-login" name="signup_button" type="submit" class="btn btn-success signup"><i class="icon-hand-right"></i> Sign Up</button>  
                                    </div>
                                </div> -->
                               <?php 
                                    echo form_close();
                                 ?>
                          </form>
                          
              	       </div> 
           </div>
        </div>    
		</div>


