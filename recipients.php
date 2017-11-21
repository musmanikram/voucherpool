<?php include "includes/_header.php"; ?>


<main role="main" class="container">
	<h1>Recipients</h1>
	<table class="table table-bordered" id="recipients-table">
		<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Name</th>
			<th scope="col">Email</th>
			<th scope="col">Details</th>
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
            getAllRecipients();
	    });



	</script>

<?php include "includes/_footer.php"; ?>