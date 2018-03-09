<?php
class HelloWorldController extends Controller {
public $name = 'HelloWorld'; //Controller name, we need it.
public $uses=null; //The example doesn't "use" any model.
public $autoRender=false; //Do not render "automagically"
public function index() {//The default action for a CakePHP controller
echo __METHOD__;//This will print HelloWorld suffixed with some more info ;-)
}
}
