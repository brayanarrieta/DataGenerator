<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DataGenerator</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
    </head>
    <body>
        <main class="container">
            <h1 class="text-center">DataGenerator</h1>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Route</td>
                            <td>Method</td>
                            <td>Description</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>localhost:8000/weather</td>
                            <td>GET</td>
                            <td>Get information of the climate on 2017</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>localhost:8000/montlyProduction</td>
                            <td>GET</td>
                            <td>Get information of panels production</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
