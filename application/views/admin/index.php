<?php
$div = array_unique(array_column($divisi, 'nama_divisi'));

?>

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <div class="row no-gutters align-items-center">
        <div class="col-auto">

        </div>
        <div class="col">
            <div class="progress progress-sm mr-2">
                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>


    <!-- Circle Buttons -->
    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="card-body">

                </div>

                <form action="<?= base_url('admin'); ?>" method="post">

                    <div class="row  mx-auto">
                        <label for="divisi" class="col-md-3 ">Nama Divisi</label>

                        <select required name="divisi" class="form-control-md col-md-8  " id="divisi" value="<?= set_value('divisi'); ?>">
                            <option selected="true" disabled="disabled">- Pilih divisi -</option>
                            <?php foreach ($div as $d) : ?>

                                <option value="<?= $d ?>"><?= $d ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="row mt-3 mx-auto ">
                        <label for="bagian" class="col-md-3 ">Nama Bagian</label>
                        <select required name="bagian" class="form-control-md col-md-8" id="bagian" value="<?= set_value('bagian'); ?>">
                            <option selected="true" disabled="disabled">- Pilih bagian -</option>

                        </select>
                    </div>

                    <div class="row mt-3 mx-auto">
                        <label for="tahun" class="col-md-3 ">Tahun</label>
                        <select name="tahun" class="form-control-md col-md-8" id="tahun">
                            <option selected="true" value="<?= date('Y'); ?>"><?= date('Y'); ?></option>
                            <option value="2018">- 2018 -</option>
                            <option value="2019">- 2019 -</option>
                            <option value="2020">- 2020 -</option>
                            <option value="2021">- 2021 -</option>
                            <option value="2022">- 2022 -</option>
                            <option value="2023">- 2023 -</option>
                            <option value="2024">- 2024 -</option>
                            <option value="2025">- 2025 -</option>

                        </select>
                    </div>



                    <div class="row col-md-7 offset-5 mt-5 float-right">
                        <button type="submit" class="btn btn-primary col-md-11 " name="cari" id="cari">OK</button>
                    </div>
            </div>
            </form>
        </div>
    </div>






    <!-- Area Chart 1 -->
    <div class="row mt-4 ml-3 mr-3">

        <div class="card shadow mb-4 col-md-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Aspek Produksi</h6>
            </div>
            <div class="card-body">
                <div id="produksiHigh"></div>


            </div>
        </div>

        <div class="card shadow mb-4 col-md-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Aspek Pemasaran</h6>
            </div>
            <div class="card-body">
                <div id="pemasaranHigh"></div>

            </div>
        </div>

        <div class="card shadow mb-4 col-md-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Aspek Keuangan & Akuntansi</h6>
            </div>
            <div class="card-body">
                <div id="keuanganHigh"></div>


            </div>
        </div>
    </div>

    <!-- Area Chart 2 -->
    <div class="row mt-4 ml-3 mr-3">

        <div class="card shadow mb-4 col-md-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Aspek SDM</h6>
            </div>
            <div class="card-body">
                <div id="sdmHigh"></div>


            </div>
        </div>

        <div class="card shadow mb-4 col-md-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Aspek Pengadaan</h6>
            </div>
            <div class="card-body">
                <div id="pengadaanHigh"></div>

            </div>
        </div>

        <div class="card shadow mb-4 col-md-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Aspek Hukum</h6>
            </div>
            <div class="card-body">
                <div id="hukumHigh"></div>


            </div>
        </div>
    </div>

    <!-- Area Chart -->
    <div class="row mt-4 ml-3 mr-3">

        <div class="card shadow mb-4 col-md-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Aspek Sistem Informasi</h6>
            </div>
            <div class="card-body">
                <div id="informasiHigh"></div>


            </div>
        </div>

        <div class="card shadow mb-4 col-md-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Aspek Pengembangan</h6>
            </div>
            <div class="card-body">
                <div id="pengembanganHigh"></div>

            </div>
        </div>

        <div class="card shadow mb-4 col-md-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Aspek Pengawasan </h6>
            </div>
            <div class="card-body">
                <div id="pengawasanHigh"></div>
                <hr>

            </div>
        </div>
    </div>

    <!-- Area Chart -->
    <div class="row mt-4 ml-3 mr-3">

        <div class="card shadow mb-4 col-md-4 offset-2 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Aspek Operasi</h6>
            </div>
            <div class="card-body">
                <div id="operasiHigh"></div>


            </div>
        </div>

        <div class="card shadow mb-4 col-md-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Aspek Engineering</h6>
            </div>
            <div class="card-body">
                <div id="engineeringHigh"></div>


            </div>
        </div>

    </div>





