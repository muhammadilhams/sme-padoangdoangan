<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/x-icon" href="{{ asset('images/smart-sme-icon-logo.png') }}" />
    <title>@yield('title') - Smart SME </title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/e8ef651967.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')

</head>

<body>
    <style>
        .background-radial-gradient {
            background-color: hsl(210, 2%, 61%);
            background-image:
                /* radial-gradient(650px circle at 0% 0%,
            hsl(152, 41%, 35%) 15%,
            hsl(152, 41%, 30%) 35%,
            hsl(152, 41%, 20%) 75%,
            hsl(152, 41%, 19%) 80%,
            transparent 100%), */
                radial-gradient(1250px circle at 100% 100%,
                    hsl(152, 41%, 45%) 15%,
                    hsl(152, 41%, 30%) 35%,
                    hsl(151, 40%, 24%) 75%,
                    hsl(151, 43%, 31%) 80%,
                    transparent 100%);
        }

        .bg-glass {
            background-color: hsla(0, 0%, 100%, 0.9) !important;
            backdrop-filter: saturate(200%) blur(25px);
        }
    </style>


    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
