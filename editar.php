<?php include 'template/header.php'?>

<?php 
    if(!isset($_GET['id'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $id = $_GET['id'];
 
    $sentencia = $bd->prepare("select * from producto where id = ?;");
    $sentencia->execute([$id]);
    $producto = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($producto);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $producto->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Talla: </label>
                        <input type="number" class="form-control" name="txtTalla" autofocus required
                        value="<?php echo $producto->talla; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio: </label>
                        <input type="number" class="form-control" name="txtPrecio" autofocus required
                        value="<?php echo $producto->precio; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cantidad: </label>
                        <input type="number" class="form-control" name="txtCantidad" autofocus required
                        value="<?php echo $producto->cantidad; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id" value="<?php echo $producto->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Guardar Edicion">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php'?>