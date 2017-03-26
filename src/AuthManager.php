<?php

namespace Shop;

use Shop\User;

/**
 * AuthManager
 *
 * @author tulexx
 */
class AuthManager
{

	public function login($data)
	{
		if (!empty($data))
		{
			$user = (new User)->findByEmail($data['email']);
			if (empty($user))
			{
				return false;
			}
			else
			{
				if (password_verify($data['password'], $user->password))
				{
					$_SESSION['id'] = $user->id;
					return true;
				}
				return false;
			}
		}
		return null;
	}

}
