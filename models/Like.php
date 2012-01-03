<?php
class Like extends CcLikeItAppModel {
	public $useTable = false;

	public function likeIt($issue_id,$currentuser) {
		if (!$currentuser['logged']) {
			return false;
		}

		$journal = ClassRegistry::init('Journal');
		$data = array(
			'Journal' => array(
				'journalized_id' => $issue_id,
				'journalized_type' => 'Issue',
				'user_id' => $currentuser['id']
			),
			'JournalDetail' => array(
				array(
					'property' => 'cf',
					'prop_key' => 'like',
					'old_value' => 0,
					'value' => 1
				)
			)
		);
		$journal->saveAll($data);
	}

	public function getLiked($issue_id) {
		$journal = ClassRegistry::init('Journal');
		$journal->unbindModel(array(
			'hasMany' => array('JournalDetail')
		));
		$journal->bindModel(array(
			'hasOne' => array(
				'JournalDetail' => array(
					'className' => 'JournalDetail',
					'type' => 'inner',
					'conditions' => array(
						'JournalDetail.prop_key' => 'like',
						'JournalDetail.value' => '1'
					)
				)
			)
		));
		$count = $journal->find('count',array(
			'conditions' => array(
				'Journal.journalized_id' => $issue_id,
				'Journal.journalized_type' => 'Issue'
			)
		));
		return $count;
	}
}
