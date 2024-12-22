<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News Detail</title>
    <link rel="stylesheet" href="/css/newsDetail.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
</head>
<body>

    <section id="newsDetailPage">
        <div class="newsDetailLeft">
            <div class="newsDetailLeftContainer">
                <div class="newsDetailLeftItem" id="newsWriter">
                    {{ $news->newsWriter }}
                </div>
                <div class="newsDetailLeftItem" id="newsPublishDate">
                    {{ $news->newsPublishDate }}
                </div>

                <div class="newsDetailLeftItem" id="newsProblemName">
                    {{ $problem->problemName }}
                </div>
                <div id="newsLink">
                    <button onclick="window.open('{{ $news->newsLink }}', '_blank')">Baca Lebih Lanjut</button>
                    <button onclick="window.location.href = '/'">Kembali ke Halaman Utama</button>
                </div>
            </div>
        </div>
        <div class="newsDetailRight">
            <div class="newsTitle">
                {{ $news->newsTitle }}
            </div>
            <div class="newsImage">
                <img src="{{ $news->newsImage }}" alt="newsImage">
            </div>
            <div class="newsContent">
                {{ $news->newsContent }}
            </div>
        </div>
    </section>

</body>
</html>
