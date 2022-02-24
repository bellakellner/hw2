<!DOCTYPE HTML>
<html lang="en">
<head>
  <!-- This is the default encoding type for the Html Form post submission.
  Encoding type tells the browser how the form data should be encoded before
  sending the form data to the server.
  https://www.logicbig.com/quick-info/http/application_x-www-form-urlencoded.html-->
  <meta http-equiv="Content-Type" content="application/x-www-form-urlencoded"/>
<title>Sample Submission Form</title>
</head>

<body>
  <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
   $dbname = "COMP333_SQL_Tutorial"; /*  this is the name of where the tables are located*/


       $conn = new mysqli($servername, $username, $password, $dbname);/*values that go in the table*/
       if ($conn->connect_error) {
         // Exit with the error message.
         // . is used to concatenate strings.
         die("Connection failed: " . $conn->connect_error);
       }

       if(isset($_REQUEST["submit"])){
      // Variables for the output and the web form below.
      $out_value = "";
      $s_id = $_REQUEST['student_id']; /*the imputs that the user inputs to get data*/
      $s_test = $_REQUEST['test'];

      // The following is the core part of this script where we connect PHP
      // and SQL.
      // Check that the user entered data in the form.
      if(!empty($s_id) && !empty($s_test)){
        // If so, prepare SQL query with the data.
        $sql_query = "SELECT * FROM student_grades WHERE student_id = ('$s_id') AND test = ('$s_test')"; /* first is what info to get and the two othere are from where.*/
        //the $sql_query value is the student_grades
        // star means everything
        // Send the query and obtain the result.
        // mysqli_query performs a query against the database.
        $result = mysqli_query($conn, $sql_query);
        //result is a query
        // mysqli_fetch_assoc returns an associative array that corresponds to the
        // fetched row or NULL if there are no more rows.
        // Probably does not make much of a difference here, but, e.g., if there are
        // multiple rows returned, you can iterate over those with a loop.
        $row = mysqli_fetch_assoc($result);
        //mysqli_fetch_assocgets the actual value from the querry
        $out_value = "The grade is: " . $row['grade'];
        //prints out the answer
      }
      else {
        $out_value = "No grade available!";
      }
    }

    $conn->close();
  ?>

  <form method="GET" action="">
Student ID: <input type="text" name="student_id" placeholder="Enter Student ID" /><br>
Test: <input type="text" name="test" placeholder="Enter Test" /><br>
<input type="submit" name="submit" value="Submit"/>
<p><?php
//html code for the user to query data
    if(!empty($out_value)){
      echo $out_value;
    }
  ?></p>
  </form>
</body>
</html>
