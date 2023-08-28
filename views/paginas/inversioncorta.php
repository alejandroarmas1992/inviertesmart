<?php 
        include_once __DIR__ .'/navc.php'; 
    ?>
 <h1>CALCULADORA DE INVERSIONES A CORTO PLAZO</h1>
<div class="divprincipal">
    <div class="divizquierda">
    <form action="/inversion-corta" method="post">
     
        </br>
        <h3>SELECCIONE LA INVERSIÓN DESEADA</h3>
      
            <label for="opcion">Selecciona la empresa a invertir</label>
            
            </br>
            <select name="opcion" id="combobox1">
              <option value="opcion1">--</option>
              <option value="opcion2">Nestlé</option>
              <option value="opcion3">Azzorti</option>
              <option value="opcion4">Profemarco</option>
              
            </select>
            <label for="opcion2">Selecciona el plazo al que deseas invertir</label>
            </br>
           
            <select name="opcion2" id="combobox2">
                <option value="0">--</option>
                <option value="359">Clase A | 359 días</option>
                <option value="181">Clase B | 181 días</option>
                <option value="150">Clase C | 150 días</option>
                              
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

