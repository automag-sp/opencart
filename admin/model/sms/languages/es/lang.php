<?php

define("lang_iso_code","es");
define("smscurrency","EUR");


define("lang_alphabet","A;Á;B;C;Ch;D;E;É;F;G;H;I;Í;J;K;L;Ll;M;N;Ñ;O;Ó;P;Q;R;S;T;U;Ú;V;X;Y;Z");





//new
define("v_all_years","Todos los años");
define("v_menu_setting", "Ajustamiento");




// About
define("v_about_about","Sobre módulo");
define("v_about_version","Presta SMS módulo, versión");
define("v_about_copyright","Copyright © TOPefekt s.r.o., Todos los derechos reservados");
define("v_about_developer","Dessarrollador");
define("v_about_topefekt","TOPefekt s.r.o.");
define("v_about_address","Dirección");
define("v_about_street","B. Nemcove 767/13");
define("v_about_city","78701 Sumperk");
define("v_about_state","República Checa");
define("v_about_vat","NIF: CZ29444268");
define("v_about_phone","Teléfono");
define("v_about_phonenr","+420 581 110 998");
define("v_about_mail","Correo electrónico:");
define("v_about_mailsales","sales@topefekt.com");
define("v_about_mailsupport","support@topefekt.com");
define("v_about_web","Web:");
define("v_about_website_name","www.presta-sms.com");
define("v_about_website_url","www.presta-sms.com/es/index.html");



// AdminSms.php
define("v_adminsms_adminsms","Admin SMS");
define("v_adminsms_description","Elija acontecimientos cuando quiere que se les mande a los administradores del comercio un mensaje y defina el texto de este mensaje.");
define("v_adminsms_unicodesms","Unicode SMS");
define("v_adminsms_unicode","unicode");
define("v_adminsms_unicodetext","Marca sólo cuando quiere usar signos diacríticos en el mensaje o cuando usa lenguas como chino, árabe, griego, hebreo, coreano, etc. (Unicode permite utilizar distintos tipos de letra y distintos símbolos a la vez. En un Unicode mensaje son 70 signos).");
define("v_adminsms_unicodesave","Guardar");
define("v_adminsms_smsactive","Envío de sms notificaciones es ACTIVO.");
define("v_adminsms_smsnotactive","Envío de sms notificaciones es INACTIVO. Envío de mensajes activará marcándo por los menos a un administrador.");
define("v_adminsms_statusupdate","Actualización del pedido");
define("v_adminsms_account","Cuenta");
define("v_adminsms_product","Producto");
define("v_adminsms_orderstatus","Estado del pedido");
define("v_adminsms_order","Pedido");
define("v_adminsms_adminsmsnotactive","Admin SMS - inactivo");
define("v_adminsms_addadmin","¡Añada por lo menos a un administrador por favor!");
define("v_adminsms_usernotactive","¡Perfil del usuario es inactivo! Regístrese haciendo clic en el marcador sms en menú principal. Módulo le enseñará el formulario para registrarse. En caso de que ha utilizado el módulo en pasado ya y conoce su nombre de usuario y su contraseña, rellene el formulario para la cuenta ya existente. En caso contrario introduzca su correo electrónico, acepta los Términos de Licencia y haga clic en \"Registrar\".");
define("v_adminsms_invalidtext","Texto inválido del mensaje SMS");
define("v_adminsms_smssaved","Texto del mensaje SMS ha sido guardado.");
define("v_adminsms_unicodesaved","Unicode guardado.");
define("v_adminsms_jschar","Signo");
define("v_adminsms_jschars","Signos");
define("v_adminsms_jslabel","Etiqueta");
define("v_adminsms_jssmstext","texto del mensaje SMS");
define("v_adminsms_jstotalsms","Total de mensajes SMS:");
define("v_adminsms_smstext","Introduzca el texto del mensaje SMS");
define("v_adminsms_preview","Vista anticipada");
define("v_adminsms_admins","Administradores");
define("v_adminsms_save","Guardar");
define("v_adminsms_cancel","Cancelar");
define("v_adminsms_restoreunsaved","Devuelve los cambios no guardados a su estado original."); //new


// AdminSmsProfile.php
define("v_adminsmsprofile_profilenotactive","Perfil del usuario - inactivo");
define("v_adminsmsprofile_profileactive","Perfil del usuario - activo");
define("v_adminsmsprofile_newaccount","Nueva cuenta del usuario");
define("v_adminsmsprofile_notregistered","¿Tadavía no se ha registrado? ¡Créese una cuenta nueva ahora!");
define("v_adminsmsprofile_email","Correo electrónico:");
define("v_adminsmsprofile_company","Nombre de la compañía:");
define("v_adminsmsprofile_street","Calle:");
define("v_adminsmsprofile_city","Ciudad:");
define("v_adminsmsprofile_zip","CP:");
define("v_adminsmsprofile_country","País:");
define("v_adminsmsprofile_id","CIF:");
define("v_adminsmsprofile_vat","NIF:");
define("v_adminsmsprofile_refererid","Referer ID:"); // ?
define("v_adminsmsprofile_licence","Mostrar Términos de Licencia:");
define("v_adminsmsprofile_agree","Estoy de acuerdo");
define("v_adminsmsprofile_notagree","No estoy de acuerdo");
define("v_adminsmsprofile_register","Registrar");
define("v_adminsmsprofile_required","El campo requerido");
define("v_adminsmsprofile_sign","Inscribirse"); // Sign in
define("v_adminsmsprofile_signtext","Si ya tiene la cuenta, inscríbase por favor");
define("v_adminsmsprofile_username","Usuario:");
define("v_adminsmsprofile_password","Contraseña:");
define("v_adminsmsprofile_login","Iniciar la seción"); // Log in
define("v_adminsmsprofile_editaccount","Modificar la cuenta del usuario");
define("v_adminsmsprofile_save","Guardar");
define("v_adminsmsprofile_accountinfo","Información sobre la cuenta del usuario");
define("v_adminsmsprofile_credit","SMS crédito:");
define("v_adminsmsprofile_addadmin","Añadir administrador");
define("v_adminsmsprofile_name","Nombre:");
define("v_adminsmsprofile_mobilenr","Móvil:");
define("v_adminsmsprofile_edit","Editar");
define("v_adminsmsprofile_add","Añadir");
define("v_adminsmsprofile_settings","Ajustamiento avanzado");
define("v_adminsmsprofile_simulate","Simular el envío de mensaje SMS:");
define("v_adminsmsprofile_simulatehint","Permite testar el envío de mensaje SMS y mostrar los SMS de prueba en el marcador Archivo de SMS.");
define("v_adminsmsprofile_deletedb","Borrar la base de datos:");
define("v_adminsmsprofile_deletedbhint","Permite decidir, si guardar el ajustamiento actual y la base de mensajes SMS enviados en caso de deinstalación del módulo SMS.");
define("v_adminsmsprofile_report","Información de entrega (DR):");
define("v_adminsmsprofile_reporthint","Mostra la información de entrega en el mostrador Archivo de SMS.");
define("v_adminsmsprofile_lowcredit","Aviso de crédito bajo:");
define("v_adminsmsprofile_lowcredithint","Permite recibir el correo electrónico en caso de crédito bajo.");
define("v_adminsmsprofile_dremail","Correo electrónico para la recepción de los informes de entrega de mensajes:");
define("v_adminsmsprofile_dremailhint","Permite recibir el correo electrónico con información sobre la entrega de mensaje SMS.");
define("v_adminsmsprofile_admincreated","El administrador ha sido establecido.");
define("v_adminsmsprofile_agreetext","Tiene que estar de acuerdo con los Términos de Licencia.");
define("v_adminsmsprofile_accountcreated","La registración se ha hecho con éxito. Hemos mandado un correo electrónico a su buzón para que confirma su dirección de correo electrónico y la obtención de 5 créditos gratis.");
define("v_adminsmsprofile_addaccounttext","La próxima cuenta puede añadir en ");
define("v_adminsmsprofile_minutes"," minutos");
define("v_adminsmsprofile_cantconnect","No se puede conectar al SMS servidor");
define("v_adminsmsprofile_loginok","Ha sido conectado con éxito.");
define("v_adminsmsprofile_error","error");
define("v_adminsmsprofile_loginerror","error de conexión");
define("v_adminsmsprofile_invalidemail","Inválido correo electrónico para los mensajes de entrega.");
define("v_adminsmsprofile_invalidemail2","Correo electrónico inválido");
define("v_adminsmsprofile_accountchanged","La cuenta ha sido cambiada.");
define("v_adminsmsprofile_accountchanged2","La cuenta ha sido cambiada pero el URL de Módulo para mensajes de entrega no corresponde."); // ?
define("v_adminsmsprofile_changeaccounttext","Habrá sido posible cambiar la cuenta en ");
define("v_adminsmsprofile_seeconds"," segundos");
define("v_adminsmsprofile_invalidname","Nombre inválido");
define("v_adminsmsprofile_invalidnumber","Número inválido");
define("v_adminsmsprofile_adminchanged","El administrador ha sido cambiado.");
define("v_adminsmsprofile_admindeleted","El administrador ha sido borrado.");
define("v_adminsmsprofile_nochanges","no se han hecho ningunos cambios");
define("v_adminsmsprofile_confirmdelete","¿De verdad quiere eliminar?"); // Are you sure to delete
define("v_adminsmsprofile_deleteadmin","ELIMINAR al administrador");
define("v_adminsmsprofile_editadmin","MODIFICAR al administrador");
define("v_adminsmsprofile_intformat","en formato internacional, sin ceros o signos como “+” , p.ej., 34123456789");
define("v_adminsmsprofile_uninstall","(en caso de desinstalación)");
define("v_adminsmsprofile_noalert","(0 = sin aviso)");
define("v_adminsmsprofile_filluser","Introduzca el nombre y contraseña del usuario");


