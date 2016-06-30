.. include:: ../Includes.txt

.. _changeLog:

ChangeLog
=========

1.0.0
-----

\* Read upgrade to :ref:`admin-upgrade-1000000` before updating!

\* Removed support for TYPO3 CMS 4.5

\* Added support for TYPO3 CMS 7 LTS

\* Re-written complete code

\* Added typoscript property "enableForWhatToDisplay" (see Configuration)

\* Added some new og properties


0.1.4
-----

\* render pdfs as image in og-property “image”

\* last version to support TYPO3 CMS 4.5-6.1


0.1.3
-----

\* added support for TYPO3 CMS 6.2 LTS


0.1.2
-----

\* fixed mistake in changelog

\* updated ext\_emconf.php

\* updated manual


0.1.1
-----

\* plugin.tt\_news.tx\_jhopengraphttnews\_pi1.nopic\_path supports the
EXT: prefix now

\* og:image is now forced to be prepended with a scheme and host

\* bugfix for DAM support (thanks to Frank Nägler)


0.1.0
-----

\* added hook for tt\_news to remember the rendering of a tt\_news
SINGLE view (thanks to Bernhard Kraft)

\* set extension-state zu stable

\* added dependency to TYPO3 CMS

\* updated manual


0.0.10
------

\* better stripping of HTML tags for og:description (thanks to
  Bernhard Kraft < `kraft@web-consulting.at <mailto:kraft@web-consulting.at>`_ >)

\* og:description is now truncated compatible to all UTF-8 chars
(thanks to Bernhard Kraft < `kraft@web-consulting.at <mailto:kraft
@web-consulting.at>`_ >)


0.0.9
-----

\*


0.0.8
-----

\* bugfix: If there has been more than one image in a tt\_news record,
'og:image' was broken. Now, the first image from tt\_news record is
used.


0.0.7
-----

\* remove all html-tags from description


0.0.6
-----

\*


0.0.5
-----

\* added DAM support and tidy og:description


0.0.4
-----

\* added DAM support (thanks to cpl@world-direct.at)\* tidy
og:description without <p>-tag attributes (thanks to cpl@world-
direct.at)


0.0.3
-----

\* added function 'strip\_tags()' to 'og:description' metatag


0.0.2
-----

\* added icon

\* added manual


0.0.1
-----

\* Initial release.


