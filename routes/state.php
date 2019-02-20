<?php
$app->group(['prefix' => 'states','middleware' => ['jwt','cors']], function () use ($app) {
    $app->get('/', 'StateController@index');
    /**
     * @api {get} /states Listar Estados
     * @apiVersion 0.1.0
     * @apiName GetEstado
     * @apiDescription Permite Listar Estados
     *
     * @apiGroup Estados
     * @apiHeader Authorization Bearer JWT token.
     * @apiHeader Content-Type (application/x-www-form-urlencoded).
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK (-- exemplo --)
     *
        {
            "success": true,
            "data": [
                {
                    "estadoId": 1,
                    "nome": "Acre"
                },
                {
                    "estadoId": 2,
                    "nome": "Alagoas"
                },
                {
                    "estadoId": 3,
                    "nome": "Amazonas"
                },
                {
                    "estadoId": 4,
                    "nome": "Amapá"
                },
                {
                    "estadoId": 5,
                    "nome": "Bahia"
                },
                {
                    "estadoId": 6,
                    "nome": "Ceará"
                },
                {
                    "estadoId": 7,
                    "nome": "Distrito Federal"
                },
                {
                    "estadoId": 8,
                    "nome": "Espírito Santo"
                },
                {
                    "estadoId": 9,
                    "nome": "Goiás"
                },
                {
                    "estadoId": 10,
                    "nome": "Maranhão"
                },
                {
                    "estadoId": 11,
                    "nome": "Minas Gerais"
                },
                {
                    "estadoId": 12,
                    "nome": "Mato Grosso do Sul"
                },
                {
                    "estadoId": 13,
                    "nome": "Mato Grosso"
                },
                {
                    "estadoId": 14,
                    "nome": "Pará"
                },
                {
                    "estadoId": 15,
                    "nome": "Paraíba"
                },
                {
                    "estadoId": 16,
                    "nome": "Pernambuco"
                },
                {
                    "estadoId": 17,
                    "nome": "Piauí"
                },
                {
                    "estadoId": 18,
                    "nome": "Paraná"
                },
                {
                    "estadoId": 19,
                    "nome": "Rio de Janeiro"
                },
                {
                    "estadoId": 20,
                    "nome": "Rio Grande do Norte"
                },
                {
                    "estadoId": 21,
                    "nome": "Rondônia"
                },
                {
                    "estadoId": 22,
                    "nome": "Roraima"
                },
                {
                    "estadoId": 23,
                    "nome": "Rio Grande do Sul"
                },
                {
                    "estadoId": 24,
                    "nome": "Santa Catarina"
                },
                {
                    "estadoId": 25,
                    "nome": "Sergipe"
                },
                {
                    "estadoId": 26,
                    "nome": "São Paulo"
                },
                {
                    "estadoId": 27,
                    "nome": "Tocantins"
                }
            ],
            "message": "success",
            "code": 200
        }
        */

    $app->get('/{stateId}', 'StateController@show');
    $app->get('/{stateId}/cities', 'StateController@getCities');
});
