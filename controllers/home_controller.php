<?php
	class HomeController extends CcLikeItAppController {

	public $uses = array('CcLikeIt.Like');

	public $layout = null;

	public function index() {
		$issue_id = $this->params['named']['issue_id'];
		$count = $this->Like->getLiked($issue_id);
		$this->set('count',$count);
	}

	public function like() {
		$issue_id = $this->params['named']['issue_id'];
		$this->Like->likeIt($issue_id,$this->current_user);
		$this->redirect(array(
			'action' => 'index',
			'issue_id' => $this->params['named']['issue_id']
		));
	}

}

