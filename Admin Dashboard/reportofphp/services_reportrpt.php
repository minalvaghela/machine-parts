<?php
namespace PHPReportMaker12\project1;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start();

// Autoload
include_once "rautoload.php";
?>
<?php

// Create page object
if (!isset($services_report_rpt))
	$services_report_rpt = new services_report_rpt();
if (isset($Page))
	$OldPage = $Page;
$Page = &$services_report_rpt;

// Run the page
$Page->run();

// Setup login status
SetClientVar("login", LoginStatus());
if (!$DashboardReport)
	WriteHeader(FALSE);

// Global Page Rendering event (in rusrfn*.php)
Page_Rendering();

// Page Rendering event
$Page->Page_Render();
?>
<?php if (!$DashboardReport) { ?>
<?php include_once "rheader.php" ?>
<?php } ?>
<?php if ($Page->Export == "" || $Page->Export == "print") { ?>
<script>
currentPageID = ew.PAGE_ID = "rpt"; // Page ID
</script>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Form object
var fservices_reportrpt = currentForm = new ew.Form("fservices_reportrpt");

// Validate method
fservices_reportrpt.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj), elm;

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
fservices_reportrpt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}
<?php if (CLIENT_VALIDATE) { ?>
fservices_reportrpt.validateRequired = true; // Uses JavaScript validation
<?php } else { ?>
fservices_reportrpt.validateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
fservices_reportrpt.lists["x_name"] = <?php echo $services_report_rpt->name->Lookup->toClientList() ?>;
fservices_reportrpt.lists["x_name"].popupValues = <?php echo json_encode($services_report_rpt->name->SelectionList) ?>;
fservices_reportrpt.lists["x_name"].popupOptions = <?php echo JsonEncode($services_report_rpt->name->popupOptions()) ?>;
</script>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<a id="top"></a>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<!-- Content Container -->
<div id="ew-container" class="container-fluid ew-container">
<?php } ?>
<?php if (ReportParam("showfilter") === TRUE) { ?>
<?php $Page->showFilterList(TRUE) ?>
<?php } ?>
<div class="btn-toolbar ew-toolbar">
<?php
if (!$Page->DrillDownInPanel) {
	$Page->ExportOptions->render("body");
	$Page->SearchOptions->render("body");
	$Page->FilterOptions->render("body");
	$Page->GenerateOptions->render("body");
}
?>
</div>
<?php $Page->showPageHeader(); ?>
<?php $Page->showMessage(); ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<div class="row">
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<!-- Center Container - Report -->
<div id="ew-center" class="<?php echo $services_report_rpt->CenterContentClass ?>">
<?php } ?>
<!-- Summary Report begins -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="report_summary">
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<!-- Search form (begin) -->
<?php

	// Render search row
	$Page->resetAttributes();
	$Page->RowType = ROWTYPE_SEARCH;
	$Page->renderRow();
?>
<form name="fservices_reportrpt" id="fservices_reportrpt" class="form-inline ew-form ew-ext-filter-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($Page->Filter <> "") ? " show" : " show"; ?>
<div id="fservices_reportrpt-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ew-row d-sm-flex">
<div id="c_name" class="ew-cell form-group">
	<label for="x_name" class="ew-search-caption ew-label"><?php echo $Page->name->caption() ?></label>
	<span class="ew-search-operator"><?php echo $ReportLanguage->phrase("="); ?><input type="hidden" name="z_name" id="z_name" value="="></span>
	<span class="control-group ew-search-field">
<?php PrependClass($Page->name->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="services_report" data-field="x_name" id="x_name" name="x_name" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($Page->name->getPlaceHolder()) ?>" value="<?php echo HtmlEncode($Page->name->AdvancedSearch->SearchValue) ?>"<?php echo $Page->name->editAttributes() ?>>
</span>
</div>
</div>
<div class="ew-row d-sm-flex">
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><?php echo $ReportLanguage->phrase("Search") ?></button>
<button type="reset" name="btn-reset" id="btn-reset" class="btn hide"><?php echo $ReportLanguage->phrase("Reset") ?></button>
</div>
</div>
</form>
<script>
fservices_reportrpt.filterList = <?php echo $Page->getFilterList() ?>;
</script>
<!-- Search form (end) -->
<?php } ?>
<?php if ($Page->ShowCurrentFilter) { ?>
<?php $Page->showFilterList() ?>
<?php } ?>
<?php

// Set the last group to display if not export all
if ($Page->ExportAll && $Page->Export <> "") {
	$Page->StopGroup = $Page->TotalGroups;
} else {
	$Page->StopGroup = $Page->StartGroup + $Page->DisplayGroups - 1;
}

// Stop group <= total number of groups
if (intval($Page->StopGroup) > intval($Page->TotalGroups))
	$Page->StopGroup = $Page->TotalGroups;
$Page->RecordCount = 0;
$Page->RecordIndex = 0;

