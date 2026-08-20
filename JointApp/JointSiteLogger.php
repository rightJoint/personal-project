<?php

namespace JointApp;


use Psr\Log\AbstractLogger;
use Psr\Log\LogLevel;


class JointSiteLogger extends AbstractLogger
{
    public $logger_context = ['test' => __CLASS__];

    private JointAppResponse $response;

    function __construct(JointAppResponse &$response)
    {
        $this->response = &$response;
    }

    public function withContext(array $logger_context)
    {
        $this->logger_context = $logger_context;
    }

    /**
     * @var HandlerInterface
     */

    public function log($level, string|\Stringable $message, array $context = array()):void
    {
        $levelToCode = function ($level) {
            $responseCodes = array(
                LogLevel::ERROR => 404,
                LogLevel::DEBUG =>  200,
                LogLevel::WARNING => 403,
                LogLevel::CRITICAL =>503,
                LogLevel::ALERT => 400,
                LogLevel::EMERGENCY => 400,
                LogLevel::NOTICE =>  200,
                LogLevel::INFO =>  200);
            return $responseCodes[$level];
        };

        if($levelToCode($level) != 200){
            $this->response = $this->response->withStatus($levelToCode($level), self::interpolate($message, $context));
        }

        $this->customLog($level, $message, $context, $levelToCode);
    }

    protected static function interpolate(string $message, array $context = []): string
    {
        $replace = [];
        foreach ($context as $key => $val) {
            if (is_string($val) || method_exists($val, '__toString')) {
                $replace['{' . $key . '}'] = $val;
            }
        }
        return strtr($message, $replace);
    }

    //redirect user when handle response
    public function redirect($location)
    {
        $this->response->redirect($location);
    }

    public function logTime(string $context = 'mct')
    {
        $this->response->stopwatch[] =  [$context => microtime(true)];
    }

    //extended log cause to save $context fields
    public function customLog(string $level, string $message, array $context, callable $levelToCode):void
    {

        foreach ($context as $key => $val){
            if(is_array($val)){
                $this->response->customLog[][$level] = '['.$levelToCode($level).'], thrown in '.$key.' with message "'.$message.'"'.
                    ' reason not available '.
                    'in response->customLog cause its array';
            }else{
                $this->response->customLog[][$level] = '['.$levelToCode($level).'], thrown in '.$key.': '.$val.
                    ' with message "'.$message.'"';
            }
        }
    }

    public function isRedirected():bool
    {
        if($this->response->redirect){
            return true;
        }
        return false;
    }
}