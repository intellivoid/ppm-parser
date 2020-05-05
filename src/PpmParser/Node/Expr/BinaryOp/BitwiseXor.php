<?php declare(strict_types=1);

namespace PpmParser\Node\Expr\BinaryOp;

use PpmParser\Node\Expr\BinaryOp;

class BitwiseXor extends BinaryOp
{
    public function getOperatorSigil() : string {
        return '^';
    }
    
    public function getType() : string {
        return 'Expr_BinaryOp_BitwiseXor';
    }
}
