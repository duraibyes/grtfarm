<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $phone_no = $_POST['phone_no'];
    $company_name = $_POST['company_name'];
    $job_title = $_POST['job_title'];
    $looking = $_POST['looking'];
    $invest = $_POST['invest'];
    
    $receiver="duraibytes@gmail.com"; // Receiver Mail address
    $msg = 'New Enquiry Received';
    $message="";
    $headers = '';
    // $headers = "From: " .$email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $subject="Contact Form Enquiry";
    $message.="<table><tr><td>Name</td><td>".$name;
    $message.="</td></tr><tr><td>Phone Number</td><td>".$phone_no;
    $message.="</td></tr><tr><td>Company Name</td><td>".$company_name;
    $message.="</td></tr><tr><td>Job Title</td><td>".$job_title;
    $message.="</td></tr><tr><td>Looking to Invest</td><td>".$looking;
    $message.="</td></tr><tr><td>Like to Invest</td><td>".$invest;
    $message.="</td></tr><tr><td>Message</td><td>".$msg."</td></tr></table>";
    
    // Send email
    $mailSent = mail($receiver, $subject, $message, $headers);
    
    // Check if mail sent successfully
    if ($mailSent) {
        echo json_encode(['status' => 1, 'message' => 'Your Enquiry Send Successfully...']);
    } else {
        echo json_encode(['status' => 0, 'message' => 'Failed to send enquiry.']);
    }
} else {
    // Handle other HTTP methods
    echo json_encode(['status' => 0, 'message' => 'Invalid request method.']);
}
?>
