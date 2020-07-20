
<body>
	

<div class="container">
<div class="row">
<div class="col-md-12">
	
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">AGREGAR MATERIA</h4>
        </div>
        
          <div class="modal-body">

                <form role="form" method="post" action="crearmateria.php">
                  <div class="form-group">
                    <label for="name">Nombre materia</label>
                    <input type="text" class="form-control" name="nombre" required>
                  </div>
                 <!-- <div class="form-group">
                    <label for="lastname">Apellidos</label>
                    <input type="text" class="form-control" name="lastname" required>
                  </div>
                 -->
                  <button type="submit" class="btn btn-default">Agregar</button>
                </form>

          </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


    <?php include "listmat.php"; ?>
</div>
</div>
</div>

  <script src="css/bootstrap/js/bootstrap.min.js"></script>
</body>