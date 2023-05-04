<!DOCTYPE html>
<html>
<head>
	<title>Professor Table</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
			color: #333;
			font-family: sans-serif;
			font-size: 14px;
			text-align: left;
		}
		table th, table td {
			padding: 8px;
			border: 1px solid #ccc;
		}
		table th {
			background-color: #f2f2f2;
			color: #666;
			font-weight: normal;
		}
	</style>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>Professor Name</th>
				<th>ID</th>
				<th>Address</th>
			</tr>
		</thead>
		<tbody>
			<?php
				// connect to database and retrieve data
				$conn = mysqli_connect("localhost", "username", "password", "database_name");
				$sql = "SELECT name, id, address FROM professors";
				$result = mysqli_query($conn, $sql);

				// output data of each row
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row['name'] . "</td>";
					echo "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['address'] . "</td>";
					echo "</tr>";
				}

				// close database connection
				mysqli_close($conn);
			?>
		</tbody>
	</table>
</body>
</html>
