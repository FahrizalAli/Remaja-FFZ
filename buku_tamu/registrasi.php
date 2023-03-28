<!DOCTYPE html>
<html>
  <head>
    <title>Registrasi</title>
  </head>
  <body>
    <div class="col-md-4 col-offset-4 mt-4 text-center">
      <h1>Registrasi</h1>
      <br />
      <form action="register.php" method="POST" class="form-horizontal">
        <div class="">
          <div class="test">
            <div class="form-grup" value="opacity:50px;">
              <label>USERNAME</label>
              <br />
              <input
                type="text"
                name="username"
                placeholder="username"
                class="form-control"
              />
              <br /><br />
              <label>PASSWORD</label>
              <br />
              <input
                type="password"
                name="password"
                placeholder="password"
                class="form-control"
              />
              <br /><br />
              <label>LEVEL</label>
              <br />
              <select class="form-control" name="level">
                <option value="admin">admin</option>
                <option value="kepsek">kepsek</option>
              </select>
              <br>
  
              <button type="submit">
                Register
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
