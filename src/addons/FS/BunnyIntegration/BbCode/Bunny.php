<?php

namespace FS\BunnyIntegration\BbCode;


class Bunny
{


	public static function renderTagBunny($tagChildren, $tagOption, $tag, array $options, \XF\BbCode\Renderer\AbstractRenderer $renderer)
	{
		// $explodeTagOptions = explode(',', $tagOption);

		if (!$tag['option']) {
			return '';
		}

		if (!$tagChildren) {
			return self::renderDefaultImage();
		}


		$viewParams = [

			'libraryId' => $tagOption,
			'videoId' => $tagChildren ? $tagChildren[0] : '',
		];

		return $renderer->getTemplater()->renderTemplate('public:fs_buunyBBcodeRender', $viewParams);
	}


	protected static function renderDefaultImage(): string
	{
		// $router = \XF::app()->router('public');
		// $imageUrl = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQU0OzynfNC8uJGfy4kgCk1b_-anGsKn2CMJtOQapz5zMSadIaOwOkwp4ylZDBTe29WNTg&usqp=CAU';
		$imageUrl = 'styles/FS/BunnyIntegration/BunnyVideoDefaultImage.gif';


		// styles/FS/AuctionPlugin/no_image.png

		$imageHtml = '<div>';

		$imageHtml =  '<img src="' . $imageUrl . '" height=315 width=560/>';

		$imageHtml .= '</div>';

		return $imageHtml;
	}
}
