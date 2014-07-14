<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    const ERROR_ROLE_INVALID = 3;

    private $_id;

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
		$validRoles = array('admin','superadmin','agency');
		/*
        $users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin123',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
		*/

        //deny roles (users);
        $user = User::model()->findByAttributes(array('email' => $this->username));

        if ($user !== null){
            //check for password
            if ($user->password != $user->encrypt($this->password)){
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            } else if ( !in_array($user->role, $validRoles)){
                $this->errorCode = self::ERROR_ROLE_INVALID;
            } else {
                $this->_id = $user->id;

                if (null == $user->last_login_time){
                    $lastLogin = time();
                } else {
                    $lastLogin = strtotime($user->last_login_time);
                }
                $this->setState('lastLoginTime', $lastLogin);
                $this->setState('role', $user->role);
                $this->errorCode = self::ERROR_NONE;
            }
        } else {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }
        return !$this->errorCode;
	}

    public function getId(){
        return $this->_id;
    }
}