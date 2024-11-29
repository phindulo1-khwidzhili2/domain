


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(strip_tags($_POST['name']));
    $visitor_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $phone_number = htmlspecialchars(strip_tags($_POST['phone']));
    $message = htmlspecialchars(strip_tags($_POST['message']));

    $apiKey = '3014d045aa4ab4afc2e2093c4e8ac66a';
    $domain = 'sandboxf089fa284ce64449bfacede6841dad92.mailgun.org';

    $url = "https://api.mailgun.net/v3/$domain/messages";

    if ($visitor_email) { // Validate email
        $email_from = 'khwidzhiliphindulo@gmail.com';
        $email_subject = 'New Email';
        $email_body = "User Name: $name.\n".
                      "User Email: $visitor_email.\n".
                      "User Number: $phone_number.\n".
                      "User Message: $message.\n";

        $to = 'khwidzhiliim@gmail.com';
        $headers = "From: $email_from \r\n";
        $headers .= "Reply-To: $visitor_email \r\n";




        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "api:$apiKey");
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        $result = curl_exec($ch);
        curl_close($ch);






        if (mail($to, $email_subject, $email_body, $headers)) {
            header("Location: contact.html");
        } else {
            echo "Mail sending failed.";
        }
    } else {
        echo "Invalid email address.";
    }
} else {
    echo "Invalid request method.";
}
?>

//DATABASE 
/*$conn = new mysqli('localhost', 'root','KhwiDz#1', 'test');
if($conn->connect_error){
    die('Opps Connection Failed :' .$conn->connect_error);
    
}else{
    $stmt = $conn->prepare("insert into registrationFORM(name, email, phone, message) values (?, ?, ?, ?)");
    
    $stmt->bind_param("ssssi", $name, $visitor_email,  $phone_number, $message);
    $stmt->execute();
    echo "reg success";
    $stmt->close();
    $conn->close();
        
}*/
         


















