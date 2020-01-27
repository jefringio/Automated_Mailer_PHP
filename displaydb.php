<?php 
    include "config.php"; 

    $query = "SELECT * FROM formtable ORDER BY userdate DESC ";
?>
    <table id="table" > 
    <thead><tr><th>First Name</th><th>Last Name</th><th>Email </th><th>Country</th><th>Gender</th><th>Adult</th><th>Ship Experience</th><th>Part of Team</th><th>Relations</th><th>Carrier</th><th>Heard about Job</th><th>Status</th><th>Date</th><th></th></tr>
     <tbody id="tbody">
      <?php
      if ($result = $conn->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $first = $row["firstname"];
            $last = $row["lastname"];
            $emails = $row["email"];
            $country = $row["nationality"];
            $sex = $row["gender"]; 
            $adult = $row["year18"]; 
            $seaship = $row["ship"]; 
            $teampart = $row["team"]; 
            $relations = $row["relation"]; 
            $carrier = $row["interest"]; 
            $aboutjob = $row["learn"]; 
            $statuses = $row["Status"];
            $userdate = $row["userdate"];
            if($statuses!="Recruited") {
                ?><tr id ='<?php echo $id ?>' contenteditable > 
                        
                        <td id ="firstname"><?php echo $first ?></td> 
                        <td id ="lastname"><?php echo $last ?></td> 
                        <td id ="email"><?php echo $emails ?></td> 
                        <td id ="country"><?php echo $country ?></td> 
                        <td id ="gender"><?php echo $sex ?></td> 
                        <td id ="year18"><?php echo $adult ?></td> 
                        <td id ="ship"><?php echo $seaship ?></td> 
                        <td id ="team"><?php echo $teampart ?></td> 
                        <td id ="relation"><?php echo $relations ?></td>
                        <td id ="interest"><?php echo $carrier ?></td> 
                        <td id ="learn"><?php echo $aboutjob ?></td> 
                        <td id="statustd">
                            <select id="status<?php echo $id ?>"><option value="<?php echo $statuses ?>" disabled selected hidden><?php 
                            echo $statuses ?></option><option value='New'>New</option><option value='in-progress'>in-progress</option><option value='Recruited'>Recruited</option></td>
                        <td><?php echo $userdate ?></td> 
                        <td><input type="button" data-id="<?php echo $id ?>"
                            class="Update<?php echo $id ?>" value="Update" onclick="update(<?php echo $id ?>,this)" readonly></td>
                    </tr><?php
            }
            else{
                ?><tr id ="<?php echo $id ?>" style="background-color:green;"> 
                        
                        <td id ="firstname"><?php echo $first ?></td> 
                        <td id ="lastname"><?php echo $last ?></td> 
                        <td id ="email"><?php echo $emails ?></td> 
                        <td id ="country"><?php echo $country ?></td> 
                        <td id ="gender"><?php echo $sex ?></td> 
                        <td id ="year18"><?php echo $adult ?></td> 
                        <td id ="ship"><?php echo $seaship ?></td> 
                        <td id ="team"><?php echo $teampart ?></td> 
                        <td id ="relation"><?php echo $relations ?></td>
                        <td id ="interest"><?php echo $carrier ?></td> 
                        <td id ="learn"><?php echo $aboutjob ?></td> 
                        <td id="statustd"><select id="status" disabled><option value="<?php echo $statuses ?>" disabled selected hidden><?php 
                        echo $statuses ?></option><option value='New'>New</option><option value='in-progress'>in-progress</option><option value='Recruited'>Recruited</option></td>
                        <td><?php echo $userdate ?></td>
                        <td></td> 
                        
                    </tr><?php

            }
        }
        $result->free();
    } 

$conn->close();

?></tbody></table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="/form/script.js"></script>