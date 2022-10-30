<?php
$productos = new ControladorProductos();
?>
<div class="contenido container mt-2">
    <h2 class="text-center">Administrar Productos</h2>


    <div class=" with-border mb-3" style="margin-bottom: 20px;">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
            Agregar Producto
        </button>
    </div>

    <table class="table tabla-negra">
        <thead>
            <tr>
                <th scope="col" style="width:10px">#</th>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE DEL PRODUCTO</th>
                <th scope="col">REFERENCIA</th>
                <th scope="col">PESO</th>
                <th scope="col">CATEGORIA</th>
                <th scope="col">STOCK</th>
                <th scope="col">PRECIO</th>
                <th scope="col">FECHA DE CREACION</th>
                <th scope="col" style="width:100px">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $item = null;
            $valor = null;
            $mostrarProductos = ControladorProductos::ctrMostrarProductos($item, $valor);

            foreach ($mostrarProductos as $key => $value) :
                $precio = number_format($value['valor'], 0, ",", ".");

            ?>
                <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $value['codigo'] ?></td>
                    <td><?= $value['nombre'] ?></td>
                    <td><?= $value['referencia'] ?></td>
                    <td><?= $value['peso'] ?></td>
                    <td><?= $value['categoria'] ?></td>
                    <td><?= $value['stock'] ?></td>
                    <td><?= "$ " . $precio ?></td>
                    <td><?= $value['fecha_creacion'] ?></td>

                    <td>
                        <div class="btn-group">
                            <button class="btn btn-warning btnEditarProducto mr-4" idProducto="<?= $value['codigo'] ?>" data-toggle="modal" data-target="#modalEditarProducto"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btnBorrarProducto ml-4" idProducto="<?= $value['codigo'] ?>"><i class="fa fa-times"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>



<!-- MODAL AGREGAR PRODUCTO -->
<div id="modalAgregarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="POST">
                <div class="modal-header" style="background:#4b5762;  color:white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class=modal-title>Agregar Producto</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">

                        <!-- CODIGO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="number" class="form-control input-lg" name="nuevoCodigo"min="0" placeholder="Ingresar Codigo" required>
                            </div>
                        </div>

                        <!-- FECHA CREACION -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="Date" class="form-control input-lg" name="nuevoFecha" placeholder="Ingresar Fecha de creacion" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- NOMBRE -->
                            <div class="col-xs-12 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" required>
                                </div>
                            </div>

                            <!-- PESO -->
                            <div class="col-xs-12 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="number" class="form-control input-lg" name="nuevoPeso"min="0" placeholder="Ingresar Peso" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- REFERENCIA -->
                            <div class="col-xs-12 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevoReferencia" placeholder="Ingresar Referencia" required>
                                </div>
                            </div>


                            <!-- CATEGORIA -->
                            <div class="col-xs-12 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevoCategoria" placeholder="Ingresar Categoria" required>
                                </div>
                            </div>
                        </div>

                        <!-- STOCK -->
                        <div class="form-group row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                    <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Stock" step="any" required>
                                </div>
                            </div>

                            <!-- PRECIO -->
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                        <input type="number" class="form-control input-lg" name="nuevoPrecio" min="0" placeholder="Precio" step="any" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Producto</button>
                </div>

            </form>
            <?php
            $crearProducto = new ControladorProductos();
            $crearProducto->ctrCrearProducto();

            ?>
        </div>
    </div>
</div>

<!-- MODAL EDITAR PRODUCTO -->
<div id="modalEditarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="POST">
                <div class="modal-header" style="background:#4b5762;  color:white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class=modal-title>Editar Producto</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">

                        <!-- CODIGO -->
                        <div class="form-group">
                        <center><p>CODIGO</p></center>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="number" class="form-control input-lg" id="editarCodigo" name="editarCodigo" placeholder="Ingresar Codigo" readonly required>
                            </div>
                        </div>
              
                        <div class="form-group">
                        <center><p>FECHA CREACION</p></center>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="Date" class="form-control input-lg" id="editarFechaCreacion" name="editarFechaCreacion" placeholder="Ingresar Fecha Creacion" required>
                            </div>
                        </div>

                        <!-- NOMBRE -->
                        <div class="form-group">
                        <center><p>NOMBRE PRODUCTO</p></center>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" placeholder="Ingresar Nombre" required>
                            </div>
                        </div>

                        <!-- PESO -->
                        <div class="form-group">
                        <center><p>PESO</p></center>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" id="editarPeso" name="editarPeso" placeholder="Ingresar Peso" required>
                            </div>
                        </div>
                        <div class="form-group row">

                            <!-- CATEGORIA -->
                            <div class="col-xs-12 col-sm-6">
                            <center><p>CATEGORIA</p></center>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg" id="editarCategoria" name="editarCategoria" placeholder="Ingresar Categoria" required>
                                </div>
                            </div>


                            <!-- REFERENCIA -->
                            <div class="col-xs-12 col-sm-6">
                            <center><p>REFERENCIA</p></center>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg" id="editarReferencia" name="editarReferencia" placeholder="Ingresar Referencia" required>
                                </div>
                            </div>
                        </div>

                        <!-- STOCK -->
                        <div class="form-group row">
                            <div class="col-xs-12 col-sm-6">
                            <center><p>STOCK</p></center>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                    <input type="number" class="form-control input-lg" id="editarStock" name="editarStock" min="0" placeholder="Stock" step="any" required>
                                </div>
                            </div>

                            <!-- PRECIO -->
                            <div class="form-group row">
                            <center><p>PRECIO</p></center>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                        <input type="number" class="form-control input-lg" id="editarPrecio" name="editarPrecio" min="0" placeholder="Precio" step="any" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>

            </form>
            <?php
            $editarProducto = new ControladorProductos();
            $editarProducto->ctrEditarPoducto();
            ?>
        </div>
    </div>
</div>

<?php
$borrarProducto = new ControladorProductos();
$borrarProducto->ctrBorrarPoducto();
?>