<!-- File: // View/Claims/c_progress.ctp -->

<?php
for ($i=1; $i <= $params['steps']; $i++) {
	if ($i > $params['maxProgress'] + 1) {
		echo 'Step '.$i.'';
	} else {
		$class = ($i == $params['currentStep']) ? 'active' : 'normal';
		echo $this->Html->link('<Step '.$i.'>',
			array('action' => 'c_step', $i),
			array('class' => $class)
		);
	}
}
?>