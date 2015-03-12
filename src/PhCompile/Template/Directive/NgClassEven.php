<?php
/*
 * This file is part of the phCompile package.
 *
 * (c) Mateusz Krzeszowiak <mateusz.krzeszowiak@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PhCompile\Template\Directive;

use PhCompile\PhCompile,
    PhCompile\Scope;

/**
 * Compiles AngularJS ng-class-odd attribute.
 */
class NgClassEven extends Directive
{

    /**
     * Creates new ng-class-even directive.
     *
     * @param PhCompile $phCompile PhCompile object.
     */
    public function __construct(PhCompile $phCompile)
    {
        parent::__construct($phCompile);
        $this->setName('ng-class-even');
        $this->setRestrict('A');
    }

    /**
     * Compiles AngularJS ng-class-even attributes by evaluating expression inside it
     * and setting element's class attribute if element has even index.
     *
     * @param \DOMElement $element DOM element to compile.
     * @param Scope $scope Scope object containing data for expression.
     * @return \DOMElement Compiled DOM element.
     */
    public function compile(\DOMElement $element, Scope $scope)
    {
        if($scope->getData('$even') == true) {
            $ngClass = new NgClass($this->phCompile);
            $ngClass->compile($element, $scope);
        }
    }
}