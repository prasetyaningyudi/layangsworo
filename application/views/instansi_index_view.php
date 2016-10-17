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
				<div class="panel-title">Daftar Instansi</div>
			  </div>
			  <div class="panel-body">
				<table id="my_table" class="table table-striped">
					<thead>
					<tr>
						<th class="text-center">No</th>
						<th>Nama Instansi</th>
						<th class="text-center">Edit</th>
					</tr>
					</thead>
					<tbody>
					<?php $i=1; foreach ($record as $item):?>
					<tr>		
						<td class="text-center"><?php echo $i++; ?></td>
						<td><?php echo $item->NAMA_INSTANSI;?></td>
						<td class="text-center">
							<a class="btn-sm btn-primary" role="button" title="edit" href="<?php echo base_url().'Instansi_controller/ubah/'.$item->ID;?>">
								edit
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