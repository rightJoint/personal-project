<?php

namespace JointApp;


use Psr\Log\AbstractLogger;
use Psr\Log\LogLevel;


class JointSiteLogger extends AbstractLogger
{
    public $logger_context = ['test' => __CLASS__];

    public JointAppResponse $jointAppResponse;

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
            $this->jointAppResponse = $this->jointAppResponse->withStatus($levelToCode($level), self::interpolate($message, $context));
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
        $this->jointAppResponse->redirect($location);
    }

    public function logStartTime($context = null)
    {
        if(empty($context)){
            $logContext = key($this->logger_context);
        }else{
            $logContext = key($this->logger_context);
        }
        $this->jointAppResponse->stopwatch[] = [$logContext => ['start' => microtime(true)]];
    }

    public function logEndTime($context = null)
    {
        if(empty($context)){
            $logContext = key($this->logger_context);;
        }else{
            $logContext = key($context);
        }

        $this->jointAppResponse->stopwatch[] = [$logContext => ['end' => microtime(true)]];
    }

    //extended log cause to save $context fields
    public function customLog(string $level, string $message, array $context, callable $levelToCode):void
    {

        foreach ($context as $key => $val){
            if(is_array($val)){
                $this->jointAppResponse->customLog[][$level] = '['.$levelToCode($level).'], thrown in '.$key.' with message "'.$message.'"'.
                    ' reason not available '.
                    'in JointAppResponse->customLog cause its array';
            }else{
                $this->jointAppResponse->customLog[][$level] = '['.$levelToCode($level).'], thrown in '.$key.': '.$val.
                    ' with message "'.$message.'"';
            }
        }
    }
}