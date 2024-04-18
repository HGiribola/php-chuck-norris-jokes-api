<?php

    function chucknorris($query) {

        $api_url = "https://api.chucknorris.io/jokes/search?query=", urlencode($query);
        $response = file_get_contents($api_url);
        return json_decode($response, true);

    }

    if(isset($_GET['query'])) {

        $query = $_GET['query'];
        $results = chuckNorrisJoke($query);

        if(isset($results['result'])) {

            $output = "<h2>Results for '{$query}':</h2>";
            foreach ($results['result'] as $result) 
            {
                $output .= "<p>{$result['value']}</p>";
            }

        }

        else {
            $output = "<p>No jokes found for '{$query}'</p>";
        }

    }

>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuck Norris API</title>

</head>

<body>

    <h1>Chuck Norris Jokes</h1>

    <form action="" method="GET">
        <input type="text" name="query" placeholder="Pesquise por uma piada">
        <button type="submit">Search</button>
    </form>

</body>

<?php 
    if(isset($output)) {
        echo $output;
    }
?>

</html>     
