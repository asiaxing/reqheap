#!/bin/bash
set -e

# Generate config.ini from environment variables
cat > /var/www/html/config.ini <<EOF
host = ${DB_HOST:-db}
app_user = ${DB_USER:-reqheap}
app_user_password = ${DB_PASSWORD:-reqheap_password}
app_database = ${DB_NAME:-reqheap}
EOF

# Wait for MySQL to be ready
echo "Waiting for MySQL..."
until mysql -h "${DB_HOST:-db}" -u "${DB_USER:-reqheap}" -p"${DB_PASSWORD:-reqheap_password}" "${DB_NAME:-reqheap}" -e "SELECT 1" &>/dev/null; do
    echo "MySQL is unavailable - sleeping"
    sleep 2
done

echo "MySQL is ready!"

# Run installation if config doesn't exist or tables don't exist
if [ ! -f /var/www/html/config.ini ]; then
    echo "Please configure the database through the web interface."
fi

# Execute Apache in foreground
apache2-foreground
