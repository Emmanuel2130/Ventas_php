<?php
require_once "./modelos/conexion_reporte_stock.php";
$masVendido = ControladorReportes::ctrProdcutoMasVendido();
$menosVendido = ControladorReportes::ctrProdcutoMenosVendido();

?>

<div class="contenido container mt-2">
    <h2 class="text-center">Dashboard</h2>

    <div class="row">
        <div class="col-md-3">&nbsp;</div>
        <div class="col-md-9">
            <div class="row">

                <div class="col-sm-4">
                    <div class="thumbnail">
                        <div class="caption text-center">
                            <h4 id="thumbnail-label">PRODUCTO MAS VENDIDO</h4>

                            <table>
                                <tr>
                                    <th>Nombre</th>
                                    <td><?= $masVendido["nombre"] ?></td>
                                </tr>
                                <tr>
                                    <th>Veces Vendido</th>
                                    <td><?= $masVendido["cantidad"] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <div class="caption text-center">
                            <h4 id="thumbnail-label">PRODUCTO MENOS VENDIDO</h4>
                            <table>
                                <tr>
                                    <th>Nombre</th>
                                    <td><?= $menosVendido["nombre"] ?></td>
                                </tr>
                                <tr>
                                    <th>Veces Vendido</th>
                                    <td><?= $menosVendido["cantidad"] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">&nbsp;</div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <div class="caption text-center">
                            <h4 id="thumbnail-label">PRODUCTO CON MAS STOCK</h4>
                            <table>
                          <?php
                        $resultados1=mysqli_query($conexion,"SELECT * FROM `tblproductos` ORDER BY stock DESC; ");
                        $resultados=mysqli_query($conexion,"SELECT * FROM `tblproductos` ORDER BY stock DESC;");
                        echo "<table>";
                        echo "
                        <tr>
                        <th>NOMBRE</th>
                        <th>STOCK</th>
                        </tr>";
                        echo "<tr>";    
                         
                        echo "<td>";  
   
                        while($consult=mysqli_fetch_array($resultados1))
                        {          
                          
                           echo $consult['nombre'];
                           echo "<br>";
                        }
                 
                        echo "</td>";   
                        echo "<td>";     
                        while($consult=mysqli_fetch_array($resultados))
                        {
                            
                            echo $consult['stock'];
                            echo "<br>";
                        }
                        echo "</td>";
                        echo "</tr>";                    
                        echo "</table>";
                       
                          ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>