// Get first row
if ($Page->TotalGroups > 0) {
	$Page->loadRowValues(TRUE);
	$Page->GroupCount = 1;
}
$Page->GroupIndexes = InitArray(2, -1);
$Page->GroupIndexes[0] = -1;
$Page->GroupIndexes[1] = $Page->StopGroup - $Page->StartGroup + 1;
while ($Page->Recordset && !$Page->Recordset->EOF && $Page->GroupCount <= $Page->DisplayGroups || $Page->ShowHeader) {

	// Show dummy header for custom template
	// Show header

	if ($Page->ShowHeader) {
?>
<?php if ($Page->Export <> "pdf") { ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_services_report" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<!---My code start--->
<img src="image/logo.png" alt="Luton" style="height: 80px;width: 115px;;margin-left: 3rem;margin-top: 0.3rem;">
<div style="margin-left: 15rem;margin-right:2.5rem;margin-top:-100px;margin-bottom:10px;">
<p>
<h2>Surya engineering</h2>
<br>
A-17,  Sarita Society Near Dimond Mill,Nikol Gam Road,Ahemedabad-382350(Guj.) <br>
Email: suryaeleinfo@gmail.com | Mo:+91 9825012146 <br></p>
<div style="margin-top:10px;margin-left:300px"><center>Date: <?php echo date("d-m-Y");?></center></div>
<br/>
</div>
<hr class="bg-dark">
<center><h2><u>service_Report</u></h2></center>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->user_id->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="user_id"><div class="services_report_user_id"><span class="ew-table-header-caption"><?php echo $Page->user_id->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="user_id">
<?php if ($Page->sortUrl($Page->user_id) == "") { ?>
		<div class="ew-table-header-btn services_report_user_id">
			<span class="ew-table-header-caption"><?php echo $Page->user_id->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer services_report_user_id" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->user_id) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->user_id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->user_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->user_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="name"><div class="services_report_name"><span class="ew-table-header-caption"><?php echo $Page->name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="name">
<?php if ($Page->sortUrl($Page->name) == "") { ?>
		<div class="ew-table-header-btn services_report_name">
			<span class="ew-table-header-caption"><?php echo $Page->name->caption() ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_name', form: 'fservices_reportrpt', name: 'services_report_name', range: false, from: '<?php echo $Page->name->RangeFrom; ?>', to: '<?php echo $Page->name->RangeTo; ?>' });" id="x_name<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer services_report_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_name', form: 'fservices_reportrpt', name: 'services_report_name', range: false, from: '<?php echo $Page->name->RangeFrom; ?>', to: '<?php echo $Page->name->RangeTo; ?>' });" id="x_name<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->datetime->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="datetime"><div class="services_report_datetime"><span class="ew-table-header-caption"><?php echo $Page->datetime->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="datetime">
<?php if ($Page->sortUrl($Page->datetime) == "") { ?>
		<div class="ew-table-header-btn services_report_datetime">
			<span class="ew-table-header-caption"><?php echo $Page->datetime->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer services_report_datetime" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->datetime) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->datetime->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->datetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->datetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->services_status->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="services_status"><div class="services_report_services_status"><span class="ew-table-header-caption"><?php echo $Page->services_status->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="services_status">
<?php if ($Page->sortUrl($Page->services_status) == "") { ?>
		<div class="ew-table-header-btn services_report_services_status">
			<span class="ew-table-header-caption"><?php echo $Page->services_status->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer services_report_services_status" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->services_status) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->services_status->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->services_status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->services_status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
	</tr>
</thead>
<tbody>
<?php
		if ($Page->TotalGroups == 0) break; // Show header only
		$Page->ShowHeader = FALSE;
	}
	$Page->RecordCount++;
	$Page->RecordIndex++;
?>
<?php

		// Render detail row
		$Page->resetAttributes();
		$Page->RowType = ROWTYPE_DETAIL;
		$Page->renderRow();
?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->user_id->Visible) { ?>
		<td data-field="user_id"<?php echo $Page->user_id->cellAttributes() ?>>
<span<?php echo $Page->user_id->viewAttributes() ?>><?php echo $Page->user_id->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->name->Visible) { ?>
		<td data-field="name"<?php echo $Page->name->cellAttributes() ?>>
<span<?php echo $Page->name->viewAttributes() ?>><?php echo $Page->name->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->datetime->Visible) { ?>
		<td data-field="datetime"<?php echo $Page->datetime->cellAttributes() ?>>
<span<?php echo $Page->datetime->viewAttributes() ?>><?php echo $Page->datetime->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->services_status->Visible) { ?>
		<td data-field="services_status"<?php echo $Page->services_status->cellAttributes() ?>>
<span<?php echo $Page->services_status->viewAttributes() ?>><?php echo $Page->services_status->getViewValue() ?></span></td>
<?php } ?>
	</tr>
<?php

		// Accumulate page summary
		$Page->accumulateSummary();

		// Get next record
		$Page->loadRowValues();
	$Page->GroupCount++;
} // End while
?>
<?php if ($Page->TotalGroups > 0) { ?>
</tbody>
<tfoot>
	</tfoot>
<?php } elseif (!$Page->ShowHeader && TRUE) { // No header displayed ?>
<?php if ($Page->Export <> "pdf") { ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_services_report" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<?php } ?>
<?php if ($Page->TotalGroups > 0 || TRUE) { // Show footer ?>
</table>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php if ($Page->Export == "" && !($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php include "services_report_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<!-- Summary Report Ends -->
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /#ew-center -->
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /.row -->
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /.ew-container -->
<?php } ?>
<?php
$Page->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php

// Close recordsets
if ($Page->GroupRecordset)
	$Page->GroupRecordset->Close();
if ($Page->Recordset)
	$Page->Recordset->Close();
?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Write your table-specific startup script here
// console.log("page loaded");

</script>
<?php } ?>
<?php if (!$DashboardReport) { ?>
<?php include_once "rfooter.php" ?>
<?php } ?>
<?php
$Page->terminate();
if (isset($OldPage))
	$Page = $OldPage;
?>