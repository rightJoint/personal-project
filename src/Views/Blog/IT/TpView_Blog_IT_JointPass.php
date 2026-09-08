<?php


namespace Src\Views\Blog\IT;


use JointApp\Views\TpView;

class TpView_Blog_IT_JointPass extends TpView
{
    const JOINT_PASS_IMG = '/userdata/blog/IT/JointPass';

    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\Blog\Articles\JointPass\LangFiles_'.self::ucfirstLang($this->userLang).'_Views_B_A_JointPass';
        return new $class_Name();
    }

    public function getResponseHtml(): string
    {
        return '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.
            '<section class="prod-about">'.
            '<p>'.
            $this->langFile::PROD_ABOUT.
            '</p>'.
            '</section>'.
            '</div></div></div>'.


            '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.
            '<section class="prod-menu">'.
            '<h2>'.$this->langFile::PI_H2_CONTENT.'</h2>'.
            '<ul>'.
            '<li><a href="#product-downloads">'.$this->langFile::PI_H2_DWL.'</a></li>'.
            '<li><a href="#product-info">'.$this->langFile::PI_H2_INTERFACE.'</a></li>'.
            '<li><a href="#product-craft">'.$this->langFile::PI_H2_CR.'</a></li>'.
            '<li><a href="#product-feedback">'.$this->langFile::PI_H2_FEEDBACK.'</a></li>'.
            '</ul>'.
            '</section>'.
            '</div></div></div>'.
            '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.
            '<section>'.
            '<h2 id="product-downloads">'.$this->langFile::PI_H2_DWL.'</h2>'.
            '<p>'.
            '<a class="dwl-img-link" href="/downloads/jointPass.zip" title="'.$this->langFile::DWL_A_TITLE.' jointPass.zip">'.
            '<img src="'.self::JOINT_PASS_IMG.'/jointPass.png">jointPass.zip'.
            '</a>'.
            ' '.$this->langFile::DWL_P1_TXT1.' <span class="ex-conf">jointPass.exe</span>. '.
            $this->langFile::DWL_P1_TXT2.
            '</p>'.
            '<p>'.$this->langFile::DWL_P2.' <strong>aa653c47a6b6925441fb7faf0689eb3a</strong>'.
            '</p>'.
            '<div class="example">'.
            '<div class="example-code">'.
            'CertUtil -hashfile jointPass.exe MD5'.
            '</div>'.
            '<div class="example-code">'.
            'Хэш MD5 : jointPass.exe: aa653c47a6b6925441fb7faf0689eb3a'.
            '</div>'.
            '<div class="example-text">'.
            $this->langFile::DWL_EX_TXT1.
            '</div>'.
            '</div>'.
            '</p>'.
            '<p>'.$this->langFile::DWL_P3.'</p>'.
            '<div class="example">'.
            '<div class="example-code">'.
            'git clone https://github.com/rightJoint/jointpass'.
            '</div>'.
            '<div class="example-code">'.
            'git checkout main'.
            '</div>'.
            '<div class="example-text">'.
            $this->langFile::DWL_EX_TXT2.
            '</div>'.
            '</div>'.
            '</section>'.
            '</div></div></div>'.

            '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.
            '<section>'.
            '<h2 id="product-info">'.$this->langFile::GUI_H2.'</h2>'.

            '<div class="branches-block">'.
            '<p>'.$this->langFile::GUI_P1.'</p>'.
            '<p>'.$this->langFile::GUI_P2.'</p>'.
            '<div class="example">'.
            "<div class='example-img'>".
            '<img src="'.self::JOINT_PASS_IMG.'/jp-signup_'.$this->userLang.'.png">'.
            '</div>'.
            '<div class="example-text">'.
            $this->langFile::GUI_EX_TXT_1.
            '</div>'.
            '</div>'.
            '<p>'.
            $this->langFile::GUI_P3.
            '</p>'.
            '<p>'.
            $this->langFile::GUI_P4.
            '</p>'.
            '<div class="example">'.
            '<div class="example-img">'.
            '<img src="'.self::JOINT_PASS_IMG.'/jp-change-pass_'.$this->userLang.'.png">'.
            '</div>'.
            '<div class="example-text">'.
            $this->langFile::GUI_EX_TXT_2.
            '</div>'.
            '</div>'.
            '<p>'.
            $this->langFile::GUI_EX_P5.
            '</p>'.
            '<div class="example">'.
            '<div class="example-img">'.
            '<img src="'.self::JOINT_PASS_IMG.'/jp-mainWin_'.$this->userLang.'.png">'.
            '</div>'.
            '<div class="example-text">'.
            $this->langFile::GUI_EX_TXT_1.
            '</div>'.
            '</div>'.
            '<p>'.
            $this->langFile::GUI_EX_P6.
            '</p>'.
            '<p>'.
            $this->langFile::GUI_EX_P7.
            '</p>'.
            '<p>'.
            $this->langFile::GUI_EX_P8.
            '</p>'.
            '<p>'.
            $this->langFile::GUI_EX_P9.
            '</p>'.
            '<div class="example">'.
            '<div class="example-img">'.
            '<img src="'.self::JOINT_PASS_IMG.'/jp-accFields_'.$this->userLang.'.png">'.
            '</div>'.
            '<div class="example-text">'.
            $this->langFile::GUI_EX_TXT_4.
            '</div>'.
            '</div>'.
            '<p>'.
            $this->langFile::GUI_P10.
            '<p>'.
            $this->langFile::GUI_P11.
            '</p>'.
            '<div class="example">'.
            '<div class="example-img">'.
            '<img src="'.self::JOINT_PASS_IMG.'/jp-group_'.$this->userLang.'.png">'.
            '</div>'.
            '<div class="example-text">'.
            $this->langFile::GUI_EX_TXT_5.
            '</div>'.
            '</div>'.
            '<p>'.
            $this->langFile::GUI_P12.
            '</p>'.
            '<div class="example">'.
            '<div class="example-img">'.
            '<img src="'.self::JOINT_PASS_IMG.'/jp-cat_'.$this->userLang.'.png">'.
            '</div>'.
            '<div class="example-text">'.
            $this->langFile::GUI_EX_TXT_6.
            '</div>'.
            '</div>'.
            '<p>'.
            $this->langFile::GUI_P13.
            '</p>'.
            '<div class="example">'.
            '<div class="example-img">'.
            '<img src="'.self::JOINT_PASS_IMG.'/jp-fields_'.$this->userLang.'.png">'.
            '</div>'.
            '<div class="example-text">'.
            $this->langFile::GUI_EX_TXT_7.
            '</div>'.
            '</div>'.
            '<p>'.
            $this->langFile::GUI_P14.
            '</p>'.
            '<div class="example">'.
            '<div class="example-img">'.
            '<img src="'.self::JOINT_PASS_IMG.'/jp-acc_'.$this->userLang.'.png">'.
            '</div>'.
            '<div class="example-text">'.
            $this->langFile::GUI_EX_TXT_8.
            '</div>'.
            '</div>'.
            '</section>'.
            '</div></div></div>'.
            '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.
            '<section class="prod-deploy">'.
            '<h2 id="product-craft">'.$this->langFile::CF_H2.'</h2>'.
            '<p>'.
            $this->langFile::CF_P1.
            '</p>'.
            '<p>'.
            $this->langFile::CF_P2.
            '</p>'.
            '<div class="example">'.
            '<div class="example-code">'.
            '4O5VjnGixFORFSNfwfZwSl+LDrkF3C98EiaY87EweKN7bKSSv3ER6U8rq03yx8rwsCCK5DrP6yrR0ED6oVttrlotC8Cqu4E4I8MCQqxwDu61U4PE/sOUrNkI9SSrAzqj'.
            '</div>'.
            '<div class="example-text">'.
            $this->langFile::CF_EX_TXT1.
            '</div>'.
            '</div>'.
            '<p>'.
            $this->langFile::CF_P3.
            '<p>'.
            $this->langFile::CF_P4.
            '</p>'.
            '<div class="example">'.
            '<div class="example-img">'.
            '<img src="'.self::JOINT_PASS_IMG.'/jp-dataFolder.png">'.
            '</div>'.
            '<div class="example-text">'.
            $this->langFile::CF_EX_TXT2.
            '</div>'.
            '</div>'.
            '<p>'.
            $this->langFile::CF_P5.
            '</p>'.
            '</section>'.
            '</div></div></div>'.

            '<div class="contentBlock-frame"><div class="contentBlock-center">'.
            '<div class="contentBlock-wrap">'.
            '<section style="margin-bottom: 4em">'.
            '<h2 id="product-feedback">'.$this->langFile::PI_H2_FEEDBACK.'</h2>'.
            '<p>'.$this->langFile::FEEDBACK_P1.' <span class="ex-conf">rightjoint@yandex.ru</span>'.
            '</p>'.
            '</section>'.
            '</div></div></div>';
    }
}