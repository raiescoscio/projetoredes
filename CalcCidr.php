<?php include 'classes/class_calc_ipv4.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">

    <title>Cálculo de máscara de sub-rede IPv4</title>

    <link rel="stylesheet" type="text/css" href="estiloCidr.css">
</head>
<body>
<div>

    <section>


    <form method="POST">
        <br><b style="color: #0B486B" >Endereço IP/CIDR</b> (Ex.: 192.168.0.1/24) <br>
        <input style="border:2px solid #0B486B; line-height: 2; padding: 0 5px; width: 200px;" type="text" name="ip" value="<?php echo @$_POST['ip'];?>">
        <input style="border:1px solid #0B486B; background: #0B486B; color: white; font-weight: 700; cursor: pointer; line-height: 2; padding: 0 5px;" type="submit" id="botaoCalcular" value="Calcular">
    </form>

<?php
if ( $_SERVER['REQUEST_METHOD'] === 'POST' && ! empty( $_POST['ip'] ) ) {
    $ip = new calc_ipv4( $_POST['ip'] );

    if( $ip->valida_endereco() ) {
        echo '<h2>Dados referente à rede <span style="color: #0B486B">' . $_POST['ip'] . '</span> </h2>';
        echo "<pre class='resultado'>";

        echo "<b>Endereço: </b>" . $ip->endereco() . '<br>';
        echo "<b>Prefixo CIDR: </b>/" . $ip->cidr() . '<br>';
        echo "<b>Primeiro Ip: </b>" . $ip->primeiro_ip() . '<br>';
        echo "<b>Último Ip: </b>" . $ip->ultimo_ip() . '<br>';
        echo "<b>Máscara de sub-rede: </b>" . $ip->mascara() . '<br>';
        echo "<b>Broadcast da Rede: </b>" . $ip->broadcast() . '<br>';
        echo "<b>Total de Ips:  </b>" . $ip->total_ips() . '<br>';
        echo "<b>Hosts: </b>" . $ip->ips_rede();
        echo "</pre>";
    } else {
        echo ':( Endereço inválido! Tente outro brô! ';
    }
}
?>
   </section>

            <a href="InicioMenu.php">
                <input type="button" id="voltarInicio" value="<< Voltar | Página Inical "/> </label>
            </a>
</div>

</body>
</html>

