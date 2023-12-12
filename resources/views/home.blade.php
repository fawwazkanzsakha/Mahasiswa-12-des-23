@extends('layout.main')
@section('title', 'Dashboard')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                      <p class="card-title">Dashboard</p>
                      <div class="row mb-3">
                        <div class="col-md-7">
                          <div class="d-flex justify-content-between traffic-status">
                            <div class="item">
                              <p class="mb-">Fakultas</p>
                              <h5 class="font-weight-bold mb-0">{{count($fakultas)}}</h5>
                              <div class="color-border"></div>
                            </div>
                            <div class="item">
                              <p class="mb-">Prodi</p>
                              <h5 class="font-weight-bold mb-0">{{count($prodi)}}</h5>
                              <div class="color-border"></div>
                            </div>
                            <div class="item">
                              <p class="mb-">Mahasiswa</p>
                              <h5 class="font-weight-bold mb-0">{{count($mahasiswa)}}</h5>
                              <div class="color-border"></div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-5">
                          <ul class="nav nav-pills nav-pills-custom justify-content-md-end" id="pills-tab-custom" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="pills-home-tab-custom" data-toggle="pill" href="#pills-health" role="tab" aria-controls="pills-home" aria-selected="true">
                                Day
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="pills-profile-tab-custom" data-toggle="pill" href="#pills-career" role="tab" aria-controls="pills-profile" aria-selected="false">
                                Week
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="pills-contact-tab-custom" data-toggle="pill" href="#pills-music" role="tab" aria-controls="pills-contact" aria-selected="false">
                                Month
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      {{-- <canvas id="audience-chart" style="display: block; width: 428px; height: 214px;" width="428" height="214" class="chartjs-render-monitor"></canvas> --}}

                        <script src="https://code.highcharts.com/highcharts.js"></script>
                        <script src="https://code.highcharts.com/modules/exporting.js"></script>
                        <script src="https://code.highcharts.com/modules/export-data.js"></script>
                        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                        <div class="row mb-3">
                          <div class="col-md-6">
                            <figure class="highcharts-figure">
                                <div id="container"></div>
                            </figure>
                          </div>
                          <div class="col-md-6">
                            <figure class="highcharts-figure">
                                <div id="container_jk"></div>
                            </figure>
                          </div>
                          <div class="col-md-6">
                            <figure class="highcharts-figure">
                                <div id="container_jk_prodi"></div>
                            </figure>
                          </div>
                        </div>
                            <style>
                                .highcharts-figure,
                                .highcharts-data-table table {
                                    min-width: 310px;
                                    max-width: 800px;
                                    margin: 1em auto;
                                }

                                #container {
                                    height: 400px;
                                }

                                .highcharts-data-table table {
                                    font-family: Verdana, sans-serif;
                                    border-collapse: collapse;
                                    border: 1px solid #ebebeb;
                                    margin: 10px auto;
                                    text-align: center;
                                    width: 100%;
                                    max-width: 500px;
                                }

                                .highcharts-data-table caption {
                                    padding: 1em 0;
                                    font-size: 1.2em;
                                    color: #555;
                                }

                                .highcharts-data-table th {
                                    font-weight: 600;
                                    padding: 0.5em;
                                }

                                .highcharts-data-table td,
                                .highcharts-data-table th,
                                .highcharts-data-table caption {
                                    padding: 0.5em;
                                }

                                .highcharts-data-table thead tr,
                                .highcharts-data-table tr:nth-child(even) {
                                    background: #f8f8f8;
                                }

                                .highcharts-data-table tr:hover {
                                    background: #f1f7ff;
                                }

                            </style>
                            <script>
                                Highcharts.chart('container', {
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: 'Grafik Mahasiswa per program studi',
                                    align: 'left'
                                },
                                subtitle: {
                                    text:'',
                                    align: 'left'
                                },
                                xAxis: {
                                    categories: [
                                        @foreach ($grafik_mhs as $item)
                                            '{{$item->nama}}',
                                        @endforeach
                                    ],
                                    crosshair: true,
                                    accessibility: {
                                        description: ''
                                    }
                                },
                                yAxis: {
                                    min: 0,
                                    title: {
                                        text: 'Mahasiswa'
                                    }
                                },
                                tooltip: {
                                    valueSuffix: ' (orang)'
                                },
                                plotOptions: {
                                    column: {
                                        pointPadding: 0.2,
                                        borderWidth: 0
                                    }
                                },
                                series: [
                                    {
                                        name: 'Mahasiswa',
                                        data: [
                                            @foreach ($grafik_mhs as $item)
                                            {{$item->jumlah}},
                                            @endforeach
                                        ]
                                    }
                                ]
                            });
                            </script>
                            <script src="https://code.highcharts.com/highcharts.js"></script>
                            <script src="https://code.highcharts.com/modules/exporting.js"></script>
                            <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                            <div class="row mb-3">
                            <div class="col-md-6">
                            <figure class="highcharts-figure">
                                <div id="container1"></div>
                                <p class="highcharts-description">
                                    Pie charts are very popular for showing a compact overview of a
                                    composition or comparison. While they can be harder to read than
                                    column charts, they remain a popular choice for small datasets.
                                </p>
                            </figure>
                            </div>
                            </div>

                            <style>
                            .highcharts-figure,
                            .highcharts-data-table table {
                                min-width: 320px;
                                max-width: 800px;
                                margin: 1em auto;
                            }

                            .highcharts-data-table table {
                                font-family: Verdana, sans-serif;
                                border-collapse: collapse;
                                border: 1px solid #ebebeb;
                                margin: 10px auto;
                                text-align: center;
                                width: 100%;
                                max-width: 500px;
                            }

                            .highcharts-data-table caption {
                                padding: 1em 0;
                                font-size: 1.2em;
                                color: #555;
                            }

                            .highcharts-data-table th {
                                font-weight: 600;
                                padding: 0.5em;
                            }

                            .highcharts-data-table td,
                            .highcharts-data-table th,
                            .highcharts-data-table caption {
                                padding: 0.5em;
                            }

                            .highcharts-data-table thead tr,
                            .highcharts-data-table tr:nth-child(even) {
                                background: #f8f8f8;
                            }

                            .highcharts-data-table tr:hover {
                                background: #f1f7ff;
                            }

                            input[type="number"] {
                                min-width: 50px;
                            }
                            </style>

                            <script>
                              Highcharts.chart('container1', {
                              chart: {
                                  type: 'pie'
                              },
                              title: {
                                  text: 'Jenis Kelamin '
                              },
                              tooltip: {
                                  valueSuffix: '%'
                              },
                              subtitle: {
                                  text:
                                  'Source:<a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default">MDPI</a>'
                              },
                              plotOptions: {
                                  series: {
                                      allowPointSelect: true,
                                      cursor: 'pointer',
                                      dataLabels: [{
                                          enabled: true,
                                          distance: 20
                                      }, {
                                          enabled: true,
                                          distance: -40,
                                          format: '{point.percentage:.1f}%',
                                          style: {
                                              fontSize: '1.2em',
                                              textOutline: 'none',
                                              opacity: 0.7
                                          },
                                          filter: {
                                              operator: '>',
                                              property: 'percentage',
                                              value: 10
                                          }
                                      }]
                                  }
                              },
                              series: [
                                  {
                                      name: 'Percentage',
                                      colorByPoint: true,
                                      data: [
                                          @foreach($grafik_jk as $item)
                                            {
                                                name: '{{ $item->jk }}',
                                                y: {{ $item->jumlah }}
                                            },
                                          @endforeach
                                      ]
                                  }
                              ]
                          });
                    </script>

                     <script>
                                Highcharts.chart('container_jk_prodi', {
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: 'Grafik Mahasiswa per program studi',
                                    align: 'left'
                                },
                                subtitle: {
                                    text:'',
                                    align: 'left'
                                },
                                xAxis: {
                                    categories: [
                                        @foreach ($grafik_mhs as $item)
                                            '{{$item->nama}}',
                                        @endforeach
                                    ],
                                    crosshair: true,
                                    accessibility: {
                                        description: ''
                                    }
                                },
                                yAxis: {
                                    min: 0,
                                    title: {
                                        text: 'Mahasiswa'
                                    }
                                },
                                tooltip: {
                                    valueSuffix: ' (orang)'
                                },
                                plotOptions: {
                                    column: {
                                        pointPadding: 0.2,
                                        borderWidth: 0
                                    }
                                },
                                series: [
                                    {
                                        name: 'Laki',
                                        data: [
                                            @foreach ($grafik_jk_prodi as $item)
                                            {{$item->laki}},
                                            @endforeach
                                        ]
                                    },
                                    {
                                        name: 'Perempuan',
                                        data: [
                                            @foreach ($grafik_jk_prodi as $item)
                                            {{$item->perempuan}},
                                            @endforeach
                                        ]
                                    }
                                ]
                            });
                            </script>
                    </div>
                  </div>
                </div>
</div>
@endsection
