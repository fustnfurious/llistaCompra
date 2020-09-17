#!/bin/bash
sudo systemctl start mysql;
mysql -u root -p < codi/init.sql
printf "Creant DB...\n"
printf "Fet!\n"
echo "Escriu els noms de les persones que viuen al pis separats per comes: "
read stringNoms
echo "Escriu els productes que compartiu separats per comes: "
read stringProductes
echo $stringNoms > codi/persones.txt
echo $stringProductes > codi/productes.txt
printf "\nInicialitzant DB...\n"
php codi/initDB.php
printf "\nFet!\n"
printf "Copiant arxius a la carpeta del servidor..."
sudo cp codi/quiProd.php /var/www/html/quiProd.php
sudo cp codi/enviaCompra.php /var/www/html/enviaCompra.php
sudo cp codi/llistaCompra.js /var/www/html/llistaCompra.js
sudo cp codi/esborraCompra.php /var/www/html/esborraCompra.php
sudo cp codi/llistaProductes.php /var/www/html/llistaProductes.php
sudo cp codi/ultimesCompres.php /var/www/html/ultimesCompres.php
sudo cp codi/llistaCompra.html /var/www/html/index.html
sudo cp codi/opcionsCompraPers.php /var/www/html/opcionsCompraPers.php
sudo cp codi/opcionsCompra.php /var/www/html/opcionsCompra.php
sudo cp codi/llistaCompra.css /var/www/html/llistaCompra.css
printf "\nFet!\n"
printf "Si no han sortit errors raros ja hauria de funcionar :) \n"
