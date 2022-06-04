<?php 
// memanggil data isi content dari controller
if ($isi) {
	$this->load->view($isi);
}else{
	echo '<h1>Null Content</h1>';
}