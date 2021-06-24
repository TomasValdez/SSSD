<?
require'../Tecnicos/crud_funcion.php';
?>

<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Login-Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="../Tecnicos/indix.php" method="post">
      <div class="user line-input">
                <label class="lnr lnr-user"></label>
                <label for="">Correo Electronico:</label>
                <input type="text" name="txtEmail" class="form-control" placeholder="Correo Electronico" name="mail"id="recipient-name">
                <br>
                <label for="">Contraseña:</label>
                <input type="password" name="txtpassword" class="form-control" placeholder="Contraseña" name="mail"id="recipient-name">
            </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit" name="btnLogin" >Iniciar Sesion</button>
      </div>
    </div>
  </div>
</div></div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<!--<a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a>-->