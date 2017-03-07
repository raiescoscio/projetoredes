<?php include 'classes/class_calc_ipv4.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">

    <title>Cálculo de máscara de sub-rede IPv4</title>
    <link rel="stylesheet" type="text/css" href="estiloDescoberta.css">

</head>
<body>

<div>

    <section>

    <form method="POST">
        <br><b style="color: #0B486B">ENDEREÇO IP/CIDR</b> <br>
        <input style="border:2px solid #0B486B; line-height: 2; padding: 0 5px; width: 200px;" type="text" name="ip" placeholder="Ex.: 192.168.0.1/24" value="<?php echo @$_POST['ip'];?>">
        <br>
        <b style="color: #0B486B">MÁSCARA</b>  <br>
            <input style="border:2px solid #0B486B; line-height: 2; padding: 0 5px; width: 200px;" type="text" placeholder="Ex.: 255.255.255.0" name="mask"><br> <br>
        <input style="border:1px solid #0B486B; background: #0B486B; color: white; font-weight: 700; cursor: pointer; line-height: 2; padding: 0 5px;" type="submit" id="btCalcular" value="Calcular">
    </form>

<?php
if ( $_SERVER['REQUEST_METHOD'] === 'POST' && ! empty( $_POST['ip'] ) ) {
    $ip = new calc_ipv4( $_POST['ip'] );

    if( $ip->valida_endereco() ) {
        echo '<h2>Rede a qual o endereço <span style="color: #0B486B;">' . $_POST['ip'] . '</span> pertence. </h2>';
        echo "<pre class='resultado'>";

        echo "<b> Rede: </b>" . $ip->rede() . '/' . $ip->cidr() . '<br>';

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

