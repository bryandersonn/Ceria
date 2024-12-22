<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ceria</title>
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

        {{-- <section id="news">
            @foreach ($news as $n)
            <a href="/newsDetail/{{ $n->newsID }}" target="_blank">
                <div class="newsContainer">
                    <div class="newsContainerLeft">
                        <div class="newsContainerLeftTop"> <b>{{ $n->newsTitle }}</b>  </div>
                        <div class="newsContainerLeftRight"> {{ $n->newsPublishDate }} </div>
                    </div>
                    <div class="newsContainerRight">
                        <img src="{{ $n->newsImage }}" alt="newsImages" class="newsImages">
                    </div>
                </div>
                </a>
            <br>
            @endforeach
        </section> --}}


        <section id="problemSection" class="tw-bg-white tw-h-screen tw-content-center">
            <div class="tw-flex-wrap align-content-center justify-center justify-content-center">
                <div class="tw-justify-center tw-flex tw-text-black">
                    <h1>Permasalahan Iklim</h1>
                </div>
                <div class="tw-justify-center tw-flex tw-text-black">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html>
