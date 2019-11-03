Rurality Kata
=============

En EscapadaRural nuestra misión es conectar al viajero con los propietarios de alojamientos rurales.

En esta kata queremos trabajar sobre la misión y para ello vamos a identificar un concepto clave para el negocio: la pre-reserva.

Negocio entiende pre-reserva (PreBooking) como la petición de contacto que un viajero envía a un propietario a través del formulario de contacto que hay en la web de EscapadaRural con el objetivo de obtener más detalles sobre el alojamiento, tales como precios, condiciones, etc.

Esta petición de contacto relaciona varios conceptos. Relacionamos el viajero (Traveler) con el propietario (Owner) y la casa rural sobre la cual se quiere pedir más información (Cottage). Además, este contacto contiene la fecha de entrada y fecha de salida que el viajero ha seleccionado, así como el número de personas que se quieren alojar y el tipo de pre-reserva (Estándar, Única y Cualificada).

Según el tipo de pre-reserva, negocio entiende que tiene diferente puntuación.
- Una pre-reserva Estándar equivale a 5 puntos.
- Una pre-reserva Única equivale a 15 puntos.
- Una pre-reserva Cualificada equivale a 35 puntos.


# El ejercicio

Modela el caso de uso en el que el viajero lanza la petición de contacto, se genera la pre-reserva con todos sus datos y puntuación y se persiste en una base de datos.

Cómo vamos a valorar el ejercicio:
- Consideramos que la prueba se puede terminar entre una y dos horas, pero el tiempo no nos importa, sino la calidad del resultado.
- Valoramos el código que cumple y refleja las reglas de negocio.
- Valoramos la simplicidad.
- El caso de uso debe estar testeado.
- Queremos que desarrolles pensando que el código va ser mantenido en los próximos años.
- Solamente queremos ver código PHP, no es necesario hacer consultas a base de datos, eso es un detalle de implementación.
- Si hay algo que crees que es muy mejorable pero crees que se te puede ir de tiempo (futuras mejoras) explícalo y lo valoraremos.
- Puedes utilizar el framework que quieras si así lo deseas, en tal caso añade una pequeña descripción explicando cómo ejecutar el programa y tests.
- Puedes utilizar la arquitectura que mejor creas que sirve al caso de uso.
- SOLID, Clean Code, KISS, DRY, YAGNI, DDD son bienvenidos.

Te hemos dejado una pequeña estructura para poder facilitarte el trabajo. ¡Te deseamos mucha suerte!

Si tienes instalado PHP 7.2 en tu ordenador lanza estos comandos y puedes empezar a programar!
```
$ php phars/composer.phar install 
$ php phars/phpunit.phar 
```

# OPCIONAL

En caso de que tengas un repositorio de GITHUB ANTERIOR  nuestra entrevisa y que consideras que puede demostrar lo mismo  que te pedimos en esta casa pásanoslo y, en ese caso, no hace falta que hagas la prueba técnica.

Si deseas hacer la prueba, cuando la termines, comprime el archivo en un ZIP y mandalo de vuelta.
Cualquier duda que tengas, contacta con nosotros y te la resolvemos.

¡Y muchas gracias por tu tiempo!
