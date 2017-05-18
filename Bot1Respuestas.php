<?php

//Aquí pueden agregarse más emojis buscandolos en google
$entrada = array("**abracito**", "*abrazote*","**super abrazo**","**abrazin**","**mega abrazo*","**abrazo de oso**","*abrazo fuerte **");
$claves_aleatorias = array_rand($entrada);

$entrada2 = array(" 😊 "," ☺ "," 😚 "," 😸 "," ✌ "," 😋 "," 😊 "," ☺ "," 😚 "," ✌ "," 😋 "," 🍀 "," 🌻 "," 🌺 "," 🍁 "," 🍄 "," 🐣 ");
$claves_aleatorias2 = array_rand($entrada2);

$respuesta2=$entrada2[$claves_aleatorias2];

echo $respuesta =$respuesta2.$entrada[$claves_aleatorias];

?>
