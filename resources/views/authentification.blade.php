<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #0E4C92;
        }
        .login{
            width:360px;
            height: min-content;
            padding: 20px;
            border-radius: 12px;
            background: #FFF;
        }
        .login h1{
            font-size: 36px;
            margin-bottom: 25px;
        }
        .login form{
            font-size: 20px;
        }
        .login form .form-group{
            margin-bottom: 12px;
        }

        .login form input[type="submit"]{
            font-size: 20px;
            margin-top: 15px;
        }
        img{
            height: 200px;
            margin-right: 10px;
        }
    </style>
    <title>BiblioSimplon</title>
</head>
<body>
    <img src="img/livre.jpg" alt="">
    <div class="login">
        <h1 class="text-center">Connexion</h1>
        <form class="needs-validation" method="POST" action="{{route('login')}}">
            @csrf
            <div class="form-group was-validated">
                <label for="email" class="form-label">Adresse Email</label>
                <input type="email" class="form-control" name="email" id="email"  required>
                <div class="invalid-feedback">
                    Entrez votre adresse E-mail
                </div>
            </div>
            <div class="form-group was-validated">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password" id="password" required>
                <div class="invalid-feedback">
                    Entrez votre mot de passe
                </div>
            </div>
            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" name="" id="">
                <label  class="form-check-label" for="check">Se souvenir de moi</label>
            </div>
            <input class="btn btn-success" type="submit" value="Connexion">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
</body>
</html>