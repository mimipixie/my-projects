<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Database System</h1>      
    
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home_page.php">Home</a></li>
        
    <li><a href="admin_profile.php">Profile </a></li>        
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
                <li><a href="home_page.php"><span class="glyphicon glyphicon-user"></span>  Logout</a></li>

        
      </ul>
    </div>
      
    </div>
  </div>
</nav>

  </form>

</body>
</html>




<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<?php
          $DATABASE="localhost";
		 $username="root";
		 $password="";
		 $dbname = "university";
		 $connection= mysqli_connect($DATABASE, $username, $password, $dbname);
		 if(!$connection)
		 {
			die("Connection failed: " . mysqli_connect_error());
			 
		 }    
    
		  
            
    $select = mysqli_query($connection, "SELECT * FROM aid ");
    $num_row = mysqli_num_rows($select);

    
    if( $num_row>0 ) {
?>
      <table>
          <tr>
              <th>Student Id</th>
              <th>Reason for aid</th>
              <th>Action</th>
          </tr>
          <?php while( $userrow = mysqli_fetch_array($select) ) { ?>
          <tr>
              <td><?php echo $userrow['sid']; ?></td>
              <td><?php echo $userrow['rsn_of_aid']; ?></td>
              
              <td>
                  <a href="approve_yes.php?id=<?php echo $userrow['sid']; ?>"><span class="YES" title="YES">YES</span></a> /            
                 <a href="approve_no.php.php?id=<?php echo $userrow['sid']; ?>"><span class="NO" title="NO">NO</span></a>/
                 <a href="request_delete.php.php.php?id=<?php echo $userrow['sid']; ?>"><span class="DELETE" title="DELETE">DELETE</span></a>
                  
              </td>
         </tr>
          <?php } ?>
      </table>
<?php } ?>

