<?php
include '../../backend/conn.php';
// the message
$user=$_POST['x'];
$roll=$_POST['y'];
$reason=$_POST['reason'];
$msg = "Your application has been rejected by ".$user."<br>Reason : ".$reason;

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email


$sql = "SELECT * FROM student WHERE roll='$roll' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();


    if($row){
    	$mail_id=$row['email'];
		//mail($mail_id,"APPLICATION REJECTED",$msg);
		
		include_once('../../PHPMailer-master/src/PHPMailer.php');
        include_once('../../PHPMailer-master/src/SMTP.php');
        
        //$roll = $_POST['input1'];
        //$row=getdata($roll);
        
        //$msg="Your copy";
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
            //authentication SMTP enabled
            $mail->SMTPAuth = true; 
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "smtp.gmail.com";
            //indico el puerto que usa Gmail 465 or 587
            $mail->Port = 465; 
            $mail->Username = "assignmentsub2403@gmail.com";
            $mail->Password = "assign_pass@1234";
            $mail->SetFrom("assignmentsub2403@gmail.com","RAIT");
            $mail->AddReplyTo("assignmentsub2403@gmail.com","Name Replay");
            $mail->Subject = "APPLICATION STATUS";
            $mail->MsgHTML($msg);
            $mail->AddAddress($row['email']);
            //$mail->addAttachment('../pdf/'.$roll.".pdf");     
        
            $mail->Send();

    	echo "sent";
    }

	$sql="DELETE documents_submitted,form,approval FROM documents_submitted INNER JOIN form INNER JOIN approval WHERE documents_submitted.roll=form.roll AND documents_submitted.roll=approval.roll AND documents_submitted.roll='$roll' ";
	$result = $conn->query($sql);

?>