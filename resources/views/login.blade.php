<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #1f2937, #111827);
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }

        /* Contenedor principal */
        .login-container {
            width: 420px;
            padding: 40px;
            border-radius: 18px;
            background: #ffffff;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(25px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Header */
        .login-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .login-header i {
            font-size: 38px;
            color: #198754;
            margin-bottom: 10px;
        }

        .login-header h4 {
            font-weight: 600;
            color: #111827;
        }

        .login-header p {
            font-size: 14px;
            color: #6b7280;
        }

        /* Labels */
        label {
            font-size: 13px;
            color: #374151;
            margin-bottom: 5px;
        }

        /* Inputs */
        .form-control {
            border-radius: 10px;
            border: 1px solid #e5e7eb;
            padding: 10px;
            transition: all 0.2s;
        }

        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 2px rgba(25, 135, 84, 0.15);
        }

        .input-group-text {
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-right: none;
            color: #198754;
            border-radius: 10px 0 0 10px;
        }

        .input-group .form-control {
            border-left: none;
            border-radius: 0 10px 10px 0;
        }

        /* Botón */
        .btn-login {
            border-radius: 10px;
            padding: 10px;
            font-weight: 600;
            background: linear-gradient(135deg, #198754, #157347);
            border: none;
            transition: 0.3s;
        }

        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 15px rgba(25, 135, 84, 0.25);
        }

        /* Link */
        .register-link {
            text-align: center;
            margin-top: 15px;
        }

        .register-link a {
            color: #198754;
            text-decoration: none;
            font-size: 14px;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .alert {
            border-radius: 10px;
        }
    </style>
</head>

<body>

<div class="login-container">

    <div class="login-header">
        <i class="fa-solid fa-user-lock"></i>
        <h4>Iniciar Sesión</h4>
        <p>Accede a tu cuenta para continuar</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label>Correo</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-envelope"></i>
                </span>
                <input
                    type="email"
                    name="correo"
                    value="{{ old('correo') }}"
                    class="form-control"
                    placeholder="correo@ejemplo.com"
                    required>
            </div>
        </div>

        <div class="mb-3">
            <label>Contraseña</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-lock"></i>
                </span>
                <input
                    type="password"
                    name="contrasena"
                    class="form-control"
                    placeholder="********"
                    required>
            </div>
        </div>

        @error('correo')
        <div class="alert alert-danger text-center">
            {{ $message }}
        </div>
        @enderror

        <div class="d-grid">
            <button type="submit" class="btn btn-login">
                <i class="fa-solid fa-right-to-bracket"></i> Ingresar
            </button>
        </div>

        <div class="register-link">
            <a href="{{ route('usuarios.create') }}">¿No tienes cuenta? Regístrate</a>
        </div>

    </form>

</div>

</body>
</html>