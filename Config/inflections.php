<?php

/**
 * Dutch inflections
 *
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @author Noud deBROUWER <noud4@home.com>
 * @license http://www.opensource.org/licenses/mit-license.php The MIT License
 */

# http://nl.wikipedia.org/wiki/Klinker_%28klank%29
$klinker = '(a|e|i|o|u|ij)';
$korteKlinker = '(u|i|e|a|o)';	#	XXX '(ie|oe)'. $plofKlank

# http://nl.wikipedia.org/wiki/Medeklinker
$plofKlank = '(p|t|k|b|d)';
$wrijfKlank = '(f|s|ch|sj|v|z|g|j)';	# journaal
$neusKlank = '(m|n|ng)';
$vloeiKlank = '(l|r)';
$glijKlank = '(j|w)';			# jaar
$affricate = '(ts|zz|tsj|g)';		# /d3/ gin
$missingFromWiki = '(c|h|p|q|x|y|z)';
$medeklinker = '(' . $missingFromWiki . '|' . $plofKlank . '|' . $wrijfKlank . '|' . $neusKlank . '|' . $vloeiKlank . '|' . $glijKlank . '|' . $affricate . ')';

$singulareTantum = array(
	# http://nl.wikipedia.org/wiki/Singulare_tantum
	'letterkunde', 'muziek', 'heelal',
	'vastgoed','have','nageslacht',
	# extras..
	'feedback','schema_migrations',
);
# http://nl.wikipedia.org/wiki/Plurale_tantum
$pluraleTantum = array(
	'hersenen','ingewanden',
	'mazelen','pokken','waterpokken',
	'financiën','activa','passiva','onkosten','kosten','bescheiden','paperassen','notulen',
	'Roma','Sinti','Inuit','taliban','illuminati',
	'aanstalten','hurken','lurven','luren',
	# extras..
	'schema_migrations',
);

Inflector::rules('singular', array(
	'rules' => array(
		# http://nl.wikipedia.org/wiki/Meervoud_(Nederlands)#Beroepen_eindigend_op_-man
		'/()mannen$/i' => '\1man',
		# http://nl.wikipedia.org/wiki/Meervoud_(Nederlands)#Latijnse_meervoudsvormen
		'/()ices$/i' => '\1ex',
		# http://nl.wikipedia.org/wiki/Meervoud_%28Nederlands%29#Stapelmeervoud
		'/^(ei|gemoed|goed|hoen|kind|lied|rad|rund)eren$/i' => '\1',
		# http://nl.wikipedia.org/wiki/Nederlandse_grammatica
		'/()ijen$/i' => '\1ij',
		'/()ieen$/i' => '\1ie',	#ën
		'/()(' . $klinker . ')s$/i' => '\1\2',
		'/()(' . $medeklinker . ')en$/i' => '\1\2',
	),
	'uninflected' => $pluraleTantum,
	'irregular' => array(
		# http://nl.wikipedia.org/wiki/Meervoud_(Nederlands)#Latijnse_meervoudsvormen
		'qaestrices' => 'quaestrix',
		'matrices' => 'matrix',
		'schema_migrations' => 'schema_migration',
	)
));

Inflector::rules('plural', array(
	'rules' => array(
		# allready in plural
		'/()ijen$/i' => '\1ijen',
		'/()ieën$/i' => '\1ieën',
		'/()(' . $klinker . ')s$/i' => '\1\2s',
		'/()' . $medeklinker . 'en$/i' => '\1\2en',
		# http://nl.wikipedia.org/wiki/Meervoud_%28Nederlands%29#Klinkerverandering
		'/()heid$/i' => '\1heden',
		# http://nl.wikipedia.org/wiki/Meervoud_(Nederlands)#Beroepen_eindigend_op_-man
		'/()man$/i' => '\1mannen',
		# http://nl.wikipedia.org/wiki/Meervoud_(Nederlands)#Latijnse_meervoudsvormen
		'/()ix$/i' => '\1ices',
		'/()ex$/i' => '\1ices',
		# http://nl.wikipedia.org/wiki/Meervoud_%28Nederlands%29#Stapelmeervoud
		'/^(ei|gemoed|goed|hoen|kind|lied|rad|rund)$/i' => '\1eren',
		# http://nl.wikipedia.org/wiki/Nederlandse_grammatica
		'/()ij$/i' => '\1ijen',
		'/()orie$/i' => '\1orieen',	#ën klemtoon
		'/()io$/i' => '\1io\'s',
		'/()' . $klinker . '$/i' => '\1\2s',
		'/()(' . $medeklinker . 'e' . $medeklinker . ')$/i' => '\1\2s',
		'/()(' . $medeklinker . $korteKlinker . 's)$/i' => '\1\2sen',
		'/()(' . $medeklinker . 's)$/i' => '\1\2en',
		'/()s$/i' => '\1zen',
		'/()' . $medeklinker . '$/i' => '\1\2en',
	),
	'uninflected' => $singulareTantum,
	'irregular' => array(
		# http://nl.wikipedia.org/wiki/Klemtoon
		'olie' => 'oliën',
		'industrie' => 'industrieën',
		# http://nl.wikipedia.org/wiki/Meervoud_%28Nederlands%29#Klinkerverandering
		'lid' => 'leden',
		'smid' => 'smeden',
		'schip' => 'schepen',
		'stad' => 'steden',
		'gelid' => 'gelederen',
		# http://nl.wikipedia.org/wiki/Meervoud_%28Nederlands%29#Stapelmeervoud
		'gelid' => 'gelederen',
		'kalf' => 'kalveren',
		'lam' => 'lammeren',
		# http://nl.wikipedia.org/wiki/Meervoud_%28Nederlands%29#Onregelmatige_meervoudsvorming
		'koe' => 'koeien',
		'vlo' => 'vlooien',
		'leerrede' => 'leerredenen',
		'lende' => 'lendenen',
		'epos' => 'epen',
		'genius' => 'geniën',
		'aanbod' => 'aanbiedingen',
		'beleg' => 'belegeringen',
		'dank' => 'dankbetuigingen',
		'gedrag' => 'gedragingen',
		'genot' => 'genietingen',
		'lof' => 'lofbetuigingen',
		'schema_migration' => 'schema_migrations',
	),
));

unset($klinker, $korteKlinker);
unset($medeklinker, $missingFromWiki, $plofKlank, $wrijfKlank, $neusKlank, $vloeiKlank, $glijKlank, $affricate);
unset($singulareTantum, $pluraleTantum);

# http://nl.wiktionary.org/wiki/WikiWoordenboek:De_Kroeg

# https://github.com/jrbasso/cake_ptbr/blob/master/Config/inflections.php
# https://github.com/josegonzalez/inflection