// CustomerSms.php
define("v_customersms_customersms","Mensajes SMS de cliente - ");
define("v_customersms_notactive","Mensajes SMS de cliente - inactivos");
define("v_customersms_default","opción por defecto");
define("v_customersms_langversion"," la versión de idioma");
define("v_customersms_description","Elija eventos cuando al cliente se le avisará con mensaje SMS y defina el texto de estos mensajes. Para diferentes países puede crear mutaciones en distintos idiomas. Para países con la mutación indefinida se usará el idioma base.");
define("v_customersms_addsms","Añadir una mutación de idioma");
define("v_customersms_country","Elija el país: ");
define("v_customersms_unicodesms","Unicode SMS");
define("v_customersms_unicodetext","Marca sólo cuando quiere usar signos diacríticos en el mensaje o cuando usa lenguas como chino, árabe, griego, hebreo, coreano, etc. (Unicode permite utilizar distintos tipos de letra y distintos símbolos a la vez. En un Unicode mensaje son 70 signos).");
define("v_customersms_orderstatus","Estado del pedido");
define("v_customersms_smsactive","El envío de SMS notificaciones es ACTIVO.");
define("v_customersms_smsnotactive","El envío de SMS notificaciones es INACTIVO. El envío de mensajes SMS activará marcándo „Activo“ en detalle del estado requerido.");
define("v_customersms_statusupdate"," Actualización del estado del pedido ");
define("v_customersms_account","Cuenta");
define("v_customersms_usernotactive","El pérfil del usuario es inactivo! Regístrese haciendo clic en el marcador SMS en menú principal. Módulo le enseñará el formulario para registrarse. En caso de que ha utilizado el módulo en pasado ya y conoce su nombre de usuario y su contraseña, rellene el formulario para la cuenta ya existente. En caso contrario introduzca su correo electrónico, acepta los Términos de Licencia y haga clic en \"Registrar\".");
define("v_customersms_invalidtext","Texto del mensaje SMS inválido");
define("v_customersms_smssaved","El texto del mensaje SMS se ha sido guardado correctamente.");
define("v_customersms_smsdeleted","La mutación del idioma ha sido eliminada."); // ?
define("v_customersms_confirmdelete","¿De verdad quiere eliminar?");
define("v_customersms_langdelete","ELIMINAR una mutación del idioma");
define("v_customersms_smstext","Texto del mensaje SMS"); // ?
define("v_customersms_unicode","unicode");
define("v_customersms_versionfor","La mutación del idioma para ");
define("v_customersms_wassaved"," ha sido guardada");
define("v_customersms_preview","Vista anticipada");
define("v_customersms_active","Activo");
define("v_customersms_save","Guardar");
define("v_customersms_cancel","Cancelar");
define("v_customersms_jstotalsms","Total de mensajes SMS:");
define("v_customersms_editlang","MODIFICAR la mutación del idioma");
define("v_customersms_edit","Modificar");
define("v_customersms_add","Añadir");
define("v_customersms_order","El pedido");
define("v_customersms_jschars","Signos");
define("v_customersms_unicodesaved","Unicode ha sido guardado.");
define("v_customersms_restoreunsaved","Devuelve a los cambios no guardados al estado original."); //new

//PayPal.php
define("v_paypal_credit","Comprar crédito");
define("v_paypal_creditnotactive","Comprar crédito - inactivo");
define("v_paypal_usernotactive","El pérfil del usuario es inactivo! Regístrese haciendo clic en el marcador SMS en menú principal. Módulo le enseñará el formulario para registrarse. En caso de que ha utilizado el módulo en pasado ya y conoce su nombre de usuario y su contraseña, rellene el formulario para la cuenta ya existente. En caso contrario introduzca su correo electrónico, acepta los Términos de Licencia y haga clic en \"Registrar\".");
define("v_paypal_clickhereif","En caso de que no se le aparece la posibilidad de comprar el crédito, haga el clic aquí por favor:"); //new



//SendSms.php
define("v_sendsms_bulksms","Texto del mensaje SMS de masa"); // ? Bulk SMS text
define("v_sendsms_addrecipients","Añada al receptor  ");
define("v_sendsms_addtext","Añada a uno o más receptores seperándolos con tilde. El número tiene que estar en formato internacional, sin ceros o signos como “+” , p.ej., 34123456789");
define("v_sendsms_eg"," (p.ej. 34123456789)");
define("v_sendsms_entertext","Introduzca el texto del mensaje SMS");
define("v_sendsms_addcsv","Añada al receptor en archivo CSV ");
define("v_sendsms_csvtext","Archivo CSV - 1 columna, 1.columna - número ((El número tiene que estar en formato internacional, sin ceros o signos como “+” , p.ej., 34123456789");
define("v_sendsms_unicode"," Unicode ");
define("v_sendsms_unicodetext","Marca sólo cuando quiere usar signos diacríticos en el mensaje o cuando usa lenguas como chino, árabe, griego, hebreo, coreano, etc. (Unicode permite utilizar distintos tipos de letra y distintos símbolos a la vez. En un Unicode mensaje son 70 signos).");
define("v_sendsms_time","su tiempo: ");
define("v_sendsms_time2","tiempo: ");
define("v_sendsms_timezone","Zona del tiempo: ");
define("v_sendsms_timezone2","ajustamiento de Zona del tiempo");
define("v_sendsms_longtext","El texto es muy largo");
define("v_sendsms_sendsms","Enviar SMS");
define("v_sendsms_send","Enviar");
define("v_sendsms_sendtext","Envío de mensajes SMS a SMS de masa. Introduzca los números de teléfono o cargue el archivo CSV."); // ?
define("v_sendsms_smsnotactive","Enviar mensaje SMS - inactivo");
define("v_sendsms_usernotactive","El pérfil del usuario es inactivo! Regístrese haciendo clic en el marcador SMS en menú principal. Módulo le enseñará el formulario para registrarse. En caso de que ha utilizado el módulo en pasado ya y conoce su nombre de usuario y su contraseña, rellene el formulario para la cuenta ya existente. En caso contrario introduzca su correo electrónico, acepta los Términos de Licencia y haga clic en \"Registrar\".");
define("v_sendsms_fillsms","Rellene el texto del mensaje SMS");
define("v_sendsms_smslong","El texto del mensaje SMS es muy largo (máx. 612 signos).");
define("v_sendsms_unicodesmslong","El texto del mensaje SMS es muy largo (máx. 268 signos unicode).");
define("v_sendsms_wrongtime","Tiempo inválido del envío del mensaje SMS."); // ? Wrong time of SMS sending
define("v_sendsms_norecipients","No se ha encontrado ningún receptor");
define("v_sendsms_lowcreditall","No tiene suficiente crédito para mandar los mensajes SMS a todos ");
define("v_sendsms_recipients"," los receptores.");
define("v_sendsms_smssent","El mensaje SMS ha sido enviado.");
define("v_sendsms_smssaved","EL mensaje SMS ha sido guardado.");
define("v_sendsms_wrongnumber","Número de teléfono incorrecto o inaccesible");
define("v_sendsms_unauthorized","ID del remitente no autorizado en el SMS de confirmación"); // ? unauthorized senderID in confirmation sms
define("v_sendsms_lowcredit","Crédito bajo para enviar mensajes SMS");
define("v_sendsms_nounicode","unicode no está apoyado");
define("v_sendsms_loginerror","Error de iniciación de la seción");
define("v_sendsms_cantconnect","no se puede conectar al SMS servidor");
define("v_sendsms_simulation","SMS SIMULACIÓN (Envío de SMS ha sido simulado. El receptor no obtendrá el mensaje SMS)");
define("v_sendsms_simulationconfirm","Mensaje SMS ha sido enviado (simulación).");
define("v_sendsms_error","error");
define("v_sendsms_sendlater"," Enviar después ");
define("v_sendsms_jschars","Signos: ");
define("v_sendsms_hr","1 hora");
define("v_sendsms_date","Fecha: ");

