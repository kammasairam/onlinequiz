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
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MLRITM Online Quiz's</title>
    <link rel="shortcut icon" href="https://images.static-collegedunia.com/public/college_data/images/logos/1487047679mlr.png">
    <link  rel="stylesheet" href="css/bootstrap.min.css"/>
    <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
    <link rel="stylesheet" href="css/welcome.css">
    <link  rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript"></script>
    
    <style>
.collapsible {
  background-color: #737373;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color:  #009933;
}

.content {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
}

table {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid black;
}

th, td {
  text-align: center;
  padding: 8px;
  border: 1px solid black;
}

tr:nth-child(even){background-color: #f2f2f2;}
tr:nth-child(odd){background-color:#f2f2f2;}
tr:hover {background-color: #b3d9ff;}

th {
  background-color: #4CAF50;
  color: white;
}

input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  text-align: center;
}

body {
                  width: 100%;
                  background-image: url('https://wallpapercave.com/wp/r1fMFxw.jpg');
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-position: center;
                  background-size: cover;
                }
</style>

</head>

<body>
<center>
	<div style="background-color:white;">
	    <br>
        <img src="https://www.mlritm.ac.in/assets/images/logo-new.png" alt="Smiley face">
        <br><br>
        </div></center><br><br>
    <nav class="navbar navbar-default title1" >
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="Javascript:void(0)"><b>MLRITM Online Quiz's</b></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
                <ul class="nav navbar-nav navbar-left">
                    <li <?php if(@$_GET['q']==0) echo'class="active"'; ?>><a href="dashboard.php?q=0">Home<span class="sr-only">(current)</span></a></li>
                    <li <?php if(@$_GET['q']==1) echo'class="active"'; ?>><a href="dashboard.php?q=1">User</a></li>
                    <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="dashboard.php?q=2">Ranking</a></li>
                    <li class="dropdown <?php if(@$_GET['q']==4 || @$_GET['q']==5) echo'active"'; ?>">
                    <li><a href="dashboard.php?q=4">Add Quiz</a></li>
                    <li><a href="dashboard.php?q=5">Remove Quiz</a></li>
                    <li <?php if(@$_GET['q']==6) echo'class="active"'; ?>><a href="dashboard.php?q=6">Marks By Test</a></li>
                    <li <?php if(@$_GET['q']==7) echo'class="active"'; ?>><a href="dashboard.php?q=7">Manage Quiz</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li <?php echo''; ?> > <a href="logout1.php?q=dashboard.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>


<ul id="myMenu" style="background: rgba(0, 0, 0, 0.5)";>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                if(@$_GET['q']==0)
                {
                   echo "<h1><font color=white> WELCOME TO Admin Page!!</font></h1>";
                   echo "<center><img src='https://quizplanet.game/assets/images/quiz-planet-logo.png' /></center>";
                }

                if(@$_GET['q']== 2) 
                {
                    $q=mysqli_query($con,"SELECT * FROM rank  ORDER BY score DESC " )or die('Error223');
                    echo  '<div class="panel title"><div class="table-responsive">
                    <table class="table table-striped title1" >
                    <tr style="color:red"><td><center><b>Rank</b></center></td><td><center><b>Name</b></center></td><td><center><b>Score</b></center></td></tr>';
                    $c=0;
                    while($row=mysqli_fetch_array($q) )
                    {
                        $e=$row['email'];
                        $s=$row['score'];
                        $q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' " )or die('Error231');
                        while($row=mysqli_fetch_array($q12) )
                        {
                            $name=$row['name'];
                            $college=$row['college'];
                            $year=$row['year'];
                        }
                        $c++;
                        echo '<tr><td style="color:#99cc32"><center><b>'.$c.'</b></center></td><td><center>'.$name.'</center></td><td><center>'.$s.'</center></td>';
                    }
                    echo '</table></div></div>';
                }
                ?>
                <?php 
                    if(@$_GET['q']==1) 
                    {
                        $result = mysqli_query($con,"SELECT * FROM user") or die('Error');
                        echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
                        <tr><td><center><b>S.N.</b></center></td><td><center><b>Name</b></center></td><td><center><b>Class</b></center></td><td><center><b>Email</b></center></td><td><center><b>Password</b></center></td><td><center><b>Action</b></center></td></tr>';
                        $c=1;
                        while($row = mysqli_fetch_array($result)) 
                        {
                            $name = $row['name'];
                            $email = $row['email'];
                            $college = $row['college'];
                            $password = $row['password'];
                            $year=$row['year'];
                            echo '<tr><td><center>'.$c++.'</center></td><td><center>'.$name.'</center></td><td><center>'.$year.'-'.$college.'</center></td><td><center>'.$email.'</center></td><td><center>'.$password.'</center></td><td><center><a title="Delete User" href="update.php?demail='.$email.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></center></td></tr>';
                        }
                        $c=0;
                        echo '</table></div></div>';
                    }
                ?>

                <?php
                    if(@$_GET['q']==4 && !(@$_GET['step']) ) 
                    {
                        echo '<div class="row"><span class="title1" style="margin-left:40%;font-size:30px;color:#fff;"><b>Enter Quiz Details</b></span><br /><br />
                        <div class="col-md-3"></div><div class="col-md-6">   
                        <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="name"></label>  
                                    <div class="col-md-12">
                                        <input id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="total"></label>  
                                    <div class="col-md-12">
                                        <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="right"></label>  
                                    <div class="col-md-12">
                                        <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="wrong"></label>  
                                    <div class="col-md-12">
                                        <input id="wrong" name="wrong" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number">
                                    </div>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="wrong"></label>  
                                    <div class="col-md-12">
                                        <select id="year" name="year" class="form-control input-md" required />
									       <option>-- Select Year --</option>
                                          <!--<option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>-->
                                          <option value="4">4</option>
                                        </select>
                                    </div>
                                </div>
                                
                                 <div class="form-group">
                                    <label class="col-md-12 control-label" for="wrong"></label>  
                                    <div class="col-md-12">
                                        <select id="class" name="class" class="form-control input-md" required />
									       <option>-- Select Any One --</option>
                                         <option value="CSE">CSE</option>
                                          <option value="IT">IT</option>
                                          <option value="ECE">ECE</option>
                                          <option value="EEE">EEE</option>
                                          <option value="CIVIL">CIVIL</option>
                                          <option value="MECH">MECH</option>
                                          <option value="STAFF">STAFF</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="wrong"></label>  
                                    <div class="col-md-12">
                                        <input id="wrong" name="status" placeholder="Status (Ex: Active = 1 OR Inactive = 0)" class="form-control input-md" min="0" type="number" max="1" type="number">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for=""></label>
                                    <div class="col-md-12"> 
                                        <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
                                    </div>
                                </div>

                            </fieldset>
                        </form></div>';
                    }
                ?>

                <?php
                    if(@$_GET['q']==4 && (@$_GET['step'])==2 ) 
                    {
                        echo ' 
                        <div class="row">
                        <span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
                        <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
                        <fieldset>
                        ';
                
                        for($i=1;$i<=@$_GET['n'];$i++)
                        {
                            echo '<b style="color:white">Question number&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
                                        <div class="col-md-12">
                                            <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..."></textarea>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="'.$i.'1"></label>  
                                        <div class="col-md-12">
                                            <input id="'.$i.'1" name="'.$i.'1" placeholder="Enter option a" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="'.$i.'2"></label>  
                                        <div class="col-md-12">
                                            <input id="'.$i.'2" name="'.$i.'2" placeholder="Enter option b" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="'.$i.'3"></label>  
                                        <div class="col-md-12">
                                            <input id="'.$i.'3" name="'.$i.'3" placeholder="Enter option c" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="'.$i.'4"></label>  
                                        <div class="col-md-12">
                                            <input id="'.$i.'4" name="'.$i.'4" placeholder="Enter option d" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <br />
                                    <b>Correct answer</b>:<br />
                                    <select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer " class="form-control input-md" >
                                    <option value="a">Select answer for question '.$i.'</option>
                                    <option value="a"> option a</option>
                                    <option value="b"> option b</option>
                                    <option value="c"> option c</option>
                                    <option value="d"> option d</option> </select><br /><br />'; 
                        }
                        echo '<div class="form-group">
                                <label class="col-md-12 control-label" for=""></label>
                                <div class="col-md-12"> 
                                    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
                                </div>
                              </div>

                        </fieldset>
                        </form></div>';
                    }
                ?>

                <?php 
                    if(@$_GET['q']==5) 
                    {
                        $result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
                        echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
                        <tr><td><center><b>S.N.</b></center></td><td><center><b>Topic</b></center></td><td><center><b>Total question</b></center></td><td><center><b>Marks</b></center></td><td><center><b>Action</b></center></td></tr>';
                        $c=1;
                        while($row = mysqli_fetch_array($result)) {
                            $title = $row['title'];
                            $total = $row['total'];
                            $sahi = $row['sahi'];
                            $eid = $row['eid'];
                            echo '<tr><td><center>'.$c++.'</center></td><td><center>'.$title.'</center></td><td><center>'.$total.'</center></td><td><center>'.$sahi*$total.'</center></td>
                            <td><center><b><a href="update.php?q=rmquiz&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red;color:black"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></center></td></tr>';
                        }
                        $c=0;
                        echo '</table></div></div>';
                    }
                ?>
                
                
                <?php 
                    if(@$_GET['q']==6) 
                    {
                        
                      echo "<br><br><center><h3><font color=white>TEST REPORTS</font></h3></center>";  
                ?>
                        <button type="button" class="collapsible">CAPGEMINI TEST 4 (17-07-2020) </button>
<div class="content">
  <?php

                        $result = mysqli_query($con,"SELECT user.name, history.email, history.level,history.score,history.wrong,history.title,history.date,user.college
                                                    FROM history
                                                    INNER JOIN user ON history.email=user.email where history.title='CAPGEMINI TEST 4 (17-07-2020) ECE';") or die('Error');
                        
                        echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
                        <tr><td><center><b>S.N.</b></center></td><td><center><b>Roll No</b></center></td><td><center><b>Class</b></center></td><td><center><b>Test Name</b></center></td><td><center><b>Total Questions Attempted</b></center></td><td><center><b>Secured Marks</b></center></td><td><center><b>Wrong</b></center></td>
                        <td><center><b>Submitted time</b></center></td></tr>';
                        $c=1;
                        while($row = mysqli_fetch_array($result)) 
                        {
                            $name = $row['name'];
                            $title = $row['title'];
                            $class = $row['college'];
                            $totalm = $row['level'];
                            $secmarks = $row['score'];
                            $wrong = $row['wrong'];
                            $datetime = $row['date'];
                            echo '<tr><td><center>'.$c++.'</center></td><td><center>'.$name.'</center></td><td><center>'.$class.'</center></td><td><center>'.$title.'</center></td><td><center>'.$totalm.'</center></td><td><center>'.$secmarks.'</center></td><td><center>'.$wrong.'</center></td><td><center>'.$datetime.'</center></td></tr>';
                        }
                        $c=0;
                        echo '</table></div></div>'; } ?>
                        </div>
                        
                    
                       
                <?php 
                    if(@$_GET['q']==7) 
                    {
                        $sql = "SELECT * FROM quiz" or die('Error');
                                if($result = mysqli_query($con, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        echo  '<table >';
                         
                                            echo "<tr>";
                                             echo"<th>DummyClass</th>";
                                                echo "<th>Test Name</th>";
                                                echo"<th>Date Of Publish</th>";
                                                echo "<th>Total Questions</th>";
                                                echo "<th>Correct Answer Marks</th>";
                                                echo "<th>Wrong Answer Marks</th>";
                                                echo"<th>Class</th>";
                                                echo"<th>Status<br>Visible: 1 , Hide: 0</th>";
                                                echo"<th>Action</th>";
                                                
                                            echo "</tr>";
                                        while($row = mysqli_fetch_array($result)){
                                            echo "<tr><form action=mangquiz.php method=post>";
                                             echo "<td  align='center'><input type=text  name=dummybranch value='" . $row['dummybranch'] . "'></td>";
                                                echo "<td  align='center'>" . $row['title'] . "</td>";
                                                echo "<td  align='center'>" . $row['date'] . "</td>";
                                                echo "<td  align='center'>" . $row['total'] . "</td>";
                                                echo "<td align='center'><input type=text  name=sahi value='".$row['sahi']."'></td>";
                                                echo "<td align='center'><input type=text name=wrong value='".$row['wrong']."'></td>";
                                                echo "<td align='center'><input type=text name=class value='".$row['class']."'></td>";
                                                echo "<td align='center'><input type=text name=status value='".$row['status']."'></td>";
                                                
                                                echo "<input type=hidden name=title value='".$row['title']."'>";
                                                echo "<td><input type=submit value='Update'>";
                                            echo "</form></tr>";
                                        }
                                        echo "</table></div></div>";
                                        // Free result set
                                        mysqli_free_result($result);
                                    } else{
                                        echo "No records matching your query were found.";
                                    }
                                } else{
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
                                }
                                
                    }
                ?>
        <script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>

            <br><bR></div>
        </div>
    </div>
    </ul>
    
    <br>
    <footer style="background: rgba(0, 0, 0, 0.5)";><br><Br>
       <center><font color="white"><h3>Designed and Developed By:<br>
            K satya shiva sai ram</h3></font></center><br>
</footer>
</body>
</html>
