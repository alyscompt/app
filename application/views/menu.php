<?php
if($this->session->userdata('level') == 'Penjaga')
{
 echo "<ul style='float:left;'>
			<li>Hi ".$this->session->userdata('nama')."</li>
		</ul>
		<ul>
			<li><a href='".site_url('welcome/logout')."'>Logout</a></li>
		</ul>";

			//<li><a href='".site_url('penjaga/')."'>Pilih Loket</a></li>
}
else{
	//echo "<img  src='".site_url('media/ATR-BPN3.png')."' /><hr/>";
	//echo "WELCOME TO ".$instansi->instansi; 
}
?>
