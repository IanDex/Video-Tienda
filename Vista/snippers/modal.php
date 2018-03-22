<div id="modal-4" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h3 id="modal-label">Registrar Peliculas.</h3>
            </div>
            <div class="modal-body">
                <h4>Complete los Campos a continuacion.</h4>
                <form name="pelis" onsubmit="return validarform()" class="form-horizontal form-bordered" method="post" action="../Controlador/PeliculasCtlr.php?action=crear">
                    <div class="form-group">
                        <label id="cod" class="col-md-2 control-label">Codigo</label>
                        <div class="col-md-10">
                            <input autofocus="autofocus" type="number" min="0" class="form-control input-rounded" id="Codigo" name="Codigo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label id="nom" class="col-md-2 control-label">Nombre</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control input-rounded" id="Nombre" name="Nombre">
                        </div>
                    </div>

                    <div class="form-group">
                        <label id="des" class="col-md-2 control-label" >Descripcion</label>
                        <div class="col-md-10">
                            <textarea rows="4" class="form-control input-rounded" id="Descripcion" name="Descripcion"></textarea>
                        </div>
                    </div>
                    <div class="ian">
                        <button type="submit" class="btn v-btn  v-small-button v-second-dark">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>