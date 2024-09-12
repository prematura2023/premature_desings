<?php 
require '../config/config.php';
require '../config/Database.php';

$db = new Database();
$con = $db->conectar();

$producto = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null ;

$lista_carrito = array();
if($producto != null){
foreach($producto as $clave => $cantidad){

$sql = $con->prepare("SELECT id ,nombre,precio,descuento, $cantidad AS cantidad FROM productos WHERE id =? AND activo = 1");
$sql->execute([$clave]);

$lista_carrito[] = $sql->fetch(PDO:: FETCH_ASSOC);

}


}


 ?>


<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Premature Desings</title>
    <meta id="twt-site" name="twitter:site" content="@fontawesome" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/estilos.css">
  </head>
  <header>
        <nav class="navbar navbar-expand-lg nav class="navbar bg-dark border-bottom border-body data-bs-theme="dark""">
            <div class="container-fluid">
              <a class="navbar-brand" href="../vista/index.php">Premature desings</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../vista/index.php">Inicio</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../vista/Nosotros.php">nosotros</a>
                  </li>
                  <li>
                   
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      productos
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="../vista/gorras.php">Gorras</a></li>
                      <li><a class="dropdown-item" href="../vista/camisetas.php">Camisetas</a></li>
                      <li><a class="dropdown-item" href="../vista/tenis.php">Tenis</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
               
                    <?php
                   
                    
                    if(!isset($_SESSION['user_id'])){
                     ?>
                  <a class="nav-link" aria-enabled="true" href="../login/login.php">Iniciar sesion</a>
                     
                  <?php 
                    }else{
                     ?>
                        <li class="nav-item dropdown">
                    <a class="btn btn-primary nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:auto;">
                      <?php echo $_SESSION['user_name']; ?>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="../clases/salir.php">Salir</a></li>
        
                    </ul>
                  </li>
                    <?php 
                    }
                     ?>
                  </li>
                  
                  
                   
                   
    
                </ul>
              </div>
            </div>
          </nav>
    </div>
  </header>
  <br>
  <br>
  
<main><br>
	
	<div class="container">
		<div class="table-responsive">

      <table class="table text-center">
        
        <thead>
          
         <tr>
           
          <th>producto</th>
          <th>precio</th>
          <th>cantidad</th>
          <th>subtotal</th>
          <th></th>


         </tr>

        </thead>
      
                        
             <?php if($lista_carrito == null) {
             

             echo '<tr><td colspan=5 class="text-center"><b>lista vacia</b></td></tr>';
          } else {
            $total = 0;
            foreach($lista_carrito as $producto){ 
              $id_producto = $producto['id'];
              $nombre = $producto['nombre'];
              $precio = $producto['precio'];
              $cantidad = $producto['cantidad'];
              $descuento = $producto['descuento'];
              $precio_des = $precio - (($precio * $descuento) / 100) ;
              $subtotal = $cantidad * $precio_des;
              $total += $subtotal;
        
           
?>
              <tbody>
            <tr>
              
              <td><?php echo $nombre ?></td>
              <td><?php echo MONEDA  . number_format( $precio_des,2,',','.'); ?></td>
             
              <td><input type="number"  min="1" max="10" step="1"  size="5"  value="<?php echo $cantidad; ?>" id="<?php echo $id_producto;?>" onchange="actualizar_cant(this.value, <?php echo $id_producto;  ?>)"></td>
              <td><div id="subtotal_<?php echo $id_producto; ?>" name="subtotal[]">
                <?php echo MONEDA . number_format( $subtotal,2,',','.');   ?>

              </div>
            </td>
            <td><a href="#" id="eliminar" class="btn btn-danger btn-sm" data-bs-id="<?php echo $id_producto; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal">Eliminar</a></td>
            </tr>
           <?php } ?>
         <tr>
           <td colspan="3"></td>
           <td colspan="2">
             <p class="h3" id="total"><strong>ToTal Compra </strong><?php echo MONEDA  . number_format( $total,2,',','.'); ?> </p>
           </td>
         </tr>
           </tbody> 
         <?php } ?>
      </table>
      
    </div>
      <?php if($lista_carrito != null) { ?> 
		<div class="row">
    <div class="col-md-5 offset-md-7 d-grid gap-2">
      <a href="pago.php"><button class="btn btn-primary btn-lg" style="padding: 5px;"><i class="fa fa-credit-card" aria-hidden="true"></i>  Realizar Pago</button> </a>
    </div>  
    </div>
  <?php } ?>
	</div>

</main>

<!-- Modal -->
<div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModal" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header " >
        <h5 class="modal-title text-center" id="eliminaModal">¿Alerta?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <strong>¿desea eliminar este producto de la lista?</strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">cerrar</button>
        <button type="button" class="btn btn-danger" id="btn-eliminar" onclick="eliminar()">Eliminar</button>
      </div>
    </div>
  </div>
</div>

<!-- 
<div id="paypal-button-container"></div>-->
<script >
	paypal.Buttons({
          
              style: {
                color: "blue",
                shape: "pill",
                label:'pay'
              
              },
               createOrder: function(data, actions) { 
                return actions.order.create({
                    purchase_units: [
                          {
                              amount: {
                                  value: 100
                              }
                          }
                      ]


                });


               },
                onApprove: (data, actions) => {
                    actions.order.capture().then( function(detalles){
                       console.log(detalles);
                       window.location.href="deatelles.html";
                    });
              },
               onCancel: function(data){
              
               	Swal.fire("mensaje de advertencia","pago cancelado","warning");
               	console.log(data);
               }

              
          }).render('#paypal-button-container');
</script>

<script>  

  let eliminaModal = document.getElementById('eliminaModal')
  eliminaModal.addEventListener('show.bs.modal', function(event){
    let button = event.relatedTarget
    let id = button.getAttribute('data-bs-id')
    let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-eliminar')
    buttonElimina.value = id 
  })
function actualizar_cant(cantidad, id){

  let url = '../clases/actualizar_carrito.php'
  let formData = new FormData()
  formData.append('action','agregar')  
  formData.append('id',id)
  formData.append('cantidad',cantidad)

  fetch(url,{
    method:'POST',
    body:formData,
    mode:'cors' 
  }).then(response => response.json())
  .then(data =>{
    if (data.ok) {
      let divsubtutal = document.getElementById('subtotal_' + id)
      divsubtutal.innerHTML = data.sub

      let total = 0.00
      let list = document.getElementsByName('subtotal[]')
      for(let i =0; i < list.length; i++){
        total += parseFloat(list[i].innerHTML.replace(/[$,.]/g, ''))
      }
      total = new Intl.NumberFormat('en-US',{
        minimumFractionDigits: 2
      }).format(total)
      document.getElementById('total').innerHTML = ' <strong>ToTal Compra </strong><?php echo MONEDA; ?>' + total
      location.reload()
    }
  })

}
function eliminar(){
let botonElimina = document.getElementById('btn-eliminar')
let id = botonElimina.value

  let url = '../clases/actualizar_carrito.php'
  let formData = new FormData()
  formData.append('action','eliminar')  
  formData.append('id',id)
 

  fetch(url,{
    method:'POST',
    body:formData,
    mode:'cors' 
  }).then(response => response.json())
  .then(data =>{
    if (data.ok) {
       location.reload()
    }
  })
  location.reload();
}

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="assets/vendor/select2/select2.min.js"></script>
<script src="assets/vendor/sweetalert2/sweetalert2.js"></script>

  

</body>


</html>