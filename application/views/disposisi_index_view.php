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
				<div class="panel-title">Daftar Disposisi</div>
			  </div>
			  <div class="panel-body">
				<table id="my_table" class="table table-striped">
					<thead>
					<tr>
						<th>Nomor</th>
						<th>Tgl</th>
						<th>Hal</th>
						<th>Dari</th>
						<th>Sifat</th>
						<th>Status</th>
						<th class="text-center">Terima Disposisi</th>
						<th class="text-center">Detail Disposisi</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($record as $item):?>
					<tr>		
						<td><?php echo $item->NOMOR_SURAT; ?></td>
						<td><?php echo $item->TGL_SURAT; ?></td>
						<td><?php echo $item->HAL_SURAT; ?></td>
						<td><?php echo $item->NAMA_INSTANSI; ?></td>											
						<td><?php echo $item->NAMA_SIFAT; ?></td>											
						<td><?php echo $item->NAMA_STATUS; ?></td> 
						<td class="text-center">
							<a class="btn-sm btn-primary" role="button" title="edit" href="<?php echo base_url().'Disposisi_controller/rekam/';?>">
								terima
							</a>
						</td>						
						<td class="text-center">
							<a class="btn-sm btn-primary" role="button" title="edit" href="<?php echo base_url().'Surat_controller/log/';?>">
								log
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