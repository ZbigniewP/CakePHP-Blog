<?php

namespace App\View;

use Cake\View\View;
use Markdown\View\Helper\MarkdownHelper;

/**
 * Class AppView
 * @property MarkdownHelper Markdown
 * @package App\View
 */
class AppView extends View
{
	/**
	 * initialize
	 * @return void
	 */
	public function initialize()
	{
		$this->loadHelper('Form', [
			'templates' => [
				'inputContainer' => '<div class="form-group{{required}}">{{content}}</div>',
				'inputContainerError' => '<div class="form-group{{required}} has-error">{{content}}</div>'
			]
		]);
		// $this->loadHelper('Markdown.Markdown');
	}
// * - `beforeRender`
// * - `afterRender`
// * - `beforeLayout`
// * - `afterLayout`
	// public function beforeLayout(){}
	// public function afterLayout(){}
	// public function beginContent($layout = 'default'){}
	// public function endContent(){}
	// public function widget(){}
}
