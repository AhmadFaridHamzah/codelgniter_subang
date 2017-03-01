
<script type="text/javascript">
$(document).ready(function() {
    $('#employeetable').DataTable();
      $('#employeetable2').DataTable();
} );
</script>
<?php

?>

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
 $row=$row2['employees'];

	

$btnaction='<div class="btn-group">
  <a href="'.site_url("admin/employeescontrol/detail_employee/".encryptInUrl($row->id)).'"  class="btn btn-primary">Detail</a>
  <a href="'.site_url("admin/employeescontrol/edit_employee/".encryptInUrl($row->id)).'"  class="btn btn-primary">Edit</a>
  <a href=""  class="btn btn-danger">Delete</a>
</div>';

?>
<tr>
	<td><?=$row->first_name ?></td>
	<td><?=$row->last_name ?></td>
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

foreach ($employeelist as $row) {
	 $row=$row2['employees'];
	 $btnaction='<div class="btn-group">
  <a href="'.site_url("admin/employeescontrol/detail_employee/".encryptInUrl($row->id)).'"  class="btn btn-primary">Detail</a>
  <a href="'.site_url("admin/employeescontrol/edit_employee/".encryptInUrl($row->id)).'"  class="btn btn-primary">Edit</a>
  <a href=""  class="btn btn-danger">Delete</a>
</div>';
	$this->table->add_row($row->first_name,
		$row->last_name,
		$row->email_address,$btnaction);
}

echo $this->table->generate();
?>




