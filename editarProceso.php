<?php
    print_r($_POST);
    if(!isset($_POST['id'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $id = $_POST['id'];
    $nombre = $_POST["txtNombre"];
    $talla = $_POST["txtTalla"];
    $precio = $_POST["txtPrecio"];
    $cantidad = $_POST["txtCantidad"];


    $sentencia = $bd->prepare("UPDATE producto SET nombre = ?, talla = ?, precio = ?, cantidad = ? where id = ?;");
    $resultado = $sentencia->execute([$nombre, $talla, $precio, $cantidad, $id]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>
<?php include 'template/footer.php' ?>