// SmsAnswers.php
define("v_smsanswers_smsanswers","SMS Respuestas");
define("v_smsanswers_description","SMS respuesta del cliente aparecerá en cuanto el cliente de su tienda obtiene SMS con tipo de remitente \"número del sistema\" y el cliente responderá del mismo número de teléfono.");
define("v_smsanswers_show","Enseñar");
define("v_smsanswers_results","Resultado de la búsqueda "); // Search results
define("v_smsanswers_of"," de ");
define("v_smsanswers_smscenter","SMS centro");
define("v_smsanswers_date","Fecha");
define("v_smsanswers_number","De número");
define("v_smsanswers_new","nuevo");
define("v_smsanswers_previous","Anterior");
define("v_smsanswers_next","Próxima");
define("v_smsanswers_page"," Página: ");
define("v_smsanswers_smsnotactive","SMS Respuestas - inactivo");
define("v_smsanswers_usernotactive","El pérfil del usuario es inactivo! Regístrese haciendo clic en el marcador SMS en menú principal. Módulo le enseñará el formulario para registrarse. En caso de que ha utilizado el módulo en pasado ya y conoce su nombre de usuario y su contraseña, rellene el formulario para la cuenta ya existente. En caso contrario introduzca su correo electrónico, acepta los Términos de Licencia y haga clic en \"Registrar\".");
define("v_smsanswers_year","año");
define("v_smsanswers_month","mes");
define("v_smsanswers_sms","Mensaje SMS");
define("v_smsanswers_text","Texto:");
define("v_smsanswers_nosms","Total de respuestas SMS: 0");

// SmsHistory.php
define("v_smshistory_sent","ENVIADO al receptor");
define("v_smshistory_error","ERROR");
define("v_smshistory_delivered","ENTREGADO al receptor");
define("v_smshistory_buffered","RECEPTOR INACCESIBLE"); // new
define("v_smshistory_smshistory","SMS Archivo");
define("v_smshistory_description","Archivo de mensajes enviados del SMS módulo.");
//define("v_smshistory_status","estado");
define("v_smshistory_adminsms"," administrador SMS");
define("v_smshistory_customersms"," cliente SMS");
define("v_smshistory_marketingsms"," SMS de comercio"); // marketingové sms ?
define("v_smshistory_simplesms"," SMS simples"); // sms ?
define("v_smshistory_show","Enseñar");
define("v_smshistory_results","Resultado de la búsqueda ");
define("v_smshistory_of"," de ");
define("v_smshistory_type","Tipo");
define("v_smshistory_date","Fecha");
define("v_smshistory_subject","SMS asunto");
define("v_smshistory_nubmer","Número");
define("v_smshistory_yes","sí");
define("v_smshistory_no","no");
define("v_smshistory_sysnumber","número de sistema");
define("v_smshistory_balance","Estado de la cuenta:"); // Credit balance
define("v_smshistory_customerdetail","Enseñar el detalle del cliente");
define("v_smshistory_smstext","Texto:");
define("v_smshistory_totalsms","Total de mensajes SMS:");
define("v_smshistory_smsnotactive","SMS Archivo - inactivo");
define("v_smshistory_usernotactive","El pérfil del usuario es inactivo! Regístrese haciendo clic en el marcador SMS en menú principal. Módulo le enseñará el formulario para registrarse. En caso de que ha utilizado el módulo en pasado ya y conoce su nombre de usuario y su contraseña, rellene el formulario para la cuenta ya existente. En caso contrario introduzca su correo electrónico, acepta los Términos de Licencia y haga clic en \"Registrar\".");
define("v_smshistory_price","Precio en créditos:");
define("v_smshistory_year","año");
define("v_smshistory_month","mes");
define("v_smshistory_status","Estado");
define("v_smshistory_recipient","Receptor");
define("v_smshistory_unicode","Unicode:");
define("v_smshistory_senderid","ID del remitente:"); // senderID
define("v_smshistory_previous","Anterior");
define("v_smshistory_next","Próxima");
define("v_smshistory_page"," Página: ");
define("v_smshistory_nosms","Total de mensajes SMS: 0");
define("v_smshistory_sms","mensaje SMS");

// SmsMarketing.php
define("v_smsmarketing_smsbulk","SMS de Comercio - texto de SMS de masa");
define("v_smsmarketing_entertext","Enseña el texto del mensaje SMS");
define("v_smsmarketing_unicode"," Unicode ");
define("v_smsmarketing_unicodetext","Marca sólo cuando quiere usar signos diacríticos en el mensaje o cuando usa lenguas como chino, árabe, griego, hebreo, coreano, etc. (Unicode permite utilizar distintos tipos de letra y distintos símbolos a la vez. En un Unicode mensaje son 70 signos).");
define("v_smsmarketing_sendlater"," Enviar después ");
define("v_smsmarketing_yourtime","su tiempo: ");
define("v_smsmarketing_jstotalcustomers","Total de clientes:");
define("v_smsmarketing_jstotalsms","Total de mensajes SMS:");
define("v_smsmarketing_bulkfilter","SMS de Comercio - filtro de SMS de masa");
define("v_smsmarketing_allcustomers","Todos clientes");
define("v_smsmarketing_companycustomers","Clientes de la compañía");
define("v_smsmarketing_privatecustomers","Clientes privados");
define("v_smsmarketing_allcountries","Todos los países");
define("v_smsmarketing_lastname","Apellido:");
define("v_smsmarketing_firstname","Nombre:");
define("v_smsmarketing_lastname2","Apellido");
define("v_smsmarketing_firstname2","Nombre");
define("v_smsmarketing_groups","Grupos:");
define("v_smsmarketing_all","Todos");
define("v_smsmarketing_gender","Sexo:");
define("v_smsmarketing_male","Hombre");
define("v_smsmarketing_female","Mujer");
define("v_smsmarketing_news","Boletín informativo:"); // ? Newsletter
define("v_smsmarketing_yes","Sí");
define("v_smsmarketing_no","No");
define("v_smsmarketing_applyfilter","Usar filtro");
define("v_smsmarketing_birthfrom","Fecha de nacimiento desde: ");
define("v_smsmarketing_birthto","hasta: ");
define("v_smsmarketing_registerfrom","Fecha de registración desde: ");
define("v_smsmarketing_customersfound","Se han encontrado clientes: ");
define("v_smsmarketing_results","Mostrado");
define("v_smsmarketing_action","Acción");
define("v_smsmarketing_mobilenr","Número de teléfono"); // ? Mobile number
define("v_smsmarketing_customerid","Número del cliente");
define("v_smsmarketing_removecustomer","ELIMINAR al cliente de esta lista");
define("v_smsmarketing_next","Anterior");
define("v_smsmarketing_previous","Próxima");
define("v_smsmarketing_page"," Página: ");
define("v_smsmarketing_smsmarketingfound","SMS de Comercio - Se han encontrado clientes: ");
define("v_smsmarketing_description","Escriba el texto de mensaje utilizándo los filtros avanzados para dirigirse a su campaña de marketing.");
define("v_smsmarketing_smsmarketing","SMS de Comercio");
define("v_smsmarketing_smsnotactive","SMS de Comercio - inactivo");
define("v_smsmarketing_usernotactive","El pérfil del usuario es inactivo! Regístrese haciendo clic en el marcador SMS en menú principal. Módulo le enseñará el formulario para registrarse. En caso de que ha utilizado el módulo en pasado ya y conoce su nombre de usuario y su contraseña, rellene el formulario para la cuenta ya existente. En caso contrario introduzca su correo electrónico, acepta los Términos de Licencia y haga clic en \"Registrar\".");
define("v_smsmarketing_fillsms","Rellena el texto del mensaje SMS.");
define("v_smsmarketing_smslong","El texto del mensaje SMS es muy largo (máx. 612 signos).");
define("v_smsmarketing_unicodesmslong","El texto del mensaje SMS es muy largo (máx. 612 signos unicode).");
define("v_smsmarketing_nocustomers","Se han encontrado clientes: 0");
define("v_smsmarketing_wrongtime","Tiempo inválido del envío de SMS.");
define("v_smsmarketing_lowcreditall","No tiene suficiente crédito para mandar los mensajes SMS a todos ");
define("v_smsmarketing_customers"," clientes.");
define("v_smsmarketing_smssent","El mensaje SMS ha sido enviado.");
define("v_smsmarketing_smssaved","El mensaje SMS ha sido guardado.");
define("v_smsmarketing_wrongnr","Número de teléfono incorrecto o inaccesible");
define("v_smsmarketing_unauthorized","ID del remitente no autorizado en el SMS de confirmación"); // ? unauthorized senderID in confirmation sms
define("v_smsmarketing_lowcredit","Crédito bajo para enviar mensajes SMS");
define("v_smsmarketing_nounicode","unicode no está apoyado");
define("v_smsmarketing_cantconnect","no se puede conectar al SMS servidor");
define("v_smsmarketing_simulation","SMS SIMULACIÓN (Envío de SMS ha sido simulado. El receptor no obtendrá el mensaje SMS.)");
define("v_smsmarketing_simulationconfirm","Mensaje SMS ha sido enviado (simulación).");
define("v_smsmarketing_error","error");
define("v_smsmarketing_loginerror","Error de iniciación de la seción");
define("v_smsmarketing_date","Fecha:");
define("v_smsmarketing_time","Tiempo: ");
define("v_smsmarketing_hr","1 hora");
define("v_smsmarketing_timezone","Zona del tiempo: ");
define("v_smsmarketing_timezone2","Ajustamiento de la zona del tiempo");
define("v_smsmarketing_send","Enviar");
define("v_smsmarketing_jschars","Signos: ");
define("v_smsmarketing_longtext","El texto es muy largo");
define("v_smsmarketing_typ","Tipo:");
define("v_smsmarketing_country","País:");
define("v_smsmarketing_city","Ciudad:");
define("v_smsmarketing_advert","Anuncio publicitario:"); // ? Advert
define("v_smsmarketing_store","Tienda:"); //new
define("v_smsmarketing_allstores","Todas las tiendas"); //new


