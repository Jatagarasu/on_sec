rm -rf var/cache/*
rm -rf var/logs/*
rm -rf var/sessions/*

FOLDERS="var/cache var/logs var/sessions web/pdf web/images"

HTTPDUSER=`ps aux | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`
sudo chmod +a "$HTTPDUSER allow delete,write,append,file_inherit,directory_inherit" $FOLDERS
sudo chmod +a "`whoami` allow delete,write,append,file_inherit,directory_inherit" $FOLDERS
