<?php

namespace JointApp;


use JointApp\Factories\ControllerFactory;
use JointApp\Factories\FromRequestFactory;
use JointApp\Factories\ModelFactory;
use JointApp\Interfaces\SiteViewInterface;
use JointApp\Router\JointSiteRoute;
use JointApp\Router\JointSiteRouteFinder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Log\LoggerAwareTrait;


class JointSite implements RequestHandlerInterface
{

    use LoggerAwareTrait;

    private $context = ['App' => __CLASS__];

    private JointAppRequest $request;
    public JointAppResponse $response;
    private JointSiteRoute $route;
    private JointSiteUser $user;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->Run(self::requestAdapter($request));
    }

    public function Run(ServerRequestInterface $request):ResponseInterface
    {
        $this->request = $request;

        //create response
        $this->response = new JointAppResponse();

        //set app logger
        $this->logger = new JointSiteLogger($this->response);
        $this->logger->withContext($this->context);
        $this->logger->logTime('App start');

        //set up user
        $this->user = new JointSiteUser($this->logger, $this->request->userLang);
        $this->user->fromSession();

        //set up route finder
        $routeFinder = new JointSiteRouteFinder();
        $routeFinder->setLogger($this->logger);
        $routeFinder->method = $request->getMethod();
        $routeFinder->routes_ns = $request->routes_ns;

        //get route context (model, view, controller & actions list, response format)
        $this->route = $routeFinder->findRoute();
        $this->response->responseFormat = $this->route->responseFormat;

        //check router errors
        if($this->response->getStatusCode() == 200){
            $view = $this->execActions();

            //check controller action errors
            if($this->response->getStatusCode() == 200) {
                //web-pages, with action updateViewParams
                if ($this->route->responseFormat == 'text') {
                    //check redirect
                    if(!$this->response->redirect){
                        $view->handleViewParams();
                        $view->setUpCustomLang($view->getDefaultLang());
                        $this->response->responseText = $view->getResponseHtml();
                    }
                }
                //json, api or ajax, with action updateResponseJson
                else {
                    $this->response->responseJson = $view->getResponseJson();
                }
            }
        }
        $this->logger->logTime('App end');

        return $this->response;
    }

    private function execActions():SiteViewInterface
    {
        //set up model
        $model = ModelFactory::ModelFromRequest($this->route->modelName, $this->request, $this->user,
            $this->logger, $this->route->modelParams);

        //set up view
        $view_tmp = FromRequestFactory::ObjectFromRequest(new $this->route->viewName(), $this->request);

        //set up controller
        $controller = ControllerFactory::ControllerFromRequest($this->route->controllerName, $this->request,
            $this->user, $this->logger, $this->route->controllerParams);
        $controller->model = $model;
        $controller->view = $view_tmp;

        //check construct errors
        foreach ($this->route->actionsList as $actionName => $actionParams) {
            //check actions errors
            if ($this->response->getStatusCode() == 200) {
                //stop doing actions if already redirected
                if(!$this->logger->isRedirected()){
                    $controller->$actionName($actionParams);
                }
            }
        }

        //because controller can replace $view_tmp
        $newView = $controller->view;

        return $newView;
    }

    public static function requestAdapter(ServerRequestInterface $request):ServerRequestInterface
    {

        $jointAppRequest = new JointAppRequest($request->getMethod(), $request->getUri(), [], null, '1.1', $request->getServerParams());
        $jointAppRequest = $jointAppRequest
            ->withQueryParams($request->getQueryParams())
            ->withParsedBody($request->getParsedBody())
            ->withCookieParams($request->getCookieParams());

        return $jointAppRequest;
    }

    public static function handleResponse(JointAppRequest $jointSiteRequest, JointAppResponse &$response):void
    {
        if($response->getStatusCode() != 200){
            if($response->responseFormat == 'text'){
                self::displayErr($jointSiteRequest, $response);
            }else{
                header('Content-type: application/json; charset=utf-8');
                echo json_encode(array('result' =>false,
                    'log' => $response->getStatusCode().':'.$response->getReasonPhrase(),
                    'timestamp' => array('now' => date('Y-m-d H:i:s'),
                        'runTime:'=> $response->calcRunTime())));
            }
        }else{
            if($response->redirect){
                header('Location: '.$response->redirect[0]);
            }
            elseif($response->responseFormat == 'text'){
                echo $response->responseText.
                    '<script>$("body").after("<span style=\'color: silver; position: relative; bottom: 1.2em; left: 0,5em; '.
                    ' display: block; height:0; width:0; font-size:0.7em;\'>'.$response->calcRuntime().'</span>")</script>';
            }elseif($response->responseFormat == 'json'){
                header('Content-type: application/json; charset=utf-8');
                echo json_encode(
                    array(
                        'result' => true,
                        'viewData' => $response->responseJson,
                        'timeStamp' => array(
                            'now' => date('Y-m-d H:i:s'),
                            'runTime' => $response->calcRunTime(),
                        )
                    )
                );
            }
        }
    }

    public static function displayErr(JointAppRequest $request, JointAppResponse $response)
    {
        $namespace = 'JointApp\Views\ErrorsView';
        $view = FromRequestFactory::ObjectFromRequest(new $namespace(), $request);

        if($response->getStatusCode() == 403){
            $view->modalUserActive = true;
        }

        $view->response_status_code = $response->getStatusCode();
        $view->app_custom_log = $response->customLog;

        $view->handleViewParams();
        $view->setUpCustomLang($view->getDefaultLang());
        echo $view->getResponseHtml();
    }
}