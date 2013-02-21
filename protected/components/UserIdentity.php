<?php
/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
        $client = CommonHelper::initRemoteCon();
        try {
            //调用远程方法, 检查用户名密码
            $authInfo = $client->checkUser($this->username, $this->password);
            if(!empty($authInfo['result']) && $authInfo['result'] > 0){
                $this->errorCode = self::ERROR_NONE;
                //权限
                $this->setState('roles', $authInfo['level']);
                //uid
                $this->setState('uid', $authInfo['uid']);
                if(!empty($authInfo['username']))
                    $this->setState("username", $authInfo['username']);
                if(!empty($authInfo['userTeamInfo']))
                    $this->setState("userTeamInfo", $authInfo['userTeamInfo']);
            }else{
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            }

            return !$this->errorCode;
        } catch (Exception $e) {
            //var_dump($e);
        }
	}
}

