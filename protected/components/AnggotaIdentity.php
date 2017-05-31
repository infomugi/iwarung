<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class AnggotaIdentity extends CUserIdentity
{
	private $_id;
	
	public function authenticate()
	{
		$username = strtolower($this->username);
		$user = Anggota::model()->find('LOWER(username)=?', array($username));
		if($user===null)
		    $this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($user->password!==md5($this->password))
		    $this->errorCode = self::ERROR_PASSWORD_INVALID;
		else
		{
		    $this->_id = $user->idAnggota;
		    $this->setState('record', $user);
		    $this->setState('profile', $user->level);
		    $this->setState('profile', $user->idAnggota);
		    $this->setState('profile', $user->namaLengkap);
		    $this->username = $user->username;
		    $this->errorCode = self::ERROR_NONE;
	  	}

	   	return $this->errorCode == self::ERROR_NONE;
	}
	
	public function getId()
	{
		return $this->_id;
	}
}

?>