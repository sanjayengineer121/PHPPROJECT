<?php


$servername = "localhost";
$username = "root";
$password = "phpmyadmin@localhost";
$dbname = "CSE_PROJECT";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {

       die("Connection failed: " . mysqli_connect_error());

}

else
{

 // Check if the form is submitted
 // FOR VIEWING DETAILS
if ( isset( $_POST['submit'] ) )    // The PHP isset() function is used to determine if a variable is set and is not null.

{

// retrieve the form data by using the element's name attributes value as key

echo '<h2> DETAILS <h2/>'

$Name = $_REQUEST['Name'];
$Section= $_REQUEST['Section'];
$Id= $_REQUEST['Id'];
// display the results

$sql = "SELECT Id, Name, Section ,Percentage FROM student_info where Id=$Id ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

	// output data of each row

    while($row = mysqli_fetch_assoc($result))   // function fetch_assoc() puts all the results into an associative array
	{
        echo " id: " . $row["id"]. "  Name: " . $row["Name"]. " " . " Section" .$row["Section"]. " "."Percentage".$row["Percentage" ] ;
    }
}


}
// FOR ENTERING A NEW VALUE
elseif( isset( $_POST['submit_U'] ))
  {
	    ,echo '<h2> Insert values </h2>'

		  $FirstName=$_GET['FirstName'];
		  $MiddleName=$_GET['MiddleName'];
		  $LastName=$_GET['LastName'];
		  $Email=$_GET['Email'];
		  $Id= $_REQUEST['Id'];
		  $Percentage="";
		  if($FirstName > 100 or $MiddleName >100 or $LastName >100 $Email >100 or $Biology>100)
		  {
			  echo " value greater than 100 enter again ";
			  echo " <script type="text/javascript">  window.location="file:///home/paryant/login.html";</script>" ;
		  }
		 else
		 {
	          $sql="insert into student_Subject_marks VALUES($Id,$FirstName,$Email,$LastName,$MiddleName,$Biology)";
	         if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";

						sleep(3);

                }
				else {
                               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
		 }

	echo " <script type="text/javascript">  window.location="file:///home/paryant/login.html";</script>" ;

    }


// FOR DELETING DATA
elseif( isset( $_POST['submit_D'] )
{

     $Id=$_GET['Id'];


	          $sql="DELETE from student_Subject_marks where Id=$Id";
             $sql2="DELETE from student_info wher Id=$id";
	         if (mysqli_query($conn, $sql) and mysqli_query($conn, $sql2)) {
                        echo "Record  Deleted successfully";
						sleep(3);
						echo " <script type="text/javascript">  window.location="file:///home/paryant/login.html";  </script>" ;
                }
				else {
                               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }


}


}
mysqli_close($conn);
?>
