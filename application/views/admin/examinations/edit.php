<form method="post">
	<table class="table-form table-bordered">
		<tr>
			<th>Code</th>
			<td><input type="text" name="exm_code" size="80" maxlength="200" value="" /></td>
		</tr>
		<tr>
			<th>Name</th>
			<td><input type="text" name="exm_name" size="80" maxlength="200" value="" /></td>
		</tr>
		<tr>
			<th>Description</th>
			<td><textarea name="exm_description" rows="5" cols="80"></textarea></td>
		</tr>
		<tr>
			<th>Rate</th>
			<td><input type="text" name="exm_rate" value="" /></td>
		</tr>
		<tr>
			<th>Status</th>
			<td>
				<select name="exm_status">
					<option <?php echo ($examination->exm_status == "active") ? "selected" : ""; ?> value="active">active</option>
					<option <?php echo ($examination->exm_status == "inactive") ? "selected" : ""; ?> value="inactive">inactive</option>
				</select>
			</td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/examinations'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
$(function() {		
	$('form').floodling('exm_code', "<?php echo addslashes($examination->exm_code); ?>");		
	$('form').floodling('exm_name', "<?php echo addslashes($examination->exm_name); ?>");		
	$('form').floodling('exm_description', "<?php echo addslashes($examination->exm_description); ?>");		
	$('form').floodling('exm_rate', "<?php echo addslashes($examination->exm_rate); ?>");		
	// $('form').floodling('exm_status', "<?php //echo addslashes($examination->exm_status); ?>");
});
</script>
