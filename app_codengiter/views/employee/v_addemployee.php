<!-- class="form-horizontal"  -->
<?php
$opt=array('class'=>'form-horizontal');

?>
<?php echo validation_errors(); ?>
<?=form_open('admin/employeescontrol/add_employee',$opt);?>

<fieldset>

<!-- Form Name -->
<legend>Employee  ADD</legend>

<!-- Text input-->
<div class="form-group <?php if(form_error('first_name')){echo 'has-error';} ?> ">
  <label class="col-md-4 control-label" for="first_name">First name</label>  
  <div class="col-md-6">
  	<?php
  	$inputfirst=['name'=>'first_name',
  				'value'=>set_value('first_name'),
  					//'required'=>'required',
  					'class'=>'form-control input-md'];

  	?>
  
  <?=form_input($inputfirst);?>
   <?=form_error('first_name',"<p class='text-danger'>","</p>")?> 
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="last_name">Last name</label>  
  <div class="col-md-6">

    	<?php
  	$inputlast_name=['name'=>'last_name',
  				'value'=>set_value('last_name'),
  					//'required'=>'required',
  					'class'=>'form-control input-md'
  					];

  	?>
  
  <?=form_input($inputlast_name)?>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group <?php if(form_error('email_emply')){echo 'has-error';} ?>">
  <label class="col-md-4 control-label" for="email_emply">Email</label>  
  <div class="col-md-6">
 
    	<?php
  	$inputemail_emply=['name'=>'email_emply',
  				'value'=>set_value('email_emply'),
  					//'required'=>'required',
  					'class'=>'form-control input-md'];

  	?>
  
  <?=form_input($inputemail_emply)?>
     <?=form_error('email_emply',"<p class='text-danger'>","</p>")?> 
  </div>
</div>
<!-- Text input-->
<div class="form-group <?php if(form_error('email_emplycheck')){echo 'has-error';} ?>">
  <label class="col-md-4 control-label" for="email_emplycheck">Email</label>  
  <div class="col-md-6">
 
    	<?php
  	$inputemail_emply=['name'=>'email_emplycheck',
  				'value'=>set_value('email_emplycheck'),
  					//'required'=>'required',
  					'class'=>'form-control input-md'];

  	?>
  
  <?=form_input($inputemail_emply)?>
     <?=form_error('email_emplycheck',"<p class='text-danger'>","</p>")?> 
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="btnedit"></label>
  <div class="col-md-4">
    <button id="btnedit" name="btnedit" class="btn btn-primary">Button</button>
  </div>
</div>

</fieldset>
</form>
