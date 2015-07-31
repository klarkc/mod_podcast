# mod_podcast
A Joomla podcast player module for related content in articles

# Requeriments
* [Joomla 3.0](http://www.joomla.org/download.html)

# Install
* Download the [latest stable release](https://github.com/klarkc/mod_podcast/releases)
* Go to Extensions -> Extension Manager to install your package

# Usage
* Go to Extensions -> Module Manager, click on Podcast module
* Insert the categories of joomla articles where your podcast articles will be stored
* Set the limit of podcasts in the module
* Create articles, and use the tag podcast with url to the audio file, eg: `{podcast}http://example.com/link_to_audio_file.mp3{/podcast}`.
* The plugin is not finished, so you need manually hide the podcast tag in your article (use your editor or css `display: none`).