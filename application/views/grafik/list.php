<?php
foreach ($data as $data) {
    $nama_barang[] = $data->nama_barang;
    $total_beli[] = $data->total_beli;
}
?>
<div class="chart-container" style="position: relative; height:40vh; width:80vw">
    <canvas id="myChart"></canvas>
</div>
<script src="<?php echo base_url() ?>assets/Chart.min.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        data: {
            labels:<?php echo json_encode($nama_barang) ?>,
            datasets: [{
                    label: "Grafik Laporan Penjualan",
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data:<?php echo json_encode($total_beli) ?>,
                }]

        },
        options: {
            layout: {
                padding: {
                    left: 50,
                    right: 0,
                    top: 0,
                    bottom: 0
                }
            }


        }

        // Configuration options go here
    });

</script>
