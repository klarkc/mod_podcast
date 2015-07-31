<?php 
// No direct access
defined('_JEXEC') or die;
JHtml::_('jquery.framework');
$document = JFactory::getDocument();

if(!empty($podcasts)):
$document->addScript('/media/mod_podcast/js/audiojs/audio.min.js');
$document->addScript('/media/mod_podcast/js/audiojs/audio.min.js');
$document->addStyleSheet('/media/mod_podcast/js/includes/audiojs.css');
$document->addStyleSheet('/media/mod_podcast/css/default.css');
?>
<script>
      jQuery(function() { 
        // Setup the player to autoplay the next track
        var a = audiojs.createAll({
          trackEnded: function() {
            var next = jQuery('.audiojs-wrapper ol li.playing').next();
            if (!next.length) next = jQuery('.audiojs-wrapper ol li').first();
            next.addClass('playing').siblings().removeClass('playing');
            audio.load(jQuery('a', next).attr('data-src'));
            audio.play();
          }
        });
        
        // Load in the first track
        var audio = a[0];
        var first = jQuery('.audiojs-wrapper ol a');
        jQuery('.audiojs-wrapper ol li').first().addClass('playing');
        audio.load(first.attr('data-src'));
		// Load readmore button
		var readmore = jQuery('.audiojs-wrapper .readmore');
        readmore.attr('href', first.attr('data-readmore'));
          
        // Load in a track on click
        jQuery('.audiojs-wrapper ol li').click(function(e) {
          e.preventDefault();
          jQuery(this).addClass('playing').siblings().removeClass('playing');
          audio.load(jQuery('a', this).attr('data-src'));
          audio.play();
          // Load readmore button
		  var readmore = jQuery(this).closest('.audiojs-wrapper').find('.readmore');
          readmore.attr('href', jQuery('a', this).attr('data-readmore'));
        });
      });
</script>
<div class="audiojs-wrapper">
<div class="player">
	<audio></audio>
	<a href="#" class="readmore"></a>
</div>
<ol class="playlist">
	<?php foreach($podcasts as $podcast): ?>
		<?php foreach($podcast['url'] as $url): ?>
		<li><?php echo '<a href="#" data-src="'.$url.'" data-readmore="'.$podcast['readmore'].'" title="'.htmlspecialchars($podcast['title']).'">'.htmlspecialchars($podcast['title']).'</a>'?></li>
		<?php endforeach; ?>
	<?php endforeach; ?>
</ol>
<p class="center"><a class="btn" href="/artigos-da-comunidade/63-podcasts">Mais Podcasts</a></p>
</div>
<?php
endif;
