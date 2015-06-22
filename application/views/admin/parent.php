<?php $this->load->view('includes/header'); ?>
	<script>
		$(function()
			{
				$('#link_createAccount').colorbox({opacity:0.3});	
			});
	</script>
			<div class="grid_3 menu-height" >
				<?php $this->load->view('menu/adminMenu'); ?>
			</div> 
				
				
				<div class="grid_9" id="table_box">
					<div class="box" >
						
						<form  class="table-top" id="searchbox" action="#">
							   <span class="label">
									<b>Parent Accounts | </b><a href='<?php echo site_url()?>/admin/create_account/parent' id='link_createAccount' > <i class="fa fa-plus fa-fw"></i> Create Account</a>
							   </span>
								<div class="search">
									<i class="fa fa-search fa-fw"></i>
									<input  size=40 type="text" name="search" value="" class="frm-search" id="id_search" placeholder="Search" autofocus />
								</div>
						</form>
						
						<div id="effect">
							<table  id="applicantsTable" width=100% border=1>
							  <thead align="left">
								<tr>
									<th>
									   
								   </th >
								   <th>
									   User ID
								   </th>
								   <th>
									   Username
								   </th>
								   <th width=50%>
									   Student Name
								   </th>
								   <th>
									   
								   </th>
								 </tr>
							  </thead>
							  <tbody>
							   <?php $c=0; foreach ($accounts as $row){
									if ($c%2 != 0){ ?>
									<tr class="odd" >
										<?php } else { ?>
										<tr>
										<?php } ?>
							   <tr>
									<td align=center>
									   <a href='<?php echo site_url()?>/admin/reset_password/<?php echo $row->username; ?>/2/parents' id='link_reset-<?php echo $row->user_id; ?>' >
									   <i class="fa fa-key" title='Reset Password' ></i>
										</a>
								   </td>
								   <td>
									   <?php echo $row->user_id; ?>
								   </td>
								   <td>
									   <?php echo $row->username; ?>
								   </td>

								   <td>
									   <?php if ( $row->stud_sFirstName === NULL )
									   {
										?>
										 <a href='<?php echo site_url()?>/admin/assign_student/<?php echo $row->user_id; ?>/<?php echo $row->username; ?>/parents' id='link_assign-<?php echo $row->user_id; ?>' ><i class="fa fa-user-plus fa-fw"></i> Assign Student</a>
									   <?php }
									   else{
										echo $row->stud_sLastName.',  '.$row->stud_sFirstName.' '.$row->stud_sMiddleName;
									   }?>
								   </td>
								    <td align=center>
									   <a href='<?php echo site_url()?>/admin/delete_account/<?php echo $row->user_id; ?>/<?php echo $row->username; ?>/2/parents' id='link_delete-<?php echo $row->user_id; ?>' >
									   <i title='Delete' class="fa fa-trash"></i></a>
										</a>
								   </td>
								   <script>
								   $(function()
								   {
									   $('#link_delete-<?php echo $row->user_id; ?>').colorbox({opacity:0.3});
									   $('#link_reset-<?php echo $row->user_id; ?>').colorbox({opacity:0.3});
									   $('#link_assign-<?php echo $row->user_id; ?>').colorbox({opacity:0.3});
									   
								   });
								   </script>
							   </tr>
							   <?php $c++; } ?>
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
<?php $this->load->view('includes/footer'); ?>

<script>

    $(document).ready(function() {
    $(function () {
	$('input#id_search').quicksearch('#applicantsTable tbody tr');
       });
     });

    function displayApplicant(id)
    {
         window.open("http://localhost:8080/projectDMSF/applicant.php?id="+id,"applicant");
           //document.location.href="http://localhost:8080/projectDMSF/applicant.php?id="+id;
    }
    
		   
</script>