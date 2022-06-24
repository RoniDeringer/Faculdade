<!DOCTYPE html>
<html>
<head>
<script>
function msg(tipo){
  if (tipo == "si")
    msgSucessoInserir();
  else if (tipo == "sa")
    msgSucessoAlterar();
  else if (tipo == "er")
    msgErro();
  else if (tipo == "se")
    msgSucessoExcluir();
}

function validaAddProd(){
            var objNome = document.getElementById("quantidade");
            if (objNome.value == ""){
              objNome.focus();
                msgValida();
                return false;
            }
            return true;
}

function msgValida(){
swal({
  title: "Campo Obrigatório",
  text: "Por favor informe o valor do campo",
  type: "error",
  timer: 2000,   
  showConfirmButton: false
});
}

function excluirRegistro(url){
swal({   
  title: "Exclusão",   
  text: "Excluir este registro?",   
  type: "warning",   
  showCancelButton: true,   
  confirmButtonColor: "#DD6B55",   
  confirmButtonText: "Sim, Delete",   
  cancelButtonText: "Não, Cancele",   
  closeOnConfirm: false,   
  closeOnCancel: true }, 
  function(isConfirm){   
    if (isConfirm) {     
      location.href = url;
    } 
  });
}

function msgErro(){
swal({
  title: "ERRO!",
  text: "Aconteceu um erro",
  type: "error",
  timer: 2000,   
  showConfirmButton: false
});
}

function msgSucessoAlterar(){
swal({
  title: "Alterado",
  text: "Registro Alterado com Sucesso!",
  type: "success",
  timer: 2000,   
  showConfirmButton: false
});
}

function msgSucessoExcluir(){
swal({
  title: "Excluído",
  text: "Registro Excluído com Sucesso!",
  type: "success",
  timer: 2000,   
  showConfirmButton: false
});
}

function msgSucessoInserir(){
swal({
  title: "Cadastrado",
  text: "Registro Salvo com Sucesso!",
  type: "success",
  timer: 2000,   
  showConfirmButton: false
});
}
</script>
<meta charset="utf-8">
<title>SweetAlert</title>
  <script src="dist/jquery-2.1.3.min.js"></script>
  <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css">
</head>
<body>
<?php 
	if (isset($_GET['msg']))
		echo '<script>msg('.$_GET['msg'].');</script>'; 
?>
</body>

</html>