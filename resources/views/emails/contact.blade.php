<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro exitoso</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
 
<body>
    <div class="container">
        <div class="row ">
            <div class="col-6 align-self-center">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h4> Hemos recibido con exito tu registro </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <p> <strong>Nombres:</strong> {{$users['first_name']}}</p>
                        <p><strong>Apellidos: </strong> {{$users['last_name']}}</p>
                        <p><strong>Email: </strong> {{$users['email']}}</p>
                        <p><strong>Pais: </strong> {{$users['country']}}</p>
                        <p><strong>Telefono: </strong> {{$users['movil']}}</p>
                    </div>
                </div>
            </div>
 
        </div>
    </div>
 
 
</body>
 
</html>