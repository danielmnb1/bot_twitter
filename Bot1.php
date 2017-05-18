<?php
//cargar config archivos externos
require_once 'libs/twitteroauth.php';
require_once('config/config.php');
require_once('config/configdb.php');
require_once('Bot1Respuestas.php');



function search(array $query)
{
  $toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
  return $toa->get('search/tweets', $query);
}

//busca 5 resultados con el tag # Pueden ser más de 5 pero no abusar de las busquedas el -RT signiica que va a ignorar los retwwets
$query = array(
	"q" => "-RT necesito un abrazo",
        "count" => 5,
        "result_type" => "recent",	
);
  
$results = search($query);

//por cada uno de los 5 resultados bueca en la base de datos si encuentra ya el id del tweet registrado en la bd
foreach ($results->statuses as $result) {
	$txt = $result->id;
	$nick = $result->user->screen_name;
	if ($result = mysqli_query($conn, "SELECT * from id_respuestas8b WHERE id_tweet = $txt")) {

//Obtener resultado si encuentra coincidencias con el id de tweet
	    $row_cnt = mysqli_num_rows($result);
	    mysqli_free_result($result);
		}
//Si encuentra un resultado mayor a 1 no envia el tweet
		if ($row_cnt > 0) {
			echo "No va a enviar el tweet \n";
		}
		else {
// por el contrario si encuentra un valor menor a 1 va a enviar el tweet
		  	echo "envia el tweet \n";
			$toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
			$toa->post('statuses/update', array('status' => ". @$nick, $respuesta", 'in_reply_to_status_id' => $txt));
			mysqli_query($conn,"INSERT INTO id_respuestas8b (id_tweet, tweet_nombre)VALUES ('$txt', '$nick')");
		}
}

// cerrar la conexion a la bd con cada consulta
mysqli_close($conn);
?>