// smsprestashop.php
define("v_smsprestashop_prestashop","Presta SMS");
define("v_smsprestashop_description","presta-sms.com - ¡Envie mensajes SMS de su Prestashop!");
define("v_smsprestashop_admin","Admin SMS"); // ?
define("v_smsprestashop_customer","SMS de cliente");
define("v_smsprestashop_settings","Ajustamiento de SMS"); // ? SMS Settings
define("v_smsprestashop_history","Archivo de SMS");
define("v_smsprestashop_credit","Comprar crédito");
define("v_smsprestashop_marketing","SMS de comercio");
define("v_smsprestashop_answers","SMS Respuestas"); // ? SMS Answers
define("v_smsprestashop_send","Enviar SMS");
define("v_smsprestashop_about","Sobre módulo");
define("v_smsprestashop_wrongnr","Número de teléfono incorrecto o inaccesible");
define("v_smsprestashop_unauthorized","ID del remitente no autorizado en el SMS de confirmación");
define("v_smsprestashop_lowcredit","Crédito bajo para enviar mensajes SMS");
define("v_smsprestashop_nounicode","unicode no está apoyado");
define("v_smsprestashop_loginerror","Error de iniciación de la seción");
define("v_smsprestashop_cantconnect","Crédito bajo para enviar mensajes SMS");
define("v_smsprestashop_simulation","SMS SIMULACIÓN (Envío de SMS ha sido simulado. El receptor no obtendrá el mensaje SMS.)");
define("v_smsprestashop_nrunknown","número desconocido");
define("v_smsprestashop_notconnected","no conectado al SMS servidor");
define("v_smsprestashop_sqlinfo1","Nuevos pedidos");
define("v_smsprestashop_sqltemplate1","Nuevo pedido de {customer_firstname} {customer_lastname}, cliente: {customer_id}, pedido: {order_id}, pago: {order_payment}, suma: {order_total_paid} {order_currency}. Pedido: {order_products2}. Información de {shop_name}.");
define("v_smsprestashop_sqltemplate21","Su pedido {order_id} ha sido creado con éxito, pago: {order_payment}, suma: {order_total_paid} {order_currency}. Un buen día, {shop_name}.");
define("v_smsprestashop_notice","Parámetros posibles:"); // ? Possible variables
define("v_smsprestashop_sqlinfo2","La creación exitosa de la cuenta del cliente"); // ? Successful customer create account
define("v_smsprestashop_sqltemplate2","Cliente  {customer_firstname} {customer_lastname}, id: {customer_id}, se ha registrado ahora mismo a {shop_name}.");
define("v_smsprestashop_sqltemplate22","Estimado/a {customer_firstname} {customer_lastname}, su cuenta en {shop_name} se ha creado con éxito. Nombre del usuario: {customer_email}. ¡Un buen día!");
define("v_smsprestashop_sqlinfo3","La mercancía devuelta");
define("v_smsprestashop_sqltemplate3","Cliente {customer_firstname} {customer_lastname}, id: {customer_id}, devolvió mercancía del pedido {order_id}. Pedido: {orderReturn2}. Mensaje del cliente: {customer_question}. Información de {shop_name}."); // ???
define("v_smsprestashop_sqltemplate23","Obtuvimos su demanda. Pedido {order_id}. Un buen día, {shop_name}.");
define("v_smsprestashop_sqlinfo4","Aviso en caso de cambio de la cantidad de algún producto pedido."); // ? Called when a quantity of one product change in an order
define("v_smsprestashop_sqltemplate4","En el pedido {order_id} se ha cambiado la cantidad, {orderSlip2}. Información de {shop_name}."); // ?
define("v_smsprestashop_sqltemplate24","En su pedido número {order_id} se ha cambiado la cantidad, {orderSlip2}. Un buen día, {shop_name}.");
define("v_smsprestashop_sqlinfo5","Confirmación del pago");
define("v_smsprestashop_sqltemplate5","Confirmación del pago, pedido número: {order_id}, pago: {order_payment},  suma: {order_total_paid} {order_currency}. Información de {shop_name}.");
define("v_smsprestashop_sqltemplate25","Obtuvimos pago de su pedido {order_id} a través de {order_payment},  suma: {order_total_paid} {order_currency}. Un buen día, {shop_name}.");
define("v_smsprestashop_sqlinfo62","Actualización del pedido - número que ha asignado transportista al envío");  //new
define("v_smsprestashop_sqltemplate62","Pedido número {order_id} ha sido actualizado con número de envío {order_shipping_number} que le ha asignado el transportista. Información de {shop_name}."); //new
define("v_smsprestashop_sqltemplate262","Estimado cliente, la mercancía de su pedido número {order_id} ha sido enviada, número que ha asignado transportista al envío es {order_shipping_number}. Un buen día, {shop_name}."); //new
define("v_smsprestashop_sqlinfo7","Eliminación del producto de la base de datos"); // ? Called when a product is deleted
define("v_smsprestashop_sqltemplate7","Este producto ha sido eliminado de {shop_name}, id: {product_id}, ref: {product_ref}, nombre: {product_name}.  Eliminado por cliente: {employee_id}, {employee_email}.");
define("v_smsprestashop_sqlinfo8","La cantidad es actualizada sólo cuando el cliente crea el pedido exitosamente"); // ? ...effectively place his order
define("v_smsprestashop_sqltemplate8","La cantidad del producto se ha cambiado, id: {product_id}, ref: {product_ref}, nombre: {product_name}, nueva cantidad: {product_quantity}, contratista: {product_supplier}. Información de {shop_name}.");
define("v_smsprestashop_sqlinfo9","La mercancía no está en depósito");
define("v_smsprestashop_sqltemplate9","Esta mercancía está agotándose, id: {product_id}, ref: {product_ref}, nombre: {product_name}, cantidad: {product_quantity}. Información de {shop_name}.");
define("v_smsprestashop_sqlinfo10","Aviso en caso de que el administrador o cliente cancelará la mercancía en el pedido");
define("v_smsprestashop_sqltemplate10","En pedido {order_id} ha sido cancelada la mercancía id: {product_id}, ref: {product_ref}, nombre: {product_name}. cantidad: {product_quantity}, la cantidad cancelada: {product_quantity_reinjected}. Información de {shop_name}."); // ? quantity reinjected
define("v_smsprestashop_sqltemplate11","Estado del pedido {order_id} se ha cambiado a ");
define("v_smsprestashop_sqltemplate111",". Información de {shop_name}.");
define("v_smsprestashop_sqltemplate211","Estimado cliente, estado de su pedido {order_id} cambió a ");
define("v_smsprestashop_sqltemplate2111",". Un buen día, {shop_name}.");
define("v_smsprestashop_bankwire","Transacción bancaria");
define("v_smsprestashop_company","Nombre de la compañía");
define("v_smsprestashop_country","País");
define("v_smsprestashop_city","Ciudad");
define("v_smsprestashop_qty","cantidad");
define("v_smsprestashop_qtyreinjected","cantidad cancelada");  //bez diakritiky // ? qty reinjected
define("v_smsprestashop_qtyreturned","cantidad devuelta"); //bez diakritiky
define("v_smsprestashop_name","nombre"); //bez diakritiky
define("v_smsprestashop_notfound","no encontrado"); //new


