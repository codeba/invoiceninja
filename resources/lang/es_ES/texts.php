﻿<?php

return array(

   // client
   'organization' => 'Empresa',
   'name' => 'Nombre de Empresa',
   'website' => 'Sitio Web',
   'work_phone' => 'Teléfono',
   'address' => 'Dirección',
   'address1' => 'Calle',
   'address2' => 'Bloq/Pta',
   'city' => 'Ciudad',
   'state' => 'Provincia',
   'postal_code' => 'Código Postal',
   'country_id' => 'País',
   'contacts' => 'Contactos',
   'first_name' => 'Nombres',
   'last_name' => 'Apellidos',
   'phone' => 'Teléfono',
   'email' => 'Email',
   'additional_info' => 'Información adicional',
   'payment_terms' => 'Plazos de pago', //
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
   'invoice_number_short' => 'Factura Nº',
   'po_number' => 'Apartado de correo',
   'po_number_short' => 'Apdo.',
   'frequency_id' => 'Frecuencia',
   'discount' => 'Descuento',
   'taxes' => 'Impuestos',
   'tax' => 'IVA', 
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
   'edit_client_details' => 'Editar detalles del cliente',
   'enable' => 'Activar',
   'learn_more' => 'Saber más',
   'manage_rates' => 'Gestionar tarifas',
   'note_to_client' => 'Nota para el cliente',
   'invoice_terms' => 'Términos de facturación',
   'save_as_default_terms' => 'Guardar como términos por defecto',
   'download_pdf' => 'Descargar PDF',
   'pay_now' => 'Pagar Ahora',
   'save_invoice' => 'Guardar factura',
   'clone_invoice' => 'Clonar factura',
   'archive_invoice' => 'Archivar factura',
   'delete_invoice' => 'Eliminar factura',
   'email_invoice' => 'Enviar factura por email',
   'enter_payment' => 'Agregar pago',
   'tax_rates' => 'Tasas de impuesto',
   'rate' => 'Tasas',
   'settings' => 'Configuración',
   'enable_invoice_tax' => 'Activar impuesto <b>para la factura</b>',
   'enable_line_item_tax' => 'Activar impuesto <b>por concepto</b>',

   // navigation
   'dashboard' => 'Inicio',
   'clients' => 'Clientes',
   'invoices' => 'Facturas',
   'payments' => 'Pagos',
   'credits' => 'Créditos',
   'history' => 'Historial',
   'search' => 'Búsqueda',
   'sign_up' => 'Registrarse',
   'guest' => 'Invitado',
   'company_details' => 'Detalles de la Empresa',
   'online_payments' => 'Pagos en Linea',
   'notifications' => 'Notificaciones',
   'import_export' => 'Importar/Exportar',
   'done' => 'Hecho',
   'save' => 'Guardar',
   'create' => 'Crear',
   'upload' => 'Subir',
   'import' => 'Importar',
   'download' => 'Descargar',
   'cancel' => 'Cancelar',
   'close' => 'Cerrar',
   'provide_email' => 'Por favor facilita una dirección de correo válida.',
   'powered_by' => 'Creado por',
   'no_items' => 'No hay datos',

   // recurring invoices
   'recurring_invoices' => 'Facturas recurrentes',
   'recurring_help' => '<p>Enviar facturas automáticamente a clientes semanalmente, bi-mensualmente, mensualmente, trimestral o anualmente. </p>
   <p>Uso :MONTH, :QUARTER or :YEAR para fechas dinámicas. Matemáticas básicas también funcionan bien. Por ejemplo: :MONTH-1.</p>
   <p>Ejemplos de variables dinámicas de factura:</p>
   <ul>
      <li>"Afiliación de gimnasio para el mes de:MONTH" => Afiliación de gimnasio para el mes de julio"</li>
      <li>":YEAR+1 suscripción anual" => "2015 suscripción anual"</li>
      <li>"Retainer payment for :QUARTER+1" => "Pago anticipo de pagos para T2"</li>
   </ul>',

   // dashboard
   'in_total_revenue' => 'Ingreso Total',
   'billed_client' => 'Cliente Facturado',
   'billed_clients' => 'Clientes Facturados',
   'active_client' => 'Cliente Activo',
   'active_clients' => 'Clientes Activos', 
   'invoices_past_due' => 'Facturas Vencidas',
   'upcoming_invoices' => 'Próximas Facturas',
   'average_invoice' => 'Promedio de Facturación',

      // list pages
    'archive' => 'Archivar',
    'delete' => 'Eliminar',
    'archive_client' => 'Archivar Cliente',
    'delete_client' => 'Eliminar Cliente',
    'archive_payment' => 'Archivar Pago',
    'delete_payment' => 'Eliminar Pago',
    'archive_credit' => 'Archivar Crédito',
    'delete_credit' => 'Eliminar Crédito',
    'show_archived_deleted' => 'Mostrar archivados o eliminados en ',
    'filter' => 'Filtrar',
    'new_client' => 'Nuevo Cliente',
    'new_invoice' => 'Nueva Factura',
    'new_payment' => 'Nuevo Pago',
    'new_credit' => 'Nuevo Crédito',
    'contact' => 'Contacto',
    'date_created' => 'Fecha de Creación',
    'last_login' => 'Último Acceso',
    'balance' => 'Balance',
    'action' => 'Acción',
    'status' => 'Estado',
    'invoice_total' => 'Total Facturado',
    'frequency' => 'Frequencia',
    'start_date' => 'Fecha de Inicio',
    'end_date' => 'Fecha de Finalización',
    'transaction_reference' => 'Referencia de Transacción',
    'method' => 'Método',
    'payment_amount' => 'Valor del Pago',
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
    'Create Invoice' => 'Crear Factura',
    'enter_credit' => 'Agregar Crédito',
    'last_logged_in' => 'Último inicio de sesión',
    'details' => 'Detalles',
    'standing' => 'Situación', //
    'credit' => 'Crédito',
    'activity' => 'Actividad',
    'date' => 'Fecha',
    'message' => 'Mensaje',
    'adjustment' => 'Ajustes',
    'are_you_sure' => '¿Está Seguro?',

   // payment pages
   'payment_type_id' => 'Tipo de pago',
   'amount' => 'Cantidad',
   
       // Nuevo texto extraido - New text extracted
   'Recommended Gateway' => 'Pasarelas Recomendadas',//
   'Accepted Credit Cards' => 'Tarjetas de Credito Permitidas',//
   'Payment Gateway' => 'Pasarelas de Pago',//
   'Select Gateway' => 'Seleccione Pasarela',//
   'Enable' => 'Activo',//
   'Api Login Id' => 'Introduzca Api Id',//
   'Transaction Key' => 'Clave de Transacción',//
   'Create an account' => 'Crear cuenta nueva',//
   'Other Options' => 'Otras Opciones',//

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
   'confirmation_required' => 'Por favor confirma tu dirección de correo electrónico',

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
   'archived_credits' => ':count creditos archivados con éxito',
   'deleted_credit' => 'Créditos eliminados con éxito',
   'deleted_credits' => ':count creditos eliminados con éxito',

   // Emails
   'confirmation_subject' => 'Corfimación de tu cuenta en Invoice Ninja',
   'confirmation_header' => 'Confirmación de Cuenta',
   'confirmation_message' => 'Por favor, haz clic en el enlace abajo para confirmar tu cuenta.',
   'invoice_subject' => 'Nueva factura :invoice de :account',
   'invoice_message' => 'Para visualizar tu factura por el valor de :amount, haz click en el enlace de abajo.',
   'payment_subject' => 'Pago recibido',
   'payment_message' => 'Gracias por su pago de :amount.',
   'email_salutation' => 'Estimado :name,',
   'email_signature' => 'Un cordial saludo,',
   'email_from' => 'El equipo de Invoice Ninja ',
   'user_email_footer' => 'Para ajustar la configuración de las notificaciones de tu email, visita '.SITE_URL.'/company/notifications',
   'invoice_link_message' => 'Para visualizar la factura de cliente, haz clic en el enlace de abajo:',
   'notification_invoice_paid_subject' => 'La factura :invoice ha sido pagada por el cliente :client',
   'notification_invoice_sent_subject' => 'La factura :invoice ha sido enviada a el cliente :client',
   'notification_invoice_viewed_subject' => 'La factura :invoice ha sido visualizado por el cliente:client',
   'notification_invoice_paid' => 'Un pago por importe de :amount ha sido realizado por el cliente :client correspondiente a la factura :invoice.',
   'notification_invoice_sent' => 'La factura :invoice por importe de :amount fue enviada al cliente :cliente.',
   'notification_invoice_viewed' => 'La factura :invoice por importe de :amount fue visualizada por el cliente :client.',
   'reset_password' => 'Puedes reconfigurar la contraseña de tu cuenta haciendo clic en el siguiente enlace:',
   'reset_password_footer' => 'Si no has solicitado un cambio de contraseña, por favor contactate con nosostros: ' . CONTACT_EMAIL,

   // Payment page
   'secure_payment' => 'Pago seguro',
   'card_number' => 'Número de tarjeta',
   'expiration_month' => 'Mes de caducidad', 
   'expiration_year' => 'Año de caducidad',
   'cvv' => 'CVV',

   // Security alerts
   'confide' => array(
      'too_many_attempts' => 'Demasiados intentos fallidos. Inténtalo de nuevo en un par de minutos.',
      'wrong_credentials' => 'Contraseña o email incorrecto.',
      'confirmation' => '¡Tu cuenta se ha confirmado!',
      'wrong_confirmation' => 'Código de confirmación incorrecto.',
      'password_forgot' => 'La información sobre el cambio de tu contraseña se ha enviado a tu dirección de correo electrónico.',
      'password_reset' => 'Tu contraseña se ha cambiado con éxito.',
      'wrong_password_reset' => 'Contraseña no válida. Inténtalo de nuevo',
      ),

   // Pro Plan
   'pro_plan' => [
   'remove_logo' => ':link haz click para eliminar el logo de Invoice Ninja',
   'remove_logo_link' => 'Haz click aquí',
   ],
   'logout' => 'Cerrar sesión',   
   'sign_up_to_save' => 'Registrate para guardar tu trabajo', 
   'agree_to_terms' =>'Estoy de acuerdo con los términos de Invoice Ninja :terms',
   'terms_of_service' => 'Términos de servicio',
   'email_taken' => 'Esta dirección de correo electrónico ya se ha registrado',
   'working' => 'Procesando',
   'success' => 'Éxito',
   'success_message' => 'Te has registrado con éxito. Por favor, haz clic en el enlace del correo de confirmación para verificar tu dirección de correo electrónico.',
   'erase_data' => 'Esta acción eliminará todos tus datos de forma permanente.',
   'password' => 'Contraseña',

   'pro_plan_product' => 'Plan Pro',
   'pro_plan_description' => 'Un año de inscripción al Plan Pro de Invoice Ninja.',
   'pro_plan_success' => '¡Gracias por unirte a Invoice Ninja! Al realizar el pago de tu factura, se iniciara tu PLAN PRO.',
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
   'fill_products' => 'Auto-rellenar productos',
   'fill_products_help' => 'Seleccionar un producto automáticamente <b>configurará la descripción y coste</b>',
   'update_products' => 'Auto-actualizar productos',
   'update_products_help' => 'Actualizar una factura automáticamente <b>actualizará los productos</b>',
   'create_product' => 'Crear Producto',
   'edit_product' => 'Editar Producto',
   'archive_product' => 'Archivar Producto',
   'updated_product' => 'Producto actualizado con éxito',
   'created_product' => 'Producto creado con éxito',
   'archived_product' => 'Producto archivado con éxito',
   'pro_plan_custom_fields' => ':link haz click para para activar campos a medida',
   'advanced_settings' => 'Configuración Avanzada',
   'pro_plan_advanced_settings' => ':link haz click para para activar la configuración avanzada',
   'invoice_design' => 'Diseño de factura',
   'specify_colors' => 'Especificar colores',
   'specify_colors_label' => 'Seleccionar los colores para usar en las facturas',
   'chart_builder' => 'Constructor de graficos',
   'ninja_email_footer' => 'Usa :site para facturar a tus clientes y recibir pagos de forma gratuita!',
   'go_pro' => 'Hazte Pro',

   // Quotes
   'quote' => 'Presupuesto',
   'quotes' => 'Presupuestos',
   'quote_number' => 'Numero de Presupuesto',
   'quote_number_short' => 'Presupuesto Nº ',
   'quote_date' => 'Fecha Presupuesto',
   'quote_total' => 'Total Presupuestado',
   'your_quote' => 'Su Presupuesto',
   'total' => 'Total',
   'clone' => 'Clonar',

    'new_quote' => 'Nuevo Presupuesto',
    'create_quote' => 'Crear Presupuesto',
    'edit_quote' => 'Editar Presupuesto',
    'archive_quote' => 'Archivar Presupuesto',
    'delete_quote' => 'Eliminar Presupuesto',
    'save_quote' => 'Guardar Presupuesto',
    'email_quote' => 'Enviar Presupuesto',
    'clone_quote' => 'Clonar Presupuesto',
    'convert_to_invoice' => 'Convertir a Factura',
    'view_invoice' => 'Ver Factura',
    'view_quote' => 'Ver Presupuesto',
    'view_client' => 'Ver Cliente',

    'updated_quote' => 'Presupuesto actualizado con éxito',
    'created_quote' => 'Presupuesto creado con éxito',
    'cloned_quote' => 'Presupuesto clonado con éxito',
    'emailed_quote' => 'Presupuesto enviado con éxito',
    'archived_quote' => 'Presupuesto archivado con éxito',
    'archived_quotes' => ':count Presupuestos archivados con exito',
    'deleted_quote' => 'Presupuesto eliminado con éxito',
    'deleted_quotes' => ':count Presupuestos eliminados con exito',
    'converted_to_invoice' => 'Presupuesto convertido a factura con éxito',

    'quote_subject' => 'Nuevo Presupuesto de :account',
    'quote_message' => 'Para ver el presupuesto por un importe de :amount, haga click en el enlace de abajo.',
    'quote_link_message' => 'Para ver su presupuesto haga click en el enlace de abajo:',
    'notification_quote_sent_subject' => 'El presupuesto :invoice enviado al cliente :client',
    'notification_quote_viewed_subject' => 'El presupuesto :invoice fue visto por el cliente :client',
    'notification_quote_sent' => 'El presupuesto :invoice por un valor de :amount, ha sido enviado al cliente :client.',
    'notification_quote_viewed' => 'El presupuesto :invoice por un valor de :amount ha sido visto por el cliente :client.', 
    'session_expired' => 'Su sesión ha caducado.',
    'invoice_fields' => 'Campos de Factura',
    'invoice_options' => 'Opciones de Factura',
    'hide_quantity' => 'Ocultar Cantidad',
    'hide_quantity_help' => 'Si las cantidades de tus partidas siempre son 1, entonces puedes organizar tus facturas mejor al no mostrar este campo.',
    'hide_paid_to_date' => 'Ocultar valor pagado a la fecha',
    'hide_paid_to_date_help' => 'Solo mostrar la opción “Pagado a la fecha” en sus facturas cuando se ha recibido un pago.',
    'charge_taxes' => 'Cargar Impuestos',
    'user_management' => 'Gestión de Usuario',
    'add_user' => 'Añadir Usuario',
    'send_invite' => 'Enviar Invitación', //Context for its use
    'sent_invite' => 'Invitación enviada con éxito',
    'updated_user' => 'Usario actualizado con éxito',
    'invitation_message' => ':invitor te ha invitado a unirte a su cuenta en G-Factura.',
    'register_to_add_user' => 'Regístrate para añadir usarios',
    'user_state' => 'Estado',
    'edit_user' => 'Editar Usario',
    'delete_user' => 'Eliminar Usario',
    'active' => 'Activo',
    'pending' => 'Pendiente',
    'deleted_user' => 'Usario eliminado con éxito',
    'limit_users' => 'Lo sentimos, esta acción excederá el límite de ' . MAX_NUM_USERS . ' usarios',
    'confirm_email_invoice' => '¿Estás seguro que quieres enviar esta factura?',
    'confirm_email_quote' => '¿Estás seguro que quieres enviar este presupuesto?',
    'confirm_recurring_email_invoice' => 'Se ha marcado esta factura como recurrente, estás seguro que quieres enviar esta factura?',
    'cancel_account' => 'Cancelar Cuenta',
    'cancel_account_message' => 'AVISO: Esta acción eliminará todos tus datos de forma permanente.',
    'go_back' => 'Atrás',
    'data_visualizations' => 'Visualización de Datos',
    'sample_data' => 'Datos de Ejemplo',
    'hide' => 'Ocultar',
    'new_version_available' => 'Una nueva versión de :releases_link disponible. Estás utilizando la versión :user_version, la última versión es :latest_version',
    'invoice_settings' => 'Configuración de Facturas',
    'invoice_number_prefix' => 'Prefijo de Facturación',
    'invoice_number_counter' => 'Numeración de Facturación',
    'quote_number_prefix' => 'Prejijo de Presupuesto',
    'quote_number_counter' => 'Numeración de Presupuestos',
    'share_invoice_counter' => 'Compartir la numeración para presupuesto y facturación',
    'invoice_issued_to' => 'Factura emitida a',
    'invalid_counter' => 'Para evitar posibles conflictos, por favor crea un prefijo de facturación y de presupuesto.',
    'mark_sent' => 'Marcar como enviado',


   'gateway_help_1' => ':link para registrarse en Authorize.net.',
   'gateway_help_2' => ':link para registrarse en Authorize.net.',
   'gateway_help_17' => ':link para obtener su firma API de PayPal.',
   'gateway_help_23' => 'Nota: utilizar su clave de API secreta, no es su clave de API publica.',
   'gateway_help_27' => ':link para registrarse en TwoCheckout.',

   'more_designs' => 'Más diseños',
   'more_designs_title' => 'Diseños adicionales para factura',
   'more_designs_cloud_header' => 'Pase a Pro para añadir más diseños de facturas',
   'more_designs_cloud_text' => '',
   'more_designs_self_host_header' => 'Obtenga 6 diseños más para facturas por sólo '.INVOICE_DESIGNS_PRICE, // comprobar
   'more_designs_self_host_text' => '',
   'buy' => 'Comprar',
   'bought_designs' => 'Añadidos con exito los diseños de factura',

   'sent' => 'Enviado',
   'timesheets' => 'Parte de Horas',

   'payment_title' => 'Introduzca su dirección de facturación y la infomración de su tarjeta de crédito',
   'payment_cvv' => '*los tres últimos dígitos de la parte posterior de su tarjeta',
   'payment_footer1' => '*La dirección de facturación debe coincidir con la de la tarjeta de crédito.',
   'payment_footer2' => '*Por favor, haga clic en "Pagar ahora" sólo una vez - esta operación puede tardar hasta 1 minuto en procesarse.',
   'vat_number' => 'NIF/CIF',

   'id_number' => 'Número de Identificación',
   'white_label_link' => 'Marca Blanca" ',
   'white_label_text' => 'Obtener una licencia de marca blanca por'.WHITE_LABEL_PRICE.' para quitar la marca Invoice Ninja de la parte superior de las páginas del cliente.', // comprobar
   'white_label_link' => 'Marca Blanca" ',
   'bought_white_label' => 'Se ha conseguido con exito la licencia de Marca Blanca',
   'white_labeled' => 'Marca Blanca',

  'restore' => 'Restaurar',
  'restore_invoice' => 'Restaurar Factura',
  'restore_quote' => 'Restaurar Presupuesto',
  'restore_client' => 'Restaurar Cliente',
  'restore_credit' => 'Restaurar Pendiente', 
  'restore_payment' => 'Restaurar Pago',

  'restored_invoice' => 'Factura restaurada con éxito',
  'restored_quote' => 'Presupuesto restaurada con éxito',
  'restored_client' => 'Cliente restaurada con éxito',
  'restored_payment' => 'Pago restaurada con éxito',
  'restored_credit' => 'Pendiente restaurada con éxito',
  
  'reason_for_canceling' => 'Ayudenos a mejorar nuestro sitio diciendonos porque se va, Gracias',
  'discount_percent' => 'Porcentaje',
  'discount_amount' => 'Cantidad',

// Ver. 1.7.0

  'invoice_history' => 'Historial de Facturas',
  'quote_history' => 'Historial de Presupuestos',
  'current_version' => 'Versión Actual',
  'select_versiony' => 'Seleccione la Versión',
  'view_history' => 'Ver Historial',

  'edit_payment' => 'Editar Pago',
  'updated_payment' => 'Pago actualizado correctamente',
  'deleted' => 'Eliminado',
  'restore_user' => 'Restaurar Usuario',
  'restored_user' => 'Usuario restaurado correctamente',
  'show_deleted_users' => 'Mostrar usuarios eliminados',
  'email_templates' => 'Plantillas de Email',
  'invoice_email' => 'Email de Facturas',
  'payment_email' => 'Email de Pagos',
  'quote_email' => 'Email de Presupuestos',
  'reset_all' => 'Restablecer Todos',
  'approve' => 'Aprobar',  

  'token_billing_type_id' => 'Token Billing', //¿?
  'token_billing_help' => 'Permite almacenar tarjetas de crédito para posteriormente realizarles el cobro.',
  'token_billing_1' => 'Deshabilitar',
  'token_billing_2' => 'La casilla Opt-In se muestra pero no está seleccionada',
  'token_billing_3' => 'La casilla Opt-Out se muestra y se selecciona',
  'token_billing_4' => 'Siempre',
  'token_billing_checkbox' => 'Almacenar datos de la tarjeta de crédito',
  'view_in_stripe' => 'Ver en Stripe',
  'use_card_on_file' => 'Use card on file', //??
  'edit_payment_details' => 'Editar detalles de pago',
  'token_billing' => 'Guardar datos de la tarjeta',
  'token_billing_secure' => 'Los datos serán almacenados de forma segura por :stripe_link',

  'support' => 'Soporte',
  'contact_information' => 'Información de Contacto',
  '256_encryption' => 'Encriptación de 256-Bit',
  'amount_due' => 'Importe a pagar',
  'billing_address' => 'Dirección de Envio',
  'billing_method' => 'Método de facturación',
  'order_overview' => 'Lista de pedidos',
  'match_address' => '*La dirección debe coincidir con la dirección asociada a la tarjeta de crédito.',
  'click_once' => '*Por favor, haga clic en "Pagar ahora" sólo una vez - la operación puede tardar hasta 1 minuto en ser procesada.',

  'default_invoice_footer' => 'Establecer pie de página por defecto en factura',
  'invoice_footer' => 'Pie de página de la factura',
  'save_as_default_footer' => 'Guardar como pie de página por defecto',

  'token_management' => 'Administrar Tokent', //?
  'tokens' => 'Tokens',
  'add_token' => 'Agregar Token',
  'show_deleted_tokens' => 'Mostrar tokens eliminados',
  'deleted_token' => 'Token eliminado correctamente',
  'created_token' => 'Token creado correctamente',
  'updated_token' => 'Token actualizado correctamente',
  'edit_token' => 'Editar Token',
  'delete_token' => 'Eliminar Token',
  'token' => 'Token',

  'add_gateway' => 'Agregar Pasarela',
  'delete_gateway' => 'Eliminar Pasarela',
  'edit_gateway' => 'Editar Pasarela',
  'updated_gateway' => 'Pasarela actualizada correctamente',
  'created_gateway' => 'Pasarela creada correctamente',
  'deleted_gateway' => 'Pasarela eliminada correctamente',
  'pay_with_paypal' => 'PayPal',
  'pay_with_card' => 'Tarjeta de Crédito',

  'change_password' => 'Cambiar Contraseña',
  'current_password' => 'Contraseña Actual',
  'new_password' => 'Nueva Contraseña',
  'confirm_password' => 'Confirmar Contraseña',
  'password_error_incorrect' => 'La contraseña actual es incorrecta.',
  'password_error_invalid' => 'La nueva contraseña no es válida.',
  'updated_password' => 'Contraseña actualizada correctamente',

  'api_tokens' => 'API Tokens',
  'users_and_tokens' => 'Usuarios & Tokens',
  'account_login' => 'Iniciar Sesión',
  'recover_password' => 'Recuperar su contraseña',
  'forgot_password' => '¿Olvidaste tu contraseña?',
  'email_address' => 'Dirección de Email',
  'lets_go' => 'Acceder',
  'password_recovery' => 'Recuperar Contraseña',
  'send_email' => 'Enviar email',
  'set_password' => 'Establecer Contraseña',
  'converted' => 'Modificada',

//------Texto extraido -----------------------------------------------------------------------------------------

  '<i>Manual entry</i>' => '<i>Entrada Manual</i>',

 // Error
  'Whoops, looks like something went wrong.' => 'Vaya, parece que algo salió mal',
  'Sorry, the page you are looking for could not be found.' => 'Lo sentimos, la página que está buscando no se pudo encontrar.',

  'email_approved' => 'Email me when a quote is <b>approved</b>',
  'notification_quote_approved_subject' => 'Quote :invoice was approved by :client',
  'notification_quote_approved' => 'The following client :client approved Quote :invoice for :amount.',
  'resend_confirmation' => 'Resend confirmation email',
  'confirmation_resent' => 'The confirmation email was resent',

  'gateway_help_42' => ':link to sign up for BitPay.<br/>Note: use a Legacy API Key, not an API token.',
  'payment_type_credit_card' => 'Credit card',
  'payment_type_paypal' => 'PayPal',
  'payment_type_bitcoin' => 'Bitcoin',
  'knowledge_base' => 'Knowledge Base',
  'partial' => 'Partial',
  'partial_remaining' => ':partial of :balance',

  'more_fields' => 'More Fields',
  'less_fields' => 'Less Fields',
  'client_name' => 'Client Name',
  'pdf_settings' => 'PDF Settings',
  'utf8_invoices' => 'Cyrillic Support <sup>Beta</sup>',
  'product_settings' => 'Product Settings',
  'auto_wrap' => 'Auto Line Wrap',
  'duplicate_post' => 'Warning: the previous page was submitted twice. The second submission had been ignored.',
  'view_documentation' => 'View Documentation',
  'app_title' => 'Free Open-Source Online Invoicing',
  'app_description' => 'Invoice Ninja is a free, open-source solution for invoicing and billing customers. With Invoice Ninja, you can easily build and send beautiful invoices from any device that has access to the web. Your clients can print your invoices, download them as pdf files, and even pay you online from within the system.',
  
  'rows' => 'rows',
  'www' => 'www',
  'logo' => 'Logo',
  'subdomain' => 'Subdomain',
  'provide_name_or_email' => 'Please provide a contact name or email',
  'charts_and_reports' => 'Charts & Reports',
  'chart' => 'Chart',
  'report' => 'Report',
  'group_by' => 'Group by',
  'paid' => 'Paid',
  'enable_report' => 'Report',
  'enable_chart' => 'Chart',
  'totals' => 'Totals',
  'run' => 'Run',
  'export' => 'Export',
  'documentation' => 'Documentation',
  'zapier' => 'Zapier <sup>Beta</sup>',
  'recurring' => 'Recurring',
  'last_invoice_sent' => 'Last invoice sent :date',

  'processed_updates' => 'Successfully completed update',
  'tasks' => 'Tasks',
  'new_task' => 'New Task',
  'start_time' => 'Start Time',
  'created_task' => 'Successfully created task',
  'updated_task' => 'Successfully updated task',
  'edit_task' => 'Edit Task',
  'archive_task' => 'Archive Task',
  'restore_task' => 'Restore Task',
  'delete_task' => 'Delete Task',
  'stop_task' => 'Stop Task',
  'time' => 'Time',
  'start' => 'Start',
  'stop' => 'Stop',
  'now' => 'Now',
  'timer' => 'Timer',
  'manual' => 'Manual',
  'date_and_time' => 'Date & Time',
  'second' => 'second',
  'seconds' => 'seconds',
  'minute' => 'minute',
  'minutes' => 'minutes',
  'hour' => 'hour',
  'hours' => 'hours',
  'task_details' => 'Task Details',
  'duration' => 'Duration',
  'end_time' => 'End Time',
  'end' => 'End',
  'invoiced' => 'Invoiced',
  'logged' => 'Logged',
  'running' => 'Running',
  'task_error_multiple_clients' => 'The tasks can\'t belong to different clients',
  'task_error_running' => 'Please stop running tasks first',
  'task_error_invoiced' => 'Tasks have already been invoiced',
  'restored_task' => 'Successfully restored task',
  'archived_task' => 'Successfully archived task',
  'archived_tasks' => 'Successfully archived :count tasks',
  'deleted_task' => 'Successfully deleted task',
  'deleted_tasks' => 'Successfully deleted :count tasks',
  'create_task' => 'Create Task',
  'stopped_task' => 'Successfully stopped task',
  'invoice_task' => 'Invoice Task',
  'invoice_labels' => 'Invoice Labels',
  'prefix' => 'Prefix',
  'counter' => 'Counter',

  'payment_type_dwolla' => 'Dwolla',
  'gateway_help_43' => ':link to sign up for Dwolla.',
  'partial_value' => 'Must be greater than zero and less than the total',
  'more_actions' => 'More Actions',

  'pro_plan_title' => 'NINJA PRO',
  'pro_plan_call_to_action' => 'Upgrade Now!',
  'pro_plan_feature1' => 'Create Unlimited Clients',
  'pro_plan_feature2' => 'Access to 10 Beautiful Invoice Designs',
  'pro_plan_feature3' => 'Custom URLs - "YourBrand.InvoiceNinja.com"',
  'pro_plan_feature4' => 'Remove "Created by Invoice Ninja"',
  'pro_plan_feature5' => 'Multi-user Access & Activity Tracking',
  'pro_plan_feature6' => 'Create Quotes & Pro-forma Invoices',
  'pro_plan_feature7' => 'Customize Invoice Field Titles & Numbering',
  'pro_plan_feature8' => 'Option to Attach PDFs to Client Emails',

  'resume' => 'Resume',
  'break_duration' => 'Break',
  'edit_details' => 'Edit Details',
  'work' => 'Work',
  'timezone_unset' => 'Please :link to set your timezone',
  'click_here' => 'click here',



);