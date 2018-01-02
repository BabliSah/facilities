<?php include ('upload.php');
    
    //fetch the record to be updated
    if(isset($_GET['edit'])){
    	$id = $_GET['edit'];
        $edit_state = true;
    	$rec = mysqli_query($conn,"SELECT * FROM facilities where id=$id");
    	$record = mysqli_fetch_array($rec);
    	$id = $record['id'];
    	$title = $record['title'];
        $img_desc = $record['img_desc'];
        $img = $record['img'];
       }
     
?>

<!DOCTYPE.html>
<html lang="en-US">
<head>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Infrastructure and Facilities  | RAIT </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" 
 integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
 integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
 crossorigin="anonymous"></script>
</head>
<body>
	<?php
	 
       //include './website-master/rait/folder_bs4_links.php';
       //include './website-master/rait/connect.php';
      //include './website-master/rait/folder_navbar.php';
	?>
 <div class="container">
  <center> 
  	   <?php if (isset($_SESSION['msg'])): ?>
  	   	<div class="alert alert-success" role="alert">
  	   		<?php 
                  echo $_SESSION['msg'];
                  unset ($_SESSION['msg']);
  	   		?>
  	   	</div>
  	   	<?php endif ?>
  	   	<!-- table to view-->	
              <div class="table table-bordered" > <table>
                	<thead>    <tr>
                		           <th>id</th>
                		           <th>title</th>
                		           <th>img_desc</th>
                            	   <th>img</th>
                            	   <th colspan="2">Action</th>
                	           </tr>
                	   </thead>
                	   <tbody> 
         
                	       <?php 
                             while ( $row = mysqli_fetch_array($results)){
                	              ?>       
                	            <tr>
                		           <td> <?php echo $row['id']; ?></td>
                		           <td><?php echo $row['title']; ?></td>
                		           <td><?php echo $row['img_desc']; ?></td>
                            	   <td><?php echo $row['img']; ?></td>
                            	    <td>
         <a href="facilities_dynamic.php?edit=<?php echo $row['id']; ?>" >Edit</a>
                            	    </td>
                            	     <td>
         <a href="upload.php?delete=<?php echo $row['id']; ?>"> Delete</a>
                            	    </td>
                	           </tr>
                	           <?php } ?>
                	   </tbody>
                </table>	            
                </div>
     <!--form for editing-->		
         <div class="col-md-8"><br>
	      	<div id="box">
	          <h3 class="text-center d6-color"> Update Facilities</h3>
			  <hr class="hr-dark">
	
			<form method="POST" action="upload.php" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $id; ?>">

				<input class="form-control" placeholder="New Heading" type="text" name="title" value="<?php echo $title ?>" required>
                <br>
                <input class="form-control" placeholder="Enter Image Description" type="text" name="img_desc" maxlength="200"  
                value="<?php echo $img_desc ?>"  required>
                <br>
				<input class="form-control" placeholder="Upload Image" type="file" name="img"  value="<?php echo $img ?>"   required>
				<br>
				<div class="text-center">
					<?php if ($edit_state == false): ?>
				              <input class="btn btn-danger" type="submit" value="Save" name="save">
				        <?php  else: ?>
								<input class="btn btn-danger" type="submit" value="Update" name="update">
				    <?php endif ?>
				</div>
			</form>
	      	</div>
	      </div>
	  </center>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" 
 integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
 integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
 crossorigin="anonymous"></script>

</body>
</html>
