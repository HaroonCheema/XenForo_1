<?php

namespace FS\BunnyIntegration\BbCode;


class Bunny
{


	public static function renderTagBunny($tagChildren, $tagOption, $tag, array $options, \XF\BbCode\Renderer\AbstractRenderer $renderer)
	{

		$explodeTagOptions = explode(',', $tagOption);

		$viewParams = [

			'libraryId' => $explodeTagOptions[0],
			'videoId' => $explodeTagOptions[1]
		];

		return $renderer->getTemplater()->renderTemplate('public:fs_buunyBBcodeRender', $viewParams);
	}
}
