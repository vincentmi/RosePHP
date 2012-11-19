<?php
/**
 *  This file is part of amfPHP
 *
 * LICENSE
 *
 * This source file is subject to the license that is bundled
 * with this package in the file license.txt.
 * @package Amfphp_Examples_ExampleService
 */

/**
 * an example service for the pizza examples
 * @package Amfphp_Examples_ExampleService
 * @author Ariel Sommeria-klein
 */


class PizzaService {
    public function getPizza(){
        return "margarita====";
    }

    public function show($name){

       $ur = new UserModel();

       $userall = $ur->where('id=2')->find();

       return $userall;
    }

    
}
?>
