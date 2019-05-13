<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>assets/css/style.css"> <!-- Se solicita que la url regrese a la consante especìficada (con el fin de recibir siempre de la misma raíz el CSS) -->
    <title>pre Alpha Árpád</title>
</head>
<body>

    <div class="basico">
        <?php
        require 'views/layouts/navigation.php';
        ?>

        <h1>Tutorial básico de php</h1>

        <?php
            echo $this->mensaje;
            echo '<br>';
            echo $this->mensajeLength;
            echo '<br>';
            echo $this->mensajeWordCount;
            echo '<br>';
            echo $this->mensajeReverse;
            echo '<br>';
            echo $this->mensajeWordPosition;
            echo '<br>';
            echo $this->mensajeRplace;
            echo '<br>';
            echo $this->mensajeLowCase;
            echo '<br>';
            echo $this->mensajeUpCase;
            echo '<br>';
            echo $this->strCompare;
            echo '<br>';
            echo $this->mensajeSubstract;
            echo '<br>';
            echo $this->strTrim;
            echo '<br>';
            echo "Operadores suma(+), resta(-), multiplicaciòn(*), división(/), exponencial(**)";
            echo '<br>';
            echo "Operadores de asignaciòn = operador + sgno igual (+=, -=, /=, etc)... <br> Entre otros tutorial 5";
            echo '<br> ...Condicionales (if else, elseif...) tutorial 7';
            echo '<br> ...Ciclos (for, while...) tutorial 8';
            echo '<br>';
            echo $this->frutasCount . " elementos[frutas]";
            echo '<br>';
            echo var_dump($this->edades);
            echo '<br>';
            echo $this->edades['Sara'];
            echo '<br>';
            echo $this->forEachArray;
            echo '<br> ... Tutorial 9 _GET _POST <br> ... Tutorial 10 validaciones (Muy simples pero muy buenas, ver nuevamente si algo)';
            echo '<br> ... Tutorial del 11 al 13 más de lo mismo, pero igual muy bueno';

        ?>
        <form action="<?php echo constant('URL'); ?>basico/basicoValidacion" method="POST">
            <?php
                echo $this->validacion;
            ?>
            <p>
                Nombre:
                <input type="text" name="nombre" value="<?php echo $this->nombre ?>">
            </p>
            <p>
                Contraseña:
                <input type="password" name="contraseña">
            </p>
            <p>
                Correo-E:
                <input type="text" name="correo-e">
            </p>
            <p>
                <select name="pais">
                    <option value="" disabled selected>-- Selecciona un pais--</option>
                    <option value="co">Colombia</option>
                    <option value="mx">Mexico</option>
                    <option value="es">España</option>
                    <option value="hu">Hungrìa</option>
                    <option value="li">Lituania</option>
                </select>
            </p>
            <p>
                Nivel de desarrollo
                <br>
                <input type="radio" name="nivel" value="1"> Principiante
                <input type="radio" name="nivel" value="2"> Intermedio
                <input type="radio" name="nivel" value="3"> Avanzado
            </p>
            <input type="submit" value="Enviar">
        </form>
        <?php
            echo '<br> Tutorial 14 diferencias entre include() y require()';
            echo '<br> Tutorial 15 funciones (posible idea para el sitio visualizar código con este ejemplo como las funciones se van transformando en valores)';
            echo '<br> Tutorial 16 fechas, horas... php es bueno para manejar estos valores';
            echo '<br> Tutorial 17 qué es una base de datos';
            echo '<br> Tutorial 18 qué es phpMyAdmin ... hasta Tutorial 26 es el manejo básico de BD y phpMyAdmin';
            echo '<br> Tutorial 27 a 35 conexiòn myslqli';
        ?>

        <p>
            <?php
                echo $this->votosTotales;
                /*echo $this->votosPorcentaje;
                echo $this->idioma;*/
                echo '<br>';
                echo $this->lenguajeYPorcentaje;
            ?>
        </p>

        <form action="<?php echo constant('URL'); ?>basico/basicoEncuesta" method="POST">
            <h2>Escoge tu lenguaje de programaciòn favorito</h2>

            <input type="radio" name="lenguaje" value="c"> C
            <br>
            <input type="radio" name="lenguaje" value="c++"> C++
            <br>
            <input type="radio" name="lenguaje" value="javascript"> JavaScript
            <br>
            <input type="radio" name="lenguaje" value="java"> Java
            <br>
            <input type="radio" name="lenguaje" value="python"> Python
            <br>
            <input type="submit" value="Votar!">
        </form>


        <?php
        require 'views/layouts/footer.php';
        ?>
    </div>

</body>
</html>