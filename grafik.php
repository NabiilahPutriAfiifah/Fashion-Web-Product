<?php

require_once("function.php");

// Menampung pengembalian dari fungsi yang berupa array
$dataForChart = countDataForChart();


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fashion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script type="text/javascript" src="node_modules/chart.js/dist/chart.umd.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body background="img/bgblack2.jpg">
    <div class="container">
        <div class="header d-flex justify-content-between align-items-center">
            <h1>Fashion Product Grafik</h1>
            <a href="index.php" class="btn btn-outline-light me-1">Back</a>
        </div>
        <div class="row mt-4">
            <div style="width: 450px; height:450px;">
                <h4 class="mt-4 mx-4">Grafik polarArea</h4>
                <canvas id="myChart"></canvas>
            </div>
            <div style="width: 550px; height:400px;" class="ms-5 ps-4">
                <h4 class="mt-4 mx-4">Grafik Line</h4>
                <canvas id="myChart"></canvas>
            </div>
            <div class="borderbawah mb-3 border-bottom border-2 mt-5"></div>
            <div style="width: 450px; height:450px;">
                <h4 class="mt-4 mx-4">Grafik Pie</h4>
                <canvas id="myChart"></canvas>
            </div>
            <div style="width: 450px; height:450px;" class="ms-5 ps-4">
                <h4 class="mt-4 mx-4">Grafik Doughnut</h4>
                <canvas id="myChart"></canvas>
            </div>
            <div class="borderbawah mb-4 border-bottom border-2 mt-5 pt-5"></div>
            <div style="width: 500px; height:500px;">
                <h4 class="mt-4 mx-4">Grafik Bar</h4>
                <canvas id="myChart"></canvas>
            </div>
            <div style="width: 450px; height:450px;" class="ms-5 ps-4">
                <h4 class="mt-4 mx-4">Grafik Radar</h4>
                <canvas id="myChart"></canvas>
            </div>

            <script>
            var ctx = document.querySelectorAll("#myChart"); //menuliskan myChart itu adalah id dari object yang dibuat

            const dataSets = {
                labels: <?php echo json_encode($dataForChart['kategori']); ?>,
                datasets: [{
                    label: "Grafik Fashion Product",
                    data: <?php echo json_encode($dataForChart['jumlah']); ?>,
                    backgroundColor: [
                        'rgba(212, 175, 185, 0.5)',
                        'rgba(209, 207, 226, 0.5)',
                        'rgba(156, 173, 206, 0.5)',
                        'rgba(126, 196, 207, 0.5)',
                        'rgba(83, 178, 208, 0.5)',
                    ],
                    borderColor: [
                        'rgba(255,255,255,0.5)',
                        'rgba(255, 255, 255,0.5)',
                        'rgba(255, 255, 255,0.5)',
                        'rgba(255, 255, 255 ,0.5)',
                    ],
                    borderWidth: 2
                }]
            }



            // Array untuk tipe chart nya
            const typeChart = ["polarArea", "line", "pie", "doughnut", "bar", "radar"]
            const schart = (str) => {
                return {
                    type: str,
                    data: dataSets,
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                }
            }
            // Fungsi untuk melakukan pencetakan grafik ke elemen canvasnya
            const showChart = (() => {
                [...ctx].forEach((el, i) => {
                    new Chart(el.getContext("2d"), schart(typeChart[i]))
                });
            })();
            </script>
        </div>
    </div>
</body>

</html>