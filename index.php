<!DOCTYPE HTML>
<html lang="en">
<head>
  <!-- This is the default encoding type for the Html Form post submission.
  Encoding type tells the browser how the form data should be encoded before
  sending the form data to the server.
  https://www.logicbig.com/quick-info/http/application_x-www-form-urlencoded.html-->
  <meta http-equiv="Content-Type" content="application/x-www-form-urlencoded"/>
<title>Sample Submission Form</title>
<!-- THIS WILL ERROR -->
  <!-- <link rel="stylesheet" href="style.css"> -->
 <style>
 form{
   padding: 10px;
   margin: 10px 0;
   text-align: center;
 }
 input[type=text]{
     margin-top: 10px;
 }
 input[type=submit]{
   border-radius:5px;
   margin-top: 10px;
 }
 .mid{
   text-align: center;

 }
 div{
   border-top: 1px solid black;
   border-bottom: 1px solid black;
 }
 #container{
   border: 2px solid black;
   margin: auto;
   width:50%;
 }
 #tit{
   text-shadow: 1px 5px 8px #A5A5A5;
 }
 </style>
</head>

<body>
  <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "music-db"; /*  this is the name of where the tables are located*/


       $conn = new mysqli($servername, $username, $password, $dbname);/*values that go in the table*/
       if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
       }

      if(isset($_REQUEST["submit"])){// registering a user

        $out_value = "";
        $s_username = $_REQUEST['username']; /*inputs into values*/
        $s_password = $_REQUEST['password'];

        if(!empty($s_username) && !empty($s_password)){
          $sql_query = "SELECT * FROM users WHERE username = ('$s_username')";
          $result = mysqli_query($conn, $sql_query);

          if (mysqli_num_rows($result) > 0){// checks if the username is in the data base
           $out_value = "Username already exists";
          }
          else{
           $sql = "INSERT INTO users (username, password) VALUES ('$s_username', '$s_password')";
           $res_2 = mysqli_query($conn, $sql); //adds the user to the data base if not already added
           $out_value = "New record created successfully";
          }
         }
       else {
        $out_value = "Enter another username";
       }
      }

      if(isset($_REQUEST["add"])){

        $o_value = "";
        $s_user1 = $_REQUEST['username_retrieval']; /*the imputs that the user inputs to get data*/
        if(!empty($s_user1)){
         $sql_query = "SELECT * FROM ratings WHERE username = ('$s_user1')"; // searches the database based on the username inputed

         $result = mysqli_query($conn, $sql_query);
         if (mysqli_num_rows($result) > 0){
           $row = mysqli_fetch_all($result);
           $o_value =  $row;
         }
         else{
           $o_value = "NO songs or ratings";
         }
        }

      else {
        $o_value = "Enter a username";
      }
     }


    if(isset($_REQUEST["art"])){
      // Variables for the output and the web form below.
      $value = "";
      $s_art = $_REQUEST['artist']; /*the imputs that the user inputs to get data*/
      if(!empty($s_art)){
       // If so, prepare SQL query with the data.
       $sql_query = "SELECT * FROM artists WHERE artist = ('$s_art')"; /* first is what info to get and the two othere are from where.*/

       $result = mysqli_query($conn, $sql_query);
       if (mysqli_num_rows($result) > 0){
       $row = mysqli_fetch_all($result);
       $art_value = $row;

       }
       else{
        $art_value = "No artist";
       }
      }

     else {
      $art_value = "Enter an artist";
     }
    }



$conn->close();
?>

<div id="container">
  <h1 class="mid" id="tit">music-db</h1>
  <h2 class="mid">Registration</h2>
  <div>
    <form method="POST" action="">
      Username: <input type="text" name="username" placeholder="Enter username" /><br>
      Password: <input type="text" name="password" placeholder="Enter password" /><br>
      <input type="submit" name="submit" value="Register"/>
      <p>
      <?php
          if(!empty($out_value)){ //prints result
            echo $out_value;
          }
          else{
          }
       ?>
      </p>
    </form>
  </div>

  <h2 class="mid"> Retrive songs by username</h2>
  <div>
    <form method="GET" action="">
    Username: <input type="text" name="username_retrieval" placeholder="Enter username" /><br>
    <input type="submit" name="add" value="Retrive"/>
    <p>
    <?php
        if(!empty($o_value)){
          if( $o_value ==  $row){
            for($x = 0; $x < sizeof($row); $x++){
               echo '<br>' . $row[$x][2]. ' -> ' . $row[$x][3]. '<br>';
            }
          }
          else{
          echo $o_value;
        }
        }
        else{}
      ?>
    </p>
    </form>
  </div>


  <h2 class="mid">Retrive songs by artist</h2>
  <div>
    <form method="GET" action="">
      Artist: <input type="text" name="artist" placeholder="Enter artist name" /><br>
      <input type="submit" name="art" value="Retrive"/>
      <p>
      <?php
          if(!empty($art_value)){
            if($art_value ==  $row){
              for($x = 0; $x < sizeof($row); $x++){
                 echo '<br>' . $row[$x][0].  '<br>';
              }
            }
            else{
             echo $art_value;
            }
          }
          else{}
        ?>
      </p>
    </form>
</div>
  </div>
</body>
</html>
