<!-- content goes here -->
<div class="my-content">
	<div class="row">
		<div class="col-lg-12">			
			<div class="panel panel-brown">
			  <div class="panel-heading">
				<div class="panel-title">Ubah Surat</div>
			  </div>
			  <div class="panel-body">
				<?php foreach($record as $item): ?>
				<form action="" id="suratform" method="post" class="form-horizontal">
				  <fieldset>
					<div class="form-group">
					<label for="nomor" class="col-sm-2">Nomor Surat:<br></label>
					<div class="col-sm-10">
					<input class="form-control" id="nomor" type="text" name="nomor" value="<?php echo $item->NOMOR_SURAT;?>" placeholder="nomor" required>
					</div>
					</div>
					<div class="form-group">	
					<label for="tgl" class="col-sm-2">Tgl Surat:<br></label>
					<div class="col-sm-10">	
					<input class="form-control" id="tgl" type="date" name="tgl" value="<?php echo $item->TGL_SURAT;?>" placeholder="YYYY/MM/DD" required>
					</div>	
					</div>	
					<div class="form-group">	
					<label for="hal" class="col-sm-2">Hal:<br></label>
					<div class="col-sm-10">		
					<textarea class="form-control" id="hal" name="hal" rows="2" placeholder="hal" required><?php echo $item->HAL_SURAT;?></textarea>
					</div>
					</div>
					<div class="form-group">
					<label for="noagenda" class="col-sm-2">Nomor Agenda:<br></label>
					<div class="col-sm-10">
					<input class="form-control" id="noagenda" type="text" name="noagenda" value="<?php echo $item->NOMOR_AGENDA;?>" placeholder="nomor agenda">
					</div>
					</div>					
					<div class="form-group">	
					<label for="instansi" class="col-sm-2">Dari:<br></label>
					<div class="col-sm-7">	
					<select class="form-control" id="instansi" name="instansi" form="suratform">
						<?php foreach ($record1 as $value):?>
						<?php 
							if($value->ID == $item->INSTANSI_ID){
								$selected = 'selected';
							}else{
								$selected = '';
							}
						?>						
						<option value="<?php echo $value->ID;?>" <?php echo $selected; ?>><?php echo $value->NAMA_INSTANSI;?></option>	
						<?php endforeach;?>
					</select>
					</div>
					<div class="col-sm-3 text-right">		
					<a class="btn btn-default" role="button" href="<?php echo base_url().'Instansi_controller/rekam';?>">Rekam Instansi Baru</a>
					</div>
					</div>
					<input type="hidden" name="id" value="<?php echo $item->ID;?>">
					<input type="submit" name="submit" value="Submit" class="btn btn-default btn-lg">
				  </fieldset>	
				</form>
				<?php endforeach; ?>
			  </div>			  
			</div> 
		</div> 
	</div>				
</div>		