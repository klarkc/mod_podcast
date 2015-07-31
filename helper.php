<?php

if(!class_exists('ContentHelperRoute')) require_once (JPATH_SITE . '/components/com_content/helpers/route.php'); 

/**
 * Helper class for Podcast module
 * 
 * @package    GuildWars2Brasil.Modules
 * @subpackage Modules
 * @license        GNU/GPL, see LICENSE.php
 * mod_helloworld is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
class modPodcastHelper
{
    /**
     * Retrieves the podcasts array
     *
     * @param array $params An object containing the module parameters
     * @access public
     */    
    public static function getPodcasts( $params )
    {
	$podcasts = array();
	$db = JFactory::getDbo();

	$query = $db->getQuery(true);
	$query->select('*');
	$query->from('#__content');
	$query->where('catid="'.$params->get('categories').'"');
	$query->order('ordering ASC');
	$query->setLimit($params->get('limit'));

	$db->setQuery((string)$query);
	$articles = $db->loadObjectList();

	foreach($articles as $article) {
		$podcast = modPodcastHelper::getPodcast($article);
		if($podcast) $podcasts[] = $podcast;
	}

	return $podcasts;
    }

    /**
     * Retrieves a podcast from a article
     *
     * @param array $article An object containing the article parameters
     * @access public
     */
    public static function getPodcast( $article )
    {	
	$podcast = array(
			'url' => array(),
			'readmore' => JRoute::_(ContentHelperRoute::getArticleRoute($article->id, $article->catid)),
			'title' => $article->title,
			'article_id' => $article->id,
			'catid' => $article->catid,
			'created' => $article->created,
			'created_by' => $article->created_by,
			'created_by_alias' => $article->created_by_alias,
			'modified' => $article->modified,
			'modified_by' => $article->modified_by,
			'images' => $article->images,
		);
	if(preg_match('/{podcast}.*{\/podcast}/', $article->fulltext, $urls)>0) {
		$urls = str_replace('{podcast}', '', $urls);
		$urls = str_replace('{/podcast}', '', $urls);
		$podcast['url'] = $urls;
		return $podcast;
	} else {
		return null;
	}
    }
}
