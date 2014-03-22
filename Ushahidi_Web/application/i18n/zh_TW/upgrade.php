<?php defined('SYSPATH') OR die('No direct access allowed.');
// DO NOT EDIT
// This file is automatically generated from the matching PO file
// Updates should be made through Transifex
// I18n generated at: 2012-12-09 06:11+0000
// PO revision date:  2012-08-20 02:59+0000
$lang = array(
	'upgrade' => array(
		'between' => '無效的輸入資料。0代表否，1代表是',
	) ,
	'upgrade_automatic' => '自動更新',
	'upgrade_available' => '可用的更新',
	'upgrade_continue_btn_text' => '繼續',
	'upgrade_db_btn_text' => '升級',
	'upgrade_db_text_1' => '我們將把您的數據庫從版本',
	'upgrade_db_text_2' => '升級至新的版本',
	'upgrade_db_text_3' => '點擊“升級”按鈕，在我們升級的過程中您可以放鬆一下。',
	'upgrade_db_text_4' => '如果您希望我們為您備份數據庫，只需要選中下面的可選框，就可以輕鬆備份了',
	'upgrade_db_text_5' => '更新前要備份資料庫嗎？ (<strong style="color:#FF0000;">強烈推薦</strong>)',
	'upgrade_db_title' => 'Ushahidi 資料庫更新',
	'upgrade_failed' => '升級失敗',
	'upgrade_manual' => '手動升級',
	'upgrade_status' => 'Ushahidi 升級狀態',
	'upgrade_text_1' => '下面的說明細節如何手動升級你的 Ushahidi 部署程序',
	'upgrade_text_2' => '<dl><dt><strong>下載</strong></dt>',
	'upgrade_text_3' => '<dd>- 下載最新的 Ushahidi，',
	'upgrade_text_4' => '<dt><strong>備份</strong></dt><dd>- .htaccess, ./applications/config/config.php, ./applications/config/database.php and ./applications/config/auth.php files. </dd><dd>- 只是以防萬一, 建議，整個備份 Ushahidi 當前的配置。</dd><dt><strong>複製文件</strong></dt><dd>- 解壓縮下載的文件</dd><dd>- 根据不同的服务器系统，使用您的首选工具/模式(例如 Telnet, FTP, SSH) 登錄到服務器和更換內容的所有文件夾與最新的構建。</dd><dt><strong>升級數據庫</strong></dt><dd>- 首先確定你的數據庫架構版本, 在配置表中的 <strong>db_version</strong> 值或在本頁面最上面查看Ushahidi升級信息。 </dd><dd>- 如果你的版本是version 25, 你需要從25-26, 26-27, 27-28 依次更新到最新的SQL <strong>/sql</strong> 目錄。</dd><dd>- 同時，數據庫客戶端也要通過執行upgradex-x.sql 文件更新。</dd></dl>',
	'upgrade_tables' => '<strong>步驟 3:</strong> 查看 <strong>sql</strong> 文件夾，手動運行 upgrade<xx>-<xx>.sql 文件開始從當前數據庫版本更新。',
	'upgrade_text_5' => '<strong>步驟 4:</strong> 點擊 <strong>"繼續"</strong> 按鈕更新所需要的數據表。',
	'upgrade_text_6' => '要自動更新，請點擊下面的按鈕。',
	'upgrading' => '正在升級',
	'upgrade_ftp_text' => '繼續簡易升級，要求提供登陸網站託管主機FTP服務器的下列信息，',
	'upgrade_ftp_hostname' => 'FTP 主機名: <span>Example: "localhost"</span>',
	'upgrade_ftp_password' => 'FTP 密碼:',
	'upgrade_ftp_username' => 'FTP 賬戶:',
	'upgrade_status_info' => '您已經更新到最新版本 Ushahidi。',
	'upgrade_db_version' => '數據庫版本: ',
	'upgrade_warning_software_version' => '警告：version.php中的軟件版本和數據庫版本不匹配。',
	'upgrade_warning_db_version' => '警告：version.php中的數據庫版本與數據庫不匹配',
	'upgrade_database' => '數據庫:',
);