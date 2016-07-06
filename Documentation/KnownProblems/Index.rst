.. include:: ../Includes.txt

.. _known-problems:

Known problems
--------------

If you have an issue, require support or want to contribute in any other way, please use GitHub_.


Duplicated open graph properties with extension bootstrap_package
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Try to add this TypoScript to your setup:

::

   // remove default properties by EXT:bootstrap_package^
   [globalVar = GP:tx_ttnews|tt_news > 0]
       page.meta {
           og:title >
           og:site_name >
           og:description >
           og:image >
       }
   [global]


.. _GitHub: https://github.com/jonathanheilmann/ext-jh_opengraph_ttnews