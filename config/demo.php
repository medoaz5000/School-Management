<?php

/*
|--------------------------------------------------------------------------
| Demo mode configuration  (NEW FILE)
|--------------------------------------------------------------------------
| 'enabled'  : ila kan DEMO_MODE=true f .env -> l'application katwlli demo
|              (read-only + boutons dyal login sari3 + banner).
| 'accounts' : les comptes dyal demo. Kol role 3ndo email tabit.
|              Visitor ma kaykteb hta password: kaydkhol b click 3la button.
*/
return [

    // false par défaut => ila nsiti .env, l'application katbqa normale
    'enabled' => env('DEMO_MODE', false),

    // user_type: 1 = admin, 2 = teacher, 3 = student, 4 = parent
    'accounts' => [
        'admin' => [
            'label'     => 'Admin',
            'icon'      => 'bi-shield-lock-fill',
            'email'     => 'demo.admin@school-demo.test',
            'name'      => 'Demo',
            'last_name' => 'Admin',
            'user_type' => 1,
        ],
        'teacher' => [
            'label'     => 'Teacher',
            'icon'      => 'bi-person-workspace',
            'email'     => 'demo.teacher@school-demo.test',
            'name'      => 'Demo',
            'last_name' => 'Teacher',
            'user_type' => 2,
        ],
        'student' => [
            'label'     => 'Student',
            'icon'      => 'bi-mortarboard-fill',
            'email'     => 'demo.student@school-demo.test',
            'name'      => 'Demo',
            'last_name' => 'Student',
            'user_type' => 3,
        ],
        'parent' => [
            'label'     => 'Parent',
            'icon'      => 'bi-people-fill',
            'email'     => 'demo.parent@school-demo.test',
            'name'      => 'Demo',
            'last_name' => 'Parent',
            'user_type' => 4,
        ],
    ],
];
