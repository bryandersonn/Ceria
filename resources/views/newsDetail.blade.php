<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News Detail</title>
    <link rel="stylesheet" href="/css/newsDetail.css">
</head>
<body>

    <section id="newsDetailPage">
        <div class="newsTitle">
            {{ $news->newsTitle }}
        </div>
        <div class="newsWriter">
            Writer: {{ $news->newsWriter }}
        </div>
        <div class="newsPublishDate">
            Published Date: {{ $news->newsPublishDate }}
        </div>
        <div class="newsImage">
            <img src="{{ $news->newsImage }}" alt="newsImage">
        </div>
        <div class="newsContent">
            {{ $news->newsContent }}
        </div>
        <div class="newsLink">
            <a href="{{ $news->newsLink }}" target="_blank">Read More</a>
        </div>
    </section>

</body>
</html>
