<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ceria</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous">
    <link rel="stylesheet" href="/css/homeProblem.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>

    <nav id="navigationbar" class="navbar navbar-expand-lg sticky-top p-1">
        <div class="container-fluid gap-5">
          <a class="navbar-brand text-white m-0" aria-current="page" href="/"><img class="tw-w-20" src="/assets/cerialogo.png" alt="Ceria"></a>
          <button class="navbar-toggler tw-border-white tw-text-sky-400 tw-bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-5">
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="/">Beranda</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Masalah
                </a>
                <ul class="dropdown-menu">
                    @foreach ($allProblems as $ap)
                        <li><a class="dropdown-item"
                                onclick="window.location.href='{{ route('problemRedirect', ['id' => $ap->problemID]) }}'">{{ $ap->problemName }}</a>
                        </li>
                    @endforeach
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="/news">Berita</a>
              </li>
            </ul>
            <form id="searchbar" class="d-flex" role="search" action="/search" method="GET">
              <input class="form-control me-2" type="search" placeholder="Cari Berita" aria-label="Search" name="query">
              <button class="btn btn-outline-success" type="submit">Cari</button>
            </form>
          </div>
        </div>
    </nav>

    <main>
        <section id="aboutCeria" class="tw-justify-center tw-flex">
            <div id="ceriaText" class="tw-justify-center align-content-center w-50">
                <h1>Ceria</h1>
                <p>CERIA adalah platform informatif untuk memahami tantangan iklim di sektor industri Indonesia.
                Temukan wawasan berbasis data, berita terkini, dan solusi nyata untuk mendorong kesadaran dan praktik berkelanjutan demi masa depan yang lebih hijau.</p>
                <div class="tw-flex-wrap tw-text-center mt-5">
                    <a href="#carousel"><button type="button" class="btn btn-outline-light">Berita Terkini</button></a>
                </div>
            </div>
        </section>

        <div class="vital-signs">
            <div class="header tw-justify-center tw-flex">
                <h1>TANDA-TANDA VITAL</h1>
                <p class="tw-text-sky-400">(via NASA)</p>
            </div>
            <div class="items">
                <div class="item">
                    <div class="itemlabel">
                        <h3>Karbon Dioksida</h3>
                    </div>
                    <div class="value up">
                        <span>↑</span>424<span class="unit">bagian per miliar</span>
                    </div>
                    <div class="hover-bar"></div>
                </div>
                <div class="item">
                    <h3>Suhu Global</h3>
                    <div class="value up">
                        <span>↑</span>1.4<span class="unit">°C sejak praindustri</span>
                    </div>
                    <div class="hover-bar"></div>
                </div>
                <div class="item">
                    <h3>Gas Metana</h3>
                    <div class="value up">
                        <span>↑</span>1922<span class="unit">bagian per miliar</span>
                    </div>
                    <div class="hover-bar"></div>
                </div>
                <div class="item">
                    <h3>Lapisan Es</h3>
                    <div class="value down">
                        <span>↓</span>406<span class="unit">miliar metrik ton per tahun</span>
                    </div>
                    <div class="hover-bar" id="down-hover"></div>
                </div>
            </div>
        </div>

        <section id="tempGraphic">
            <div style="width: 80%; margin: 0 auto;">
                <h1 class="tw-text-sky-400">Global Land-Ocean Temperature Index</h1>
                <p class="tw-text-gray-400">Dilansir dari: NASA's Goddard Institute for Space Studies (GISS). Credit: NASA/GISS</p>
                <p>Grafik Lowess menunjukkan tren suhu global yang dihaluskan, mengungkapkan pola jangka panjang. Data menunjukkan peningkatan suhu yang stabil sejak awal abad ke-20, dengan percepatan pemanasan yang signifikan dalam beberapa dekade terakhir, mencerminkan dampak perubahan iklim khususnya pada 10 tahun terakhir.</p>
                <a href="https://data.giss.nasa.gov/gistemp/graphs/graph_data/Global_Mean_Estimates_based_on_Land_and_Ocean_Data/graph.txt"><button type="button" class="btn btn-outline-info">Dataset</button></a>
                <canvas id="temperatureChart"></canvas>
            </div>
        </section>

        <section id="concentrationGraphic">
            <div style="width: 80%; margin: 0 auto;">
                <h1 class="tw-text-red-600">Tingkat Konsentrasi CO2 di Atmosfer (2011-2022*)</h1>
                <p class="tw-text-gray-400">Dilansir dari: databok's Konsentrasi CO2 di Atmosfer Terus Naik, Ini Rinciannya. Credit: Monavia Ayu Rizaty</p>
                <p>Menurut data Badan Penerbangan dan Antariksa Amerika Serikat (NASA), tingkat konsentrasi karbon dioksida (CO2) di atmosfer global sudah mencapai rata-rata 417,6 part per million (ppm) pada 17 Mei 2022.
                Angka tersebut sudah naik sekitar 6,2% dibanding tahun 2011. Peningkatan itu  juga konsisten terjadi setiap tahun, seperti terlihat pada grafik.</p>
                <a href="https://databoks.katadata.co.id/demografi/statistik/9232a4932fdbb34/konsentrasi-co2-di-atmosfer-terus-naik-ini-rinciannya"><button type="button" class="btn btn-outline-danger">Dataset</button></a>
                <canvas id="concentrationChart"></canvas>
            </div>
        </section>

        <section id="carousel" class="tw-h-screen tw-content-center">
            <div class="tw-flex-wrap align-content-center justify-center justify-content-center">
                <div id="carouseltitle">
                    <h1>Berita Terkini</h1>
                </div>
                <div id="carouselExampleCaptions" class="carousel slide col-md-8 col-sm-12 mx-auto" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach ($news as $n)
                            @if ($loop->first)
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $loop->index }}" class="active" aria-current="true" aria-label="Slide {{ $n->newsID }}"></button>
                            @else
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $loop->index }}" aria-label="Slide {{ $n->newsID }}"></button>
                            @endif
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($news as $n)
                            @if ($loop->first)
                                <div class="carousel-item active">
                                    <a href="{{ $n->newsLink }}" target="_blank">
                                        <img src="{{ $n->newsImage }}" class="d-block w-100 tw-rounded-lg" alt="..." height="500">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>{{ $n->newsTitle }}</h5>
                                        </div>
                                    </a>
                                </div>
                            @else
                                <div class="carousel-item">
                                    <a href="{{ $n->newsLink }}" target="_blank">
                                        <img src="{{ $n->newsImage }}" class="d-block w-100 tw-rounded-lg" alt="..." height="500">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>{{ $n->newsTitle }}</h5>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @if ($news && count($news) > 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    @endif
                </div>
                <div class="tw-flex-wrap tw-text-center mt-5">
                    <a href="#problemSection"><button type="button" class="btn btn-outline-light">Masalah yang dihadapi</button></a>
                </div>
            </div>
        </section>

          <br>

        <section id="problemSection" class="tw-bg-white tw-content-center">
            <div class="tw-flex-wrap align-content-center justify-center justify-content-center">
                <div class="tw-justify-center tw-flex tw-text-black">
                    <h1>Permasalahan Iklim</h1>
                </div>
                <div id="headerdesc" class="tw-justify-center tw-flex tw-text-black tw-mb-5">
                    <p>Pelajari permasalahan iklim akibat industri, khususnya di Indonesia:</p>
                </div>
                <section id="problems">
                    @foreach ($problem as $p)
                        <div class="problemCard">
                           <a  onclick="window.location.href='{{ route('problemRedirect', ['id' => $p->problemID]) }}'">
                                <h4>{{ $p->problemName }}</h4>
                                <img src="{{ $p->problemImage }}" alt="" width="100" height="100">
                                <h6>{{ $p->problemShortDescription }}</h6>
                            </a>
                        </div>
                    @endforeach
                </section>
            </div>
        </section>
    </main>

    <script>
        const tempData = @json($temp);
        const tempYears = tempData.map(item => item.year);
        const noSmoothing = tempData.map(item => item.no_smoothing);
        const lowess = tempData.map(item => item.lowess);

        const tempCtx = document.getElementById('temperatureChart').getContext('2d');
        const tempChart = new Chart(tempCtx, {
            type: 'line',
            data: {
                labels: tempYears,
                datasets: [
                    // {
                    //     label: 'No Smoothing',
                    //     data: noSmoothing,
                    //     borderColor: 'rgba(255, 99, 132, 1)',
                    //     borderWidth: 2,
                    //     fill: false,
                    // },
                    {
                        label: 'Lowess Smoothing',
                        data: lowess,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        fill: false,
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Year',
                        },
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Temperature Anomaly (°C)',
                        },
                    }
                }
            }
        });
    </script>

    <script>
        const concentrationData = @json($concentration);
        const concentrationYears = concentrationData.map(item => item.year);
        const concentration = concentrationData.map(item => item.concentration);

        const concentrationCtx = document.getElementById('concentrationChart').getContext('2d');
        const concentrationChart = new Chart(concentrationCtx, {
            type: 'line',
            data: {
                labels: concentrationYears,
                datasets: [
                    {
                        label: 'CO2 Concentration',
                        data: concentration,
                        borderColor: 'red',
                        borderWidth: 2,
                        fill: false,
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Year',
                        },
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'ppm',
                        },
                    }
                }
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html>
