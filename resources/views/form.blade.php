<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <h3 class="text-center">ASSIGN MARKS TO <span style="color: gray; text-transform : uppercase;">{{ $user->name }}</span></h3>
        <form action="/form/{{ $user->user_id }}" method="post">
            @csrf
            <div class="form-group">
                <div class="mt-3 mb-3">
                    <input type="radio" name="contact_type" value="call" checked> Call
                    <input type="radio" name="contact_type" value="text"> Text
                </div>

                <div>
                    <label for="phone">Phone:</label>
                    <input type="tel" class="form-control" name="phone" id="phone"
                        placeholder="Enter phone number">

                    <script>
                        const radioButtons = document.querySelectorAll('input[name="contact_type"]');
                        const phoneInput = document.getElementById('phone');

                        radioButtons.forEach(function(radioButton) {
                            radioButton.addEventListener('change', function() {
                                if (radioButton.value === 'call') {
                                    phoneInput.disabled = false;
                                } else {
                                    phoneInput.disabled = true;
                                }
                            });
                        });
                    </script>
                </div>

            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
