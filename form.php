<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>Document</title>

    
  
</head>
<style type="text/css" >
   .error {color: #FF0000;}
 </style>
 

<body >



<?php
    // define variables and set to empty values
    $firstNameErr = $lastNameErr = $emailErr = $genderErr = $websiteErr = $genderErr = $year18Err = $shipErr = $teamErr= $relationErr = $learnErr = $interestErr =  $nationalityErr = "";
    $firstname = $email = $gender = $nationality = $year18 = $ship = $relation= $team= $lastname = $interest=  $learn ="";
    

    // include "db.php";
?> 

<div id="thankyou" style ="display:none;">Your Resume has been submitted, HR will get back to you shortly</div>

<span id="spanremove">

<form method = "post" action = "/form/thankyou.php" id="formid"> 
    

   
    First name:<input type = "text" name = "firstname" id="firstid" minlength="3" maxlength="30"  value ="<?= isset($_POST['firstname']) ? $_POST['firstname'] : ''; ?>" onfocusout="first()" required>
    <span class = "error" id="firstnameErr">* <?php echo $firstNameErr;?></span>
    <br><br>                 

    
    Last name:<input type = "text" id="lastid" name = "lastname" minlength="3" maxlength="30" value ="<?= isset($_POST['lastname']) ? $_POST['lastname'] : ''; ?>" onfocusout="last()" required>
    <span class = "error" id="lastnameErr">* <?php echo $lastNameErr;?></span>
    <br><br>

    
    Email:<input type = "email" id="emailid" name = "emailaddress" value ="<?= isset($_POST['emailaddress']) ? $_POST['emailaddress'] : ''; ?>" onfocusout="email()" required>
    <span class = "error" id="emailErr">* <?php echo $emailErr;?></span>
    <br><br>
                 
                    
    
    Nationality:
    <select name="nationality" id="nationalityid" onfocusout="nation()" required>
        
        <option value="0">Not Specified</option>
        <option value ="Afghanistan">Afghanistan</option>
        <option  value="AlandIslands">Aland Islands</option>
        <option  value="Albania">Albania</option>
        <option  value="Algeria">Algeria</option>
        <option value="India">India</option>
    </select> 
    <span class = "error" id="nationalityErr">* <?php echo $nationalityErr;?></span>
    <br><br> 

    
    Gender:
    <select name="gender" id="genderid" onfocusout="sex()" required>    
        <option value="0">None</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="others">Others</option>
    
    </select> 
    <span class = "error" id="genderErr">* <?php echo $genderErr;?></span>
    <br><br>

    
    Are you at least 18 years of age?:
    <input type = "radio" name = "year18" value = "yes" id="year18id" required>Yes
    <input type = "radio" name = "year18" value = "no">No
    <span class = "error" id="year18Err">* <?php echo $year18Err;?></span>
    <br><br>

    
    Got sea legs? Please let us know if you've worked on board ships before.:
    <input type = "radio" name = "shipWork" value = "yes" id="shipid" required>Yes
    <input type = "radio" name = "shipWork" value = "no">No
    <span class = "error" id="shipErr">* <?php echo $shipErr;?></span><br><br>

   
    Have you ever been part of our team?:
    <input type = "radio" name = "team" value = "yes" id="teamid" required >Yes
    <input type = "radio" name = "team" value = "no">No
    <span class = "error" id="teamErr">* <?php echo $teamErr;?></span>
    <br><br>

    
    Do you have a friend or relative working with us?:
    <input type = "radio" name = "relation" value = "yes" id="relationid" required >Yes
    <input type = "radio" name = "relation" value = "no">No
    <span class = "error" id="relationErr">* <?php echo $relationErr;?></span>
    <br><br>

    
    Passionate about your career?What's your area of interest?:
    <select name="interest" id="interestid" onfocusout="carrier()"  required>   
        <option value="0">--select--</option>
        <option value="Casino">Casino</option>
        <option value="Culinary">Culinary</option>
        <option value="Entertainment">Entertainment</option>
        <option value="Facilities">Facilities</option>
        <option value="Finance">Finance</option>
        <option value="Financial Services">Financial Services</option>

    </select>
    <span class = "error" id="interestErr">* <?php echo $interestErr;?></span>
    <br><br> 

   
    How did you learn about this job?:
    <select name="learn" id="learnid" onfocusout="aboutjob()" required>       
        <option value="0">--select--</option>
        <option value="Career fair">Career fair</option>
        <option value="On-line">On-line</option>
        <option value="Referred by a friend">Referred by a friend</option>
        <option value="Employee Referral">Employee Referral</option>
        <option value="Indeed">Indeed</option>
        <option value="LinkedIn">LinkedIn</option>

    </select>  
    <span class = "error" id="learnErr">* <?php echo $learnErr;?></span>
    <br><br> 



<input type="hidden" name="form_submitted" value="1" />

<input type="submit" name ="submit" value="Submit" id="submitbutton" onclick="insert(this)" disabled>

</form>
</span><br><br><br>
<div id="database">
<a  href="/form/displaydb.php" name="button" id="dbbutton">Click to view Database</a>
    </div>
<?php

echo "firstname:".$firstname;
echo "lastname:".$lastname;
echo $nationality;
echo $email;




?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
 <script src ="/form/script.js"></script>

<script>
var isfirst;
function first(){
    var firstname = document.forms["formid"]["firstname"].value;
    console.log("HEY"+firstname);
    if(firstname==""){
        $("#firstnameErr").html("Should not be empty");
        isfirst=fase;
    }
    else if(/^[A-Z][a-zA-Z]+$/.test(firstname)){
        if(firstname.length<3){
            $("#firstnameErr").html("Should be min of 3 Letters");
            isfirst=false;
        }
        else if(firstname.length>30){
            $("#firstnameErr").html("Should be max of 30 Letters");
            isfirst=false;
        }
        else{
            $("#firstnameErr").html("");
            isfirst=true;
            
        }
    }
    else{
        $("#firstnameErr").html("Enter First Name in correct format--Ramu--");
        isfirst=false;
    }     
    console.log(isfirst);
}


var islast;
function last(){
    var lastname = document.forms["formid"]["lastname"].value;
    console.log(lastname);
    if(lastname==""){
        $("#lastnameErr").html("Should not be empty");
        islast=false;
    }
    else if(/^[A-Z][a-zA-Z]+$/.test(lastname)){
        if(lastname.length<3){
            $("#lastnameErr").html("Should be min of 3 Letters");
            islast=false;
        }
        else if(lastname.length>30){
            $("#lastnameErr").html("Should be max of 30 Letters");
            islast=false;
        }
        else{
            $("#lastnameErr").html("done");
            islast=true;
           
        }
    }
    else{
        $("#lastnameErr").html("Enter Last Name in correct format--Ramu--");
        islast=false;
    }

    console.log(islast); 
}
var isemail;
function email(){
    var email = document.forms["formid"]["emailaddress"].value;
    console.log(email);

    if(email == ""){
        $("#emailErr").html("Required field");
        isemail = false;
    }
    else if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
    {
        $("#emailErr").html("done");
        isemail = true;
    }else {
        $("#emailErr").html("Invalid email address");
        isemail = false;
    }
    console.log(isemail);
  }
var isnation;
function nation(){
    var nation = document.forms["formid"]["nationality"].value;
    console.log(nation);
    if(nation=="0"){
        $("#nationalityErr").html("Select an option");
        isnation=false;
    }
    else{
        $("#nationalityErr").html("done");
        isnation=true;
    }
    console.log(isnation);
}


var issex;
function sex(){
    var sex = document.forms["formid"]["gender"].value;
    console.log(sex);
    if(sex=="0"){
        $("#genderErr").html("Select an option");
        issex=false;
    }
    else{
        $("#genderErr").html("done");
        issex=true;
    }
    console.log(issex);
}

var iscarrier;
function carrier(){
    var carrier = document.forms["formid"]["interest"].value;
    console.log(carrier);
    if(carrier=="0"){
        $("#interestErr").html("Select an option");
        iscarrier=false;
    }
    else{
        $("#interestErr").html("done");
        iscarrier=true;
    }
    console.log(iscarrier);
}


var islearn;
function aboutjob(){
    var learn = document.forms["formid"]["learn"].value;
    console.log(learn);
    if (learn=="0"){
        $("#learnErr").html("Select a Country");
        islearn=false;
    }
    else{
        $("#learnErr").html("done");
        islearn=true
    }
    console.log(islearn);
}

setInterval(function(){ 
    if(islast && isfirst && isemail && iscarrier && islearn && isnation && issex){
        console.log("inside if");
        $("#submitbutton").removeAttr("disabled");
    }
    else{

    }

 }, 3000);




</script> 


</body>

</html>
