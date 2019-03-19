<?php
use core\router\Route;
return [
    'routes' => [
        new Route("", [
            "controller" => "main",
            "action" => "index"
        ]),

        //Users

        new Route("userdel/{id}", [
            "controller" => "user",
            "action" => "userdel"
        ]),
        new Route("usernotes/{userid}", [
            "controller" => "main",
            "action" => "index"
        ]),
        new Route("useradd", [
            "controller" => "user",
            "action" => "useradd"
        ]),

        //Notes

        new Route("noteadd", [
            "controller" => "note",
            "action" => "noteadd"
        ]),
        new Route("notedel/{userid}/{id}", [
            "controller" => "note",
            "action" => "notedel"
        ]),
        new Route("noteshow/{userid}/{id}", [
            "controller" => "main",
            "action" => "index"
        ]),
    ]
];