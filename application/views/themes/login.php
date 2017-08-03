 <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo lang('Login');?></h3>
                        
                    </div>
                
                        
                      
                    <div class="panel-body">
                        <?php echo $this->session->flashdata('message'); ?>
                        <?php echo validation_errors(); ?>
                        <form action="" role="form" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="<?php echo lang('Email');?>" name="email" type="email" autofocus="off" value="<?php echo set_value('email'); ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="<?php echo lang('Password');?>" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me"><?php echo lang('Remember Me');?>
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" value="<?php echo lang('Login');?>" name="submit" class="btn btn-lg btn-success btn-block">
                                </input>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>