<script type="text/javascript">
window.print();
window.onfocus=function(){window.close();}</script>
<style type="text/css" media="print">
@media print{
        @page 
        {
            size: auto;   /* auto is the current printer page size */
			margin-top:3mm;
			margin-bottom:0mm;
			
              /* this affects the margin in the printer settings */
        }

        body 
        {
			-webkit-print-color-adjust: exact;
            background-color:#FFF; 
            border: solid 1px #FFF ;
            margin: 0px;  /* the margin on the content before printing */
       }
	   table{
		   margin:1px;
		   background:#FFF;
		     font-size:12px;}
		 thead{
			 background-color:#CCC;
			
			 }
			 hr{
				 color::#CCC;
				 border:none;
				 height:10px;
				 background-color:#CCC;
				 }
				 footer{
					 position:absolute;
					 bottom:0;
					 width:100%;
					 height:60px;
					 background:#CCC;
					 }
				footer table{
					 position:absolute;
					 bottom:0;
					 width:100%;
					 height:60px;
					 background:#CCC;
					 color:#FFF;
					 padding:1px;
					}	 
					footer hr{
					 position:absolute;
					 bottom:0;
					 width:100%;
					 height:60px;
					 background:#000;
					}	 

}}
    </style>
    
    <div id="add_page">
    <div class="box-header">
    <h3>DATA PO <?php echo $idpo?></h3></div>
    </div>
<?php foreach($cari_detail->result() as $row){
	$id_po_det=$row->id_po_detail;?>
<section class="invoice">

<div class="row">
        
        <!-- /.col -->
      </div>
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> <?php echo $row->id_jadi.' ( '.$row->nama.' ) ';?> <?php echo $qtypo = $row->qty.' '.$row->satuan?>
            <small class="pull-right"></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
         <table width="100%" style="border-collapse:collapse;
    border: 1px solid #000;
     text-align:center;" border="1">
            <thead>
            <tr>
              <th>Qty</th>
              <th>Product</th>
              <th>Detail Bahan Dasar</th>
            </tr>
            </thead>
            <tbody>
            <?php $car1=$this->db->query("SELECT
    tab_set_jadi.nama
	, tab_set_jadi.id_set_jadi
    , tab_satuan.nama AS satuan
    , tab_set_jadi.satuan_komposisi AS komposis
FROM
    ibenk_pantri.tab_set_jadi
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_set_jadi.satuan = tab_satuan.id_satuan) WHERE tab_set_jadi.jadi='$row->id_jadi';");
		$no1=1;
		foreach($car1->result() as $rod){
		?>
            <tr>
              <td><?php echo $no1++?></td>
              <td><?php echo $rod->nama;?></td>
              <td><?php $car2=$this->db->query("SELECT
    tab_dasar.nama
	,tab_mix.qty as komposisi
    , tab_mix.id_dasar
    , tab_satuan.nama AS satuan
FROM
    ibenk_pantri.tab_dasar
    INNER JOIN ibenk_pantri.tab_mix 
        ON (tab_dasar.id_dasar = tab_mix.id_dasar)
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_dasar.satuan = tab_satuan.id_satuan)
      WHERE tab_mix.id_set_jadi='$rod->id_set_jadi' AND tab_mix.stts='AKTIF'        
");?>
<table width="100%" style="border-collapse:collapse;
    border: 1px solid #000;
     text-align:center;" border="1">
<thead>
<tr>
<td>No</td>
<td>Bahan Dasar</td>
<td>Satuan Komposisi</td>
<td>Total</td>
<td>#</td>
</tr>
</thead>
<tbody>
<?php $no2=1; foreach($car2->result() as $rob){
	$dasar=$rob->id_dasar;
	?>
<tr>
<td><?php echo $no2++?></td>
<td><?php echo $rob->nama ?></td>
<td><?php echo $rob->komposisi.' '.$rob->satuan;?></td>
<td><?php echo $rob->komposisi*$qtypo.' '.$rob->satuan;?></td>
<td><?php 
echo $stts;

?></td>
<?php } ?>
</tr>
</tbody>
</table>
</td>
            </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      
    </section>
    <?php } ?>
  
      