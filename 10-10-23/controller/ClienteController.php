<?php
require_once 'Controller.php';
require_once 'db/datos.php';

class ClienteController implements Controller{

    /**
     * Funcion que recoge todos los clientes y los muestra en una vista
     */
    public static function index(){
        $clientes = $GLOBALS['Clientes'];
        if(isset($_GET['orden'])){
            if($_GET['orden'] == 'asc'){
                # ¿?
            }else{
                $clientes = array_reverse($GLOBALS['Clientes']);
            }
        }
        include 'view/cliente/index.php';
    }

    public static function create(){
        include 'view/cliente/create.php';
    }

    public static function save(){
        if(isset($_POST)){
            $cliente = array(
                'nombre' => $_POST['nombre'],
                'dni' => $_POST['dni'],
                'telefono' => $_POST['telefono'],
                'correo' => $_POST['correo']
            );
            array_push($GLOBALS['Clientes'], $cliente);
        }
        header('Location: ?controller=cliente&function=index');
    }

    public static function edit($id){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $clientes = $GLOBALS['Clientes'];
            foreach ($clientes as $key => $value) {
            if($key == $id){
                #PINTO
                $clientes = $value;
            }
        }
        }
        include 'view/cliente/edit.php';
    }

    public static function update($id){

        /**
         * PASOS
         * 1. Recoger el valor $id y comprobar si lo recibo correctamente
         * 2. Comprobar que recibo los valores del formulario.
         * 3. Cambiar los elementos del cliente
         * 4. Retornar al index de clientes
         */
        $nombre = $_POST['nombre'];
        $dni = $_POST['dni'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];

        /**
         * Necesito actualizar marca, modelo y matricula
         * del array de clientes.
         * ¿Como lo hago?
         * 1. Recorre el array de clientes (foreach).
         * 2. El cliente con clave $id es el que modifico.
         * 3. Actualizo DIRECTAMENTE los elementos de ese cliente.
         * 4. Volver al index
         */
        foreach ($GLOBALS['Clientes'] as $key => $value) {
            if($key == $id){
                # Si la clave es la misma que el id, ACTUALIZO
                $GLOBALS['Clientes'][$key]['nombre'] = $nombre;
                $GLOBALS['Clientes'][$key]['dni'] = $dni;
                $GLOBALS['Clientes'][$key]['telefono'] = $telefono;
                $GLOBALS['Clientes'][$key]['correo'] = $correo;
            }else{
                # OPCIONAL: mensaje de retorno de NO PODER ACTUALIZAR por no encontrar el cliente.
            }
        }
        ClienteController::index();
    }

    public static function destroy($id){
        
        /**
         * En destroy eliminamos el elemento del array $GLOBALS['clientes']
         * que tenga el $id recibido.
         * 
         * PASOS
         * 1. Recibod id?
         * 2. Existe el id en clientes? (metodo de php para ver si esta contenido?)
         * 2.1. Si existe, elimino. (metodo de php para eliminar?)
         * 2.2. Si no existe, no elimino (posible mensaje de retorno de error por no existir)
         */

        /**
          * Utilizamos el metodo array_key_exists(CLAVE, ARRAY)
          *
          * array_key_exists() vs isset()
          *
          * isset() no retorna true para claves de array que correspondan a un valor null, mientras que array_key_exists() si lo hace.
          */

        //   var_dump(array_key_exists($id, $GLOBALS['clientes']));
        //   exit();

    # Si existe el id que recibo, elimino
        if(array_key_exists($id, $GLOBALS['Clientes'])){
            // var_dump($GLOBALS['clientes']);
            unset($GLOBALS['Clientes'][$id]);
            // var_dump($GLOBALS['clientes']);
        }else{
            # Aqui la respuesta cuando no existe y por tanto no puedo eliminar
            $GLOBALS['error'] = "No se encuentra el cliente";
        }
        ClienteController::index();
    }
}
?>