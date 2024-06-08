<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Room;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class RoomQuery extends Query
{
    protected $attributes = [
        'name' => 'RoomQuery',
        'description' => 'A query for get rooms'
    ];

    public function type(): Type
    {
       return Type::listOf(\GraphQL::type('RoomType'));
        /*return Type::listOf(Type::int());*/
    }

    public function args(): array
    {
        return [

        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
       $rooms = Room::all();
        return $rooms;
    }
}
