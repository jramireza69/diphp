<?php

namespace Application\Validators;

use Respect\Validation\Validator;

class LoginValidator{
    protected static $validator;

    protected $rules = [];

    protected $messages = [];

    public function __construct(){

        self::$validator= new Validator;
        $this->rules();
        $this->messages();

    }

    public function rules(){
        self::$validator
        ->key('email', Validator::email())
        ->key('password', Validator::length(6,20));
        
    }
    public function messages(){
        $this->messages = [
            'length' => 'El {{name}} debe estar entre {{minValue}} y {{maxValue}} caracteres.',
            'email' => 'El formato del email no es valido.',
        ];

    }
    public function getMessages(){
        return $this->messages;
    }
    public function validate(){
        return self::$validator->assert($_POST);
    }
}