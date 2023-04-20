<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Agent Dashboard</title>
</head>

<body>

    <div class="text-center pt-2" style="background-color: #e3f2fd; height : 50px; ">
        <h4>{{ $user->name }}'s Dashboard</h4>
    </div>

    <div class="container mt-3">
        <div class="row mt-5">

            <h5 class="text-center">This month</h5>
            <hr>

            <div class="col">
                <p>Opening</p>
            </div>
            <div class="col">
                <p>Assurance</p>
            </div>
            <div class="col">
                <p>Apologies</p>
            </div>
            <div class="col">
                <p>Resolution</p>
            </div>
            <div class="col">
                <p>Querry</p>
            </div>
            <div class="col">
                <p>Closing</p>
            </div>

            <div class="row mt-5">
                
                <h5 class="text-center">This Week</h5>
                <hr>

                <div class="col">
                    <p>Opening</p>
                </div>
                <div class="col">
                    <p>Assurance</p>
                </div>
                <div class="col">
                    <p>Apologies</p>
                </div>
                <div class="col">
                    <p>Resolution</p>
                </div>
                <div class="col">
                    <p>Querry</p>
                </div>
                <div class="col">
                    <p>Closing</p>
                </div>

            </div>
            <div class="row mt-5 mb-5">
                <h5 class="text-center">Today</h5>
                <hr>
                <div class="col-6">
                   @php
                        $current_date = date('Y-m-d');
                        $data = DB::table('marks')
                            ->where('user_id', $user->user_id)
                            ->where('date', $current_date)
                            ->first();
                        $total = $data !== null ? $data->total : 'N/A';
                        $percentage = (intval($total) / 60) * 100;
                        $percentage = round($percentage,2);
                    @endphp
                    <div class="row  mt-3">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <h5 class="text-decoration-underline">Score</h5>
                                </div>
                            </div>
                            <div class="row row-cols-3">
                                <div class="col">
                                    <p>Opening : <strong>{{ $data->opening ?? 'N/A' }}</strong></p>
                                </div>
                                <div class="col">
                                    <p>Assurance : <strong>{{ $data->assurance ?? 'N/A' }}</strong></p>
                                </div>
                                <div class="col">
                                    <p>Apologies : <strong>{{ $data->apologies ?? 'N/A' }}</strong></p>
                                </div>
                                <div class="col">
                                    <p>Resolution : <strong>{{ $data->resolution ?? 'N/A' }}</strong></p>
                                </div>
                                <div class="col">
                                    <p>Querry : <strong>{{ $data->querry ?? 'N/A' }}</strong></p>
                                </div>
                                <div class="col">
                                    <p>Closing : <strong>{{ $data->closing ?? 'N/A' }}</strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <h5 class="text-decoration-underline">Percentage</h5>
                                <span class="mt-3 fs-1 fw-bold" style="color : rgb(131, 131, 177);">{{$percentage}}%</span>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="col-4">
                    <h5 class="text-decoration-underline" >Assign Marks</h5>
                    <form action="/marks/{{ $user->user_id }}" method="post">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="opening">Opening (out of 10) :</label>
                            <input type="number" class="form-control" name="opening" id="opening">
                        </div>
                        <div class="form-group mt-3">
                            <label for="assurance">Assurance (out of 10) :</label>
                            <input type="number" class="form-control" name="assurance" id="assurance">
                        </div>
                        <div class="form-group mt-3">
                            <label for="apologies">Apologies (out of 10) :</label>
                            <input type="number" class="form-control" name="apologies" id="apologies">
                        </div>
                        <div class="form-group mt-3">
                            <label for="resolution">Resolution (out of 10) :</label>
                            <input type="number" class="form-control" name="resolution" id="resolution">
                        </div>
                        <div class="form-group mt-3">
                            <label for="querry">Querry (out of 10) :</label>
                            <input type="number" class="form-control" name="querry" id="querry">
                        </div>
                        <div class="form-group mt-3">
                            <label for="closing">Closing (out of 10) :</label>
                            <input type="number" class="form-control" name="closing" id="closing">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 w-100">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
