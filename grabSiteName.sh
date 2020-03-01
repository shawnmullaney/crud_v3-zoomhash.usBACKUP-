#!/bin/bash
export SSHPASS='Badtimefloatstore6'
grepper=$1

hostname=$(sshpass -e ssh shawnm@10.0.0.5 hostname)
echo "$hostname"
