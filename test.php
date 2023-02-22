<?php
require_once ('vendor/autoload.php');
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;

//$validator = Validation::createValidator();
//$violations = $validator->validate('Bernhard', [
//    new Length(['min' => 10]),
//    new NotBlank(),
//]);
//
//if (0 !== count($violations)) {
//    // there are errors, now you can show them
//    foreach ($violations as $violation) {
//        echo $violation->getMessage() . PHP_EOL;
//    }
//}

$alexander = new User('1', 'Alexander', 'Alexander95223@yandex.ru', '12345678910');
$artem = new User('2', 'Artem', 'Artem@gmail.com', 'qwerty1234567');

echo PHP_EOL.$alexander->returnTimeCreate();
$comments = [];

$comments[] = new Comment($alexander, 'Artem loh');
$comments[] = new Comment($artem, 'Sam pidor');
echo PHP_EOL."Insert time: ".PHP_EOL;
$datetime = readline();

foreach ($comments as $comment) {
    if ($comment->timestamp > $datetime){
        echo $comment->message.PHP_EOL;
    }
}
