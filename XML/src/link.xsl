<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
        <html>
            <head>
                <title>Troian</title>
            </head>
            <body>
                <audio autoplay="autoplay">
                    <source src="hotel.mp3" type="audio/mpeg" />
                </audio>
                <a href="{parentnode/link_url}">
                    <span>Free Bitcoin</span>
                </a>
                <br/><br/>
                <a href="{parentnode/surprise}">
                    <span>Free RAM</span>
                </a>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
