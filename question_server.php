<?php 
include('./inchead.php');

// Check for login
if (isset($_SESSION['user-login-id'])) {
  $id = $_SESSION['user-login-id'];
} else {
  echo 'Server not responding.';
  header('location:./session_error.php');
}

if(!isset($_SESSION['qtracker'])) {
  $totalquesq = mysqli_query($db,"SELECT COUNT(*) FROM questions");
  $totalques = mysqli_fetch_array($totalquesq);
  $_SESSION['correct'] = 0;
  $_SESSION['currques'] = 0;
  $_SESSION['qtracker'] = array_fill(1,$totalques[0],0);
}

$timerem = $_GET['timerem'];
$lastq = $_GET['subq'];
$lasta = $_GET['suba'];
$finish = $_GET['finish'];
$currques = $_SESSION['currques'];
$currect = $_SESSION['correct'];

if($lastq > 0) {
  $lastqq = mysqli_query($db,"SELECT answer FROM questions WHERE id='$currques'");
  $lastqa = mysqli_fetch_array($totalquesq);
  if($lastqa[0] == $lasta) {
    $correct = $correct + 1;
  }
}

if($finish === 1) {
  mysqli_query($db,"UPDATE users SET score='$correct' AND completed=1 WHERE id='$id'");
}

function unserved($id) {
  if($id === 0)
    return(true);
}

$qtracker = $_SESSION['qtracker'];
$unservedq = array_filter($qtracker,"unserved");

$selectedq = array_rand($unservedq);
$qtracker[$selectedq] = 1;

$q = "SELECT quesimg,options,cat FROM questions WHERE id='$selectedq'";
$qrun = mysqli_query($db,$q);
if(mysqli_num_rows($qrun)>0) {
  $qres = mysqli_fetch_array($qrun);

  $response = new SimpleXMLElement('<response></response>');
  $response->addChild('question',$qres[0]);
  $response->addChild('options',$qres[1]);
  $response->addChild('category',$qres[2]);

  echo $response->asXML();
} else {
  echo '0';
}


$_SESSION['qtracker'] = $qtracker;
$_SESSION['currques'] = $selectedq;

include('./incfoot.php');
?>