</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var myChart = Highcharts.chart('produksiHigh', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Aspek Produksi'
            },
            xAxis: {
                categories: ['Ekstrim', 'Tinggi', 'Moderat', 'Rendah', ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Persentase Aspek'
                }
            },
            tooltip: {
                valueSuffix: ' %'
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            series: [{
                name: 'Triwulan IV',
                data: [50, 30, 40, 70]
            }, {
                name: 'Triwulan III',
                data: [20, 0, 30, 20]
            }, {
                name: 'Triwulan II',
                data: [30, 40, 40, 20]
            }, {
                name: 'Triwulan I',
                data: [30, 40, 40, 20]
            }]
        });


        var myChart = Highcharts.chart('pemasaranHigh', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Aspek Pemasaran'
            },
            xAxis: {
                categories: ['Ekstrim', 'Tinggi', 'Moderat', 'Rendah', ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Persentase Aspek'
                }
            },
            tooltip: {
                valueSuffix: ' %'
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            series: [{
                name: 'Triwulan IV',
                data: [50, 30, 40, 70]
            }, {
                name: 'Triwulan III',
                data: [20, 0, 30, 20]
            }, {
                name: 'Triwulan II',
                data: [30, 40, 40, 20]
            }, {
                name: 'Triwulan I',
                data: [30, 40, 40, 20]
            }]
        });

        var myChart = Highcharts.chart('keuanganHigh', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Aspek Keuangan dan Akuntansi'
            },
            xAxis: {
                categories: ['Ekstrim', 'Tinggi', 'Moderat', 'Rendah', ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Persentase Aspek'
                }
            },
            tooltip: {
                valueSuffix: ' %'
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            series: [{
                name: 'Triwulan IV',
                data: [50, 30, 40, 70]
            }, {
                name: 'Triwulan III',
                data: [20, 0, 30, 20]
            }, {
                name: 'Triwulan II',
                data: [30, 40, 40, 20]
            }, {
                name: 'Triwulan I',
                data: [30, 40, 40, 20]
            }]
        });

        var myChart = Highcharts.chart('sdmHigh', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Aspek SDM'
            },
            xAxis: {
                categories: ['Ekstrim', 'Tinggi', 'Moderat', 'Rendah', ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Persentase Aspek'
                }
            },
            tooltip: {
                valueSuffix: ' %'
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            series: [{
                name: 'Triwulan IV',
                data: [50, 30, 40, 70]
            }, {
                name: 'Triwulan III',
                data: [20, 0, 30, 20]
            }, {
                name: 'Triwulan II',
                data: [30, 40, 40, 20]
            }, {
                name: 'Triwulan I',
                data: [30, 40, 40, 20]
            }]
        });

        var myChart = Highcharts.chart('pengadaanHigh', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Aspek Pengadaan'
            },
            xAxis: {
                categories: ['Ekstrim', 'Tinggi', 'Moderat', 'Rendah', ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Persentase Aspek'
                }
            },
            tooltip: {
                valueSuffix: ' %'
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            series: [{
                name: 'Triwulan IV',
                data: [50, 30, 40, 70]
            }, {
                name: 'Triwulan III',
                data: [20, 0, 30, 20]
            }, {
                name: 'Triwulan II',
                data: [30, 40, 40, 20]
            }, {
                name: 'Triwulan I',
                data: [30, 40, 40, 20]
            }]
        });

        var myChart = Highcharts.chart('hukumHigh', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Aspek Hukum'
            },
            xAxis: {
                categories: ['Ekstrim', 'Tinggi', 'Moderat', 'Rendah', ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Persentase Aspek'
                }
            },
            tooltip: {
                valueSuffix: ' %'
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            series: [{
                name: 'Triwulan IV',
                data: [50, 30, 40, 70]
            }, {
                name: 'Triwulan III',
                data: [20, 0, 30, 20]
            }, {
                name: 'Triwulan II',
                data: [30, 40, 40, 20]
            }, {
                name: 'Triwulan I',
                data: [30, 40, 40, 20]
            }]
        });

        var myChart = Highcharts.chart('informasiHigh', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Aspek Sistem Informasi'
            },
            xAxis: {
                categories: ['Ekstrim', 'Tinggi', 'Moderat', 'Rendah', ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Persentase Aspek'
                }
            },
            tooltip: {
                valueSuffix: ' %'
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            series: [{
                name: 'Triwulan IV',
                data: [50, 30, 40, 70]
            }, {
                name: 'Triwulan III',
                data: [20, 0, 30, 20]
            }, {
                name: 'Triwulan II',
                data: [30, 40, 40, 20]
            }, {
                name: 'Triwulan I',
                data: [30, 40, 40, 20]
            }]
        });

        var myChart = Highcharts.chart('pengembanganHigh', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Aspek Pengembangan'
            },
            xAxis: {
                categories: ['Ekstrim', 'Tinggi', 'Moderat', 'Rendah', ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Persentase Aspek'
                }
            },
            tooltip: {
                valueSuffix: ' %'
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            series: [{
                name: 'Triwulan IV',
                data: [50, 30, 40, 70]
            }, {
                name: 'Triwulan III',
                data: [20, 0, 30, 20]
            }, {
                name: 'Triwulan II',
                data: [30, 40, 40, 20]
            }, {
                name: 'Triwulan I',
                data: [30, 40, 40, 20]
            }]
        });

        var myChart = Highcharts.chart('pengawasanHigh', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Aspek Pengawasan'
            },
            xAxis: {
                categories: ['Ekstrim', 'Tinggi', 'Moderat', 'Rendah', ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Persentase Aspek'
                }
            },
            tooltip: {
                valueSuffix: ' %'
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            series: [{
                name: 'Triwulan IV',
                data: [50, 30, 40, 70]
            }, {
                name: 'Triwulan III',
                data: [20, 0, 30, 20]
            }, {
                name: 'Triwulan II',
                data: [30, 40, 40, 20]
            }, {
                name: 'Triwulan I',
                data: [30, 40, 40, 20]
            }]
        });

        var myChart = Highcharts.chart('operasiHigh', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Aspek Operasi'
            },
            xAxis: {
                categories: ['Ekstrim', 'Tinggi', 'Moderat', 'Rendah', ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Persentase Aspek'
                }
            },
            tooltip: {
                valueSuffix: ' %'
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            series: [{
                name: 'Triwulan IV',
                data: [50, 30, 40, 70]
            }, {
                name: 'Triwulan III',
                data: [20, 0, 30, 20]
            }, {
                name: 'Triwulan II',
                data: [30, 40, 40, 20]
            }, {
                name: 'Triwulan I',
                data: [30, 40, 40, 20]
            }]
        });

        var myChart = Highcharts.chart('engineeringHigh', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Aspek Engineering'
            },
            xAxis: {
                categories: ['Ekstrim', 'Tinggi', 'Moderat', 'Rendah', ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Persentase Aspek'
                }
            },
            tooltip: {
                valueSuffix: ' %'
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            series: [{
                name: 'Triwulan IV',
                data: [50, 30, 40, 70]
            }, {
                name: 'Triwulan III',
                data: [20, 0, 30, 20]
            }, {
                name: 'Triwulan II',
                data: [30, 40, 40, 20]
            }, {
                name: 'Triwulan I',
                data: [30, 40, 40, 20]
            }]
        });

    });
</script>