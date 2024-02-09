<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/arrilot/load-widget' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fZfu5Ou8azQvN7bC',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/health-check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.healthCheck',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/execute-solution' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.executeSolution',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/update-config' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.updateConfig',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/authorize' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.authorize',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.approve',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.deny',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/token' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.token',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/tokens' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.tokens.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/token/refresh' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.token.refresh',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/clients' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/scopes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.scopes.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/personal-access-tokens' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/broadcasting/auth' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1huV0dqTtLYXGqIt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/assigment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::7fH14oLDv2OUcTrl',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/lessonplan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::XG3G8f0H8v0y0fWu',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/kta' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::bk3FnmpvctmRJ5lI',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.settings.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.settings.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::HaC9yT5lhlhOIADL',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/payment/notification/handler' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::OxsnG9RT5pDQiTti',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/payment/notification/queuehandler' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::iuPGjHy2sXyBVg9z',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/paymenthandler' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::pwH4nPCfzddCtgXD',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/auth/assigment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/auth/assigment_lite' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::jhkCSoZeV84AoNjr',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/auth/assigments/unpublished' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::9xnvRKG9icI0xFNA',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/auth/assigments/published' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::rHfmNzvS707FLGCR',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/auth/lessonplan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::cn20UWgQDttvGp2s',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/auth/kta' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::JJY9K87cpWm2JmsA',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/userreport2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::27YxS0x3iDr8A0LV',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/auth/assigment/student' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::KgDRgRD9mXwKlRnJ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/auth/assigment/student/finishedtoday' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::1i8EkWlpJ4SHVM3B',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/role' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.role.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.role.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.user.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.user.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.profile.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.profile.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/grade' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.grade.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.grade.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/subject' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.subject.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.subject.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.payment.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.payment.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/province' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.province.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.province.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/city' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.city.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.city.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/district' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.district.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.district.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/educationallevel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.educationallevel.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.educationallevel.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/event' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.event.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.event.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/attendance' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.attendance.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.attendance.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/lessonplanformat' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanformat.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanformat.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/lessonplan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplan.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplan.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/lessonplanlike' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanlike.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanlike.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/lessonplancomment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplancomment.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplancomment.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/lessonplanreview' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanreview.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanreview.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::Sm2E7KZSXLFMP0wn',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.post.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/postcomment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.postcomment.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.postcomment.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/postlike' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.postlike.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.postlike.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/postbookmark' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.postbookmark.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.postbookmark.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/commentlike' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.commentlike.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.commentlike.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/lessonplancover' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplancover.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplancover.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/bookcategory' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.bookcategory.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.bookcategory.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/book' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.book.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.book.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/chat' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.chat.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.chat.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/mainchat' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.mainchat.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.mainchat.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/channel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.channel.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.channel.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/chatchannel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.chatchannel.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.chatchannel.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/lessonplanrating' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanrating.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanrating.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/lessonplanguideduser' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanguideduser.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanguideduser.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/murottal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.murottal.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.murottal.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/dailyprayer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.dailyprayer.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.dailyprayer.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/follow' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.follow.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.follow.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/module' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.module.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.module.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/modulecontent' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.modulecontent.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.modulecontent.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/template' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.template.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.template.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/templatecategory' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.templatecategory.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.templatecategory.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/usertemplate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.usertemplate.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.usertemplate.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/ad' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.ad.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.ad.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/questionnary' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.questionnary.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.questionnary.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/questionnarysesion' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.questionnarysesion.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.questionnarysesion.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/bank_account' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.bank_account.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.bank_account.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/surah' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.surah.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.surah.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/conversation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.conversation.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.conversation.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/paymentvendor' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.paymentvendor.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.paymentvendor.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/room' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.room.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.room.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/tag' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.tag.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.tag.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/department/dpp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.dpp.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.dpp.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/department-division' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.department-division.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.department-division.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/student/room' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.students.rooms.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.students.rooms.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigmentguideduser' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentguideduser.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentguideduser.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigmentcategory' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentcategory.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentcategory.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigmenttype' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmenttype.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmenttype.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigment.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigment.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigmentcomment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentcomment.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentcomment.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigmentlike' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentlike.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentlike.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigmentrating' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentrating.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentrating.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigmentchat' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentchat.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentchat.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/questionlistcategory' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.questionlistcategory.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.questionlistcategory.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/questionlist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.questionlist.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.questionlist.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigmentquestionlist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentquestionlist.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentquestionlist.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/answerlist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.answerlist.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.answerlist.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/session' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.session.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.session.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigmentsession' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentsession.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentsession.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/question' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.question.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.question.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/answer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.answer.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.answer.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/candidate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.candidate.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.candidate.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/rooms/join' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::bYNfbqIVuWxRdWr2',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/rooms/changename' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::Ery5nBwEdrxlks7p',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/rooms/getuserrooms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::kNNOgef3YMOPbtql',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/eventyears' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::pwGxYKw77rRvvRNh',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/filterevent' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::aPOsCUxAALepjbwW',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/murottals/listening' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::ka7NbmxNEdvwo78w',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/murottals/getdatalistening' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::XGiT4s5mKWPX0aaP',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/student/getjoinedrooms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::BWzojaxGx6WEG7Sj',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/student/rooms/join' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::KXoPKuJWVHo8euOW',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/studentpost' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::SJBwC2Ay7FDLHd88',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/ownstudentpost' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::Gc2IwZ7Tf3IGZ1eq',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/mediapost' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::BNcscD0MkUWs8ShE',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigments/publish' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::5ht6q3rBKAYmebjC',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigments/publish2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::TzjluiJwvGcR9uFe',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigments/getdeleteditems' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::cN5CeGE7RnK0hP60',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigments/unpublish' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::p6Yr3iAVdbgyVsq1',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigments/unpublish2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::AYOTNUSNmM6cfXAx',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigments/check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::BN1oW8648bEovsLY',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigments/share' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::wxSh2TmZ8ci3OILW',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigments/setpublic' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::e398MGhvzZ1hYY5h',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigments/getsharedpublish' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::Y9a8m9A7kJXX52p0',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigments/getassigmentworks' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::y113tfF8ieF47kkD',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigments/getsharedpublishorderby' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::zsAQOOgRx9HQ1ZMk',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/setting/information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::07c1ZLeHlqP0QXbx',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/comment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.comment.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.comment.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/users/grown/pnsmember' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::J67Q9x4aRjkZ7stY',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/users/extendedmember' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::CNFuVVohsdAFpiEa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/kongres/surat-mandat' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::XgyH9yQ0eK5qshlM',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/kongres/surat-tugas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::kCd7QF3B1IssPixU',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/kongres/payment/paymentUrl' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::WOAnbkKYqdddCVoK',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/kongres/attendance/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::fvIK48w7X9tztkbH',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/kongres/setting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::wEtaHInulFv722xt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/kongres/payments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::InoGEPMkpQcOGLHd',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/kongres/payments/count' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::dLEIGsZD31AS3g3N',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/events/users/requestwithdraw' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::4iAl7rOpeUtiQMvY',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/users/active/count' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::jvzenrfSg9jYCK2S',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/users/active/listyear' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::JQaTfDUa9Q0l3Gzy',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/users/active/grown' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::FBTiUz0wwWnAeiQC',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/users/count' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::wTrO6Qav55bk5Z8t',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/users/pns/count' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::OOf9ihpxe2CE06Ns',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/users/getall' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::jLf7nqpfp2FoSU5I',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/users/getall/count' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::lSuG39ODNsNbTy9x',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/users/getexpired' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::pEdnO9k0ucq20UNH',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/users/getexpired/count' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::TrUwZTnp8cVyRlOd',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/users/pns' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::CO6hKD0LHGNo0F0v',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/users/nonpns/count' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::fQ07vICn9SiUSDPN',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/users/nonpns' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::8YHbszafaeHJ0UIQ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/users/changePassword' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::APUJpM21cZlQvPpu',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/getDetailTotalMember' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::hWJXNqA3h6sA2ptK',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/userslist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::fpKdIYmHfJqT0Tlj',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/lessonplans/search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::EoX8hFkhUn0bD8Et',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/lessonplans/information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::e7B3H4Qiuq2ur4sF',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/payments/getpaymentreportforardata' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::5irgJcMsWrPIJUwB',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/payments/getpaymentreportfordpp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::zS2v2ezrk8q5A4I4',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/payments/transfer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::e7LRqoIWCt1JHWPV',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/payments/transfer/dpw' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::SgtpTTVe06DKOrtO',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/payments/transfer/dpd' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::i2K9GoWfla6xQaQq',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/payments/transfer/history' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::bIwidKYeyTMPlehh',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/payments/getvaluetransactionstotal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::mgOBBvu156BGKf3V',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/payments/getprovincepayment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::VSrgzL9LilewfHqZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/payments/getcitypayment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::gpQQBuXN4x0ZftKQ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/payments/getuniquepayment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::VeRNbojGoWVKmieb',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/payments/confirmuniquepayment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::ARoaGwAA8jc3XGd9',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/payments/confirmovopayment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::jIrIsWgyp4ftXv72',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/payments/extended/count' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::Tg0EDBG8JCGmm83Y',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/departments/dpp/image' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::xaLtoTl6TRqU3jvQ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/departments/dpp/getperiode' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::wafFz0ZAbPeh9GEx',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/provinces/getprovinces' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::8i2cERBhfkzIlEWQ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/provinces/payments/extended' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::sK2JU6rlDweV4fd0',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/lessonplans/getbyguideduser' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::hdT2ESBmnim9Og4j',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/modules/getmodulescount' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::ehAI5UKd76ufMRf1',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/modules/getlikedcount' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::oJBVQCrnopVHiImb',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/modules/getlikescount' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::DY6ZTs95QZj7m1M8',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/modules/getpublish' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::hmREX9808gXcSJ2d',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/modules/getunpublish' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::1PkMASkRVCvFfIbU',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/modules/getalllatest' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::JdpUAI7RwyW3d59g',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/conversations/get_unread_count' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::V1VMwgLZMHEfmd5n',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/question_item/payable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::7njnDg5vEYQigpR5',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/question_package/payable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::xerGTaxXuKOMngP8',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assignment/payablecount' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::u4wb76np4wnmu1i9',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assignment/payable/profit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::gmVQLuJVqbS80aPs',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assignment/payable/profit/question_items' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::dri54WKjDZPG5cob',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assignment/payable/profit/question_packages' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::SZti3DFyX0KeGz4S',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/balance' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::FVqelhkgNjh9P6r2',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/test' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::iaqV1kg80uedmy16',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigmentsessions/store2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::8a7Wg3uidR4AOtEM',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigments/history' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::DwN2grwdkceMqtII',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigments_tag/history' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::1bRnPHkahq5aRGBl',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigments_tag' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::8x3lqo2AgowUv3pr',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/getassigmentsinfo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::7ozKjp4HX0QhOiIp',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/quickpaymentUrl' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::E6vCTySDO4rWeO82',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.settings.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.settings.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::1KylUGpgyEqBYiCY',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/payment/notification/handler' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::RvmMEY2FWFoWmgcQ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/payment/notification/queuehandler' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::Q5MIihp8WHo3LbsE',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/ads/getactive' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::ca8MT3N55N806gM8',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/questionnaries/getactive' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::MTqUopumEiJ8mFzR',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/notification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.notification.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.notification.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/notification_total' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::HKQx51PdbwAk6tl1',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/notification_markasread' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::ML3V9K9TTJMqdzbB',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/assigments/statistics' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::idPKpo4UVDK3asbT',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/testgan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::9rgKzJFVIrdT1xn4',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/contact/admin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::BP2fXQw2xMO62NTQ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/contact/edit-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::hhJK6kR3pouDLfiU',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/student/createassigmentsession' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.student.',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/student/assigmentsession' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.student.assigmentsession.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.student.assigmentsession.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/student/premium/storeassigmentsession' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.student.generated::SkD7iorRsx8V1PJG',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/student/unfinishedassigment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.student.generated::sWfl2uemOAJVxDwW',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/student/createpayment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.student.generated::qeZCb5h0qwD6ZZ5m',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/student/buyassigment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.student.generated::Tv1BiP4zzNyPzRgU',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/student/ranking' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.student.generated::TZjcr8zID73LfZ8W',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/student/purchasedassignment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.student.generated::maq8KmtNrPJCjZGk',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/student/pendingassignmentpayments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.student.generated::IuvKyGcg9LwfLddk',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/student/payableassignment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.student.generated::mhetci5SUTD9KiWz',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YtWRGfcDPME0RpuX',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oBD0zaEEilGHVdIj',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/otp-client' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'otp-client.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'otp-client.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/otp-client/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'otp-client.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/me' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FGSwOtHUeuRnY31c',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/membercard/generate/front' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lez4jFucbsla5C6m',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/membercard/renew/front' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::upsVKJmsI1R7GWUJ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/membercard/generate/back' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rpNlOa6OtrusGyJt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/membercard/renew/back' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JBCmBePxsZeRwZiw',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'post.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/post/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/post-bookmark' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post-bookmark.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'post-bookmark.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/post-bookmark/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post-bookmark.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/personal-conversation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'personal-conversation.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'personal-conversation.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/personal-conversation/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'personal-conversation.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/event' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'event.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/event/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/story' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'story.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'story.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/story/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'story.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/user/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/user-bookmark' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-bookmark.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user-bookmark.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/user-bookmark/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-bookmark.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/murottal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'murottal.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'murottal.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/murottal/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'murottal.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/daily-prayer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'daily-prayer.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'daily-prayer.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/daily-prayer/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'daily-prayer.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/membership-fee' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'membership-fee.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'membership-fee.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/membership-fee/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'membership-fee.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/membership-fee-status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'membership-fee-status.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'membership-fee-status.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/membership-fee-status/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'membership-fee-status.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/subscribe-fee' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'subscribe-fee.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'subscribe-fee.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/subscribe-fee/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'subscribe-fee.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/subscribe-fee-status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'subscribe-fee-status.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'subscribe-fee-status.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/subscribe-fee-status/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'subscribe-fee-status.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/article' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'article.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'article.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/article/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'article.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/notification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'notification.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'notification.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/notification/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'notification.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/member-all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'member-all.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'member-all.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/member-all/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'member-all.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/province' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/province/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/province-member' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-member.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province-member.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/province-member/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-member.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/province-member-detail' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-member-detail.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province-member-detail.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/province-member-detail/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-member-detail.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/province-certificate-member' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-certificate-member.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province-certificate-member.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/province-certificate-member/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-certificate-member.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/province-inpassing-member' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-inpassing-member.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province-inpassing-member.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/province-inpassing-member/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-inpassing-member.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/province-bsi-member' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-bsi-member.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province-bsi-member.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/province-bsi-member/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-bsi-member.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/province-pns-member' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-pns-member.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province-pns-member.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/province-pns-member/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-pns-member.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/province-non-pns-member' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-non-pns-member.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province-non-pns-member.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/province-non-pns-member/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-non-pns-member.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/province-expired-member' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-expired-member.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province-expired-member.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/province-expired-member/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-expired-member.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/province-extend-member' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-extend-member.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province-extend-member.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/province-extend-member/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-extend-member.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/province-pension-member' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-pension-member.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province-pension-member.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/province-pension-member/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-pension-member.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/city' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'city.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/city/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/district' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'district.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'district.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/district/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'district.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/kta' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'kta.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'kta.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/kta/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'kta.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/event-categories' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event-categories.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'event-categories.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/event-categories/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event-categories.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/educational-level' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'educational-level.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'educational-level.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/educational-level/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'educational-level.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/grade' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'grade.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'grade.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/grade/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'grade.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/setting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'setting.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/setting/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/book' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'book.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'book.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/book/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'book.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/book-category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'book-category.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'book-category.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/book-category/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'book-category.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/department' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'department.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'department.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/department/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'department.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/department-division' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'department-division.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'department-division.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/department-division/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'department-division.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/dpp-department' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dpp-department.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dpp-department.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/dpp-department/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dpp-department.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/dpw-department' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dpw-department.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dpw-department.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/dpw-department/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dpw-department.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/dpd-department' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dpd-department.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dpd-department.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/dpd-department/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dpd-department.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/dpc-department' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dpc-department.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dpc-department.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/dpc-department/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dpc-department.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/question-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'question-list.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'question-list.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/question-list/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'question-list.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/assignment-category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-category.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-category.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/assignment-category/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-category.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/assignment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'assignment.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/assignment/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/assignment-uses' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-uses.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-uses.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/assignment-uses/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-uses.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/assignment-session' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-session.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-session.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/assignment-session/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-session.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/room' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'room.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'room.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/room/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'room.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/lesson-plan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lesson-plan.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'lesson-plan.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/lesson-plan/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lesson-plan.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/lesson-plan-cover' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lesson-plan-cover.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'lesson-plan-cover.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/lesson-plan-cover/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lesson-plan-cover.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/lesson-plan-liked' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lesson-plan-liked.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'lesson-plan-liked.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/lesson-plan-liked/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lesson-plan-liked.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/module' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'module.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/module/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/module-like' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module-like.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'module-like.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/module-like/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module-like.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/module-cover' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module-cover.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'module-cover.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/module-cover/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module-cover.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/islamic-study' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/islamic-study/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/islamic-study-category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study-category.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study-category.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/islamic-study-category/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study-category.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/classroom' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'classroom.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'classroom.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/classroom/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'classroom.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/training-event' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'training-event.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'training-event.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/training-event/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'training-event.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/file' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'file.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'file.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/file/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'file.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/islamic-studies/highest/vote' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::g4g5SJzEj9CGNefn',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/category/islamic-studies' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7vHFPJtVkckjhjXB',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/notification-module' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OAOpquwbEDTfJ74J',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/modules/generate/cover' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UuCNQqEEUNuyePig',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/modules/generate/cover/selected' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xgpHsttjhKGY2kQ1',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/lesson-plans/generate/cover' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Kap0zY6a4J1ClM6T',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/lesson-plans/generate/cover/selected' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::df79PeNfE3JCFPcj',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/assignment/store/question-lists' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HRLoZmcaacc5ZyF5',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kDMKZvbVNNAdXlgO',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/users/total-member' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VzjprEbxLOfeSt8X',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/users/total-pns-member' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::szoCS1r7vfAH0aFE',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/users/total-non-pns-member' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mYMX8suWfuguN4fd',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/users/total-expired-member' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Kclb3RL0CTFGRVbe',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/users/total-pension-member' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Ko9gFoTagHm19I7R',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/users/total-certificate-member' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RJ0Vwec3u9IHOoP4',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/users/total-inpassing-member' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aupkrtMLL2rV0fvR',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/users/total-bsi-member' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rQLIKW8SS80lO4Z7',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/payment/extended-total' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0mCuQTbSljJauEkf',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/kongres/payments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wl0WC6Jy06MK8kqq',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/kongres/payments/total' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wPN5yHZVY4WOI0Zj',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/cs-number' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JwVMZWMJvvBq0L6f',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/member/payment/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tVUyNfGjhBh54FA3',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/admin/me' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::j2qH5JWI9VYJbzbW',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/admin/candidate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.candidate.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.candidate.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/admin/votable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.votable.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.votable.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/admin/department-division' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.department-division.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.department-division.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/admin/department' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.department.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.department.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/admin/department-user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.department-user.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.department-user.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/admin/ads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.ads.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.ads.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/admin/post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.post.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.post.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/admin/province' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.province.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.province.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/admin/islamic-study' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.islamic-study.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.islamic-study.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/admin/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.user.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.user.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/admin/payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.payment.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.payment.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/admin/role' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.role.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.role.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/admin/user/analytic/growth' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TrIJTnmatCmv8vrm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v2/admin/payment/analytic/growth' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3KiAkpWn50JN0d9W',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xfz0swWbB9umvLEC',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/fix-status-pensiun' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DecxeG4BaDl6T3cU',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/perpanjangcepat' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BdPaXl3WqzOPWMFr',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/watzap/info' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eY4KgfMxlfFy6PSq',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/watzap/fixExpiredAt' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QDYKiorZE96jp0EJ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/test' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3zMZmaankrh2ewd9',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/generate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ljazao7Z6WBde78P',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/generate2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GsdezIoYJzRYgXGg',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/generate3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1ST9R8IdK5QgdrJx',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/duplicate-daily-prayer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HCAN7jxFnMzBXuPP',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/replace-murottal-src' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tP79ikc0zGQvkAI7',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::plzTBu2oMIem6gbx',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'register',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bmjcIPDidy3yNYCq',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.request',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.email',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout2',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.postlogin',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/upload' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.upload',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/menus/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.menus.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.menus.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/menus/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.menus.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/menus/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.menus.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/menus/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.menus.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/menus' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.menus.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.menus.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/menus/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.menus.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/roles/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.roles.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.roles.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/roles/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.roles.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/roles/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.roles.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/roles/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.roles.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/roles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.roles.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.roles.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/roles/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.roles.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/categories/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.categories.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.categories.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/categories/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.categories.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/categories/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.categories.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/categories/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.categories.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/categories' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.categories.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.categories.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/categories/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.categories.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/posts/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.posts.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.posts.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/posts/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.posts.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/posts/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.posts.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/posts/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.posts.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/posts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.posts.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.posts.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/posts/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.posts.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/pages/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pages.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pages.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/pages/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pages.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/pages/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pages.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/pages/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pages.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/pages' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pages.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pages.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/pages/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pages.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/events/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.events.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.events.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/events/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.events.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/events/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.events.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/events/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.events.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/events' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.events.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.events.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/events/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.events.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/event-guests/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-guests.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-guests.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/event-guests/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-guests.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/event-guests/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-guests.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/event-guests/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-guests.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/event-guests' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-guests.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-guests.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/event-guests/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-guests.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/educational-levels/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.educational-levels.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.educational-levels.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/educational-levels/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.educational-levels.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/educational-levels/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.educational-levels.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/educational-levels/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.educational-levels.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/educational-levels' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.educational-levels.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.educational-levels.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/educational-levels/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.educational-levels.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/lesson-plan-formats/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plan-formats.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plan-formats.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/lesson-plan-formats/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plan-formats.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/lesson-plan-formats/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plan-formats.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/lesson-plan-formats/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plan-formats.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/lesson-plan-formats' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plan-formats.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plan-formats.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/lesson-plan-formats/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plan-formats.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/grades/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.grades.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.grades.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/grades/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.grades.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/grades/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.grades.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/grades/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.grades.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/grades' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.grades.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.grades.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/grades/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.grades.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/lesson-plan-covers/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plan-covers.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plan-covers.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/lesson-plan-covers/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plan-covers.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/lesson-plan-covers/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plan-covers.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/lesson-plan-covers/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plan-covers.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/lesson-plan-covers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plan-covers.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plan-covers.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/lesson-plan-covers/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plan-covers.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/book-categories/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.book-categories.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.book-categories.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/book-categories/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.book-categories.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/book-categories/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.book-categories.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/book-categories/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.book-categories.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/book-categories' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.book-categories.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.book-categories.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/book-categories/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.book-categories.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/books/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.books.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.books.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/books/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.books.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/books/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.books.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/books/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.books.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/books' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.books.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.books.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/books/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.books.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/assigment-categories/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.assigment-categories.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.assigment-categories.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/assigment-categories/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.assigment-categories.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/assigment-categories/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.assigment-categories.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/assigment-categories/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.assigment-categories.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/assigment-categories' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.assigment-categories.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.assigment-categories.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/assigment-categories/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.assigment-categories.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/assigment-types/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.assigment-types.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.assigment-types.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/assigment-types/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.assigment-types.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/assigment-types/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.assigment-types.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/assigment-types/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.assigment-types.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/assigment-types' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.assigment-types.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.assigment-types.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/assigment-types/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.assigment-types.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/murottals/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.murottals.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.murottals.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/murottals/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.murottals.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/murottals/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.murottals.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/murottals/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.murottals.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/murottals' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.murottals.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.murottals.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/murottals/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.murottals.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/daily-prayers/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.daily-prayers.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.daily-prayers.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/daily-prayers/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.daily-prayers.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/daily-prayers/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.daily-prayers.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/daily-prayers/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.daily-prayers.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/daily-prayers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.daily-prayers.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.daily-prayers.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/daily-prayers/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.daily-prayers.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/files/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.files.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.files.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/files/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.files.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/files/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.files.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/files/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.files.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/files' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.files.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.files.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/files/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.files.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/users/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.users.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.users.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/users/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.users.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/users/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.users.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/users/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.users.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.users.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.users.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/users/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.users.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/profiles/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.profiles.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.profiles.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/profiles/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.profiles.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/profiles/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.profiles.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/profiles/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.profiles.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/profiles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.profiles.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.profiles.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/profiles/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.profiles.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/assigments/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.assigments.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.assigments.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/assigments/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.assigments.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/assigments/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.assigments.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/assigments/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.assigments.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/assigments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.assigments.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.assigments.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/assigments/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.assigments.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/sessions/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.sessions.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.sessions.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/sessions/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.sessions.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/sessions/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.sessions.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/sessions/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.sessions.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/sessions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.sessions.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.sessions.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/sessions/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.sessions.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/questions/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.questions.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.questions.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/questions/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.questions.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/questions/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.questions.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/questions/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.questions.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/questions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.questions.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.questions.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/questions/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.questions.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/question-lists/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.question-lists.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.question-lists.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/question-lists/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.question-lists.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/question-lists/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.question-lists.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/question-lists/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.question-lists.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/question-lists' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.question-lists.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.question-lists.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/question-lists/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.question-lists.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/payments/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payments.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payments.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/payments/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payments.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/payments/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payments.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/payments/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payments.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/payments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payments.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payments.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/payments/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payments.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/questionnaries/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.questionnaries.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.questionnaries.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/questionnaries/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.questionnaries.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/questionnaries/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.questionnaries.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/questionnaries/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.questionnaries.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/questionnaries' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.questionnaries.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.questionnaries.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/questionnaries/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.questionnaries.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/answer-lists/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.answer-lists.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.answer-lists.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/answer-lists/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.answer-lists.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/answer-lists/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.answer-lists.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/answer-lists/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.answer-lists.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/answer-lists' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.answer-lists.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.answer-lists.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/answer-lists/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.answer-lists.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/templates/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.templates.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.templates.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/templates/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.templates.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/templates/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.templates.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/templates/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.templates.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/templates' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.templates.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.templates.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/templates/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.templates.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/necessaries/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.necessaries.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.necessaries.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/necessaries/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.necessaries.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/necessaries/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.necessaries.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/necessaries/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.necessaries.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/necessaries' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.necessaries.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.necessaries.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/necessaries/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.necessaries.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/bank-accounts/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.bank-accounts.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.bank-accounts.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/bank-accounts/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.bank-accounts.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/bank-accounts/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.bank-accounts.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/bank-accounts/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.bank-accounts.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/bank-accounts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.bank-accounts.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.bank-accounts.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/bank-accounts/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.bank-accounts.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/template-categories/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.template-categories.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.template-categories.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/template-categories/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.template-categories.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/template-categories/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.template-categories.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/template-categories/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.template-categories.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/template-categories' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.template-categories.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.template-categories.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/template-categories/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.template-categories.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/pns-statuses/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pns-statuses.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pns-statuses.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/pns-statuses/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pns-statuses.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/pns-statuses/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pns-statuses.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/pns-statuses/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pns-statuses.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/pns-statuses' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pns-statuses.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pns-statuses.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/pns-statuses/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pns-statuses.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/appreciations/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.appreciations.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.appreciations.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/appreciations/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.appreciations.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/appreciations/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.appreciations.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/appreciations/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.appreciations.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/appreciations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.appreciations.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.appreciations.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/appreciations/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.appreciations.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-appreciations/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.user-appreciations.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.user-appreciations.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-appreciations/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.user-appreciations.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-appreciations/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.user-appreciations.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-appreciations/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.user-appreciations.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-appreciations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.user-appreciations.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.user-appreciations.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-appreciations/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.user-appreciations.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/cities/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.cities.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.cities.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/cities/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.cities.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/cities/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.cities.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/cities/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.cities.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/cities' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.cities.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.cities.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/cities/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.cities.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/chats/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.chats.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.chats.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/chats/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.chats.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/chats/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.chats.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/chats/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.chats.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/chats' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.chats.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.chats.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/chats/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.chats.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/payment-vendors/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payment-vendors.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payment-vendors.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/payment-vendors/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payment-vendors.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/payment-vendors/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payment-vendors.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/payment-vendors/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payment-vendors.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/payment-vendors' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payment-vendors.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payment-vendors.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/payment-vendors/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payment-vendors.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/rooms/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.rooms.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.rooms.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/rooms/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.rooms.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/rooms/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.rooms.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/rooms/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.rooms.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/rooms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.rooms.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.rooms.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/rooms/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.rooms.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/lesson-plans/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plans.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plans.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/lesson-plans/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plans.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/lesson-plans/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plans.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/lesson-plans/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plans.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/lesson-plans' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plans.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plans.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/lesson-plans/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plans.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tags/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.tags.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.tags.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tags/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.tags.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tags/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.tags.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tags/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.tags.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tags' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.tags.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.tags.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tags/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.tags.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/taggables/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.taggables.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.taggables.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/taggables/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.taggables.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/taggables/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.taggables.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/taggables/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.taggables.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/taggables' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.taggables.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.taggables.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/taggables/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.taggables.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/departments/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.departments.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.departments.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/departments/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.departments.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/departments/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.departments.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/departments/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.departments.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/departments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.departments.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.departments.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/departments/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.departments.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/votes/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.votes.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.votes.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/votes/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.votes.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/votes/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.votes.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/votes/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.votes.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/votes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.votes.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.votes.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/votes/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.votes.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/votables/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.votables.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.votables.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/votables/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.votables.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/votables/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.votables.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/votables/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.votables.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/votables' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.votables.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.votables.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/votables/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.votables.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/conversations/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.conversations.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.conversations.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/conversations/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.conversations.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/conversations/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.conversations.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/conversations/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.conversations.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/conversations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.conversations.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.conversations.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/conversations/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.conversations.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-conversations/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.user-conversations.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.user-conversations.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-conversations/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.user-conversations.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-conversations/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.user-conversations.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-conversations/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.user-conversations.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-conversations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.user-conversations.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.user-conversations.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-conversations/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.user-conversations.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/push-tokens/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.push-tokens.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.push-tokens.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/push-tokens/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.push-tokens.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/push-tokens/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.push-tokens.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/push-tokens/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.push-tokens.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/push-tokens' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.push-tokens.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.push-tokens.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/push-tokens/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.push-tokens.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/articles/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.articles.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.articles.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/articles/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.articles.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/articles/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.articles.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/articles/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.articles.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/articles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.articles.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.articles.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/articles/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.articles.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tasks/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.tasks.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.tasks.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tasks/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.tasks.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tasks/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.tasks.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tasks/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.tasks.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tasks' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.tasks.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.tasks.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tasks/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.tasks.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/provinces/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.provinces.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.provinces.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/provinces/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.provinces.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/provinces/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.provinces.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/provinces/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.provinces.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/provinces' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.provinces.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.provinces.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/provinces/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.provinces.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/event-categories/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-categories.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-categories.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/event-categories/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-categories.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/event-categories/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-categories.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/event-categories/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-categories.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/event-categories' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-categories.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-categories.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/event-categories/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-categories.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/locations/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.locations.order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.locations.update_order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/locations/action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.locations.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/locations/relation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.locations.relation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/locations/remove' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.locations.media.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/locations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.locations.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.locations.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/locations/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.locations.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.settings.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.settings.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.settings.update',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/media' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.media.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/media/files' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.media.files',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/media/new_folder' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.media.new_folder',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/media/delete_file_folder' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.media.delete',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/media/move_file' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.media.move',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/media/rename_file' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.media.rename',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/media/upload' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.media.upload',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/media/crop' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.media.crop',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/bread' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.bread.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.bread.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/database' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.database.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.database.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/database/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.database.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/compass' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.compass.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.compass.post',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/voyager-assets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.voyager_assets',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/attendance' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.attendance',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/accountarea' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.accountarea',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/secure' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CIwqrpz1w4JmMN1q',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/userreport' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.userreport.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/userreport2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::j4zLHOGHaVwpoI7R',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/textfield_question_analytic' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.textfield.questionanalytic',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/selectoptions_question_analytic' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.selectoptions.questionanalytic',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/question_package_analytic' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.questionpackageanalytic',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/topsis/question_package_analytic' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.topsis.questionpackageanalytic',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/topsis/textfield_question_analytic' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.topsis.textfield.questionanalytic',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/topsis/selectoptions_question_analytic' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.topsis.selectoptions.questionanalytic',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/api/textfield_question_analytic' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6EYAt1mF6qlmXc1y',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/api/selectoptions_question_analytic' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4AmRbOVgd7YmU70A',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/api/question_package_analytic' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8JGu52tlPRzpllmW',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/api/topsis/textfield_question_analytic' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8JlAF0qzYJXGeWKF',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/api/topsis/question_package_analytic' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::05ZJE6fBuAgJeP3S',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/api/topsis/selectoptions_question_analytic' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UMSoQHT9keOf0S5D',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/terms-conditions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ETBvKGCKGWOOW3rQ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/getcontactnumber' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8oy8FJCLOuvu1slU',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/tes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8lSiMkWk65kR7BFp',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/cek-perpanjangan-kongres' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Rq7ESQ6yJChWbp7X',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/oauth/(?|tokens/([^/]++)(*:32)|clients/([^/]++)(?|(*:58))|personal\\-access\\-tokens/([^/]++)(*:99))|/a(?|pi/(?|settings/([^/]++)(?|(*:138))|payment/notification/test/([^/]++)(*:181)|lessonplans/download/([^/]++)(*:218)|v(?|1/(?|ro(?|le/([^/]++)(?|(*:254))|om(?|/([^/]++)(?|(*:280))|s/([^/]++)/(?|viewmember(*:313)|userlist(*:329))))|user(?|/(?|([^/]++)(?|(*:362)|/(?|document(?|(*:385)|/([^/]++)(?|(*:405)))|vot(?|e(?|(*:425)|/([^/]++)(?|(*:445)))|able(?|(*:462)|/([^/]++)(?|(*:482))))|expired/status(*:507)))|search/([^/]++)(*:532))|template/([^/]++)(?|(*:561))|s/(?|grown/year/([^/]++)/(?|total(*:603)|pnsmember(*:620)|nonpnsmember(*:640)|extendedmember(*:662))|([^/]++)/kongres/surat\\-(?|mandat(*:704)|tugas(*:717))|active/grownbyyear/([^/]++)(*:753)|pns/search/([^/]++)(*:780)|nonpns/search/([^/]++)(*:810)|get(?|expired/search/([^/]++)(*:847)|by(?|province/([^/]++)(*:877)|city/([^/]++)(*:898)|district/([^/]++)(*:923)))|se(?|tDefaultAvatar/([^/]++)(*:961)|arch(?|/([^/]++)(*:985)|byemail/([^/]++)(*:1009)))))|p(?|ro(?|file/([^/]++)(?|(*:1047))|vince(?|/([^/]++)(?|(*:1077)|/department(?|(*:1100)|/([^/]++)(?|(*:1121))))|s/([^/]++)/(?|cities/payments/extended(?|(*:1174)|/count(*:1189))|get(?|provincebyid(*:1217)|allmembers(?|(*:1239)|/(?|count(*:1257)|search/([^/]++)(*:1281)))|expiredmembers(?|(*:1309)|/(?|count(*:1327)|search/([^/]++)(*:1351))))|departments/dpw/get(?|periode(*:1392)|byperiode/([^/]++)(*:1419))|pns(?|users(?|/search/([^/]++)(*:1459)|(*:1468))|count(*:1483))|nonpns(?|users(?|/search/([^/]++)(*:1526)|(*:1535))|count(*:1550)))))|ayment(?|/(?|([^/]++)(?|(*:1587))|paymentUrl(*:1607)|notification/test/([^/]++)(*:1642))|vendor/([^/]++)(?|(*:1670))|s/(?|paymentreport(?|/([^/]++)/([^/]++)(*:1719)|by(?|province/([^/]++)/([^/]++)/([^/]++)(*:1768)|city/([^/]++)/([^/]++)/([^/]++)(*:1808)))|get(?|paymentreportfor(?|province/([^/]++)(*:1861)|city/([^/]++)(*:1883))|valuetransactionstotaldp(?|w/([^/]++)(*:1930)|d/([^/]++)(*:1949))|status/([^/]++)(*:1974))|bymonthyear(?|(?:/([^/]++)(?:/([^/]++))?)?(*:2026)|/city(?|(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?(*:2085)|users(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?(*:2141)))|transfer/history/dp(?|w/([^/]++)(*:2184)|d/([^/]++)(*:2203))))|ost(?|/(?|([^/]++)(?|(*:2236))|re(?|port(*:2255)|ad(*:2266)))|comment/([^/]++)(?|(*:2296))|like/([^/]++)(?|(*:2322))|bookmark/([^/]++)(?|(*:2352)))|ublicpost(?:/([^/]++))?(*:2386))|g(?|rade/([^/]++)(?|(*:2416))|et(?|postbycommentid/([^/]++)(*:2455)|\\-event\\-by\\-id/([^/]++)(*:2488)))|s(?|u(?|bject/([^/]++)(?|(*:2524))|rah/([^/]++)(?|(*:2549)))|tudent/(?|room/([^/]++)(?|(*:2586))|assigments(?|/search/([^/]++)(*:2625)|ession/([^/]++)(?|(*:2652)))|c(?|heck(?|payment/([^/]++)(*:2690)|assignmentpayment/([^/]++)(*:2725))|onfirmpayment/([^/]++)(*:2757))|get(?|payment/([^/]++)(*:2789)|assignmentpaymentdetails/([^/]++)(*:2831))|p(?|urchasedassignment/([^/]++)(*:2872)|aidassignmentdetails/([^/]++)(*:2910)|laceassignmentpayment/([^/]++)(*:2949)))|e(?|ssion/(?|([^/]++)(?|(*:2984))|getsessionid/([^/]++)(*:3015)|savescore(*:3033))|ttings/([^/]++)(?|(*:3061))))|c(?|it(?|y/([^/]++)(?|(*:3095)|/department(?|(*:3118)|/([^/]++)(?|(*:3139))))|ies/([^/]++)/(?|subscription\\-payments(*:3189)|pns(?|users(?|/search/([^/]++)(*:3228)|(*:3237))|count(*:3252))|nonpns(?|users(?|/search/([^/]++)(*:3295)|(*:3304))|count(*:3319))|get(?|allmembers(?|(*:3348)|/(?|count(*:3366)|search/([^/]++)(*:3390)))|expiredmembers(?|(*:3418)|/(?|count(*:3436)|search/([^/]++)(*:3460))))))|o(?|mment(?|like/([^/]++)(?|(*:3502))|/([^/]++)(?|(*:3524)))|nversation/([^/]++)(?|(*:3557)))|ha(?|t(?|/([^/]++)(?|(*:3589))|channel/([^/]++)(?|(*:3618)))|nnel/([^/]++)(?|(*:3645)))|andidate/([^/]++)(?|(*:3676)))|d(?|istrict(?|/([^/]++)(?|(*:3713))|s/([^/]++)/(?|pns(?|users(?|/search/([^/]++)(*:3767)|(*:3776))|count(*:3791))|nonpns(?|users(?|/search/([^/]++)(*:3834)|(*:3843))|count(*:3858))|get(?|allmembers(?|(*:3887)|/(?|count(*:3905)|search/([^/]++)(*:3929)))|expiredmembers(?|(*:3957)|/(?|count(*:3975)|search/([^/]++)(*:3999))))))|ailyprayer/([^/]++)(?|(*:4035))|epartment(?|/(?|dpp/([^/]++)(?|(*:4076))|([^/]++)/file(?|(*:4102)|/([^/]++)(?|(*:4123))))|\\-division/([^/]++)(?|(*:4157))|s/dp(?|w/provinces/([^/]++)/getbytitle/([^/]++)(*:4214)|p/getby(?|title/([^/]++)(*:4247)|periode/([^/]++)(*:4272)))))|e(?|ducationallevel(?|/([^/]++)(?|(*:4319))|s/getbycity/([^/]++)(*:4349))|vent(?|/([^/]++)(?|(*:4378)|/report/excel/(?|registered(*:4414)|attended(*:4431)))|s/(?|users/([^/]++)/(?|profit(?|sum(*:4477)|(*:4486)|dates(*:4500))|withdrawprofit(?|(*:4527)|dates(*:4541)))|payments/([^/]++)/withdrawdetail(*:4584)|([^/]++)/(?|registered/users(?|(*:4624)|/(?|search/([^/]++)(*:4652)|count(*:4666)))|pa(?|yment(?|url(*:4693)|status(*:4708))|rtisipants(?|(*:4731)|/(?|search/([^/]++)(*:4759)|count(*:4773))))))))|a(?|ttendance/([^/]++)(?|(*:4814))|d/([^/]++)(?|(*:4837))|ssigment(?|guideduser/([^/]++)(?|(*:4880))|c(?|ategory/([^/]++)(?|(*:4913))|omment/([^/]++)(?|(*:4941))|hat/([^/]++)(?|(*:4966)))|type/([^/]++)(?|(*:4993))|/(?|([^/]++)(?|(*:5018))|selectoptionsonly(?|/([^/]++)(*:5057)|withanswer/([^/]++)(*:5085)))|like/([^/]++)(?|(*:5112))|rating/([^/]++)(?|(*:5140))|questionlist(?|/([^/]++)(?|(*:5177))|s/search/([^/]++)(*:5204))|s(?|ession(?|/(?|([^/]++)(?|(*:5242))|checkandstore(*:5265))|s/([^/]++)/review(*:5292))|/(?|search/([^/]++)(*:5321)|([^/]++)/(?|softdelete(*:5352)|restore(*:5368))|users/search/([^/]++)(*:5399)|questionlists/search/([^/]++)/([^/]++)(*:5446)|payable_questionlists/search/([^/]++)/([^/]++)(*:5501)|start/([^/]++)/([^/]++)(*:5533)|([^/]++)/update(*:5557)|get(?|masterpublish(?:/([^/]++))?(*:5599)|studentassigments/([^/]++)(*:5634)|assigmentinfo/([^/]++)(*:5665))|([^/]++)/(?|show(?|(*:5694)|_shuffle(*:5711))|history(*:5728)|([^/]++)/downloadexcel(*:5759)))))|nswer(?|list/([^/]++)(?|(*:5796))|/([^/]++)(?|(*:5818))))|lessonplan(?|format/([^/]++)(?|(*:5861))|/([^/]++)(?|(*:5883))|like/([^/]++)(?|(*:5909))|co(?|mment/([^/]++)(?|(*:5941))|ver/([^/]++)(?|(*:5966)))|r(?|eview/([^/]++)(?|(*:5998))|ating/([^/]++)(?|(*:6025)))|guideduser/([^/]++)(?|(*:6058))|s/(?|getby(?|educationallevel/([^/]++)(*:6106)|city/([^/]++)(*:6128))|download/([^/]++)(*:6155)))|b(?|ook(?|category/([^/]++)(?|(*:6196))|/([^/]++)(?|(*:6218)))|ank_account/([^/]++)(?|(*:6252)))|m(?|a(?|inchat/([^/]++)(?|(*:6289))|keThumbnail/([^/]++)(*:6319))|urottal/([^/]++)(?|(*:6348))|odule(?|/([^/]++)(?|(*:6378)|/dislike(*:6395))|content/([^/]++)(?|(*:6424))|s/(?|([^/]++)/(?|comments(?|(*:6462)|/([^/]++)(?|(*:6483)))|likes(?|(*:6502)|/([^/]++)(?|(*:6523))))|getbyeducationallevel/([^/]++)(?:/([^/]++))?(*:6579)|read/([^/]++)(*:6601)))|embercard/([^/]++)(*:6630))|f(?|ollow/([^/]++)(?|(*:6661))|inishedassigment(?:/([^/]++))?(*:6701))|t(?|emplate(?|/([^/]++)(?|(*:6737))|category/([^/]++)(?|(*:6767)))|ag/([^/]++)(?|(*:6792)))|qu(?|estion(?|nary(?|/([^/]++)(?|(*:6836))|sesion/([^/]++)(?|(*:6864)))|list(?|category/([^/]++)(?|(*:6902))|/([^/]++)(?|(*:6924)))|/([^/]++)(?|(*:6947))|_(?|item/(?|setispaid/([^/]++)(*:6987)|payable/([^/]++)(*:7012))|package/(?|setispaid/([^/]++)(*:7051)|payable/([^/]++)(*:7076))))|ickgetstatus/([^/]++)(*:7109))|kongres/(?|([^/]++)/guide\\-(?|location(*:7157)|book(*:7170))|users/([^/]++)/payment/check(?|status(*:7217)|payment(*:7233))|province/([^/]++)/payments(?|(*:7272)|/count(*:7287))|([^/]++)/(?|member/([^/]++)/payment/status(*:7339)|users/([^/]++)/surat(*:7368)))|notification/([^/]++)(?|(*:7403)))|2/(?|member/(?|otp\\-client/(?|search(?|/([^/]++)(*:7462)|\\-name/([^/]++)(*:7486))|user/search/([^/]++)(*:7516)|([^/]++)(?|(*:7536)|/edit(*:7550)|(*:7559))|verify(*:7575)|change\\-password(*:7600))|p(?|rovince(?|/(?|search/([^/]++)(*:7643)|([^/]++)(?|/(?|search/([^/]++)(*:7682)|e(?|dit(*:7698)|vent(?|(*:7714)|/(?|create(*:7733)|([^/]++)(?|(*:7753)|/edit(*:7767)|(*:7776))|month/([^/]++)/year/([^/]++)(*:7814))|(*:7824)))|province\\-member\\-info(?|(*:7860)|/(?|create(*:7879)|([^/]++)(?|(*:7899)|/edit(*:7913)|(*:7922)))|(*:7933))|c(?|ity(?|(*:7953)|/(?|create(*:7972)|([^/]++)(?|(*:7992)|/edit(*:8006)|(*:8015)))|(*:8026)|\\-(?|member(?|(*:8049)|/(?|create(*:8068)|([^/]++)(?|(*:8088)|/edit(*:8102)|(*:8111))|search/([^/]++)(*:8136))|(*:8146))|p(?|ns\\-member(?|(*:8173)|/(?|create(*:8192)|([^/]++)(?|(*:8212)|/edit(*:8226)|(*:8235))|search/([^/]++)(*:8260))|(*:8270))|ension\\-member(?|(*:8297)|/(?|create(*:8316)|([^/]++)(?|(*:8336)|/edit(*:8350)|(*:8359))|search/([^/]++)(*:8384))|(*:8394)))|non\\-pns\\-member(?|(*:8424)|/(?|create(*:8443)|([^/]++)(?|(*:8463)|/edit(*:8477)|(*:8486))|search/([^/]++)(*:8511))|(*:8521))|ex(?|pired\\-member(?|(*:8552)|/(?|create(*:8571)|([^/]++)(?|(*:8591)|/edit(*:8605)|(*:8614))|search/([^/]++)(*:8639))|(*:8649))|tend\\-member(?|(*:8674)|/(?|create(*:8693)|([^/]++)(?|(*:8713)|/edit(*:8727)|(*:8736))|search/([^/]++)(*:8761))|(*:8771)))|certificate\\-member(?|(*:8804)|/(?|create(*:8823)|([^/]++)(?|(*:8843)|/edit(*:8857)|(*:8866)))|(*:8877))|inpassing\\-member(?|(*:8907)|/(?|create(*:8926)|([^/]++)(?|(*:8946)|/edit(*:8960)|(*:8969)))|(*:8980))|bsi\\-member(?|(*:9004)|/(?|create(*:9023)|([^/]++)(?|(*:9043)|/edit(*:9057)|(*:9066)))|(*:9077))))|alendar\\-event(?|(*:9106)|/(?|create(*:9125)|([^/]++)(?|(*:9145)|/edit(*:9159)|(*:9168)))|(*:9179))))|(*:9191)))|\\-(?|member(?|/(?|([^/]++)(?|(*:9231)|/edit(*:9245)|(*:9254))|search/([^/]++)(*:9279))|\\-detail/([^/]++)(?|(*:9309)|/edit(*:9323)|(*:9332)))|certificate\\-member/([^/]++)(?|(*:9374)|/edit(*:9388)|(*:9397))|inpassing\\-member/([^/]++)(?|(*:9436)|/edit(*:9450)|(*:9459))|bsi\\-member/([^/]++)(?|(*:9492)|/edit(*:9506)|(*:9515))|p(?|ns\\-member/(?|([^/]++)(?|(*:9554)|/edit(*:9568)|(*:9577))|search/([^/]++)(*:9602))|ension\\-member/(?|([^/]++)(?|(*:9641)|/edit(*:9655)|(*:9664))|search/([^/]++)(*:9689)))|non\\-pns\\-member/(?|([^/]++)(?|(*:9731)|/edit(*:9745)|(*:9754))|search/([^/]++)(*:9779))|ex(?|pired\\-member/(?|([^/]++)(?|(*:9822)|/edit(*:9836)|(*:9845))|search/([^/]++)(*:9870))|tend\\-member/(?|([^/]++)(?|(*:9907)|/edit(*:9921)|(*:9930))|search/([^/]++)(*:9955)))))|ost(?|/(?|([^/]++)(?|(*:9989)|/(?|edit(*:10006)|comment(?|(*:10026)|/(?|create(*:10046)|([^/]++)(?|(*:10067)|/edit(*:10082)|(*:10092)))|(*:10104))|like(?|(*:10122)|/(?|create(*:10142)|([^/]++)(?|(*:10163)|/edit(*:10178)|(*:10188)))|(*:10200))|read(?|(*:10218)|/(?|create(*:10238)|([^/]++)(?|(*:10259)|/edit(*:10274)|(*:10284)))|(*:10296)))|(*:10308))|u(?|ser/([^/]++)(*:10335)|pdate/([^/]++)(*:10359)))|\\-bookmark/([^/]++)(?|(*:10393)|/edit(*:10408)|(*:10418)))|ersonal\\-conversation/(?|([^/]++)(?|(*:10466)|/edit(*:10481)|(*:10491))|search/([^/]++)(*:10517)))|d(?|istrict/([^/]++)(?|/(?|search/([^/]++)(*:10571)|district\\-member\\-info(?|(*:10606)|/(?|create(*:10626)|([^/]++)(?|(*:10647)|/edit(*:10662)|(*:10672)))|(*:10684))|edit(*:10699))|(*:10710))|aily\\-prayer/([^/]++)(?|(*:10745)|/edit(*:10760)|(*:10770))|epartment(?|/([^/]++)(?|(*:10805)|/(?|edit(*:10823)|department\\-user(?|(*:10852)|/(?|create(*:10872)|([^/]++)(?|(*:10893)|/edit(*:10908)|(*:10918)))|(*:10930)))|(*:10942))|\\-division/([^/]++)(?|(*:10975)|/edit(*:10990)|(*:11000)))|p(?|p\\-department(?|/([^/]++)(?|(*:11044)|/edit(*:11059)|(*:11069))|s/([^/]++)/childrens(*:11100))|w\\-department(?|/([^/]++)(?|(*:11139)|/edit(*:11154)|(*:11164))|s/(?|province/([^/]++)(*:11197)|([^/]++)/childrens(*:11225)))|d\\-department(?|/([^/]++)(?|(*:11265)|/edit(*:11280)|(*:11290))|s/(?|city/([^/]++)(*:11319)|([^/]++)/childrens(*:11347)))|c\\-department(?|/([^/]++)(?|(*:11387)|/edit(*:11402)|(*:11412))|s/(?|district/([^/]++)(*:11445)|([^/]++)/childrens(*:11473)))))|c(?|ity/([^/]++)(?|/(?|search/([^/]++)(*:11525)|city\\-member\\-info(?|(*:11556)|/(?|create(*:11576)|([^/]++)(?|(*:11597)|/edit(*:11612)|(*:11622)))|(*:11634))|edit(*:11649)|district(?|(*:11670)|/(?|create(*:11690)|([^/]++)(?|(*:11711)|/edit(*:11726)|(*:11736)))|(*:11748)|\\-(?|member(?|(*:11772)|/(?|create(*:11792)|([^/]++)(?|(*:11813)|/edit(*:11828)|(*:11838))|search/([^/]++)(*:11864))|(*:11875))|p(?|ns\\-member(?|(*:11903)|/(?|create(*:11923)|([^/]++)(?|(*:11944)|/edit(*:11959)|(*:11969))|search/([^/]++)(*:11995))|(*:12006))|ension\\-member(?|(*:12034)|/(?|create(*:12054)|([^/]++)(?|(*:12075)|/edit(*:12090)|(*:12100))|search/([^/]++)(*:12126))|(*:12137)))|non\\-pns\\-member(?|(*:12168)|/(?|create(*:12188)|([^/]++)(?|(*:12209)|/edit(*:12224)|(*:12234))|search/([^/]++)(*:12260))|(*:12271))|extend\\-member(?|(*:12299)|/(?|create(*:12319)|([^/]++)(?|(*:12340)|/edit(*:12355)|(*:12365))|search/([^/]++)(*:12391))|(*:12402))|certificate\\-member(?|(*:12435)|/(?|create(*:12455)|([^/]++)(?|(*:12476)|/edit(*:12491)|(*:12501)))|(*:12513))|inpassing\\-member(?|(*:12544)|/(?|create(*:12564)|([^/]++)(?|(*:12585)|/edit(*:12600)|(*:12610)))|(*:12622))|bsi\\-member(?|(*:12647)|/(?|create(*:12667)|([^/]++)(?|(*:12688)|/edit(*:12703)|(*:12713)))|(*:12725)))))|(*:12739))|hat/([^/]++)/term(?|(*:12770)|/(?|create(*:12790)|([^/]++)(?|(*:12811)|/edit(*:12826)|(*:12836)))|(*:12848))|ategory/([^/]++)/islamic\\-study(?|(*:12893)|/(?|create(*:12913)|([^/]++)(?|(*:12934)|/edit(*:12949)|(*:12959)))|(*:12971))|lassroom/(?|([^/]++)(?|(*:13005)|/(?|edit(*:13023)|task(?|(*:13040)|/(?|create(*:13060)|([^/]++)(?|(*:13081)|/edit(*:13096)|(*:13106)))|(*:13118)))|(*:13130))|search/([^/]++)(*:13156)))|e(?|vent(?|/(?|([^/]++)(?|(*:13194)|/(?|edit(*:13212)|participant(?|(*:13236)|/(?|create(*:13256)|([^/]++)(?|(*:13277)|/edit(*:13292)|(*:13302)))|(*:13314))|barcode(?|(*:13335)|/(?|create(*:13355)|([^/]++)(?|(*:13376)|/edit(*:13391)|(*:13401)))|(*:13413)))|(*:13425))|session(?|/([^/]++)(*:13455)|s/show/([^/]++)/([^/]++)(*:13489))|([^/]++)/sessions/([^/]++)/users/([^/]++)/presents(*:13550)|participant/([^/]++)(?|/event/([^/]++)(*:13598)|(*:13608))|all\\-participants/([^/]++)(*:13645)|([^/]++)/participant/(?|search/([^/]++)(*:13694)|([^/]++)/generate\\-card(*:13727))|c(?|reated/([^/]++)(*:13757)|ategory(*:13774))|month/([^/]++)/year/([^/]++)(*:13813))|\\-categories/([^/]++)(?|(*:13848)|/edit(*:13863)|(*:13873)))|ducational\\-level/([^/]++)(?|(*:13914)|/edit(*:13929)|(*:13939)))|s(?|tory/([^/]++)(?|(*:13971)|/(?|edit(*:13989)|read(?|(*:14006)|/(?|create(*:14026)|([^/]++)(?|(*:14047)|/edit(*:14062)|(*:14072)))|(*:14084)))|(*:14096))|ubscribe\\-fee(?|/([^/]++)(?|(*:14135)|/edit(*:14150)|(*:14160))|\\-status/([^/]++)(?|(*:14191)|/edit(*:14206)|(*:14216)))|etting/([^/]++)(?|(*:14246)|/edit(*:14261)|(*:14271)))|user(?|/(?|([^/]++)(?|(*:14305)|/(?|e(?|dit(*:14326)|vent(?|(*:14343)|/(?|create(*:14363)|([^/]++)(?|(*:14384)|/edit(*:14399)|(*:14409)))|(*:14421)|\\-attendance(?|(*:14446)|/(?|create(*:14466)|([^/]++)(?|(*:14487)|/edit(*:14502)|(*:14512)))|(*:14524))))|story(?|(*:14545)|/(?|create(*:14565)|([^/]++)(?|(*:14586)|/edit(*:14601)|(*:14611)))|(*:14623))|p(?|ost(?|(*:14644)|/(?|create(*:14664)|([^/]++)(?|(*:14685)|/edit(*:14700)|(*:14710)))|(*:14722))|rofile(?|(*:14742)|/(?|create(*:14762)|([^/]++)(?|(*:14783)|/edit(*:14798)|(*:14808)))|(*:14820))|ersonal\\-conversation(?|(*:14855)|/(?|create(*:14875)|([^/]++)(?|(*:14896)|/edit(*:14911)|(*:14921)))|(*:14933))|ush\\-token(?|(*:14957)|/(?|create(*:14977)|([^/]++)(?|(*:14998)|/edit(*:15013)|(*:15023)))|(*:15035))|ayment(?|(*:15055)|/(?|create(*:15075)|([^/]++)(?|(*:15096)|/edit(*:15111)|(*:15121)))|(*:15133))|ns\\-status(?|(*:15157)|/(?|create(*:15177)|([^/]++)(?|(*:15198)|/edit(*:15213)|(*:15223)))|(*:15235)))|gallery(?|(*:15257)|/(?|create(*:15277)|([^/]++)(?|(*:15298)|/edit(*:15313)|(*:15323)))|(*:15335))|a(?|lbum(?|(*:15357)|/(?|create(*:15377)|([^/]++)(?|(*:15398)|/edit(*:15413)|(*:15423)))|(*:15435))|vatar(?|(*:15454)|/(?|create(*:15474)|([^/]++)(?|(*:15495)|/edit(*:15510)|(*:15520)))|(*:15532))|ssignment(?|(*:15555)|/(?|create(*:15575)|([^/]++)(?|(*:15596)|/edit(*:15611)|(*:15621)))|(*:15633)))|banner(?|(*:15654)|/(?|create(*:15674)|([^/]++)(?|(*:15695)|/edit(*:15710)|(*:15720)))|(*:15732))|m(?|ember\\-card(?|(*:15761)|/(?|create(*:15781)|([^/]++)(?|(*:15802)|/edit(*:15817)|(*:15827)))|(*:15839))|odule(?|(*:15858)|/(?|create(*:15878)|([^/]++)(?|(*:15899)|/edit(*:15914)|(*:15924)))|(*:15936)))|question\\-list(?|(*:15965)|/(?|create(*:15985)|([^/]++)(?|(*:16006)|/edit(*:16021)|(*:16031)))|(*:16043))|room(?|(*:16061)|/(?|create(*:16081)|([^/]++)(?|(*:16102)|/edit(*:16117)|(*:16127)))|(*:16139))|lesson\\-plan(?|(*:16165)|/(?|create(*:16185)|([^/]++)(?|(*:16206)|/edit(*:16221)|(*:16231)))|(*:16243))|islamic\\-study(?|(*:16271)|/(?|create(*:16291)|([^/]++)(?|(*:16312)|/edit(*:16327)|(*:16337)))|(*:16349)))|(*:16361))|islamic\\-studies/search/([^/]++)(*:16404)|module/search/([^/]++)(*:16436)|lesson\\-plans/search/([^/]++)(*:16475)|assignment/search/([^/]++)(*:16511)|question\\-lists/search/([^/]++)(*:16552)|rooms/search/([^/]++)(*:16583))|\\-bookmark/([^/]++)(?|(*:16616)|/edit(*:16631)|(*:16641))|s/(?|search/([^/]++)(*:16672)|province/([^/]++)(*:16699)|([^/]++)/updatestatus(*:16730)|province/([^/]++)/search/([^/]++)(*:16773)))|m(?|urottal/([^/]++)(?|(*:16808)|/edit(*:16823)|(*:16833))|ember(?|ship\\-fee(?|/([^/]++)(?|(*:16876)|/edit(*:16891)|(*:16901))|\\-status/([^/]++)(?|(*:16932)|/edit(*:16947)|(*:16957)))|\\-all/([^/]++)(?|(*:16986)|/edit(*:17001)|(*:17011)))|odule(?|/(?|([^/]++)(?|(*:17046)|/(?|edit(*:17064)|content(?|(*:17084)|/(?|create(*:17104)|([^/]++)(?|(*:17125)|/edit(*:17140)|(*:17150)))|(*:17162)))|(*:17174))|grade/([^/]++)(*:17199)|search/([^/]++)(*:17224))|\\-(?|like/(?|([^/]++)(?|(*:17259)|/edit(*:17274)|(*:17284))|search/([^/]++)(*:17310))|cover/([^/]++)(?|(*:17338)|/edit(*:17353)|(*:17363)))))|a(?|rticle/([^/]++)(?|(*:17399)|/edit(*:17414)|(*:17424))|ssignment(?|\\-(?|category/([^/]++)(?|(*:17472)|/(?|edit(*:17490)|type(?|(*:17507)|/(?|create(*:17527)|([^/]++)(?|(*:17548)|/edit(*:17563)|(*:17573)))|(*:17585)))|(*:17597))|uses/([^/]++)(?|(*:17624)|/edit(*:17639)|(*:17649))|session/([^/]++)(?|(*:17679)|/edit(*:17694)|(*:17704)))|/(?|([^/]++)(?|(*:17731)|/(?|edit(*:17749)|session(*:17766)|not\\-yet\\-rated(*:17791)|question\\-lists(*:17816))|(*:17827))|search/([^/]++)(?|/question\\-lists(*:17872)|(*:17882)))))|notification/([^/]++)(?|(*:17920)|/edit(*:17935)|(*:17945))|year/([^/]++)/month/([^/]++)/(?|event(?|(*:17996)|/(?|create(*:18016)|([^/]++)(?|(*:18037)|/edit(*:18052)|(*:18062)))|(*:18074))|province/([^/]++)/event(?|(*:18111)|/(?|create(*:18131)|([^/]++)(?|(*:18152)|/edit(*:18167)|(*:18177)))|(*:18189)))|k(?|ta/([^/]++)(?|(*:18219)|/edit(*:18234)|(*:18244))|ongres/(?|p(?|ayments/search/([^/]++)(*:18292)|rovince/([^/]++)/city\\-payments(?|(*:18336)|/search/([^/]++)(*:18362)))|city/([^/]++)/district\\-payments(?|(*:18409)|/search/([^/]++)(*:18435))))|grade/([^/]++)(?|(*:18465)|/edit(*:18480)|(*:18490))|book(?|/([^/]++)(?|(*:18520)|/edit(*:18535)|(*:18545))|\\-category/([^/]++)(?|(*:18578)|/(?|edit(*:18596)|book(?|(*:18613)|/(?|create(*:18633)|([^/]++)(?|(*:18654)|/edit(*:18669)|(*:18679)))|(*:18691)))|(*:18703)))|question\\-list(?|/([^/]++)(?|(*:18744)|/edit(*:18759)|(*:18769))|s/filter/grade/([^/]++)(*:18803))|room(?|/([^/]++)(?|(*:18833)|/edit(*:18848)|(*:18858))|s/([^/]++)/ranking(*:18887))|lesson\\-plan(?|/([^/]++)(?|(*:18925)|/edit(*:18940)|(*:18950))|\\-(?|cover/([^/]++)(?|(*:18983)|/edit(*:18998)|(*:19008))|liked/([^/]++)(?|(*:19036)|/edit(*:19051)|(*:19061)))|s/favorite/search/([^/]++)(*:19099))|islamic\\-stud(?|y(?|/([^/]++)(?|(*:19142)|/(?|edit(*:19160)|like(?|(*:19177)|/(?|create(*:19197)|([^/]++)(?|(*:19218)|/edit(*:19233)|(*:19243)))|(*:19255))|comment(?|(*:19276)|/(?|create(*:19296)|([^/]++)(?|(*:19317)|/edit(*:19332)|(*:19342)))|(*:19354))|upvote(?|(*:19374)|/(?|create(*:19394)|([^/]++)(?|(*:19415)|/edit(*:19430)|(*:19440)))|(*:19452))|downvote(?|(*:19474)|/(?|create(*:19494)|([^/]++)(?|(*:19515)|/edit(*:19530)|(*:19540)))|(*:19552)))|(*:19564))|\\-category/([^/]++)(?|(*:19597)|/edit(*:19612)|(*:19622)))|ies/search/([^/]++)(*:19653))|t(?|ask/([^/]++)/result(?|(*:19690)|/(?|create(*:19710)|([^/]++)(?|(*:19731)|/edit(*:19746)|(*:19756)))|(*:19768))|raining\\-event/([^/]++)(?|(*:19805)|/edit(*:19820)|(*:19830)))|file/([^/]++)(?|(*:19858)|/edit(*:19873)|(*:19883)))|admin/(?|kongres/member/(?|search/([^/]++)(*:19937)|([^/]++)/manual\\-payment/([^/]++)(*:19980))|c(?|andidate/([^/]++)(?|(*:20015)|/vote(?|(*:20033)|/([^/]++)(?|(*:20055))))|ity/([^/]++)/district(?|(*:20092)|/([^/]++)(?|(*:20114))))|votable/([^/]++)(?|(*:20146))|user/(?|([^/]++)(?|/(?|votable(?|(*:20190)|/([^/]++)(?|(*:20212)))|file(?|(*:20231)|/([^/]++)(?|(*:20253))))|(*:20266))|search/([^/]++)(*:20292))|department(?|\\-(?|division/([^/]++)(?|(*:20341))|user/([^/]++)(?|(*:20368)))|/([^/]++)(?|(*:20392))|s/search/([^/]++)(*:20420))|excel/province/([^/]++)/user(?|(*:20462)|/([^/]++)(?|(*:20484)))|ads/([^/]++)(?|(*:20511))|p(?|ost/([^/]++)(?|(*:20541))|rovince/([^/]++)(?|(*:20571)|/city(?|(*:20589)|/([^/]++)(?|(*:20611))))|ayment/(?|([^/]++)(?|(*:20645))|attribute/([^/]++)/get\\-unique\\-value(*:20693)|s(?|tatistic/year/([^/]++)/month/([^/]++)(*:20744)|ync/year/([^/]++)/month/([^/]++)(*:20786))))|islamic\\-study/([^/]++)(?|(*:20825)|/(?|approval(*:20847)|rejected(*:20865)))|role/([^/]++)(?|(*:20893))))))|zwar/year/([^/]++)/month/([^/]++)(*:20941)|dmin/(?|m(?|enus/([^/]++)(?|/(?|restore(*:20990)|edit(*:21004)|builder(*:21021)|order(*:21036)|item(?|/([^/]++)(*:21062)|(*:21072)))|(*:21084))|urottals/([^/]++)(?|/(?|restore(*:21126)|edit(*:21140))|(*:21151))|akeThumbnails/([^/]++)(*:21184))|r(?|o(?|les/([^/]++)(?|/(?|restore(*:21229)|edit(*:21243))|(*:21254))|oms/([^/]++)(?|/(?|restore(*:21291)|edit(*:21305))|(*:21316)))|eset/password/([^/]++)(*:21350))|c(?|ategories/([^/]++)(?|/(?|restore(*:21397)|edit(*:21411))|(*:21422))|ities/([^/]++)(?|/(?|restore(*:21461)|edit(*:21475))|(*:21486))|hats/([^/]++)(?|/(?|restore(*:21524)|edit(*:21538))|(*:21549))|onversations/([^/]++)(?|/(?|restore(*:21595)|edit(*:21609))|(*:21620)))|p(?|osts/([^/]++)(?|/(?|restore(*:21663)|edit(*:21677))|(*:21688))|a(?|ges/([^/]++)(?|/(?|restore(*:21729)|edit(*:21743))|(*:21754))|yment(?|s/([^/]++)(?|/(?|restore(*:21797)|edit(*:21811))|(*:21822))|\\-vendors/([^/]++)(?|/(?|restore(*:21865)|edit(*:21879))|(*:21890))))|ro(?|files/([^/]++)(?|/(?|restore(*:21936)|edit(*:21950))|(*:21961))|vinces/([^/]++)(?|/(?|restore(*:22001)|edit(*:22015))|(*:22026)))|ns\\-statuses/([^/]++)(?|/(?|restore(*:22073)|edit(*:22087))|(*:22098))|ush\\-tokens/([^/]++)(?|/(?|restore(*:22143)|edit(*:22157))|(*:22168)))|e(?|vent(?|s/([^/]++)(?|/(?|restore(*:22215)|edit(*:22229))|(*:22240))|\\-(?|guests/([^/]++)(?|/(?|restore(*:22285)|edit(*:22299))|(*:22310))|categories/([^/]++)(?|/(?|restore(*:22354)|edit(*:22368))|(*:22379))))|ducational\\-levels/([^/]++)(?|/(?|restore(*:22433)|edit(*:22447))|(*:22458)))|l(?|esson\\-plan(?|\\-(?|formats/([^/]++)(?|/(?|restore(*:22523)|edit(*:22537))|(*:22548))|covers/([^/]++)(?|/(?|restore(*:22588)|edit(*:22602))|(*:22613)))|s/([^/]++)(?|/(?|restore(*:22649)|edit(*:22663))|(*:22674)))|ocations/([^/]++)(?|/(?|restore(*:22717)|edit(*:22731))|(*:22742)))|grades/([^/]++)(?|/(?|restore(*:22783)|edit(*:22797))|(*:22808))|b(?|ook(?|\\-categories/([^/]++)(?|/(?|restore(*:22864)|edit(*:22878))|(*:22889))|s/([^/]++)(?|/(?|restore(*:22924)|edit(*:22938))|(*:22949)))|ank\\-accounts/([^/]++)(?|/(?|restore(*:22997)|edit(*:23011))|(*:23022))|read/(?|([^/]++)(?|/(?|create(*:23062)|edit(*:23076))|(*:23087))|relationship(*:23110)|delete_relationship/([^/]++)(*:23148)))|a(?|ssigment(?|\\-(?|categories/([^/]++)(?|/(?|restore(*:23213)|edit(*:23227))|(*:23238))|types/([^/]++)(?|/(?|restore(*:23277)|edit(*:23291))|(*:23302)))|s/([^/]++)(?|/(?|restore(*:23338)|edit(*:23352))|(*:23363)))|nswer\\-lists/([^/]++)(?|/(?|restore(*:23410)|edit(*:23424))|(*:23435))|ppreciations/([^/]++)(?|/(?|restore(*:23481)|edit(*:23495))|(*:23506))|rticles/([^/]++)(?|/(?|restore(*:23547)|edit(*:23561))|(*:23572)))|d(?|a(?|ily\\-prayers/([^/]++)(?|/(?|restore(*:23627)|edit(*:23641))|(*:23652))|tabase/([^/]++)(?|(*:23681)|/edit(*:23696)|(*:23706)))|epartments/([^/]++)(?|/(?|restore(*:23751)|edit(*:23765))|(*:23776)))|files/([^/]++)(?|/(?|restore(*:23816)|edit(*:23830))|(*:23841))|user(?|s/([^/]++)(?|/(?|restore(*:23883)|edit(*:23897))|(*:23908))|\\-(?|appreciations/([^/]++)(?|/(?|restore(*:23960)|edit(*:23974))|(*:23985))|conversations/([^/]++)(?|/(?|restore(*:24032)|edit(*:24046))|(*:24057))))|se(?|ssions/([^/]++)(?|/(?|restore(*:24104)|edit(*:24118))|(*:24129))|ttings/([^/]++)(?|(*:24158)|/(?|move_(?|up(*:24182)|down(*:24196))|delete_value(*:24219))))|question(?|s/([^/]++)(?|/(?|restore(*:24267)|edit(*:24281))|(*:24292))|\\-lists/([^/]++)(?|/(?|restore(*:24333)|edit(*:24347))|(*:24358))|naries/([^/]++)(?|/(?|restore(*:24398)|edit(*:24412))|(*:24423)))|t(?|emplate(?|s/([^/]++)(?|/(?|restore(*:24473)|edit(*:24487))|(*:24498))|\\-categories/([^/]++)(?|/(?|restore(*:24544)|edit(*:24558))|(*:24569)))|a(?|g(?|s/([^/]++)(?|/(?|restore(*:24613)|edit(*:24627))|(*:24638))|gables/([^/]++)(?|/(?|restore(*:24678)|edit(*:24692))|(*:24703)))|sks/([^/]++)(?|/(?|restore(*:24741)|edit(*:24755))|(*:24766))))|necessaries/([^/]++)(?|/(?|restore(*:24813)|edit(*:24827))|(*:24838))|vot(?|es/([^/]++)(?|/(?|restore(*:24880)|edit(*:24894))|(*:24905))|ables/([^/]++)(?|/(?|restore(*:24944)|edit(*:24958))|(*:24969)))))|/user/([^/]++)/(?|member(?|card/(?|front(*:25023)|back(*:25037))|\\-card(?|(*:25057)|/(?|create(*:25077)|([^/]++)(?|(*:25098)|/edit(*:25113)|(*:25123)))|(*:25135)))|cetak\\-member\\-card(?|(*:25169)|/([^/]++)(?|(*:25191))))|/watzap/(?|user/active/([^/]++)/from/([^/]++)/to/([^/]++)(*:25261)|p(?|erpanjang/(?|([^/]++)(*:25296)|ambil/([^/]++)/dari/([^/]++)/sampai/([^/]++)(*:25350))|rovince/([^/]++)/users/active/([^/]++)(*:25399))|guru(?|Pns/([^/]++)(*:25429)|NonPns/([^/]++)(*:25454))|info/dari/([^/]++)/sampai/([^/]++)(*:25499))|/event/([^/]++)/(?|barcode(*:25536)|download(*:25554)|participant/([^/]++)(*:25584))|/lesson\\-plans/([^/]++)/([^/]++)/([^/]++)/([^/]++)/generate/cover/([^/]++)(*:25669)|/module/([^/]++)/([^/]++)/([^/]++)/([^/]++)/generate/cover/([^/]++)(*:25746)|/password/reset/([^/]++)(*:25780))/?$}sDu',
    ),
    3 => 
    array (
      32 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.tokens.destroy',
          ),
          1 => 
          array (
            0 => 'token_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      58 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.update',
          ),
          1 => 
          array (
            0 => 'client_id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.destroy',
          ),
          1 => 
          array (
            0 => 'client_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      99 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.destroy',
          ),
          1 => 
          array (
            0 => 'token_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      138 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.settings.show',
          ),
          1 => 
          array (
            0 => 'setting',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.settings.update',
          ),
          1 => 
          array (
            0 => 'setting',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.settings.destroy',
          ),
          1 => 
          array (
            0 => 'setting',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      181 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::vq8Z58UtZbKHgJve',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      218 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::8jiSd6eTRPBL8qsF',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      254 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.role.show',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.role.update',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.role.destroy',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      280 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.room.show',
          ),
          1 => 
          array (
            0 => 'room',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.room.update',
          ),
          1 => 
          array (
            0 => 'room',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.room.destroy',
          ),
          1 => 
          array (
            0 => 'room',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      313 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::oO4xDUmYRrutmYqO',
          ),
          1 => 
          array (
            0 => 'roomid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      329 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::yqQqLWZrqAVPIkhx',
          ),
          1 => 
          array (
            0 => 'room_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      362 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.user.show',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.user.update',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.user.destroy',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      385 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.user.document.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.user.document.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      405 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.user.document.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'document',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.user.document.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'document',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.user.document.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'document',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      425 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.user.vote.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.user.vote.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      445 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.user.vote.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'vote',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.user.vote.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'vote',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.user.vote.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'vote',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      462 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.user.votable.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.user.votable.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      482 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.user.votable.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'votable',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.user.votable.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'votable',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.user.votable.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'votable',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      507 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::0ZlLupGojiuGAxIn',
          ),
          1 => 
          array (
            0 => 'userId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      532 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::Q9pOckoL42e2nUz2',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      561 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.usertemplate.show',
          ),
          1 => 
          array (
            0 => 'usertemplate',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.usertemplate.update',
          ),
          1 => 
          array (
            0 => 'usertemplate',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.usertemplate.destroy',
          ),
          1 => 
          array (
            0 => 'usertemplate',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      603 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::36I3RaOfH7fmL0W4',
          ),
          1 => 
          array (
            0 => 'year',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      620 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::A3coGFcDZhS5hdhr',
          ),
          1 => 
          array (
            0 => 'year',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      640 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::whANaTg2JprSeyGF',
          ),
          1 => 
          array (
            0 => 'year',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      662 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::Z35Ixsh8P91rgOve',
          ),
          1 => 
          array (
            0 => 'year',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      704 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::tpdyFcn1jPoZ6ZLn',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      717 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::ofmw3CPxRMmKe9He',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      753 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::KA05RCYW4bKW8vKU',
          ),
          1 => 
          array (
            0 => 'year',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      780 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::nww1Cr7YgUKyE2UW',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      810 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::lwDay23lBpdc3TVw',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      847 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::WR7SrI0cfBZeasVu',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      877 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::UXITDkabqaFG17bR',
          ),
          1 => 
          array (
            0 => 'provinceId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      898 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::SpL7ujHmHnU3HpYA',
          ),
          1 => 
          array (
            0 => 'provinceId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      923 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::KWIZxqT3crIoNRiL',
          ),
          1 => 
          array (
            0 => 'provinceId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      961 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::3iy9jtjVz3rtDLe0',
          ),
          1 => 
          array (
            0 => 'userId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      985 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::n0tMEIP8s7F4B8iV',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1009 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::Xql7OUUXYbe33PPR',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1047 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.profile.show',
          ),
          1 => 
          array (
            0 => 'profile',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.profile.update',
          ),
          1 => 
          array (
            0 => 'profile',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.profile.destroy',
          ),
          1 => 
          array (
            0 => 'profile',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1077 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.province.show',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.province.update',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.province.destroy',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1100 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.province.department.index',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.province.department.store',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1121 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.province.department.show',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'department',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.province.department.update',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'department',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.province.department.destroy',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'department',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1174 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::pphleHEkxzUJRe7y',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1189 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::5p6YIrgzSsY2Celh',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1217 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::xPuhZS7K1HvnErAN',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1239 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::9CSVFPhltkfjz6p2',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1257 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::ztKkoSeAwlsXHEvz',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1281 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::AmJVI5v4e2psb2J1',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1309 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::uJgShpGHkBSV8pNT',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1327 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::LWnaBaFUi4YwFWCn',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1351 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::2y1hvxbLOBe8zyu2',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1392 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::n8WpwiqqLKHyTZL5',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1419 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::0kFZPlGV0DuX3sy8',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'start_year',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1459 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::aXj4PpD8Tmp0Uv3m',
          ),
          1 => 
          array (
            0 => 'provinceId',
            1 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1468 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::vSz1srXHuFKA7Pzx',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1483 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::MUcPDO66FsrcodLz',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1526 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::uBXHJ62Jg66CLACO',
          ),
          1 => 
          array (
            0 => 'provinceId',
            1 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1535 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::qqmmOIQQeSnh6VqY',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1550 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::MLzELgScjc5GMacv',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1587 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.payment.show',
          ),
          1 => 
          array (
            0 => 'payment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.payment.update',
          ),
          1 => 
          array (
            0 => 'payment',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.payment.destroy',
          ),
          1 => 
          array (
            0 => 'payment',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1607 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::kJxqh7OBAE9Bqu4c',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1642 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::tqDZV6m0C0QB3m1V',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1670 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.paymentvendor.show',
          ),
          1 => 
          array (
            0 => 'paymentvendor',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.paymentvendor.update',
          ),
          1 => 
          array (
            0 => 'paymentvendor',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.paymentvendor.destroy',
          ),
          1 => 
          array (
            0 => 'paymentvendor',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1719 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::u8jRWprpNZZs45tl',
          ),
          1 => 
          array (
            0 => 'from',
            1 => 'to',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1768 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::itIN5Hf1OZ2NfoMN',
          ),
          1 => 
          array (
            0 => 'from',
            1 => 'to',
            2 => 'provinceId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1808 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::azvaFo8f0syFPpYS',
          ),
          1 => 
          array (
            0 => 'from',
            1 => 'to',
            2 => 'cityId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1861 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::wshskuWDOZSlqS7O',
          ),
          1 => 
          array (
            0 => 'provinceId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1883 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::haMkNnqYSrI2HPzp',
          ),
          1 => 
          array (
            0 => 'cityId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1930 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::F8GvOVwiRWzbwcBq',
          ),
          1 => 
          array (
            0 => 'province_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1949 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::k3RrTnpz96GKPWmB',
          ),
          1 => 
          array (
            0 => 'city_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1974 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::oPTZRBzPDldwKpAy',
          ),
          1 => 
          array (
            0 => 'userId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2026 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::w2OXg7tLADFiHXdR',
            'month' => NULL,
            'year' => NULL,
          ),
          1 => 
          array (
            0 => 'month',
            1 => 'year',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2085 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::rjzWspjxdU44dTOL',
            'province_id' => NULL,
            'month' => NULL,
            'year' => NULL,
          ),
          1 => 
          array (
            0 => 'province_id',
            1 => 'month',
            2 => 'year',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2141 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::uvZ0AK7wr4hwN76N',
            'city_id' => NULL,
            'month' => NULL,
            'year' => NULL,
          ),
          1 => 
          array (
            0 => 'city_id',
            1 => 'month',
            2 => 'year',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2184 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::71vPbSGK0wBMG8ml',
          ),
          1 => 
          array (
            0 => 'province_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2203 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::bqtrfFAAlEyFgs3l',
          ),
          1 => 
          array (
            0 => 'city_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2236 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.post.show',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.post.update',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.post.destroy',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2255 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::2R6ZZUSoUbrYDmvJ',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2266 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::IPxTStD0YEJmaLIQ',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2296 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.postcomment.show',
          ),
          1 => 
          array (
            0 => 'postcomment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.postcomment.update',
          ),
          1 => 
          array (
            0 => 'postcomment',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.postcomment.destroy',
          ),
          1 => 
          array (
            0 => 'postcomment',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2322 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.postlike.show',
          ),
          1 => 
          array (
            0 => 'postlike',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.postlike.update',
          ),
          1 => 
          array (
            0 => 'postlike',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.postlike.destroy',
          ),
          1 => 
          array (
            0 => 'postlike',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2352 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.postbookmark.show',
          ),
          1 => 
          array (
            0 => 'postbookmark',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.postbookmark.update',
          ),
          1 => 
          array (
            0 => 'postbookmark',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.postbookmark.destroy',
          ),
          1 => 
          array (
            0 => 'postbookmark',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2386 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::ZSBHanZt2pU0D6CT',
            'post' => NULL,
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2416 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.grade.show',
          ),
          1 => 
          array (
            0 => 'grade',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.grade.update',
          ),
          1 => 
          array (
            0 => 'grade',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.grade.destroy',
          ),
          1 => 
          array (
            0 => 'grade',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2455 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::1RDCtiL7R1Fu0hKv',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2488 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::s6yN52kaqSQd3Kmm',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2524 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.subject.show',
          ),
          1 => 
          array (
            0 => 'subject',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.subject.update',
          ),
          1 => 
          array (
            0 => 'subject',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.subject.destroy',
          ),
          1 => 
          array (
            0 => 'subject',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2549 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.surah.show',
          ),
          1 => 
          array (
            0 => 'surah',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.surah.update',
          ),
          1 => 
          array (
            0 => 'surah',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.surah.destroy',
          ),
          1 => 
          array (
            0 => 'surah',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2586 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.students.rooms.show',
          ),
          1 => 
          array (
            0 => 'room',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.students.rooms.update',
          ),
          1 => 
          array (
            0 => 'room',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.students.rooms.destroy',
          ),
          1 => 
          array (
            0 => 'room',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2625 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.student.generated::PVjbMt45gY3aHCZ7',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2652 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.student.assigmentsession.show',
          ),
          1 => 
          array (
            0 => 'assigmentsession',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.student.assigmentsession.update',
          ),
          1 => 
          array (
            0 => 'assigmentsession',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.student.assigmentsession.destroy',
          ),
          1 => 
          array (
            0 => 'assigmentsession',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2690 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.student.generated::5KWUVaGOKOBpCjlA',
          ),
          1 => 
          array (
            0 => 'payment_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2725 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.student.generated::ws2CabYeMgkDh7r9',
          ),
          1 => 
          array (
            0 => 'assignment_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2757 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.student.generated::7QDKD4VlC9ZklWQL',
          ),
          1 => 
          array (
            0 => 'payment_id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2789 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.student.generated::nC32I0rK3xygrprk',
          ),
          1 => 
          array (
            0 => 'payment_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2831 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.student.generated::D2ghkiv6k2A5NNiQ',
          ),
          1 => 
          array (
            0 => 'assigment_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2872 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.student.generated::uS4gZRuBGjpBMCJI',
          ),
          1 => 
          array (
            0 => 'assignment_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2910 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.student.generated::xB4O3k6O8qSRI6Kw',
          ),
          1 => 
          array (
            0 => 'assigment_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2949 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.student.generated::yQPU2ncirksFPC6P',
          ),
          1 => 
          array (
            0 => 'assigment_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2984 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.session.show',
          ),
          1 => 
          array (
            0 => 'session',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.session.update',
          ),
          1 => 
          array (
            0 => 'session',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.session.destroy',
          ),
          1 => 
          array (
            0 => 'session',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3015 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::rYGoJEdKYfHADgm4',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3033 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::28BpuzOFFWhJPnYd',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3061 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.settings.show',
          ),
          1 => 
          array (
            0 => 'setting',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.settings.update',
          ),
          1 => 
          array (
            0 => 'setting',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.settings.destroy',
          ),
          1 => 
          array (
            0 => 'setting',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3095 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.city.show',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.city.update',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.city.destroy',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3118 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.city.department.index',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.city.department.store',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3139 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.city.department.show',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'department',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.city.department.update',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'department',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.city.department.destroy',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'department',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3189 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::WTGowuLRU2YDUt8I',
          ),
          1 => 
          array (
            0 => 'cityId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3228 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::OPhiV6Z2bMpIQyCE',
          ),
          1 => 
          array (
            0 => 'cityId',
            1 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3237 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::24zqQFhsBpjzk4JE',
          ),
          1 => 
          array (
            0 => 'cityId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3252 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::sRIybYZfzNiQ1L3T',
          ),
          1 => 
          array (
            0 => 'cityId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3295 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::pXAG3314ARFVJxpP',
          ),
          1 => 
          array (
            0 => 'cityId',
            1 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3304 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::PF24ugAcF4fA1mq7',
          ),
          1 => 
          array (
            0 => 'cityId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3319 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::iV7YmxaXaGsoHuP5',
          ),
          1 => 
          array (
            0 => 'cityId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3348 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::WlERS2GqkqfrPmgv',
          ),
          1 => 
          array (
            0 => 'cityId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3366 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::cmb7GCTTPRPykLWl',
          ),
          1 => 
          array (
            0 => 'cityId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3390 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::xgYxGmGQ0aupYKWU',
          ),
          1 => 
          array (
            0 => 'cityId',
            1 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3418 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::IcNHLl1i7tCwMdPy',
          ),
          1 => 
          array (
            0 => 'cityId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3436 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::vir3D8aoG2HVLqCF',
          ),
          1 => 
          array (
            0 => 'cityId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3460 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::EL6nn2MtdiJCOQNy',
          ),
          1 => 
          array (
            0 => 'cityId',
            1 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3502 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.commentlike.show',
          ),
          1 => 
          array (
            0 => 'commentlike',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.commentlike.update',
          ),
          1 => 
          array (
            0 => 'commentlike',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.commentlike.destroy',
          ),
          1 => 
          array (
            0 => 'commentlike',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3524 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.comment.show',
          ),
          1 => 
          array (
            0 => 'comment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.comment.update',
          ),
          1 => 
          array (
            0 => 'comment',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.comment.destroy',
          ),
          1 => 
          array (
            0 => 'comment',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3557 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.conversation.show',
          ),
          1 => 
          array (
            0 => 'conversation',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.conversation.update',
          ),
          1 => 
          array (
            0 => 'conversation',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.conversation.destroy',
          ),
          1 => 
          array (
            0 => 'conversation',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3589 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.chat.show',
          ),
          1 => 
          array (
            0 => 'chat',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.chat.update',
          ),
          1 => 
          array (
            0 => 'chat',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.chat.destroy',
          ),
          1 => 
          array (
            0 => 'chat',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3618 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.chatchannel.show',
          ),
          1 => 
          array (
            0 => 'chatchannel',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.chatchannel.update',
          ),
          1 => 
          array (
            0 => 'chatchannel',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.chatchannel.destroy',
          ),
          1 => 
          array (
            0 => 'chatchannel',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3645 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.channel.show',
          ),
          1 => 
          array (
            0 => 'channel',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.channel.update',
          ),
          1 => 
          array (
            0 => 'channel',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.channel.destroy',
          ),
          1 => 
          array (
            0 => 'channel',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3676 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.candidate.show',
          ),
          1 => 
          array (
            0 => 'candidate',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.candidate.update',
          ),
          1 => 
          array (
            0 => 'candidate',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.candidate.destroy',
          ),
          1 => 
          array (
            0 => 'candidate',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3713 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.district.show',
          ),
          1 => 
          array (
            0 => 'district',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.district.update',
          ),
          1 => 
          array (
            0 => 'district',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.district.destroy',
          ),
          1 => 
          array (
            0 => 'district',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3767 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::hoMCwF1D72sMiE7p',
          ),
          1 => 
          array (
            0 => 'districtId',
            1 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3776 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::ISbCiE1oJbctX10C',
          ),
          1 => 
          array (
            0 => 'districtId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3791 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::PBNfGj5kEmo1MBsK',
          ),
          1 => 
          array (
            0 => 'districtId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3834 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::gAuUnAUtViC7sTmC',
          ),
          1 => 
          array (
            0 => 'districtId',
            1 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3843 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::ncv6Yu8nfp0wEeGt',
          ),
          1 => 
          array (
            0 => 'districtId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3858 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::CaHY7yDo3nLcuZBQ',
          ),
          1 => 
          array (
            0 => 'districtId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3887 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::hKYOfz9c3wS8YTgL',
          ),
          1 => 
          array (
            0 => 'districtId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3905 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::rS7Fdk9cVKx9wgC5',
          ),
          1 => 
          array (
            0 => 'districtId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3929 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::mJYGf5bAFgzqoPHm',
          ),
          1 => 
          array (
            0 => 'districtId',
            1 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3957 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::IpQUmLmaMLSxQU5o',
          ),
          1 => 
          array (
            0 => 'districtId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3975 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::I1RUUbUr1n0Wn2GL',
          ),
          1 => 
          array (
            0 => 'districtId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3999 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::AtAfN9kqQaZ0GRZA',
          ),
          1 => 
          array (
            0 => 'districtId',
            1 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4035 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.dailyprayer.show',
          ),
          1 => 
          array (
            0 => 'dailyprayer',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.dailyprayer.update',
          ),
          1 => 
          array (
            0 => 'dailyprayer',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.dailyprayer.destroy',
          ),
          1 => 
          array (
            0 => 'dailyprayer',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4076 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.dpp.show',
          ),
          1 => 
          array (
            0 => 'dpp',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.dpp.update',
          ),
          1 => 
          array (
            0 => 'dpp',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.dpp.destroy',
          ),
          1 => 
          array (
            0 => 'dpp',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4102 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.department.file.index',
          ),
          1 => 
          array (
            0 => 'department',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.department.file.store',
          ),
          1 => 
          array (
            0 => 'department',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4123 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.department.file.show',
          ),
          1 => 
          array (
            0 => 'department',
            1 => 'file',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.department.file.update',
          ),
          1 => 
          array (
            0 => 'department',
            1 => 'file',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.department.file.destroy',
          ),
          1 => 
          array (
            0 => 'department',
            1 => 'file',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4157 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.department-division.show',
          ),
          1 => 
          array (
            0 => 'department_division',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.department-division.update',
          ),
          1 => 
          array (
            0 => 'department_division',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.department-division.destroy',
          ),
          1 => 
          array (
            0 => 'department_division',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4214 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::pRKIqcKPDqqhpBHo',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'title',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4247 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::B35LHC7nFIqCtIvA',
          ),
          1 => 
          array (
            0 => 'title',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4272 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::At3429axskmUiSU2',
          ),
          1 => 
          array (
            0 => 'start_year',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4319 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.educationallevel.show',
          ),
          1 => 
          array (
            0 => 'educationallevel',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.educationallevel.update',
          ),
          1 => 
          array (
            0 => 'educationallevel',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.educationallevel.destroy',
          ),
          1 => 
          array (
            0 => 'educationallevel',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4349 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::H3GnIBodGG5pFngN',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4378 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.event.show',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.event.update',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.event.destroy',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4414 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::GjA1wA9CNCjl4yLm',
          ),
          1 => 
          array (
            0 => 'eventId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4431 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::PBEY6FR1B9eL39dQ',
          ),
          1 => 
          array (
            0 => 'eventId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4477 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::dIVekOm24xLYTgmS',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4486 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::Ee152aiNZEegMPhd',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4500 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::cszpi1b4GaaQHGRp',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4527 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::LjF2HgIlp5CpL4gi',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4541 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::YOZwNpbr0bktTn3K',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4584 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::Q0TDFzirmkakzglE',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4624 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::RW786dYlJM4nrbfd',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4652 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::ztq5mFhLIEW7Xu81',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4666 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::WKC41lEhJDahy4vk',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4693 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::0C2GGQTvZZu1yyrW',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4708 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::W55fVDmYAjIfsgGt',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4731 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::Ra6yIcrWOIAKezq2',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4759 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::f5QPapBfdTUrq0TN',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4773 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::S0BW1Es6WrywyMbS',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4814 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.attendance.show',
          ),
          1 => 
          array (
            0 => 'attendance',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.attendance.update',
          ),
          1 => 
          array (
            0 => 'attendance',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.attendance.destroy',
          ),
          1 => 
          array (
            0 => 'attendance',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4837 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.ad.show',
          ),
          1 => 
          array (
            0 => 'ad',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.ad.update',
          ),
          1 => 
          array (
            0 => 'ad',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.ad.destroy',
          ),
          1 => 
          array (
            0 => 'ad',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4880 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentguideduser.show',
          ),
          1 => 
          array (
            0 => 'assigmentguideduser',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentguideduser.update',
          ),
          1 => 
          array (
            0 => 'assigmentguideduser',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentguideduser.destroy',
          ),
          1 => 
          array (
            0 => 'assigmentguideduser',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4913 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentcategory.show',
          ),
          1 => 
          array (
            0 => 'assigmentcategory',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentcategory.update',
          ),
          1 => 
          array (
            0 => 'assigmentcategory',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentcategory.destroy',
          ),
          1 => 
          array (
            0 => 'assigmentcategory',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4941 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentcomment.show',
          ),
          1 => 
          array (
            0 => 'assigmentcomment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentcomment.update',
          ),
          1 => 
          array (
            0 => 'assigmentcomment',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentcomment.destroy',
          ),
          1 => 
          array (
            0 => 'assigmentcomment',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4966 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentchat.show',
          ),
          1 => 
          array (
            0 => 'assigmentchat',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentchat.update',
          ),
          1 => 
          array (
            0 => 'assigmentchat',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentchat.destroy',
          ),
          1 => 
          array (
            0 => 'assigmentchat',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4993 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmenttype.show',
          ),
          1 => 
          array (
            0 => 'assigmenttype',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmenttype.update',
          ),
          1 => 
          array (
            0 => 'assigmenttype',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmenttype.destroy',
          ),
          1 => 
          array (
            0 => 'assigmenttype',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5018 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigment.show',
          ),
          1 => 
          array (
            0 => 'assigment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigment.update',
          ),
          1 => 
          array (
            0 => 'assigment',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigment.destroy',
          ),
          1 => 
          array (
            0 => 'assigment',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5057 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::3wuIgWcoRoNXYN5x',
          ),
          1 => 
          array (
            0 => 'assigment_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5085 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::oyyW1xn5dN4XhSmk',
          ),
          1 => 
          array (
            0 => 'session_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5112 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentlike.show',
          ),
          1 => 
          array (
            0 => 'assigmentlike',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentlike.update',
          ),
          1 => 
          array (
            0 => 'assigmentlike',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentlike.destroy',
          ),
          1 => 
          array (
            0 => 'assigmentlike',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5140 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentrating.show',
          ),
          1 => 
          array (
            0 => 'assigmentrating',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentrating.update',
          ),
          1 => 
          array (
            0 => 'assigmentrating',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentrating.destroy',
          ),
          1 => 
          array (
            0 => 'assigmentrating',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5177 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentquestionlist.show',
          ),
          1 => 
          array (
            0 => 'assigmentquestionlist',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentquestionlist.update',
          ),
          1 => 
          array (
            0 => 'assigmentquestionlist',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentquestionlist.destroy',
          ),
          1 => 
          array (
            0 => 'assigmentquestionlist',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5204 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::odwgltNkt5KIKMoB',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5242 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentsession.show',
          ),
          1 => 
          array (
            0 => 'assigmentsession',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentsession.update',
          ),
          1 => 
          array (
            0 => 'assigmentsession',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.assigmentsession.destroy',
          ),
          1 => 
          array (
            0 => 'assigmentsession',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5265 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::EuYnsB74fKE1XktO',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      5292 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::IA1Lwx3cnInth83M',
          ),
          1 => 
          array (
            0 => 'session_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      5321 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::DtKIEiPiIhg1mDXW',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5352 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::ooEATesBEuBJH0dE',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      5368 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::8LBqv05G2fSw581M',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      5399 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::Ax40bqK5ItEUs5AL',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5446 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::VqfYtcm8XWXr8nvM',
          ),
          1 => 
          array (
            0 => 'assigmentCategoryId',
            1 => 'educationalLevelId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5501 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::3FH7iVPfhINPG2DG',
          ),
          1 => 
          array (
            0 => 'assigmentCategoryId',
            1 => 'educationalLevelId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5533 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::83DtCQ8K7gvwWOIR',
          ),
          1 => 
          array (
            0 => 'code',
            1 => 'ktaId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5557 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::Mi9zs8hX9ZtR879U',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      5599 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::TYViYsayXnnbHnsZ',
            'subject' => NULL,
          ),
          1 => 
          array (
            0 => 'subject',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5634 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::r673HhrO358AzSVf',
          ),
          1 => 
          array (
            0 => 'assigment_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5665 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::f4M4gRvONxuHJp3Y',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5694 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::xRJ0hqqCQsgQNzMq',
          ),
          1 => 
          array (
            0 => 'assigment_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      5711 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::fpdUOaahHfDd6w1t',
          ),
          1 => 
          array (
            0 => 'assigment_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      5728 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::H5gEAadlYy5KjcY8',
          ),
          1 => 
          array (
            0 => 'assigment_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      5759 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::PDUt4IFnLJLCze5f',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'teacher_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      5796 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.answerlist.show',
          ),
          1 => 
          array (
            0 => 'answerlist',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.answerlist.update',
          ),
          1 => 
          array (
            0 => 'answerlist',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.answerlist.destroy',
          ),
          1 => 
          array (
            0 => 'answerlist',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5818 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.answer.show',
          ),
          1 => 
          array (
            0 => 'answer',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.answer.update',
          ),
          1 => 
          array (
            0 => 'answer',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.answer.destroy',
          ),
          1 => 
          array (
            0 => 'answer',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5861 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanformat.show',
          ),
          1 => 
          array (
            0 => 'lessonplanformat',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanformat.update',
          ),
          1 => 
          array (
            0 => 'lessonplanformat',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanformat.destroy',
          ),
          1 => 
          array (
            0 => 'lessonplanformat',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5883 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplan.show',
          ),
          1 => 
          array (
            0 => 'lessonplan',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplan.update',
          ),
          1 => 
          array (
            0 => 'lessonplan',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplan.destroy',
          ),
          1 => 
          array (
            0 => 'lessonplan',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5909 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanlike.show',
          ),
          1 => 
          array (
            0 => 'lessonplanlike',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanlike.update',
          ),
          1 => 
          array (
            0 => 'lessonplanlike',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanlike.destroy',
          ),
          1 => 
          array (
            0 => 'lessonplanlike',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5941 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplancomment.show',
          ),
          1 => 
          array (
            0 => 'lessonplancomment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplancomment.update',
          ),
          1 => 
          array (
            0 => 'lessonplancomment',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplancomment.destroy',
          ),
          1 => 
          array (
            0 => 'lessonplancomment',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5966 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplancover.show',
          ),
          1 => 
          array (
            0 => 'lessonplancover',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplancover.update',
          ),
          1 => 
          array (
            0 => 'lessonplancover',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplancover.destroy',
          ),
          1 => 
          array (
            0 => 'lessonplancover',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5998 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanreview.show',
          ),
          1 => 
          array (
            0 => 'lessonplanreview',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanreview.update',
          ),
          1 => 
          array (
            0 => 'lessonplanreview',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanreview.destroy',
          ),
          1 => 
          array (
            0 => 'lessonplanreview',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6025 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanrating.show',
          ),
          1 => 
          array (
            0 => 'lessonplanrating',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanrating.update',
          ),
          1 => 
          array (
            0 => 'lessonplanrating',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanrating.destroy',
          ),
          1 => 
          array (
            0 => 'lessonplanrating',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6058 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanguideduser.show',
          ),
          1 => 
          array (
            0 => 'lessonplanguideduser',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanguideduser.update',
          ),
          1 => 
          array (
            0 => 'lessonplanguideduser',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.lessonplanguideduser.destroy',
          ),
          1 => 
          array (
            0 => 'lessonplanguideduser',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6106 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::TPKqISW01pPCQshA',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6128 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::43cQvZGzfmpGZ8UU',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6155 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::d5soglgxKWhRmIgc',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6196 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.bookcategory.show',
          ),
          1 => 
          array (
            0 => 'bookcategory',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.bookcategory.update',
          ),
          1 => 
          array (
            0 => 'bookcategory',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.bookcategory.destroy',
          ),
          1 => 
          array (
            0 => 'bookcategory',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6218 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.book.show',
          ),
          1 => 
          array (
            0 => 'book',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.book.update',
          ),
          1 => 
          array (
            0 => 'book',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.book.destroy',
          ),
          1 => 
          array (
            0 => 'book',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6252 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.bank_account.show',
          ),
          1 => 
          array (
            0 => 'bank_account',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.bank_account.update',
          ),
          1 => 
          array (
            0 => 'bank_account',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.bank_account.destroy',
          ),
          1 => 
          array (
            0 => 'bank_account',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6289 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.mainchat.show',
          ),
          1 => 
          array (
            0 => 'mainchat',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.mainchat.update',
          ),
          1 => 
          array (
            0 => 'mainchat',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.mainchat.destroy',
          ),
          1 => 
          array (
            0 => 'mainchat',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6319 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::yMK1rizSvfNPR9DL',
          ),
          1 => 
          array (
            0 => 'bookId',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6348 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.murottal.show',
          ),
          1 => 
          array (
            0 => 'murottal',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.murottal.update',
          ),
          1 => 
          array (
            0 => 'murottal',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.murottal.destroy',
          ),
          1 => 
          array (
            0 => 'murottal',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6378 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.module.show',
          ),
          1 => 
          array (
            0 => 'module',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.module.update',
          ),
          1 => 
          array (
            0 => 'module',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.module.destroy',
          ),
          1 => 
          array (
            0 => 'module',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6395 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::Qgdcd7uii3LRRvNL',
          ),
          1 => 
          array (
            0 => 'moduleId',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      6424 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.modulecontent.show',
          ),
          1 => 
          array (
            0 => 'modulecontent',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.modulecontent.update',
          ),
          1 => 
          array (
            0 => 'modulecontent',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.modulecontent.destroy',
          ),
          1 => 
          array (
            0 => 'modulecontent',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6462 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.modules.comments.index',
          ),
          1 => 
          array (
            0 => 'module',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.modules.comments.store',
          ),
          1 => 
          array (
            0 => 'module',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      6483 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.modules.comments.show',
          ),
          1 => 
          array (
            0 => 'module',
            1 => 'comment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.modules.comments.update',
          ),
          1 => 
          array (
            0 => 'module',
            1 => 'comment',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.modules.comments.destroy',
          ),
          1 => 
          array (
            0 => 'module',
            1 => 'comment',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6502 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.modules.likes.index',
          ),
          1 => 
          array (
            0 => 'module',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.modules.likes.store',
          ),
          1 => 
          array (
            0 => 'module',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      6523 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.modules.likes.show',
          ),
          1 => 
          array (
            0 => 'module',
            1 => 'like',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.modules.likes.update',
          ),
          1 => 
          array (
            0 => 'module',
            1 => 'like',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.modules.likes.destroy',
          ),
          1 => 
          array (
            0 => 'module',
            1 => 'like',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6579 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::NzYKL6fGrAnABSQx',
            'search' => NULL,
          ),
          1 => 
          array (
            0 => 'educationalLevelId',
            1 => 'search',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6601 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::kHjdiRXyhGPfzMEz',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6630 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::G7OWhhbddFKamLjG',
          ),
          1 => 
          array (
            0 => 'userId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6661 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.follow.show',
          ),
          1 => 
          array (
            0 => 'follow',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.follow.update',
          ),
          1 => 
          array (
            0 => 'follow',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.follow.destroy',
          ),
          1 => 
          array (
            0 => 'follow',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6701 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::KL8CBRwMMC6uuGN0',
            'type' => NULL,
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6737 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.template.show',
          ),
          1 => 
          array (
            0 => 'template',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.template.update',
          ),
          1 => 
          array (
            0 => 'template',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.template.destroy',
          ),
          1 => 
          array (
            0 => 'template',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6767 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.templatecategory.show',
          ),
          1 => 
          array (
            0 => 'templatecategory',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.templatecategory.update',
          ),
          1 => 
          array (
            0 => 'templatecategory',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.templatecategory.destroy',
          ),
          1 => 
          array (
            0 => 'templatecategory',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6792 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.tag.show',
          ),
          1 => 
          array (
            0 => 'tag',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.tag.update',
          ),
          1 => 
          array (
            0 => 'tag',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.tag.destroy',
          ),
          1 => 
          array (
            0 => 'tag',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6836 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.questionnary.show',
          ),
          1 => 
          array (
            0 => 'questionnary',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.questionnary.update',
          ),
          1 => 
          array (
            0 => 'questionnary',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.questionnary.destroy',
          ),
          1 => 
          array (
            0 => 'questionnary',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6864 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.questionnarysesion.show',
          ),
          1 => 
          array (
            0 => 'questionnarysesion',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.questionnarysesion.update',
          ),
          1 => 
          array (
            0 => 'questionnarysesion',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.questionnarysesion.destroy',
          ),
          1 => 
          array (
            0 => 'questionnarysesion',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6902 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.questionlistcategory.show',
          ),
          1 => 
          array (
            0 => 'questionlistcategory',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.questionlistcategory.update',
          ),
          1 => 
          array (
            0 => 'questionlistcategory',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.questionlistcategory.destroy',
          ),
          1 => 
          array (
            0 => 'questionlistcategory',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6924 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.questionlist.show',
          ),
          1 => 
          array (
            0 => 'questionlist',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.questionlist.update',
          ),
          1 => 
          array (
            0 => 'questionlist',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.questionlist.destroy',
          ),
          1 => 
          array (
            0 => 'questionlist',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6947 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.question.show',
          ),
          1 => 
          array (
            0 => 'question',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.question.update',
          ),
          1 => 
          array (
            0 => 'question',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.question.destroy',
          ),
          1 => 
          array (
            0 => 'question',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6987 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::NpcYc4sN4sroBdGX',
          ),
          1 => 
          array (
            0 => 'question_list_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      7012 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::3SDgM5PKAmAiPFy0',
          ),
          1 => 
          array (
            0 => 'question_list_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      7051 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::ihiU3T19dyUnOBfL',
          ),
          1 => 
          array (
            0 => 'assigment_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      7076 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::3zFCImrqZ31neksY',
          ),
          1 => 
          array (
            0 => 'assigment_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      7109 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::GoWR9xu0biT1X4DK',
          ),
          1 => 
          array (
            0 => 'userId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      7157 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::EyJIOLY0KfjM96QB',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      7170 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::bMXIwScULvXv94wZ',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      7217 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::9dQxfCzkcCQrMgm4',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      7233 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::vOfXFC8LRApP7Jqw',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      7272 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::lLLJMlrZ5CFnkovC',
          ),
          1 => 
          array (
            0 => 'provinceId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      7287 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::pQ6Yb6sWWpYu1gZq',
          ),
          1 => 
          array (
            0 => 'provinceId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      7339 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::zYl1ohVSE3QxvFwZ',
          ),
          1 => 
          array (
            0 => 'eventId',
            1 => 'userId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      7368 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.generated::sEsBNf3YbrUTCZb1',
          ),
          1 => 
          array (
            0 => 'eventId',
            1 => 'userId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      7403 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.notification.show',
          ),
          1 => 
          array (
            0 => 'notification',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.notification.update',
          ),
          1 => 
          array (
            0 => 'notification',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.notification.destroy',
          ),
          1 => 
          array (
            0 => 'notification',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      7462 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Qvw0lJTz6tk5XeiL',
          ),
          1 => 
          array (
            0 => 'email',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      7486 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vlGQ1VAp8Ml6ytAK',
          ),
          1 => 
          array (
            0 => 'name',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      7516 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OV4boxVQjjxrI1BN',
          ),
          1 => 
          array (
            0 => 'phone_number',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      7536 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'otp-client.show',
          ),
          1 => 
          array (
            0 => 'otp_client',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      7550 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'otp-client.edit',
          ),
          1 => 
          array (
            0 => 'otp_client',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      7559 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'otp-client.update',
          ),
          1 => 
          array (
            0 => 'otp_client',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'otp-client.destroy',
          ),
          1 => 
          array (
            0 => 'otp_client',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      7575 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cmBfBF2SgcDLkraZ',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      7600 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IDwfnNZ67WFO4GIC',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      7643 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ThkWkmVyOXib94Ss',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      7682 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kuCWfMuUNIHglkLX',
          ),
          1 => 
          array (
            0 => 'provinceId',
            1 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      7698 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.edit',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      7714 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.event.index',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      7733 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.event.create',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      7753 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.event.show',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      7767 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.event.edit',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      7776 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.event.update',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'event',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province.event.destroy',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'event',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      7814 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6aIGoCZJdaI4zXnO',
          ),
          1 => 
          array (
            0 => 'province_id',
            1 => 'month',
            2 => 'year',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      7824 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.event.store',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      7860 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.province-member-info.index',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      7879 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.province-member-info.create',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      7899 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.province-member-info.show',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'province_member_info',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      7913 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.province-member-info.edit',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'province_member_info',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      7922 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.province-member-info.update',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'province_member_info',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province.province-member-info.destroy',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'province_member_info',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      7933 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.province-member-info.store',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      7953 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city.index',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      7972 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city.create',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      7992 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city.show',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      8006 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city.edit',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8015 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city.update',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province.city.destroy',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      8026 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city.store',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8049 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-member.index',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8068 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-member.create',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8088 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-member.show',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      8102 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-member.edit',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8111 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-member.update',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-member.destroy',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      8136 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VxqXhVJVMd05oXlz',
          ),
          1 => 
          array (
            0 => 'provinceId',
            1 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      8146 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-member.store',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8173 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-pns-member.index',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8192 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-pns-member.create',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8212 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-pns-member.show',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_pns_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      8226 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-pns-member.edit',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_pns_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8235 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-pns-member.update',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_pns_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-pns-member.destroy',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_pns_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      8260 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HGzoAAib95TbPUtt',
          ),
          1 => 
          array (
            0 => 'provinceId',
            1 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      8270 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-pns-member.store',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8297 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-pension-member.index',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8316 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-pension-member.create',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8336 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-pension-member.show',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_pension_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      8350 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-pension-member.edit',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_pension_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8359 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-pension-member.update',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_pension_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-pension-member.destroy',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_pension_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      8384 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RWKcuGJnqnnSZI2f',
          ),
          1 => 
          array (
            0 => 'provinceId',
            1 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      8394 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-pension-member.store',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8424 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-non-pns-member.index',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8443 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-non-pns-member.create',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8463 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-non-pns-member.show',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_non_pns_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      8477 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-non-pns-member.edit',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_non_pns_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8486 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-non-pns-member.update',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_non_pns_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-non-pns-member.destroy',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_non_pns_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      8511 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YikMS94mr551t4qO',
          ),
          1 => 
          array (
            0 => 'provinceId',
            1 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      8521 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-non-pns-member.store',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8552 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-expired-member.index',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8571 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-expired-member.create',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8591 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-expired-member.show',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_expired_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      8605 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-expired-member.edit',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_expired_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8614 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-expired-member.update',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_expired_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-expired-member.destroy',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_expired_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      8639 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::d2ijdgthVjdUllJf',
          ),
          1 => 
          array (
            0 => 'provinceId',
            1 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      8649 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-expired-member.store',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8674 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-extend-member.index',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8693 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-extend-member.create',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8713 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-extend-member.show',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_extend_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      8727 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-extend-member.edit',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_extend_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8736 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-extend-member.update',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_extend_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-extend-member.destroy',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_extend_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      8761 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4XsjnV5XIiwbHrUa',
          ),
          1 => 
          array (
            0 => 'provinceId',
            1 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      8771 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-extend-member.store',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8804 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-certificate-member.index',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8823 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-certificate-member.create',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8843 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-certificate-member.show',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_certificate_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      8857 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-certificate-member.edit',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_certificate_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8866 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-certificate-member.update',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_certificate_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-certificate-member.destroy',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_certificate_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      8877 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-certificate-member.store',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8907 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-inpassing-member.index',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8926 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-inpassing-member.create',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8946 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-inpassing-member.show',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_inpassing_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      8960 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-inpassing-member.edit',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_inpassing_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      8969 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-inpassing-member.update',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_inpassing_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-inpassing-member.destroy',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_inpassing_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      8980 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-inpassing-member.store',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      9004 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-bsi-member.index',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      9023 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-bsi-member.create',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      9043 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-bsi-member.show',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_bsi_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9057 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-bsi-member.edit',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_bsi_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      9066 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-bsi-member.update',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_bsi_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-bsi-member.destroy',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city_bsi_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9077 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.city-bsi-member.store',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      9106 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.calendar-event.index',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      9125 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.calendar-event.create',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      9145 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.calendar-event.show',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'calendar_event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9159 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.calendar-event.edit',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'calendar_event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      9168 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.calendar-event.update',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'calendar_event',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province.calendar-event.destroy',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'calendar_event',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9179 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.calendar-event.store',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      9191 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.show',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province.update',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'province.destroy',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9231 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-member.show',
          ),
          1 => 
          array (
            0 => 'province_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9245 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-member.edit',
          ),
          1 => 
          array (
            0 => 'province_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      9254 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-member.update',
          ),
          1 => 
          array (
            0 => 'province_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province-member.destroy',
          ),
          1 => 
          array (
            0 => 'province_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9279 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1iMW8Q0VpDYDaX9I',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9309 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-member-detail.show',
          ),
          1 => 
          array (
            0 => 'province_member_detail',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9323 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-member-detail.edit',
          ),
          1 => 
          array (
            0 => 'province_member_detail',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      9332 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-member-detail.update',
          ),
          1 => 
          array (
            0 => 'province_member_detail',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province-member-detail.destroy',
          ),
          1 => 
          array (
            0 => 'province_member_detail',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9374 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-certificate-member.show',
          ),
          1 => 
          array (
            0 => 'province_certificate_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9388 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-certificate-member.edit',
          ),
          1 => 
          array (
            0 => 'province_certificate_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      9397 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-certificate-member.update',
          ),
          1 => 
          array (
            0 => 'province_certificate_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province-certificate-member.destroy',
          ),
          1 => 
          array (
            0 => 'province_certificate_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9436 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-inpassing-member.show',
          ),
          1 => 
          array (
            0 => 'province_inpassing_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9450 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-inpassing-member.edit',
          ),
          1 => 
          array (
            0 => 'province_inpassing_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      9459 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-inpassing-member.update',
          ),
          1 => 
          array (
            0 => 'province_inpassing_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province-inpassing-member.destroy',
          ),
          1 => 
          array (
            0 => 'province_inpassing_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9492 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-bsi-member.show',
          ),
          1 => 
          array (
            0 => 'province_bsi_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9506 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-bsi-member.edit',
          ),
          1 => 
          array (
            0 => 'province_bsi_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      9515 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-bsi-member.update',
          ),
          1 => 
          array (
            0 => 'province_bsi_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province-bsi-member.destroy',
          ),
          1 => 
          array (
            0 => 'province_bsi_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9554 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-pns-member.show',
          ),
          1 => 
          array (
            0 => 'province_pns_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9568 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-pns-member.edit',
          ),
          1 => 
          array (
            0 => 'province_pns_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      9577 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-pns-member.update',
          ),
          1 => 
          array (
            0 => 'province_pns_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province-pns-member.destroy',
          ),
          1 => 
          array (
            0 => 'province_pns_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9602 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cYhnkfM2YstFkJZV',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9641 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-pension-member.show',
          ),
          1 => 
          array (
            0 => 'province_pension_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9655 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-pension-member.edit',
          ),
          1 => 
          array (
            0 => 'province_pension_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      9664 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-pension-member.update',
          ),
          1 => 
          array (
            0 => 'province_pension_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province-pension-member.destroy',
          ),
          1 => 
          array (
            0 => 'province_pension_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9689 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::M9jh8S8YsGlqZUE4',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9731 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-non-pns-member.show',
          ),
          1 => 
          array (
            0 => 'province_non_pns_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9745 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-non-pns-member.edit',
          ),
          1 => 
          array (
            0 => 'province_non_pns_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      9754 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-non-pns-member.update',
          ),
          1 => 
          array (
            0 => 'province_non_pns_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province-non-pns-member.destroy',
          ),
          1 => 
          array (
            0 => 'province_non_pns_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9779 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::w7r6OGqjOrLMM9yV',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9822 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-expired-member.show',
          ),
          1 => 
          array (
            0 => 'province_expired_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9836 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-expired-member.edit',
          ),
          1 => 
          array (
            0 => 'province_expired_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      9845 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-expired-member.update',
          ),
          1 => 
          array (
            0 => 'province_expired_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province-expired-member.destroy',
          ),
          1 => 
          array (
            0 => 'province_expired_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9870 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gY30n1nIlT6nwayD',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9907 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-extend-member.show',
          ),
          1 => 
          array (
            0 => 'province_extend_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9921 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-extend-member.edit',
          ),
          1 => 
          array (
            0 => 'province_extend_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      9930 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province-extend-member.update',
          ),
          1 => 
          array (
            0 => 'province_extend_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province-extend-member.destroy',
          ),
          1 => 
          array (
            0 => 'province_extend_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9955 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6nK0Ak94CRECcEyQ',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      9989 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.show',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10006 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.edit',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10026 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.comment.index',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10046 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.comment.create',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10067 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.comment.show',
          ),
          1 => 
          array (
            0 => 'post',
            1 => 'comment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10082 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.comment.edit',
          ),
          1 => 
          array (
            0 => 'post',
            1 => 'comment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10092 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.comment.update',
          ),
          1 => 
          array (
            0 => 'post',
            1 => 'comment',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'post.comment.destroy',
          ),
          1 => 
          array (
            0 => 'post',
            1 => 'comment',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10104 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.comment.store',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10122 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.like.index',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10142 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.like.create',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10163 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.like.show',
          ),
          1 => 
          array (
            0 => 'post',
            1 => 'like',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10178 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.like.edit',
          ),
          1 => 
          array (
            0 => 'post',
            1 => 'like',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10188 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.like.update',
          ),
          1 => 
          array (
            0 => 'post',
            1 => 'like',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'post.like.destroy',
          ),
          1 => 
          array (
            0 => 'post',
            1 => 'like',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10200 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.like.store',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10218 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.read.index',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10238 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.read.create',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10259 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.read.show',
          ),
          1 => 
          array (
            0 => 'post',
            1 => 'read',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10274 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.read.edit',
          ),
          1 => 
          array (
            0 => 'post',
            1 => 'read',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10284 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.read.update',
          ),
          1 => 
          array (
            0 => 'post',
            1 => 'read',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'post.read.destroy',
          ),
          1 => 
          array (
            0 => 'post',
            1 => 'read',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10296 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.read.store',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10308 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.update',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'post.destroy',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10335 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5SFR0bVOopTK08kT',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10359 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::N7qENI1c0RlzbQtA',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10393 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post-bookmark.show',
          ),
          1 => 
          array (
            0 => 'post_bookmark',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10408 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post-bookmark.edit',
          ),
          1 => 
          array (
            0 => 'post_bookmark',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10418 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post-bookmark.update',
          ),
          1 => 
          array (
            0 => 'post_bookmark',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'post-bookmark.destroy',
          ),
          1 => 
          array (
            0 => 'post_bookmark',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10466 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'personal-conversation.show',
          ),
          1 => 
          array (
            0 => 'personal_conversation',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10481 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'personal-conversation.edit',
          ),
          1 => 
          array (
            0 => 'personal_conversation',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10491 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'personal-conversation.update',
          ),
          1 => 
          array (
            0 => 'personal_conversation',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'personal-conversation.destroy',
          ),
          1 => 
          array (
            0 => 'personal_conversation',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10517 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::AwJoTNXs5IkCgWUL',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10571 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9M9k49kbHUTmGrGt',
          ),
          1 => 
          array (
            0 => 'districtId',
            1 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10606 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'district.district-member-info.index',
          ),
          1 => 
          array (
            0 => 'district',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10626 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'district.district-member-info.create',
          ),
          1 => 
          array (
            0 => 'district',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10647 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'district.district-member-info.show',
          ),
          1 => 
          array (
            0 => 'district',
            1 => 'district_member_info',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10662 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'district.district-member-info.edit',
          ),
          1 => 
          array (
            0 => 'district',
            1 => 'district_member_info',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10672 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'district.district-member-info.update',
          ),
          1 => 
          array (
            0 => 'district',
            1 => 'district_member_info',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'district.district-member-info.destroy',
          ),
          1 => 
          array (
            0 => 'district',
            1 => 'district_member_info',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10684 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'district.district-member-info.store',
          ),
          1 => 
          array (
            0 => 'district',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10699 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'district.edit',
          ),
          1 => 
          array (
            0 => 'district',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10710 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'district.show',
          ),
          1 => 
          array (
            0 => 'district',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'district.update',
          ),
          1 => 
          array (
            0 => 'district',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'district.destroy',
          ),
          1 => 
          array (
            0 => 'district',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10745 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'daily-prayer.show',
          ),
          1 => 
          array (
            0 => 'daily_prayer',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10760 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'daily-prayer.edit',
          ),
          1 => 
          array (
            0 => 'daily_prayer',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10770 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'daily-prayer.update',
          ),
          1 => 
          array (
            0 => 'daily_prayer',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'daily-prayer.destroy',
          ),
          1 => 
          array (
            0 => 'daily_prayer',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10805 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'department.show',
          ),
          1 => 
          array (
            0 => 'department',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10823 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'department.edit',
          ),
          1 => 
          array (
            0 => 'department',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10852 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'department.department-user.index',
          ),
          1 => 
          array (
            0 => 'department',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10872 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'department.department-user.create',
          ),
          1 => 
          array (
            0 => 'department',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10893 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'department.department-user.show',
          ),
          1 => 
          array (
            0 => 'department',
            1 => 'department_user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10908 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'department.department-user.edit',
          ),
          1 => 
          array (
            0 => 'department',
            1 => 'department_user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10918 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'department.department-user.update',
          ),
          1 => 
          array (
            0 => 'department',
            1 => 'department_user',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'department.department-user.destroy',
          ),
          1 => 
          array (
            0 => 'department',
            1 => 'department_user',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10930 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'department.department-user.store',
          ),
          1 => 
          array (
            0 => 'department',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      10942 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'department.update',
          ),
          1 => 
          array (
            0 => 'department',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'department.destroy',
          ),
          1 => 
          array (
            0 => 'department',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10975 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'department-division.show',
          ),
          1 => 
          array (
            0 => 'department_division',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      10990 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'department-division.edit',
          ),
          1 => 
          array (
            0 => 'department_division',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11000 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'department-division.update',
          ),
          1 => 
          array (
            0 => 'department_division',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'department-division.destroy',
          ),
          1 => 
          array (
            0 => 'department_division',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      11044 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dpp-department.show',
          ),
          1 => 
          array (
            0 => 'dpp_department',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      11059 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dpp-department.edit',
          ),
          1 => 
          array (
            0 => 'dpp_department',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11069 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dpp-department.update',
          ),
          1 => 
          array (
            0 => 'dpp_department',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dpp-department.destroy',
          ),
          1 => 
          array (
            0 => 'dpp_department',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      11100 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Y0snq4s2XyzH96qJ',
          ),
          1 => 
          array (
            0 => 'parentId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11139 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dpw-department.show',
          ),
          1 => 
          array (
            0 => 'dpw_department',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      11154 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dpw-department.edit',
          ),
          1 => 
          array (
            0 => 'dpw_department',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11164 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dpw-department.update',
          ),
          1 => 
          array (
            0 => 'dpw_department',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dpw-department.destroy',
          ),
          1 => 
          array (
            0 => 'dpw_department',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      11197 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qHbddMvVvsNuM7qB',
          ),
          1 => 
          array (
            0 => 'province_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      11225 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oeNO96M1bwiuG7RL',
          ),
          1 => 
          array (
            0 => 'parentId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11265 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dpd-department.show',
          ),
          1 => 
          array (
            0 => 'dpd_department',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      11280 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dpd-department.edit',
          ),
          1 => 
          array (
            0 => 'dpd_department',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11290 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dpd-department.update',
          ),
          1 => 
          array (
            0 => 'dpd_department',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dpd-department.destroy',
          ),
          1 => 
          array (
            0 => 'dpd_department',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      11319 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hlWTtbo6QdXICP7o',
          ),
          1 => 
          array (
            0 => 'city_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      11347 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SMdhUfW2IXMHMQnj',
          ),
          1 => 
          array (
            0 => 'parentId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11387 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dpc-department.show',
          ),
          1 => 
          array (
            0 => 'dpc_department',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      11402 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dpc-department.edit',
          ),
          1 => 
          array (
            0 => 'dpc_department',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11412 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dpc-department.update',
          ),
          1 => 
          array (
            0 => 'dpc_department',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dpc-department.destroy',
          ),
          1 => 
          array (
            0 => 'dpc_department',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      11445 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7u5upchJB3GCaN9F',
          ),
          1 => 
          array (
            0 => 'district_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      11473 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yDhyzK2Sl86r1G7z',
          ),
          1 => 
          array (
            0 => 'parentId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11525 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fmpcYRmNPDEkQK7d',
          ),
          1 => 
          array (
            0 => 'cityId',
            1 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      11556 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.city-member-info.index',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11576 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.city-member-info.create',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11597 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.city-member-info.show',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'city_member_info',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      11612 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.city-member-info.edit',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'city_member_info',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11622 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.city-member-info.update',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'city_member_info',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'city.city-member-info.destroy',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'city_member_info',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      11634 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.city-member-info.store',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11649 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.edit',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11670 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district.index',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11690 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district.create',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11711 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district.show',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      11726 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district.edit',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11736 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district.update',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'city.district.destroy',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      11748 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district.store',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11772 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-member.index',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11792 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-member.create',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11813 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-member.show',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      11828 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-member.edit',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11838 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-member.update',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-member.destroy',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      11864 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pCjCyHdCObRJrHCr',
          ),
          1 => 
          array (
            0 => 'cityId',
            1 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      11875 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-member.store',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11903 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-pns-member.index',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11923 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-pns-member.create',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11944 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-pns-member.show',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_pns_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      11959 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-pns-member.edit',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_pns_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      11969 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-pns-member.update',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_pns_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-pns-member.destroy',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_pns_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      11995 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EolUf1IH5x2vDER2',
          ),
          1 => 
          array (
            0 => 'cityId',
            1 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      12006 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-pns-member.store',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12034 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-pension-member.index',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12054 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-pension-member.create',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12075 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-pension-member.show',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_pension_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      12090 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-pension-member.edit',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_pension_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12100 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-pension-member.update',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_pension_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-pension-member.destroy',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_pension_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      12126 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ukKWaG0uQqcneAaM',
          ),
          1 => 
          array (
            0 => 'cityId',
            1 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      12137 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-pension-member.store',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12168 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-non-pns-member.index',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12188 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-non-pns-member.create',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12209 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-non-pns-member.show',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_non_pns_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      12224 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-non-pns-member.edit',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_non_pns_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12234 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-non-pns-member.update',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_non_pns_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-non-pns-member.destroy',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_non_pns_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      12260 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FtBmfgRBIyFCNSpE',
          ),
          1 => 
          array (
            0 => 'cityId',
            1 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      12271 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-non-pns-member.store',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12299 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-extend-member.index',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12319 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-extend-member.create',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12340 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-extend-member.show',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_extend_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      12355 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-extend-member.edit',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_extend_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12365 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-extend-member.update',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_extend_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-extend-member.destroy',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_extend_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      12391 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::obecfSXfg6LdfAx3',
          ),
          1 => 
          array (
            0 => 'cityId',
            1 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      12402 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-extend-member.store',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12435 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-certificate-member.index',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12455 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-certificate-member.create',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12476 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-certificate-member.show',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_certificate_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      12491 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-certificate-member.edit',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_certificate_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12501 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-certificate-member.update',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_certificate_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-certificate-member.destroy',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_certificate_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      12513 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-certificate-member.store',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12544 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-inpassing-member.index',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12564 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-inpassing-member.create',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12585 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-inpassing-member.show',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_inpassing_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      12600 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-inpassing-member.edit',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_inpassing_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12610 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-inpassing-member.update',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_inpassing_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-inpassing-member.destroy',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_inpassing_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      12622 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-inpassing-member.store',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12647 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-bsi-member.index',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12667 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-bsi-member.create',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12688 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-bsi-member.show',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_bsi_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      12703 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-bsi-member.edit',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_bsi_member',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12713 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-bsi-member.update',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_bsi_member',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-bsi-member.destroy',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district_bsi_member',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      12725 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.district-bsi-member.store',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12739 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.show',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'city.update',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'city.destroy',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      12770 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'chat.term.index',
          ),
          1 => 
          array (
            0 => 'chat',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12790 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'chat.term.create',
          ),
          1 => 
          array (
            0 => 'chat',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12811 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'chat.term.show',
          ),
          1 => 
          array (
            0 => 'chat',
            1 => 'term',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      12826 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'chat.term.edit',
          ),
          1 => 
          array (
            0 => 'chat',
            1 => 'term',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12836 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'chat.term.update',
          ),
          1 => 
          array (
            0 => 'chat',
            1 => 'term',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'chat.term.destroy',
          ),
          1 => 
          array (
            0 => 'chat',
            1 => 'term',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      12848 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'chat.term.store',
          ),
          1 => 
          array (
            0 => 'chat',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12893 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.islamic-study.index',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12913 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.islamic-study.create',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12934 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.islamic-study.show',
          ),
          1 => 
          array (
            0 => 'category',
            1 => 'islamic_study',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      12949 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.islamic-study.edit',
          ),
          1 => 
          array (
            0 => 'category',
            1 => 'islamic_study',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      12959 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.islamic-study.update',
          ),
          1 => 
          array (
            0 => 'category',
            1 => 'islamic_study',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'category.islamic-study.destroy',
          ),
          1 => 
          array (
            0 => 'category',
            1 => 'islamic_study',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      12971 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.islamic-study.store',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      13005 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'classroom.show',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      13023 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'classroom.edit',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      13040 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'classroom.task.index',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      13060 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'classroom.task.create',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      13081 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'classroom.task.show',
          ),
          1 => 
          array (
            0 => 'classroom',
            1 => 'task',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      13096 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'classroom.task.edit',
          ),
          1 => 
          array (
            0 => 'classroom',
            1 => 'task',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      13106 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'classroom.task.update',
          ),
          1 => 
          array (
            0 => 'classroom',
            1 => 'task',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'classroom.task.destroy',
          ),
          1 => 
          array (
            0 => 'classroom',
            1 => 'task',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      13118 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'classroom.task.store',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      13130 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'classroom.update',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'classroom.destroy',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      13156 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pfFBkBmknI1saKwv',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      13194 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event.show',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      13212 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event.edit',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      13236 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event.participant.index',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      13256 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event.participant.create',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      13277 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event.participant.show',
          ),
          1 => 
          array (
            0 => 'event',
            1 => 'participant',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      13292 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event.participant.edit',
          ),
          1 => 
          array (
            0 => 'event',
            1 => 'participant',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      13302 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event.participant.update',
          ),
          1 => 
          array (
            0 => 'event',
            1 => 'participant',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'event.participant.destroy',
          ),
          1 => 
          array (
            0 => 'event',
            1 => 'participant',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      13314 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event.participant.store',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      13335 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event.barcode.index',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      13355 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event.barcode.create',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      13376 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event.barcode.show',
          ),
          1 => 
          array (
            0 => 'event',
            1 => 'barcode',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      13391 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event.barcode.edit',
          ),
          1 => 
          array (
            0 => 'event',
            1 => 'barcode',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      13401 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event.barcode.update',
          ),
          1 => 
          array (
            0 => 'event',
            1 => 'barcode',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'event.barcode.destroy',
          ),
          1 => 
          array (
            0 => 'event',
            1 => 'barcode',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      13413 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event.barcode.store',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      13425 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event.update',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'event.destroy',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      13455 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hybXl6ZLa8CU2l7Q',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      13489 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::k2hhinzIgqah8b75',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'user_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      13550 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UnwzUM34Gqp6IJxJ',
          ),
          1 => 
          array (
            0 => 'eventId',
            1 => 'sessionId',
            2 => 'userId',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      13598 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::h4Lim7rTAZxQ68Rb',
          ),
          1 => 
          array (
            0 => 'userId',
            1 => 'eventId',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      13608 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZoC4F1hgSYybXWlT',
          ),
          1 => 
          array (
            0 => 'user_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      13645 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::H1IwPWiCtZLaF5WT',
          ),
          1 => 
          array (
            0 => 'event_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      13694 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fGF8CnWupxScH4Fr',
          ),
          1 => 
          array (
            0 => 'event_id',
            1 => 'search',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      13727 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vwPSNd51nkPXDJEu',
          ),
          1 => 
          array (
            0 => 'eventId',
            1 => 'userId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      13757 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::iHkVOGIAfpe2t4wg',
          ),
          1 => 
          array (
            0 => 'userId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      13774 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::y4cjNM56yVJeucbh',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      13813 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mKNlCDg76TyPgytw',
          ),
          1 => 
          array (
            0 => 'month',
            1 => 'year',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      13848 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event-categories.show',
          ),
          1 => 
          array (
            0 => 'event_category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      13863 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event-categories.edit',
          ),
          1 => 
          array (
            0 => 'event_category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      13873 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event-categories.update',
          ),
          1 => 
          array (
            0 => 'event_category',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'event-categories.destroy',
          ),
          1 => 
          array (
            0 => 'event_category',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      13914 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'educational-level.show',
          ),
          1 => 
          array (
            0 => 'educational_level',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      13929 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'educational-level.edit',
          ),
          1 => 
          array (
            0 => 'educational_level',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      13939 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'educational-level.update',
          ),
          1 => 
          array (
            0 => 'educational_level',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'educational-level.destroy',
          ),
          1 => 
          array (
            0 => 'educational_level',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      13971 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'story.show',
          ),
          1 => 
          array (
            0 => 'story',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      13989 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'story.edit',
          ),
          1 => 
          array (
            0 => 'story',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14006 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'story.read.index',
          ),
          1 => 
          array (
            0 => 'story',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14026 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'story.read.create',
          ),
          1 => 
          array (
            0 => 'story',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14047 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'story.read.show',
          ),
          1 => 
          array (
            0 => 'story',
            1 => 'read',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      14062 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'story.read.edit',
          ),
          1 => 
          array (
            0 => 'story',
            1 => 'read',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14072 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'story.read.update',
          ),
          1 => 
          array (
            0 => 'story',
            1 => 'read',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'story.read.destroy',
          ),
          1 => 
          array (
            0 => 'story',
            1 => 'read',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      14084 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'story.read.store',
          ),
          1 => 
          array (
            0 => 'story',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14096 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'story.update',
          ),
          1 => 
          array (
            0 => 'story',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'story.destroy',
          ),
          1 => 
          array (
            0 => 'story',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      14135 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'subscribe-fee.show',
          ),
          1 => 
          array (
            0 => 'subscribe_fee',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      14150 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'subscribe-fee.edit',
          ),
          1 => 
          array (
            0 => 'subscribe_fee',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14160 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'subscribe-fee.update',
          ),
          1 => 
          array (
            0 => 'subscribe_fee',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'subscribe-fee.destroy',
          ),
          1 => 
          array (
            0 => 'subscribe_fee',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      14191 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'subscribe-fee-status.show',
          ),
          1 => 
          array (
            0 => 'subscribe_fee_status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      14206 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'subscribe-fee-status.edit',
          ),
          1 => 
          array (
            0 => 'subscribe_fee_status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14216 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'subscribe-fee-status.update',
          ),
          1 => 
          array (
            0 => 'subscribe_fee_status',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'subscribe-fee-status.destroy',
          ),
          1 => 
          array (
            0 => 'subscribe_fee_status',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      14246 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.show',
          ),
          1 => 
          array (
            0 => 'setting',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      14261 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.edit',
          ),
          1 => 
          array (
            0 => 'setting',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14271 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.update',
          ),
          1 => 
          array (
            0 => 'setting',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'setting.destroy',
          ),
          1 => 
          array (
            0 => 'setting',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      14305 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.show',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      14326 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.edit',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14343 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.event.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14363 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.event.create',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14384 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.event.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      14399 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.event.edit',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14409 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.event.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'event',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.event.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'event',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      14421 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.event.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14446 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.event-attendance.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14466 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.event-attendance.create',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14487 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.event-attendance.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'event_attendance',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      14502 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.event-attendance.edit',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'event_attendance',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14512 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.event-attendance.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'event_attendance',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.event-attendance.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'event_attendance',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      14524 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.event-attendance.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14545 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.story.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14565 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.story.create',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14586 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.story.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'story',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      14601 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.story.edit',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'story',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14611 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.story.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'story',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.story.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'story',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      14623 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.story.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14644 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.post.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14664 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.post.create',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14685 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.post.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'post',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      14700 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.post.edit',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'post',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14710 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.post.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'post',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.post.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'post',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      14722 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.post.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14742 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.profile.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14762 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.profile.create',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14783 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.profile.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'profile',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      14798 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.profile.edit',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'profile',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14808 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.profile.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'profile',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.profile.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'profile',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      14820 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.profile.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14855 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.personal-conversation.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14875 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.personal-conversation.create',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14896 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.personal-conversation.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'personal_conversation',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      14911 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.personal-conversation.edit',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'personal_conversation',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14921 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.personal-conversation.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'personal_conversation',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.personal-conversation.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'personal_conversation',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      14933 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.personal-conversation.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14957 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.push-token.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14977 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.push-token.create',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      14998 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.push-token.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'push_token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      15013 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.push-token.edit',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'push_token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15023 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.push-token.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'push_token',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.push-token.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'push_token',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      15035 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.push-token.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15055 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.payment.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15075 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.payment.create',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15096 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.payment.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'payment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      15111 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.payment.edit',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'payment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15121 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.payment.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'payment',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.payment.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'payment',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      15133 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.payment.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15157 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.pns-status.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15177 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.pns-status.create',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15198 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.pns-status.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'pns_status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      15213 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.pns-status.edit',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'pns_status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15223 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.pns-status.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'pns_status',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.pns-status.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'pns_status',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      15235 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.pns-status.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15257 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.gallery.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15277 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.gallery.create',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15298 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.gallery.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'gallery',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      15313 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.gallery.edit',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'gallery',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15323 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.gallery.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'gallery',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.gallery.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'gallery',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      15335 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.gallery.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15357 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.album.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15377 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.album.create',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15398 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.album.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'album',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      15413 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.album.edit',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'album',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15423 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.album.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'album',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.album.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'album',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      15435 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.album.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15454 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.avatar.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15474 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.avatar.create',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15495 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.avatar.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'avatar',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      15510 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.avatar.edit',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'avatar',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15520 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.avatar.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'avatar',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.avatar.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'avatar',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      15532 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.avatar.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15555 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.assignment.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15575 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.assignment.create',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15596 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.assignment.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'assignment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      15611 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.assignment.edit',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'assignment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15621 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.assignment.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'assignment',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.assignment.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'assignment',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      15633 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.assignment.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15654 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.banner.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15674 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.banner.create',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15695 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.banner.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'banner',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      15710 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.banner.edit',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'banner',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15720 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.banner.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'banner',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.banner.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'banner',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      15732 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.banner.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15761 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.member-card.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15781 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.member-card.create',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15802 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.member-card.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'member_card',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      15817 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.member-card.edit',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'member_card',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15827 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.member-card.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'member_card',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.member-card.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'member_card',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      15839 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.member-card.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15858 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.module.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15878 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.module.create',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15899 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.module.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'module',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      15914 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.module.edit',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'module',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15924 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.module.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'module',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.module.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'module',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      15936 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.module.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15965 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.question-list.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      15985 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.question-list.create',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      16006 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.question-list.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'question_list',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16021 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.question-list.edit',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'question_list',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      16031 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.question-list.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'question_list',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.question-list.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'question_list',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16043 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.question-list.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      16061 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.room.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      16081 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.room.create',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      16102 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.room.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'room',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16117 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.room.edit',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'room',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      16127 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.room.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'room',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.room.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'room',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16139 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.room.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      16165 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.lesson-plan.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      16185 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.lesson-plan.create',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      16206 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.lesson-plan.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'lesson_plan',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16221 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.lesson-plan.edit',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'lesson_plan',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      16231 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.lesson-plan.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'lesson_plan',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.lesson-plan.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'lesson_plan',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16243 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.lesson-plan.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      16271 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.islamic-study.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      16291 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.islamic-study.create',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      16312 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.islamic-study.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'islamic_study',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16327 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.islamic-study.edit',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'islamic_study',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      16337 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.islamic-study.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'islamic_study',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.islamic-study.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'islamic_study',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16349 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.islamic-study.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      16361 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.update',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.destroy',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16404 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wbd9q2Xea7VWUtVc',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16436 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PINddWYjPNBxV1SW',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16475 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QCTsI4fxqUlwuZSs',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16511 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::V2XsqII7kAvPORjW',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16552 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WgjlHG0ro2Mdc0Ja',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16583 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6yrbgwsU7I9t7e6a',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16616 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-bookmark.show',
          ),
          1 => 
          array (
            0 => 'user_bookmark',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16631 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-bookmark.edit',
          ),
          1 => 
          array (
            0 => 'user_bookmark',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      16641 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-bookmark.update',
          ),
          1 => 
          array (
            0 => 'user_bookmark',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user-bookmark.destroy',
          ),
          1 => 
          array (
            0 => 'user_bookmark',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16672 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OvDyH2mZeYWGvCKN',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16699 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kTqAftK9NR2b6HhC',
          ),
          1 => 
          array (
            0 => 'province_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16730 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::o3zSo59XNpMnzn7J',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      16773 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::drkbxvH92RvyORgQ',
          ),
          1 => 
          array (
            0 => 'province_id',
            1 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16808 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'murottal.show',
          ),
          1 => 
          array (
            0 => 'murottal',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16823 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'murottal.edit',
          ),
          1 => 
          array (
            0 => 'murottal',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      16833 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'murottal.update',
          ),
          1 => 
          array (
            0 => 'murottal',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'murottal.destroy',
          ),
          1 => 
          array (
            0 => 'murottal',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16876 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'membership-fee.show',
          ),
          1 => 
          array (
            0 => 'membership_fee',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16891 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'membership-fee.edit',
          ),
          1 => 
          array (
            0 => 'membership_fee',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      16901 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'membership-fee.update',
          ),
          1 => 
          array (
            0 => 'membership_fee',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'membership-fee.destroy',
          ),
          1 => 
          array (
            0 => 'membership_fee',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16932 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'membership-fee-status.show',
          ),
          1 => 
          array (
            0 => 'membership_fee_status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16947 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'membership-fee-status.edit',
          ),
          1 => 
          array (
            0 => 'membership_fee_status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      16957 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'membership-fee-status.update',
          ),
          1 => 
          array (
            0 => 'membership_fee_status',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'membership-fee-status.destroy',
          ),
          1 => 
          array (
            0 => 'membership_fee_status',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      16986 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'member-all.show',
          ),
          1 => 
          array (
            0 => 'member_all',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17001 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'member-all.edit',
          ),
          1 => 
          array (
            0 => 'member_all',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      17011 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'member-all.update',
          ),
          1 => 
          array (
            0 => 'member_all',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'member-all.destroy',
          ),
          1 => 
          array (
            0 => 'member_all',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17046 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module.show',
          ),
          1 => 
          array (
            0 => 'module',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17064 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module.edit',
          ),
          1 => 
          array (
            0 => 'module',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      17084 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module.content.index',
          ),
          1 => 
          array (
            0 => 'module',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      17104 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module.content.create',
          ),
          1 => 
          array (
            0 => 'module',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      17125 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module.content.show',
          ),
          1 => 
          array (
            0 => 'module',
            1 => 'content',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17140 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module.content.edit',
          ),
          1 => 
          array (
            0 => 'module',
            1 => 'content',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      17150 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module.content.update',
          ),
          1 => 
          array (
            0 => 'module',
            1 => 'content',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'module.content.destroy',
          ),
          1 => 
          array (
            0 => 'module',
            1 => 'content',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17162 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module.content.store',
          ),
          1 => 
          array (
            0 => 'module',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      17174 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module.update',
          ),
          1 => 
          array (
            0 => 'module',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'module.destroy',
          ),
          1 => 
          array (
            0 => 'module',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17199 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::K7pfZ5mwk1ORHofu',
          ),
          1 => 
          array (
            0 => 'gradeLabel',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17224 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dPmNrPOYKMy6Kay3',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17259 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module-like.show',
          ),
          1 => 
          array (
            0 => 'module_like',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17274 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module-like.edit',
          ),
          1 => 
          array (
            0 => 'module_like',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      17284 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module-like.update',
          ),
          1 => 
          array (
            0 => 'module_like',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'module-like.destroy',
          ),
          1 => 
          array (
            0 => 'module_like',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17310 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::f6Q5909Eb5BRAh6v',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17338 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module-cover.show',
          ),
          1 => 
          array (
            0 => 'module_cover',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17353 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module-cover.edit',
          ),
          1 => 
          array (
            0 => 'module_cover',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      17363 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module-cover.update',
          ),
          1 => 
          array (
            0 => 'module_cover',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'module-cover.destroy',
          ),
          1 => 
          array (
            0 => 'module_cover',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17399 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'article.show',
          ),
          1 => 
          array (
            0 => 'article',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17414 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'article.edit',
          ),
          1 => 
          array (
            0 => 'article',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      17424 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'article.update',
          ),
          1 => 
          array (
            0 => 'article',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'article.destroy',
          ),
          1 => 
          array (
            0 => 'article',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17472 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-category.show',
          ),
          1 => 
          array (
            0 => 'assignment_category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17490 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-category.edit',
          ),
          1 => 
          array (
            0 => 'assignment_category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      17507 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-category.type.index',
          ),
          1 => 
          array (
            0 => 'assignment_category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      17527 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-category.type.create',
          ),
          1 => 
          array (
            0 => 'assignment_category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      17548 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-category.type.show',
          ),
          1 => 
          array (
            0 => 'assignment_category',
            1 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17563 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-category.type.edit',
          ),
          1 => 
          array (
            0 => 'assignment_category',
            1 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      17573 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-category.type.update',
          ),
          1 => 
          array (
            0 => 'assignment_category',
            1 => 'type',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-category.type.destroy',
          ),
          1 => 
          array (
            0 => 'assignment_category',
            1 => 'type',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17585 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-category.type.store',
          ),
          1 => 
          array (
            0 => 'assignment_category',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      17597 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-category.update',
          ),
          1 => 
          array (
            0 => 'assignment_category',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-category.destroy',
          ),
          1 => 
          array (
            0 => 'assignment_category',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17624 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-uses.show',
          ),
          1 => 
          array (
            0 => 'assignment_us',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17639 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-uses.edit',
          ),
          1 => 
          array (
            0 => 'assignment_us',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      17649 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-uses.update',
          ),
          1 => 
          array (
            0 => 'assignment_us',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-uses.destroy',
          ),
          1 => 
          array (
            0 => 'assignment_us',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17679 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-session.show',
          ),
          1 => 
          array (
            0 => 'assignment_session',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17694 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-session.edit',
          ),
          1 => 
          array (
            0 => 'assignment_session',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      17704 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-session.update',
          ),
          1 => 
          array (
            0 => 'assignment_session',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'assignment-session.destroy',
          ),
          1 => 
          array (
            0 => 'assignment_session',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17731 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment.show',
          ),
          1 => 
          array (
            0 => 'assignment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17749 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment.edit',
          ),
          1 => 
          array (
            0 => 'assignment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      17766 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SIS5n0opRBZxNTwW',
          ),
          1 => 
          array (
            0 => 'assignmentId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      17791 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0nRsoHQIF7dmXVM5',
          ),
          1 => 
          array (
            0 => 'assignmentId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      17816 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NXVKwQ87ig19Y8Jn',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      17827 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assignment.update',
          ),
          1 => 
          array (
            0 => 'assignment',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'assignment.destroy',
          ),
          1 => 
          array (
            0 => 'assignment',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17872 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5QOiEKiitBIA26Q7',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      17882 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xQs2GRstCi9KdC5h',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17920 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'notification.show',
          ),
          1 => 
          array (
            0 => 'notification',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17935 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'notification.edit',
          ),
          1 => 
          array (
            0 => 'notification',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      17945 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'notification.update',
          ),
          1 => 
          array (
            0 => 'notification',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'notification.destroy',
          ),
          1 => 
          array (
            0 => 'notification',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      17996 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'year.month.event.index',
          ),
          1 => 
          array (
            0 => 'year',
            1 => 'month',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      18016 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'year.month.event.create',
          ),
          1 => 
          array (
            0 => 'year',
            1 => 'month',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      18037 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'year.month.event.show',
          ),
          1 => 
          array (
            0 => 'year',
            1 => 'month',
            2 => 'event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18052 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'year.month.event.edit',
          ),
          1 => 
          array (
            0 => 'year',
            1 => 'month',
            2 => 'event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      18062 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'year.month.event.update',
          ),
          1 => 
          array (
            0 => 'year',
            1 => 'month',
            2 => 'event',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'year.month.event.destroy',
          ),
          1 => 
          array (
            0 => 'year',
            1 => 'month',
            2 => 'event',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18074 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'year.month.event.store',
          ),
          1 => 
          array (
            0 => 'year',
            1 => 'month',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      18111 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'year.month.province.event.index',
          ),
          1 => 
          array (
            0 => 'year',
            1 => 'month',
            2 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      18131 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'year.month.province.event.create',
          ),
          1 => 
          array (
            0 => 'year',
            1 => 'month',
            2 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      18152 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'year.month.province.event.show',
          ),
          1 => 
          array (
            0 => 'year',
            1 => 'month',
            2 => 'province',
            3 => 'event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18167 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'year.month.province.event.edit',
          ),
          1 => 
          array (
            0 => 'year',
            1 => 'month',
            2 => 'province',
            3 => 'event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      18177 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'year.month.province.event.update',
          ),
          1 => 
          array (
            0 => 'year',
            1 => 'month',
            2 => 'province',
            3 => 'event',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'year.month.province.event.destroy',
          ),
          1 => 
          array (
            0 => 'year',
            1 => 'month',
            2 => 'province',
            3 => 'event',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18189 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'year.month.province.event.store',
          ),
          1 => 
          array (
            0 => 'year',
            1 => 'month',
            2 => 'province',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      18219 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'kta.show',
          ),
          1 => 
          array (
            0 => 'ktum',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18234 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'kta.edit',
          ),
          1 => 
          array (
            0 => 'ktum',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      18244 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'kta.update',
          ),
          1 => 
          array (
            0 => 'ktum',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'kta.destroy',
          ),
          1 => 
          array (
            0 => 'ktum',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18292 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JNHoElnGfaafBqq8',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18336 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vcRS7GML1uRt18ht',
          ),
          1 => 
          array (
            0 => 'provinceId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      18362 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3r5L0JCS3258LHf7',
          ),
          1 => 
          array (
            0 => 'provinceId',
            1 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18409 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::blSuRtStqq1vsxnc',
          ),
          1 => 
          array (
            0 => 'cityId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      18435 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BDaxiNR05wnz6GMZ',
          ),
          1 => 
          array (
            0 => 'cityId',
            1 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18465 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'grade.show',
          ),
          1 => 
          array (
            0 => 'grade',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18480 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'grade.edit',
          ),
          1 => 
          array (
            0 => 'grade',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      18490 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'grade.update',
          ),
          1 => 
          array (
            0 => 'grade',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'grade.destroy',
          ),
          1 => 
          array (
            0 => 'grade',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18520 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'book.show',
          ),
          1 => 
          array (
            0 => 'book',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18535 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'book.edit',
          ),
          1 => 
          array (
            0 => 'book',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      18545 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'book.update',
          ),
          1 => 
          array (
            0 => 'book',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'book.destroy',
          ),
          1 => 
          array (
            0 => 'book',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18578 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'book-category.show',
          ),
          1 => 
          array (
            0 => 'book_category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18596 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'book-category.edit',
          ),
          1 => 
          array (
            0 => 'book_category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      18613 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'book-category.book.index',
          ),
          1 => 
          array (
            0 => 'book_category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      18633 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'book-category.book.create',
          ),
          1 => 
          array (
            0 => 'book_category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      18654 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'book-category.book.show',
          ),
          1 => 
          array (
            0 => 'book_category',
            1 => 'book',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18669 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'book-category.book.edit',
          ),
          1 => 
          array (
            0 => 'book_category',
            1 => 'book',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      18679 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'book-category.book.update',
          ),
          1 => 
          array (
            0 => 'book_category',
            1 => 'book',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'book-category.book.destroy',
          ),
          1 => 
          array (
            0 => 'book_category',
            1 => 'book',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18691 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'book-category.book.store',
          ),
          1 => 
          array (
            0 => 'book_category',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      18703 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'book-category.update',
          ),
          1 => 
          array (
            0 => 'book_category',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'book-category.destroy',
          ),
          1 => 
          array (
            0 => 'book_category',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18744 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'question-list.show',
          ),
          1 => 
          array (
            0 => 'question_list',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18759 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'question-list.edit',
          ),
          1 => 
          array (
            0 => 'question_list',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      18769 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'question-list.update',
          ),
          1 => 
          array (
            0 => 'question_list',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'question-list.destroy',
          ),
          1 => 
          array (
            0 => 'question_list',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18803 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::20kd3ZVx2u2zChrj',
          ),
          1 => 
          array (
            0 => 'gradeId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18833 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'room.show',
          ),
          1 => 
          array (
            0 => 'room',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18848 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'room.edit',
          ),
          1 => 
          array (
            0 => 'room',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      18858 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'room.update',
          ),
          1 => 
          array (
            0 => 'room',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'room.destroy',
          ),
          1 => 
          array (
            0 => 'room',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18887 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XKBB3nFpOm2G4KYc',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      18925 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lesson-plan.show',
          ),
          1 => 
          array (
            0 => 'lesson_plan',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18940 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lesson-plan.edit',
          ),
          1 => 
          array (
            0 => 'lesson_plan',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      18950 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lesson-plan.update',
          ),
          1 => 
          array (
            0 => 'lesson_plan',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'lesson-plan.destroy',
          ),
          1 => 
          array (
            0 => 'lesson_plan',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18983 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lesson-plan-cover.show',
          ),
          1 => 
          array (
            0 => 'lesson_plan_cover',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      18998 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lesson-plan-cover.edit',
          ),
          1 => 
          array (
            0 => 'lesson_plan_cover',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19008 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lesson-plan-cover.update',
          ),
          1 => 
          array (
            0 => 'lesson_plan_cover',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'lesson-plan-cover.destroy',
          ),
          1 => 
          array (
            0 => 'lesson_plan_cover',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      19036 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lesson-plan-liked.show',
          ),
          1 => 
          array (
            0 => 'lesson_plan_liked',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      19051 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lesson-plan-liked.edit',
          ),
          1 => 
          array (
            0 => 'lesson_plan_liked',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19061 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lesson-plan-liked.update',
          ),
          1 => 
          array (
            0 => 'lesson_plan_liked',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'lesson-plan-liked.destroy',
          ),
          1 => 
          array (
            0 => 'lesson_plan_liked',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      19099 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rLXCrbK4Vxvt9OXD',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      19142 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.show',
          ),
          1 => 
          array (
            0 => 'islamic_study',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      19160 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.edit',
          ),
          1 => 
          array (
            0 => 'islamic_study',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19177 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.like.index',
          ),
          1 => 
          array (
            0 => 'islamic_study',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19197 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.like.create',
          ),
          1 => 
          array (
            0 => 'islamic_study',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19218 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.like.show',
          ),
          1 => 
          array (
            0 => 'islamic_study',
            1 => 'like',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      19233 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.like.edit',
          ),
          1 => 
          array (
            0 => 'islamic_study',
            1 => 'like',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19243 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.like.update',
          ),
          1 => 
          array (
            0 => 'islamic_study',
            1 => 'like',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.like.destroy',
          ),
          1 => 
          array (
            0 => 'islamic_study',
            1 => 'like',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      19255 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.like.store',
          ),
          1 => 
          array (
            0 => 'islamic_study',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19276 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.comment.index',
          ),
          1 => 
          array (
            0 => 'islamic_study',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19296 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.comment.create',
          ),
          1 => 
          array (
            0 => 'islamic_study',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19317 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.comment.show',
          ),
          1 => 
          array (
            0 => 'islamic_study',
            1 => 'comment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      19332 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.comment.edit',
          ),
          1 => 
          array (
            0 => 'islamic_study',
            1 => 'comment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19342 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.comment.update',
          ),
          1 => 
          array (
            0 => 'islamic_study',
            1 => 'comment',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.comment.destroy',
          ),
          1 => 
          array (
            0 => 'islamic_study',
            1 => 'comment',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      19354 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.comment.store',
          ),
          1 => 
          array (
            0 => 'islamic_study',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19374 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.upvote.index',
          ),
          1 => 
          array (
            0 => 'islamic_study',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19394 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.upvote.create',
          ),
          1 => 
          array (
            0 => 'islamic_study',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19415 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.upvote.show',
          ),
          1 => 
          array (
            0 => 'islamic_study',
            1 => 'upvote',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      19430 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.upvote.edit',
          ),
          1 => 
          array (
            0 => 'islamic_study',
            1 => 'upvote',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19440 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.upvote.update',
          ),
          1 => 
          array (
            0 => 'islamic_study',
            1 => 'upvote',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.upvote.destroy',
          ),
          1 => 
          array (
            0 => 'islamic_study',
            1 => 'upvote',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      19452 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.upvote.store',
          ),
          1 => 
          array (
            0 => 'islamic_study',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19474 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.downvote.index',
          ),
          1 => 
          array (
            0 => 'islamic_study',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19494 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.downvote.create',
          ),
          1 => 
          array (
            0 => 'islamic_study',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19515 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.downvote.show',
          ),
          1 => 
          array (
            0 => 'islamic_study',
            1 => 'downvote',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      19530 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.downvote.edit',
          ),
          1 => 
          array (
            0 => 'islamic_study',
            1 => 'downvote',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19540 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.downvote.update',
          ),
          1 => 
          array (
            0 => 'islamic_study',
            1 => 'downvote',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.downvote.destroy',
          ),
          1 => 
          array (
            0 => 'islamic_study',
            1 => 'downvote',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      19552 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.downvote.store',
          ),
          1 => 
          array (
            0 => 'islamic_study',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19564 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.update',
          ),
          1 => 
          array (
            0 => 'islamic_study',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study.destroy',
          ),
          1 => 
          array (
            0 => 'islamic_study',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      19597 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study-category.show',
          ),
          1 => 
          array (
            0 => 'islamic_study_category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      19612 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study-category.edit',
          ),
          1 => 
          array (
            0 => 'islamic_study_category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19622 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study-category.update',
          ),
          1 => 
          array (
            0 => 'islamic_study_category',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'islamic-study-category.destroy',
          ),
          1 => 
          array (
            0 => 'islamic_study_category',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      19653 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OWsSVHJD5wzLCXcm',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      19690 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'task.result.index',
          ),
          1 => 
          array (
            0 => 'task',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19710 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'task.result.create',
          ),
          1 => 
          array (
            0 => 'task',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19731 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'task.result.show',
          ),
          1 => 
          array (
            0 => 'task',
            1 => 'result',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      19746 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'task.result.edit',
          ),
          1 => 
          array (
            0 => 'task',
            1 => 'result',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19756 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'task.result.update',
          ),
          1 => 
          array (
            0 => 'task',
            1 => 'result',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'task.result.destroy',
          ),
          1 => 
          array (
            0 => 'task',
            1 => 'result',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      19768 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'task.result.store',
          ),
          1 => 
          array (
            0 => 'task',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19805 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'training-event.show',
          ),
          1 => 
          array (
            0 => 'training_event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      19820 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'training-event.edit',
          ),
          1 => 
          array (
            0 => 'training_event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19830 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'training-event.update',
          ),
          1 => 
          array (
            0 => 'training_event',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'training-event.destroy',
          ),
          1 => 
          array (
            0 => 'training_event',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      19858 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'file.show',
          ),
          1 => 
          array (
            0 => 'file',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      19873 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'file.edit',
          ),
          1 => 
          array (
            0 => 'file',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      19883 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'file.update',
          ),
          1 => 
          array (
            0 => 'file',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'file.destroy',
          ),
          1 => 
          array (
            0 => 'file',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      19937 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2LFZilXvFKDm4Vfm',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      19980 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cgzLNcex20Onf3gn',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'key',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      20015 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.candidate.show',
          ),
          1 => 
          array (
            0 => 'candidate',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.candidate.update',
          ),
          1 => 
          array (
            0 => 'candidate',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.candidate.destroy',
          ),
          1 => 
          array (
            0 => 'candidate',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      20033 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.candidate.vote.index',
          ),
          1 => 
          array (
            0 => 'candidate',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.candidate.vote.store',
          ),
          1 => 
          array (
            0 => 'candidate',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      20055 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.candidate.vote.show',
          ),
          1 => 
          array (
            0 => 'candidate',
            1 => 'vote',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.candidate.vote.update',
          ),
          1 => 
          array (
            0 => 'candidate',
            1 => 'vote',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.candidate.vote.destroy',
          ),
          1 => 
          array (
            0 => 'candidate',
            1 => 'vote',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      20092 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.city.district.index',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.city.district.store',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      20114 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.city.district.show',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.city.district.update',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.city.district.destroy',
          ),
          1 => 
          array (
            0 => 'city',
            1 => 'district',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      20146 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.votable.show',
          ),
          1 => 
          array (
            0 => 'votable',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.votable.update',
          ),
          1 => 
          array (
            0 => 'votable',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.votable.destroy',
          ),
          1 => 
          array (
            0 => 'votable',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      20190 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.user.votable.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.user.votable.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      20212 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.user.votable.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'votable',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.user.votable.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'votable',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.user.votable.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'votable',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      20231 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.user.file.index',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.user.file.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      20253 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.user.file.show',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'file',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.user.file.update',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'file',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.user.file.destroy',
          ),
          1 => 
          array (
            0 => 'user',
            1 => 'file',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      20266 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.user.show',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.user.update',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.user.destroy',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      20292 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vR0swcvXF8ON02es',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      20341 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.department-division.show',
          ),
          1 => 
          array (
            0 => 'department_division',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.department-division.update',
          ),
          1 => 
          array (
            0 => 'department_division',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.department-division.destroy',
          ),
          1 => 
          array (
            0 => 'department_division',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      20368 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.department-user.show',
          ),
          1 => 
          array (
            0 => 'department_user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.department-user.update',
          ),
          1 => 
          array (
            0 => 'department_user',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.department-user.destroy',
          ),
          1 => 
          array (
            0 => 'department_user',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      20392 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.department.show',
          ),
          1 => 
          array (
            0 => 'department',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.department.update',
          ),
          1 => 
          array (
            0 => 'department',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.department.destroy',
          ),
          1 => 
          array (
            0 => 'department',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      20420 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SbgRSaz9GWbTwBGs',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      20462 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.province.user.index',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.province.user.store',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      20484 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.province.user.show',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.province.user.update',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'user',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.province.user.destroy',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'user',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      20511 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.ads.show',
          ),
          1 => 
          array (
            0 => 'ad',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.ads.update',
          ),
          1 => 
          array (
            0 => 'ad',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.ads.destroy',
          ),
          1 => 
          array (
            0 => 'ad',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      20541 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.post.show',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.post.update',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.post.destroy',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      20571 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.province.show',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.province.update',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.province.destroy',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      20589 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.province.city.index',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.province.city.store',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      20611 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.province.city.show',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.province.city.update',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.province.city.destroy',
          ),
          1 => 
          array (
            0 => 'province',
            1 => 'city',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      20645 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.payment.show',
          ),
          1 => 
          array (
            0 => 'payment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.payment.update',
          ),
          1 => 
          array (
            0 => 'payment',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.payment.destroy',
          ),
          1 => 
          array (
            0 => 'payment',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      20693 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kDhlHfmMZxbsxBKx',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      20744 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0f9CY2Wh1RhYp6qu',
          ),
          1 => 
          array (
            0 => 'year',
            1 => 'month',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      20786 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YK405LBLGHVD4LRe',
          ),
          1 => 
          array (
            0 => 'year',
            1 => 'month',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      20825 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.islamic-study.show',
          ),
          1 => 
          array (
            0 => 'islamic_study',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.islamic-study.update',
          ),
          1 => 
          array (
            0 => 'islamic_study',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.islamic-study.destroy',
          ),
          1 => 
          array (
            0 => 'islamic_study',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      20847 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SjyvQuJhLtRUayN5',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      20865 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OoYa5Z7MQGK6odsZ',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      20893 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.role.show',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.role.update',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.v2.admin.role.destroy',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      20941 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::a6R2Z9cXMREB6Bjm',
          ),
          1 => 
          array (
            0 => 'year',
            1 => 'month',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      20990 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.menus.restore',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21004 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.menus.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21021 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.menus.builder',
          ),
          1 => 
          array (
            0 => 'menu',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21036 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.menus.order_item',
          ),
          1 => 
          array (
            0 => 'menu',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21062 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.menus.item.destroy',
          ),
          1 => 
          array (
            0 => 'menu',
            1 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      21072 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.menus.item.add',
          ),
          1 => 
          array (
            0 => 'menu',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.menus.item.update',
          ),
          1 => 
          array (
            0 => 'menu',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21084 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.menus.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.menus.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.menus.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      21126 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.murottals.restore',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21140 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.murottals.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21151 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.murottals.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.murottals.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.murottals.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      21184 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lIAvg2gQ7EsNdZHL',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      21229 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.roles.restore',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21243 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.roles.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21254 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.roles.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.roles.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.roles.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      21291 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.rooms.restore',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21305 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.rooms.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21316 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.rooms.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.rooms.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.rooms.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      21350 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BWl62pTsDgpDbA4E',
          ),
          1 => 
          array (
            0 => 'email',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      21397 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.categories.restore',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21411 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.categories.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21422 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.categories.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.categories.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.categories.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      21461 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.cities.restore',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21475 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.cities.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21486 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.cities.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.cities.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.cities.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      21524 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.chats.restore',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21538 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.chats.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21549 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.chats.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.chats.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.chats.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      21595 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.conversations.restore',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21609 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.conversations.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21620 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.conversations.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.conversations.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.conversations.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      21663 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.posts.restore',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21677 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.posts.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21688 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.posts.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.posts.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.posts.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      21729 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pages.restore',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21743 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pages.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21754 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pages.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pages.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pages.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      21797 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payments.restore',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21811 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payments.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21822 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payments.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payments.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payments.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      21865 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payment-vendors.restore',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21879 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payment-vendors.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21890 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payment-vendors.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payment-vendors.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.payment-vendors.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      21936 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.profiles.restore',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21950 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.profiles.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      21961 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.profiles.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.profiles.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.profiles.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      22001 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.provinces.restore',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      22015 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.provinces.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      22026 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.provinces.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.provinces.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.provinces.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      22073 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pns-statuses.restore',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      22087 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pns-statuses.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      22098 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pns-statuses.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pns-statuses.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.pns-statuses.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      22143 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.push-tokens.restore',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      22157 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.push-tokens.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      22168 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.push-tokens.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.push-tokens.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.push-tokens.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      22215 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.events.restore',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      22229 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.events.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      22240 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.events.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.events.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.events.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      22285 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-guests.restore',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      22299 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-guests.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      22310 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-guests.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-guests.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-guests.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      22354 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-categories.restore',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      22368 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-categories.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      22379 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-categories.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-categories.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.event-categories.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      22433 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.educational-levels.restore',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      22447 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.educational-levels.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      22458 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.educational-levels.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.educational-levels.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.educational-levels.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      22523 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plan-formats.restore',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      22537 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plan-formats.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      22548 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plan-formats.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plan-formats.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plan-formats.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      22588 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plan-covers.restore',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      22602 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'voyager.lesson-plan-covers.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
        ),
