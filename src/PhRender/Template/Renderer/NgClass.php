<?php
/*
 * This file is part of the ngPhRender package.
 *
 * (c) Mateusz Krzeszowiak <mateusz.krzeszowiak@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PhRender\Template\Renderer;

use PhRender\Scope,
    PhRender\DOM\DOMUtils,
    PhRender\Template\Expression;

/**
 * Renders AngularJS ng-class attribute.
 */
class NgClass extends Renderer{

    /**
     * Renders AngularJS ng-class attributes by evaluating expression inside it
     * and setting element's class attribute.
     *
     * @param \DOMElement $domElement DOM element to render.
     * @param Scope $scope Scope object containg data for expression.
     * @return \DOMElement Rendered DOM element.
     */
    public function render(\DOMElement $domElement, Scope $scope) {
        $expressionString = $domElement->getAttribute('ng-class');

        $expression = new Expression($this->phRender);
        $expressionValue = $expression->render($expressionString, $scope);

        if(empty($expressionValue) === false) {
            DOMUtils::appendHtml($domElement, $expressionValue);
        }

        return $domElement;
    }

    protected function parseClass(\DOMElement $domElement) {
        $expressionString = $domElement->getAttribute('ng-class');
    }
}