#Switching and Scheduling of Home Appliances Based on Beaglebone Black and Android
In this project home appliances are controlled with the help of android app and 
this android app communicates with beaglebone black.

This reprository contain all the backend code of PHP which is executed on beaglebone
black and performs the tasks.

In this project we used PHP job scheduler which perform scheduled switching of
appliances, we can use CRONTAB for this scheduling but to reduce the complexity
of project we are using this utility.

Home Automation Major Project

1. Php Side scripting in this reprository.
2. Ping directory contain script by which app can check wether or not server is up by sending up a request to perticuler port on beaglebone.
3. Scripts folder contain php scripts used to connect to database and other importent scripts
4. root folder contain all the scripts which are the actual interface between App and Baglebone
