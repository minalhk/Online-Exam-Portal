<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
         <center>
            <form method="post"><h1><b>Your Test Is Here! All The Best!</b></h1>  
      <table align="center" cellpadding="5" cellspacing="5" border="1">
                                
            <tr bgcolor="#A52A2A" style="color:white">
                                <td><b>Subject</b></td>
                                <td><b>Question level</b></td>
                                <td><b>Question</b></td>
                                <td><b>A</b></td>
                                <td><b>B</b></td>
                                <td><b>C</b></td>
                                <td><b>D</b></td>
                                
                                </tr>
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

        $catgry=array();
        $tp=array();

        if(isset($_GET['cat']) && isset($_GET['qtype']))
        {
        $catgry=$_GET['cat'];

        $tp=$_GET['qtype'];
        foreach ($catgry as $sub)
        {
        
            foreach ($tp as $level)
             {
                  
                    $qry3="select * from question where subject= '".$sub."' and diff_level= '".$level."' ";
                    $rs3=$conn2->query($qry3);
                                if($rs3->num_rows>0)
                                {
                                while($row = $rs3->fetch_assoc())
                                {
                                    echo "<tr>";
                                    echo "<td>".$row['subject']."</td>";
                                    echo "<td>".$row['diff_level']."</td>";
                                    echo "<td>".$row['question']."</td>";
                                    echo "<td><input type='checkbox'>".$row['op1']."</td>";
                                    echo "<td><input type='checkbox'>".$row['op2']."</td>";
                                    echo "<td><input type='checkbox'>".$row['op3']."</td>";
                                    echo "<td><input type='checkbox'>".$row['op4']."</td>";
                                    echo "</tr>";  
                                }
                            }
                            else
                            {
                                echo " ";
                            }
                
                
             }
        }
        
        }
       // $count=sizeof($catgry);
        //$count1=sizeof($tp);

        ?>

        

        
       </table>
   </form>
</center>
    </body>
</html>
