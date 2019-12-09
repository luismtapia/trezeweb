<?php
    class generador_de_tablas{

      function __construct(){

      }

      

      function crear_tabla($data,$titulo,$columna1,$columna2,$columna3,$columna4){

        echo '
          <div class="contenido-tablas">
            <div class="titulo-tabla">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>CRUD <b>'.$titulo.'</b></h2>
                    </div>
                    <div class="">
                        <a href="cruds/categorias.insertar.php" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Nuevo</span></a>
                        <a href="#" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Otro</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-dark">
              <thead>
                <tr>
                  <th></th>
                  <th>'.$titulo.'</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th>actions</th>

                </tr>
              </thead>';

              for ($i=0; $i < count($data) ; $i++):
        echo '
                <tbody>
                  <tr>
                    <td></td>
                    <td>'.$data[$i][$columna2].'</td>
                    <td>'.$data[$i][$columna3].'</td>
                    <td>'.$data[$i][$columna4].'</td>
                    <td></td>
                    <td>
                        <a href="cruds/categorias.actualizar.php?id_categoria='.$data[$i][$columna1].'" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        <a href="#categorias.eliminar.php?id_categoria='.$data[$i][$columna1].'" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    </td>
                  </tr>
                </tbody>';

              endfor;
          echo '
            </table>
          </div>
        ';

      }
    }

    $tabla= new generador_de_tablas;
?>
