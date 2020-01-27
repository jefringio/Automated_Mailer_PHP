<?php 
    include "config.php";
    $values = array();
    parse_str($_POST['data'], $values);
    echo $values['firstname']; 

    
        $sql = "INSERT INTO formtable (firstname, lastname, email, nationality, gender, year18, ship, team, relation, interest, learn, Status )
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($conn,$sql);
        $status="New";
        $stmt->bind_param("ssssssssssss", $values['firstname'], $values['lastname'], $values['emailaddress'], $values['nationality'], $values['gender'], $values['year18'], $values['shipWork'], $values['team'], $values['relation'], $values['interest'], $values['learn'], $status );
        $stmt->execute();
    


// Mail sending to user email address

include "mailer.php";
$mail->AddAddress($values['emailaddress'], $values['firstname']);
$mail->SetFrom("jefringio200@gmail.com", "Jefrin");
// $mail->AddReplyTo($email, "Jefrin.mec");
$mail->Subject = "Thankyou Mail";
$content = "<b>Thankyou.Your form has been submitted.</b>";
$mail->MsgHTML($content); 
$mail->Send();
// if(!$mail->Send()) {
//   echo "Error while sending Email.";
//   var_dump($mail);
// } else {
//   echo "Email sent successfully";
// }


//Mail to admin User
include "adminMailer.php";

$adminMail->AddAddress("jefringio200@gmail.com", "Admin");
$adminMail->SetFrom("jefringio200@gmail.com", "Jefrin");
// $mail->AddReplyTo($email, "Jefrin.mec");

$adminMail->Subject = "Form Copy";
$adminMail = "<b>Name</b>:".$values['firstname']." ".$values['lastname']."<br>
            <b>Nationality</b>:" .$values['nationality']. "<br>
            <b>Email</b>:" .$values['emailaddress']. "<br>
            <b>Gender</b>:" .$values['gender']. "<br>
            <b>Are you at least 18 years of age?</b>:" .$values['year18']. "<br>
            <b>Got sea legs? Please let us know if you've worked on board ships before.</b>:" .$values['shipWork']. "<br>
            <b>Have you ever been part of our team?</b>:" .$values['team']. "<br>
            <b>Do you have a friend or relative working with us?</b>:" .$values['relation']. "<br>
            <b>Passionate about your career?What's your area of interest?</b>:" .$values['interest']. "<br>
            <b>How did you learn about this job?</b>:" .$values['learn']. "<br>";


$adminMail->MsgHTML($content); 
$adminMail->Send();
// if(!$mail->Send()) {
//   echo "Error while sending Email.";
//   var_dump($mail);
// } else {
//   echo "Email sent successfully";
// }


        // $firstNameErr = $lastNameErr = $emailErr = $genderErr = $websiteErr = $genderErr = $year18Err = $shipErr = $teamErr= $relationErr = $learnErr = $interestErr =  $nationalityErr = "";
        // $firstname = $email = $gender = $nationality = $year18 = $ship = $relation= $team= $lastname = $interest=  $learn ="";
        
        // if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //     if (empty($values['firstname'])) {
        //         $firstNameErr = "First Name is required";
        //     }
        //     else if (!preg_match('/^[A-Z][a-z]*$/',$_POST["firstname"])) {
        //             $firstNameErr = "Only Alphabets are allowded and first letter has to be CAPITAL";
        //         }
        //         else{
                    
        //             $firstname = test_input($_POST["firstname"]);
        //         }
            
        //     if (empty($_POST["lastname"])) {
        //         $lastNameErr = "Last Name is required";
        //     }
        //     else if (!preg_match('/^[A-Z][a-z]*$/',$_POST["lastname"])) {
        //             $lastNameErr = "Only Alphabets are allowded and first letter has to be CAPITAL";
        //         }
            
        //         else{
        //             $lastname = test_input($_POST["lastname"]);
        //         }
    
        //     $email=$_POST["emailaddress"];
        //             // if (empty($_POST["email"])) {
        //     //     $emailErr = "Email is required";
        //     // }
        //     // else {
        //     //     $email = test_input($_POST["email"]);
                
        //     //     // check if e-mail address is well-formed
        //     //     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //     //         $emailErr = "Invalid email format"; 
        //     //     }
        //     // }
            
        //     if(isset($_REQUEST['nationality']) && $_REQUEST['nationality'] == '0') { 
        //         $nationalityErr = 'Please select a country.'; 
        //       } 
        //     else{
        //         $nationality = test_input($_POST["nationality"]);
        //     }
    
        //     if(isset($_REQUEST['gender']) && $_REQUEST['gender'] == '0') { 
        //         $genderErr = 'Please select a gender.'; 
        //       } 
        //     else{
        //         $gender = test_input($_POST["gender"]);
        //     }
    
        //     if (empty($_POST["year18"])) {
        //         $year18Err = "Field is required";
        //     }
        //     else {
        //         $year18 = test_input($_POST["year18"]);
        //     }
    
        //     if (empty($_POST["shipWork"])) {
        //         $shipErr = "Field is required";
        //     }
        //     else {
        //         $ship = test_input($_POST["shipWork"]);
        //     }
    
        //     if (empty($_POST["team"])) {
        //         $teamErr = "Field is required";
        //     }
        //     else {
        //         $team = test_input($_POST["team"]);
        //     }
    
        //     if (empty($_POST["relation"])) {
        //         $relationErr = "Field is required";
        //     }
        //     else {
        //         $relation = test_input($_POST["relation"]);
        //     }
    
        //     if(isset($_REQUEST['interest']) && $_REQUEST['interest'] == '0') { 
        //         $interestErr = 'Please select a Option.'; 
        //       } 
        //     else{
        //         $interest = test_input($_POST["interest"]);
        //     }
    
        //     if(isset($_REQUEST['learn']) && $_REQUEST['learn'] == '0') { 
        //         $learnErr = 'Please select an Option.'; 
        //       } 
        //     else{
        //         $learn = test_input($_POST["learn"]);
        //     }
            
            
        // }
        
        // function test_input($data) {
        // $data = trim($data);
        // $data = stripslashes($data);
        // $data = htmlspecialchars($data);
        // return $data;
        // }
    

?>