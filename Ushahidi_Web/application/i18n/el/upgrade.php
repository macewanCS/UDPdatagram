<?php defined('SYSPATH') OR die('No direct access allowed.');
// DO NOT EDIT
// This file is automatically generated from the matching PO file
// Updates should be made through Transifex
// I18n generated at: 2013-03-11 07:56+0000
// PO revision date:  2013-01-21 18:31+0000
$lang = array(
	'upgrade' => array(
		'between' => 'Μη έγκυρη εισαγωγή δεδομένων. Μπορεί να είναι είτε 0 για ΟΧΙ, είτε 1 για ΝΑΙ.',
	) ,
	'upgrade_automatic' => 'Αυτόματη αναβάθμιση',
	'upgrade_available' => 'Διαθέσιμες ενημερώσεις.',
	'upgrade_continue_btn_text' => 'Συνέχεια',
	'upgrade_db_btn_text' => 'Αναβάθμιση',
	'upgrade_db_text_1' => 'Θα αναβαθμήσω την βάση δεδομένων σου από την έκδοση',
	'upgrade_db_text_2' => 'στην πιο πρόσφατη έκδοση',
	'upgrade_db_text_3' => 'Κάνε κλίκ στο κουμπί "Αναβάθμιση" και χαλάρωσε όσο κάνω τα υπόλοιπα.',
	'upgrade_db_text_4' => 'Ακόμα, αν θέλεις αντίγραφο ασφαλείας της βάσης δεδομένων σου, απλά τσέκαρε το παρακάτω κουτάκι και θα το κάνω για σένα στο λεπτό.',
	'upgrade_db_text_5' => 'Να φτιάξω αντίγραφο της βάσης δεδομένων πριν την αναβάθμιση; (<strong style="color:#FF0000;">Συστήνεται εμφατικά!</strong>)',
	'upgrade_db_title' => 'Αναβάθμιση της βάσης δεδομένων του Ushahidi',
	'upgrade_db_info' => 'Το Ushahidi αναβαθμίστηκε! Πριν συνεχίσεις, χρειάζεται να αναβαθμίσεις τη βάση δεδομένων στη νεότερη έκδοση (%s).',
	'upgrade_db_up_to_date' => 'Η βάση δεδομένων σου βρίσκεται στην τελευταία έκδοση.',
	'upgrade_failed' => 'Η αναβάθμιση απέτυχε στην πορεία',
	'upgrade_manual' => 'Χειροκίνητη αναβάθμιση',
	'upgrade_status' => 'Κατάσταση αναβάθμισης Ushahidi',
	'upgrade_text_1' => 'Οι παρακάτω οδηγίες αναλύουν πως να κάνεις χειροκίνητα την αναβάθμιση του Ushahidi σου!',
	'upgrade_text_2' => '<dl><dt><strong>Μεταφόρτωση</strong></dt>',
	'upgrade_text_3' => '<dd>-Μεταφόρτωσε την πιο πρόσφατη έκδοση του Ushahidi από',
	'upgrade_text_4' => 'dt><strong>Δημιουργία αντιγράφου ασφαλείας</strong></dt><dd>- .htaccess, ./applications/config/config.php, ./applications/config/database.php and ./applications/config/auth.php files. </dd><dd>- Σε περίπτωση που κάτι πάει στραβά, συστήνεται να κάνεις ένα πλήρες αντίγραφο ασφαλείας του Ushahidi σου.</dd><dt><strong>Αντιγραφή αρχείων</strong></dt><dd>- Εξαγωγή του μεταφορτωμένου συμπιεσμένου αρχείου</dd><dd>- Ανάλογα με το λειτουργικό σύστημα που τρέχει ο εξυπηρετητής web, χρησιμοποίησε το εργαλείο που προτιμάς (πχ Telnet, FPT, SSH) για να μπεις στον εξυπηρετητή και να αντικαταστήσεις το περιεχόμενο όλων των φακέλων με τα νεότερα αρχεία από την πρόσφατη αναβάθμιση.</dd><dt><strong>Αναβάθμιση βάσης δεδομένων</strong></dt><dd>- Πρώτα εντόπισε την έκδοση της βάσης δεδομένων σου κοιτάζοντας στην τιμή της μεταβλητής <strong>db_version</strong> στον πίνακα με τις ρυθμίσεις ή κοίτα στις πληροφορίες αναβάθμισης του Ushahidi στην κορυφή αυτής της σελίδας</dd><dd>- Εάν είσαι στην έκδοση 25, πρέπει να αναβαθμίσεις από τις 25-26, 26-27, 27-28 κλπ μέχρι το πιο πρόσφατο αρχείο SQL στο φάκελο <strong>/sql</strong>.</dd><dd>- Με το πρόγραμμα επεξεργασίας βάσης δεδομένων που επιθυμείς αναβάθμισε τη βάση δεδομένων εκτελώντας το κατάλληλο upgradex-x.sql αρχείο.</dd></dl>',
	'upgrade_tables' => '<strong>Βήμα 3:</strong> Κοίτα μέσα στο φάκελο <strong>sql</strong>. Εκτέλεσε χειροκίνητα το αρχείο upgrade<xx>-<xx>.sql ξεκινώντας από την τρέχουσα έκδοση της βδ της εγκατάστασής σου, μέχρι το τελικό αρχείο αναβάθμισης της sql.',
	'upgrade_text_5' => '<strong>Βήμα 4:</strong> Κάνε κλίκ στο κουμπί <strong>"Συνέχεια"</strong> για να αναβαθμίσεις τους απαραίτητους πίνακες.',
	'upgrade_text_6' => 'Για αυτόματη αναβάθμιση, πάτησε το παρακάτω κουμπί.',
	'upgrade_title_text' => 'Χρησιμοποιείς το Ushahidi v%1$s με έκδοση βάσης δεδομένων %2$d η οποία τρέχει σε %3$s',
	'upgrading' => 'Αναβαθμίζεται',
	'upgrade_ftp_text' => 'Για να συνεχίσεις με την εύκολη αναβάθμιση απαιτούνται οι ακόλουθες πληροφορίες για τον εξυπηρετητή FTP, πάνω στον οποίο φιλοξενείται το site σου.',
	'upgrade_ftp_hostname' => 'Όνομα διακομιστή FTP: <span>Παράδειγμα: "localhost"</span>',
	'upgrade_ftp_password' => 'FTP κωδικός πρόσβασης:',
	'upgrade_ftp_username' => 'FTP όνομα χρήστη:',
	'upgrade_status_info' => 'Έχετε την τελευταία έκδοση του Ushahidi.',
	'upgrade_status_info_2' => 'Δεν χρειάζεσαι αναβάθμιση.',
	'upgrade_db_version' => 'Έκδοση βάσης δεδομένων: %d',
	'upgrade_warning_software_version' => 'Προσοχή: η έκδοση λογισμικού στο version.php και στη βάση δεδομένων δεν είναι συμβατή.',
	'upgrade_warning_db_version' => 'Προσοχή: η έκδοση βάσης δεδομένων στο version.php και στη βάση δεδομένων δεν είναι συμβατή',
	'upgrade_database' => 'Βάση δεδομένων',
	'ushahidi_release_version' => 'Ushahidi %s',
	'beta' => 'BETA!',
	'download' => 'Μεταφορτώνεται η τελευταία έκδοση του ushahidi...',
	'log_file' => 'Μεγάλο αρχείο.',
	'successfully_downloaded' => 'Επιτυχής μεταφόρτωση. Αποσυμπιέζω...',
	'failed_downloading' => 'Αποτυχία μεταφόρτωσης.',
	'successfully_unpacked' => 'Επιτυχής αποσυμπίεση των αρχείων. Αντιγράφω τα αρχεία...',
	'failed_unpacking' => 'Απέτυχε η αποσυμπίεση.',
	'successfully_copied' => 'Επιτυχής αντιγραφή αρχείων. Αναβαθμίζω τη βάση δεδομένων...',
	'failed_copying' => 'Αποτυχία αντιγραφής αρχείων.',
	'backup_success' => 'Επιτυχής αναβάθμιση και αντιγραφή ασφαλείας της βάσης δεδομένων.',
	'backup_failed' => 'Αποτυχής αναβάθμιση της βάσης δεδομένων.',
	'dbupgrade_success' => 'Επιτυχής αναβάθμιση της βάσης δεδομένων.',
	'deleting_files' => 'Διαγραφή μεταφορτωμένων αρχείων...',
	'upgrade_success' => 'Η ΑΝΑΒΑΘΜΙΣΗ ΗΤΑΝ ΕΠΙΤΥΧΗΣ. Δες το <a href="%s" target="_blank">Αρχείο καταγραφής συμβάντων</a>',
);
