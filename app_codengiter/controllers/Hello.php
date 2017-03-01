<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Hello extends CI_Controller {


public function test($val1='',$val2=''){




	echo $val1;
	echo "<br>";
	echo $val2;
echo "<br>";
	$textfile='hello';

 $textency=	encryptInUrl($textfile);
// //$textency=	$this->encrypt->encode($textfile);

print_r($textency);
echo "<br>";//
echo site_url();
echo "<br>";
echo base_url();

?>

<a href="<?=site_url('test/'.$textency)?>"> test2 </a>

<?php




}






public function test2($test=''){

echo decryptInUrl($test);

}


public function test3(){

	$this->load->view('welcome_message');

}






}


