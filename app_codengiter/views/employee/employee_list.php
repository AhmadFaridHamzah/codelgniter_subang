
<script type="text/javascript">
$(document).ready(function() {
    $('#employeetable').DataTable();
      $('#employeetable2').DataTable();




} );
</script>
<?php
if($this->session->flashdata('msg')){
?>
<div class='alert alert-danger'>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<?=$this->session->flashdata('msg')?> </div>
<?php
}
?>

<a href="<?=site_url('admin/employeescontrol/add_employee/')?>" class="btn btn-info" role="button">Add</a>

<table class='table' id='employeetable2'>
	<thead>
	<tr>
		<th>Name</th>
		<th>Name last</th>
		<th></th>
	</tr>
</thead>
<tbody>
<?php
foreach ($employeelist as $row2) {
 $row4=$row2['employees'];

	

$btnaction='<div class="btn-group">
  <a href="'.site_url("admin/employeescontrol/detail_employee/".encryptInUrl($row4->id)).'"  class="btn btn-primary">Detail</a>
  <a href="'.site_url("admin/employeescontrol/edit_employee/".encryptInUrl($row4->id)).'"  class="btn btn-primary">Edit</a>
   <a href="'.site_url("admin/employeescontrol/delete_employee/".encryptInUrl($row4->id)).'"  class="btn btn-primary">Edit</a>
</div>';

?>
<tr>
	<td><?=$row4->first_name ?></td>
	<td><?=$row4->last_name ?></td>
	<td><?=$btnaction?></td>


</tr>
<?php	

	# code...
	}
?>
</tbody>
</table>





<?php
$template = array(
        'table_open'  => '<table id="employeetable" class="table">'
);

$this->table->set_template($template);
$this->table->set_heading('first nama','last name','email','');

foreach ($employeelist as $row2) {
	 $row=$row2['employees'];

	 $btnaction='<div class="btn-group">
  <a href="'.site_url("admin/employeescontrol/detail_employee/".encryptInUrl($row->id)).'"  class="btn btn-primary">Detail</a>
  <a href="'.site_url("admin/employeescontrol/edit_employee/".encryptInUrl($row->id)).'"  class="btn btn-primary">Edit</a>
  <a href="'.site_url("admin/employeescontrol/delete_employee/".encryptInUrl($row->id)).'"  class="btn btn-primary">Delete</a>
</div>';
	$this->table->add_row($row->first_name,
		$row->last_name,
		$row->email_address,$btnaction);
}

echo $this->table->generate();
?>




