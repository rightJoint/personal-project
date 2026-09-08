<?php

namespace Src\LangFiles\Views\Blog\Articles\JointPass;


class LangFiles_En_Views_B_A_JointPass
{
    const PROD_ABOUT = 'Tap on account row in grid and buttons to copy clipboard login and password '.
    'just appear on filter panel. All data store encrypted in yor disk. You may sort out your accounts '.
    'by groups and categories. In addition two predefined fields (login and password) you may add '.
    'custom fields, attach to that images, turn on encryption. Account may contain any unique fields. '.
    'Watch when your password was last updated just sort them in grid by date. Your may migrate you data '.
    'to use on another PC. It is possible to change MasterPass, app re-crypt data.';

    const PI_H2_CONTENT = 'Table of content';
    const PI_H2_DWL='Download jointPass';
    const PI_H2_INTERFACE='GUI';
    const PI_H2_CR='Principles of work';
    const PI_H2_FEEDBACK='Feedback';

    const FEEDBACK_P1='If you have any other questions about jointPass, please text me on my eMail';

    const DWL_A_TITLE='download';
    const DWL_P1_TXT1='archive contains app';
    const DWL_P1_TXT2='Unpack jointPass.zip, make directory where from you going to run app, and put there jointPass.exe from archive.';
    const DWL_P2='To check control summ you might use <span class="ex-conf">CertUtil</span> from terminal. ".
                "Hash MD5 must be equal';
    const DWL_EX_TXT1='Check  <span class="ex-conf">Hash MD5</span>';
    const DWL_P3='Repository also avaliable for download, who wanna see code.';
    const DWL_EX_TXT2='clone repository jointpass';

    const GUI_H2='GUI';
    const GUI_P1='App check settings file <span class="ex-conf">jPass.ini</span> every run in directory where from it runs, and the first run creates this file. ".
                "You may not delete jPass.ini, though if you drop .ini-file, you can retrive it and passwords from jPass_data if you remember Master Pass.';
    const GUI_P2='Enter Master Pass and repeat, choose interface language and folder to store data, by default ".
                " offer users directory <span class="ex-conf">C:\Users\CurrentUser\Documents\jPass_data</span>';
    const GUI_EX_TXT_1='First auth win';
    const GUI_P3='Next time auth will go in general mode.';
    const GUI_P4='One day you might want change Master Pass, click checkbox close to left bottom corner of auth win ".
                "to active change pass mode.';
    const GUI_EX_TXT_2='Change password win. App return quantities of accounts and fields that was re-crypted';
    const GUI_EX_P5='After your get in, main window of app will be shown, from there by buttons on special panel available another windows.';
    const GUI_EX_TXT_3='Main window of app, left side for filters, right side for accounts.';
    const GUI_EX_P6='On left side groups and categories use to filter accounts on right side.';
    const GUI_EX_P7='Tap on account row and buttons to copy clipboard login and password just appear on filter panel.';
    const GUI_EX_P8='You may filter accounts in date grid by last update password date.';
    const GUI_EX_P9='Double click on account row invoke account fields window, because you may store and crypt custom fields.';
    const GUI_EX_TXT_4='Account fields window';
    const GUI_P10='At the up of main windows on apart panel disposed buttons to open groups, categories, fields lis and accounts windows.<br>'.
    '<strong>For displaying mostly modifies in these windows on main window attend Refresh buttons on filter panels. '.
    'Some kind of changes will be applying after restart app.</strong>';
    const GUI_P11='Groups and categories intend to classify and filter accounts, '.
    'the only different between them is categories on main window in datagrid control, and groups in drop down control.';
    const GUI_EX_TXT_5='Groups window';
    const GUI_P12='You may attach image to groups, categories and fields in list.<br>'.
    '<strong>App doesn"t handle loaded images, better load icon, not photos in high definition.</strong>';
    const GUI_EX_TXT_6='Categories window';
    const GUI_P13='Sometime you might want to attach to account, more then login and password, some another info, '.
    'for example access token git hub or ip-address. For this purpose create custom fields, turn on/of encryption.';
    const GUI_EX_TXT_7='Fields(list) window';
    const GUI_P14='Create new account, double click invoke open account"s fields window. Don"t forget press '.
    '<span class="ex-conf">Update button</span> to reload accounts grid in main window.';
    const GUI_EX_TXT_8='Accounts window';
    const CF_H2='Principles of work';
    const CF_P1='Each time when user sign in, app read file <span class="ex-conf">jPass.ini</span> '.
    'from directory where it runs, takes from there salt (general GUID), '.
    'that add to entered password, then calc summ"s hash, and compare with hash in jPass.ini. '.
    'At the end makes new salt and calc new hash, rewrites jPass.ini';
    const CF_P2='Entered in auth window Master Pass stored in system RAM while jointPass.exe is running, '.
                'it used for encryption and decryption fields of accounts. Decrypted password of account stored in RAM '.
                'in controls while you access fields.';
    const CF_EX_TXT1='Example of encryption word <span class="ex-conf">silver</span> on Master Pass <span class="ex-conf">123</span>';
    const CF_P3='Principles of encryption accounts data based on '.
                '<a href="https://gist.github.com/Echo-Peak/b93ed94c48048a7041215d4a3f4ad0a2" title="snippet from git hub">this one snippet</a>. '.
                'It used once to be easy modified for new options.</p>'.
                '<strong>I"m not so familiar with cryptography algorithms or gather metadata, '.
                'I really don"t know any ways how to break this app, but it doesn"t mean it is not possible.</strong>';
    const CF_EX_TXT2='Folder contains users data';
    const CF_P4='Folder to store users data sets in <span class="ex-conf">jPass.ini</span>, by default it is '.
                '<span class="ex-conf">C:\Users\CurrentUser\Documents\jPass_data</span> contains files '.
                'for groups, categories, fields list and accounts. '.
                'Folder <span class="ex-conf">accounts</span> use for store accounts fields.';
    const CF_P5='<strong>To apply changes, file accounts.pass, each time fully rewritten. For test was used 25 accounts, '.
                'guess it is possible to use more, however it"s not database to store thousands passwords.</strong>';
}
