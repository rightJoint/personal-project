<?php


namespace Src\Views\Blog\Job;


use JointApp\Views\TpView;

class TpView_Blog_Job_LastEngineerJob extends TpView
{
    public $css=['engineer-job' => '/css/blog/articles/engineer-job.css',];
    public $js=['engineer-job' => '/js/blog/articles/engineer-job.js',];

    public function getResponseHtml(): string
    {
        return
            '<section>'.
            '<p>'.
            'Прескверный анекдотец произошел со мной на одном из прошлых мест работы. Сейчас расскажу про три случая. '.
            'Последний, мне кажется, вообще перебор.'.
            '</p>'.
            '</section>'.
            '<section>'.
            '<h3>Анекдот №1</h3>'.
            '<p class="quote">Сделать нормально «Из говна и палок» не получится.'.
            '<span class="law">- инженер</span>'.
            '</p>'.
            '<div class="art-video">'.
            '<video style="height: 20em; width: auto;" controls="controls" poster="/userdata/blog/engineer-job/poster-1.jpg">'.
            '<source src="/userdata/blog/engineer-job/anecdote-1.mp4">'.
            'Тег video не поддерживается вашим браузером.'.
            '<a href="/userdata/blog/engineer-job/anecdote-1.mp4">Скачайте видео</a>'.
            '</video>'.
            '</div>'.
            '<div class="art-dialog">'.
            '<span class="show-dialog">скрипт</span>'.
            '<ul style="display: none">'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Там видеокамера/датчик перестал работать, сходи разберись, это твоя работа, тебе за это деньги платят'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Ок, сейчас посмотрим в чем там дело'.
            '</li>'.
            '<p>'.
            'Открываю шкаф, на меня вываливается груда проводов, ни один не додписан'.
            '</p>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Здесь надо практически полностью монтаж шкафа переделывать'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Зачем тебе монтаж переделывать, ты что прикалываешься. Там же все просто, или есть контакт или его нет. '.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'У нас прошлый Вася сходил, там что-то пошевилил, и все заработало. Зачем тебе время тратить на монтажи, '.
            'других задач полно.'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/idea.jpg">'.
            'Еб.т мозги, работать не хочет.'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Объясняю, по правилам кабели и аппаратура должны быть подписаны, все концы вызвонены, провода '.
            'уложены в короба, короба закрыты.'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Какие ещё правила.'.
            'Ну значит ты не такой, как Вася у нас был, он там без всяких правил все делал'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Так может отказы постоянно происходят, из-за того что сделано не по правилам... '.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/idea.jpg">'.
            'Да, нам бы такого как Вася.'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Ну давай прожмем разъемы, пошевелим )))'.
            '</li>'.
            '<p>'.
            'Пошевелили, заработало.'.
            '</p>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/idea.jpg">'.
            'Я же тебе говорил что там все просто, хули ты мне мозги еб...л.'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Да, это заработало, другое отвалилось.'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/idea.jpg">'.
            'Ну значит надо в другом месте пошевелить, и все заработает'.
            '</li>'.
            '<p>'.
            'Пошевелили, заработало.'.
            '</p>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/idea.jpg">'.
            'Ну вот, а ты монтаж шкафа, че-то подписывать.'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Не знаю на долго ли, гарантии никакой не даю.'.
            '</li>'.
            '<p>'.
            'На следующий день на планерке: '.
            '</p>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Че там опять не работает, ты же уже ходил туда, там что-то делал. Долго ли это будет продолжаться?'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Говорил же, монтаж шкафа надо в порядок приводить. Так без гарантии.'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Надо - делай. Сколько тебе времени на это надо, пару часов надеюсь хватит?'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Пара часов это минимум только на подготовку. Надо всё проверить, сначала бирки напечатать'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Какие бирки, первый раз слышу. У нас тут никто бирки не печатает.'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Объясняю же: по правилам все кабели и аппаратура, клеммники должны быть промаркированы.'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Че ты там, три провода не запомнишь как соединяются? Не смеши...'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/idea.jpg">'.
            'Еб.т мозги, работать не хочет.'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Там не три провода а больше'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Ну пять. Запиши себе в блокнотик'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Там не пять, а пятдесят'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Ну тебе же невсе надо переделывать?'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Переделывать придется все, выборочно не получится. Надо все кабели аккуратно подрезать, выравнивать и укладывать.'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'И что, если напечатаешь, больше такого не будет.'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Надеюсь, если привести в порядок монтаж, сделать все по правилам, то почему это должно быть'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Ладно, делай'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/idea.jpg">'.
            'Только пусть бирки делает в нерабочее время, придет пораньше и напечатает, это же ему нужно. А том мы будем '.
            'этот шкаф месяц делать.'.
            '</li>'.
            '<p>'.
            'На следующий день.'.
            '</p>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Ну что, бирки напечатал, сегодня надеюсь закончишь?'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Да, бирки готовы. Стяжек и разъемов нет на складе. Не с чем делать.'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Нет стяжек, ты проволочкой смотай, или изолентой. Ты инженер, почему я тебя учить должен?'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Я инженер, по-этому и говорю как надо делать. Проволочкой смотаешь, все расползотеся, опять переделывать '.
            'придется. Нет смысла быдло-монтаж делать, надо по-нормальному.'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/idea.jpg">'.
            'А ты сделай пока на проволочке, а потом переделаешь. Какие проблемы.'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Получается тройная работа. Сначала проволочки по помойкам икать, потом все это собирать, потом '.
            'снова разбирать и заново собирать.'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Ладно ждем стяжеки и разъемы.'.
            '</li>'.
            '<p>'.
            'Через пару недель: '.
            '</p>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'На складе скали стяжки и разъемы приехали. Сегодня монтаж шкафа закончишь.'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Постараюсь. Сейчас начнем, а там как пойдет. Может еще какие проблемы вылезут.'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Что тебе для этого еще надо?'.
            '</li>'.
            '<p>Ну наконец-то до него дошло.</p>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Привлечем электрика, пусть розетку дополнительно установит. И мне человека в помошь, принести-подать.'.
            '</li>'.
            '<p>'.
            'Ну вроде все готово. Монтаж зверешен, проблем больше не возникало.'.
            '</p>'.
            '</ul>'.
            '</div>'.
            '</section>'.

            '<section>'.
            '<h3>Анекдот №2</h3>'.
            '<p class="quote">«People this, bitch»'.
            '<span class="law">- Полотенчик (южный парк)</span>'.
            '</p>'.
            '<div class="art-video">'.
            '<video style="height: 20em; width: auto;" controls="controls" poster="/userdata/blog/engineer-job/poster-2.jpg">'.
            '<source src="/userdata/blog/engineer-job/anecdote-2.mp4">'.
            'Тег video не поддерживается вашим браузером.'.
            '<a href="/userdata/blog/engineer-job/anecdote-2.mp4">Скачайте видео</a>'.
            '</video>'.
            '</div>'.
            '<div class="art-dialog">'.
            '<span class="show-dialog">скрипт</span>'.
            '<ul style="display: none">'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Камеры по периметру не работают, давай включать их тоже.'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Так они за все время что я здесь работаю ни разу не были включены.'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'И что, не надо делать что ли?'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Как скажете. Но там надо втроем делать.'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Ты что, издеваешься. Зачем тебе втроем. Может всю бригаду туда пригоним)))'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/idea.jpg">'.
            'Еб.т мозги, работать не хочет.'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Камеры на фонарях, регистраторы метрах в 300 от камер. Нужно с кем-то по телефону, чтоб один человек '.
            'был у видеокамеры, другой у видеорегистратора.'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Меня же ваши ТБ-шники и оштрафуют за то что я один с лестницы работал'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'А третий тебе зачем.'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Ну я же говорю, с лестницы залезать на фонарь, зымыкать провода. Другой человек на телефоне, третий у регистраторов.'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/idea.jpg">'.
            'Ебет мозги, работать не хочет. У нас Вася был, он один там все делал.'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Тебе за это деньги платят, почему мы еще должны кого-то привлекать?'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Ну так я не обезьяна чтоб одной рукой на телефон держать, другой провода замыкать и хвостом на фонаре висеть.'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Попросишь охранников, они парни хорошие, никогда не отказывали'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Я охраннику должен объяснять как кабель вызванивать...'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Если один из них в обход уйдет, а другой со мной будет, я если '.
            'вдруг в это же время директор приедет, кто ему ворота откроет.'.
            '</li>'.
            '<p>'.
            'Забили... Жили без камер два года, еще столько же проживут.'.
            '</p>'.
            '</ul>'.
            '</div>'.
            '</section>'.

            '<section>'.
            '<h3>Анекдот №3</h3>'.
            '<p class="quote">«Это дело не годится, раздвигайка ягодицы»'.
            '<span class="law">- с моего старого района</span>'.
            '</p>'.
            '<p>'.
            'Я люблю хорошие шутки, но мне кажется, что это уже совсем чернуха.'.
            '</p>'.
            '<div class="art-video">'.
            '<video style="height: 20em; width: auto;" controls="controls" poster="/userdata/blog/engineer-job/poster-3.jpg">'.
            '<source src="/userdata/blog/engineer-job/anecdote-3.mp4">'.
            'Тег video не поддерживается вашим браузером.'.
            '<a href="/userdata/blog/engineer-job/anecdote-3.mp4">Скачайте видео</a>'.
            '</video>'.
            '</div>'.
            '<div class="art-dialog">'.
            '<span class="show-dialog">скрипт</span>'.
            '<ul style="display: none">'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Там вентиляция в отказе, сходи разберись, тебе за это деньги платят.'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Хорошо, сейчас посмотрим...'.
            '</li>'.
            '<p>'.
            'Прихожу, открываю шкаф, контроллер управления системой отказал, похоже умер совсем.'.
            '</p>'.
            '<li>'.
            '- Снял аппаратуру, передал другому отделу в ремонт'.
            '</li>'.
            '<li>'.
            '- Обеспечиваю возможность работы без аппаратуры, перевожу управление двигателями на ручной режим'.
            '</li>'.
            '<li>'.
            '- Устанавливаю перемычки чтоб удерживать заслонки в открытом состоянии'.
            '</li>'.
            '</p>'.
            '<p>'.
            'Проходит две недели, нет ответа из ремонта. Звоню туда, не берут трубку.'.
            '</p>'.
            '<ul>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Не берут трубку, позвони еще раз.'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Звонил вчера три раза. Давайте напишим служебку в ЭДО.'.
            '</li>'.
            '<p>'.
            'Написали. Проходит еще месяц, ответа нет'.
            '</p>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Че там с вентиляцией, когда готово будет?'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Аппаратура в ремонте. Вы сказали передать в этот отдел, я это сделал, служебка написана.'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Позвони еще раз.'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Звонил, не берет трубку.'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Значит позвони еще раз, кому задача поставлена. Ты должен добиваться'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Я не понял. Вы дали мне его номер, я ему позвонил. Я свою задачу выполнил.'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Ну человек может быть занят, заболел, у него другие приоритеты. '.
            'Откуда я знаю почему он трубку не берет. Ничего личного.'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Если это его обязанность на мои звонки отвечать, то к нему и претензии. Я со своей стороны '.
            'свои обязанности выполнил.'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Нет, тебе задачу поставили, добивайся как хочешь.'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Я не понял, как??? Его я должен добиваться??? '.
            'Это типа как, ты что, не мужик что ли, должен добиваться.'.
            '</li>'.
            '<li>'.
            '- <img src="/userdata/blog/engineer-job/idea.jpg">'.
            'Мы все здесь такие, значит и ты такой же.'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Какой такой же. Будьте кем хотите, но других то к садомии зачем склонять.'.
            '</li>'.
            '<li class="engineer">'.
            '- <img src="/userdata/blog/engineer-job/engineer.png">'.
            'Ду ну вас нах...й, пидоры. С меня довольно, я ухожу.'.
            '</li>'.
            '<p>'.
            'Не стану прямо утвержать что там заднеприводные, за этими грязными делами я их не застал, '.
            'но судя по тому как они себя там веду, не исключено и такое.'.
            '</p>'.
            '</ul>'.
            '</div>'.
            '</section>'.
            '<section>'.
            '<h3>Выводы:</h3>'.
            '<p>'.
            'Теперь оказывается что просто вести себя со всеми вежливо на работе и ответственно относиться к '.
            'своим обязанностям, этого недостаточно. Теперь еще надо пид...ров щекастых добиваться и самому быть '.
            'заднеприводным, как они.'.
            '</p>'.
            '</section>';
    }

    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\Blog\Articles\PhpJob\LangFiles_'.self::ucfirstLang($this->userLang).'_Views_B_A_LastEngineerJob';
        return new $class_Name();
    }
}