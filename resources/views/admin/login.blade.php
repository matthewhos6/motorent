<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>AdminLogin</title>
  </head>
  <body style="background-color: #9bd9ff;">
  <form action="{{ url("/admin/logging") }}" method="post">
    @csrf
    <center><div style="margin-top: 130px;width: 500px;height: 450px;background-color: white;border-radius: 20px">
      <br><h2 style="text-align: center;">ADMINISTRATOR</h2><br>
      <div style="text-align: left;margin-left: 20px;">Username</div>
      <input class="form-control" style="width: 93%;" type="text" name="username" value={{ old('username') }}>
      <br><span style="color: red;">{{ $errors->first('username') }}</span><br>
      <div style="text-align: left;margin-left: 20px;">Password</div>
      <input class="form-control" style="width: 93%;" type="password" name="password">
      <br><span style="color: red;">{{ $errors->first('password') }}</span><br><br>
      @if (Session::has('msg'))
          <div style="color: red;">{{ Session::get('msg'); }}</div>
      @endif
      <button style="width: 93%;" type="submit" class="btn btn-primary">Login</button><br><br>
      <a href="{{ url("/") }}">Back to Home</a>

  </div></center>
  </form>
  <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>