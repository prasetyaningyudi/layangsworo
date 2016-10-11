<script type='text/javascript'>
$(document).ready(function() {
    $('#my_table').DataTable({
		"order": [],
	});
} );
</script>
<!-- content goes here -->
<div class="my-content">
	<div class="row">
		<div class="col-lg-12">			
			<div class="panel panel-brown">
			  <div class="panel-heading">
				<div class="panel-title">Daftar Surat</div>
			  </div>
			  <div class="panel-body">
				<table id="my_table" class="table table-striped">
					<thead>
					<tr>
						<th>LOG DATE</th>
						<th>SURAT ID</th>
						<th>NOMOR</th>
						<th>TGL</th>
						<th>HAL</th>
						<th>NOMOR AGENDA</th>
						<th>STATUS</th>
						<th>Dari</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($record as $item):?>
					<tr>		
						<td><?php echo $item->LOG_DATE; ?></td>
						<td><?php echo $item->SURAT_ID; ?></td>
						<td><?php echo $item->NOMOR_SURAT; ?></td>
						<td><?php echo $item->TGL_SURAT; ?></td>
						<td><?php echo $item->HAL_SURAT; ?></td>
						<td><?php echo $item->NOMOR_AGENDA; ?></td>
						<td><?php echo $item->NAMA_STATUS; ?></td>
						<td><?php echo $item->NAMA_INSTANSI; ?></td>
					</tr>
					<?php endforeach;?>	
					</tbody>
				</table>
			  </div>			  
			</div> 
		</div> 
	</div>				
</div>		