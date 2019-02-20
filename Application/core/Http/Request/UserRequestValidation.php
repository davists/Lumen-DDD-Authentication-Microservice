<?php
/**
 * Created by PhpStorm.
 * User: davi
 * Date: 4/10/17
 * Time: 7:01 PM
 */

//validator documentation
//https://github.com/vlucas/valitron

namespace Application\Core\Http\Request;

use Application\Core\Http\Request\Validator;

class UserRequestValidation extends Validator{

    //@TODO createRules updateRules
    const loginRules = [
        'email' => ['required','email'],
        'password'=>['required'],
        //'permanent'=>['required','numeric'],
        'platform'=>['required'],
    ];

    public function validateLogin($post)
    {
        $this->requestValidator($post,self::loginRules);
    }

}

