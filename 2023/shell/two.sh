!#/bin/bash
grep -v "([2-9][0-9]|1[3-9]) red|([2-9][0-9]|1[4-9]) green|([2-9][0-9]|1[5-9]) blue" aoc2-full | awk -F'[ :]' '{sum+=$2} END {print sum}'
