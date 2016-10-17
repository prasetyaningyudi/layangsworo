<!-- content goes here -->
<div class="my-content">
	<div class="row">
		<div class="col-lg-12">			
			<div class="panel panel-brown">
			  <div class="panel-heading">
				<div class="panel-title">Ubah Instansi</div>
			  </div>
			  <div class="panel-body">
				<form action="" id="instansiform" method="post" class="form-horizontal">
				  <fieldset>
					<?php foreach ($record as $item):?>				  
					<div class="form-group">
					<label for="instansi" class="col-sm-2">Nama Instansi:<br></label>
					<div class="col-sm-10">
					<input class="form-control" id="instansi" type="text" name="instansi" value="<?php echo $item->NAMA_INSTANSI;?>" placeholder="nama instansi" required>
					</div>
					</div>
					<input type="hidden" name="id" value="<?php echo $item->ID;?>">
					<input type="submit" name="submit" value="Submit" class="btn btn-default btn-lg">
					<?php endforeach;?>						
				  </fieldset>	
				</form>
			  </div>			  
			</div> 
		</div> 
	</div>				
</div>		