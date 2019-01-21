RSS-CSV
================

Source
------------
https://github.com/Keri2707/rss-csv.git

Description
------------
This CLI app downloads certain information from the website example (http://feeds.nationalgeographic.com/ng/News/News_Main)  and saves it to a csv file.

Two download modes are available: 

"csv:simple" - writes data to the file replacing old data.

"csv:extended" - writes data to the file appending new ones.

Installation and usage
------------
To use this CLI app download the package from https://github.com/Keri2707/rss-csv.git, update composer and write command in the console.

Command scheme - 4 arguments are available and necessarily to write in console:

"startup file source", "download mode", "url", "example file name"


Arguments
------------

"startup file source" - "src/console.php"

"download mode" - "csv:simple" or "csv:extended"

"url" - "http://feeds.nationalgeographic.com/ng/News/News_Main"

"example file name" - "simple_export.csv"

Commands
------------

command to download simple csv - "php src/console.php csv:simple http://feeds.nationalgeographic.com/ng/News/News_Main simple_export.csv" 

command to download extended csv - "php src/console.php csv:extended http://feeds.nationalgeographic.com/ng/News/News_Main extended_export.csv" 


Testing
-------
$ phpunit