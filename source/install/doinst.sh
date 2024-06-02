#!/bin/bash
BOOT="/boot/config/plugins/nafp"
DOCROOT="/usr/local/emhttp/plugins/nafp"

# Update file permissions of scripts
chmod 755 $DOCROOT/scripts/*
chmod 755 $DOCROOT/event/*
chmod 755 /etc/rc.d/rc.nafp

# copy the default
cp -n $DOCROOT/default.cfg $BOOT/nafp.cfg >/dev/null 2>&1

# create AFP directory
if [ ! -d /etc/netatalk ]; then
    mkdir /etc/netatalk
fi

# prepare conf backup directory on flash drive, if it does not already exist
if [ ! -d $BOOT/netatalk ]; then
    mkdir $BOOT/netatalk
fi

# copy default conf files to flash drive, if no backups exist there
cp -nr $DOCROOT/netatalk/* $BOOT/netatalk >/dev/null 2>&1

# copy conf files from flash drive to local system, for our services to use
cp -rf $BOOT/netatalk/* /etc/netatalk >/dev/null 2>&1

# set up permissions
if [ -d /etc/netatalk ]; then
    echo "Updating permissions for AFP..."
    chown root:root /etc/netatalk
    chmod 755 /etc/netatalk
    chown root:root /etc/netatalk/*
    chmod 644 /etc/netatalk/*
fi
