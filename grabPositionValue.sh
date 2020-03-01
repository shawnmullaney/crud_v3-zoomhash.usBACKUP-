#!/bin/bash
function makeList {
total=0

rm -r positionList.txt 2>/dev/null
for container in {1..16}; # of containers deployed
do
	for rack in {1..9}; # of racks to loop thru ex: start..end
	do
		rackTotal=0
		for shelf in {1..5};  # of shelves on the rack  ex: 1..5 means shelves start at 1 and go up to 5
		do
			for column in {1..5}    # NUMBER OF slots on the shelf. 
			do
				let "rackTotal+=1"
				let "total+=1"     
				position="$container-$rack-$shelf-$column" # 1-1-1-1
				ipVar="10.$container.$rack.$rackTotal" # 10.x.x.x
				echo $position >> positionList.txt
			done
		done
	done    		
done	
}

if [ -e positionList.txt ]; then
	echo "null" > /dev/null
else
	makeList
fi

IFS=$'\n' read -d '' -r -a array < positionList.txt
for x in "$@"
do
    echo "${array[x]}"
done
