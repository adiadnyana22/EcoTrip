<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoInsight Detail Content</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap');

        :root {
            font-family: DM Sans;
            font-weight: 400;
        }

        body {
            line-height: 1.8;
            text-align: justify;
            padding: 0;
            margin: 0;
        }
    </style>
</head>
<body>
    {!! $insight->content !!}
</body>
</html>