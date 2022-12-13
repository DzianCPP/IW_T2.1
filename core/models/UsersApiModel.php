<?php

namespace core\models;

use core\GorestCurlBuilder;
use OpenApi\Attributes as OA;

#[OA\Info(
    title: "gorest API",
    description: "Free REST API service",
    version: "2.0")
]

class UsersApiModel implements ModelInterface
{
    private GorestCurlBuilder $gorestCurlBuilder;

    public function __construct()
    {
        $this->gorestCurlBuilder = new GorestCurlBuilder();
    }

    #[OA\Get(
        path: "/public/v2/users/{id}",
        summary: "get list of users",
        operationId: "getListOfUsers",
        responses: [
            new OA\Response(response: 200, description: "OK"),
            new OA\Response(response: 400, description: "Bad request"),
            new OA\Response(response: 404, description: "Requested resource not found"),
            new OA\Response(response: 405, description: "Method not allowed"),
            new OA\Response(response: 429, description: "Too many requests"),
            new OA\Response(response: 500, description: "Internal server error")
        ],

        security: [
            new OA\SecurityScheme(
                securityScheme: "bearerAuth",
                type: "http",
                scheme: "bearer"
            )
        ],

        parameters: [
            new OA\Parameter(
                name: "user-id",
                in: "path",
                required: true
            )
        ]
    )]

    public function get(int|string $value = NULL): array
    {
        $result = $this->gorestCurlBuilder->executeCurl(method: "GET", id: $value);
        return json_decode($result, true);
    }

    #[OA\Post(
        path: "/public/v2/users",
        summary: "create new user",
        operationId: "createUser",
        responses: [
            new OA\Response(response: 200, description: "OK"),
            new OA\Response(response: 201, description: "A resource was successfully created"),
            new OA\Response(response: 400, description: "Bad request"),
            new OA\Response(response: 401, description: "Authentication failed"),
            new OA\Response(response: 404, description: "Requested resource not found"),
            new OA\Response(response: 405, description: "Method not allowed"),
            new OA\Response(response: 422, description: "Data validation failed"),
            new OA\Response(response: 429, description: "Too many requests"),
            new OA\Response(response: 500, description: "Internal server error")
        ],

        requestBody: [

        ],

        security: [
            new OA\SecurityScheme(
                securityScheme: "bearerAuth",
                type: "http",
                scheme: "bearer"
            )
        ]
    )]

    public function create(): bool
    {
        $newUserInfo = file_get_contents("php://input");

        $gorest_response = $this->gorestCurlBuilder->executeCurl(method: "POST", json_body: $newUserInfo);

        if ($gorest_response === false) {
            return false;
        }

        return true;
    }

    #[OA\Delete(
        path: "/public/v2/users/{id}",
        summary: "delete user",
        operationId: "deleteUser",
        responses: [
            new OA\Response(response: 200, description: "OK"),
            new OA\Response(response: 204, description: "No content"),
            new OA\Response(response: 400, description: "Bad request"),
            new OA\Response(response: 401, description: "Authentication failed"),
            new OA\Response(response: 404, description: "Requested resource not found"),
            new OA\Response(response: 405, description: "Method not allowed"),
            new OA\Response(response: 422, description: "Data validation failed"),
            new OA\Response(response: 429, description: "Too many requests"),
            new OA\Response(response: 500, description: "Internal server error")
        ],

        security: [
            new OA\SecurityScheme(
                securityScheme: "bearerAuth",
                type: "http",
                scheme: "bearer"
            )
        ],

        parameters: [
            new OA\Parameter(
                name: "user-id",
                in: "path",
                required: true
            )
        ]
    )]

    public function delete(int ...$ids): bool
    {
        foreach ($ids as $id) {
            $result = $this->gorestCurlBuilder->executeCurl(method: "DELETE", id: $id);
            if (!$result) {
                return false;
            }
        }

        return true;
    }

    #[OA\Patch(
        path: "/public/v2/users/{id}",
        summary: "delete user",
        operationId: "patchUser",
        responses: [
            new OA\Response(response: 200, description: "OK"),
            new OA\Response(response: 201, description: "A resource was successfully created"),
            new OA\Response(response: 400, description: "Bad request"),
            new OA\Response(response: 401, description: "Authentication failed"),
            new OA\Response(response: 404, description: "Requested resource not found"),
            new OA\Response(response: 405, description: "Method not allowed"),
            new OA\Response(response: 422, description: "Data validation failed"),
            new OA\Response(response: 429, description: "Too many requests"),
            new OA\Response(response: 500, description: "Internal server error")
        ],

        security: [
            new OA\SecurityScheme(
                securityScheme: "bearerAuth",
                type: "http",
                scheme: "bearer"
            )
        ],

        parameters: [
            new OA\Parameter(
                name: "user-id",
                in: "path",
                required: true
            )
        ]
    )]

    public function update(array $newInfo): bool
    {
        $result = $this->gorestCurlBuilder->executeCurl(method: "PATCH", json_body: json_encode($newInfo), id: $newInfo['id']);

        if ($result === false) {
            return false;
        }

        return true;
    }
}