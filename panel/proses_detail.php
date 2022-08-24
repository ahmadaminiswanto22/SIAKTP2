<?php
include 'koneksi/koneksi.php';
if (isset($_POST["data_id"])) {
    $data_id = $_POST["data_id"];
    $output = "";
    $query = "SELECT * FROM pendaftaran WHERE nis = '" . $_POST['nis'] . "'";
    $result = mysqli_query($conn, $query);
    $output .= '
<div class="table-responsive">  
	<table class="table table-bordered">';
    $row = mysqli_fetch_array($result);
    $output .= '  
          <tr>  
               <td width="30%"><label>Name</label></td>  
               <td width="70%">' . $row["nis"] . '</td>  
          </tr>
          <tr>  
               <td width="30%"><label>Gender</label></td>  
               <td width="70%">' . $row["alamat"] . '</td>  
          </tr>  
          <tr>  
               <td width="30%"><label>Designation</label></td>  
               <td width="70%">' . $row["status"] . '</td>  
          </tr>
          ';
    $output .= "
	</table>
</div>";
    echo $output;
}
