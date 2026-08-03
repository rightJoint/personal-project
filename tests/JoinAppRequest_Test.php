<?php
//php ./vendor/bin/phpunit tests/JoinAppRequest_Test.php


use JointFramework\Http\Uri;
use JointFramework\Http\ServerRequestFactory;
use JointApp\JointSite;

class JoinAppRequest_Test extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {

    }

    public function testLangDetector():void
    {
        $server['REQUEST_SCHEME'] = 'http';
        $server['SERVER_NAME'] = 'personal-project.web';
        $server['SERVER_PORT'] = '80';

        $server['REQUEST_METHOD'] = 'GET';
        $server['REQUEST_METHOD'] = 'GET';

        $factory = new ServerRequestFactory();

        //fix no query case
        $server['REQUEST_URI'] = '/ru/test/request/adapter';
        $uri = new Uri($server['REQUEST_SCHEME'].'://'.$server['SERVER_NAME'].':'.$server['SERVER_PORT'].$server['REQUEST_URI']);
        $request = $factory->createServerRequest($server['REQUEST_METHOD'], $uri, $server);
        $jointApp_request = JointSite::requestAdapter($request);
        $expected = array(
            'uri_lpq' => '/ru/test/request/adapter',
            'uri_pq' => '/test/request/adapter',
            'routes' => ['', 'ru', 'test', 'request', 'adapter'],
            'routes_ns' => ['', 'test', 'request', 'adapter'],
            'userLang' => 'ru',
            'langSl' => '/ru',
            'canonical' => '',

        );
        $this->assertEquals($jointApp_request->uri_lpq, $expected['uri_lpq']);
        $this->assertEquals($jointApp_request->uri_pq, $expected['uri_pq']);
        $this->assertEquals($jointApp_request->routes, $expected['routes']);
        $this->assertEquals($jointApp_request->routes_ns, $expected['routes_ns']);
        $this->assertEquals($jointApp_request->langSl, $expected['langSl']);
        $this->assertEquals($jointApp_request->canonical, $expected['canonical']);

        //ru lang
        $server['REQUEST_URI'] = '/ru/test/request/adapter?lang=ru&canonical=false';
        $uri = new Uri($server['REQUEST_SCHEME'].'://'.$server['SERVER_NAME'].':'.$server['SERVER_PORT'].$server['REQUEST_URI']);
        $request = $factory->createServerRequest($server['REQUEST_METHOD'], $uri, $server);
        $jointApp_request = JointSite::requestAdapter($request);
        $expected = array(
            'uri_lpq' => '/ru/test/request/adapter?lang=ru&canonical=false',
            'uri_pq' => '/test/request/adapter?lang=ru&canonical=false',
            'routes' => ['', 'ru', 'test', 'request', 'adapter'],
            'routes_ns' => ['', 'test', 'request', 'adapter'],
            'userLang' => 'ru',
            'langSl' => '/ru',
            'canonical' => '',

        );
        $this->assertEquals($jointApp_request->uri_lpq, $expected['uri_lpq']);
        $this->assertEquals($jointApp_request->uri_pq, $expected['uri_pq']);
        $this->assertEquals($jointApp_request->routes, $expected['routes']);
        $this->assertEquals($jointApp_request->routes_ns, $expected['routes_ns']);
        $this->assertEquals($jointApp_request->langSl, $expected['langSl']);
        $this->assertEquals($jointApp_request->canonical, $expected['canonical']);

        //en lang
        $server['REQUEST_URI'] = '/en/test/request/adapter?lang=ru&canonical=false';
        $uri = new Uri($server['REQUEST_SCHEME'].'://'.$server['SERVER_NAME'].':'.$server['SERVER_PORT'].$server['REQUEST_URI']);
        $request = $factory->createServerRequest($server['REQUEST_METHOD'], $uri, $server);
        $jointApp_request = JointSite::requestAdapter($request);
        $expected = array(
            'uri_lpq' => '/en/test/request/adapter?lang=ru&canonical=false',
            'uri_pq' => '/test/request/adapter?lang=ru&canonical=false',
            'routes' => ['', 'en', 'test', 'request', 'adapter'],
            'routes_ns' => ['', 'test', 'request', 'adapter'],
            'userLang' => 'en',
            'langSl' => '/en',
            'canonical' => '',

        );
        $this->assertEquals($jointApp_request->uri_lpq, $expected['uri_lpq']);
        $this->assertEquals($jointApp_request->uri_pq, $expected['uri_pq']);
        $this->assertEquals($jointApp_request->routes, $expected['routes']);
        $this->assertEquals($jointApp_request->routes_ns, $expected['routes_ns']);
        $this->assertEquals($jointApp_request->langSl, $expected['langSl']);
        $this->assertEquals($jointApp_request->canonical, $expected['canonical']);

        //default lang
        $server['REQUEST_URI'] = '/test/request/adapter?lang=ru&canonical=false';
        $uri = new Uri($server['REQUEST_SCHEME'].'://'.$server['SERVER_NAME'].':'.$server['SERVER_PORT'].$server['REQUEST_URI']);
        $request = $factory->createServerRequest($server['REQUEST_METHOD'], $uri, $server);
        $jointApp_request = JointSite::requestAdapter($request);
        $expected = array(
            'uri_lpq' => '/test/request/adapter?lang=ru&canonical=false',
            'uri_pq' => '/test/request/adapter?lang=ru&canonical=false',
            'routes' => ['', 'test', 'request', 'adapter'],
            'routes_ns' => ['', 'test', 'request', 'adapter'],
            'userLang' => 'ru',
            'langSl' => '',
            'canonical' => '/ru/test/request/adapter',

        );
        $this->assertEquals($jointApp_request->uri_lpq, $expected['uri_lpq']);
        $this->assertEquals($jointApp_request->uri_pq, $expected['uri_pq']);
        $this->assertEquals($jointApp_request->routes, $expected['routes']);
        $this->assertEquals($jointApp_request->routes_ns, $expected['routes_ns']);
        $this->assertEquals($jointApp_request->langSl, $expected['langSl']);
        $this->assertEquals($jointApp_request->canonical, $expected['canonical']);


    }
}