    <div class="pdd-horizon-30 pdd-vertical-30">
        <div class="mrg-btm-30">
            <img class="img-responsive inline-block" src="<?php echo base_url() ?>assets/dist/assets/images/logo/logo.png" alt="">
            <h2 class="inline-block pull-right no-mrg-vertical pdd-top-15">Login</h2>
        </div>
        <p class="mrg-btm-15 font-size-13">Please enter your user name and password to login</p>
         <?php echo form_open('Auth/login') ?>
        <div class="form-group">
            <input type="text" name="username" required="" class="form-control" placeholder="User name">
            </div>
            <div class="form-group">
                <input type="password" required="" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="mrg-top-20 text-right">
                
                <button type="submit" name="submit" class="btn btn-info">Login</button>
            </div>
        <?php form_close() ?>
    </div>