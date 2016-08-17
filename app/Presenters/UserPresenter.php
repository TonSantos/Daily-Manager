<?php 

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter {

	/*
	 *  {{ $user->present()->createdAt }}
	*/

	public function createdAt($format = 'd/m/Y H:i') 
	{
		return $this->created_at->format($format);
	}

	//funciont for limit text

}