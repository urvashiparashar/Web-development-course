<?php
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $phno=$_POST['phno'];
  $dob=$_POST['dob'];
  $reason=$_POST['reason'];
   if(!empty($fname) || !empty($lname) || !empty($email) || !empty($phno) || !empty($dob) || !empty($reason))
   {
       $host="localhost";
       $dbUsername="root";
       $dbPassword="T@nnu2001";
       $dbname="test";

       //create connection
       $conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);
       if(mysqli_connect_error())
       {
           die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
       }
       else{
           $SELECT="SELECT email From regform Where email= ? Limit 1";

           $INSERT="INSERT Into regform (fname,lname,email,phno,dob,reason) values (?,?,?,?,?,?)";

           $stmt=$conn->prepare($SELECT);
           $stmt->bind_param("s",$email);
           $stmt->execute();
           $stmt->bind_result($email);
           $stmt->store_result();
           $rnum=$stmt->num_rows;

           if($rnum==0)
           {
               $stmt->close();
               $stmt=$conn->prepare($INSERT);
               $stmt->bind_param("sssiss", $fname, $lname,$email,$phno,$dob,$reason);
               $stmt->execute();
            //    echo "okk successfully inserted";
           }
           else{
               echo "someone has already registered with this email";
           }
           $stmt->close();
           $conn->close();
       }
    
      
   }
   else
   {
     echo "all fields are required";
     die();
   }
?>
<a href="registration1.html"><button type="btn2" class="back" 
 style=" padding: 10px 30px;
    cursor: pointer;
    background: transparent;
    border: 0;
    outline: none;
    position: relative;
    margin-top: 280px;
    margin-left: 620px;
    transition: .5s;
    align-content: center;
    box-shadow: 0 0 20px 9px #1312121f;
    border-radius: 30px;
    background: linear-gradient(to right,#10ff1093,#dfe20d); "> GOBACK</a></button>
    <body >
      <h4>

      <center>Submit another response....<center></h4>
    </body>