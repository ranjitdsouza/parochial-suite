<?php

include "../config/connection.php";

// Handle multiple delete
$delete_success = '';
if (isset($_POST['delete_selected']) && !empty($_POST['delete_ids'])) {
	$ids = array_map('mysqli_real_escape_string', array_fill(0, count($_POST['delete_ids']), $conn), $_POST['delete_ids']);
	$ids_list = "'" . implode("','", $ids) . "'";
	$sql = "DELETE FROM baptism WHERE reg_no IN ($ids_list) AND stationID = '$STATION_CODE'";
	if ($conn->query($sql)) {
		$delete_success = "Selected records deleted successfully.";
	} else {
		$delete_success = "Failed to delete selected records.";
	}
}

// Get user role from DB using ref from cookie
$user_role = '';
if (isset($_COOKIE['userID'])) {
	$ref = mysqli_real_escape_string($conn, $_COOKIE['userID']);
	$role_result = $conn->query("SELECT role FROM users WHERE ID = '$ref' LIMIT 1");
	if ($role_result && $role_row = $role_result->fetch_assoc()) {
		$user_role = strtolower($role_row['role']);
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/parochialUI.css">
	<title>Report - Baptism</title>
</head>

<body>
	<?php @include '../nav/app_header_nav.php';
	include '../nav/global_nav.php'; ?>
	<br><br>
	<div class="pageName">
		<h3>BAPTISM RECORDS</h3>
	</div>


	<br>
	<?php include '../simpleSearchBox.php'; ?>

	<div class="container-widgets">
		<!-- Report Table Section -->
		<div class="widget-row">
			<div class="widget table-widget" style="max-height: 80%;">
				<div class="widget-content">

					<table class="data-table" id="table" style="width: 100%;">
						<thead>
							<tr>

								<th>ACTION</th>
								<th onclick="sortTable(1);">REG. NO.</th>
								<th onclick="sortTable(2)">NAME</span></th>
								<th onclick="sortTable(3)">GENDER</span></th>
								<th onclick="sortTable(4);">DATE OF DEATH</th>
								<th onclick="sortTable(5);">DATE OF BURIAL</th>
								<th onclick="sortTable(6);">CAUSE</th>
								<th onclick="sortTable(7);">MINISTER</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM burial WHERE stationID = '$STATION_CODE' ";
							$result = $conn->query($sql);
							while ($rows = $result->fetch_assoc()) {
								?>
								<tr>

									<td>
										<a href="view_burial.php?reg_no=<?php echo $rows['reg_no']; ?>"
											class="btn-link">View</a>
										<b>|</b>
										<a href="edit_burial.php?reg_no=<?php echo $rows['reg_no']; ?>"
											class="btn-link">Edit</a>
									</td>
									<td><?php echo $rows['reg_no']; ?></td>
									<td><?php echo $rows['name']; ?></td>
									<td><?php echo $rows['gender']; ?></td>
									<td><?php echo $rows['date_of_death']; ?></td>
									<td><?php echo $rows['date_of_burial']; ?></td>
									<td><?php echo $rows['minister_name']; ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>

				</div>
			</div>
		</div>
		<!-- End of Report Table Section -->
	</div>
	<script src="../js/export.js"></script>
	<script src="../js/search_script.js"></script>

</body>

</html>