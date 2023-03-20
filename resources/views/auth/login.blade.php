<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('img/logo.jpg') }}"" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styleLogin.css') }}">
    <title>Bienvenido a PROSALUD+</title>
</head>

<body>


    <section class="login">
      
        @if ($errors->any())
            <div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error:</strong> Usuario o contraseña incorrectos.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="login_box">
            <div class="left">

                <div class="contact">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h3>INICIA SESIÓN</h3>
                        <input type="email" name="email" placeholder="CORREO" required>
                        <input id="password-input" type="password" name="password" placeholder="CONTRASEÑA" required>
                        <button id="login-btn" class="submit">INGRESAR</button>
                    </form>
                </div>
            </div>
            <div class="right">
                <div class="right-text">
                    <h2>PROSALUD+</h2>
                    <h5>LA SALUD ES PARA TODOS !</h5>
                </div>
                <div class="right-inductor"><img src="{{ asset('img/logoProsalud.jpg') }}" alt=""></div>
            </div>
        </div>
    </section>

    <script>
        const form = document.querySelector('#login-form');
        const emailField = document.querySelector('#email-field');
        const passwordField = document.querySelector('#password-field');

        form.addEventListener('submit', (event) => {
            // Prevent the form from submitting
            event.preventDefault();

            // Check that the email and password fields are not empty
            if (emailField.value.trim() === '') {
                alert('Por favor, ingrese su correo electrónico');
                emailField.focus();
                return;
            }

            if (passwordField.value.trim() === '') {
                alert('Por favor, ingrese su contraseña');
                passwordField.focus();
                return;
            }

            // Submit the form if all fields are valid
            form.submit();
        });
    </script>
    <script>
        // Obtenemos la referencia al elemento de la alerta
        const alertBox = document.querySelector('#alert');

        // Si la alerta existe, la ocultamos después de 3 segundos
        if (alertBox) {
            setTimeout(() => {
                alertBox.remove();
            }, 3000);
        }
    </script>
    <style>
        .alert {
            margin-left: 10px;
            margin-right: 10px;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>


</body>

</html>
