<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Vacunación</title>
    <link rel="stylesheet" href="estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>
    <form class="row g-3 needs-validation" method="post">
        <h1>VACUNACIÓN COVID19 COLOMBIA</h1>
        <div class="col-md-4">
            <label for="validationServer01" class="form-label">Identificación</label>
            <input type="text" class="form-control" id="validationServer01" name="identificacion" required>
            <div class="invalid-feedback">
              Error!
            </div>
        </div>
        <div class="col-md-4">
          <label for="validationServer01" class="form-label">Nombres</label>
          <input type="text" class="form-control" id="validationServer01" name="nombres" required>
          <div class="invalid-feedback">
            Error!
          </div>
        </div>
        <div class="col-md-4">
          <label for="validationServer02" class="form-label">Apellidos</label>
          <input type="text" class="form-control" id="validationServer02" name="apellidos" required>
          <div class="invalid-feedback">
            Error!
          </div>
        </div>
        <div class="mb-3 ">
            <label for="validationServer04" class="form-label">Tipo de Biologíco</label>
            <select class="form-select" id="validationServer04" aria-describedby="validationServer04Feedback" name="biologico" required>
              <option selected disabled value="">Elige Opción...</option>
              <option value="moderna">Moderna</option>
              <option value="pfizer">PFizer</option>
              <option value="aztrazeneca">AztraZeneca</option>
              <option value="johnson">Johnson</option>
            </select>
            <div id="validationServer04Feedback" class="invalid-feedback">
                Seleccione Opción
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationServer01" class="form-label">Fecha Primera Dosis</label>
            <input type="date" class="form-control" id="validationServer01" name="1dosis" required>
            <div class="invalid-feedback">
              Correcto!
            </div>
        </div>
          <div class="col-md-4">
            <label for="validationServer01" class="form-label">Fecha Segunda Dosis</label>
            <input type="date" class="form-control" id="validationServer01" name="2dosis" required>
            <div class="invalid-feedback">
              Correcto!
            </div>
        </div>
        <div class="col-12">
          <button class="btn btn-primary" type="submit">Enviar Formulario</button>
        </div>
      </form>
      
</body>
<?php

    error_reporting(0);


    $identificacion = $_POST["identificacion"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $biologico = $_POST["biologico"];
    $undosis = $_POST["1dosis"];
    $dosdosis = $_POST["2dosis"];

    $contenido="
        $identificacion;$nombres;$apellidos;$biologico;$undosis;$dosdosis
    ";

    $archivo=fopen("vacunas.txt","a") or die ("Error al crear");
    fwrite($archivo,$contenido);

    function cargar(){
        if(file_exists("vacunas.txt")){
            $archivo=fopen("vacunas.txt", "r");
            while (!feof($archivo)){
                $linea = fgets($archivo);
                $personas = explode(";",$linea);
                echo "<table>
                    <tr>
                            <th scope='row' style='color:antiquewhite'>$personas[0]</th>
                            <td style='color:antiquewhite'>$personas[1]</td>
                            <td style='color:antiquewhite'>$personas[2]</td>
                            <td style='color:antiquewhite'>$personas[3]</td>
                            <td style='color:antiquewhite'>$personas[4]</td>
                            <td style='color:antiquewhite'>$personas[5]</td>
                    </tr>
                    </table>";
            }

        }   
    }
    cargar();


?>
</html>
