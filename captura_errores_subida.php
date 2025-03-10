if (empty($_FILES["fichero"]["name"]))
{
  header("Location: index.php");
  die;
}

// Comprobamos si el fichero se puede subir sin error
if ($_FILES["fichero"]["error"] != UPLOAD_ERR_OK)
{
  $error = $_FILES["fichero"]["error"];	
  if ($error = 2 or $error = 1)
  {
    $_SESSION["Mensaje_Error"] = "El tamaño máximo permitido para el documento adjunto es de 2MB. Reduzca el tamaño de las imágenes o del archivo antes de adjuntarlo.";
    header("Location: index.php?codigo={$_POST["cod"]}");
    die;
  }  
  if ($error = 3)
  {
    $_SESSION["Mensaje_Error"] = "No se ha podido subir el fichero completo. Cierre sesión y vuelva a intentarlo. Recuerde que no se pueden subir ficheros de más de 2MB de tamaño.";
    header("Location: index.php?codigo={$_POST["cod"]}");
    die;
  }
  if ($error = 4)
  {
    $_SESSION["Mensaje_Error"] = "No se ha elegido ningún archivo para subir.";
    header("Location: index.php?codigo={$_POST["cod"]}");
    die;
  }
  if ($error = 6)
  {
    $_SESSION["Mensaje_Error"] = "No se ha podido subir el archivo. Carpeta temporal no válida.";
    header("Location: index.php?codigo={$_POST["cod"]}");
    die;
  }		
  if ($error = 7)
  {
    $_SESSION["Mensaje_Error"] = "No se ha podido subir el archivo. No se ha podido escribir en el disco del servidor.";
    header("Location: index.php?codigo={$_POST["cod"]}");
    die;
  }
  if ($error = 8)
  {
    $_SESSION["Mensaje_Error"] = "No se ha podido subir el archivo. Un complemento detuvo la carga.";
    header("Location: index.php?codigo={$_POST["cod"]}");
    die;
  }	
}

$tamano_archivo = ($_FILES["fichero"]["size"]);

if ($tamano_archivo > $_POST["MAX_FILE_SIZE"])
{
    $_SESSION["Mensaje_Error"] = "El tamaño máximo permitido para el documento adjunto es de 2MB.";
    header("Location: index.php?codigo={$_POST["cod"]}");
    die;
}

if ($tamano_archivo == 0)
{
    $_SESSION["Mensaje_Error"] = "El documento que intenta adjuntar está vacío o tiene algún error.";
    header("Location: index.php?codigo={$_POST["cod"]}");
    die;
}