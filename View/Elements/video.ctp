<?php
switch ($data['source']) {
	case 'youtube':
		echo $this->Html->tag('iframe', '', array(
			'class' => 'youtube-player',
			'type' => 'text/html',
			'width' => 640,
			'height' => 385,
			'src' => sprintf('http://www.youtube.com/embed/%s', $data['remote_id']),
			'allowfullscreen' => 'yes',
			'frameborder' => '0'
		));
	break;
	case 'vimeo':
		echo $this->Html->tag('iframe', '', array(
			'src' => sprintf('//player.vimeo.com/video/%s?portrait=0', $data['remote_id']),
			'width' => 500,
			'height' => 219,
			'frameborder' => '0',
			'allowfullscreen'
		));
	break;
}
