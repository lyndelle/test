<?php $this->load->view('includes/header'); ?>

	<script>
		$(function()
			{
				$('#link_createAccount').colorbox({opacity:0.3});	
			});
	
	</script>
	
			<div class="grid_3" style="min-height: 450px">
				<?php $this->load->view('menu/adminMenu'); ?>
			</div> 
				
				
				<div class="grid_9" id="table_box">
					<div class="box" >
						
						<form  id="searchbox" action="#">
							   <span class="label">
									<b>Student Accounts | </b><a href='<?php echo site_url()?>/admin/create_account/student' id='link_createAccount' > <i class="fa fa-plus fa-fw"></i> Create Account</a>
							   </span>
								<!--<div class="search">
									<i class="fa fa-search fa-fw"></i>
									<input  class="frm-search"  size=40 type="text" name="search" value="" id="id_search" placeholder="Search" autofocus />
								</div>-->
						</form>
						
						<div  id="effect">
							<table id="example" class="display" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th></th>
										<th>User ID</th>
										<th>Username</th>
										<th>Student Name</th>
										<th></th>
									</tr>
								</thead>
						 
								
							</table>
						</div>
						
					</div>
				</div>
			<div class="grid_12" id="site_info">
				<div class="box">
					<p></p>
				</div>
			</div>
			<div class="clear"></div>
	</div>


</body>
</html>
	
<?php $this->load->view('includes/footer'); ?>	
	
<script>

    $(document).ready(function() {

    $(function () {
	$('input#id_search').quicksearch('#applicantsTable tbody tr');
       });
     });
	
	$(document).ready(function() {
		$('#example').dataTable( {
			
			"bSort" : false,
			"deferRender": true,
			"ajax": "http://localhost/acd_olsis_ghs/index.php/admin/get_students",
			"columns": [
				{ "data": "reset" },
				{ "data": "user_id" },
				{ "data": "username" },
				{ "data": "name" },
				{ "data": "delete" }
				
			]
		} );
	} );

</script>




	
	
	