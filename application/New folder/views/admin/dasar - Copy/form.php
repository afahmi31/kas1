<div class="row" role="">
    <div class="modal-content">
      
      <div class="modal-body">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
    <form class="form" action="<?php echo base_url()?>index.php/admin/dasar/simpan" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
                <div class="form-group">
                <input type="hidden" name="lokasi" value="Lokasi" />
                  <label for="exampleInputEmail1">Nama</label>
       <input type="text" name="nama" value="<?php echo $dasar;?>" onKeyUp="this.value = this.value.toUpperCase()" class="form-control" placeholder="Nama" required>
       <input type="hidden" name="id_dasar" value="<?php echo $id_dasar?>" class="form-control" >
        
        <input type="hidden" name="userinput" value="<?php echo $userinput?>" class="form-control" >
        <input type="hidden" name="userupdate" value="<?php echo $userupdate?>" class="form-control" >
        <input type="hidden" name="tglinput" value="<?php echo $tglinput?>" class="form-control" >
        <input type="hidden" name="tglupdate" value="<?php echo $tglupdate?>" class="form-control" >
        <input type="hidden" name="stts" value="<?php echo $stts?>" class="form-control" >
        </div>
        
        <div class="form-group">
 <div class="row">
        <div class="col-xs-6">
         <label>KOMPOSISI SATUAN</label>
                  <input type="number" name="satuan_komposisi" value="<?php echo $satuan_komposisi?>" class="form-control" placeholder="" required>
                </div>
                <div class="col-xs-6">
                <label>SATUAN</label>
               <select class="form-control select2" required name="satuan">
 <option value="<?php echo $id_satuan;?>"><?php echo $satuan;?></option>
 <?php $this->db->where('stts','AKTIF');
 $sat=$this->db->get('tab_satuan');
 foreach($sat->result() as $row){
 ?>
 <option value="<?php echo $row->id_satuan;?>"><?php echo $row->nama;?></option>
 <?php } ?>
 </select>
 </div>
                </div>

 
 </div>


 <div class="form-group">
 <label>BAGIAN BAHAN SETENGAH JADI</label>
 <select class="form-control select2" required name="set_jadi">
 <option value="<?php echo $id_set_jadi;?>"><?php echo $set_jadi;?></option>
 <?php $this->db->where('stts','AKTIF');
 $sat=$this->db->get('tab_set_jadi');
 foreach($sat->result() as $row){
 ?>
 <option value="<?php echo $row->id_set_jadi;?>"><?php echo $row->nama;?></option>
 <?php } ?>
 </select>
 </div>

                <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>

              </div>
             
            </form>
          </div>



      </div>
      
    </div>
  </div>