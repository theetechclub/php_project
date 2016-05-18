#!/bin/bash

echo 66 > /sys/class/gpio/export
echo 69 > /sys/class/gpio/export
echo 45 > /sys/class/gpio/export

echo "Export done"


chown :www-data /sys/class/gpio/gpio66/direction
chown :www-data /sys/class/gpio/gpio66/value
chown :www-data /sys/class/gpio/gpio69/direction
chown :www-data /sys/class/gpio/gpio69/value
chown :www-data /sys/class/gpio/gpio45/direction
chown :www-data /sys/class/gpio/gpio45/value

echo "Owner done"

chmod g+rw /sys/class/gpio/gpio66/direction
chmod g+rw /sys/class/gpio/gpio66/value
chmod g+rw /sys/class/gpio/gpio69/direction
chmod g+rw /sys/class/gpio/gpio69/value
chmod g+rw /sys/class/gpio/gpio45/direction
chmod g+rw /sys/class/gpio/gpio45/value

echo "Chmod done"
