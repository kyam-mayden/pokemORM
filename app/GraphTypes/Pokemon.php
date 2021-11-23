<?php

namespace App\GraphTypes;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class Pokemon extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => [
                'id' => Type::nonNull(Type::id()),
                'level' => Type::nonNull(Type::int()),
            ],
        ];
        parent::__construct($config);
    }
}
