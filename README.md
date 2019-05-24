# -Practica04-Mi-Correo-Electr-nico
### **CARRERA:** INGENIERIA DE SISTEMAS/COMPUTACIÓN. **ASIGNATURA:** HIPERMEDIAL
### **NRO. PRÁCTICA:** 4. **TITULO PRÁCTICA:** Resolución de problemas sobre PHP y MySQL.
### **OBJETIVO**:
   * Entender y organizar de una mejor manera los sitios de web en Internet 
   * Diseñar adecuadamente elementos gráficos en sitios web en Internet
   * Crear sitios web aplicando estándares actuales. 
  ### INSTRUCCIONES
  Con base al archivo*Práctica 04 – Creación de una aplicación web usando PHP y Base de Dato*, se pide realizar los siguientes ajustes: 
   a. Agregar roles a la tabla usuario. Un usuario puede tener un rol de “admin” o “user” 
   b. Los usuarios con rol de “admin” pueden únicamente: modificar, eliminar y cambiar la contraseña de cualquier usuario de la base de datos.
    c. Los usuarios con rol de “user” pueden modificar, eliminar y cambiar la contraseña de su usuario. 
 
Luego, con base a estos ajustes realizados, se pide desarrollar una aplicación web usando PHP y Base de Datos que permita gestionar 
(enviar y recibir) mensajes electrónicos entre usuarios de la aplicación. De los mensajes electrónicos se desea conocer la fecha y 
hora, remitente, destinatario, asunto y mensaje. Para lo cual, se pide como mínimo los siguientes requerimientos:

Usuario con rol de **user**:
    d. Visualizar en su página principal (index.php) el listado de todos los mensajes electrónicos   recibidos, ordenados por los más recientes.
    e. Visualizar el listado de todos los mensajes electrónicos enviados, ordenados por los más recientes.
    f. Enviar mensajes electrónicos a otros usuarios de la aplicación web.
    g. Buscar todos los mensajes electrónicos recibidos. La búsqueda se realizará por el correo del usuario remitente y se deberá aplicar Ajax para la búsqueda.
    h. Buscar todos los mensajes electrónicos enviados. La búsqueda se realizará por el correo del usuario destinatario y se deberá aplicar Ajax para la búsqueda. 
    i. Modificar los datos del usuario. 
    j. Cambiar la contraseña del usuario. 
    k. Agregar un avatar (fotografía) a la cuenta del usuario. 
Usuario con rol de **admin**: 
    l. No puede recibir ni enviar mensajes electrónicos. 
    m. Visualizar en su página principal (index.php) el listado de todos los mensajes electrónicos, ordenados por los más recientes. 
    n. Eliminar los mensajes electrónicos de los usuarios con rol “user”.
    o. Eliminar, modificar y cambiar contraseña de los usuarios con rol “user”. 
Por ultimo, se debe aplicar  parámetros de seguridad a través del uso de sesiones. Para lo cual, se debe tener en cuenta: 
     p. Un usuario “anónimo”, es decir, un usuario que no ha iniciado sesión puede acceder únicamente a los archivos de la carpeta pública. 
     q. Un usuario con rol de “admin” puede acceder únicamente a los archivos de la carpeta admin --> vista --> admin y admin --> controladores --> admin 
     r. Un usuario con rol de “user” puede acceder únicamente a los archivos de la carpeta admin --> vista --> user y admin --> controladores --> user 
 
 ![Estructura](https://aprende-web.net/css/objetos/diseno2.gif)
 <Figura 3. Diseño de un sitio web con base a tres columnas>
 
 De igual manera, se pide que se creé al menos tres archivos CSS, estos archivos estarán almacenados en una carpeta llamada css. Un archivo será para el diseño a dos columnas, otro archivo para el diseño a tres columnas, y los demás archivos será para la reglas CSS relacionas a textos, colores, tablas, secciones, artículos, etc.
 
También, se pide que se utilice selectores por etiquetas, selectores descendentes, selectores por clase y selectores por id. 

Luego, se pide que se personalicen al menos tres etiquetas para títulos (h1 – h6), tanto en color, tamaño, fuente, decoraciones, etc. 

Asimismo, se pide que se personalice todos los hipervínculos usando pseudo-clases. 

También, se pide que se cree un menú vertical (navegación) para todas las páginas. El menú debe tener bordes ovalados, con color de fondo y una separación entre cada menú de al menos 5px. 

De igual manera, se pide crear una nueva página HTML, en donde, se muestre un formulario de contacto que tenga los siguientes campos (nombre, correo electrónico, mensaje y botón para enviar)

Asimismo, se pide que se utilice una gama de máximo cinco colores (ver más, https://htmlcolorcodes.com/es/recursos/mejor-paleta-de-colores-generadores/). 

Finalmente, se pide que en toda la práctica existan al menos 50 reglas CSS. 

**No es permitido el uso de plantillas (CSS o HTML).

###  ACTIVIDADES A DESARROLLAR
 1. Crear un repositorio en GitHub con el nombre “Practica02 – Mi Sitio Web (CSS)” 
 2. Realizar un commit y push por cada requerimiento de los puntos antes descritos. 
 3. Al finalizar la práctica se debe validar todas las páginas HTML y hojas de estilos CSS creadas usando el W3C Validator. 
 4. Luego, se debe crear el archivo README del repositorio de GitHub. 
 5. Generar informe de los resultados en el formato de prácticas. Debe incluir:
     * El desarrollo de cada uno de los puntos antes descritos así como las reglas CSS utilizadas para resolver cada punto.
     * La evidencia del correcto diseño de las páginas HTML usando CSS. Para lo cuál, se puede generar fotografías instantáneas     (pantallazos).  
     * La evidencia de la validación de cada página HTML. 
     * La evidencia de la validación de las hojas de estilos CSS. 
     * El informe debe incluir conclusiones apropiadas.  
     * En el informe se debe incluir la información de GitHub (usuario y URL del repositorio de la práctica). 
     * En el informe se debe incluir la firma digital del estudiante. 
 6. En el archivo README del repositorio debe constar la misma información del informe de resultados de la práctica que se indica en el punto anterior. 
