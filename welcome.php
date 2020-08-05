<?php
    include_once 'database.php';
    session_start();
    if(!(isset($_SESSION['email'])))
    {
        header("location:login.php");
    }
    else
    {
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        include_once 'database.php';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MLRITM Online Quiz</title>
    <link rel="shortcut icon" href="https://images.static-collegedunia.com/public/college_data/images/logos/1487047679mlr.png">
    <link  rel="stylesheet" href="css/bootstrap.min.css"/>
    <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
    <link rel="stylesheet" href="css/welcome.css">
    <link  rel="stylesheet" href="css/font.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript"></script>
    
    <style>
            body {
                  width: 100%;
                  background-image: url('https://wallpapercave.com/wp/r1fMFxw.jpg');
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-position: center;
                  background-size: cover;
                }
                
        .alignleft {
	float: left;
}
.alignright {
	float: right;
}

.copypast {
	-youbkit-touch-callout: none; /* iOS Safari */
	-youbkit-user-select: none;   /* Chrome 6.0+, Safari 3.1+, Edge & Opera 15+ */
	-moz-user-select: none;       /* Firefox */
	-ms-user-select: none;        /* IE 10+ and Edge */
	user-select: none;            /* Non-prefixed version, 
								  currently supported by Chrome and Opera */
}

.open-button {
  background-color: Transparent;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  
}

.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

.btn {
  background-color: #ff9900;
  color: white;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}

    </style>
    
 <script type="text/javascript">
	window.history.forward();
	function noBack() { window.history.forward(); }
</script>

</head>
<body>
        <div class="row">
            <div class="col-md-12">
<center>
	<div style="background-color:white;" >
	    <br>
        <img src="https://www.mlritm.ac.in/assets/images/logo-new.png" alt="logo" width="400"height="100">
        <br><br>
        </div></center><br><br>
    <nav class="navbar navbar-default title1" style="background: rgba(0, 0, 0, 0.5)"; >
        <div class="container-fluid" >
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" >
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        <a class="navbar-brand" href="#"><b><font color=white>MLRITM Online Quiz's</font></b></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
        <ul class="nav navbar-nav navbar-left" >
            <li <?php if(@$_GET['q']==1) echo'class="active"'; ?> ><a href="welcome.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home<span class="sr-only">(current)</span></a></li>
            <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>> <a href="welcome.php?q=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;History</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right ">
        <li <?php echo''; ?> > <a href="logout.php?q=welcome.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;<font color=white><b>Log out</b></font></a></li>
        </ul>
        </div></div></div>
       
        </div>
    </div>
    </nav>
    <br><br>
    <div class="container" style="background: rgba(0, 0, 0, 0.5)";>
        <div class="row">
            <div class="col-md-12">
    <?php 
                
                $name=mysqli_query($con,"SELECT name,college,year FROM user WHERE email='$email' " )or die('Error157');
                while($row=mysqli_fetch_array($name) )
                        {
                            $name1=$row['name'];
                            $bra=$row['college'];
                            $year1=$row['year'];
                            
                            echo "<div style=background: rgba(0, 0, 0, 0.5);> <font color=white><b><h3 class=alignleft>Roll Number: $name1</h3> <h3 class=alignright>Year and Batch : $year1 - $bra</h3></font></div>";
                        } 
    ?>
                        
                    </div>
            </div>
    </div><br><br>
    
    
    
    <div class="container" style="background: rgba(0, 0, 0, 0.5)";>
        <div class="row">
            <div class="col-md-12">
                <?php 
                
                echo "<center><h1><font color=white>MLRITM  T&P  Tests</font></h1></center>";
                if(@$_GET['q']==1) 
                {
                    $name1=mysqli_query($con,"SELECT college,year FROM user WHERE email='$email' " )or die('Error157');
                while($row=mysqli_fetch_array($name1) )
                        {
                            $class=$row['college'];
                            $year=$row['year'];
                        
                        }
                    
                    $result = mysqli_query($con,"SELECT * FROM quiz WHERE class='$class' AND year='$year' AND status='1' ORDER BY date DESC") or die('Error');
                    echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
                    <tr><td><center><b>S.No.</b></center></td><td><center><b>Test Name</b></center></td><td><center><b>Total question</b></center></td><td><center><b>Marks</center></b></td><td><center><b>Duration</center></b></td><td><center><b>Action</b></center></td></tr>';
                    $c=1;
                    while($row = mysqli_fetch_array($result)) {
                        $title = $row['title'];
                        $total = $row['total'];
                        $sahi = $row['sahi'];
                        $eid = $row['eid'];
                    $q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
                    $rowcount=mysqli_num_rows($q12);	
                    if($rowcount == 0){
                        echo '<tr><td><center>'.$c++.'</center></td><td><center>'.$title.'</center></td><td><center>'.$total.'</center></td><td><center>'.$sahi*$total.'</center></td><td><center>25 MIN</center></td><td><center><b><a href="welcome.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'" class="btn sub1" style="color:black;margin:0px;background:darkgreen"><span class="glyphicon glyphicon-new-window" aria-hidden="true" style="color:white;"></span>&nbsp;<span class="title1"><b><font color="white">Start</font></b></span></a></b></center></td></tr>';
                    }
                    else
                    {
                    echo '<tr style="color:#99cc32"><td><center>'.$c++.'</center></td><td><center>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></center></td><td><center>'.$total.'</center></td><td><center>'.$sahi*$total.'</center></td><td><center><b>Attempted</b></center></td></tr>';
                    }
                    }
                    $c=0;
                    echo '</table></div></div>';
                    
                }?>
                <b class="copypast" onload="noBack();" 
	onpageshow="if (event.persisted) noBack();" onunload="">
                <?php
                    if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) 
                    {
                        $eid=@$_GET['eid'];
                        $sn=@$_GET['n'];
                        $total=@$_GET['t'];
                        $q=mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' " );
                        $qname=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid' " );
                        echo '<div class="panel" style="margin:5%">';
                        while($row=mysqli_fetch_array($q) )
                        {
                            $qns=$row['qns'];
                            $qid=$row['qid'];
                        while($row=mysqli_fetch_array($qname) )
                        {
                            $qname1=$row['title'];
                        }
                            echo '<b><center><font size=5 style="color:brown">Quiz Name:</font><font size=5 style="color:green"> '.$qname1.' </font></center></b> <br><br>';
                            echo '<h4 style="color:red"><b>Question &nbsp;'.$sn.'&nbsp;:</h4><h4><b>'.$qns.'</b></h4>';
                        }
                        $q=mysqli_query($con,"SELECT * FROM options WHERE qid='$qid' " );
                        echo '<form action="update.php?q=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST"  class="form-horizontal">
                        <br />';

                        while($row=mysqli_fetch_array($q) )
                        {
                            $option=$row['option'];
                            $optionid=$row['optionid'];
                            echo'<h4><input type="radio" name="ans" value="'.$optionid.'">&nbsp;'.$option.'<br /><br /></h4>';
                        }
                        echo'<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button>';?>
                        
                      <center>  
					<span style="color:red; font-size:20px">NOTE: <br></span><b>1.You can't Go Back to Previous question.<br>
					                                                            2.Submit 1 min before the Exam time Given.</b></center>
					</form></div>
					<?php
                    }
                    
                    
                    if(@$_GET['q']== 'result' && @$_GET['eid']) 
                    {
                        $eid=@$_GET['eid'];
                        $q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error157');
                        while($row=mysqli_fetch_array($q) )
                        {
                        $quizname=$row['title'];
                        $s=$row['score'];
                            $w=$row['wrong'];
                            $r=$row['sahi'];
                            $qa=$row['level'];
                        
                        echo  '<div class="panel">
                        <center><h1 class="title" style="color:#660033">Result<br></h1><h3>Quiz name: '.$quizname.' </h3><center><br /> <br><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';
                        
                        
                            echo '<tr style="color:black"><td>Total Questions</td><td>'.$qa.'</td></tr>
                                <tr style="color:darkgreen"><td>right Answer&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>'.$r.'</td></tr> 
                                <tr style="color:red"><td>Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>'.$w.'</td></tr>
                                <tr style="color:blue"><td>Overall Exam Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
                            
                        }
                        $q=mysqli_query($con,"SELECT * FROM rank WHERE  email='$email' " )or die('Error157');
                        
                        echo '</table></div>';
                        echo "<center><h3><font color=white>Thank You for Taking Quiz !</font></h3></center>";
                    }
                ?>
                </b>
                <?php
                    if(@$_GET['q']== 2) 
                    {
                        $q=mysqli_query($con,"SELECT * FROM history WHERE email='$email' ORDER BY date DESC " )or die('Error197');
                        echo  '<div class="panel title">
                        <font color=black>
                        <table class="table table-striped title1" >
                        <tr style="color:black;"><td><center><b>S.No.</b></center></td><td><center><b>Quiz</b></center></td><td><center><b>Question Solved</b></center></td><td><center><b>Right</b></center></td><td><center><b>Wrong<b></center></td><td><center><b>Score</b></center></td>';
                        $c=0;
                        while($row=mysqli_fetch_array($q) )
                        {
                        $eid=$row['eid'];
                        $s=$row['score'];
                        $w=$row['wrong'];
                        $r=$row['sahi'];
                        $qa=$row['level'];
                        $q23=mysqli_query($con,"SELECT title FROM history WHERE  eid='$eid' " )or die('Error208');

                        while($row=mysqli_fetch_array($q23) )
                        {  
                            $title=$row['title'];  
                        }
                        $c++;
                        echo '<tr><td><center>'.$c.'</center></td><td><center>'.$title.'</center></td><td><center>'.$qa.'</center></td><td><center>'.$r.'</center></td><td><center>'.$w.'</center></td><td><center>'.$s.'</center></td></tr>';
                        }
                        echo'</table></div>';
                    }

            
                ?>
                <!--
                <a class="open-button" onclick="openForm()"><img src="https://www.1law.com/wp-content/uploads/2016/08/docubot.gif" alt="Chat" width="120" height="120">Chat-Bot</a>
                <div class="chat-popup" id="myForm">

 <iframe
    allow="microphone;"
    width="350"
    height="430"
    src="https://console.dialogflow.com/api-client/demo/embedded/kammasairam">
</iframe>
  <form >
    <button type="button" class="btn cancel" onclick="closeForm()"><b style="font-size:20px">Close</b></button>
  </form>
  </div> -->
                </div>
                </div>
                </div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>


                <br>
    <footer style="background: rgba(0, 0, 0, 0.5)";><br><Br>
       <center><h3 style="color:white">Designed and Developed By:<br>
            K.Satya shiva sai ram & B.Kamal sai</h3></center><br>
</footer>
</body>
</html>