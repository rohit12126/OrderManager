<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static newOrder()
 * @method static static processedOrder()
 */
final class OrderStatus extends Enum
{
    const newOrder =   'new';
    const processedOrder =   'processed';
}
