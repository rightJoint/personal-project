<?php


namespace Src\Views\Blog\Pets;


use JointApp\Views\TpView;

class TpView_Blog_Pets_BlondKitty11Y extends TpView
{
    public $css = ['pets-gallery' => '/css/blog/articles/pets-gallery.css'];

    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\Blog\Articles\Pets\LangFiles_'.self::ucfirstLang($this->userLang).'_V_B_A_P_BlondKitty11Y';
        return new $class_Name();
    }

    public function getResponseHtml(): string
    {
        return '<p>'.
            'Эту кошку мне отдали во дворе малосемейки, туда часто подкидывают животных, которые больше не нужны, и одна '.
            'женшина ее приютила на время. Не представляю, кто бы мог выбросить такую красотку.'.
            '</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-02.jpg">'.
            '</div>'.
            '<p class="pet-gallery">'.
            'Когда я ее взял, она уже не была совсем котенком, кажется ей было около года.'.
            '</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-03.jpg">'.
            '</div>'.
            '<p class="pet-gallery">'.
            'Кошка не была совсем домашней, и первое время часто просилась на улицу и даже выпрыгивала с балкона 5го этажа.'.
            '</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-04.jpg">'.
            '</div>'.
            '<p class="pet-gallery">'.
            'На ней были блохи и ушной клещ. Помогли ошеник от блох, мытье и капли.'.
            '</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-05.jpg">'.
            '</div>'.
            '<p class="pet-gallery">'.
            'Она не срелизованая и я ни разу за все время не носил ее к ветеринару.'.
            '</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-06.jpg">'.
            '</div>'.
            '<p class="pet-gallery">'.
            'Последние несколько лет она совсем не выходит на улицу. Ей не надо много, она встречает меня у двери '.
            'и иногда играет с шиншиллой.'.
            '</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-07.jpg">'.
            '</div>'.
            '<p class="pet-gallery">'.
            'У меня не очень хорошо получается придумывать клички животным. Сначала я звал ее лапкой, теперь я '.
            'зову ее дрянью. Ни на ту, ни на другую она не отзывается.'.
            '</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-08.jpg">'.
            '</div>'.
            '<p class="pet-gallery">'.
            'Маленькая белая дрянь.'.
            '</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-09.jpg">'.
            '</div>'.
            '<p class="pet-gallery">'.
            'Она всегда спит со мной, обычно ложиться в ноги.'.
            '</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-10.jpg">'.
            '</div>'.
            '<p class="pet-gallery">'.
            'Дрянюсика абсолютно белая, без единого цветного пятна или полоски.'.
            '</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-11.jpg">'.
            '</div>'.
            '<p class="pet-gallery">'.
            'Чаще всего она спит, но иногда ностится по комнате как сумашедшая.'.
            '</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-12.jpg">'.
            '</div>'.
            '<p class="pet-gallery">'.
            'Она не переедает. В среднем ей хватает пакета 85г. консервированного корма и немного сухого на день. '.
            'Иногда я даю ей мяса, куриную грудку или говядину.'.
            '</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-13.jpg">'.
            '</div>'.
            '<p class="pet-gallery">'.
            'Кошка довольно ревнивая. Ей не нравится когда не один и она начинает требовать внимания.'.
            '</p>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-14.jpg">'.
            '</div>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-15.jpg">'.
            '</div>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-16.jpg">'.
            '</div>'.
            '<div class="pet-img">'.
            '<img src="/img/blog/blond-cat-11y/img-01.jpg">'.
            '</div>';
    }
}