<?php
include_once __DIR__. '/../layouts/sidebar.php';
include_once __DIR__.'/../controller/courseController.php';

$course_con=new CourseController();
$courses=$course_con->getCourses();
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Course</strong> Dashboard</h1>
					<div class="row">
						<div class="col-md-3">
							<a href="add_course.php" class='btn btn-dark'>Add New Course</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<table class='table table-striped'>
								<thead>
									<tr>
										<th>No</th>
										<th>Name</th>
										<th>Course Category</th>
										<th>Course Outline</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$count=1;
										foreach($courses as $course)
										{
											echo "<tr>";
											echo "<td>" . $count++. "</td>";
											echo "<td>" . $course['cname']. "</td>";
											echo "<td>" . $course['catname']. "</td>";
											echo "<td>" . $course['coutline']. "</td>";
											echo "<td> <a class='btn btn-warning mx-3'>Edit</a><a class='btn btn-danger mx-3'>Delete</a>" ;
											echo "</tr>";

										}
									?>
								</tbody>
							</table>
						</div>
					</div>

					
				</div>
			</main>


<?php
include_once __DIR__.'/../layouts/app_footer.php';
?>