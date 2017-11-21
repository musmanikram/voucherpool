<?php include "includes/_header.php"; ?>


<main role="main" class="container">
	<h1>Recipients</h1>
    <div class="row">
        <div class="col-sm-12"><label>ID</label>: <span id="recipient-id"></span></div>
    </div>
    <div class="row">
        <div class="col-sm-12"><label>Name</label>: <span id="recipient-name"></span></div>
    </div>
    <div class="row">
        <div class="col-sm-12"><label>Name</label>: <span id="recipient-email"></span></div>
    </div>
	<table class="table table-bordered" id="recipients-vouchers">
		<thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Code</th>
                <th scope="col">Expiry Date</th>
                <th scope="col">Used</th>
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
            getSingleRecipient(<?php echo intval($_GET['id']) ?>);
	    });



	</script>

<?php include "includes/_footer.php"; ?>