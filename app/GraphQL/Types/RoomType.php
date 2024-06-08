<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class RoomType extends GraphQLType
{
    protected $attributes = [
        'name' => 'RoomType',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int()
            ],
            'price' => [
                'type' => Type::int()
            ],
//            'amenities' => [
//                'type' => Type::string()
//            ],
        ];
    }
}
