#!/bin/bash

# untar data folder
echo
echo "Uncompressing files"
tar -xzvf data.tar.gz
tar -xzvf styles.tar.gz


# start up sequence
echo
echo "Starting boot process:"
for var in \`env|cut -f1 -d=\`; do
  echo "PassEnv \$var" >> /app/apache/conf/httpd.conf;
done
touch /app/apache/logs/error_log
touch /app/apache/logs/access_log
tail -F /app/apache/logs/error_log &
tail -F /app/apache/logs/access_log &
export LD_LIBRARY_PATH=/app
export PHP_INI_SCAN_DIR=/app
echo "Launching apache"
exec /app/apache/bin/httpd -DNO_DETACH
EOF
