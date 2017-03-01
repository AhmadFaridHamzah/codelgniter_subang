<!-- class="form-horizontal"  -->
<?php
$opt=array('class'=>'form-horizontal');
$row=$employeelist[0]['employees'];
?>

<?=form_open('admin/employeescontrol/update_employee',$opt);?>

<fieldset>

<!-- Form Name -->
<legend>Employee  Edit</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="first_name">First name</label>  
  <div class="col-md-6">
  <input id="first_name" 
  name="first_name" type="text" 
  placeholder="" 
  value="<?=$row->first_name?>"
  class="form-control input-md" 
  required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="last_name">Last name</label>  
  <div class="col-md-6">
  <input id="last_name" 
  name="last_name" type="text"
   placeholder="" 
    value="<?=$row->last_name?>"
   class="form-control input-md"
    required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email_emply">Email</label>  
  <div class="col-md-6">
  <input id="email_emply"
      value="<?=empty($row->email_address)?'':$row->email_address?>"
   name="email_emply" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>
<input type='hidden' name='id' value="<?=$row->id?>"/>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="btnedit"></label>
  <div class="col-md-4">
    <button id="btnedit" name="btnedit" class="btn btn-primary">Button</button>
  </div>
</div>

</fieldset>
</form>
