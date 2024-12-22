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
    <link rel="stylesheet" href="/css/carousel.css">
    <link rel="stylesheet" href="/css/homeProblem.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Ceria</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Problems
                </a>
                <ul class="dropdown-menu">
                    @foreach ($problem as $p)
                        <li><a class="dropdown-item" onclick="window.location.href='{{ route('category.action', ['id' => $p->problemID]) }}'">{{ $p->problemName }}</a></li>
                    @endforeach
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/news">News</a>
              </li>
            </ul>
            <form class="d-flex" role="search" action="/search" method="GET">
              <input class="form-control me-2" type="search" placeholder="Search News" aria-label="Search" name="query">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
    </nav>

    <main>
        <section id="aboutCeria">
            <h1>ABOUT REGION</h1>
        </section>

        <section id="statistics">
            <h1>STATISTICS REGION</h1>
        </section>

          {{-- <br><br><br><br><br><br> --}}
        <section id="carousel">
            <div id="carouselExampleCaptions" class="carousel slide yes" data-bs-ride="true">
                <div class="carousel-indicators">
                  {{-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button> --}}

                  @foreach ($news as $n)
                  @if ($loop->first == true)
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $loop->index }}" class="active" aria-current="true" aria-label="Slide {{ $n->newsID }}"></button>
                  @else
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $loop->index }}" aria-current="true" aria-label="Slide {{ $n->newsID }}"></button>
                  @endif
                  @endforeach
                </div>
                <div class="carousel-inner">
                  {{-- <div class="carousel-item active">
                    <a href="https://kompas.com" target="_blank">
                        <img src="https://cdn.discordapp.com/attachments/1210865303903539220/1307715786223386644/image.png?ex=673b50bb&is=6739ff3b&hm=207c28f18475af9181ba5bcbde19bf4c61a3e65b9b9fcf779d884c7a124eeecb&" class="d-block w-100" alt="..." height="500">
                        <div class="carousel-caption d-none d-md-block">
                          <h5>First slide label</h5>
                          <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </a>
                  </div> --}}
                  @foreach ($news as $n)
                  @if ($loop->first == true)
                  <div class="carousel-item active">
                    <a href="{{ $n->newsLink }}" target="_blank">
                        <img src="{{ $n->newsImage }}" class="d-block w-100" alt="..." height="500">
                        <div class="carousel-caption d-none d-md-block">
                          <h5>{{ $n->newsTitle }}</h5>
                          <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </a>
                  </div>
                  @else
                  <div class="carousel-item">
                    <a href="{{ $n->newsLink }}" target="_blank">
                        <img src="{{ $n->newsImage }}" class="d-block w-100" alt="..." height="500">
                        <div class="carousel-caption d-none d-md-block">
                          <h5>{{ $n->newsTitle }}</h5>
                          <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </a>
                  </div>
                  @endif

                  @endforeach
                  {{-- <div class="carousel-item">
                    <img src="https://i.ytimg.com/vi/q2l_E7Xez5s/maxresdefault.jpg" class="d-block w-100" alt="..." height="500">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Second slide label</h5>
                      <p>Some representative placeholder content for the second slide.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="https://fiverr-res.cloudinary.com/videos/t_main1,q_auto,f_auto/b9jc5w2pb69izpsqcuhg/create-a-cute-animated-bongo-cat-league-mascot-dc1c.png" class="d-block w-100" alt="..." height="500">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Third slide label</h5>
                      <p>Some representative placeholder content for the third slide.</p>
                    </div> --}}
                  </div>
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
        </section>

          <br>

        <section id="problems">
            @foreach ($problem as $p)
                <div class="problemCard">
                    <h4>{{ $p->problemName }}</h4>
                    <img src="{{ $p->problemImage }}" alt="" width="100" height="100">
                    <h6>{{ $p->problemShortDescription }}</h6>
                </div>
            @endforeach
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html>
