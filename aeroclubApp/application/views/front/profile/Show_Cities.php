<label>City</label><br><br>
<select class="form-control" name="City" id="City" required>
	<option value="">Select City</option>
	<?php 
		foreach($City_records as $rec)
		{
			echo "<option value=".$rec->id.">".$rec->name."</option>";
		}
	?>
</select>							