// SmsWizard.php
define("v_smswizard_ownsettings","Ajustamiento de SMS - Elija su número propio del remitente para ");
define("v_smswizard_ownnrsettings","Ajustamiento del número propio del remitente");
define("v_smswizard_ownnrid","número propio del remitente");
define("v_smswizard_existingown","Número propio existente:");
define("v_smswizard_newownnrid","Nuevo número propio del remitente:");
define("v_smswizard_intformat","en formato internacional,<br />sin ceros o signos como “+” , p.ej., 34123456789");
define("v_smswizard_smscode","SMS código:");
define("v_smswizard_confirm","Confirmar");
define("v_smswizard_required","Campo requerido");
define("v_smswizard_textsettings","Ajustamiento de SMS - Elija al remitente del texto para ");
define("v_smswizard_senderidsettings","Ajustamineto del remitente textual");
define("v_smswizard_existingsid","Remitente textual existente:");
define("v_smswizard_newsid","Nuevo remitente textual:");
define("v_smswizard_maxchars","máx. 11 signos");
define("v_smswizard_smssettings","Ajustamiento de SMS");
define("v_smswizard_description","Defina el tipo del remitente para cada país. (remitente textual posee su propio número de móvil o su número de sistema). Precio de SMS mensaje depende del país del remitente, elegido tipo del remitente y en el nivel del pago. En los países con el tipo del remitente indefinido se utilizará el número del sistema.");
define("v_smswizard_customersettings","Ajustamiento de los mensajes SMS del cliente");
define("v_smswizard_addcountry","AÑADIR/CAMBIAR EL PAÍS ELEGIDO");
define("v_smswizard_sendertype","TIPO DEL REMITENTE");
define("v_smswizard_network","RED");
define("v_smswizard_smsprice","PRECIO EN CRÉDITOS");
define("v_smswizard_price","PRECIO DE SMS EN EUR (sin IVA)");
define("v_smswizard_payment","pago");
define("v_smswizard_unicode","Unicode ");
define("v_smswizard_unicodetext","Soporte del set de signos Unicode (Unicode posibilita utilizar a la vez distintos tipos de letra, símbolos y signos diacríticos. Está utilizado para idiomas como chino, árabe, griego, hebreo, coreano, etc.)");
define("v_smswizard_textsid","NÚMERO DEL REMITENTE TEXTUAL");
define("v_smswizard_textsid2","Número del remitente textual");
define("v_smswizard_systemnr","NÚMERO DEL SISTEMA");
define("v_smswizard_ownnrsid","NÚMERO PROPIO DEL REMITENTE");
define("v_smswizard_simhosting","SIM HOSTING");
define("v_smswizard_unicodesupported","UNICODE APOYADO");
define("v_smswizard_nounicode","UNICODE NO APOYADO");
define("v_smswizard_savesettings","GUARDAR EL AJUSTAMIENTO DE SMS");
define("v_smswizard_suredelete","De verdad quiere eliminar");
define("v_smswizard_country","Elija el país: ");
define("v_smswizard_notactive","Ajustamiento de SMS - inactivo");
define("v_smswizard_usernotactive","¡Perfil del usuario es inactivo! Regístrese haciendo clic en el marcador sms en menú principal. Módulo le enseñará el formulario para registrarse. En caso de que ha utilizado el módulo en pasado ya y conoce su nombre de usuario y su contraseña, rellene el formulario para la cuenta ya existente. En caso contrario introduzca su correo electrónico, acepta los Términos de Licencia y haga clic en \"Registrar\".");
define("v_smswizard_error","error");
define("v_smswizard_cantconnect","no se puede conectar al SMS servidor");
define("v_smswizard_deleted"," ha sido eliminado."); 
define("v_smswizard_choosesender","elija el tipo del remitente");
define("v_smswizard_countrysaved"," ha sido guardado."); 
define("v_smswizard_fillsid","rellena el número propio del remitente");
define("v_smswizard_mustbenumber","número propio del remitente debe ser número");
define("v_smswizard_confirmcode","confirma correctamente el SMS código"); 
define("v_smswizard_ownsidfor","el número propio del remitente para ");
define("v_smswizard_wassaved"," ha sido guardado.");
define("v_smswizard_error2","error - ");
define("v_smswizard_loginerror","error de inicio de la seción");
define("v_smswizard_retypecode","Ahora copie el SMS código.");
define("v_smswizard_retypecode2","Ahora copie el SMS código. SMS mensaje se enviará en próximos 60 segundos.");
define("v_smswizard_wrongnrerror","error - número de teléfono incorrecto o inaccesible");
define("v_smswizard_unauthorizederror","error - ID del remitente no autorizado en el SMS de confirmación");
define("v_smswizard_lowcrediterror","error - crédito bajo para enviar SMS mensajes de validación");
define("v_smswizard_filltextsid","Rellena el número del remitente textual");
define("v_smswizard_filltextsid2","Rellena el número del remitente textual, 3-11 signos");
define("v_smswizard_chars","los signos utilizables ");
define("v_smswizard_nonumber","número del remitente textual no puede ser número");
define("v_smswizard_textsidfor","Número del remitente textual para ");
define("v_smswizard_adminsettings","Ajustamiento/Admin SMS");
define("v_smswizard_validate","VALIDAR"); //new
define("v_smswizard_smsvalidation","SMS validación"); //new
define("v_smswizard_confirmationcode","Código: "); //new, bez diakritiky, pouzito v sms
define("v_smswizard_updatepricelist","Actualizar el precio"); //new
define("v_smswizard_eg","p.ej..:"); //new
define("v_smswizard_pricelistupdated","Lista de precios ha sido actualizada con éxito."); //new
define("v_smswizard_edit","EDITAR"); //new
define("v_smswizard_delete","BORRAR"); //new





//new
define("v_smsprestashop_smscharging_fieldset","Sus tiendas de internet");
define("v_smsprestashop_smscharging","SMS opt-out");
define("v_smsprestashop_smscharging_h2","SMS opt-out - ajustamiento de la cancelación de los avisos de SMS de la cesta y la tasa de los SMS");
define("v_smsprestashop_smscharging_description","Elija la tienda de internet para cual quiere ajustar que el cliente tenga en la cesta la posibilidad de cancelar los avisos de SMS, ajuste el precio de los mensajes SMS y defina el texto que aparecerá al cliente en la cesta.");
define("v_adminsmsprofile_prefer","Para el envío de los SMS prefiere el número de teléfono de:");
define("v_adminsmsprofile_preferinvoice","dirección de facturación");
define("v_adminsmsprofile_preferdeliver","dirección de entrega");
define("v_smsprestashop_smscharging_price","Precio de los mensajes SMS");
define("v_smsprestashop_smscharging_texts","Texto que aparecerá en la cesta");
define("v_smsprestashop_smscharging_active","Activa la aparición de SMS opt-out función en la cesta");
define("v_smsprestashop_smscharging_optoutactive","SMS opt-out es ACTIVA");
define("v_smsprestashop_smscharging_optoutnotactive","SMS opt-out ES INACTIVA. SMS opt-out activará marcándo „Activa la aparición de SMS opt-out función en la cesta“");
define("v_smsprestashop_smscharging_saved","El Ajuste de la SMS opt-out función se ha cambiado con éxito");
define("v_smswizard_pricelistupdated_changed","Cambio del precio de los mensajes SMS en los países siguientes:");
define("v_smsprestashop_newversion","Nueva versión disponible:");

