<div style="background-color: #F7F7F7;padding: 10px;box-shadow:0 10px 16px 10px rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important; padding:20px;">
<h2>Iniciar Sesi&oacute;n</h2>
  <?php
  if(!empty($msj)){
  ?>
  <div class="alert alert-warning">
    <?=@$msj;?>
  </div>
  <?php
  }
  ?>
  <form name="formAccess" method="post" action="<?=base_url()?>">
    <table style="text-align: center;">
          <tr>
              <td><h3>Usuario:</h3></td>
          </tr>
          <tr>
              <td><input type="text" name="usuario" class="form-control" required="required"/></td>
          </tr>
          <tr>
              <td><h3>Contrase&ntilde;a:</h3></td>
          </tr>
          <tr>
              <td><input type="password" name="pass" class="form-control" required="required"/></td>
          </tr>
      </table>
      <br>
      <input type="hidden" name="acceso" value="1"/>
      <button type="submit" class="btn btn-primary">Entrar</button>
  </form>
</div>
