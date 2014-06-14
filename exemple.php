<?php

include_once('cache.php');

$dbData = array(
	'id' => 1234,
	'name' => 'Categorie pentru incepatori',
	'description' => 'Aceasta este o categorie pentru incepatori, dar poate participa oricine',
	'status' => 1,
);

//Citeste un fisier cache
$data = mpCache::readCache('cacheFile-'.$dbData['id']);

if (!count($data)) {

	print 'Se scrie in cache';
	//Scrie un fisier cache
	mpCache::writeCache('cacheFile-'.$dbData['id'],$dbData);

} else {

	print "Se citeste din cache <br />";
	print_r($data);
}

//sterge un fisier cache
//mpCache::deleteCache('cacheFile-'.$dbData['id']);

?>