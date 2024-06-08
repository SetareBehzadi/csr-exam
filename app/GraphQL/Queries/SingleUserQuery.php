<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\User;
use Closure;
use GraphQL\Error\Error;
use GraphQL\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class SingleUserQuery extends Query
{
    protected $attributes = [
        'name' => 'SingleUserQuery',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return Type::nonNull(\GraphQL::type('UserType'));
    }

    public function args(): array
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::nonNull(Type::int())],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $user = User::find($args['id']);

        if(!$user){
            return new Error('user not found');
        }
        return $user;
    }
}
