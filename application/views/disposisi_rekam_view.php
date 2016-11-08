<!-- content goes here -->
<div class="my-content">
	<div class="row">
		<div class="col-lg-12">			
			<div class="panel panel-brown">
			  <div class="panel-heading">
				<div class="panel-title">Rekam Disposisi</div>
			  </div>
			  <div class="panel-body">
				<form action="" id="disposisiform" method="post" class="form-horizontal">
				  <fieldset>
					<?php foreach ($record as $item):?>
					<input type="hidden" name="id" value="<?php echo $item->ID;?>">
					<div class="form-group">
						<label for="nomor" class="col-sm-2">No Surat:<br></label>
						<div class="col-sm-4">
						<input class="form-control" id="nomor" type="text" name="nomor" value="<?php echo$item->NOMOR_SURAT; ?>" placeholder="nomor" readonly required>
						</div>
						<label for="tglsurat" class="col-sm-2">Tgl Surat:<br></label>
						<div class="col-sm-4">
						<input class="form-control" id="tglsurat" type="text" name="tglsurat" value="<?php echo date('d F Y', strtotime($item->TGL_SURAT)); ?>" placeholder="tglsurat" readonly required>
						</div>
					</div>						

					<div class="form-group">
						<label for="nomoragenda" class="col-sm-2">Nomor Agenda:<br></label>
						<div class="col-sm-10">
						<input class="form-control" id="nomoragenda" name="nomoragenda" type="text" name="nomor" value="<?php echo $item->NOMOR_AGENDA; ?>" placeholder="nomor agenda" required>
						</div>
					</div>
					<?php endforeach; ?>					
					<div class="form-group">
						<label for="sifat" class="col-sm-2">Sifat Surat:<br></label>
						<div class="col-sm-10">
							<?php foreach ($record1 as $item):?>
							<label class="radio-inline"><input type="radio" name="sifat" value="<?php echo $item->ID; ?>" required><?php echo $item->NAMA_SIFAT; ?></label>
							<?php endforeach; ?>	
						</div>
					</div>	
					<div class="form-group">
						<label for="unit" class="col-sm-2">Disposisi ke Unit:<br></label>
						<div class="col-sm-10">
							<?php foreach ($record2 as $item):?>
							<label class="checkbox-inline"><input type="checkbox" name="unit[]" value="<?php echo $item->ID; ?>"><?php echo $item->NAMA_UNIT; ?></label>
							<?php endforeach; ?>
						</div>
					</div>	
					<div class="form-group">
					<label for="petunjuk" class="col-sm-2">Petunjuk Disposisi:<br></label>
					<div class="col-sm-10">
						<div class="row">
							<div class="col-sm-4">
							<?php foreach ($record3 as $item):?>
								<?php if($item->ID < '9'): ?>
									<div class="checkbox">
									  <label><input type="checkbox" name="petunjuk[]" value="<?php echo $item->ID; ?>"><?php echo $item->NAMA_PETUNJUK; ?></label>
									</div>
								<?php endif; ?>
							<?php endforeach; ?>
							</div>
							<div class="col-sm-4">
							<?php foreach ($record3 as $item):?>
								<?php if($item->ID < '17' && $item->ID > '8'): ?>
									<div class="checkbox">
									  <label><input type="checkbox" name="petunjuk[]" value="<?php echo $item->ID; ?>"><?php echo $item->NAMA_PETUNJUK; ?></label>
									</div>
								<?php endif; ?>
							<?php endforeach; ?>
							</div>	
							<div class="col-sm-4">
							<?php foreach ($record3 as $item):?>
								<?php if($item->ID > '16'): ?>
									<div class="checkbox">
									  <label><input type="checkbox" name="petunjuk[]" value="<?php echo $item->ID; ?>"><?php echo $item->NAMA_PETUNJUK; ?></label>
									</div>
								<?php endif; ?>
							<?php endforeach; ?>
							</div>								
						</div>
					</div>
					</div>	
					<div class="form-group">
					<label for="catatan" class="col-sm-2">Catatan Disposisi:<br></label>
					<div class="col-sm-10">
					<textarea class="form-control" id="catatan" name="catatan" rows="2" placeholder="catatan disposisi" required></textarea>
					</div>
					</div>						
					<input type="submit" name="submit" value="Submit" class="btn btn-default btn-lg">
				  </fieldset>	
				</form>
			  </div>			  
			</div> 
		</div> 
	</div>				
</div>		