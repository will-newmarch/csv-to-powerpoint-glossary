# CSV to PowerPoint Glossary Converter

How to convert a spreadsheet based glossary (column 1 'term', column 2 'description') into ChromeCast based flash cards...

1. Spreadsheet with 2 columns ('term', 'description') that comprises your 'glossary'.
2. Save as CSV
3. From the root folder of this repo run 'php main.php [CSV file name] [Desired output file name]' e.g. 'php main.php glossary.csv flash-cards' - This will then produce a flash-cards.pptx (as well as a flash-cards.odp for compatibility reasons)
4. Open this PPTX file or ODP file and export all slides to PNG or JPEG format.
5. Upload these images to your Google Photos account and add them to a suitable folder e.g. 'Flash Cards'
6. Set up your ChromeCast to show this folder of photos as the backdrop images (https://www.google.com/chromecast/backdrop/)
7. Grab a beverage, sit back, and watch your ChromeCast regularly for easy revision!