define("v_about_manual_text","Guía para SMS módulo (ENG):");
define("v_about_manual_url","www.presta-sms.com/manual.html");
define("v_about_supported_text","Las versiones de PrestaShop apoyadas:");
define("v_about_supported_text_ps","1.5.x");


define("v_contact_form","Formulario de contacto");

define("v_remove_duplicate","Eliminar duplicados de los números");

define("v_registration_type","Tipo de registro:");
define("v_registration_type_personal","Personal");
define("v_registration_type_business","Comercio");
define("v_registration_address","Dirección");
define("v_registration_billing_information","La información de facturación");

define("v_registration_personal_contact","Persona de contacto");
define("v_registration_company_name","Escriba el nombre de la empresa.");
define("v_registration_vat_invalid","IVA inválido");




//stats new
define("v_statistics","Estadística");
define("v_statistics_smsnotactive","Statistics - no está activo");
define("v_statistics_day","día");
define("v_statistics_datefrom","Fecha desde:");
define("v_statistics_dateto","hasta:");



// filter
define("v_filter_deleted_customers", "Clientes eliminados: ");
define("v_filter_more", "Más...");
define("v_filter_load", "Guardadas Filtros");
define("v_filter_save", "Guardar filtro");
define("v_filter_clear", "Restablecer filtro");
define("v_filter_name", "Nombre del filtro");
define("v_filter_date", "Fecha");
define("v_filter_been_apply", "Filtro se ha aplicado.");
define("v_filter_been_saved", "Filtro se ha guardado.");
define("v_filter_been_clear", "Filtro se ha restablecido.");
define("v_filter_q_clear", "?Está seguro de que desea restablecer el filtro?");
define("v_filter_q_delete", "?Está seguro que desea eliminar el filtro?");
define("v_filter_not_found", "El filtro no encontrado.");
define("v_send_busy", "Tratamiento...");

// Template
define("v_template_load", "Plantillas guardadas");
define("v_template_save", "Guardar plantilla");
define("v_template_name", "Nombre de la plantilla");
define("v_template_been_apply", "Plantilla que se ha cargado.");
define("v_template_been_saved", "Plantilla se ha guardado.");
define("v_template_q_delete", "?Está seguro que desea eliminar la plantilla?");
define("v_template_not_found", "Plantilla no encontrado.");
define("v_show_virtual", "Operadores virtuales (MVNO)");

// Marketing
define("v_marketing_coupon", "Seleccionar un cupón");
define("v_marketing_coupon_create", "Crear un cupón");
define("v_marketing_none", "Por favor Selecciona");
define("v_smshistory_simulation", "SIMULACIÓN");
define("v_smshistory_deleted", "ELIMINADO");
define("v_smshistory_sheduled", "PROGRAMADO");
define("v_smshistory_duplicate", "DUPLICAR");
define("v_smshistory_dnd", "DO NOT DISTURB registro (DND)");
define("v_sendsms_addcsv_vcard","Anada al receptor en archivo CSV (.csv, .txt) o vCard (.vcf)");

// Hooks v2
define("v_hook_return", "Devoluciones");
define("v_hook_return_customer", "Confirmación de la queja.");
define("v_hook_return_admin", "Aprobada una nueva reclamación.");
define("v_smsprestashop_return_status_admin","Estado de una reclamación {return_id} se ha cambiado a ");
define("v_smsprestashop_return_status_admin2",". Información de {shop_name}.");
define("v_smsprestashop_return_status_customer","Estimado cliente, el estado de su reclamo {return_id} cambió a ");
define("v_smsprestashop_return_status_customer2",". Un buen día, {shop_name}.");

// OptOut
define("v_optout_auto_variable", "Añadir SMS producto a la cesta:");
define("v_optout_auto", "automáticamente");
define("v_optout_manual", "a mano");

// ZenCart
define("v_about_version_zen","Zen SMS módulo, versión ");
define("v_about_supported_text_zen","Las versiones de ZenCart apoyadas:");
define("v_about_supported_version_zen","1.3.x. - 1.5.x");
define("v_about_manual_url_zen","www.zen-sms.net/manual.html");
define("v_about_website_name_zen","www.zen-sms.net");
define("v_about_website_url_zen","www.zen-sms.net/es/index.html");

define("v_smsprestashop_sqltemplate1_zen","Nuevo pedido de {customer_firstname} {customer_lastname}, cliente: {customer_id}, pedido: {order_id}, pago: {order_payment}, suma: {order_total_paid} {order_currency}. Pedido: {order_products2}. Información de {shop_name}.");
define("v_smsprestashop_sqltemplate21_zen","Su pedido {order_id} ha sido creado con éxito, pago: {order_payment}, suma: {order_total_paid} {order_currency}. Un buen día, {shop_name}.");
define("v_smsprestashop_sqltemplate2_zen","Cliente  {customer_firstname} {customer_lastname}, id: {customer_id}, se ha registrado ahora mismo a {shop_name}.");
define("v_smsprestashop_sqltemplate22_zen","Estimado/a {customer_firstname} {customer_lastname}, su cuenta en {shop_name} se ha creado con éxito. Nombre del usuario: {customer_email}. ¡Un buen día!");
define("v_smsprestashop_sqltemplate3_zen","Cliente {customer_firstname} {customer_lastname}, id: {customer_id}, devolvió mercancía del pedido {order_id}. Pedido: {orderReturn2}. Mensaje del cliente: {customer_question}. Información de {shop_name}."); // ???
define("v_smsprestashop_sqltemplate23_zen","Obtuvimos su demanda. Pedido {order_id}. Un buen día, {shop_name}.");
define("v_smsprestashop_sqltemplate4_zen","En el pedido {order_id} se ha cambiado la cantidad, {orderSlip2}. Información de {shop_name}."); // ?
define("v_smsprestashop_sqltemplate24_zen","En su pedido número {order_id} se ha cambiado la cantidad, {orderSlip2}. Un buen día, {shop_name}.");
define("v_smsprestashop_sqltemplate5_zen","Confirmación del pago, pedido número: {order_id}, pago: {order_payment},  suma: {order_total_paid} {order_currency}. Información de {shop_name}.");
define("v_smsprestashop_sqltemplate25_zen","Obtuvimos pago de su pedido {order_id} a través de {order_payment},  suma: {order_total_paid} {order_currency}. Un buen día, {shop_name}.");
define("v_smsprestashop_sqltemplate62_zen","Pedido número {order_id} ha sido actualizado con número de envío {order_shipping_number} que le ha asignado el transportista. Información de {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_zen","Estimado cliente, la mercancía de su pedido número {order_id} ha sido enviada, número que ha asignado transportista al envío es {order_shipping_number}. Un buen día, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_zen","Este producto ha sido eliminado de {shop_name}, id: {product_id}, ref: {product_ref}, nombre: {product_name}.  Eliminado por cliente: {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_zen","La cantidad del producto se ha cambiado, id: {product_id}, ref: {product_ref}, nombre: {product_name}, nueva cantidad: {product_quantity}, contratista: {product_supplier}. Información de {shop_name}.");
define("v_smsprestashop_sqltemplate9_zen","Esta mercancía está agotándose, id: {product_id}, ref: {product_ref}, nombre: {product_name}, cantidad: {product_quantity}. Información de {shop_name}.");
define("v_smsprestashop_sqltemplate10_zen","En pedido {order_id} ha sido cancelada la mercancía id: {product_id}, ref: {product_ref}, nombre: {product_name}. cantidad: {product_quantity}, la cantidad cancelada: {product_quantity_reinjected}. Información de {shop_name}."); // ? quantity reinjected
define("v_smsprestashop_sqltemplate11_zen","Estado del pedido {order_id} se ha cambiado a ");
define("v_smsprestashop_sqltemplate111_zen",". Información de {shop_name}.");
define("v_smsprestashop_sqltemplate211_zen","Estimado cliente, estado de su pedido {order_id} cambió a ");
define("v_smsprestashop_sqltemplate2111_zen",". Un buen día, {shop_name}.");






