<?php

namespace Aristonis\LaravelLanguageSwitcher\Helper;

use Aristonis\LaravelLanguageSwitcher\Helper\Traits\HasRouteTrait;
use Aristonis\LaravelLanguageSwitcher\Helper\Traits\HasSessionTrait;
use Aristonis\LaravelLanguageSwitcher\Helper\Traits\HasSupportLangaugesTrait;

class Helper
{
    use HasSessionTrait;
    use HasRouteTrait;
    use HasSupportLangaugesTrait;
}
