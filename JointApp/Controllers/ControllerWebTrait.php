<?php

namespace JointApp\Controllers;


trait ControllerWebTrait
{
    //user info
    public string $u_user_id = '';
    public string $u_alias = '';
    public bool $u_blackList = false;
    public string $u_followed_by = '';
    public string $u_avatar = '';
    public string $u_login = '';
    public bool $u_isAuth = false;
    public bool $u_isValid = false;
    public bool $u_isAdmin = false;

    //automatically exec as final action when response format text
    public function updateViewParams()
    {
        $this->updateFromUser();
        $this->setUpViewParams($this->view);
    }

    //update some view params
    protected function setUpViewParams(&$view)
    {
        foreach ($view as $prop => $value){
            if(isset($this->$prop)){
                $view->$prop = $this->$prop;
            }
        }
    }

    private function updateFromUser()
    {
        $this->u_user_id = $this->user->getId();
        $this->u_alias = $this->user->getAlias();
        $this->u_blackList = $this->user->isBanned();
        $this->u_followed_by = $this->user->getFollowedBy();
        $this->u_avatar = $this->user->getAvatar();
        $this->u_login = $this->user->getLogin();
        $this->u_isAuth = $this->user->isAuth();
        $this->u_isValid = $this->user->isValid();
        $this->u_isAdmin = $this->user->isBanned();
    }

}