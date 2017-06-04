<?php

require_once 'conn.php';

function getRanking() {

    $con = conectar();
    $query = mysqli_query($con, 'select concierto.id_concierto, concierto.nombre,concierto.fecha, concierto.desc, concierto.id_ciudad, valora.val 
from concierto 
inner join valora 
on valora.id_concierto = concierto.id_concierto 
where concierto.id_concierto !=
	(select concierto.id_concierto from concierto inner join valora 
on valora.id_concierto = concierto.id_concierto group by concierto.nombre 
order by valora.val desc limit 1) 
group by concierto.nombre 
order by valora.val desc limit 4');

    return $query;
}

function TodosConciertos() {

    $con = conectar();
    $query = mysqli_query($con, 'select * from concierto where fecha < now()');

    return $query;
}

function TodosConciertosFuturos() {
    $con = conectar();
    $query = mysqli_query($con, 'select * from concierto where fecha > now()');

    return $query;
}
function verificarasis($username, $id_concierto) {
     $con = conectar();
    $query = "select * from acude where musico_username='$username' 
            and id_concierto='$id_concierto'";
    $resultado = mysqli_query($con, $query);
    $filas = mysqli_num_rows($resultado);
    //desconectar($con);
    if ($filas > 0) {
        return true;
    } else {    // Este else no hace falta
        return false;
    }
}
function insertarasistencia($musico_username, $id_concierto) {
    
    $con = conectar();
    
    $insert = "insert into acude values ('$musico_username','$id_concierto','0') ";
    
     if (mysqli_query($con, $insert)) {
        
      
    } else {
        
        echo mysqli_error($con);
    }
}
function quitarasistencia($musico_username, $id_concierto) {
    
    $con = conectar();

    $delete = "delete from acude where musico_username= '$musico_username' AND id_concierto='$id_concierto'";
     if (mysqli_query($con, $delete)) {
        
      
    } else {
        
        echo mysqli_error($con);
    }
}
function ConciertosApuntados($musico_username) {
    $con = conectar();
    $query = mysqli_query($con, "SELECT * FROM concierto where local_username =(select local_username from local where nombrec = (select nombrec from musico where musico_username = '$musico_username'))");

    return $query;
}

function TodosMusicos() {

    $con = conectar();
    $query = mysqli_query($con, 'select * from musico');

    return $query;
}

function getMejorConcierto() {

    $con = conectar();
    $query = mysqli_query($con, 'select concierto.nombre, valora.val 
from concierto 
inner join valora 
on valora.id_concierto = concierto.id_concierto  
group by concierto.nombre 
order by valora.val desc limit 1');

    return $query;
}

function getConcierto() {
    $con = conectar();
    $query = mysqli_query($con, 'select * from concierto order by fecha asc LIMIT 12');
    return $query;
}

function votar($id_concierto, $user) {
    $con = conectar();
    $query = mysqli_query($con, "insert into valora(fan_username, id_concierto, val) values ('" . $user . "','" . $id_concierto . "',1)");
    return $query;
}

function apuntarse($id_concierto, $user) {
    $con = conectar();
    $query = mysqli_query($con, "insert into acude(musico_username, id_concierto) values ('" . $user . "','" . $id_concierto . "')");
    return $query;
}

function votarmusico($musico_username, $user) {
    $con = conectar();
    $query = mysqli_query($con, "insert into valora (fan_username, musico_username, val) values ('$user','$musico_username',1)");
    return $query;
}

function suma($id_concierto) {
    $con = conectar();
    $query = mysqli_query($con, "select sum(val) as suma from valora where id_concierto='$id_concierto'");
    return $query;
}

function sumamusico($musico_username) {
    $con = conectar();
    $query = mysqli_query($con, "select sum(val) as sum from valora where musico_username='$musico_username'");
    return $query;
}

function revisar($id_concierto, $user) {
    $con = conectar();
    $query = "SELECT * FROM valora where fan_username = '$user' and id_concierto = '$id_concierto'";
    $resultado = mysqli_query($con, $query);
    $filas = mysqli_num_rows($resultado);

    if ($filas > 0) {
        return true;
    } else {    // Este else no hace falta
        return false;
    }
}

function revisarAcude($id_concierto, $user) {
    $con = conectar();
    $query = "SELECT * FROM acude where musico_username = '$user' and id_concierto = '$id_concierto'";
    $resultado = mysqli_query($con, $query);
    $filas = mysqli_num_rows($resultado);
    if ($filas > 0) {
        return true;
    } else {    // Este else no hace falta
        return false;
    }
}

function revisarmusico($musico_username, $user) {
    $con = conectar();
    $query = "SELECT * FROM valora where fan_username = '$user' and musico_username = '$musico_username'";
    $resultado = mysqli_query($con, $query);
    $filas = mysqli_num_rows($resultado);

    if ($filas > 0) {
        return true;
    } else {    // Este else no hace falta
        return false;
    }
}

function BorrarConcierto($id_concierto) {
    $con = conectar();
    $delete = "delete from concierto where id_concierto='$id_concierto'";
    if (mysqli_query($con, $delete)) {
        echo "Concierto borrado.";
    } else {
        echo mysqli_error($con);
    }
}

function BorrarValora($id_concierto) {
    $con = conectar();
    $delete = "delete from valora where id_concierto='$id_concierto'";
    if (mysqli_query($con, $delete)) {
        echo "";
    } else {
        echo mysqli_error($con);
    }
}function BorrarAcude($id_concierto) {
    $con = conectar();
    $delete = "delete from acude where id_concierto='$id_concierto'";
    if (mysqli_query($con, $delete)) {
        echo "";
    } else {
        echo mysqli_error($con);
    }
}
function selectAllConciertos($username) {
        echo '<script>console.log("llego")</script>';
    $con = conectar();
    $select = "select * from concierto where local_username='$username' and fecha between now() and '3000-01-01'";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    echo '<script>console.log("llego")</script>';
    echo mysqli_error($con);
    $resu = json_encode(mysqli_fetch_array($resultado));
    echo "<script>console.log('".$resu."')</script>";
// devolvemos el resultado
    return $resultado;
}

function verificarUser($username, $pass) {
    $con = conectar();
    $query = "select * from usuario where username='$username'";
    $resultado = mysqli_query($con, $query);
    $filas = mysqli_num_rows($resultado);
    
    if ($filas > 0) {
        //comprobamos que la contraseña es correcta
        $fila = mysqli_fetch_array($resultado);
        extract($fila);
//        if(password_verify($pass, $password)){   
//        }else{
//            return true;
//        }
        return password_verify($pass, $password);
    } else {    // Este else no hace falta
        return false;
    }
}
function vericarContra($username, $pass) {
    $con = conectar();
    $query = "select password from usuario where username='$username'";
    $resultado = mysqli_query($con, $query);
    
    
    if ($pass==$resultado) {
        
        return true;
    } else {    // Este else no hace falta
        return false;
    }
}

function updateUser($username, $npass) {
    $con = conectar();
    $update = "update usuario set password='$npass' where username='$username'";
    if (mysqli_query($con, $update)) {
        echo "<div id='modificar'>";
        echo "<script>alert('ya estas apuntado')</script>";
        echo "<a href='index.php'>menu principal</a>";
        echo"</div>";
    } else {
        echo mysqli_error($con);
    }
}

function getUser($username) {
    $con = conectar();
    $query = "select * from usuario where username='$username'";
    $resultado = mysqli_query($con, $query);

    return $resultado;
}

?>