// OpenCart
define("v_about_version_oc","Cart SMS módulo, versión ");
define("v_about_supported_text_oc","Las versiones de OpenCart apoyadas:");
define("v_about_supported_version_oc","1.4.7 - 1.5.6.1");
define("v_about_manual_url_oc","www.cart-sms.com/manual.html");
define("v_about_website_name_oc","www.cart-sms.com");
define("v_about_website_url_oc","www.cart-sms.com/es/index.html");

define("v_smsprestashop_sqltemplate1_oc","Nuevo pedido de {customer_firstname} {customer_lastname}, cliente: {customer_id}, pedido: {order_id}, pago: {order_payment}, suma: {order_total_paid} {order_currency}. Pedido: {order_products2}. Información de {shop_name}.");
define("v_smsprestashop_sqltemplate21_oc","Su pedido {order_id} ha sido creado con éxito, pago: {order_payment}, suma: {order_total_paid} {order_currency}. Un buen día, {shop_name}.");
define("v_smsprestashop_sqltemplate2_oc","Cliente  {customer_firstname} {customer_lastname}, id: {customer_id}, se ha registrado ahora mismo a {shop_name}.");
define("v_smsprestashop_sqltemplate22_oc","Estimado/a {customer_firstname} {customer_lastname}, su cuenta en {shop_name} se ha creado con éxito. Nombre del usuario: {customer_email}. ¡Un buen día!");
define("v_smsprestashop_sqltemplate3_oc","Cliente {customer_firstname} {customer_lastname}, id: {customer_id}, devolvió mercancía del pedido {order_id}. Pedido: {orderReturn2}. Mensaje del cliente: {customer_question}. Información de {shop_name}."); // ???
define("v_smsprestashop_sqltemplate23_oc","Obtuvimos su demanda. Pedido {order_id}. Un buen día, {shop_name}.");
define("v_smsprestashop_sqltemplate4_oc","En el pedido {order_id} se ha cambiado la cantidad, {orderSlip2}. Información de {shop_name}."); // ?
define("v_smsprestashop_sqltemplate24_oc","En su pedido número {order_id} se ha cambiado la cantidad, {orderSlip2}. Un buen día, {shop_name}.");
define("v_smsprestashop_sqltemplate5_oc","Confirmación del pago, pedido número: {order_id}, pago: {order_payment},  suma: {order_total_paid} {order_currency}. Información de {shop_name}.");
define("v_smsprestashop_sqltemplate25_oc","Obtuvimos pago de su pedido {order_id} a través de {order_payment},  suma: {order_total_paid} {order_currency}. Un buen día, {shop_name}.");
define("v_smsprestashop_sqltemplate62_oc","Pedido número {order_id} ha sido actualizado con número de envío {order_shipping_number} que le ha asignado el transportista. Información de {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_oc","Estimado cliente, la mercancía de su pedido número {order_id} ha sido enviada, número que ha asignado transportista al envío es {order_shipping_number}. Un buen día, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_oc","Este producto ha sido eliminado de {shop_name}, id: {product_id}, ref: {product_ref}, nombre: {product_name}.  Eliminado por cliente: {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_oc","La cantidad del producto se ha cambiado, id: {product_id}, ref: {product_ref}, nombre: {product_name}, nueva cantidad: {product_quantity}, contratista: {product_supplier}. Información de {shop_name}.");
define("v_smsprestashop_sqltemplate9_oc","Esta mercancía está agotándose, id: {product_id}, ref: {product_ref}, nombre: {product_name}, cantidad: {product_quantity}. Información de {shop_name}.");
define("v_smsprestashop_sqltemplate10_oc","En pedido {order_id} ha sido cancelada la mercancía id: {product_id}, ref: {product_ref}, nombre: {product_name}. cantidad: {product_quantity}, la cantidad cancelada: {product_quantity_reinjected}. Información de {shop_name}."); // ? quantity reinjected
define("v_smsprestashop_sqltemplate11_oc","Estado del pedido {order_id} se ha cambiado a ");
define("v_smsprestashop_sqltemplate111_oc",". Información de {shop_name}.");
define("v_smsprestashop_sqltemplate211_oc","Estimado cliente, estado de su pedido {order_id} cambió a ");
define("v_smsprestashop_sqltemplate2111_oc",". Un buen día, {shop_name}.");







// OsCommerce
define("v_about_version_os","smsCommerce módulo, versión ");
define("v_about_supported_text_os","Las versiones de OsCommerce apoyadas:");
define("v_about_supported_version_os","2.3.x");
define("v_about_manual_url_os","www.sms-commerce.net/manual.html");
define("v_about_website_name_os","www.sms-commerce.net");
define("v_about_website_url_os","www.sms-commerce.net/es/index.html");

define("v_smsprestashop_sqltemplate1_os","Nuevo pedido de {customer_firstname} {customer_lastname}, cliente: {customer_id}, pedido: {order_id}, pago: {order_payment}, suma: {order_total_paid} {order_currency}. Pedido: {order_products2}. Información de {shop_name}.");
define("v_smsprestashop_sqltemplate21_os","Su pedido {order_id} ha sido creado con éxito, pago: {order_payment}, suma: {order_total_paid} {order_currency}. Un buen día, {shop_name}.");
define("v_smsprestashop_sqltemplate2_os","Cliente  {customer_firstname} {customer_lastname}, id: {customer_id}, se ha registrado ahora mismo a {shop_name}.");
define("v_smsprestashop_sqltemplate22_os","Estimado/a {customer_firstname} {customer_lastname}, su cuenta en {shop_name} se ha creado con éxito. Nombre del usuario: {customer_email}. ¡Un buen día!");
define("v_smsprestashop_sqltemplate3_os","Cliente {customer_firstname} {customer_lastname}, id: {customer_id}, devolvió mercancía del pedido {order_id}. Pedido: {orderReturn2}. Mensaje del cliente: {customer_question}. Información de {shop_name}."); // ???
define("v_smsprestashop_sqltemplate23_os","Obtuvimos su demanda. Pedido {order_id}. Un buen día, {shop_name}.");
define("v_smsprestashop_sqltemplate4_os","En el pedido {order_id} se ha cambiado la cantidad, {orderSlip2}. Información de {shop_name}."); // ?
define("v_smsprestashop_sqltemplate24_os","En su pedido número {order_id} se ha cambiado la cantidad, {orderSlip2}. Un buen día, {shop_name}.");
define("v_smsprestashop_sqltemplate5_os","Confirmación del pago, pedido número: {order_id}, pago: {order_payment},  suma: {order_total_paid} {order_currency}. Información de {shop_name}.");
define("v_smsprestashop_sqltemplate25_os","Obtuvimos pago de su pedido {order_id} a través de {order_payment},  suma: {order_total_paid} {order_currency}. Un buen día, {shop_name}.");
define("v_smsprestashop_sqltemplate62_os","Pedido número {order_id} ha sido actualizado con número de envío {order_shipping_number} que le ha asignado el transportista. Información de {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_os","Estimado cliente, la mercancía de su pedido número {order_id} ha sido enviada, número que ha asignado transportista al envío es {order_shipping_number}. Un buen día, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_os","Este producto ha sido eliminado de {shop_name}, id: {product_id}, ref: {product_ref}, nombre: {product_name}.  Eliminado por cliente: {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_os","La cantidad del producto se ha cambiado, id: {product_id}, ref: {product_ref}, nombre: {product_name}, nueva cantidad: {product_quantity}, contratista: {product_supplier}. Información de {shop_name}.");
define("v_smsprestashop_sqltemplate9_os","Esta mercancía está agotándose, id: {product_id}, ref: {product_ref}, nombre: {product_name}, cantidad: {product_quantity}. Información de {shop_name}.");
define("v_smsprestashop_sqltemplate10_os","En pedido {order_id} ha sido cancelada la mercancía id: {product_id}, ref: {product_ref}, nombre: {product_name}. cantidad: {product_quantity}, la cantidad cancelada: {product_quantity_reinjected}. Información de {shop_name}."); // ? quantity reinjected
define("v_smsprestashop_sqltemplate11_os","Estado del pedido {order_id} se ha cambiado a ");
define("v_smsprestashop_sqltemplate111_os",". Información de {shop_name}.");
define("v_smsprestashop_sqltemplate211_os","Estimado cliente, estado de su pedido {order_id} cambió a ");
define("v_smsprestashop_sqltemplate2111_os",". Un buen día, {shop_name}.");






