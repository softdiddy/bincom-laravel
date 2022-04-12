<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bincom Test App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row mt-5">
                <h1>Polling Unit Result</h1>
            </div>
            <div class="row col-md-3">
                <a href="/"  class="btn btn-primary mb-3">Back</a>
               
            </div>
            <div class="row">
              <div class="col">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Polling Unit</th>
                            <th scope="col">Polling Unit Number</th>
                            <th scope="col">Party Abbreviation</th>
                            <th scope="col">Party Score</th>
                 
                          </tr>
                        </thead>
                        <tbody>
                          
                        @foreach ($dataResult as $data)
                        <tr>
                            <th scope="row">{{$sn++}}</th>
                            <td>{{$data->polling_unit_name}}</td>
                            <td>{{$data->polling_unit_number}}</td>
                            <td>{{$data->party_abbreviation}}</td>
                            <td>{{$data->party_score}}</td>
                           
                    
                            
                          </tr>
                         
                         
                        @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </body>
</html>
