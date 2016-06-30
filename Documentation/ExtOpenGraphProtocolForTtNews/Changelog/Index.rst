

.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. ==================================================
.. DEFINE SOME TEXTROLES
.. --------------------------------------------------
.. role::   underline
.. role::   typoscript(code)
.. role::   ts(typoscript)
   :class:  typoscript
.. role::   php(code)


ChangeLog
---------

.. ### BEGIN~OF~TABLE ###

.. container:: table-row

   Version
         Version:

   Changes
         Changes:


.. container:: table-row

   Version
         0.1.4

   Changes
         \* render pdfs as image in og-property “image”

         \* last version to support TYPO3 CMS 4.5-6.1


.. container:: table-row

   Version
         0.1.3

   Changes
         \* added support for TYPO3 CMS 6.2 LTS


.. container:: table-row

   Version
         0.1.2

   Changes
         \* fixed mistake in changelog

         \* updated ext\_emconf.php

         \* updated manual


.. container:: table-row

   Version
         0.1.1

   Changes
         \* plugin.tt\_news.tx\_jhopengraphttnews\_pi1.nopic\_path supports the
         EXT: prefix now

         \* og:image is now forced to be prepended with a scheme and host

         \* bugfix for DAM support (thanks to Frank Nägler)


.. container:: table-row

   Version
         0.1.0

   Changes
         \* added hook for tt\_news to remember the rendering of a tt\_news
         SINGLE view (thanks to Bernhard Kraft)

         \* set extension-state zu stable

         \* added dependency to TYPO3 CMS

         \* updated manual


.. container:: table-row

   Version
         0.0.9

   Changes


.. container:: table-row

   Version
         0.0.8

   Changes
         \* bugfix: If there has been more than one image in a tt\_news record,
         'og:image' was broken. Now, the first image from tt\_news record is
         used.


.. container:: table-row

   Version
         0.0.7

   Changes
         \* remove all html-tags from description


.. container:: table-row

   Version
         0.0.6

   Changes


.. container:: table-row

   Version
         0.0.5

   Changes
         \* added DAM support and tidy og:description


.. container:: table-row

   Version
         0.0.4

   Changes
         \* added DAM support (thanks to cpl@world-direct.at)\* tidy
         og:description without <p>-tag attributes (thanks to cpl@world-
         direct.at)


.. container:: table-row

   Version
         0.0.3

   Changes
         \* added function 'strip\_tags()' to 'og:description' metatag


.. container:: table-row

   Version
         0.0.2

   Changes
         \* added icon

         \* added manual


.. container:: table-row

   Version
         0.0.10

   Changes
         \* better stripping of HTML tags for og:description (thanks to
         Bernhard Kraft < `kraft@web-consulting.at <mailto:kraft@web-
         consulting.at>`_ >)

         \* og:description is now truncated compatible to all UTF-8 chars
         (thanks to Bernhard Kraft < `kraft@web-consulting.at <mailto:kraft
         @web-consulting.at>`_ >)


.. container:: table-row

   Version
         0.0.1

   Changes
         \* Initial release.


.. ###### END~OF~TABLE ######


