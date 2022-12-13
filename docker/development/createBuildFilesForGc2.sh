#!/bin/bash

# Before running the script!: Checkout your development branch below.
# Description: This script creates build files, install the dashboard and extensions for the GC2 backend.
#              You have to run the script inside the gc2core image.
# Extensions: Add your fork of the extension below.
# Run script: sh createBuildFilesForGc2.sh.

# Fetch tags from the fork and checkout latest release version or
# checkout your development branch
cd /var/www/geocloud2 &&\
  git fetch --tags &&\
  git checkout tags/2022.11.0

# Install npm packages run Grunt
cd /var/www/geocloud2 &&\
  npm ci &&\
  grunt production

# Install dashboard
mkdir -p /var/www/geocloud2/public/dashboard && mkdir /dashboardtmp && cd /dashboardtmp &&\
    git clone https://github.com/mapcentia/dashboard.git && cd /dashboardtmp/dashboard &&\
    npm install && cp ./app/config.js.sample ./app/config.js && cp ./.env.production ./.env &&\
    npm run build && cp -R ./build/* /var/www/geocloud2/public/dashboard/ &&\
    rm -R /dashboardtmp

# Install extensions and add your own fork if you are going to develope on an extension
# cd /var/www/geocloud2/app/extensions && git clone https://github.com/[add your github user name]/vidi_cookie_getter.git

# Add the custom config files from the Docker repo.
cp -fR ./docker/development/conf/App.php ./app/conf/
cp -fR ./docker/development/conf/Connection.php ./app/conf/
