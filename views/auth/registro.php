<main class="cal_reg">
<div class="barrac">

    <div class="barrac__contenido">
      
        <nav class="navegacionc">
            <a href="/inversion-corta" class="navegacionc__enlace <?php echo pagina_actual('/evento') ? 'navegacion__enlace--actual' : ''; ?>">Calculadora a Corto Plazo</a>
            <a href="/paquetes" class="navegacionc__enlace <?php echo pagina_actual('/paquetes') ? 'navegacion__enlace--actual' : ''; ?>">Calculadora a Largo Plazo</a>
            <a href="/workshops-conferencias" class="navegacionc__enlace <?php echo pagina_actual('/workshops-conferencias') ? 'navegacion__enlace--actual' : ''; ?>">Simulador de Acciones</a>
            <a href="/workshops-conferencias" class="navegacionc__enlace <?php echo pagina_actual('/workshops-conferencias') ? 'navegacion__enlace--actual' : ''; ?>">Simulador Bitcoins</a>
            
        </nav>
    </div>
</div>

<section>
    <div class="calculadora">
        <h1>Investment Simulator</h1>
        <form action="calculate.php" method="post">
            <label for="initialAmount">Initial Investment:</label>
            <input type="number" step="any" name="initialAmount" required><br>
            
            <label for="interestRate">Annual Interest Rate (%):</label>
            <input type="number" step="any" name="interestRate" required><br>
            
            <label for="investmentPeriod">Investment Period (years):</label>
            <input type="number" step="any" name="investmentPeriod" required><br>
            
            <input type="submit" value="Calculate">
        </form>
    </div>
    <div class="calculadora">
        <h1>Investment Simulator - Results</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $initialAmount = $_POST["initialAmount"];
            $interestRate = $_POST["interestRate"] / 100; // Convert to decimal
            $investmentPeriod = $_POST["investmentPeriod"];
            
            $futureValue = $initialAmount * (1 + $interestRate) ** $investmentPeriod;
            
            echo "<p>Initial Investment: $initialAmount</p>";
            echo "<p>Annual Interest Rate: " . ($_POST["interestRate"]) . "%</p>";
            echo "<p>Investment Period: " . ($_POST["investmentPeriod"]) . " years</p>";
            echo "<p>Future Value: $futureValue</p>";
        }
        ?>
        <a href="/evento">Back to Calculator</a>
        <iframe src="https://www.google.com" width="800" height="600"></iframe>
            <iframe
  id="inlineFrameExample"
  title="Inline Frame Example"
  width="300"
  height="200"
  src="https://www.openstreetmap.org/export/embed.html?bbox=-0.004017949104309083%2C51.47612752641776%2C0.00030577182769775396%2C51.478569861898606&layer=mapnik"
>
</iframe>
    </div>
</section>

 
</main>