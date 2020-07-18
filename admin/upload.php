<html>
<head>
	<title>
		UPLOAD
	</title>
</head>
<body>
	<?php

   $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "wtlproj";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn2 = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

	$subject="";
	$qlevel="";
  $ques="";
  $op1="";
  $op2="";
  $op3="";
  $op4="";
  $ans="";
  $marks="";
  $subid=0;
  $levid=0;

	if(isset($_GET['cat']) && isset($_GET['qtype']))
     {
        $subject=$_GET['cat'];
        $qlevel=$_GET['qtype'];

       // echo "$category";
        //echo "$qtype";
      }

$qry1="insert into subject(sname) values('$subject')";
      if ($conn->query($qry1) === TRUE) {
    echo "New subject added successfully";
} else {
    echo "Error: " . $qry1 . "<br>" . $conn->error;
}

$sql="select sid from subject where sname='".$subject."'";
    $result=$conn->query($sql);
    if($result->num_rows>0)
    {
      $row=$result->fetch_assoc();
      $subid=$row['sid'];
    }

    $sql1="select lid from level where level='".$qlevel."'";
    $result1=$conn->query($sql1);
    if($result1->num_rows>0)
    {
      $row1=$result1->fetch_assoc();
      $levid=$row1['lid'];
    }
      
        ?>
        <h1 style="text-align: center;">Multiple Choice Questions(Single Answer)</h1>
        <form action=" " method="post" style="text-align:center;">
      	 Enter question:<br><input type="text" placeholder="Question" name="ques"><br>
      	<h3>Enter options</h3>
      	<input type="text" placeholder="Option 1" name="op1"><br>
      	<input type="text" placeholder="Option 2" name="op2"><br>
      	<input type="text" placeholder="Option 3" name="op3"><br>
      	<input type="text" placeholder="Option 4" name="op4"><br>
        Correct Answer:<br><br><input type="text"placeholder="answer" name="ans"><br>
        Marks:<br><br><input type="text" placeholder="marks" name="marks"><br>
        <input type="submit" value="Upload Question" name="submit">
        </form>
       
        <?php
        if(isset($_POST['submit']))
        {



          $ques=$_POST['ques'];
          $op1=$_POST['op1'];
          $op2=$_POST['op2'];
          $op3=$_POST['op3'];
          $op4=$_POST['op4'];
          $ans=$_POST['ans'];
          $marks=$_POST['marks'];

          echo "$ques";
          echo "$op1";
          echo "$op2";
          echo "$op3";
          echo "$op4";
          echo "$ans";
          echo "$marks";

      
        $qry1="insert into question(subject,diff_level,question,op1,op2,op3,op4,answer,marks) values('$subject','$qlevel','$ques','$op1','$op2','$op3','$op4','$ans','$marks')";
       if ($conn->query($qry1) === TRUE) {
      echo "New question added successfully";
      } else {
    echo "Error: " . $qry1 . "<br>" . $conn->error;
      }
    
        }
     


$conn->close();
	?>
  

	</body>
</html>