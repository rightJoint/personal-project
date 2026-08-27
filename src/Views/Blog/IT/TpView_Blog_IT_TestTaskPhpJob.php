<?php


namespace Src\Views\Blog\IT;


use JointApp\Views\TpView;


class TpView_Blog_IT_TestTaskPhpJob extends TpView
{
    protected $css = [
        'codesnippet' => '/css/code-snippet.css',
    ];
    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\Blog\Articles\PhpJob\LangFiles_'.self::ucfirstLang($this->userLang).'_Views_B_A_TestTaskPhpJob';
        return new $class_Name();
    }

    public function getResponseHtml():string
    {
        return '<section>'.

            '<h2>'.$this->langFile::ANS_H2.'</h2>'.
            '<p>'.$this->langFile::ANS_P1.'</p>'.
            '<div class="note">'.$this->langFile::ANS_NOTE.'</div>'.
            '<p>'.$this->langFile::ANS_P2.'</p>'.
            '<p>'.$this->langFile::ANS_P3.
            '<ol>'.
            '<li>'.$this->langFile::ANS_LI1.'</li>'.
            '<li>'.$this->langFile::ANS_LI2.'</li>'.
            '<li>'.$this->langFile::ANS_LI3.'</li>'.
            '</ol>'.
            '</p>'.
            '<p>'.$this->langFile::ANS_P4.'</p>'.
            '</section>'.
            '<section>'.
            '<h2>'.$this->langFile::D_C_H2.'</h2>'.
            '<p>'.$this->langFile::D_C_P1.'</p>'.
            '<p>'.$this->langFile::D_C_P2.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>docker build . -t bookshop-test-1</li>'.
            '<li>docker run -d -p 8080:80 -p 3306:3306 --name bookshop-c-test-1 bookshop-test-1</li>'.
            '</ul>'.
            '</div>'.
            '</p>'.
            '<p>'.$this->langFile::D_C_P3.'</p>'.
            '<div class="img-block">'.
            '<img src="/img/blog/testTaskPhpJob/img-1.png">'.
            '</div>'.
            '<p>'.$this->langFile::D_C_P4.'</p>'.
            '<div class="img-block">'.
            '<img src="/img/blog/testTaskPhpJob/img-2.png">'.
            '</div>'.
            '<p>'.$this->langFile::D_C_P5.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>/etc/init.d/mysql start</li>'.
            '<li>/etc/init.d/apache2 start</li>'.
            '</ul>'.
            '</div>'.
            '</p>'.
            '<div class="img-block">'.
            '<img src="/img/blog/testTaskPhpJob/img-3.png">'.
            '</div>'.
            '<p>'.$this->langFile::D_C_P6.
            '</p>'.
            '<section>'.
            '<h3>'.$this->langFile::D_MC_H3.'</h3>'.
            '<p>'.$this->langFile::D_MC_P1.'<div class="code-snippet">'.
            '<ul>'.
            '<li>apt-get install mc -y</li>'.
            '</ul>'.
            '</div>'.
            '</p>'.
            '<div class="img-block">'.
            '<img src="/img/blog/testTaskPhpJob/img-4.png" style="max-width: 70%">'.
            '</div>'.
            '<p>'.$this->langFile::D_MC_P2.'</p>'.
            '</section>'.
            '<section>'.
            '<h3>'.$this->langFile::D_SSH_H3.'</h3>'.
            '<p>'.$this->langFile::D_SSH_P1T1.' '.
            '<a href="https://www.warp.dev/terminus/ssh-docker-container" title="Writing a Dockerfile for an SSH
                server with password-based authentication">'.$this->langFile::D_SSH_P1REF.'</a>. '.
            $this->langFile::D_SSH_P1T2.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>RUN useradd -ms /bin/bash newuser</li>'.
            '</ul>'.
            '</div>'.
            '</p>'.
            '<p>'.$this->langFile::D_SSH_P2.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>docker build . -t bookshop-test-1</li>'.
            '<li>docker run -d -p 8080:80 -p 3306:3306 -p 2222:22 --name bookshop-c-test-1 bookshop-test-1</li>'.
            '</ul>'.
            '</div>'.
            '</p>'.
            '<div class="img-block">'.
            '<img src="/img/blog/testTaskPhpJob/img-5.png">'.
            '</div>'.
            '<p>'.$this->langFile::D_SSH_P3.'</p>'.
            '<p>'.$this->langFile::D_SSH_P4.'</p>'.
            '<p>'.$this->langFile::D_SSH_P5.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>C:\Windows\System32\drivers\etc\hosts</li>'.
            '</ul>'.
            '</div>'.
            '</p>'.
            '<p>'.
            'Добавим в него строчку'.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>127.0.0.1 bookshop.loc</li>'.
            '</ul>'.
            '</div>'.
            '</p>'.
            '<p>'.$this->langFile::D_SSH_P6.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>docker run -d -p 8080:80 -p 3306:3306 -p 2222:22 -h bookshop.loc --name bookshop-c-test-1 bookshop-test-1</li>'.
            '</ul>'.
            '</div>'.
            '</p>'.
            '<div class="img-block">'.
            '<img src="/img/blog/testTaskPhpJob/img-6.png">'.
            '</div>'.
            '</section>'.
            '</section>'.
            '<section>'.
            '<h3>'.$this->langFile::D_VH_H3.'</h3>'.
            '<p>'.$this->langFile::D_VH_P1.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>ServerName bookshop.loc</li>'.
            '</ul>'.
            '</div>'.
            '</p>'.
            '<p>'.$this->langFile::D_VH_P2.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>echo "ServerName localhost" >> /etc/apache2/apache2.conf</li>'.
            '</ul>'.
            '</div>'.
            '</p>'.
            '<p>'.
            $this->langFile::D_VH_P3.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>COPY /src /var/www/html/bookshop.loc</li>'.
            '</ul>'.
            '</div>'.
            '</p>'.
            '<p>'.$this->langFile::D_VH_P4.'</p>'.
            '<div class="img-block">'.
            '<img src="/img/blog/testTaskPhpJob/img-7.png">'.
            '</div>'.
            '</section>'.
            '<section>'.
            '<h2>'.$this->langFile::SCR_H2.'</h2>'.
            '<p>'.$this->langFile::SCR_P.'</p>'.
            '<h3>'.$this->langFile::SCR_DB_H3.'</h3>'.
            '<p>'.$this->langFile::SCR_DB_P1.
            '<ol>'.
            '<li>'.$this->langFile::SCR_DB_LI1.'</li>'.
            '<li>'.$this->langFile::SCR_DB_LI2.'</li>'.
            '<li>'.$this->langFile::SCR_DB_LI3.'</li>'.
            '<li>'.$this->langFile::SCR_DB_LI4.'</li>'.
            '</ol>'.
            '</p>'.
            '<p>'.$this->langFile::SCR_DB_P2.'</p>'.
            '<h3>'.$this->langFile::SCR_PHP_H3.'</h3>'.
            '<p>'.$this->langFile::SCR_PHP_P1.'</p>'.
            '<p>'.$this->langFile::SCR_PHP_P2.
            '<ul>'.
            '<li><b>'.$this->langFile::SCR_PHP_LI1.'</b>'.
            '<ol>'.
            '<li>'.$this->langFile::SCR_PHP_LI11.'</li>'.
            '<li>'.$this->langFile::SCR_PHP_LI12.'</li>'.
            '<li>'.$this->langFile::SCR_PHP_LI13.'</li>'.
            '</ol>'.
            '</li>'.
            '<li>'.$this->langFile::SCR_PHP_LI2.
            '<ol>'.
            '<li>'.$this->langFile::SCR_PHP_LI21.'</li>'.
            '<li>'.$this->langFile::SCR_PHP_LI22.'</li>'.
            '</ol>'.
            '</li>'.
            '<li><b>js</b>-'.$this->langFile::SCR_PHP_LI3.
            '<ol>'.
            '<li>googleapis.js - '.$this->langFile::SCR_PHP_LI31.' jQuery</li>'.
            '<li>report.js - '.$this->langFile::SCR_PHP_LI32.'</li>'.
            '</ol>'.
            '</li>'.
            '</ul>'.
            '</p>'.
            '<p>'.$this->langFile::SCR_PHP_P3.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>docker build . -t bookshop-test</li>'.
            '<li>docker run -d -p 8080:80 -p 3306:3306 -p 2222:22 -h bookshop.loc --name bookshop-c-test bookshop-test</li>'.
            '</ul>'.
            '</div>'.
            '</p>'.
            '<p>'.$this->langFile::SCR_PHP_P4.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>/etc/init.d/mysql start</li>'.
            '<li>/etc/init.d/apache2 start</li>'.
            '</ul>'.
            '</div>'.
            '</p>'.
            '<p>'.$this->langFile::SCR_PHP_P5.
            '<div class="img-block">'.
            '<img src="/img/blog/testTaskPhpJob/img-8.png">'.
            '</div>'.
            '</p>'.
            '<p>'.$this->langFile::SCR_PHP_P6.'</p>'.
            '</section>'.
            '<section>'.
            '<h2>'.$this->langFile::AS_H2.'</h2>'.
            '<p>'.$this->langFile::AS_P1.'</p>'.
            '<h3>'.$this->langFile::AS_H31.'</h3>'.
            '<p>'.$this->langFile::AS_P2.
            '<div class="code-snippet">'.
            '<ul>'.
            '<li>git remote add test-bookshop https://github.com/rightJoint/test-bookshop</li>'.
            '<li>git push test-bookshop bookshop</li>'.
            '</ul>'.
            '</div>'.
            '</p>'.
            '<p>'.$this->langFile::AS_P3.
            '<div class="img-block">'.
            '<img src="/img/blog/testTaskPhpJob/img-9.png" style="max-width: 70%">'.
            '</div>'.
            '</p>'.
            '<h3>'.$this->langFile::AS_H32.'</h3>'.
            '<p>'.$this->langFile::AS_P4.'</p>'.
            '<h3>'.$this->langFile::AS_H33.'</h3>'.
            '<p>'.$this->langFile::AS_P51.
            '<a href="https://forums.docker.com/t/apache2-not-start-in-docker-container/89363/2">forums.docker.com</a> и
            <a href="https://stackoverflow.com/questions/49764989/cannot-start-apache-automatically-with-docker">stackoverflow.com</a>,'.
            $this->langFile::AS_P52.
            '</p>'.
            '</section>';
    }
}