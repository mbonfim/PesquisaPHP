<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <button id="btn1">Voltar1</button>
    <br>
    <button id="btn2">Voltar2</button>
    <br>

<script>
    document.getElementById('btn1').addEventListener('click', ()=>{
        history.go(-1);
    });
    document.getElementById('btn2').addEventListener('click', ()=>{
        history.go(-2);
    });
</script> -->


<?php
    // echo $_POST['fileContent']
    // echo json_encode(["fileContent1" => $_POST['fileContent']]);

    // $myObj->fileContent = json_decode($_POST['fileContent']);
    // $myJSON = json_encode($myObj);
    // echo $myJSON;
    // echo "<br>";

?>

<?php
    // $response = file_get_contents('http://cyberpolos.com.br');
    // echo $response;
    
    function CallAPI($method, $url, $data = false)
    {
        $curl = curl_init();
    
        switch ($method)
        {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
    
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }
    
        // Optional Authentication:
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "username:password");
    
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
        $result = curl_exec($curl);
    
        curl_close($curl);
    
        return $result;
    }

    // echo CallAPI('GET', 'http://www.cyberpolos.com.br');
    $appKey = 'aipbot';

    $url = 'https://us-central1-cloudpoint-cd0b7.cloudfunctions.net/nc/diagramagent?appKey=aipbot&ncUser=mbonfim@gmail.com&agentId=teste4';
    // $data = json_encode(array("fileContent1" => $_POST['fileContent']));
    // $data->fileContent = json_decode($_POST['fileContent']);
    $data->fileContent = $_POST['fileContent'];
    $myJSON = json_encode($data);

    echo CallAPI('POST', $url, $data);

?>

<!-- 
</body>
</html> -->