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
						<th>NOMOR</th>
						<th>TGL</th>
						<th>HAL</th>
						<th>NOMOR AGENDA</th>
						<th>Dari</th>
						<th  class="text-center">edit</th>
						<th class="text-center">cek status</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($record as $item):?>
					<tr>		
						<td><?php echo $item->NOMOR_SURAT; ?></td>
						<td><?php echo $item->TGL_SURAT; ?></td>
						<td><?php echo $item->HAL_SURAT; ?></td>
						<td><?php echo $item->NOMOR_AGENDA; ?></td>
						<td><?php echo $item->NAMA_INSTANSI; ?></td>
						<td class="text-center">
							<a class="btn-sm btn-primary" role="button" title="edit" href="<?php echo base_url().'Surat_controller/ubah/'.$item->ID;?>">
								edit
							</a>
						</td>
						<td class="text-center">
							<a class="btn-sm btn-primary" role="button" title="edit" href="<?php echo base_url().'Surat_controller/status/'.$item->ID;?>">
								cek status
							</a>
						</td>
					</tr>
					<?php endforeach;?>	
					</tbody>
				</table>
			  </div>			  
			</div> 
		</div> 
	</div>				
</div>		