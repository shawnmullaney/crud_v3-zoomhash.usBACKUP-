#!/bin/bash
export SSHPASS='poopoo11'
grepper=$1

newIp=$(sshpass -e ssh scripteduser@10.0.0.5 cat /var/log/syslog | grep -i $grepper | head -1 | awk '{print $8}' | tr -d '\0')
if [ -z ${newIp+x} ]; then
	newIp=$(sshpass -e ssh scripteduser@10.0.0.5 cat /var/log/syslog.1 | grep -i $grepper | head -1 | awk '{print $8}'  | tr -d '\0')
fi
echo "$newIp"



#nmap -sT -PN 192.168.0.0/24 > /dev/null 2>&1
#ARG="/$1/"
#cat /proc/net/arp |awk $ARG' {print $1}'
