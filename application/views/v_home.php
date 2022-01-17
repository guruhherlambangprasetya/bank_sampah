<?php 
//if ($this->session->userdata('level') == 'admin') {
	
 ?>
	<div class="alert alert-success">
		<div class="pull-left">
			<h4>
				<?php 
					date_default_timezone_set("Asia/Jakarta") . '<br>';
						echo date('d-M-Y')?> </h4>
         </div>
		<div class="pull-right">
					<h4><span class="jam"></span></h4>
		</div>
<center><h3><script language="JavaScript">
var text="Selamat Datang Di Aplikasi Bank Sampah";
var delay=1;
var currentChar=1;
var destination="[none]";
function type()
{
//if (document.all)
{
var dest=document.getElementById(destination);
if (dest)// && dest.innerHTML)
{
dest.innerHTML=text.substr(0, currentChar)+"<blink>_</blink>";
currentChar++;
if (currentChar>text.length)
{
currentChar=1;
setTimeout("type()", 3000);
}

else
{
setTimeout("type()", delay);
}
}
}
}
function startTyping(textParam, delayParam, destinationParam)
{
text=textParam;
delay=delayParam;
currentChar=1;
destination=destinationParam;
type();
}
</script> <b><div 0px="" 12px="" arial="" color:="" ff0000="" font:="" id="textDestination" margin:="" style="background-color: none;"></div></b> <script language="JavaScript">
javascript:startTyping(text, 50, "textDestination");
</script></h3></center>    </div>
</div>
<div class="row">
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-aqua">
    <div class="inner">
      <h3>
        <?php echo $this->db->get('sampah')->num_rows() ?>
      </h3>

      <p>Data Sampah</p>
    </div>
    <div class="icon">
      <i class="ion ion-bag"></i>
    </div>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-green">
    <div class="inner">
      <h3><?php echo $this->db->get('pembelian')->num_rows() ?><sup style="font-size: 20px"></sup></h3>

      <p>Pembelian Sampah</p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
  </div>
</div>
<!-- ./col -->

<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-red">
    <div class="inner">
      <h3><?php echo $this->db->get('penjualan')->num_rows() ?></h3>

      <p>Penjualan</p>
    </div>
    <div class="icon">
      <i class="ion ion-pie-graph"></i>
    </div>
  </div>
</div>
<!-- ./col -->

<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-yellow">
    <div class="inner">
      <h3><?php echo $this->db->get('anggota')->num_rows() ?></h3>

      <p>Total Nasabah</p>
    </div>
    <div class="icon">
      <i class="ion ion-person-add"></i>
    </div>
  </div>
</div>
</div>

<!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
              </div>
            </div>
               <!-- /.box-body -->
          </div>
          <!-- /.box -->




