# World Solar Pro - Prospects WordPress CRUD + Custom Post Type + ACF Fields with API REST
.\
Complicado título, ¿no?\
.\
Básicamente este proyecto es un CRUD en donde los usuarios que están dentro de la plataforma ya matriculados, tienen la posibilidad de añadir prospectos, estos prospectos son a la vez Custom Post Type, en donde podemos identificar quién creó esto, es necesario para hacer funcionar esto, añadir las funcionalidades que son crear, leer, actualizar y eliminar a un suscriptor, para esto instalamos plugin [User Role Editor](https://wordpress.org/plugins/user-role-editor/), para permitirle al suscriptor realizar estas consultas para este tipo de post.\
.\
Por otro lado, usamos dos plugins para añadirle campos de formulario a cada prospecto en donde se guardan los datos, el plugin fue [Advanced Custom Fields](https://es.wordpress.org/plugins/advanced-custom-fields/) y usamos una extensión para que este usara su rest api en la versión v2 [ACF To Rest Api](https://es.wordpress.org/plugins/acf-to-rest-api/). \
.\
Creamos un Field de Advanced Custom Fields que se llama prospecto, y la añadimos los campos sugeridos por cliente que fueron nombre, email, teléfono, tipo y review. Nota: actualizar permalinks para poder actualizar enlaces con prospectos.