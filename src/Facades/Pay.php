<?php

/*
 * This file is part of the Laravel Pay package.
 *
 * (c) Oregunwa Segun - Oregs <oregsgraphix@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Oregsideas\Pay\Facades;

use Illuminate\Support\Facades\Facade;

class Pay extends Facade
{
    /**
     * Get the registered name of the component
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravelpay';
    }
}
