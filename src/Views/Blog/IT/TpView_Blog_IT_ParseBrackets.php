<?php


namespace Src\Views\Blog\IT;


use JointApp\Views\TpView;

class TpView_Blog_IT_ParseBrackets extends TpView
{
    public $css = ['code-snippet'=>'/css/code-snippet.css',
        'brackets'=>'/css/blog/parse-brackets.css'];

    public $js = ['test-ajax' => '/js/blog/testTasksAjax.js',];

    public array $bracketsSigns = array(
        'br_1' => array(
            'start' => '<',
            'end' => '>',
        ),
        'br_2' => array(
            'start' => '{',
            'end' => '}',
        ),
        'br_3' => array(
            'start' => '[',
            'end' => ']',
        ),
        'br_4' => array(
            'start' => '(',
            'end' => ')',
        ),
    );

    public string $testString = '';

    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\Blog\Articles\ParseBrackets\LangFiles_'.self::ucfirstLang($this->userLang).'_Views_B_A_ParseBrackets';
        return new $class_Name();
    }

    public function getResponseHtml(): string
    {
        $return = '<section>'.
            '<h3>Тест</h3>'.
            '<p>Введите выражение и нажмите Check! для проверки:</p>'.
            '<div class="brackets-test">'.
            '<form>'.
            '<div class="br-set">';
        foreach ($this->bracketsSigns as $brNum => $br){
            $return.= '<div class="br-i">'.
                '<label for="'.$brNum.'">'.$br['start'].$br['end'].'</label>'.
                '<input type="checkbox" id="'.$brNum.'" name="'.$brNum.'" checked>'.
                '</div>';
        }

        $return.='</div><div class="testString">'.
            '<textarea name="testString">'.$this->testString.'</textarea>'.
            '</div>';
        $rText = '';
        $rClass = '';
        if(self::checkBrackets($this->testString, $this->bracketsSigns)){
            $rText.='Ok '.date('H:i:s');
            $rClass = ' ok';
        }else{
            $rText.='fail '.date('H:i:s');;
            $rClass = ' fail';
        }
        $return.= '<div class="brackets-test-result'.$rClass.'">'.$rText.'</div>'.
            '<div>'.
            '<input type="button" onclick="checkBrackets()" value="Check!">'.
            '</div>'.
            '</form>'.
            '</div>'.
            '</section>';

        $return.= $this->parseBracketsPrinciples().
            $this->parseBracketsCode().
            $this->parseBracketsConclusion();


        return $return;
    }

    public static function checkBrackets(string $str, array $bracketsSigns):bool
    {
        $str= " ".$str;
        foreach($bracketsSigns as $brace){
            if($endPos=strpos($str, $brace['end'])){
                $tmpStr = substr($str, 0, $endPos)." ";
                if($startPos = strpos(strrev($tmpStr), $brace['start'])){
                    $restStr=substr($str, strlen($tmpStr)-$startPos, $endPos-strlen($tmpStr)+$startPos);
                    $glueStr=substr($str, 0, strlen($tmpStr)-$startPos-1).substr($str, $endPos+1, strlen($str));
                    if(self::checkBrackets($glueStr, $bracketsSigns)){
                        if(self::checkBrackets($restStr, $bracketsSigns)){
                            return true;
                        }else{
                            return false;
                        }
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }elseif($startPos=strpos($str, $brace['start'])){
                return false;
            }
        }
        return true;
    }

    private function parseBracketsPrinciples():string
    {
        return '<section>' .
            '<h3>Принцип работы функции</h3>' .
            '<p>В рекурсивную функцию checkBrackets передается массив символов обозначающих скобки $bracketsSigns</p>'.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>array(</li>'.
            '<li class="sp-1">"br_1" => array(</li>'.
            '<li class="sp-2">"start" => "<",</li>'.
            '<li class="sp-2">"end" => ">",</li>'.
            '<li class="sp-1">),</li>'.
            '<li class="sp-1">"br_2" => array(</li>'.
            '<li class="sp-2">"start" => "{",</li>'.
            '<li class="sp-2">"end" => "}",</li>'.
            '<li class="sp-1">),</li>'.
            '<li class="sp-1">"br_3" => array(</li>'.
            '<li class="sp-2">"start" => "[",</li>'.
            '<li class="sp-2">"end" => "]",</li>'.
            '<li class="sp-1">),</li>'.
            '<li class="sp-1">"br_4" => array(</li>'.
            '<li class="sp-2">"start" => "(",</li>'.
            '<li class="sp-2">"end" => ")",</li>'.
            '<li class="sp-1">),</li>'.
            '<li>);</li>'.
            '</ul>'.
            '</div>'.
            '<p>Что бы функция php strpos не вернула false, где надо, добавим пробел к строке и вычтем один символ с номера позиции.</p>'.
            '<ul>'.
            '<li>Считаем что если есть символ закрытой скобки в исходной строке $str, значит дожен быть символ и открытой скобки</li>'.
            '<li>Строка между скобками $restStr проверяется рекурсивно как и исходная строка</li>'.
            '<li>Строка, склеенная из остатков после вырезки из исходной $glueStr, проверяется рекурсивно как и исходная строка</li>'.
            '</ul>'.
            '</section>';
    }

    private function parseBracketsCode():string
    {
        return '<section>'.
            '<h3>php-код</h3>'.
            '<p>Скачать готовый пример на php можно здесь.</p>'.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>function checkBrackets($str, $bracketsSigns)</li>'.
            '<li>{</li>'.
            '<li class="sp-1">foreach($bracketsSigns as $brace){</li>'.
            '<li class="sp-2">if($endPos=strpos($str, $brace["end"])){</li>'.
            '<li class="sp-3">$tmpStr = substr($str, 0, $endPos)." ";</li>'.
            '<li class="sp-3">if($startPos = strpos(strrev($tmpStr), $brace["start"])){</li>'.
            '<li class="sp-4">$restStr=substr($str, strlen($tmpStr)-$startPos, $endPos-strlen($tmpStr)+$startPos);</li>'.
            '<li class="sp-4">$glueStr=substr($str, 0, strlen($tmpStr)-$startPos-1).substr($str, $endPos+1, strlen($str));</li>'.
            '<li class="sp-4">if(checkBrackets($glueStr, $bracketsSigns)){</li>'.
            '<li class="sp-5">if(checkBrackets($restStr, $bracketsSigns)){</li>'.
            '<li class="sp-6">return true;</li>'.
            '<li class="sp-5">}else{</li>'.
            '<li class="sp-6">return false;</li>'.
            '<li class="sp-5">}</li>'.
            '<li class="sp-4">}else{</li>'.
            '<li class="sp-5">return false;</li>'.
            '<li class="sp-4">}</li>'.
            '<li class="sp-3">}else{</li>'.
            '<li class="sp-4">return false;</li>'.
            '<li class="sp-3">}</li>'.
            '<li class="sp-2">}elseif($startPos=strpos($str, $brace["start"])){</li>'.
            '<li class="sp-3">return false;</li>'.
            '<li class="sp-2">}</li>'.
            '<li class="sp-1">}</li>'.
            '<li class="sp-1">return true;</li>'.
            '<li>};</li>'.
            '</ul>'.
            '</div>'.
            '</section>';
    }

    private function parseBracketsConclusion():string
    {
        return '<section>'.
            '<h3>Выводы</h3>'.
            '<p>'.
            'Правильное решение тестового задания не гарантирует что бы будете приняты на предложенную вакансию. '.
            'Никогда не решайте объемных заданий, решайте только те что не составят вам труда или буду полезны лично вам.'.
            '</p>'.
            '</section>';
    }
}