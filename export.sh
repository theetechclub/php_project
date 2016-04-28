#!/bin/bash

echo 66 > /sys/class/gpio/export

echo "Export done"


chown :www-data /sys/class/gpio/gpio66/direction
chown :www-data /sys/class/gpio/gpio66/value

echo "Owner done"

chmod g+rw /sys/class/gpio/gpio66/direction
chmod g+rw /sys/class/gpio/gpio66/value

echo "Chmod done"
