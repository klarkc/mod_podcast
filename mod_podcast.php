<?php
/**
 * Podcast Module Entry Point
 * 
 * @package    GuildWars2Brasil.Modules
 * @subpackage Modules
 * @license        GNU/GPL, see LICENSE.php
 * mod_podcast is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
 
// no direct access
defined('_JEXEC') or die;
// Include the syndicate functions only once
require_once( dirname(__FILE__) . '/helper.php' );
require_once (JPATH_SITE . '/components/com_content/helpers/route.php'); 
 
$podcasts = modPodcastHelper::getPodcasts($params);

$more_url = $params->get('more_url');
if($more_url=="") {
    $categories = $params->get('categories');
    $more_url = JRoute::_(ContentHelperRoute::getCategoryRoute($categories));
}

$more_title = $params->get('more_title');

require( JModuleHelper::getLayoutPath('mod_podcast'));
?>
