<?php $this->load->view('includes/header'); ?>

	<script>
		$(function()
			{
				$('#link_createAccount').colorbox({opacity:0.3});	
			});
	</script>
	
			<div class="grid_3 grade_view" style="min-height: 450px">
				<?php $this->load->view('menu/adminMenu');?>
			</div> 
			
				<div class="grid_9 " id="table_box">
					<div class="box" >
						<form class="table-top" id="searchbox"  action="<?php echo site_url(); ?>/admin/grade_views"  method="post"> 
								<b><i class="fa fa-lock fa-fw"></i> Lock / <i class="fa fa-unlock-alt fa-fw"></i>Unlock Grade Views |</b> <select id='sem' name='sem' onChange="submit();"> 
										<?php 
										foreach ( $options as $option ) { ?>
												<?php if ($option->smtr_nSemesterID == $sem )
												{ ?>
												<option value="<?php echo $option->smtr_nSemesterID ?>" selected="selected" ><?php echo $option->smtr_sName ?></option>
												<?php }
												else {?>
												<option  value="<?php echo $option->smtr_nSemesterID ?>"><?php echo $option->smtr_sName ?></option>
											<?php } }?>
								
								</select>
								<button id="btn-save-settings" class="btn-save-settings " type="button"><i class="fa fa-floppy-o fa-fw"></i> Save </button>
						</form>

						<div id = "effect"  >
						<form action="/" id="view_form" method="post"> 
						
						<table id="grade_view">
							<thead>
								<tr>
									<th></th>
									<th align="center">1st Grading</th>
									<th align="center">2nd Grading</th>
									<th align="center">3rd Grading</th>
									<th align="center">4th Grading</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
							<thead>
								<tr class="head">	
									<th>Level</th>
									<th align="center"><input type="checkbox" id="v_1" onClick="toggle(this, 1)" ></th>
									<th align="center"><input type="checkbox" id="v_2" onClick="toggle(this, 2)"></th>
									<th align="center"><input type="checkbox" id="v_3" onClick="toggle(this, 3)"></th>
									<th align="center"><input type="checkbox" id="v_4" onClick="toggle(this, 4)"></th>
								</tr>
							</thead>
							<?php 
							$v_count = array(1 => 0, 2 => 0, 3 => 0, 4 => 0);
							foreach ($view as $v) { ?>
							<tr> 
								<td><?php echo $v->kghl_sName; ?></td>
								<td align="center"><input type="checkbox" class="v_1" name="<?php echo "v[".$v->kghl_nLevelID."][lv_bAllowView1]"; ?>" <?php if( $v->lv_bAllowView1 ) { echo "checked"; $v_count[1]++; } ?>></td>
								<td align="center"><input type="checkbox" class="v_2" name="<?php echo "v[".$v->kghl_nLevelID."][lv_bAllowView2]"; ?>" <?php if( $v->lv_bAllowView2 ) { echo "checked"; $v_count[2]++; } ?>></td>
								<td align="center"><input type="checkbox" class="v_3" name="<?php echo "v[".$v->kghl_nLevelID."][lv_bAllowView3]"; ?>" <?php if( $v->lv_bAllowView3 ) { echo "checked"; $v_count[3]++; } ?>></td>
								<td align="center"><input type="checkbox" class="v_4" name="<?php echo "v[".$v->kghl_nLevelID."][lv_bAllowView4]"; ?>" <?php if( $v->lv_bAllowView4 ) { echo "checked"; $v_count[4]++; } ?>></td>
							</tr>
							<?php
								
							} ?>
							
							
						</table> 
						</form>
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
function toggle(source, id) {
  checkboxes = document.getElementsByClassName('v_'+id);
	for(var i=0, n=checkboxes.length;i<n;i++) {
		checkboxes[i].checked = source.checked;
	  }
}

$( document ).ready(function() {
	var v_1 = <?php echo $v_count[1]; ?>;
	var v_2 = <?php echo $v_count[2]; ?>;
	var v_3 = <?php echo $v_count[3]; ?>;
	var v_4 = <?php echo $v_count[4]; ?>;
								 
	if (v_1 == 12) $( '#v_1' ).prop('checked', true);
	if (v_2 == 12) $( '#v_2' ).prop('checked', true);
	if (v_3 == 12) $( '#v_3' ).prop('checked', true);
	if (v_4 == 12) $( '#v_4' ).prop('checked', true);
});
 
$(document).on('click', '#btn-save-settings', function() { 
	var sem = $( '#sem' ).val(); 
	$.post ("<?php echo site_url(); ?>/admin/save_grade_views/"+sem, $("#view_form").serialize() )
		.done(function (data) { 
			location.reload();
			alert('Settings saved.');
			
		});
		
 });
 
</script>



