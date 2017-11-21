<?php include "includes/_header.php"; ?>


<main role="main" class="container">
	<h1>Recipients</h1>
	<table class="table table-bordered" id="recipients-table">
		<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">First Name</th>
			<th scope="col">Last Name</th>
			<th scope="col">Username</th>
		</tr>
		</thead>
		<tbody>

		</tbody>
	</table>

</main><!-- /.container -->


<?php include "includes/_footer_files.php"; ?>


	<script src="js/recipients.js"></script>

	<script type="application/javascript">

	    $(function() {
	        getRecipients();
	    });



	</script>

<?php include "includes/_footer.php"; ?>