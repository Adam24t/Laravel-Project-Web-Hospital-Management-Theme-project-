<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>


        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <style>
            body {
                width: 100vw;
  height: 100vh;
 background-color: #5F8D4E;
                background-size: cover;
            }
        </style>
    </head>
    <body>
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
<div class="container-fluid text-center" style="height: 100vh;">
<div class="row h-100 d-flex align-items-center justify-content-center ">

        <div class="card border w-25 h-50">
                <h5 class="card-title align-text-bottom mt-5">Sistem Manajemen RSJ</h5>
                <br>
                <h5 class="card-title align-text-bottom mt-2">WELCOME</h5>

            <div class="card-body d-flex align-items-center justify-content-center">
                <form method="post" action="{{route('login')}}">
                    @csrf
                    <div class="row justify-content-md-center">
                        <div class="col-md-auto form-group text-start">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <button type="submit" class="btn form-control mt-3"style="background-color: #5F8D4E;color:white">Submit</button>
                        </div>
                    </div>
        
                </form>
            </div>
        </div>
    </div>

</div>
</div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </body>
</html>
