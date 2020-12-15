<?php
include __DIR__.'/parts/service.php';
$admin = new writer();
//$mail_array = array('Rameez Bhat'=>'ramizspeaks77@gmail.com','Imtiyaz Assad'=>'imtiyazassad446@gmail.com','Shabir Ahmed Mir'=>'fahad18dupe@gmail.com','Abrar Ajaz Wani'=>'abhaywani114@gmail.com','Wani Nazir'=>'nzrwani@gmail.com','SALMAN BASHIR'=>'atworksalman900@gmail.com','Mushtaque B Barq'=>'barqz1@gmail.com','Badee Uz Zaman'=>'badee.zaman@gmail.com','Gowhar Naz'=>'gowharwrites@hotmail.com','Mansoor Parey'=>'parymansoor@gmail.com','Qaisar Bashir Lone'=>'qaiserlone1@gmail.com','Tufail Ahmad shah'=>'shahbazkmri@gmail.com','Mohsin (Abid)'=>'sabid2015@yahoo.com','Farhat Gowhar Iqbal'=>'gowhariqballone@gmail.com','Ismail Aashna'=>'ismailaashna1@gmail.com','Zubair bashir'=>'Zubairbashir1997@gmail.con','Maekash Masrur'=>'masrur@gmail.com','Shahid ul islam '=>'shahidulislam0002@yahoo.com','YASIR RASOOL'=>'mr.yasirrasool@gmail.com','Faizan Mir (Zara)'=>'mir.faizu.18@gmail.com','Shaheen Shafique'=>'shaheenshafique003@gmail.com','Hadee Farooq'=>'hadee.farooq@gmail.com','Jahangeer Lone '=>'jahangirlone860@gmail.com','Wani Aayan ( Prism)'=>'waniaayan222@gmail.com','Syed Tajamul Islam'=>'syedtajamul00@gmail.com','Mahi Mudasir Khan'=>'iamkhan516@gmail.com','Jaya Das'=>'dasjaya62@gmail.com','Zubair Rashid '=>'zubairrashid14@gmail.com','Syed Nowreen Qadri'=>'syednowreen22@gmail.com','Ikhlaq ul Rehman Mir'=>'mirikhlaq67@gmail.com','Neha Sharma'=>'nehasharma89689@gmail.com','Perveiz Ali'=>'Justperveiz007@gmail.com','Syed Ishfaq Fazli'=>'sishfaq157@gmail.com','Hilal Qadir'=>'hilalwani198@gmail.com','Yasir Majeed'=>'yasir.ah.15@gmail.com','Faizan'=>'faizan761@gmail.com','Javid Nisar'=>'javidnisar2@gmail.com','Atta Ul Munim Zahid'=>'zapeela77@gmail.com','NAYEEM AHMAD SHAH'=>'shah.nayeeem@yahoo.in','Malak Tariq'=>'malaktariq2000@gmail.com','Aamir shafat'=>'aamirshafat32@gmail.com','Mehak Aara'=>'dar.mehak0@gmail.com','Nisar Azam'=>'shahnisar9@gmail.com');
$mail_array = array("abhay"=>"ajuwani@gmail.com","Support"=>"support@serenewriters.com");
if (!isset($_GET['x'])) {
    exit;
}
foreach ($mail_array as $name=>$email) {
$body = <<< EOD
Greetings $name,
We are delighted to invite you to publish your writings at our website <a href='http://serenewriters.com'>Serene Writers</a>. We will be happy to have you. It is always free and in support of Freedom of Speach and Expression. We have some intresting like <strong>Follow up and Messaging</strong>. We hope you will enjoy and endure with Serene Writers.
You can start publishing your write-ups instantly by creating a user account which takes only a few moments. We look to see you soon. 
For any feedback/question you can reply to this mail.
With regards,
Abrar Ajaz Wani
Founder Serene Writers.
EOD;
   echo "sending email to $name at $email<br/>";
  
   $admin->mail2("Invitation from Serene Writers kashmir", $body, $email, $name,"support@serenewriters.com","Support");

}

?>