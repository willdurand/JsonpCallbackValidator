<?php

use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class JsonpCallbackValidatorTest extends PHPUnitTestCase
{
    const IS_VALID   = true;

    const IS_INVALID = false;

    /**
     * @dataProvider dataProviderForTestValidate
     */
    public function testValidate($callback, $expected)
    {
        $validator = new \JsonpCallbackValidator();
        $this->assertEquals($expected, $validator->validate($callback));
    }

    public static function dataProviderForTestValidate()
    {
        return array(
            array('foo',                          self::IS_VALID),
            array('foo123',                       self::IS_VALID),
            array('fos.Router.data',              self::IS_VALID),
            array('$.callback',                   self::IS_VALID),
            array('_.callback',                   self::IS_VALID),
            array('hello',                        self::IS_VALID),
            array('foo23',                        self::IS_VALID),
            array('$210',                         self::IS_VALID),
            array('_bar',                         self::IS_VALID),
            array('some_var',                     self::IS_VALID),
            array('$',                            self::IS_VALID),
            array('somevar',                      self::IS_VALID),
            array('$.ajaxHandler',                self::IS_VALID),
            array('array_of_functions[42]',       self::IS_VALID),
            array('array_of_functions[42][1]',    self::IS_VALID),
            array('$.ajaxHandler[42][1].foo',     self::IS_VALID),
            array('array_of_functions["key"]',    self::IS_VALID),
            array('_function',                    self::IS_VALID),
            array('petersCallback1412331422[12]', self::IS_VALID),
            array('(function xss(x){evil()})',    self::IS_INVALID),
            array('',                             self::IS_INVALID),
            array('alert()',                      self::IS_INVALID),
            array('test()',                       self::IS_INVALID),
            array('a-b',                          self::IS_INVALID),
            array('23foo',                        self::IS_INVALID),
            array('function',                     self::IS_INVALID),
            array(' somevar',                     self::IS_INVALID),
            array('$.23',                         self::IS_INVALID),
            array('array_of_functions[42]foo[1]', self::IS_INVALID),
            array('array_of_functions[]',         self::IS_INVALID),
            array('myFunction[123].false',        self::IS_INVALID),
            array('myFunction .tester',           self::IS_INVALID),
            array(':myFunction',                  self::IS_INVALID),
            array('array_of_functions["k"ey"]',   self::IS_INVALID),
            array('array_of_functions["k\"ey"]',  self::IS_VALID),
            array('array_of_functions["k""y"]',   self::IS_INVALID),
            array('array_of_functions["""y"]',    self::IS_INVALID),
            array('array_of_functions[""""]',     self::IS_INVALID),
            array('array_of_functions["\""]',     self::IS_VALID),
            array('array_of_functions["k\"e\""]', self::IS_VALID),
            array('array_of_functions["k\'ey"]',  self::IS_VALID),
            array("array_of_functions['k'ey']",   self::IS_INVALID),
            array("array_of_functions['k\"ey']",  self::IS_VALID),
            array("array_of_functions['k\'ey']",  self::IS_VALID),
            array("array_of_functions['\'key']",  self::IS_VALID),
            array("array_of_functions['key\'']",  self::IS_VALID),
            array("array_of_functions['k'ey'']",  self::IS_INVALID),
            array("array_of_functions[''']",      self::IS_INVALID),
            array("array_of_functions['\'']",     self::IS_VALID),
            array([],                             self::IS_INVALID),
            array(new \stdClass(),                self::IS_INVALID),
        );
    }

    public function testCallStatically()
    {
        $this->assertTrue(\JsonpCallbackValidator::validate('foo'));
    }
}
