<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
  <div class="col-md-12 mx-auto">
    <div class="card card-body bg-light mt-5">
      <h2>Register Account</h2>
      <form action="<?php echo URLROOT; ?>/users/register" method="post">
        <div class="form-group">
            <label>Name:<sup>*</label>
            <input name="name" type="text"  class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div> 
        <div class="form-group">
            <label>Email:<sup>*</sup></label>
            <input name="email" type="text" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div>    
        <div class="form-group">
            <label>Password:<sup>*</sup></label>
            <input name="password" type="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
        </div>
        <div class="form-group">
            <label>Confirm Password:<sup>*</sup></label>
            <input name="confirm_password" type="password"  class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
            <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
        </div>

        <div class="form-row">
          <div class="col">
            <input type="submit" class="btn btn-warning btn-block" value="Register">
          </div>

        </div>
      </form>
    </div>
  </div>
  
<?php require APPROOT . '/views/inc/footer.php'; ?>