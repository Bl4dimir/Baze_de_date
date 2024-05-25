<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" indent="yes"/>

    <xsl:template match="/hotels">
        <html lang="en">
            <head>
                <title>Baza de date admin</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        margin: 0;
                        padding: 0;
                    }
                    h1 {
                        text-align: center;
                        margin-top: 20px;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-top: 20px;
                        background-color: #fff;
                        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
                    }
                    th, td {
                        padding: 15px;
                        text-align: left;
                    }
                    th {
                        background-color: #007bff;
                        color: #fff;
                        font-weight: bold;
                        text-transform: uppercase;
                    }
                    tr:nth-child(even) {
                        background-color: #f2f2f2;
                    }
                    img {
                        width: 100px;
                        height: auto;
                        display: block;
                        margin: 0 auto;
                    }
                    .back-button {
                        display: block;
                        text-align: center;
                        margin-top: 20px;
                    }
                </style>
            </head>
            <body>
                <a href="index.php" class="back-button">Inapoi</a>
                <table>
                    <tr>
                        <th>Nume</th>
                        <th>Adresă</th>
                        <th>Camere Libere</th>
                        <th>Stele</th>
                        <th>Pret pe Noapte</th>
                        <th>Imagine</th>
                    </tr>
                    <xsl:apply-templates select="hotel"/>
                </table>
                
            </body>
        </html>
    </xsl:template>

    <xsl:template match="hotel">
        <tr>
            <td><xsl:value-of select="nume"/></td>
            <td><xsl:value-of select="adresa"/></td>
            <td><xsl:value-of select="camere_libere"/></td>
            <td><xsl:value-of select="stele"/></td>
            <td><xsl:value-of select="pret_pe_noapte"/></td>
            <td><img src="{imagine}" alt="Imagine hotel"/></td>
        </tr>
    </xsl:template>
</xsl:stylesheet>