<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
  exportEnabled: true,
  animationEnabled: true,
  title:{
    text: "Grafik Penjualan dan Pembelian Sampah"
  },
  subtitles: [{
    text: "Tahun <?php echo date('Y') ?>"
  }], 
  axisX: {
    title: "-"
  },
  axisY: {
    title: "Pembelian",
    titleFontColor: "#4F81BC",
    lineColor: "#4F81BC",
    labelFontColor: "#4F81BC",
    tickColor: "#4F81BC"
  },
  axisY2: {
    title: "Penjualan",
    titleFontColor: "#C0504E",
    lineColor: "#C0504E",
    labelFontColor: "#C0504E",
    tickColor: "#C0504E"
  },
  toolTip: {
    shared: true
  },
  legend: {
    cursor: "pointer",
    itemclick: toggleDataSeries
  },
  data: [{
    type: "column",
    name: "Pembelian",
    showInLegend: true,      
    yValueFormatString: "#,##0.# Trx",
    dataPoints: [
      { label: "Januari",  y: <?php echo cari_data_perbulan('pembelian','tanggal' ,date('Y'), '01', 'total') ?> },
      { label: "Februari", y: <?php echo cari_data_perbulan('pembelian','tanggal' ,date('Y'), '02', 'total') ?> },
      { label: "Maret", y: <?php echo cari_data_perbulan('pembelian','tanggal' ,date('Y'), '03', 'total') ?> },
      { label: "April",  y: <?php echo cari_data_perbulan('pembelian','tanggal' ,date('Y'), '04', 'total') ?> },
      { label: "Mei",  y: <?php echo cari_data_perbulan('pembelian','tanggal' ,date('Y'), '05', 'total') ?> },
      { label: "Juni",  y: <?php echo cari_data_perbulan('pembelian','tanggal' ,date('Y'), '06', 'total') ?> },
      { label: "Juli",  y: <?php echo cari_data_perbulan('pembelian','tanggal' ,date('Y'), '07', 'total') ?> },
      { label: "Agustus",  y: <?php echo cari_data_perbulan('pembelian','tanggal' ,date('Y'), '08', 'total') ?> },
      { label: "September",  y: <?php echo cari_data_perbulan('pembelian','tanggal' ,date('Y'), '09', 'total') ?> },
      { label: "Oktober",  y: <?php echo cari_data_perbulan('pembelian','tanggal' ,date('Y'), '10', 'total') ?> },
      { label: "November",  y: <?php echo cari_data_perbulan('pembelian','tanggal' ,date('Y'), '11', 'total') ?> },
      { label: "Desember",  y: <?php echo cari_data_perbulan('pembelian','tanggal' ,date('Y'), '12', 'total') ?> },
    ]
  },
  {
    type: "column",
    name: "Penjualan",
    axisYType: "secondary",
    showInLegend: true,
    yValueFormatString: "#,##0.# Trx",
    dataPoints: [
      { label: "Januari",  y: <?php echo cari_data_perbulan('penjualan','tanggal' ,date('Y'), '01', 'total') ?> },
      { label: "Februari", y: <?php echo cari_data_perbulan('penjualan','tanggal' ,date('Y'), '02', 'total') ?> },
      { label: "Maret", y: <?php echo cari_data_perbulan('penjualan','tanggal' ,date('Y'), '03', 'total') ?> },
      { label: "April",  y: <?php echo cari_data_perbulan('penjualan','tanggal' ,date('Y'), '04', 'total') ?> },
      { label: "Mei",  y: <?php echo cari_data_perbulan('penjualan','tanggal' ,date('Y'), '05', 'total') ?> },
      { label: "Juni",  y: <?php echo cari_data_perbulan('penjualan','tanggal' ,date('Y'), '06', 'total') ?> },
      { label: "Juli",  y: <?php echo cari_data_perbulan('penjualan','tanggal' ,date('Y'), '07', 'total') ?> },
      { label: "Agustus",  y: <?php echo cari_data_perbulan('penjualan','tanggal' ,date('Y'), '08', 'total') ?> },
      { label: "September",  y: <?php echo cari_data_perbulan('penjualan','tanggal' ,date('Y'), '09', 'total') ?> },
      { label: "Oktober",  y: <?php echo cari_data_perbulan('penjualan','tanggal' ,date('Y'), '10', 'total') ?> },
      { label: "November",  y: <?php echo cari_data_perbulan('penjualan','tanggal' ,date('Y'), '11', 'total') ?> },
      { label: "Desember",  y: <?php echo cari_data_perbulan('penjualan','tanggal' ,date('Y'), '12', 'total') ?> },
    ]
  }]
});
chart.render();

function toggleDataSeries(e) {
  if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
    e.dataSeries.visible = false;
  } else {
    e.dataSeries.visible = true;
  }
  e.chart.render();
}

}
</script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


<?php
//  } else {

//   echo '<iframe src="'.base_url('web/#about').'" style="width: 100%; height: 700px;"></iframe>';

// } 
?>

<script type="text/javascript">
    function jam() {
    var time = new Date(),
        hours = time.getHours(),
        minutes = time.getMinutes(),
        seconds = time.getSeconds();
    document.querySelectorAll('.jam')[0].innerHTML = harold(hours) + ":" + harold(minutes) + ":" + harold(seconds);
      
    function harold(standIn) {
        if (standIn < 10) {
          standIn = '0' + standIn
        }
        return standIn;
        }
    }
    setInterval(jam, 1000);
</script>