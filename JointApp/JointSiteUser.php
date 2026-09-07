<?php


namespace JointApp;


use JointApp\Models\PdoTrait;

class JointSiteUser
{
    use PdoTrait;

    private string $user_id = '';
    private string $alias = '';
    private bool $blackList = false;
    private string $followed_by = '';
    private string $avatar = '';
    private string $login = '';
    private bool $isAuth = false;
    private bool $isValid = false;
    private bool $isAdmin = false;

    private string $userLang = 'ru';

    private $context = ['User' => __CLASS__];

    private string $login_tmp = '';

    public function __construct(JointSiteLogger &$logger, string $userLang = 'ru')
    {
        $this->logger = $logger;
        $this->connectDb();
    }


    public function withLogin(string $login):bool
    {
        if(self::checkUserLogin($login)){
            $this->login_tmp = $login;
            return true;
        }
        return false;
    }

    public function withPassword(string $password):bool
    {
        if($this->login_tmp) {
            if (self::checkUserPassword($password)) {
                $qry = 'select user_id, alias, pw_hash, avatar, blackList, followed_by from users where login = "' . $this->login_tmp . '"';
                if ($res = $this->pdoQuery($qry)) {
                    if($res->rowCount() == 1){
                        $row = $res->fetch(\PDO::FETCH_ASSOC);
                        if (password_verify($password, $row['pw_hash'])) {
                            $this->blackList = $row['blackList'];
                            $this->login = $this->login_tmp;
                            if(!$this->blackList){
                                $this->user_id = $row['user_id'];
                                $this->alias = $row['alias'];
                                if($row['avatar']){
                                    $this->avatar = $row['avatar'];
                                }
                                if($row['followed_by']){
                                    $this->followed_by = $row['followed_by'];
                                    $this->isValid = true;
                                }
                                //is admin user
                                if($this->user_id == '1AB4C7D7-5315-4C9E-9F33-E1B250491589'){
                                    $this->isAdmin = true;
                                }
                            }
                            $this->isAuth = true;
                            $this->saveSession();
                        }
                    }
                }
            }
        }
        return false;
    }

    function quitUser():void
    {
        $this->user_id = '';
        $this->alias = '';
        $this->blackList = false;
        $this->followed_by = '';
        $this->avatar = '';
        $this->login = '';
        $this->isAuth = false;
        $this->isValid = false;
        $this->isAdmin = false;
        unset($_SESSION['user']);
    }

    public function fromSession()
    {
        if(isset($_SESSION['user'])){
            $this->user_id = $_SESSION['user']['user_id'];
            $this->alias = $_SESSION['user']['alias'];
            $this->login = $_SESSION['user']['login'];
            $this->followed_by = $_SESSION['user']['followed_by'];
            $this->blackList = $_SESSION['user']['blackList'];
            $this->avatar = $_SESSION['user']['avatar'];
            $this->isAuth = true;
            $this->isValid = $_SESSION['user']['isValid'];
            $this->isAdmin = $_SESSION['user']['isAdmin'];
        }
    }

    public function saveSession():void
    {
        $_SESSION['user'] = [
            'user_id' => $this->user_id,
            'alias' => $this->alias,
            'login' => $this->login,
            'followed_by' => $this->followed_by,
            'blackList' => $this->blackList,
            'avatar' => $this->avatar,
            'isValid' => $this->isValid,
            'isAdmin' => $this->isAdmin,
        ];
    }

    public static function checkUserLogin($login):bool
    {
        if (preg_match('/^[A-Za-z]{1}[0-9a-zA-Z-._]{2,15}$/imsiu', $login) == 0){
            return false;
        }
        return true;
    }

    public static function checkUserPassword($password):bool
    {
        if (strlen($password) >= 3){
            return true;
        }else{
            return false;
        }
    }

    public static function checkUserEmail($user_email)
    {
        if (filter_var($user_email, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }

    public function checkDoubleLogin($login):bool
    {
        $countLogin_qry = "select count(user_id) as cnt from users where login = '".$login."'";
        if($res = $this->pdoQuery($countLogin_qry)){
            if($res->fetch(\PDO::FETCH_ASSOC)["cnt"] == 0){
                return true;
            }
        }
        return false;
    }

    public function getUserLang():string
    {
        return $this->userLang;
    }

    public function getId():string
    {
        return $this->user_id;
    }

    public function getLogin():string
    {
        return $this->login;
    }

    public function getAlias():string
    {
        return $this->alias;
    }

    public function getAvatar():string
    {
        return $this->avatar;
    }

    public function isBanned():bool
    {
        return $this->blackList;
    }

    public function isAuth():bool
    {
        return $this->isAuth;
    }

    public function isValid():bool
    {
        return $this->isValid;
    }

    public function isAdmin():bool
    {
        return $this->isAdmin;
    }

    public function getFollowedBy():bool
    {
        return $this->followed_by;
    }
}