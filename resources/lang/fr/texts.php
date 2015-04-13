<?php 

return array(

  // client
  'organization' => 'Entreprise',
  'name' => 'Nom',
  'website' => 'Site web',
  'work_phone' => 'Téléphone',
  'address' => 'Adresse',
  'address1' => 'Rue',
  'address2' => 'Appt/Bâtiment',
  'city' => 'Ville',
  'state' => 'Région/Département',
  'postal_code' => 'Code Postal',
  'country_id' => 'Pays',
  'contacts' => 'Informations de contact', //if you speak about contact details
  'first_name' => 'Prénom',
  'last_name' => 'Nom',
  'phone' => 'Téléphone',
  'email' => 'Courriel',
  'additional_info' => 'Informations complémentaires',
  'payment_terms' => 'Conditions de paiement',
  'currency_id' => 'Devise',
  'size_id' => 'Taille',
  'industry_id' => 'Secteur', // literal translation : Industrie
  'private_notes' => 'Note personnelle',

  // invoice
  'invoice' => 'Facture',
  'client' => 'Client',
  'invoice_date' => 'Date de la facture',
  'due_date' => 'Date d\'échéance',
  'invoice_number' => 'Numéro de facture',
  'invoice_number_short' => 'Facture #',
  'po_number' => 'Numéro du bon de commande',
  'po_number_short' => 'Bon de commande #',
  'frequency_id' => 'Fréquence', 
  'discount' => 'Remise',
  'taxes' => 'Taxes',
  'tax' => 'Taxe',
  'item' => 'Article', 
  'description' => 'Description',
  'unit_cost' => 'Coût unitaire',
  'quantity' => 'Quantité',
  'line_total' => 'Total',
  'subtotal' => 'Total',
  'paid_to_date' => 'Versé à ce jour',//this one is not very used in France
  'balance_due' => 'Montant total',//can be "Montant à verser" or "Somme totale"
  'invoice_design_id' => 'Design', //if you speak about invoice's design -> "Modèle"
  'terms' => 'Conditions',
  'your_invoice' => 'Votre Facture',

  'remove_contact' => 'Supprimer un contact',
  'add_contact' => 'Ajouter un contact',
  'create_new_client' => 'Ajouter un nouveau client',
  'edit_client_details' => 'Modifier les informations du client',
  'enable' => 'Autoriser',
  'learn_more' => 'En savoir +',
  'manage_rates' => 'Gérer les taux',
  'note_to_client' => 'Commentaire pour le client',
  'invoice_terms' => 'Conditions de facturation',
  'save_as_default_terms' => 'Sauvegarder comme conditions par défaut',
  'download_pdf' => 'Télécharger le PDF',
  'pay_now' => 'Payer maintenant',
  'save_invoice' => 'Sauvegarder la facture',
  'clone_invoice' => 'Dupliquer la facture',
  'archive_invoice' => 'Archiver la facture',
  'delete_invoice' => 'Supprimer la facture',
  'email_invoice' => 'Envoyer la facture par courriel',
  'enter_payment' => 'Saisissez un paiement',
  'tax_rates' => 'Taux de taxe',
  'rate' => 'Taux',
  'settings' => 'Paramètres',
  'enable_invoice_tax' => 'Spécifier une <br>taxe pour la facture</b>',
  'enable_line_item_tax' => 'Spécifier une <b>taxe pour chaque ligne</b>',

  // navigation
  'dashboard' => 'Tableau de bord',
  'clients' => 'Clients',
  'invoices' => 'Factures',
  'payments' => 'Paiements',
  'credits' => 'Crédits',
  'history' => 'Historique',
  'search' => 'Rechercher',
  'sign_up' => 'S\'enregistrer',
  'guest' => 'Invité',
  'company_details' => 'Informations sur l\'entreprise',
  'online_payments' => 'Paiements en ligne',
  'notifications' => 'Notifications',
  'import_export' => 'Importer/Exporter',
  'done' => 'Valider',
  'save' => 'Sauvegarder',
  'create' => 'Créer',
  'upload' => 'Envoyer',
  'import' => 'Importer',
  'download' => 'Télécharger',
  'cancel' => 'Annuler',
  'close' => 'Fermer',
  'provide_email' => 'Veuillez renseigner une adresse courriel valide',
  'powered_by' => 'Propulsé par',
  'no_items' => 'Aucun élément',

  // recurring invoices
  'recurring_invoices' => 'Factures récurrentes',
  'recurring_help' => '<p>Envoyer automatiquement la même facture à vos clients de façon hebdomadaire, bimensuelle, mensuelle, trimestrielle ou annuelle.</p>
        <p>Utiliser :MONTH, :QUARTER ou :YEAR pour des dates dynamiques. Les opérations simples fonctionnent également, par exemple :MONTH-1.</p>
        <p>Exemples de variables dynamiques pour les factures:</p>
        <ul>
          <li>"Adhésion au club de gym pour le mois de :MONTH" => "Adhésion au club de gym pour le mois de Juillet"</li>
          <li>":YEAR+1 - abonnement annuel" => "2015 - abonnement annuel"</li>
          <li>"Acompte pour le :QUARTER+1" => "Acompte pour le Q2"</li>
        </ul>',

  // dashboard
  'in_total_revenue' => 'de bénéfice total',
  'billed_client' => 'client facturé',
  'billed_clients' => 'clients facturés',
  'active_client' => 'client actif',
  'active_clients' => 'clients actifs',  
  'invoices_past_due' => 'Date limite de paiement dépassée',
  'upcoming_invoices' => 'Factures à venir',
  'average_invoice' => 'Moyenne de facturation',
  
  // list pages
  'archive' => 'Archiver',
  'delete' => 'Supprimer',
  'archive_client' => 'Archiver ce client',
  'delete_client' => 'Supprimer ce client',
  'archive_payment' => 'Archiver ce paiement',
  'delete_payment' => 'Supprimer ce paiement',
  'archive_credit' => 'Archiver ce crédit',
  'delete_credit' => 'Supprimer ce crédit',
  'show_archived_deleted' => 'Afficher archivés/supprimés',
  'filter' => 'Filtrer',
  'new_client' => 'Nouveau Client',
  'new_invoice' => 'Nouvelle Facture',
  'new_payment' => 'Nouveau Paiement',
  'new_credit' => 'Nouveau Crédit',
  'contact' => 'Contact',
  'date_created' => 'Date de création',
  'last_login' => 'Dernière connexion',
  'balance' => 'Solde',
  'action' => 'Action',
  'status' => 'Statut',
  'invoice_total' => 'Montant Total',
  'frequency' => 'Fréquence',
  'start_date' => 'Date de début',
  'end_date' => 'Date de fin',
  'transaction_reference' => 'Référence de la transaction',
  'method' => 'Méthode',
  'payment_amount' => 'Montant du paiement',
  'payment_date' => 'Date du paiement',
  'credit_amount' => 'Montant du crédit',
  'credit_balance' => 'Solde du crédit',
  'credit_date' => 'Date de crédit',
  'empty_table' => 'Aucune donnée disponible dans la table',
  'select' => 'Sélectionner',
  'edit_client' => 'Éditer le Client',
  'edit_invoice' => 'Éditer la Facture',

  // client view page
  'create_invoice' => 'Créer une facture',
  'enter_credit' => 'Saisissez un crédit',
  'last_logged_in' => 'Dernière connexion',
  'details' => 'Détails',
  'standing' => 'En attente',
  'credit' => 'Crédit',
  'activity' => 'Activité',
  'date' => 'Date',
  'message' => 'Message',
  'adjustment' => 'Réglements',
  'are_you_sure' => 'Voulez-vous vraiment effectuer cette action ?',

  // payment pages
  'payment_type_id' => 'Type de paiement',
  'amount' => 'Montant',

  // account/company pages
  'work_email' => 'Courriel',
  'language_id' => 'Langage',
  'timezone_id' => 'Fuseau horaire',
  'date_format_id' => 'Format de la date',
  'datetime_format_id' => 'Format Date/Heure',
  'users' => 'Utilisateurs',
  'localization' => 'Localisation',
  'remove_logo' => 'Supprimer le logo',
  'logo_help' => 'Formats supportés: JPEG, GIF et PNG. Hauteur recommandé: 120px',
  'payment_gateway' => 'Passerelle de paiement',
  'gateway_id' => 'Fournisseur',
  'email_notifications' => 'Notifications par courriel',
  'email_sent' => 'm\'envoyer un courriel quand une facture est <b>envoyée</b>',
  'email_viewed' => 'm\'envoyer un courriel quand une facture est <b>vue</b>',
  'email_paid' => 'm\'envoyer un courriel quand une facture est <b>payée</b>',
  'site_updates' => 'Mises à jour du site',
  'custom_messages' => 'Messages personnalisés',
  'default_invoice_terms' => 'Définir comme les conditions par défaut',
  'default_email_footer' => 'Définir comme la signature de courriel par défaut',
  'import_clients' => 'Importer des données clients',
  'csv_file' => 'Sélectionner un fichier CSV',
  'export_clients' => 'Exporter des données clients',
  'select_file' => 'Veuillez sélectionner un fichier',
  'first_row_headers' => 'Utiliser la première ligne comme en-tête',
  'column' => 'Colonne',
  'sample' => 'Exemple',
  'import_to' => 'Importer en tant que',
  'client_will_create' => 'client sera créé',
  'clients_will_create' => 'clients seront créés',
  'email_settings' => 'Email Settings',
  'pdf_email_attachment' => 'Attach PDF to Emails',

  // application messages
  'created_client' => 'Client créé avec succès',
  'created_clients' => ':count clients créés ave csuccès',
  'updated_settings' => 'paramètres mis à jour avec succès',
  'removed_logo' => 'Logo supprimé avec succès',
  'sent_message' => 'Message envoyé avec succès',
  'invoice_error' => 'Veuillez vous assurer de sélectionner un client et de corriger les erreurs',
  'limit_clients' => 'Désolé, cela dépasse la limite de :count clients',
  'payment_error' => 'Il y a eu une erreur lors du traitement de votre paiement. Veuillez réessayer ultérieurement',
  'registration_required' => 'Veuillez vous enregistrer pour envoyer une facture par courriel',
  'confirmation_required' => 'Veuillez confirmer votre adresse courriel',

  'updated_client' => 'Client modifié avec succès',
  'created_client' => 'Client créé avec succès',
  'archived_client' => 'Client archivé avec succès',
  'archived_clients' => ':count clients archivés avec succès',
  'deleted_client' => 'Client supprimé avec succès',
  'deleted_clients' => ':count clients supprimés avec succès',

  'updated_invoice' => 'Facture modifiée avec succès',
  'created_invoice' => 'Facture créée avec succès',
  'cloned_invoice' => 'Facture dupliquée avec succès',
  'emailed_invoice' => 'Facture envoyée par courriel avec succès',
  'and_created_client' => 'et client créé',
  'archived_invoice' => 'Facture archivée avec succès',
  'archived_invoices' => ':count factures archivées avec succès',
  'deleted_invoice' => 'Facture supprimée avec succès',
  'deleted_invoices' => ':count factures supprimées avec succès',

  'created_payment' => 'Paiement créé avec succès',
  'archived_payment' => 'Paiement archivé avec succès',
  'archived_payments' => ':count paiement archivés avec succès',
  'deleted_payment' => 'Paiement supprimé avec succès',
  'deleted_payments' => ':count paiement supprimés avec succès',
  'applied_payment' => 'Paiement appliqué avec succès',

  'created_credit' => 'Crédit créé avec succès',
  'archived_credit' => 'Crédit archivé avec succès',
  'archived_credits' => ':count crédits archivés avec succès',
  'deleted_credit' => 'Crédit supprimé avec succès',
  'deleted_credits' => ':count crédits supprimés avec succès',

    // Emails
  'confirmation_subject' => 'Validation du compte invoice ninja',
  'confirmation_header' => 'Validation du compte',
  'confirmation_message' => 'Veuillez cliquer sur le lien ci-après pour valider votre compte.',
  'invoice_subject' => 'Nouvelle facture en provenance de :account',
  'invoice_message' => 'Pour voir votre facture de :amount, Cliquez sur le lien ci-après.',
  'payment_subject' => 'Paiement reçu',
  'payment_message' => 'Merci pour votre paiement d\'un montant de :amount',
  'email_salutation' => 'Cher :name,',
  'email_signature' => 'Cordialement,',
  'email_from' => 'L\'équipe InvoiceNinja',
  'user_email_footer' => 'Pour modifier vos paramètres de notification par courriel, veuillez visiter '.SITE_URL.'/company/notifications',
  'invoice_link_message' => 'Pour voir la facture de votre client cliquez sur le lien ci-après :',
  'notification_invoice_paid_subject' => 'La facture :invoice a été payée par le client :client',
  'notification_invoice_sent_subject' => 'La facture :invoice a été envoyée au client :client',
  'notification_invoice_viewed_subject' => 'La facture :invoice a été vue par le client :client',
  'notification_invoice_paid' => 'Un paiement de :amount a été effectué par le client :client concernant la facture :invoice.',
  'notification_invoice_sent' => 'Le client suivant :client a reçu par courriel la facture :invoice d\'un montant de :amount',
  'notification_invoice_viewed' => 'Le client suivant :client a vu la facture :invoice d\'un montant de :amount',
  'reset_password' => 'Vous pouvez réinitialiser votre mot de passe en cliquant sur le lien suivant :',
  'reset_password_footer' => 'Si vous n\'avez pas effectué de demande de réinitalisation de mot de passe veuillez contacter notre support :' . CONTACT_EMAIL,

  // Payment page
  'secure_payment' => 'Paiement sécurisé',
  'card_number' => 'Numéro de carte',
  'expiration_month' => 'Mois d\'expiration',  
  'expiration_year' => 'Année d\'expiration',
  'cvv' => 'CVV',

  // Security alerts
  'security' => array(
    'too_many_attempts' => 'Trop de tentatives. Essayez à nouveau dans quelques minutes.',
    'wrong_credentials' => 'Courriel ou mot de passe incorrect',
    'confirmation' => 'Votre compte a été validé !',
    'wrong_confirmation' => 'Code de confirmation incorrect.',
    'password_forgot' => 'Les informations de réinitialisation de votre mot de passe vous ont été envoyées par courriel.',
    'password_reset' => 'Votre mot de passe a été modifié avec succès.',
    'wrong_password_reset' => 'Mot de passe incorrect. Veuillez réessayer',
  ),

  // Pro Plan
  'pro_plan' => [
    'remove_logo' => ':link pour supprimer le logo Invoice Ninja en souscrivant au plan pro',
    'remove_logo_link' => 'Cliquez ici',
  ],

  'logout' => 'Se déconnecter',    
  'sign_up_to_save' => 'Connectez vous pour sauvegarder votre travail',  
  'agree_to_terms' =>'J\'accepte les conditions d\'utilisation d\'Invoice ninja :terms',
  'terms_of_service' => 'Conditions d\'utilisation',
  'email_taken' => 'L\'adresse courriel existe déjà',
  'working' => 'En cours',
  'success' => 'Succès',
  'success_message' => 'Inscription réussie avec succès. Veuillez cliquer sur le lien dans le courriel de confirmation de compte pour vérifier votre adresse courriel.',
  'erase_data' => 'Cela supprimera vos données de façon permanente.',
  'password' => 'Mot de passe',

  'pro_plan_product' => 'Plan Pro',
  'pro_plan_description' => 'Inscription d\'une durée d\'un an au Plan Pro d\'Invoice ninja',
  'pro_plan_success' => 'Merci pour votre inscription ! Une fois la facture réglée, votre adhésion au Plan Pro commencera.',

  'unsaved_changes' => 'Vous avez des modifications non enregistrées',
  'custom_fields' => 'Champs personnalisés',
  'company_fields' => 'Champs de société',
  'client_fields' => 'Champs client',
  'field_label' => 'Nom du champ',
  'field_value' => 'Valeur du champ',
  'edit' => 'Éditer',
  'view_as_recipient' => 'Voir en tant que destinataire',    

  // product management
  'product_library' => 'Inventaire',
  'product' => 'Produit',
  'products' => 'Produits',
  'fill_products' => 'Remplissage auto des produits',
  'fill_products_help' => 'La sélection d\'un produit entrainera la MAJ de <b>la description et du prix</b>',
  'update_products' => 'Mise à jour auto des produits',
  'update_products_help' => 'La mise à jour d\'une facture entraîne la <b>mise à jour des produits</b>',
  'create_product' => 'Nouveau produit',
  'edit_product' => 'Éditer Produit',
  'archive_product' => 'Archiver Produit',
  'updated_product' => 'Produit mis à jour',
  'created_product' => 'Produit créé',
  'archived_product' => 'Produit archivé',
  'pro_plan_custom_fields' => ':link pour activer les champs personnalisés en rejoingant le Plan Pro',

  'advanced_settings' => 'Paramètres avancés',
  'pro_plan_advanced_settings' => ':link pour activer les paramètres avancés en rejoingant le Plan Pro',
  'invoice_design' => 'Modèle de facture',
  'specify_colors' => 'Spécifiez les couleurs',
  'specify_colors_label' => 'Sélectionnez les couleurs utilisés dans les factures',

  'chart_builder' => 'Concepteur de graphiques',
  'ninja_email_footer' => 'Utilisez :site pour facturer vos clients et être payés en ligne gratuitement!',
  'go_pro' => 'Passez au Plan Pro',

  // Quotes
  'quote' => 'Devis',
  'quotes' => 'Devis',
  'quote_number' => 'Devis numéro',
  'quote_number_short' => 'Devis #',
  'quote_date' => 'Date du devis',
  'quote_total' => 'Montant du devis',
  'your_quote' => 'Votre devis',
  'total' => 'Total',
  'clone' => 'Dupliquer',

  'new_quote' => 'Nouveau devis',
  'create_quote' => 'Créer un devis',
  'edit_quote' => 'Éditer le devis',
  'archive_quote' => 'Archiver le devis',
  'delete_quote' => 'Supprimer le devis',
  'save_quote' => 'Enregistrer le devis',
  'email_quote' => 'Envoyer le devis par courriel',
  'clone_quote' => 'Dupliquer le devis',
  'convert_to_invoice' => 'Convertir en facture',
  'view_invoice' => 'Nouvelle facture',
  'view_quote' => 'Voir le devis',
  'view_client' => 'Voir le client',

  'updated_quote' => 'Devis mis à jour',
  'created_quote' => 'Devis créé',
  'cloned_quote' => 'Devis dupliqué avec succès',
  'emailed_quote' => 'Devis envoyé par courriel',
  'archived_quote' => 'Devis archivé',
  'archived_quotes' => ':count devis ont bien été archivés',
  'deleted_quote' => 'Devis supprimé',
  'deleted_quotes' => ':count devis ont bien été supprimés',
  'converted_to_invoice' => 'Le devis a bien été converti en facture',

  'quote_subject' => 'Nouveau devis de :account',
  'quote_message' => 'Pour visionner votre devis de :amount, cliquez sur le lien ci-dessous.',
  'quote_link_message' => 'Pour visionner votre soumission, cliquez sur le lien ci-dessous:',
  'notification_quote_sent_subject' => 'Le devis :invoice a été envoyé à :client',
  'notification_quote_viewed_subject' => 'Le devis :invoice a été visionné par :client',
  'notification_quote_sent' => 'Le devis :invoice de :amount a été envoyé au client :client.',
  'notification_quote_viewed' => 'Le devis :invoice de :amount a été visioné par le client :client.',  

  'session_expired' => 'Votre session a expiré.',

  'invoice_fields' => 'Champs de facture',
  'invoice_options' => 'Options de facturation',
  'hide_quantity' => 'Masquer la quantité',
  'hide_quantity_help' => 'Si la quantité de vos produits sont toujours 1, vous pouvez alors masquer la colonne "Quantité".',
  'hide_paid_to_date' => 'Masquer "Payé à ce jour"',
  'hide_paid_to_date_help' => 'Afficher seulement la ligne "Payé à ce jour"sur les factures pour lesquelles il y a au moins un paiement.',

  'charge_taxes' => 'Taxe supplémentaire',
  'user_management' => 'Gestion des utilisateurs',
  'add_user' => 'Ajouter utilisateur',
  'send_invite' => 'Envoyer invitation',
  'sent_invite' => 'Invitation envoyés',
  'updated_user' => 'Utilisateur mis à jour',
  'invitation_message' => 'Vous avez été invité par :invitor. ',
  'register_to_add_user' => 'Veuillez vous enregistrer pour ajouter un utilisateur',
  'user_state' => 'État',
  'edit_user' => 'Éditer l\'utilisateur',
  'delete_user' => 'Supprimer l\'utilisateur',
  'active' => 'Actif',
  'pending' => 'En attente',
  'deleted_user' => 'Utilisateur supprimé',
  'limit_users' => 'Désolé, ceci excédera la limite de ' . MAX_NUM_USERS . ' utilisateurs',

  'confirm_email_invoice' => 'Voulez-vous vraiment envoyer cette facture par courriel ?',
  'confirm_email_quote' => 'Voulez-vous vraiment envoyer ce devis par courriel ?',
  'confirm_recurring_email_invoice' => 'Les factures récurrentes sont activées, voulez-vous vraiment envoyer cette facture par courriel ?',

  'cancel_account' => 'Supprimer le compte',
  'cancel_account_message' => 'Attention: Ceci supprimera de façon permanente toutes vos données; cette action est irréversible.',
  'go_back' => 'Retour',

  'data_visualizations' => 'Visualisation des données',
  'sample_data' => 'Données fictives présentées',
  'hide' => 'Cacher',
  'new_version_available' => 'Une nouvelle version de :releases_link est disponible. Vous utilisez v:user_version, la plus récente est v:latest_version',
    

  'invoice_settings' => 'Paramètres des factures',
  'invoice_number_prefix' => 'Préfixe du numéro de facture',
  'invoice_number_counter' => 'Compteur du numéro de facture',
  'quote_number_prefix' => 'Préfixe du numéro de devis',
  'quote_number_counter' => 'Compteur du numéro de devis',
  'share_invoice_counter' => 'Partager le compteur de facture',
  'invoice_issued_to' => 'Facture destinée à',
  'invalid_counter' => 'Pour éviter un éventuel conflit, merci de définir un préfixe pour le numéro de facture ou pour le numéro de devis',
  'mark_sent' => 'Marquer comme envoyé',    

  'gateway_help_1' => ':link to sign up for Authorize.net.',
  'gateway_help_2' => ':link to sign up for Authorize.net.',
  'gateway_help_17' => ':link to get your PayPal API signature.',
  'gateway_help_23' => 'Note: use your secret API key, not your publishable API key.',
  'gateway_help_27' => ':link to sign up for TwoCheckout.',

  'more_designs' => 'Plus de modèles',
  'more_designs_title' => 'Modèles de factures additionnels',
  'more_designs_cloud_header' => 'Passez au Plan Pro pour plus de modèles',
  'more_designs_cloud_text' => '',
  'more_designs_self_host_header' => 'Obtenez 6 modèles de factures additionnels pour seulement '.INVOICE_DESIGNS_PRICE.'$',
  'more_designs_self_host_text' => '',
  'buy' => 'Acheter',
  'bought_designs' => 'Les nouveaux modèles ont été ajoutés avec succès',
  
  'sent' => 'envoyé',
  'timesheets' => 'Feuilles de temps',

  'payment_title' => 'Enter Your Billing Address and Credit Card information',
  'payment_cvv' => '*This is the 3-4 digit number onthe back of your card',
  'payment_footer1' => '*Billing address must match address associated with credit card.',
  'payment_footer2' => '*Please click "PAY NOW" only once - transaction may take up to 1 minute to process.',
  'vat_number' => 'Numéro de TVA',    

  'id_number' => 'Numéro ID',
  'white_label_link' => 'Marque blanche',
  'white_label_text' => 'Pour retirer la marque Invoice Ninja en haut de la page client, achetez un licence en marque blanche de '.WHITE_LABEL_PRICE.'$.',
  'white_label_header' => 'White Label',
  'bought_white_label' => 'Successfully enabled white label license',
  'white_labeled' => 'White labeled',

  'restore' => 'Restaurer',
  'restore_invoice' => 'Restaurer la facture',
  'restore_quote' => 'Restaurer le devis',
  'restore_client' => 'Restaurer le client',
  'restore_credit' => 'Restaurer le crédit',
  'restore_payment' => 'Restaurer le paiement',

  'restored_invoice' => 'Facture restaurée avec succès',
  'restored_quote' => 'Devis restauré avec succès',
  'restored_client' => 'Client restauré avec succès',
  'restored_payment' => 'Paiement restauré avec succès',
  'restored_credit' => 'Crédit restauré avec succès',

  'reason_for_canceling' => 'Aidez nous à améliorer notre site en nous disant pourquoi vous partez.',
  'discount_percent' => 'Pourcent',
  'discount_amount' => 'Montant',
  
  'invoice_history' => 'Historique des factures',
  'quote_history' => 'Historique des devis',
  'current_version' => 'Version courante',
  'select_versiony' => 'Choix de la verison',
  'view_history' => 'Consulter l\'historique',

  'edit_payment' => 'Edit Payment',
  'updated_payment' => 'Successfully updated payment',
  'deleted' => 'Deleted',
  'restore_user' => 'Restore User',
  'restored_user' => 'Successfully restored user',
  'show_deleted_users' => 'Show deleted users',
  'email_templates' => 'Email Templates',
  'invoice_email' => 'Invoice Email',
  'payment_email' => 'Payment Email',
  'quote_email' => 'Quote Email',
  'reset_all' => 'Reset All',
  'approve' => 'Approve',  

  'token_billing_type_id' => 'Token Billing',
  'token_billing_help' => 'Enables you to store credit cards with your gateway, and charge them at a later date.',
  'token_billing_1' => 'Disabled',
  'token_billing_2' => 'Opt-in - checkbox is shown but not selected',
  'token_billing_3' => 'Opt-out - checkbox is shown and selected',
  'token_billing_4' => 'Always',
  'token_billing_checkbox' => 'Store credit card details',
  'view_in_stripe' => 'View in Stripe',
  'use_card_on_file' => 'Use card on file',
  'edit_payment_details' => 'Edit payment details',
  'token_billing' => 'Save card details',
  'token_billing_secure' => 'The data is stored securely by :stripe_link',

  'support' => 'Support',
  'contact_information' => 'Contact information',
  '256_encryption' => '256-Bit Encryption',
  'amount_due' => 'Amount due',
  'billing_address' => 'Billing address',
  'billing_method' => 'Billing method',
  'order_overview' => 'Order overview',
  'match_address' => '*Address must match address associated with credit card.',
  'click_once' => '*Please click "PAY NOW" only once - transaction may take up to 1 minute to process.',
  
  'default_invoice_footer' => 'Set default invoice footer',
  'invoice_footer' => 'Invoice footer',
  'save_as_default_footer' => 'Save as default footer',

  'token_management' => 'Token Management',
  'tokens' => 'Tokens',
  'add_token' => 'Add Token',
  'show_deleted_tokens' => 'Show deleted tokens',
  'deleted_token' => 'Successfully deleted token',
  'created_token' => 'Successfully created token',
  'updated_token' => 'Successfully updated token',
  'edit_token' => 'Edit Token',
  'delete_token' => 'Delete Token',
  'token' => 'Token',

  'add_gateway' => 'Add Gateway',
  'delete_gateway' => 'Delete Gateway',
  'edit_gateway' => 'Edit Gateway',
  'updated_gateway' => 'Successfully updated gateway',
  'created_gateway' => 'Successfully created gateway',
  'deleted_gateway' => 'Successfully deleted gateway',
  'pay_with_paypal' => 'PayPal',
  'pay_with_card' => 'Credit card',

  'change_password' => 'Change password',
  'current_password' => 'Current password',
  'new_password' => 'New password',
  'confirm_password' => 'Confirm password',
  'password_error_incorrect' => 'The current password is incorrect.',
  'password_error_invalid' => 'The new password is invalid.',
  'updated_password' => 'Successfully updated password',

  'api_tokens' => 'API Tokens',
  'users_and_tokens' => 'Users & Tokens',
  'account_login' => 'Account Login',
  'recover_password' => 'Recover your password',
  'forgot_password' => 'Forgot your password?',
  'email_address' => 'Email address',
  'lets_go' => 'Let’s go',
  'password_recovery' => 'Password Recovery',
  'send_email' => 'Send email',
  'set_password' => 'Set Password',
  'converted' => 'Converted',

  'email_approved' => 'Email me when a quote is <b>approved</b>',
  'notification_quote_approved_subject' => 'Quote :invoice was approved by :client',
  'notification_quote_approved' => 'The following client :client approved Quote :invoice for :amount.',
  'resend_confirmation' => 'Resend confirmation email',
  'confirmation_resent' => 'The confirmation email was resent',
  

);