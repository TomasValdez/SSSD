<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" 
crossorigin="anonymous">


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Cenidet  solicitud</title>
  </head>
  <body>
<style>
body {
    background-color: rgba(131, 128, 128, 0.377);
}
</style>

<div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
 aria-hidden="true" modal="true" style="display:block;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingresar</h5>
        </div>
      <div class="modal-body">
        <form method="POST" action="../Model/validar.php">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Correo</label>
           
            <input type="text" name="mail" class="form-control" id="recipient-name">
          </div>
        
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary"></input>
        
        </form>
      </div>
    </div>
  </div>
</div>

  </body>
 </html>