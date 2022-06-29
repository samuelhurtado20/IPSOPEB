#!/bin/bash

###################################################################################
# Copyright  2005-2012 Sergio González Durán (sergio.gonzalez.duran@gmail.com)
# Se concede permiso para copiar, distribuir y/o modificar este programa siempre 
# y cuando se cite al autor y la fuente de linuxtotal.com.mx y según los términos 
# de la GNU General Public License, Versión 3 o cualquiera
# posterior publicada por la Free Software Foundation.
####################################################################################

# fecha y hora, ejemplo 20110920_2300
# archivo termina como 'mysql_20110920_2300.sql.gz'

fecha=`date +%d-%m-%Y_%h-%M`
archivo="mysql_$fecha.sql.gz"

# elimina la opción --master-data si tu servidor no es maestro en replicación

mysqldump --user=root --password=18623532 --all-databases | gzip > respaldos/$archivo && \
echo "Respaldo realizado exitosamente el `date`" >> bitacora.txt

#adicionalmente si se tiene otro servidor linux, copiamos el archivo ya
#generado de respaldo por medio de scp de ssh y asi aseguramos que el 
#respaldo este en otra locación, logrando redundancia (en los artículos
#relacionados chécate "Autentifiación SSH con llave privada")
# El usuario que ejecuta el comando es 'userdba' que existe en ambos servidores

su -c "scp -pq /ruta/a/respaldos/$archivo 192.168.1.100:/ruta/a/respaldosmysql/." userdba \
&& echo "Copia a servidor remoto se completo con exito el `date`" >> /ruta/a/bitacora.txt