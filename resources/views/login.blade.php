{{ $gagal }}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1>Login Form</h1>
<form method="post">
    @csrf
    Email:<br>
    <input type="text" name="email"><br>
    Password:<br>
    <input type="password" name="password"><br>
    <button type="submit" name="submit" value="submit">Login</button>
</form>
