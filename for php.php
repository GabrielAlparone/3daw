<doctype html>
<HTML>
    <head>
        <title> oi </title>
</head>
<body>
    <h1>bom dia</h1>
    <?php 
    echo "boa noite <br>";
    
    $preço = array("40, 45, 50");
    for ($i = 0; $i < 3; $i++)
    {
        echo "Isso custa" . $preço[$i] . "<br>";
    }
    ?>
    </body>
    </html>