<?php declare(strict_types=1);
/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

namespace Magewirephp\Magewire\Plugin\Magento\Framework\View\TemplateEngine;

use Magento\Framework\DataObject;
use Magento\Framework\View\Element\BlockInterface;
use Magento\Framework\View\TemplateEngine\Php as Subject;
use Magewirephp\Magewire\Component;

class Php
{
    /**
     * Automatically assign $magewire as template Block variable.
     *
     * @param Subject $subject
     * @param BlockInterface $block
     * @param $filename
     * @param array $dictionary
     * @return array
     */
    public function beforeRender(Subject $subject, BlockInterface $block, $filename, array $dictionary = []): array
    {
        if ($block instanceof DataObject && $block->hasData('magewire')) {
            $magewire = $block->getData('magewire');

            if ($magewire instanceof Component) {
                $dictionary['magewire'] = $magewire;
            }
        }

        return [$block, $filename, $dictionary];
    }
}
