<?php
$editSrx = $_GET['editSrx'];
$db = new SQLite3("srxfu.db");
$result=  $db->query("SELECT * FROM srxs WHERE id='$editSrx';");
while($row = $result->fetchArray()){
	echo '
	<form>
		<h5>Edit Service Request</h5>
        <div class="row">
          <div class="large-4 columns">
            <label>Name</label>
            <input type="text" name="nameEdit" placeholder="Name" id="u_name" value="'.$row['name'].'">
          </div>
          <div class="large-4 columns left">
            <label>Last Name</label>
            <input type="text" name="lastNameEdit" placeholder="Last Name" id="u_lastName" value="'.$row['lastName'].'">
          </div>
        </div>
        <div class="row">
          <div class="large-4 columns">
            <label>Email</label>
            <input type="text" name="emailEdit" placeholder="Email" id="u_email" value="'.$row['email'].'">
          </div>
          <div class="large-4 columns left">
            <label>Rervice Request</label>
            <input type="number" name="srxEdit" placeholder="Service Reqest" id="u_srx" value="'.$row['srx'].'">
          </div>
        </div>
        <div class="row">
          <div class="large-4 columns">
            <label>Status</label>
                <select name="statusEdit" id="u_status">
                    <option>
                        - Status -
                    </option>
                    <option>
                        Confirmed
                    </option>
                    <option>
                        Checking more procedures
                    </option>
                    <option>
                        To call back
                    </option>
                    <option>
                        Sent to manofacturer
                    </option>
                    <option>
                        Waiting on Customer
                    </option>
                    <option>
                        Abandoned
                    </option>
                    <option>
                        Closed
                    </option>
                </select>
          </div>
        </div>
        <div class="row">
          <div class="large-12 columns">
            <label>Description</label>
            <textarea placeholder="Aditional data about the Service Request or client" name="descrEdit" rows="7" id="u_descr">'.$row['descr'].'</textarea>
            <input type="hidden" value="'.$row['id'].'" id="recordId" disabled>
          </div>
        </div>
        <input type="button" class="small button right" id="update_srxBtn" value="Update" onClick="updateSrx()">
    </form>
    ';
}

$db->close();
?>