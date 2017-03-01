<script type="text/javascript">
$(document).ready(function() {
    $('#ordertable').DataTable();
} );
</script>

<?php
$template = array(
        'table_open'  => '<table id="ordertable" class="table">'
);

$this->table->set_template($template);
$this->table->set_heading('ship_name','ship_address','customer name');

foreach ($listorder as $row) {
	$this->table->add_row($row->ship_address,
		$row->ship_address,$row->cus_name);
}

echo $this->table->generate();
?>
