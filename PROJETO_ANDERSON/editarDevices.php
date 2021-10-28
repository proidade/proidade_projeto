<?php
   include 'connectionMysqlProage.php';
 ?>   
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>Document</title>
    <style>
        body{
            
            background-repeat: no-repeat;
            background-size:100%;
            }
    </style>
</head>
<body>
  <h1> <center> Usuários cadastrados: </center> </h1>
  <table border="1px" cellpadding="4px" cellspacng="1px" bgcolor="#FFD700">
    <tr>
        <td><b>id:</b></td>
        <td><b>Nome:</b></td>
        <td><b>Part_number:</b></td>
    </tr>  
    <?php
       include('conexaoPro.php');
        $identificador = $_GET['id'];
        echo $identificador."<br>";
        $busca = "SELECT * FROM devices WHERE id = '$identificador'";
        echo $busca;

        $sql = mysqli_query($connectionMysqlProage,$busca);
        
                while($linha = mysqli_fetch_array($sql)){
                    
                    $id = $linha['id'];
                    $name = $linha['name'];
                    echo $name;
                    $part_number = $linha['part_number'];
                  
                    
                    echo ("
                    <form action='SalvaEdicaoDevices.php' method='POST'>
                    <tr>
                        <td>
                            <input type='text' value='". $id . "' disabled />
                            <input type='hidden' name='id' value='" . $id . "' /> 
                        </td>
                        
                        <td>
                            Nome:<input type='text' name='name' value = '" . $name . "' /> 
                        </td>
                        
                        <td>
                            Valor: <input type='text' name='part_number' value = '" . $part_number . "' /><br />
                        </td>
                        <input type='submit' value='Salvar' > 
                        </td>
                    </tr>
                    </form>
                    ");

                }
            
            ?>
        </table>
  
</body>
</html>