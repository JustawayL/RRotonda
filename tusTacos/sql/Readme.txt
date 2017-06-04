Readme.txt

IMPORTACIÓN:
0 Si se tenía la BD con anterioridad
1 para crear la BD, tablas y restricciones
2 Para llenar automáticamente con datos predefinidos






CAMBIO O ACTUALIZACIÓN:
Después de exportar a script desde StarUML se debe hacer lo siguiente:
1. Cambiar nombre de la BD (en archivo drop y create)
2. Cambiar palabras public por el nombre de la BD (en archivo tables create)
3. Cambiar tipo timestamps por Datetime
4. Colocar AUTO_INCREMENT donde corresponda
5. Colocar nombres de índices (Entre INDEX y ON)
6. Organizar comándos (Create, Alter, ...)
7. Quitar o adaptar comentarios a tablas o atributos
8. Opcionalmente colocar algunos comentarios SQL para organización

Lo que se aconseja es realizar los cambios puntuales para evitar todo el procedimiento
Y se prueben inmediatamente realizados