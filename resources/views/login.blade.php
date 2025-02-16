<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Daftar Akun</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
        }

        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .form-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s;
        }

        .form-group input:focus {
            border-color: #007bff;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        .form-footer {
            margin-top: 15px;
            text-align: center;
            font-size: 14px;
        }

        .form-footer a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .form-footer a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Login Akun</h1>
        @if(session('error'))
        <div class="alert alert-danger">
            <b>Opps!</b> {{session('error')}}
        </div>
        @endif
        <form action="{{route('loginproses')}}" method="post">
            @csrf
        <form>
            <div class="form-group">
                <label for="negara">Nama Negara</label>
                <input type="text" id="negara" name="negara" placeholder="Masukkan nama negara" required>
            </div>
           
            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required>
            </div>
            
            <div class="form-group">
                <button type="submit">login</button>
            </div>
        </form>
        <div class="form-footer">
            belum punya akun? <a href="/register">Daftar</a>
        </div>
    </div>
</body>
</html>
