<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kategori - EnyMart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #fff1f5;
            color: #3b2631;
        }

        .navbar {
            background: #fff0f5;
            padding: 17px 0;
            box-shadow: 0 3px 15px rgba(0,0,0,.05);
        }

        .navbar-brand {
            color: #873e61;
            font-size: 26px;
            font-weight: 800;
        }

        .nav-link {
            color: #59434d;
            font-weight: 500;
            margin: 0 8px;
        }

        .nav-link:hover {
            color: #a44f76;
        }

        .btn-pink {
            background: #b86c8a;
            color: white;
            border: none;
            border-radius: 25px;
            padding: 10px 23px;
            font-weight: 600;
        }

        .btn-pink:hover {
            background: #873e61;
            color: white;
        }

        /* BANNER */
        .banner {
            background: linear-gradient(120deg, #f9e3eb, #fff0f4);
            padding: 75px 0;
            text-align: center;
            border-radius: 0 0 45px 45px;
        }

        .banner h1 {
            font-size: 43px;
            font-weight: 800;
            color: #3b2631;
        }

        .banner h1 span {
            color: #873e61;
        }

        .banner p {
            color: #735d67;
            margin-top: 15px;
        }

        /* KATEGORI */
        .section-title {
            font-weight: 800;
            color: #3b2631;
        }

        .category-card {
            background: #fff0f5;
            border-radius: 20px;
            overflow: hidden;
            height: 100%;
            box-shadow: 0 5px 20px rgba(0,0,0,.05);
            transition: .3s;
        }

        .category-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(135,62,97,.14);
        }

        .category-img {
            width: 100%;
            height: 245px;
            object-fit: cover;
            display: block;
        }

        .category-info {
            padding: 20px;
            text-align: center;
        }

        .category-info h5 {
            font-size: 17px;
            font-weight: 700;
            color: #49303c;
            margin-bottom: 14px;
        }

        .category-info a {
            display: block;
            text-decoration: none;
        }

        .category-number {
            color: #873e61;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .empty-box {
            background: #fff0f5;
            border-radius: 20px;
            padding: 50px 20px;
            text-align: center;
        }

        /* FOOTER */
        footer {
            background: #4a2939;
            color: white;
            padding: 45px 0 20px;
            margin-top: 70px;
        }

        footer h4 {
            color: #f1d6df;
            font-weight: 800;
        }

        footer p {
            color: #eadde2;
            font-size: 14px;
        }

        @media(max-width: 768px) {
            .banner h1 {
                font-size: 31px;
            }

            .category-img {
                height: 190px;
            }
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">

        <a class="navbar-brand text-decoration-none"
           href="{{ route('home') }}">
            ♡ EnyMart
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button