<?php include 'includes/redirect.php';?>
<?php require_once("includes/header.php")?>
<?php
function mostrarError($error, $field){
  if(isset($error[$field]) && !empty($field)){
    $alerta='<div class="alert alert-danger">'.$error[$field].'</div>';
  }else{
    $alerta='';
  }
  return $alerta;
}
function setValueField($datos,$field, $textarea=false){
  if(isset($datos) && count($datos)>=1){
    if($textarea != false){
      echo $datos[$field];
    }else{
      echo "value='{$datos[$field]}'";
    }
  }
}
//Buscar Usuario
if(!isset($_GET["id"]) || empty($_GET["id"]) || !is_numeric($_GET["id"])){
  header("location:index.php");
}
$id=$_GET["id"];
$user_query=mysqli_query($db, "SELECT * FROM usuario WHERE idusuario={$id}");
$user=mysqli_fetch_assoc($user_query);
if(!isset($user["idusuario"]) || empty($user["idusuario"])){
  header("location:index.php");
}
//Validar usuario
$error=array();
if(isset($_POST["submit"])){
  if(!empty($_POST["documento"])){
  $documento_validador=true;
  }else{
  $documento_validador=false;
  $error["documento"]="El documento no es válido";
  }
 if(!empty($_POST["nombre"]) && strlen($_POST["nombre"]<=20) && !is_numeric($_POST["nombre"]) && !preg_match("/[0-9]/", $_POST["nombre"])){
$nombre_validador=true;
}else{
$nombre_validador=false;
$error["nombre"]="El nombre no es válido";
}
  if(!empty($_POST["apellidos"])&& !is_numeric($_POST["apellidos"]) && !preg_match("/[0-9]/", $_POST["apellidos"])){
      $apellidos_validador=true;
     }else{
     $apellidos_validador=false;
       $error["apellidos"]="Los apellidos no son válidos";
        }
        if(!empty($_POST["direccion"])){
          $direccion_validador=true;
          }else{
          $direccion_validador=false;
          $error["direccion"]="La direccion no puede ir vacia";
          }
          if(!empty($_POST["acudiente"])&& !is_numeric($_POST["acudiente"]) && !preg_match("/[0-9]/", $_POST["acudiente"])){
        $acudiente_validador=true;
           }else{
          $acudiente_validador=false;
          $error["acudiente"]="el acudiente no es válidos";
          }
          if(!empty($_POST["telefono"])){
            $telefono_validador=true;
           }else{
           $telefono_validador=false;
          $error["telefono"]="El telefono no es válido";
            }
       if(isset($_POST["instrumento"]) && is_numeric($_POST["instrumento"])){
         $role_validador=true;
        }else{
        $role_validador=false;
         $error["instrumento"]="Seleccione un instrumento de usuario";
          }
        //colocar entre comentarios par activar la actualización
     //if(!empty($_POST["password"]) && strlen($_POST["password"]>=6)){
       //$email_validador=true;
      //}else{
      //$email_validador=false;
       //$error["password"]="Introduzca una contraseña de más de seis caracteres";
        //}
        $image=null;
        if(isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])){
          if(!is_dir("uploads")){
            $dir = mkdir("uploads", 0777, true);
          }else{
            $dir=true;
          }
          if($dir){
            $filename= time()."-".$_FILES["image"]["name"]; //concatenar función tiempo con el nombre de imagen
            $muf=move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/".$filename); //mover el fichero utilizando esta función
            $image=$filename;
            if($muf){
              $image_upload=true;
            }else{
              $image_upload=false;
              $error["image"]= "La imagen no se ha subido";
            }
          }
          //var_dump($_FILES["image"]);
          //die();
  	 	}
    //Actualizar Usuarios en la base de Datos
    if(count($error)==0){
      $sql= "UPDATE usuario set documento='{$_POST["documento"]}',"
      . "nombre= '{$_POST["nombre"]}',"
      . "apellidos= '{$_POST["apellidos"]}',"
      . "instrumento= '{$_POST["instrumento"]}',"
      . "direccion= '{$_POST["direccion"]}',"
      . "acudiente= '{$_POST["acudiente"]}',"
      . "telefono= '{$_POST["telefono"]}',";
     //Código nuevo
     if(isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])){
       $sql.= "image='{$image}', ";
    }
        $user_query=mysqli_query($db, "SELECT * FROM usuario WHERE idusuario={$id}");
        $user=mysqli_fetch_assoc($user_query);
    }
}
?>
<h2>Editar Usuario <?php echo $user["idusuario"]."-".$user["nombre"]." ".$user["apellidos"];?></h2>
<?php if(isset($_POST["submit"]) && count($error)==0){?>
  <div class="alert alert-success">
    El usuario se ha actualizado correctamente !!
  </div>
<?php }elseif(isset($_POST["submit"])){?>
  <div class="alert alert-danger">
    El usuario NO se ha actualizado correctamente !!
  </div>
<?php } ?>
<form action="crear.php" method="POST" enctype="multipart/form-data">
<label for="documento">Documento:
<input type="text" name="documento" class="form-control" <?php setValueField($error, "documento");?>/>
<?php echo mostrarError($error, "documento");?>
</label>
</br></br>
  <label for="nombre">Nombre:
  <input type="text" name="nombre" class="form-control" <?php setValueField($error, "nombre");?>/>
  <?php echo mostrarError($error, "nombre");?>
  </label>
  </br></br>
  <label for="apellidos">Apellidos:
      <input type="text" name="apellidos" class="form-control" <?php setValueField($error, "apellidos");?>/>
      <?php echo mostrarError($error, "apellidos");?>
  </label>
  </br></br>
  <label for="instrumento" class="form-control">Instrumento:
      <select name="instrumento">
      <option value="0"></option>
          <option value="1">Trompeta</option>
      <option value="2">Clarinete</option>
      <option value="3">Saxofon</option>
      <option value="4">Oboe</option>
      <option value="5">Violin</option>
      <option value="6">Bombo</option>
      <option value="7">Corno frances</option>
      </select>
      <?php echo mostrarError($error, "instrumento");?>
  </label>
  </br></br>
  <label for="direccion">Direccion:
      <input type="text" name="direccion" class="form-control" <?php setValueField($error, "direccion");?>/>
      <?php echo mostrarError($error, "direccion");?>
  </label>
  </br></br>
  <label for="acudiente">Acudiente:
      <input type="text" name="acudiente" class="form-control" <?php setValueField($error, "acudiente");?>/>
      <?php echo mostrarError($error, "acudiente");?>
  </label>
  <br></br>
  <label for="telefono">Telefono:
      <input type="text" name="telefono" class="form-control" <?php setValueField($error, "telefono");?>/>
      <?php echo mostrarError($error, "telefono");?>
  </label>
  </br></br>
  <label for="image">Imagen:
      <input type="file" name="image" class="form-control"/>
  </label>
  </br></br>
  <input type="submit" value="Enviar" name="submit" class="btn btn-success"/>
</form>
<?php require_once("includes/footer.php")?>
