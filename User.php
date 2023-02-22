<?php

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;

class User
{
    protected string $id;
    protected string $name;
    protected string $mail;
    protected string $password;
    protected string $timestamp;

    /**
     * @return void
     */
    private function __validate() {
        $validator = Validation::createValidator();


        $errors = $validator->validate($this->id, [new NotBlank()]);

        $errors = $validator->validate($this->name, [new NotBlank()]);

        $errors->addAll($validator->validate($this->mail, [
            new Assert\Email(message: "The mail '{{ value }}' is not a valid email.")
        ]));

        $errors->addAll($validator->validate($this->password, [
            new NotBlank(),
            new Length(['min' => 10]),
        ]));

        if (count($errors) > 0){
            foreach ($errors as $error) {
                echo $error->getMessage() . PHP_EOL;
            }
        }

    }

    /**
     * @param string $id
     * @param string $name
     * @param string $mail
     * @param string $password
     */
    function __construct(string $id, string $name, string $mail, string $password, string $timestamp = '') {
        $this->id = $id;
        $this->name = $name;
        $this->mail = $mail;
        $this->password = $password;
        $this->__validate();
        $this->timestamp = date(DATE_RFC822);
    }

    function returnTimeCreate() {
        return $this->timestamp;
    }

}