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
       $dbPassword="Urv@2001";
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
               echo " <span style = 'font-size: 23px' ; margin-left: 15px ; >You cannot register as someone has already registered with this email id!!!! </span>";
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
<div class="wrapper" style = "text-align:center">
<a href="registration1.html"><button type="btn2" class="back" 
style=" position: absolute;

    background: transparent;
    border: 0;
    outline: none;
    height: 45px;
    width: 98px;
    transition: .5s;
    
    box-shadow: 0 0 20px 9px #1312121f;
    border-radius: 30px;
    background: linear-gradient(to right,#10ff1093,#dfe20d);
top: 50%;"> GOBACK</a></button> 
</div>

    <body >
      
    </body>