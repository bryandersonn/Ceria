<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $problem->problemName }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/homeProblem.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <style>
        .problem-header {
            background: url('{{ asset($problem->problemImage) }}') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 100px 0;
            text-align: center;
            position: relative;
        }
    </style>
    @vite('resources/css/app.css')
</head>

<body>
    <nav id="navigationbar" class="navbar navbar-expand-lg sticky-top p-1">
        <div class="container-fluid gap-5">
          <a class="navbar-brand text-white m-0" aria-current="page" href="/"><img class="tw-w-20" src="/assets/cerialogo.png" alt="Ceria"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-5">
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Problems
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

            <form class="d-flex" role="search" action="/search" method="GET">
              <input class="form-control me-2" type="search" placeholder="Search News" aria-label="Search" name="query">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
    </nav>

    <!-- Problem Header -->
    <div class="problem-header">
        <div class="problem-header-overlay"></div>
        <div class="container position-relative">
            <h1 class="display-4 fw-bold">{{ $problem->problemName }}</h1>
            <p class="lead">{{ $problem->problemShortDescription }}</p>
        </div>
    </div>

    <!-- Overview Section -->
    <div class="section-light py-5">
        <div class="container no-margin">
            <div class="row d-flex justify-content-start">
                <div class="col-6 offset-0 justify-text">
                    <h2>Overview</h2>
                    <p>{{ $problem->problemContent }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Evidence Section -->
    <div class="section-dark py-5">
        <div class="container no-margin">
            <div class="row d-flex justify-content-end">
                <div class="col-6 offset-6 text-right justify-text">
                    <h2>Evidence</h2>
                    <p>{{ $problem->evidence }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Effects Section -->
    <div class="section-light py-5">
        <div class="container no-margin">
            <div class="row d-flex justify-content-start">
                <div class="col-6 offset-0 justify-text">
                    <h2>Effects</h2>
                    <p>{{ $problem->effects }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Causes Section -->
    <div class="section-dark py-5">
        <div class="container no-margin">
            <div class="row d-flex justify-content-end">
                <div class="col-6 offset-6 text-right justify-text">
                    <h2>Causes</h2>
                    <p>{{ $problem->causes }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Solution Section -->
    <div class="section-light py-5">
        <div class="container no-margin">
            <div class="row d-flex justify-content-start">
                <div class="col-6 offset-0 justify-text">
                    <h2>Solution</h2>
                    <p>{{ $problem->solutions }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Keep Exploring Section -->
    <div class="keep-exploring bg-light py-5">
        <div class="container">
            <h3 class="mb-4">Keep Exploring</h3>
            <div class="row">
                @foreach ($allProblems as $ap)
                    @if ($ap->problemID !== $problem->problemID)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset($ap->problemImage) }}" class="card-img-top"
                                    alt="{{ $ap->problemName }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $ap->problemName }}</h5>
                                    <p class="card-text">{{ $ap->problemShortDescription }}</p>
                                    <a href="{{ route('problemRedirect', ['id' => $ap->problemID]) }}"
                                        class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
