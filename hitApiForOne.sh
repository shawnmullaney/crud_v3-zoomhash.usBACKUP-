#!/bin/bash

function hashrates {
	hashServer=$1
	hashStats=$(echo -n "stats" | nc -w 1 $hashServer 4028 | tr -d '\0')
	HASHRATE=$(echo $hashStats | sed -e 's/,/\n/g' | grep "GHS av" | cut -d "=" -f2)
	MHASHRATE=$(echo $hashStats | sed -e 's/,/\n/g' | grep "MHS av" | cut -d "=" -f2) 
	if [ -z $HASHRATE ]; then
		echo "$MHASHRATE"
	else
		echo "$HASHRATE"
	fi
} 
	id=$1
	mac=$(mysql -ss -u root -p'Frostfiredragon1!!' -h zoomhash.us -Dminersdb -e "SELECT macAddress FROM miners WHERE id='$1';")
	currentIp=$(./ipFromMac.sh $mac)
	if [ -z ${currentIp+x} ]; then
		currentIp=$(./ipFromDhcp.sh $mac)
	fi
	currentTemp=$(./tempsApi.sh $currentIp | head -1)
	currentHashrate=$(./justHashrate.sh $currentIp)
	if [ -z ${currentHashrate+x} ]; then
		currentHashrate=$(./justHashrate.sh $currentIp)	
	fi
	connector="mysql -u root -p'Frostfiredragon1!!' -h zoomhash.us -Dminersdb -e" 
	#updateHash="UPDATE miners SET hashrate = '$currentHashrate' WHERE id='$id';"
	
	updateBoth="\"UPDATE miners SET maxTemp = '$currentTemp', hashrate = '777' WHERE id='$id';\""
	conCat="$connector $updateBoth"
	#$(echo -n $conCat)
	mysql -u root -p'Frostfiredragon1!!' -h zoomhash.us -Dminersdb -e $updateBoth
	#echo "$connector $updateHash" |tee -a >> logger
	#updateMaxTemp="UPDATE miners SET maxTemp = '$currentTemp' WHERE id='$id';"
	#echo "$connector $updateMaxTemp" |tee -a >> logger
	#updateUptime="mysql -u root -p'Frostfiredragon1!!' -h zoomhash.us -Dminersdb -e "UPDATE miners SET uptime = '$currentUptime' WHERE id='$id';""
	#echo "$updateUptime" |tee -a >> logger
	#updateIp="UPDATE miners SET minerIp = '$currentIp' WHERE id='$id';"
	#echo "$connector $updateIp" 

