<?php 
        include_once __DIR__ .'/navc.php'; 
    ?>
   <style>
  body {
    font-family: Arial, sans-serif;
  }
  table {
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #ddd;
  }
  th, td {
    text-align: left;
    padding: 12px;
  }
  th {
    background-color: #f2f2f2;
  }
  tr:nth-child(even) {
    background-color: #f2f2f2;
  }
  tr:hover {
    background-color: #e0e0e0;
  }
</style>
 <h1>CALCULADORA DE INVERSIONES A CORTO PLAZO</h1>
<div class="divprincipal">
    <div class="divizquierda">
    <form action="/inversion-larga" method="post">
     
        </br>
        <h3>SELECCIONE LA INVERSIÓN DESEADA</h3>
      
            <label for="opcion">Selecciona la empresa a invertir</label>
            
            </br>
            <select name="opcion" id="combobox1">
            <option value="opcion1">--</option>
              <option value="opcion2">Ferro Torre</option>
              <option value="opcion3">Construir Futuro</option>
              <option value="opcion4">Alimec</option>
              <option value="opcion5">Auto Mekano</option>
              
            </select>
            <label for="opcion2">Selecciona el plazo al que deseas invertir</label>
            </br>
           
            <select name="opcion2" id="combobox2">
            <option value="0">--</option>
                <option value="365">Clase A | 365 días (1 año)</option>
                <option value="730">Clase B | 730 días (2 años)</option>
                <option value="1095">Clase C | 1095 días (3 años)</option>
                <option value="1460">Clase C | 1460 días (4 años)</option>
                              
            </select>
            <h3>SELECCIONE LA INVERSIÓN DESEADA</h3>
            <label  for="principal">Monto principal</label>
            <input class="inputcito" type="number" name="principal" step="any" required>

            <label for="fecha">Selecciona una fecha</label>
            <input class="inputcito" type="date" id="fecha" name="fecha" required>
            <input  type="submit" value="Calcular" class="boton-simulador"  onclick="divLogin()">
       
        </form>

    </div>
    <div class="divderecha">
    <div class="parte1">
            <h3>INFORMACIÓN DE LA EMPRESA</h3>

            <div id="cajita" class="cajita">
                <?php
                    echo "<img src=$imagen></img>";
                    echo "<h4>$nombre | CORTO PLAZO | $dias_credito DIAS | $tasa % RENDIMIENTO</h4>";
                    echo "<p> $texto1</p>";
                    echo "<p> $texto2</p>";
                ?>
               
            </div>
            
        </div>

            </br>
            </br>
            <div class="parte2">
                <h3>RESULTADO DE LA INVERSIÓN</h3>
   
        
                    <?php
                        echo "<p>Una inversión de $$principal</p>"; 
                        echo "<p>Con una tasa de interés del $tasa%</p>";  
                        echo "<p>Con una ganancia de $$ganancia.</p>";
                        echo "<p>Resultará en un monto final de $$total.</p>";
                        echo "<p>Que se recibirá el día: $nueva_fecha</p>";
       
                    ?>
                <a href="/simuladores" class="boton-simulador">Volver</a>
            </div>
        
        
    </div>
        </div>
    </div>
</div>


<div class="parte 3">
<h1>Tabla de Amortización</h1>
<?php
$inversionInicial = $principal; // Inversión inicial
$tasaInteresMensual = ($tasa/100)/12; // Tasa de interés mensual (2%)
$periodos = $dias_credito/365*12; // Número de meses
$incrementoMensual = 0; // Aumento en la inversión cada mes

// Calcula el pago mensual inicial
$pagoMensual = $inversionInicial * $tasaInteresMensual;

echo "<table border='1'>
        <tr>
            <th>Mes</th>
            <th>Inversión</th>
            <th>Pago Mensual</th>
            <th>Fecha</th>
        </tr>";

for ($mes = 2; $mes <= $periodos; $mes++) {
    echo "<tr>
            <td>$mes</td>
            <td>$" . number_format($inversionInicial, 2) . "</td>
            <td>$" . number_format($pagoMensual, 2) . "</td>
            <td>" . $fecha = date('Y-m-d', strtotime("+$mes days")) . "</td>
          </tr>";

    // Calcula la inversión para el siguiente mes
    $inversionInicial = $inversionInicial+$pagoMensual;

    // Calcula el nuevo pago mensual
    $pagoMensual = $inversionInicial * $tasaInteresMensual;
}

echo "</table>";
?>
        </div>

