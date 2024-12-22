<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous">
    <link rel="stylesheet" href="/css/news.css">
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
                <a class="nav-link" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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

    <section id="newsPage">
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
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>
</html>
