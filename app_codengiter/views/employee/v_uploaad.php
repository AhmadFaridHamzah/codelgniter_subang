<?php echo empty($error);?>

<?php echo form_open_multipart('admin/employeescontrol/upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>