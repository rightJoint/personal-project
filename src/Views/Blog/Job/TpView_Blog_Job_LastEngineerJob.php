<?php


namespace Src\Views\Blog\Job;


use JointApp\Views\TpView;

class TpView_Blog_Job_LastEngineerJob extends TpView
{
    public $css=['engineer-job' => '/css/blog/articles/engineer-job.css'];

    public function getResponseHtml(): string
    {
        return
            '<section>'.
            '<p>'.
            'Довольно часто приходится объяснять причины ухода с последнего места работы. Вот несколько примеров почему я решил'.
            'покинуть ту проклятую работу.'.
            '</p>'.
            '</section>'.
            '<section>'.
            '<ul>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Там видеокамера/датчик перестал работать, сходи разберись, это твоя работа, тебе за это деньги платят'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Ок, сейчас посмотрим в чем там дело'.
            '</li>'.
            '<p>'.
            'Открываю шкаф, на меня вываливается груда проводов, ни один не додписан.'.
            '</p>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Здесь надо практически полностью монтаж переделывать'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Зачем тебе монтаж переделывать, ты что прикалываешься. Там же все просто, или есть контакт или его нет. '.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'У нас прошлый Вася сходил, там что-то пошевилил, и все заработало. Зачем тебе время тратить на монтажи, '.
            'других задач полно.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/idea.jpg">'.
            'Еб.т мозги, работать не хочет.'.
            '</li>'.

            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Объясняю, по правилам кабели и аппаратура должны быть подписаны, все концы вызвонены, провода '.
            'уложены в короба, короба закрыты.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Какие ещё правила. '.
            'Ну значит ты не такой, как Вася у нас был, он там все делал. Нам бы такого как Вася.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Ну давай прожмем разъемы, пошевелим )))'.
            '</li>'.
            '<p>'.
            'Пошевелили, заработало.'.
            '</p>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/idea.jpg">'.
            'Я же тебе говорил что там все просто, хули ты мне мозги еб...л.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Да, это заработало, другое отвалилось.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/idea.jpg">'.
            'Ну значит надо в другом месте пошевелить, и все заработает.'.
            '</li>'.
            '<p>'.
            'Пошевелили, заработало.'.
            '</p>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/idea.jpg">'.
            'Ну вот, а ты монтаж шкафа, че-то подписывать.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Не знаю на долго ли, гарантии никакой не даю.'.
            '</li>'.
            '<p>'.
            'На следующий день на планерке: '.
            '</p>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Че там опять не работает, ты же уже ходил туда, там что-то делал. Долго ли это будет продолжаться?'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Говорил же, монтаж шкафа надо в порядок приводить. Так без гарантии.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Надо - делай. Сколько тебе времени на это надо, пару часов надеюсь хватит.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Пара часов это минимум только на подготовку. Надо всё проверить, сначала бирки напечатать'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Какие бирки, первый раз слышу. У нас тут никто бирки не печатает.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Объясняю же: по правилам все кабели и аппаратура, клеммники должны быть промаркированы.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Че ты там, три провода не запомнишь как соединяются, не смеши.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/idea.jpg">'.
            'Еб.т мозги, работать не хочет.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Там не три провода а больше.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Ну пять. Запиши себе в блокнотик'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Там не пять, а пятдесят.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Ну тебе же невсе надо переделывать?'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Переделывать придется все, выборочно не получится. Надо все кабели аккуратно подрезать и выравнивать.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'И что, если напечатаешь, больше такого не будет.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Надеюсь, если привести в порядок монтаж, сделать все по правилам, то почему это должно быть.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Ладно, делай, .'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/idea.jpg">'.
            'Только пусть делает в нерабочее время, придет пораньше и напечатает, это же ему нужно. А том мы будем '.
            'этот шкаф месяц делать.'.
            '</li>'.
            '<p>'.
            'На следующий день.'.
            '</p>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Ну что, бирки напечатал, сегодня надеюсь закончишь.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Да, бирки готовы. Стяжек и разъемов нет на складе. Не с чем делать.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Нет стяжек, ты проволочкой смотай, или изолентой. Ты инженер, почему я тебя учить должен.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Я инженер, по-этому и говорю как надо делать. Проволочкой смотаешь, все расползотеся, опять переделывать '.
            'придется. Нет смысла быдло-монтаж делать, надо по-нормальному.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Ладно ждем стяжеки и разъемы.'.
            '</li>'.
            '<p>'.
            'через пару недель: '.
            '</p>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'На складе скали стяжки и разъемы приехали. Сегодня монтаж шкафа закончишь.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Постараюсь. Сейчас начнем, а там как пойдет. Может еще какие проблемы вылезут.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Что тебе для этого еще надо?'.
            '</li>'.
            '<p>Ну наконец-то до него дошло.</p>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Привлечем электрика, пусть розетку дополнительно установит. И мне человека в помошь, принести-подать.'.
            '</li>'.
            '<p>'.
            'Ну вроде все готово. Монтаж зверешен, проблем больше не возникало.'.
            '</p>'.
            '</ul>'.
            '</section>'.
            '<section>'.
            '<p>'.
            '</p>'.
            '</section>'.
            '<section>'.
            '<ul>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Камеры по периметру не работают, давай включать их тоже.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Как скажете. Но там надо втроем делать.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Ты что, издеваешься. Зачем тебе втроем. Может всю бригаду туда пригоним)))'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/idea.jpg">'.
            'Еб.т мозги, работать не хочет.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Камеры на фонарях, регистраторы метрах в 300 от камер. Нужно с кем-то по телефону, чтоб один человек '.
            'был у видеокамеры, другой у видеорегистратора.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Меня же ваши ТБ-шники и оштрафйют за то что я один с лестницы работал'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'А третий тебе зачем.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Ну я же говорю, с лестницы залезать на фонарь, зымыкать провода. Другой человек на телефоне, третий у регистраторов.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/idea.jpg">'.
            'Ебет мозги, работать не хочет. У нас Вася был, он один там все делал.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Тебе за это деньги платят, почему мы еще должны кого-то привлекать?'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Ну так я не обезьяна чтоб одной рукой на телефон держать, другой провода замыкать и хвостом на фонаре висеть.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Попросишь охранников, они парни хорошие, никогда не отказывали.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Я охраннику должен объяснять как кабель вызванивать...'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Если один из них в обход, а другой со мной, если '.
            'вдруг директор приедет, кто ему ворота откроет.'.
            '</li>'.
            '</ul>'.
            '<p>'.
            'Забили... Жилт без камер два года, еще столько же проживут.'.
            '</p>'.
            '</section>'.
            '<section>'.
            '<p>'.
            'На системе вентиляции вышел из строя контроллер. Делаю что могу: '.
            '<ul>'.
            '<li>'.
            'Снял аппаратуру, передал другому отделу в ремонт.'.
            '</li>'.
            '<li>'.
            'Обеспечиваю возможность работы без авппаратуры, перевожу управление двигателями на ручной режим.'.
            '</li>'.
            '<li>'.
            'Устанавливаю перемычки чтоб удерживать заслонки в открытом состоянии'.
            '</li>'.
            '</ul>'.
            '</p>'.
            '<p>'.
            'Проходит две недели, нет ответа из ремонта. Звоню туда, не берут трубку.'.
            '</p>'.
            '<ul>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Не берут трубку, позвони еще раз.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Звонил вчера три раза. Давайте напишим служебку в ЭДО.'.
            '</li>'.
            '<p>'.
            'проходит еще месяц, ответа нет'.
            '</p>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Позвони еще раз.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Звонил, не берет трубку.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Значит позвони еще раз, кому задача поставлена. Ты должен добиваться'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Я не понял. Вы дали мне его номер, я ему позвонил. Я свою задачу выполнил.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Если это его обязанность на мои звонки отвечать, то к нему и претензии. Я со своей стороны'.
            'свои обязанности выполнил. А если не его, то зачем вы вообще мне его номер дали.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/boss.jpg">'.
            'Нет, тебе задачу поставили, добивайся как хочешь.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Я не понял, как??? Его я должен добиваться???'.
            'Это типа ты что, не мужик что ли, должен добиваться.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/idea.jpg">'.
            'Мы все здесь такие, значит и ты такой же.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Какой такой же. Будьте кем хотите, но других то к садомии зачем склонять.'.
            '</li>'.
            '<li>'.
            '<img src="/userdata/blog/engineer-job/engineer.png">'.
            'Ду ну вас нах...й пидоры. С меня довольно, я ухожу.'.
            '</li>'.
            '</ul>'.
            '</section>';
    }

    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\Blog\Articles\PhpJob\LangFiles_'.self::ucfirstLang($this->userLang).'_Views_B_A_LastEngineerJob';
        return new $class_Name();
    }
}