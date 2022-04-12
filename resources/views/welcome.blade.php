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
            <div class="row col-md-6">
                    <form class="row g-3" method="post" action="/filter_by_polling_unit" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="col-auto">
                      
                        <select name="pollingUnit" id="pollingUnit" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option value="">Select Polling Unit</option>
                            @foreach ($dataPollingUnit as $pollingUnit)
                                <option value="{{$pollingUnit->polling_unit_number}}">
                                    {{$pollingUnit->polling_unit_name}}
                                   -----
                                    {{$pollingUnit->polling_unit_number}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                      <button type="submit" class="btn btn-primary mb-3">Search</button>
                    </div>
                  </form>

                  <div class="col-auto">
                    <form class="row g-3" method="post" action="/view-result-by-lga" enctype="multipart/form-data">
                      {{ csrf_field() }}
                  <div class="col-auto">
                    
                      <select name="lga_id" id="pollingUnit" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                          <option value="">Select LGA</option>
                          @foreach($dataLga as $Lga)
                              <option value="{{$Lga->lga_id}}">{{$Lga->lga_name}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Search By LGA</button>
                  </div>
                 
                </form>
                  </div>

                  <div class="col-auto">
                    <a href="/add" class="btn btn-primary mb-3">Add Result</a>
                  </div>
               
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
