<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

	<title>Login</title>
</head>
<body>

	<div class="container position-absolute top-50 start-50 translate-middle">
		<div class="row">
			<div class="col-md-4 offset-md-4">

				<div class="card mt-5">

                <img src="/img/black_thirstea.png" class="img-fluid mx-auto mt-3" style="max-height: 100px;"alt="">
                <div class="mb-3 mx-auto">
                    <h2 class="text-center fw-semibold">LOG IN</h2>
                    <p class="text-center">Welcome Back!</p>
                </div>
                <!-- Action untuk routing ke controller -->
                <form action="/login/validate" method="post">
                    @csrf
                    <div class="mb-3 mx-4">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <!-- 'name' pada input untuk pass value input ke controller -->
                        <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3 mx-4">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                    </div>
                    <!-- <div class="mb-3 mx-4 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
                    <button type="submit" class="btn btn-dark rounded-pill my-3 position-relative start-50 translate-middle" style="width:40%;">LOGIN</button>
                    </form>
				</div>
			</div>

		</div>

	</div>
</body>