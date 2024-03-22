<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'app_index', '_controller' => 'App\\Controller\\IndexController::index'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\LoginController::index'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/verify/email' => [[['_route' => 'app_verify_email', '_controller' => 'App\\Controller\\RegistrationController::verifyUserEmail'], null, null, null, false, false, null]],
        '/start' => [[['_route' => 'app_task_new', '_controller' => 'App\\Controller\\StartController::index'], null, ['GET' => 0], null, true, false, null]],
        '/start/process' => [[['_route' => 'app_start_process', '_controller' => 'App\\Controller\\StartController::process'], null, ['GET' => 0], null, false, false, null]],
        '/task/api/new' => [[['_route' => 'app_task_api_new', '_controller' => 'App\\Controller\\TaskApiController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/doc' => [[['_route' => 'app.swagger_ui', '_controller' => 'nelmio_api_doc.controller.swagger_ui'], null, ['GET' => 0], null, false, false, null]],
        '/task/api/login_check' => [[['_route' => 'api_login_check'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/task/api/(?'
                    .'|list/([^/]++)(*:195)'
                    .'|([^/]++)/(?'
                        .'|status/([^/]++)(*:230)'
                        .'|priority(?'
                            .'|/([^/]++)(*:258)'
                            .'|_by/([^/]++)/created_by/([^/]++)(*:298)'
                        .')'
                        .'|t(?'
                            .'|itle/([^/]++)(*:324)'
                            .'|asks_tree/([^/]++)(*:350)'
                        .')'
                        .'|de(?'
                            .'|scription/([^/]++)(*:382)'
                            .'|lete/([^/]++)(*:403)'
                        .')'
                        .'|edit/([^/]++)(*:425)'
                        .'|change_status/([^/]++)/([^/]++)(*:464)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        195 => [[['_route' => 'app_task', '_controller' => 'App\\Controller\\TaskApiController::index'], ['user_id'], ['GET' => 0], null, false, true, null]],
        230 => [[['_route' => 'app_task_status', '_controller' => 'App\\Controller\\TaskApiController::status'], ['user_id', 'status'], ['GET' => 0], null, false, true, null]],
        258 => [[['_route' => 'app_task_priority', '_controller' => 'App\\Controller\\TaskApiController::priority'], ['user_id', 'priority'], ['GET' => 0], null, false, true, null]],
        298 => [[['_route' => 'app_sortBy', '_controller' => 'App\\Controller\\TaskApiController::sortBy'], ['user_id', 'priority_sort', 'created_sort'], ['GET' => 0], null, false, true, null]],
        324 => [[['_route' => 'app_task_title', '_controller' => 'App\\Controller\\TaskApiController::title'], ['user_id', 'title'], ['GET' => 0], null, false, true, null]],
        350 => [[['_route' => 'app_task_api_ task_tree', '_controller' => 'App\\Controller\\TaskApiController::taksTree'], ['user_id', 'id'], ['GET' => 0], null, false, true, null]],
        382 => [[['_route' => 'app_task_description', '_controller' => 'App\\Controller\\TaskApiController::description'], ['user_id', 'description'], ['GET' => 0], null, false, true, null]],
        403 => [[['_route' => 'app_task_api_delete', '_controller' => 'App\\Controller\\TaskApiController::delete'], ['user_id', 'id'], ['DELETE' => 0], null, false, true, null]],
        425 => [[['_route' => 'app_task_api_edit', '_controller' => 'App\\Controller\\TaskApiController::edit'], ['user_id', 'id'], ['GET' => 0, 'PUT' => 1], null, false, true, null]],
        464 => [
            [['_route' => 'app_task_ip_new_salary', '_controller' => 'App\\Controller\\TaskApiController::changeStatus'], ['user_id', 'id', 'status'], ['GET' => 0, 'PATCH' => 1], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
