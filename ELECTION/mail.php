
<?php

$to = 'kun123658@gmail.com'; // run in loop
$from = 'no-reply@tpoelection.online'; 
$fromName = 'TPO-Bit Sindri'; 
 
$subject = "Secret verification code"; 
 
$htmlContent = ' 
    <html> 
    <head> 
        <title>Your Secret Code</title> 
    </head> 
    <body> 
        <div style="background:#f3f7f7;padding:15px;height:auto;width:96%;border:1px solid rgb(232,233,237);font-family:sans-serif;color: rgb(20,27,47)">
			<div style="font-size:26px;">
				Secret Verification Code
			</div>
<div style="font-size:18px;font-family:sans-serif;">
<pre>
Hi,
Please enter the below secret code to complete voting:

<h1 style="color:rgb(36, 97, 171);border: 2px groove rgb(36, 97, 171);padding:5px;display:inline;background:transparent;">1234678</h1>

</pre>
</div>
	<div style="font-size:16px;font-family:sans-serif;">
		Valid till window close, one time use only. Don\'t share with anyone.
	</div>
	<br>
	<div>
		<a href="#"><button style="padding: 10px;border: 2px solid rgb(36, 97, 171);background: transparent;color:rgb(36,97,171);font-variant: 900;font-weight: 800;cursor:pointer;">Vote Now</button></a>
	</div>
	<br>
	<p style="font-size:16px;font-family:sans-serif;">
	Please donot reply to this mail, if you are facing any problem, write us <a href="mailto:hello@tpoelection.com">here</a>
	</p>
		</div>
    </body> 
    </html>';
// Set content-type header for sending HTML email 
 $headers = "MIME-Version: 1.0" . "\r\n"; 
 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
 $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
 //$headers .= 'Cc: welcome@example.com' . "\r\n"; 
 $headers .= 'Bcc: kun123658@gmail.com' . "\r\n"; 
 
// Send email 
  if(mail($to, $subject, $htmlContent, $headers)){ 
      echo 'Email has sent successfully.'; 
  }else{ 
     echo 'Email sending failed.'; 
  }

?>