<?php

namespace JointApp;


use JointApp\Factories\FromRequestFactory;
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
    private JointAppResponse $appResponse;
    private JointSiteRoute $route;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->Run(self::requestAdapter($request));
    }

    public function Run(ServerRequestInterface $request):ResponseInterface
    {
        $this->request = $request;

        //create response
        $this->appResponse = new JointAppResponse();

        //set app logger
        $this->logger = new JointSiteLogger();
        $this->logger->withContext($this->context);
        $this->logger->jointAppResponse = &$this->appResponse;
        $this->logger->logStartTime($this->context);

        //set up route finder
        $routeFinder = new JointSiteRouteFinder();
        $routeFinder->setLogger($this->logger);
        $routeFinder->method = $request->getMethod();
        $routeFinder->routes_ns = $request->routes_ns;

        //get route context (model, view, controller & actions list, response format)
        $this->route = $routeFinder->findRoute();

        //check router errors
        if($this->appResponse->getStatusCode() == 200){
            $view = $this->execActions();

            //check controller action errors
            if($this->appResponse->getStatusCode() == 200) {
                //web-pages
                if ($this->route->responseFormat == 'text') {
                    //check redirect
                    if(!$this->appResponse->redirect){
                        $view->setUpLangFiles();
                        $view->setUpJs();
                        $view->setUpCss();
                        $view->updateTpData();
                        $this->appResponse->responseText = $view->mkWebPage();
                    }
                }
                //json, api or ajax
                else {
                    $this->appResponse->responseJson = $view->getResponseJson();
                }
            }

        }
        $this->logger->logEndTime($this->context);

        return $this->appResponse;
    }

    private function execActions()
    {
        $this->route->modelName = 'JointApp\Models\Model_pdo';
        //set up model
        $model = FromRequestFactory::ObjectFromRequest($this->route->modelName, $this->request);
        $model->setUpLangFile();
        $model->setLogger($this->logger);

        //set up view
        $view_tmp = FromRequestFactory::ObjectFromRequest($this->route->viewName, $this->request);

        //set up controller
        $controller = FromRequestFactory::ObjectFromRequest($this->route->controllerName, $this->request);
        $controller->model = $model;
        $controller->view = $view_tmp;

        //check construct errors
        if($this->appResponse->getStatusCode() == 200) {
            foreach ($this->route->actionsList as $actionName => $actionParams) {
                //check actions errors
                if ($this->appResponse->getStatusCode() == 200) {
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

    public static function handleResponse(JointAppRequest $jointSiteRequest, JointAppResponse $jointAppResponse):void
    {
        $logger = new JointSiteLogger();
        if($jointAppResponse->getStatusCode() != 200){

            http_response_code($jointAppResponse->getStatusCode());

            if($jointAppResponse->responseFormat == 'text'){
                self::displayErr($jointSiteRequest, $jointAppResponse);
            }else{
                header('Content-type: application/json; charset=utf-8');
                echo json_encode(array('result' =>false,
                    'log' => $jointAppResponse->getStatusCode().':'.$jointAppResponse->getReasonPhrase(),
                    'timestamp' => array('now' => date('Y-m-d H:i:s'),
                        'runTime:'=> $logger->calcRunTime())));
            }
        }else{
            if($jointAppResponse->redirect){
                header('Location: '.$jointAppResponse->redirect[0]);
            }
            elseif($jointAppResponse->responseFormat == 'text'){
                echo $jointAppResponse->responseText.
                    '<script>$("body").after("<span style=\'color: silver; position: relative; bottom: 1.2em; left: 0,5em; '.
                    ' display: block; height:0; width:0; font-size:0.7em;\'>'.$jointAppResponse->calcRuntime().'</span>")</script>';
            }elseif($jointAppResponse->responseFormat == 'json'){
                header('Content-type: application/json; charset=utf-8');
                echo json_encode(
                    array(
                        'result' => true,
                        'viewData' => $jointAppResponse->responseJson,
                        'timeStamp' => array(
                            'now' => date('Y-m-d H:i:s'),
                            'runTime' => $logger->calcRunTime(),
                        )
                    )
                );
            }
        }
    }

    public static function displayErr(JointAppRequest $request, JointAppResponse $jointAppResponse)
    {
        $view = FromRequestFactory::ObjectFromRequest('JointApp\Views\ErrorsView', $request);

        if($jointAppResponse->getStatusCode() == 403){
            $view->modalUserActive = true;
        }
        $view->response_status_code = $jointAppResponse->getStatusCode();
        $view->app_custom_log = $jointAppResponse->customLog;

        $view->setUpLangFiles();
        $view->setUpJs();
        $view->setUpCss();
        $view->updateTpData();
        echo $view->mkWebPage();
    }
}