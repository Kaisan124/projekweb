{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Daftar Akun</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .form-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
        .form-footer {
            margin-top: 20px;
            text-align: center;
        }
        .form-footer a {
            color: #007bff;
            text-decoration: none;
        }
        .form-footer a:hover {
            text-decoration: underline;
        }
        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Login Akun</h1>
        @if(session('error'))
        <div class="alert alert-danger">
            <b>Oops!</b> {{ session('error') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
        <form action="{{route('loginproses')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="username"> username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan nama username" required>
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
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body { 
 padding: 0;
 margin: auto;
 overflow-x: hidden;
 display: flex;
 justify-content: center;
 align-items: center;
 height: 100vh;
 background: #FBFBFB;
 font-family: 'Poppins', sans-serif;
}

h1 {
  font-size: 1.2em;
  padding: 0;
  margin: 0;
}

h2 {
  font-size: 1.1em;
  padding: 0;
  margin: 0;
}

p {
  font-size: 1em;
  padding: 0;
  margin: 0;
}

.container {
  width: 100%;
  display: grid;
  grid-template-columns: repeat(8,1fr);
  gap: 10px;
  margin: 10px;
  box-shadow: 2px 10px 20px rgba(0,0,0,.1);
  border-radius: 20px;
  background-color: white;
  overflow: hidden;
}

.container-left {
  grid-column: 1/9;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  margin-bottom: 10px;
  padding:10px;
  background-color: #C6CCF8;
}

.container-left img {
  width: 100%;
}


.container-left h1 {
  text-align: center;
  font-size: 1.5em;
  padding: 10px 0;
}

.container-left p {
  text-align: center;
}



.container-right {
  grid-column: 1/9;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  padding: 10px;
    
}

.container-right h2 {
  display: none;
}

.container-right form {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

.container-right .input {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  margin: 10px 0;
  width: 90%;

}
.input label {
  font-size: 1em;
  font-weight: 550;
}

.input input {
  width: 90%;
  padding: 10px;
  margin-top: 10px;
  outline: none;
  border: 2px solid rgba(0,0,0,0.5);
  border-radius: 5px;
  transition: .5s;
}

.input input:focus {
  border: 2px solid #3B5FF9;
  transition: .5s;
}

.container-right button {
  width: 90%;
  height: 40px;
  border: none;
  margin-top: 20px;
  background-color: #5876F8;
  color: white;
  cursor: pointer;
  border-radius: 10px;
  font-weight: bold;
  font-family: 'Poppins', sans-serif;
  transition: .5s;
}

.container-right button:hover {
  transition: .5s;
  background-color: #3B5FF9;
}

@media screen and (min-width: 450px) {
  .container {
    width: 400px;
  }
}

@media screen and (min-width: 760px) {

  .container {
    width: 100%;
  }

  body {
    height: 100vh;
  }
  .container-left {
    grid-column: 1/6;
    margin-bottom: 0;
    padding: 20px;

  }
  .container-left img {
    width: 85%;
  }

  .container-left .text {
    padding: 10px 0 0;
    width: 350px;
  }

  .container-left h1 {
    font-size: 1.5em;
  }

  .container-right h2 {
  display: block;
}


  .container-left p {
    font-size: .9em;
  }

  .container-right {
    grid-column: 6/9;
  }
}


@media screen and (min-width: 960px) {
  .container {
    width: 900px;
    height: 550px;
  }

  .container-left {
    padding: 0;
  }

  .container-left .text {
    padding: 10px 0 0;
    width: 480px;
  }
}
  </style>
</head>
<body>
  <div class="container">
    <div class="container-left">
    <img src="{{ asset('ok.jpg') }}" alt="form-login">
      <h1>Selamat Datang Di Website saya </h1>
      <p>Halaman Login</p>
    </div>
    <div class="container-right">
       
            <h1>Login Akun</h1>
            @if(session('error'))
            <div class="alert alert-danger">
                <b>Oops!</b> {{ session('error') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{route('loginproses')}}" method="post">
            @csrf
            <div class="input">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Masukkan nama username" required>
            </div>
           
            <div class="input">
            <label for="password">Kata Sandi</label>
            <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required>
            </div>
            
            <button type="submit">Login</button>
        </form>
        <div class="form-footer">
            Belum punya akun? <a href="/register">Daftar</a>
        </div>
      </form> 
    
    </div>
  </div>
</body>
</html>