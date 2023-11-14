<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solicitação de Cadastro</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body style="margin-top: 200px;" class="text-center bg-primary">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-5 shadow-lg border bg-white rounded">
                <form action="/signin" method="POST" class="form-signin p-5  border-secondary">
                    @csrf
                    <h1 class="h3 mb-3 font-weight-normal shadow p-3 mb-5">Solicitação de Cadastro</h1>
                    <label for="inputEmail" class="sr-only">E-mail</label>
                    <input type="email" id="inputEmail" name="email" class="form-control mb-3" placeholder="E-mail"
                        required autofocus>
                    <div class="container">
                        <div class="row">
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <a href="{{route('home')}}">Voltar</a>
                            </div>
                            <div class="col-6">
                                <button style="background-color: #2FAD92;" class="btn btn-lg btn-block text-white"
                                    type="submit">Solicitar</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

</body>

</html>
