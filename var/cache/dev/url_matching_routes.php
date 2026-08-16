<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_wdt/styles' => [[['_route' => '_wdt_stylesheet', '_controller' => 'web_profiler.controller.profiler::toolbarStylesheetAction'], null, null, null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin' => [[['_route' => 'app_admin_dashboard', '_controller' => 'App\\Controller\\Admin\\DashboardController::index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/facturation' => [[['_route' => 'app_admin_statement_index', '_controller' => 'App\\Controller\\Admin\\MonthlyStatementController::index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/facturation/nouvelle' => [[['_route' => 'app_admin_statement_new', '_controller' => 'App\\Controller\\Admin\\MonthlyStatementController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/login' => [[['_route' => 'app_admin_login', '_controller' => 'App\\Controller\\Admin\\SecurityController::login'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/logout' => [[['_route' => 'app_admin_logout', '_controller' => 'App\\Controller\\Admin\\SecurityController::logout'], null, ['GET' => 0], null, false, false, null]],
        '/blog' => [[['_route' => 'app_blog_index', '_controller' => 'App\\Controller\\BlogController::index'], null, ['GET' => 0], null, false, false, null]],
        '/' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\HomeController::index'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/mentions-legales' => [[['_route' => 'app_legal_notice', '_controller' => 'App\\Controller\\LegalController::mentionsLegales'], null, null, null, false, false, null]],
        '/cgv' => [[['_route' => 'app_terms_of_sale', '_controller' => 'App\\Controller\\LegalController::cgv'], null, null, null, false, false, null]],
        '/projets' => [[['_route' => 'app_project_index', '_controller' => 'App\\Controller\\ProjectController::index'], null, ['GET' => 0], null, false, false, null]],
        '/projets/proposer' => [[['_route' => 'app_project_new', '_controller' => 'App\\Controller\\ProjectController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/sitemap.xml' => [[['_route' => 'app_sitemap', '_controller' => 'App\\Controller\\SitemapController::index'], null, ['GET' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/admin/facturation/(?'
                    .'|(\\d+)/modifier(*:238)'
                    .'|(\\d+)/supprimer(*:261)'
                .')'
                .'|/blog/([^/]++)(*:284)'
                .'|/projets/moderer/(?'
                    .'|(\\d+)/([a-f0-9]{64})/approuver(*:342)'
                    .'|(\\d+)/([a-f0-9]{64})/rejeter(*:378)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        238 => [[['_route' => 'app_admin_statement_edit', '_controller' => 'App\\Controller\\Admin\\MonthlyStatementController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        261 => [[['_route' => 'app_admin_statement_delete', '_controller' => 'App\\Controller\\Admin\\MonthlyStatementController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        284 => [[['_route' => 'app_blog_show', '_controller' => 'App\\Controller\\BlogController::show'], ['slug'], ['GET' => 0], null, false, true, null]],
        342 => [[['_route' => 'app_project_moderate_approve', '_controller' => 'App\\Controller\\ProjectController::moderateApprove'], ['id', 'token'], ['GET' => 0], null, false, false, null]],
        378 => [
            [['_route' => 'app_project_moderate_reject', '_controller' => 'App\\Controller\\ProjectController::moderateReject'], ['id', 'token'], ['GET' => 0], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