// Virtuemart
define("v_about_version_vm","Virtue SMS módulo, versión ");
define("v_about_supported_text_vm","Las versiones de Virtuemart apoyadas:");
define("v_about_supported_version_vm","2.3.x");
define("v_about_manual_url_vm","www.virtue-sms.net/manual.html");
define("v_about_website_name_vm","www.virtue-sms.net");
define("v_about_website_url_vm","www.virtue-sms.net/es/index.html");

define("v_smsprestashop_sqltemplate1_vm","Nuevo pedido de {customer_firstname} {customer_lastname}, cliente: {customer_id}, pedido: {order_id}, pago: {order_payment}, suma: {order_total_paid} {order_currency}. Pedido: {order_products2}. Información de {shop_name}.");
define("v_smsprestashop_sqltemplate21_vm","Su pedido {order_id} ha sido creado con éxito, pago: {order_payment}, suma: {order_total_paid} {order_currency}. Un buen día, {shop_name}.");
define("v_smsprestashop_sqltemplate2_vm","Cliente  {customer_firstname} {customer_lastname}, id: {customer_id}, se ha registrado ahora mismo a {shop_name}.");
define("v_smsprestashop_sqltemplate22_vm","Estimado/a {customer_firstname} {customer_lastname}, su cuenta en {shop_name} se ha creado con éxito. Nombre del usuario: {customer_email}. ¡Un buen día!");
define("v_smsprestashop_sqltemplate3_vm","Cliente {customer_firstname} {customer_lastname}, id: {customer_id}, devolvió mercancía del pedido {order_id}. Pedido: {orderReturn2}. Mensaje del cliente: {customer_question}. Información de {shop_name}."); // ???
define("v_smsprestashop_sqltemplate23_vm","Obtuvimos su demanda. Pedido {order_id}. Un buen día, {shop_name}.");
define("v_smsprestashop_sqltemplate4_vm","En el pedido {order_id} se ha cambiado la cantidad, {orderSlip2}. Información de {shop_name}."); // ?
define("v_smsprestashop_sqltemplate24_vm","En su pedido número {order_id} se ha cambiado la cantidad, {orderSlip2}. Un buen día, {shop_name}.");
define("v_smsprestashop_sqltemplate5_vm","Confirmación del pago, pedido número: {order_id}, pago: {order_payment},  suma: {order_total_paid} {order_currency}. Información de {shop_name}.");
define("v_smsprestashop_sqltemplate25_vm","Obtuvimos pago de su pedido {order_id} a través de {order_payment},  suma: {order_total_paid} {order_currency}. Un buen día, {shop_name}.");
define("v_smsprestashop_sqltemplate62_vm","Pedido número {order_id} ha sido actualizado con número de envío {order_shipping_number} que le ha asignado el transportista. Información de {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_vm","Estimado cliente, la mercancía de su pedido número {order_id} ha sido enviada, número que ha asignado transportista al envío es {order_shipping_number}. Un buen día, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_vm","Este producto ha sido eliminado de {shop_name}, id: {product_id}, ref: {product_ref}, nombre: {product_name}.  Eliminado por cliente: {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_vm","La cantidad del producto se ha cambiado, id: {product_id}, ref: {product_ref}, nombre: {product_name}, nueva cantidad: {product_quantity}, contratista: {product_supplier}. Información de {shop_name}.");
define("v_smsprestashop_sqltemplate9_vm","Esta mercancía está agotándose, id: {product_id}, ref: {product_ref}, nombre: {product_name}, cantidad: {product_quantity}. Información de {shop_name}.");
define("v_smsprestashop_sqltemplate10_vm","En pedido {order_id} ha sido cancelada la mercancía id: {product_id}, ref: {product_ref}, nombre: {product_name}. cantidad: {product_quantity}, la cantidad cancelada: {product_quantity_reinjected}. Información de {shop_name}."); // ? quantity reinjected
define("v_smsprestashop_sqltemplate11_vm","Estado del pedido {order_id} se ha cambiado a ");
define("v_smsprestashop_sqltemplate111_vm",". Información de {shop_name}.");
define("v_smsprestashop_sqltemplate211_vm","Estimado cliente, estado de su pedido {order_id} cambió a ");
define("v_smsprestashop_sqltemplate2111_vm",". Un buen día, {shop_name}.");












// Magento
define("v_about_version_ms","Mage SMS módulo, versión ");
define("v_about_supported_text_ms","Las versiones de Magento apoyadas:");
define("v_about_supported_version_ms","1.6.x - 1.7.x");
define("v_about_manual_url_ms","www.mage-sms.com/manual.html");
define("v_about_website_name_ms","www.mage-sms.com");
define("v_about_website_url_ms","www.mage-sms.com/es/index.html");

define("v_smsprestashop_sqltemplate1_ms","Nuevo pedido de {customer_firstname} {customer_lastname}, cliente: {customer_id}, pedido: {order_id}, pago: {order_payment}, suma: {order_total_paid} {order_currency}. Pedido: {order_products2}. Información de {shop_name}.");
define("v_smsprestashop_sqltemplate21_ms","Su pedido {order_id} ha sido creado con éxito, pago: {order_payment}, suma: {order_total_paid} {order_currency}. Un buen día, {shop_name}.");
define("v_smsprestashop_sqltemplate2_ms","Cliente  {customer_firstname} {customer_lastname}, id: {customer_id}, se ha registrado ahora mismo a {shop_name}.");
define("v_smsprestashop_sqltemplate22_ms","Estimado/a {customer_firstname} {customer_lastname}, su cuenta en {shop_name} se ha creado con éxito. Nombre del usuario: {customer_email}. ¡Un buen día!");
define("v_smsprestashop_sqltemplate3_ms","Cliente {customer_firstname} {customer_lastname}, id: {customer_id}, devolvió mercancía del pedido {order_id}. Pedido: {orderReturn2}. Mensaje del cliente: {customer_question}. Información de {shop_name}."); // ???
define("v_smsprestashop_sqltemplate23_ms","Obtuvimos su demanda. Pedido {order_id}. Un buen día, {shop_name}.");
define("v_smsprestashop_sqltemplate4_ms","En el pedido {order_id} se ha cambiado la cantidad, {orderSlip2}. Información de {shop_name}."); // ?
define("v_smsprestashop_sqltemplate24_ms","En su pedido número {order_id} se ha cambiado la cantidad, {orderSlip2}. Un buen día, {shop_name}.");
define("v_smsprestashop_sqltemplate5_ms","Confirmación del pago, pedido número: {order_id}, pago: {order_payment},  suma: {order_total_paid} {order_currency}. Información de {shop_name}.");
define("v_smsprestashop_sqltemplate25_ms","Obtuvimos pago de su pedido {order_id} a través de {order_payment},  suma: {order_total_paid} {order_currency}. Un buen día, {shop_name}.");
define("v_smsprestashop_sqltemplate62_ms","Pedido número {order_id} ha sido actualizado con número de envío {order_shipping_number} que le ha asignado el transportista. Información de {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_ms","Estimado cliente, la mercancía de su pedido número {order_id} ha sido enviada, número que ha asignado transportista al envío es {order_shipping_number}. Un buen día, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_ms","Este producto ha sido eliminado de {shop_name}, id: {product_id}, ref: {product_ref}, nombre: {product_name}.  Eliminado por cliente: {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_ms","La cantidad del producto se ha cambiado, id: {product_id}, ref: {product_ref}, nombre: {product_name}, nueva cantidad: {product_quantity}, contratista: {product_supplier}. Información de {shop_name}.");
define("v_smsprestashop_sqltemplate9_ms","Esta mercancía está agotándose, id: {product_id}, ref: {product_ref}, nombre: {product_name}, cantidad: {product_quantity}. Información de {shop_name}.");
define("v_smsprestashop_sqltemplate10_ms","En pedido {order_id} ha sido cancelada la mercancía id: {product_id}, ref: {product_ref}, nombre: {product_name}. cantidad: {product_quantity}, la cantidad cancelada: {product_quantity_reinjected}. Información de {shop_name}."); // ? quantity reinjected
define("v_smsprestashop_sqltemplate11_ms","Estado del pedido {order_id} se ha cambiado a ");
define("v_smsprestashop_sqltemplate111_ms",". Información de {shop_name}.");
define("v_smsprestashop_sqltemplate211_ms","Estimado cliente, estado de su pedido {order_id} cambió a ");
define("v_smsprestashop_sqltemplate2111_ms",". Un buen día, {shop_name}.");









?>