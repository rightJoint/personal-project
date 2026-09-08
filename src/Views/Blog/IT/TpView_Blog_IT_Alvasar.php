<?php


namespace Src\Views\Blog\IT;


use JointApp\Views\TpView;

class TpView_Blog_IT_Alvasar extends TpView
{
    public string $fio = 'Шишкова Ирина Валентиновна';
    public string $birthday = '1964-05-13';

    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\Blog\Articles\Alvasar\LangFiles_'.self::ucfirstLang($this->userLang).'_Views_B_A_Alvasar';
        return new $class_Name();
    }

    public function getResponseHtml(): string
    {
        return $this->alvasarTask().
            $this->alvasarTest().
            $this->alvasarCode().
            $this->alvasarConclusion();;
    }

    public function alvasarTask():string
    {
        return '<section>'.
            '<h3>Постановка задачи</h3>'.
            '<p>Пользователь вводит свои ФИО и дату рождения, на выходе получает код судьбы. '.
            'Методика расчета кода дана в описании задачи <a href="/downloads/TestTaskAlvasar.docx" download>TestTaskAlvasar.docx</a>'.
            '</p>'.
            '</section>';
    }

    public function alvasarTest():string
    {
        $return = '<section>'.
            '<h3>Тест</h3>'.
            '<p>Введите ваши Фамилию, Имя, отчество, дату рождения и нажмите "получить код!":</p>'.
            '<div class="alvasar-test">'.
            '<form>'.
            '<div class="alvasar-input-line">'.
            '<label for="fio">ФИО</label>'.
            '<input type="text" id="fio" name="fio" placeholder="Ваше Фамилия Имя Отчество" value="'.$this->fio.'">'.
            '<p><small>Допускаются только русские буквы.</small></p>'.
            '</div>'.
            '<div class="alvasar-input-line">'.
            '<label for="birthday">Д.р.</label>'.
            '<input type="date" id="birthday" name="birthday" value="'.$this->birthday.'">'.
            '</div>';

        $birthday_date = new \DateTime($this->birthday);
        $birthday_trim = date_format($birthday_date, 'd.m.Y');
        $birthday_trim = str_replace('.', '', $birthday_trim);

        $alvasarCode = @AlvasarCode::calcCode($birthday_trim, $this->fio);

        $return.= '<div>'.
            '<input type="button" onclick="calcAlvasarCode()" value="Получить код!">'.
            '</div>'.
            '<div class="alvasar-code-result">'.
            '<span class="code-label">ИТОГОВЫЙ  ЦИФРОВОЙ КОД</span>'.
            '<span class="code-value">'.$alvasarCode.'</span>'.
            '</div>'.
            '</form>'.
            '</div>'.
            '</section>';
        return $return;
    }

    public function alvasarCode():string
    {
        $return = '<section>'.
            '<h3>php-код</h3>'.
            '<p>В коде использовалось много рекурсий, все методы реализованы в одном классе, '.
            '<a href="/downloads/AlvasarCode.php.txt">скачать AlvasarCode.php.txt</a></p>'.
            '</section>';
        return $return;
    }

    public function alvasarConclusion():string
    {
        $return = '<section>'.
            '<h3>Выводы</h3>'.
            '<p>'.
            'Хотя реальных причин срыва контракта мне не назвали, '.
            'я считаю что получил бонус в виде кармы) Не связываться с магами, гадалками, '.
            'менталистами, колдунами, цыганями - походу это не про меня.</p>'.
            '</section>';
        return $return;
    }
}