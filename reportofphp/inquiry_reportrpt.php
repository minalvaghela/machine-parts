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
if (!isset($inquiry_report_rpt))
	$inquiry_report_rpt = new inquiry_report_rpt();
if (isset($Page))
	$OldPage = $Page;
$Page = &$inquiry_report_rpt;

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
var finquiry_reportrpt = currentForm = new ew.Form("finquiry_reportrpt");

// Validate method
finquiry_reportrpt.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj), elm;

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
finquiry_reportrpt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}
<?php if (CLIENT_VALIDATE) { ?>
finquiry_reportrpt.validateRequired = true; // Uses JavaScript validation
<?php } else { ?>
finquiry_reportrpt.validateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
finquiry_reportrpt.lists["x_user_id"] = <?php echo $inquiry_report_rpt->user_id->Lookup->toClientList() ?>;
finquiry_reportrpt.lists["x_user_id"].popupValues = <?php echo json_encode($inquiry_report_rpt->user_id->SelectionList) ?>;
finquiry_reportrpt.lists["x_user_id"].popupOptions = <?php echo JsonEncode($inquiry_report_rpt->user_id->popupOptions()) ?>;
finquiry_reportrpt.lists["x_user_id"].options = <?php echo JsonEncode($inquiry_report_rpt->user_id->lookupOptions()) ?>;
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
<div id="ew-center" class="<?php echo $inquiry_report_rpt->CenterContentClass ?>">
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
<form name="finquiry_reportrpt" id="finquiry_reportrpt" class="form-inline ew-form ew-ext-filter-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($Page->Filter <> "") ? " show" : " show"; ?>
<div id="finquiry_reportrpt-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ew-row d-sm-flex">
<div id="c_user_id" class="ew-cell form-group">
	<label for="x_user_id" class="ew-search-caption ew-label"><?php echo $Page->user_id->caption() ?></label>
	<span class="ew-search-field">
<?php $Page->user_id->EditAttrs["onchange"] = "ew.forms(this).submit(); " . @$Page->user_id->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="inquiry_report" data-field="x_user_id" data-value-separator="<?php echo $Page->user_id->displayValueSeparatorAttribute() ?>" id="x_user_id" name="x_user_id"<?php echo $Page->user_id->editAttributes() ?>>
		<?php echo $Page->user_id->selectOptionListHtml("x_user_id") ?>
	</select>
</div>
<?php echo $Page->user_id->Lookup->getParamTag("p_x_user_id") ?>
</span>
</div>
</div>
</div>
</form>
<script>
finquiry_reportrpt.filterList = <?php echo $Page->getFilterList() ?>;
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
<div id="gmp_inquiry_report" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->user_id->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="user_id"><div class="inquiry_report_user_id"><span class="ew-table-header-caption"><?php echo $Page->user_id->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="user_id">
<?php if ($Page->sortUrl($Page->user_id) == "") { ?>
		<div class="ew-table-header-btn inquiry_report_user_id">
			<span class="ew-table-header-caption"><?php echo $Page->user_id->caption() ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_user_id', form: 'finquiry_reportrpt', name: 'inquiry_report_user_id', range: false, from: '<?php echo $Page->user_id->RangeFrom; ?>', to: '<?php echo $Page->user_id->RangeTo; ?>' });" id="x_user_id<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer inquiry_report_user_id" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->user_id) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->user_id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->user_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->user_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_user_id', form: 'finquiry_reportrpt', name: 'inquiry_report_user_id', range: false, from: '<?php echo $Page->user_id->RangeFrom; ?>', to: '<?php echo $Page->user_id->RangeTo; ?>' });" id="x_user_id<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->date->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="date"><div class="inquiry_report_date"><span class="ew-table-header-caption"><?php echo $Page->date->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="date">
<?php if ($Page->sortUrl($Page->date) == "") { ?>
		<div class="ew-table-header-btn inquiry_report_date">
			<span class="ew-table-header-caption"><?php echo $Page->date->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer inquiry_report_date" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->date) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->date->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->discripation->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="discripation"><div class="inquiry_report_discripation"><span class="ew-table-header-caption"><?php echo $Page->discripation->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="discripation">
<?php if ($Page->sortUrl($Page->discripation) == "") { ?>
		<div class="ew-table-header-btn inquiry_report_discripation">
			<span class="ew-table-header-caption"><?php echo $Page->discripation->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer inquiry_report_discripation" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->discripation) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->discripation->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->discripation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->discripation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->product_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="product_name"><div class="inquiry_report_product_name"><span class="ew-table-header-caption"><?php echo $Page->product_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="product_name">
<?php if ($Page->sortUrl($Page->product_name) == "") { ?>
		<div class="ew-table-header-btn inquiry_report_product_name">
			<span class="ew-table-header-caption"><?php echo $Page->product_name->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer inquiry_report_product_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->product_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->product_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->product_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->product_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
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
<?php if ($Page->date->Visible) { ?>
		<td data-field="date"<?php echo $Page->date->cellAttributes() ?>>
<span<?php echo $Page->date->viewAttributes() ?>><?php echo $Page->date->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->discripation->Visible) { ?>
		<td data-field="discripation"<?php echo $Page->discripation->cellAttributes() ?>>
<span<?php echo $Page->discripation->viewAttributes() ?>><?php echo $Page->discripation->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->product_name->Visible) { ?>
		<td data-field="product_name"<?php echo $Page->product_name->cellAttributes() ?>>
<span<?php echo $Page->product_name->viewAttributes() ?>><?php echo $Page->product_name->getViewValue() ?></span></td>
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
<div id="gmp_inquiry_report" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
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
<?php include "inquiry_report_pager.php" ?>
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