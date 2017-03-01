<script type="text/javascript">
$(document).ready(function() {
    $('#tblemplayoe').DataTable();
} );
</script>

<a class="btn btn-primary" href="<?=site_url('admin/admincontrol/addemployee')?>"> Add </a>
<?php
$this->table->set_heading('company', 'Name', 'Email','Action');
$buttonaction='<div class="btn-group">
   <a class="btn btn-primary" href=""> Detail </a>
    <a class="btn btn-primary" href=""> Edit </a>
   <button type="button" class="btn btn-primary">Sony</button>
</div>';
foreach ($employees as $key => $value) {
	$this->table->add_row($value->company,
	 $value->last_name.' '.$value->last_name,
	  $value->email_address,$buttonaction
	  );
}

$tmpl = array ( 'table_open'  => '<table id="tblemplayoe"  class="table">' );

$this->table->set_template($tmpl);



echo $this->table->generate();
?>