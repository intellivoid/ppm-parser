<?php declare(strict_types=1);

namespace PpmParser\Node\Scalar\MagicConst;

use PpmParser\Node\Scalar\MagicConst;

class Method extends MagicConst
{
    public function getName() : string {
        return '__METHOD__';
    }
    
    public function getType() : string {
        return 'Scalar_MagicConst_Method';
    }
}
