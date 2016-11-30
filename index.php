<?php
//ini_set('display_errors', 1);
//require 'vendor/autoload.php';
//require 'classes/EntityFactory.php';

function __autoload($class){
    $class = 'classes/' . str_replace('\\', '/', $class) . '.php';
    if(file_exists($class)) {
        require $class;
    } else {
        var_dump($class); //die();
    }

}

$book = \Factory\EntityFactory::get('book');
//$book->comment= 'Gotlib';  | la propriété n'est pas définie dans la classe mais php ne lève aucune erreur! flexibilité de php souhaitée

//Kint::dump($book, $book->title);

/* création d'une instance sans définition de classe
$object = new stdClass();
$object->mapropriete = 'bibi';
d($object);
*/

$book->setTitle('Brique-à-brac');
$book->setAuthor('Joe Dalton');
$book->setDescription('la nuit et le jour');
print $book->getTitle(); echo '<br>';
//$book->save();

//$user = EntityFactory::get('user');
//$author = EntityFactory::get('author');



