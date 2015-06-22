<?php
                if(isset($_POST['username']))//If a username has been submitted 
		{
			$username = ($_POST['username']);
			$accType = 'admin_faculty';
			
			$query = $this->db->query("EXECUTE checkUsernameDuplicate $username, 'admin_faculty'");
			
			if($query) // not available
			{
				echo '<div id="Error">Already Taken</div>';
				
			}
			else
			{
				echo '<div id="Success">Available'.$query->username.'</div>';
			}
		
		}
?>