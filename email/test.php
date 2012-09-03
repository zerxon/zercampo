<?php
include('openinviter.php');
$inviter=new OpenInviter();
$oi_services=$inviter->getPlugins();


$type='gmail';
$email='dawnlrp@gmail.com';
$password='83637836';

$inviter->startPlugin($type);
$inviter->login($email,$password);

$contacts=$inviter->getMyContacts();
echo '<pre>';
print_r($contacts);


$session_id=$inviter->plugin->getSessionID();
echo $session_id.'<br>';

$message=array('subject'=>'主题','body'=>'This is body','attachment'=>'');
$contacts_list=array('297773034@qq.com' => '297773034@qq.com');
$result=$inviter->sendMessage($session_id,$message,$contacts_list);

$inviter->logout();
if ($result===-1)
    mail($email,"My subject",'This is for test.');

?>