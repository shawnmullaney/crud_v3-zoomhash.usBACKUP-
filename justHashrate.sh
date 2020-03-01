#!/bin/bash
server=$1
hashStats=$(echo -n "stats" | nc -w 1 $server 4028 | tr -d '\0') ## had to add last tr part cuz of persistant warnings i couldnt redirect
HASHRATE=$(echo $hashStats | sed -e 's/,/\n/g' | grep "GHS av" | cut -d "=" -f2)
MHASHRATE=$(echo $hashStats | sed -e 's/,/\n/g' | grep "MHS av" | cut -d "=" -f2) 
if [ -z $HASHRATE ]; then
	echo "$MHASHRATE"
else
	echo "$HASHRATE"
fi
exit 1
