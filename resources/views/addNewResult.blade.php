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
                <h1>Add New Result</h1>
            </div>
            <div class="row col-md-4">
                    <form class="row g-3" method="post" action="/create" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Select Polling Unit</label>
                            <select name="pollingUnit" id="pollingUnit" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option value="">Select Polling Unit</option>
                                @foreach ($dataPollingUnit as $pollingUnit)
                                    <option value="{{$pollingUnit->uniqueid}}">
                                        {{$pollingUnit->polling_unit_name}}
                                       -----
                                        {{$pollingUnit->polling_unit_number}}
                                    </option>
                                @endforeach
                            </select>
                          </div>

                          <div class="mb-3">
                            <label for="party" class="form-label">Select Party</label>
                            <select name="party" id="party" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option value="">Select Party</option>
                                @foreach ($dataParty as $party)
                                    <option value="{{$party->partyid}}">
                                        {{$party->partyname}}
                                    </option>
                                @endforeach
                            </select>
                          </div>

                          <div class="mb-3">
                            <label for="scores" class="form-label">Enter Score</label>
                            <input type="text" class="form-control" name="scores" id="scores" placeholder="Enter Score">
                          </div>

                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Entered By</label>
                            <input type="test" class="form-control" name="enteredby" id="enteredby" placeholder="Enter your name">
                          </div>
                         
                    <div class="col-auto">
                      <button type="submit" class="btn btn-primary mb-3">Add New</button>
                    </div>
                  </form>

               
            </div>
           
        </div>
    </body>
</html>
