<?php

return array(

 // client
 'organization' => 'Empresa',
 'name' => 'Nombre',
 'website' => 'Sitio Web',
 'work_phone' => 'Teléfono',
 'address' => 'Dirección',
 'address1' => 'Calle',
 'address2' => 'Bloq/Pta',
 'city' => 'Ciudad',
 'state' => 'Región/Provincia',
 'postal_code' => 'Código Postal',
 'country_id' => 'País',
 'contacts' => 'Contactos',
 'first_name' => 'Nombres',
 'last_name' => 'Apellidos',
 'phone' => 'Teléfono',
 'email' => 'Email',
 'additional_info' => 'Información adicional',
 'payment_terms' => 'Términos de pago',
 'currency_id' => 'Divisa',
 'size_id' => 'Tamaño',
 'industry_id' => 'Industria',
 'private_notes' => 'Notas Privadas',

 // invoice
 'invoice' => 'Factura',
 'client' => 'Cliente',
 'invoice_date' => 'Fecha de factura',
 'due_date' => 'Fecha de pago',
 'invoice_number' => 'Número de Factura',
 'invoice_number_short' => 'Nº de Factura',
 'po_number' => 'Apartado de correos',
 'po_number_short' => 'Apdo.',
 'frequency_id' => 'Frecuencia',
 'discount' => 'Descuento',
 'taxes' => 'Impuestos',
 'tax' => 'Impuesto',
 'item' => 'Concepto',
 'description' => 'Descripción',
 'unit_cost' => 'Coste unitario',
 'quantity' => 'Cantidad',
 'line_total' => 'Total',
 'subtotal' => 'Subtotal',
 'paid_to_date' => 'Pagado',
 'balance_due' => 'Pendiente',
 'invoice_design_id' => 'Diseño',
 'terms' => 'Términos',
 'your_invoice' => 'Tu factura',
 'remove_contact' => 'Eliminar contacto',
 'add_contact' => 'Añadir contacto',
 'create_new_client' => 'Crear nuevo cliente',
 'edit_client_details' => 'Editar detalles de cliente',
 'enable' => 'Activar',
 'learn_more' => 'Aprender más',
 'manage_rates' => 'Gestionar tarifas',
 'note_to_client' => 'Nota para el cliente',
 'invoice_terms' => 'Términos de cliente',
 'save_as_default_terms' => 'Guardar como términos por defecto',
 'download_pdf' => 'Descargar PDF',
 'pay_now' => 'Pagar ahora',
 'save_invoice' => 'Guardar factura',
 'clone_invoice' => 'Clonar factura',
 'archive_invoice' => 'Archivar factura',
 'delete_invoice' => 'Eliminar factura',
 'email_invoice' => 'Enviar factura por correo',
 'enter_payment' => 'Agregar pago',
 'tax_rates' => 'Tasas de impuesto',
 'rate' => 'Tasas',
 'settings' => 'Configuración',
 'enable_invoice_tax' => 'Activar <b>impuesto</b>',
 'enable_line_item_tax' => 'Activar <b>impuesto por partida</b>',

 // navigation
 'dashboard' => 'Panel de control',
 'clients' => 'Clientes',
 'invoices' => 'Facturas',
 'payments' => 'Pagos',
 'credits' => 'Créditos',
 'history' => 'Historia',
 'search' => 'Búsqueda',
 'sign_up' => 'registrate',
 'guest' => 'invitado',
 'company_details' => 'Detalles de la empresa',
 'online_payments' => 'Pagos en linea',
 'notifications' => 'Notificaciones',
 'import_export' => 'Importar/Exportar',
 'done' => 'Realizado',
 'save' => 'Guardar',
 'create' => 'Crear',
 'upload' => 'Subir',
 'import' => 'Importar',
 'download' => 'Descargar',
 'cancel' => 'Cancelar',
 'close' => 'Cerrar',
 'provide_email' => 'Por favor facilita una dirección de correo válido.',
 'powered_by' => 'Plataforma por ',
 'no_items' => 'No hay data',

 // recurring invoices
 'recurring_invoices' => 'Facturas habituales',
 'recurring_help' => '<p>Enviar facturas automáticamente a clientes semanalmente, bi-mensualmente, mensualmente, trimestral o anualmente. </p>
       <p>Uso :MONTH, :QUARTER or :YEAR para fechas dinámicas. Matemáticas básicas también funcionan bien. Por ejemplo: :MONTH-1.</p>
       <p>Ejemplos de variables dinámicas de factura:</p>
       <ul>
         <li>"Afiliación de gimnasio para el mes de:MONTH" => Afiliación de gimnasio para el mes de julio"</li>
         <li>":YEAR+1 suscripción anual" => "2015 suscripción anual"</li>
         <li>"Retainer payment for :QUARTER+1" => "Pago anticipo de pagos para T2"</li>
       </ul>',

 // dashboard
 'in_total_revenue' => 'ingreso total',
 'billed_client' => 'cliente facturado',
 'billed_clients' => 'clientes facturados',
 'active_client' => 'cliente activo',
 'active_clients' => 'clientes activos', 
 'invoices_past_due' => 'Facturas vencidas',
 'upcoming_invoices' => 'Próximas facturas',
 'average_invoice' => 'Promedio de facturas',

 // list pages
 'archive' => 'Archivar',
 'delete' => 'Eliminar',
 'archive_client' => 'Archivar cliente',
 'delete_client' => 'Eliminar cliente',
 'archive_payment' => 'Archivar pago',
 'delete_payment' => 'Eliminar pago',
 'archive_credit' => 'Archivar crédito',
 'delete_credit' => 'Eliminar crédito',
 'show_archived_deleted' => 'Mostrar archivados/eliminados',
 'filter' => 'Filtrar',
 'new_client' => 'Nuevo cliente',
 'new_invoice' => 'Nueva factura',
 'new_payment' => 'Nuevo pago',
 'new_credit' => 'Nuevo crédito',
 'contact' => 'Contacto',
 'date_created' => 'Fecha de creación',
 'last_login' => 'Último acceso',
 'balance' => 'Balance',
 'action' => 'Acción',
 'status' => 'Estado',
 'invoice_total' => 'Total facturado',
 'frequency' => 'Frequencia',
 'start_date' => 'Fecha de inicio',
 'end_date' => 'Fecha de finalizacion',
 'transaction_reference' => 'Referencia de transacción',
 'method' => 'Método',
 'payment_amount' => 'Cantidad de Pago',
 'payment_date' => 'Fecha de Pago',
 'credit_amount' => 'Cantidad de Crédito',
 'credit_balance' => 'Balance de Crédito',
 'credit_date' => 'Fecha de Crédito',
 'empty_table' => 'Tabla vacía',
 'select' => 'Seleccionar',
 'edit_client' => 'Editar Cliente',
 'edit_invoice' => 'Editar Factura',

 // client view page
 'create_invoice' => 'Crear Factura',
 'enter_credit' => 'Entrar Crédito',
 'last_logged_in' => 'Última vez accedido',
 'details' => 'Detalles',
 'standing' => 'Standing',
 'credit' => 'Crédito',
 'activity' => 'Actividad',
 'date' => 'Fecha',
 'message' => 'Mensaje',
 'adjustment' => 'Ajustes',
 'are_you_sure' => '¿Estás seguro?',

 // payment pages
 'payment_type_id' => 'Tipo de pago',
 'amount' => 'Cantidad',

 // account/company pages
 'work_email' => 'Correo electrónico de la empresa',
 'language_id' => 'Idioma',
 'timezone_id' => 'Zona horaria',
 'date_format_id' => 'Formato de fecha',
 'datetime_format_id' => 'Format de fecha/hora',
 'users' => 'Usuarios',
 'localization' => 'Localización',
 'remove_logo' => 'Eliminar logo',
 'logo_help' => 'Formatos aceptados: JPEG, GIF y PNG. Altura recomendada: 120px',
 'payment_gateway' => 'Pasarela de pago',
 'gateway_id' => 'Proveedor',
 'email_notifications' => 'Notificaciones de email',
 'email_sent' => 'Avísame por email cuando una factura <b>se envía</b>',
 'email_viewed' => 'Avísame por email cuando una factura <b>se visualiza</b>',
 'email_paid' => 'Avísame por email cuando una factura <b>se paga</b>',
 'site_updates' => 'Actualizaciones del sitio',
 'custom_messages' => 'Mensajes a medida',
 'default_invoice_terms' => 'Configurar términos de factura por defecto',
 'default_email_footer' => 'Configurar firma de email por defecto',
 'import_clients' => 'Importar datos del cliente',
 'csv_file' => 'Seleccionar archivo CSV',
 'export_clients' => 'Exportar datos del cliente',
 'select_file' => 'Seleccionar archivo',
 'first_row_headers' => 'Usar la primera fila como encabezados',
 'column' => 'Columna',
 'sample' => 'Ejemplo',
 'import_to' => 'Importar a',
 'client_will_create' => 'cliente se creará',
 'clients_will_create' => 'clientes se crearan',

 // application messages
 'created_client' => 'cliente creado con éxito',
 'created_clients' => ':count clientes creados con éxito',
 'updated_settings' => 'Configuración actualizada con éxito',
 'removed_logo' => 'Logo eliminado con éxito',
 'sent_message' => 'Mensaje enviado con éxito',
 'invoice_error' => 'Seleccionar cliente y corregir errores.',
 'limit_clients' => 'Lo sentimos, se ha pasado del límite de :count clientes',
 'payment_error' => 'Ha habido un error en el proceso de tu pago. Inténtalo de nuevo más tarde.',
 'registration_required' => 'Inscríbete para enviar una factura',
 'confirmation_required' => 'Por favor confirma tu dirección de corro electrónico',
 'updated_client' => 'Cliente actualizado con éxito',
 'created_client' => 'Cliente creado con éxito',
 'archived_client' => 'Cliente archivado con éxito',
 'archived_clients' => ':count clientes archivados con éxito',
 'deleted_client' => 'Cliente eliminado con éxito',
 'deleted_clients' => ':count clientes eliminados con éxito',
 'updated_invoice' => 'Factura actualizada con éxito',
 'created_invoice' => 'Factura creada con éxito',
 'cloned_invoice' => 'Factura clonada con éxito',
 'emailed_invoice' => 'Factura enviada con éxito',
 'and_created_client' => 'y cliente creado ',
 'archived_invoice' => 'Factura archivada con éxito',
 'archived_invoices' => ':count facturas archivados con éxito',
 'deleted_invoice' => 'Factura eliminada con éxito',
 'deleted_invoices' => ':count facturas eliminadas con éxito',
 'created_payment' => 'Pago creado con éxito',
 'archived_payment' => 'Pago archivado con éxito',
 'archived_payments' => ':count pagos archivados con éxito',
 'deleted_payment' => 'Pago eliminado con éxito',
 'deleted_payments' => ':count pagos eliminados con éxito',
 'applied_payment' => 'Pago aplicado con éxito',
 'created_credit' => 'Crédito creado con éxito',
 'archived_credit' => 'Crédito archivado con éxito',
 'archived_credits' => ':count creditos archivados',
 'deleted_credit' => 'Créditos eliminados con éxito',
 'deleted_credits' => ':count creditos eliminados con éxito',
 // Emails
 'confirmation_subject' => 'Invoice Ninja Confirmación de Cuenta',
 'confirmation_header' => 'Confirmación de Cuenta',
 'confirmation_message' => 'Por favor, haz clic en el enlace abajo para confirmar tu cuenta.',
 'invoice_subject' => 'Nueva factura de :account',
 'invoice_message' => 'Para visualizar tu factura para :amount, haz clic en el enlace abajo.',
 'payment_subject' => 'Pago recibido',
 'payment_message' => 'Gracias por tu pago de :amount.',
 'email_salutation' => 'Estimado :name,',
 'email_signature' => 'Un saludo cordial,',
 'email_from' => 'El equipo de InvoiceNinja ',
 'user_email_footer' => 'Para ajustar la configuración de las notificaciones de tu email, visita '.SITE_URL.'/company/notifications',
 'invoice_link_message' => 'Para visualizar la factura de cliente, haz clic en el enlace abajo:',
 'notification_invoice_paid_subject' => 'Factura :invoice ha sido pagado por :client',
 'notification_invoice_sent_subject' => 'Factura :invoice enviada a :client',
 'notification_invoice_viewed_subject' => 'Factura :invoice ha sido visualizado por :client',
 'notification_invoice_paid' => 'Un pago por valor de :amount se ha realizado por el cliente :client a la factura :invoice.',
 'notification_invoice_sent' => 'La factura :invoice por valor de :amount fue enviada al cliente :cliente.',
 'notification_invoice_viewed' => 'La factura :invoice por valor de :amount fue visualizada por el cliente :client.',
 'reset_password' => 'Puedes reconfigurar la contraseña de tu cuenta haciendo clic en el siguiente enlace:',
 'reset_password_footer' => 'Si no has solicitado un cambio de contraseña, por favor contacta con nosostros: ' . CONTACT_EMAIL,

 // Payment page
 'secure_payment' => 'Pago seguro',
 'card_number' => 'Número de tarjeta',
 'expiration_month' => 'Mes de caducidad', 
 'expiration_year' => 'Año de caducidad',
 'cvv' => 'CVV',

 // Security alerts
 'confide' => array(
   'too_many_attempts' => 'Demasiados intentos. Inténtalo de nuevo en un par de minutos.',
   'wrong_credentials' => 'Contraseña o email incorrecto.',
   'confirmation' => '¡Tu cuenta se ha confirmado!',
   'wrong_confirmation' => 'Código de confirmación incorrecto.',
   'password_forgot' => 'La información sobre la reconfiguración de tu contraseña se ha enviado a tu dirección de correo electrónico.',
   'password_reset' => 'Tu contraseña se ha cambiado con éxito.',
   'wrong_password_reset' => 'Contraseña no válida. Inténtalo de nuevo',
 ),

 // Pro Plan
 'pro_plan' => [
   'remove_logo' => ':link para eliminar el logo de Invoice Ninja al apuntarse al Plan Pro',
   'remove_logo_link' => 'Haz clic aquí',
 ],
 'logout' => 'Cerrar sesión',   
 'sign_up_to_save' => 'Registrate para guardar tu trabajo', 
 'agree_to_terms' =>'Estoy de acuerdo con los términos de Invoice Ninja :terms',
 'terms_of_service' => 'Términos de servicio',
 'email_taken' => 'Esta dirección de correo electrónico ya se ha registrado',
 'working' => 'Procesando',
 'success' => 'Éxito',
 'success_message' => 'Te has registrado con éxito. Por favor, haz clic en el enlace de el correo de confirmación para verificar tu dirección de correo electrónico.',
 'erase_data' => 'Esta acción eliminará todos tus datos de forma permanente.',
 'password' => 'Contraseña',
  
 'pro_plan_product' => 'Plan Pro',
 'pro_plan_description' => 'Un año de inscripción en el Plan Pro de Invoice Ninja.',
 'pro_plan_success' => '¡Gracias por unirte a Invoice Ninja! Al realizar el pago de tu factura, se iniciara tu PLAN PRO. ',
 'unsaved_changes' => 'Tienes cambios no guardados',
 'custom_fields' => 'Campos a medida',
 'company_fields' => 'Campos de la empresa',
 'client_fields' => 'Campos del cliente',
 'field_label' => 'Etiqueta del campo',
 'field_value' => 'Valor del campo',
 'edit' => 'Editar',
 'view_as_recipient' => 'Ver como destinitario',   

 // product management
 'product_library' => 'Inventario de productos',
 'product' => 'Producto',
 'products' => 'Productos',
 'fill_products' => 'Productos auto-rellenados',
 'fill_products_help' => 'Seleccionar un producto automáticamente <b>configurará la descripción y coste</b>',
 'update_products' => 'Auto-actualizar productos',
 'update_products_help' => 'Actualizar una factura automáticamente <b>actualizará los productos</b>',
 'create_product' => 'Crear Productos',
 'edit_product' => 'Editar Productos',
 'archive_product' => 'Archivar Productos',
 'updated_product' => 'Producto actualizado con éxito',
 'created_product' => 'Producto creado con éxito',
 'archived_product' => 'Producto archivado con éxito',
 'pro_plan_custom_fields' => ':link para activar campos a medida al apuntarse al Plan Pro',
 'advanced_settings' => 'Configuración Avanzada',
 'pro_plan_advanced_settings' => ':link para activar la configuración avanzada al apuntarse al Plan Pro',
 'invoice_design' => 'Diseño de factura',
 'specify_colors' => 'Especificar colores',
 'specify_colors_label' => 'Seleccionar los colores usados en la factura',
 'chart_builder' => 'Constructor de tablas',
 'ninja_email_footer' => 'Usar :site para facturar a tus clientes y recibir pagos de forma gratuita!',
 'go_pro' => 'Hazte Pro',

 // Quotes
 'quote' => 'Cotización',
 'quotes' => 'Cotizaciones',
 'quote_number' => 'Número de cotización',
 'quote_number_short' => 'Cotización #',
 'quote_date' => 'Fecha de cotización',
 'quote_total' => 'Total cotizado',
 'your_quote' => 'Tu cotización',
 'total' => 'Total',
 'clone' => 'Clon',
 'new_quote' => 'Nueva cotización',
 'create_quote' => 'Crear Cotización',
 'edit_quote' => 'Editar Cotización',
 'archive_quote' => 'Archivar Cotización',
 'delete_quote' => 'Eliminar Cotización',
 'save_quote' => 'Guardar Cotización',
 'email_quote' => 'Enviar Cotización',
 'clone_quote' => 'Clonar Cotización',
 'convert_to_invoice' => 'Convertir a Factura',
 'view_invoice' => 'Ver Factura',
 'view_quote' => 'Ver Cotización',
 'view_client' => 'Ver Cliente',
 'updated_quote' => 'Cotización actualizada con éxito',
 'created_quote' => 'Cotización creada con éxito',
 'cloned_quote' => 'Cotización clonada con éxito',
 'emailed_quote' => 'Cotización enviada con éxito',
 'archived_quote' => 'Cotización archivada con éxito',
 'archived_quotes' => ':count cotizaciones archivadas con exito',
 'deleted_quote' => 'Cotizaciónes eliminadas con éxito',
 'deleted_quotes' => ':count cotizaciones eliminadas con exito',
 'converted_to_invoice' => 'Cotización convertida a factura con éxito',
 'quote_subject' => 'Nueva cotización de :account',
 'quote_message' => 'Para visualizar la cotización por valor de :amount, haz clic en el enlace abajo.',
 'quote_link_message' => 'Para visualizar tu cotización haz clic en el enlace abajo:',
 'notification_quote_sent_subject' => 'Cotización :invoice enviada a :client',
 'notification_quote_viewed_subject' => 'Cotización :invoice visualizada por :client',
 'notification_quote_sent' => 'La cotización :invoice por un valor de :amount, ha sido enviada al cliente :client.',
 'notification_quote_viewed' => 'La cotizacion :invoice por un valor de :amount ha sido visualizada por :client.', 
 'session_expired' => 'Tu sesión ha caducado.',
 'invoice_fields' => 'Campos de factura',
 'invoice_options' => 'Opciones de factura',
 'hide_quantity' => 'Ocultar cantidad',
 'hide_quantity_help' => 'Si las cantidades de tus partidas siempre son 1, entonces puedes organizar tus facturas mejor al no mostrar este campo.',
 'hide_paid_to_date' => 'Ocultar facturas pagadas hasta la fecha de hoy',
 'hide_paid_to_date_help' => 'Solo mostrar la opción “Pagado al día de hoy” en tus facturas en cuanto se ha recibido una factura.',
 'charge_taxes' => 'Cobrar impuestos',
 'user_management' => 'Gestión de usario',
 'add_user' => 'Añadir usario',
 'send_invite' => 'Invitación enviada',
 'sent_invite' => 'Invitación enviada con éxito',
 'updated_user' => 'Usario actualizado con éxito',
 'invitation_message' => 'Te ha invitado :invitor. ',
 'register_to_add_user' => 'Regístrate para añadir usarios',
 'user_state' => 'Estado',
 'edit_user' => 'Editar Usario',
 'delete_user' => 'Eliminar Usario',
 'active' => 'Activar',
 'pending' => 'Pendiente',
 'deleted_user' => 'Usario eliminado con éxito',
 'limit_users' => 'Lo sentimos, esta acción excederá el límite de ' . MAX_NUM_USERS . ' usarios',
 'confirm_email_invoice' => '¿Estás seguro que quieres enviar esta factura?',
 'confirm_email_quote' => 'Estás seguro que quieres enviar esta cotización?',
 'confirm_recurring_email_invoice' => 'Se ha marcado esta factura como recurrente, estás seguro que quieres enviar esta factura?',
 'cancel_account' => 'Cancelar Cuenta',
 'cancel_account_message' => 'AVISO: Esta acción eliminará todos tus datos de forma permanente.',
 'go_back' => 'Atrás',
 'data_visualizations' => 'Visualización de datos',
 'sample_data' => 'Datos de ejemplo',
 'hide' => 'Ocultar',
 'new_version_available' => 'Una nueva versión de :releases_link disponibles. Estás utilizando versión:usario_versión, la última versión es:latest_version',
 'invoice_settings' => 'Configuración de facturas',
 'invoice_number_prefix' => 'Prefijo de facturación',
 'invoice_number_counter' => 'Numeración de facturación',
 'quote_number_prefix' => 'Prejijo de cotizaciones',
 'quote_number_counter' => 'Numeración de cotizaciones',
 'share_invoice_counter' => 'Compartir la numeración para catización y facturación',
 'invoice_issued_to' => 'Factura emitida a',
 'invalid_counter' => 'Para evitar posibles conflictos, por favor crea un prefijo de facturación y de cotización.',
 'mark_sent' => 'Marcar como enviado',

);
