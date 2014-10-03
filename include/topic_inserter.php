<?php
$con = mysqli_connect("localhost:3306", "memberdb1", "Moonmatt123");

//Check connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//Create database
$sql = "CREATE DATABASE topicdb1";

if(mysqli_query($con, $sql))
{
	echo "Database my_db created successfully";
}
else
{
	echo "Error creating database: " . mysqli_error($con);
}

//Create table
$sql = "CREATE TABLE topicTable(topicName CHAR(150), weekNumber INT, classID CHAR(50))";

//Execute query
if(mysqli_query($con, $sql))
	{
		echo "Table topicTable has been created successfully";
	}
else
	{
		echo "Error creating table: " . mysqli_error($con);
?>
