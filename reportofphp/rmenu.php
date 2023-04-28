<?php
namespace PHPReportMaker12\project1;
?>
<?php
namespace PHPReportMaker12\project1;

// Menu Language
if ($Language && $Language->LanguageFolder == $LANGUAGE_FOLDER)
	$MenuLanguage = &$Language;
else
	$MenuLanguage = new Language();

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(1, "mi_feedback_report", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("1", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "feedback_reportrpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(2, "mi_inquiry_datewise", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("2", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "inquiry_datewiserpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(3, "mi_inquiry_report", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("3", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "inquiry_reportrpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(4, "mi_product_stock", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("4", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "product_stockrpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(5, "mi_production_datewise", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("5", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "production_datewiserpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(6, "mi_purchase_datewise", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("6", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "purchase_datewiserpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(7, "mi_purchase_return_report", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("7", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "purchase_return_reportrpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(9, "mi_rawmaterial_stock_reports", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("9", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "rawmaterial_stock_reportsrpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(10, "mi_sales_datewise", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("10", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "sales_datewiserpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(11, "mi_sales_report", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("11", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "sales_reportrpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(12, "mi_services_report", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("12", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "services_reportrpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(17, "mi_ratting_report", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("17", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "ratting_reportrpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
echo $sideMenu->toScript();
?>