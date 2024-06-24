<label>State</label><br><br>
<select class="form-control" name="State" id="State" onchange="Get_cities(this.value);" required>
<option value="">Select State</option>
	<?php 
		foreach($State_records as $rec)
		{
			echo "<option value=".$rec->id.">".$rec->name."</option>";
		}
	?>
</select>							
