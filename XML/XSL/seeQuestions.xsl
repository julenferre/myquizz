<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/">
		<HTML>
			<HEAD>
				<link rel='stylesheet' type='text/css' href='../CSS/style.css'></link>
			</HEAD>
			<BODY>
				<table>
					<tr><td><b>Galdera</b></td><td><b>Konplexutasuna</b></td><td><b>Gaia</b></td></tr>	
					<xsl:for-each select="/assessmentItems/assessmentItem">
						<tr>
							<td>
								<FONT SIZE="2" COLOR="red" FACE="Verdana">
									<xsl:value-of select="itemBody/p"/>
								</FONT>
							</td>
							<td>
								<FONT SIZE="2" COLOR="blue" FACE="Verdana">
									<xsl:value-of select="@complexity"/>
								</FONT>
							</td>
							<td>
								<FONT SIZE="2" COLOR="green" FACE="Verdana">
									<xsl:value-of select="@subject"/>
								</FONT>
							</td>
						</tr>
					</xsl:for-each>
				</table>
			</BODY>
		</HTML>
	</xsl:template>
</xsl:stylesheet>