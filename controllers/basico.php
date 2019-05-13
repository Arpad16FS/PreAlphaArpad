<?php

class Basico extends Controller{
    function __construct(){
        parent::__construct();

        // Funciones para strings
        $this->view->mensaje = "Este es un menasaje. Voy a aprender mucho";
        $mensaje = $this->view->mensaje;
        // Validaciòn de datos
        $this->view->validacion = '';
        $validacion = $this->view->validacion;

        $idioma = '';

        $this->view->nombre = '';
        $nombre = $this->view->nombre; // <-- Debe haber una mejor manera de conservar los datos que esta

        // Longitud
        $this->view->mensajeLength = strlen($mensaje);

        // # de palabras
        $this->view->mensajeWordCount = str_word_count($mensaje);

        // Reversar string
        $this->view->mensajeReverse = strrev($mensaje);

        // Encontrar un texto
        $this->view->mensajeWordPosition = strpos($mensaje, 'saje');

        // Remplazar texto
        $this->view->mensajeRplace = str_replace("enasaj", '<font style="color: red;">ás que un gigant</font>', $mensaje);

        //Convertir a minúsculas
        $this->view->mensajeLowCase = strtolower($mensaje);

        //Convertir a mayusculas
        $this->view->mensajeUpCase = strtoupper($mensaje);

        // Comparar strings (a nivel de bytes nos dice qué diferencia hay entre los strings)
        $this->view->strCompare = strcmp('a', 'b');

        // Substraer string
        $this->view->mensajeSubstract = substr($mensaje, 12, 17);

        // Remover espacios en blanco
        $this->view->strTrim = trim('Mira    todos          esos    espacios      papá    ', $mensaje);


        // contar elementos del array
        $this->view->frutas = ["banano", "platano", "pera", "manzana"];
        $frutas = $this->view->frutas;
        $this->view->frutasCount = count($frutas);

        // Arrays con clave => valor
        $this->view->edades = array('Laura' => 16, 'Susan' => 26, 'Marcos' => 41, 'Camila' => 22.852, 'Sara' => '55');
        $edades = $this->view->edades;

        $forEachArray = $this->view->forEachArray = "";
        foreach($edades as $key => $value){
            $this->view->forEachArray .= $key . ' tiene asignado un valor de ' . $value . '<br>';
        }

        //$votosTotales = 0;
        $this->view->votosTotales = 'Votos totales -> Solo se imprimen una vez se ejecuta el método, probablemente debido a que la app no ejecuta modelos al encontrarse en el primer parametro de la vista';
        $this->view->votosPorcentaje = '';
        //$this->view->votosTotales = 'Votos totales -> ' . $this->model->totalVotos();

    }

    function basicoValidacion(){
        // Validaciòn de datos
        $validacion = '';
        //$nombre = '';
        $contraseña = '';
        $correo = '';
        $pais = '';
        $nivel = '';

        if(isset($_POST['nombre'])){
            $nombre = $_POST['nombre'];
            $contraseña = $_POST['contraseña'];
            $correo = $_POST['correo-e'];
            $pais = $_POST['pais'];
            $nivel = $_POST['nivel'];

            if(isset($_POST['pais'])){
                $pais = $_POST['pais'];
            } else {
                $pais = '';
            }

            if(isset($_POST['nivel'])){
                $nivel = $_POST['nivel'];
            } else {
                $nivel = '';
            }

            $campos = [];

            if ($nombre == ""){
                array_push($campos, 'El campo Nombre no puede estar vacio');
            }
            if ($contraseña == "" || strlen($contraseña) < 6){
                array_push($campos, 'la Contraseña debe contener mínimo 6 caracteres');
            }
            if ($correo == "" || strpos($correo, '@') === false){
                array_push($campos, 'Ingresa un correo electrónico válido');
            }

            if ($pais == ""){
                array_push($campos, 'Selecciona un paìs');
            }

            if (empty($nivel)){
                array_push($campos, 'Selecciona un nivel');
            }

            if(count($campos) > 0) {
                $validacion .= '<div class="error">';
                for($i = 0; $i < count($campos); $i++) {
                    $validacion .= '<li>' . $campos[$i] . '</li>';
                }
            } else {
                $validacion .= '<div class="correcto">Todo bien todo bonito, "usuario creado exitosamente" [Esto es una validaciòn no se crea nada]';
            }
            $this->view->validacion = $validacion . '</div>';
        }
        $this->view->nombre = $nombre; // <-- Debe haber una mejor manera de conservar los datos que esta (Igual voy a usar AJAX ¿No?)
        $this->render();
        /* Notas de programador; ¡¡¡HIJUEPUTA VIDA!!! lo descubrí como enviar el mensaje al lugar
        que correspondía, obvio los echos no me servían este es un controlador y lo que se imprima aquí aunque
        después se envíe a la vista me sirve de forro... Pero ya, ya sé cómo manejar estas validaciones sencullas
        y el saber esto me ayuda a comprender màs los MVC*/
    }

    function basicoEncuesta() {
        $lenguaje = $_POST['lenguaje'];
        //$showResults = false;
        $idioma = '';
        $votosPorcentaje = '';
        $lenguajeYPorcentaje = '';

        if($this->model->encuestaDB([
            'lenguaje' => $lenguaje,
        ])){
            $this->view->votosTotales = '<h2>Votos totales -> ' . $this->model->totalVotos() . '</h2>';

            $lenguuajes = $this->model->resultadosDB();
            foreach($lenguuajes as $lenguuajes){
                $votosPorcentaje = $this->model->porcentajeVotos($lenguuajes['votos']);
                $widthBar = $votosPorcentaje * 5;
                $estilo = 'barra';

                if ($lenguaje == $lenguuajes['opcion']){
                    $estilo = 'seleccionado';
                }
                $idioma = $lenguuajes['opcion'];
                $divBarra = '<div class="' . $estilo . '" style="width: ' . $widthBar . 'px">';
                $lenguajeYPorcentaje .= $idioma . '<br>' . $divBarra . $votosPorcentaje . '%' . '</div>' . '<br>';
            }
            /*$this->view->idioma = $idioma;
            $this->view->votosPorcentaje = $votosPorcentaje;*/
            $this->view->lenguajeYPorcentaje = $lenguajeYPorcentaje;
        } else {
            $this->view->votosTotales = '<h2> Error al intentar la votación</h2>';
        }
        $this->render();
    }

    function render(){
        $this->view->render('basico/index');
    }

    public function saludo(){
        $this->view->mensaje =  "<p>Ejecutaste el método saludo</p>";
        $this->render();
    }

    public function __destruct() {

    }
}
?>