<?php include 'con.php';?>
<?php 
	  session_start();
$user_check=$_SESSION['room']; 
if (!isset($_SESSION['room'])) {
        /// your code here
header("Location:index.php");
    }

	$errors = "";

	// connect to database
	$db = mysqli_connect("localhost", "root", "", "user1");
$sql = "SELECT * FROM profile where email='$user_check'";
$result = $conn->query($sql);
//$k1="dpgakf9wm24imt1udiyr/1.jpg";
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc())
    {   $pp1=$row['pid'];
        //echo 'pid   '.$pp1;
    }
}
	// insert a quote if submit button is clicked
	if (isset($_POST['submit'])) {

		if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		}
		else{
			$task = $_POST['task'];
			echo $task;
			$query = "INSERT INTO tasks (pid,task) VALUES ('$pp1','$task')";
			mysqli_query($db, $query);
			header('location: task.php');
		}
	}	

	// delete task
	if (isset($_GET['del_task'])) {
		$taskid = $_GET['del_task'];
    // echo $taskid;
		mysqli_query($db, "DELETE FROM tasks WHERE taskid=".$taskid);
		header('location: task.php');
	}

	// select all tasks if page is visited or refreshed
	$tasks = mysqli_query($db, "SELECT * FROM tasks");

?>
<!DOCTYPE html>
<html>

<head>
	<title>Tasks pages</title>
	<link rel="stylesheet" type="text/css" href="inmsg/tasklist/style.css">
</head>

<body>

	<div class="heading">
		<h2 style="font-style: 'Hervetica';">Task Assign </h2>
	</div>


	<form method="post" action="task.php" class="input_form">
		<?php
		 if (isset($errors)) 
		{ ?>
			<p> <?php echo $errors; ?> </p>
		<?php 
	} ?>

	<textarea name="task" class="task_input" rows="4" cols="50"> </textarea>
		<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
	</form>


	<table>
		<thead>
			<tr>
				<th>N</th>
				<th>Tasks</th>
				<th style="width: 60px;">Action</th>
			</tr>
		</thead>

		<tbody>
			<?php $i = 1; 
			while ($row = mysqli_fetch_array($tasks))
			 { ?>
				<tr>
					<td> <?php echo $i; ?> </td>
					<td class="task">
					 <?php echo $row['task']; //take the written task from tasks tables ?>   
					 </td>
					<td class="delete"> 
						<a href="task.php?del_task=<?php echo $row['taskid'] //take the task id ?>">x</a> 
					</td>
				</tr>
			<?php $i++; }
			 ?>	

		</tbody>
	</table>
	<br>
 <a href=profile.php>GO TO profile</a> 
</body>
</html>