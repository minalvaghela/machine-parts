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
if (!isset($sales_report_rpt))
	$sales_report_rpt = new sales_report_rpt();
if (isset($Page))
	$OldPage = $Page;
$Page = &$sales_report_rpt;

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
var fsales_reportrpt = currentForm = new ew.Form("fsales_reportrpt");

// Validate method
fsales_reportrpt.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj), elm;

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
fsales_reportrpt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}
<?php if (CLIENT_VALIDATE) { ?>
fsales_reportrpt.validateRequired = true; // Uses JavaScript validation
<?php } else { ?>
fsales_reportrpt.validateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
fsales_reportrpt.lists["x_user_id"] = <?php echo $sales_report_rpt->user_id->Lookup->toClientList() ?>;
fsales_reportrpt.lists["x_user_id"].popupValues = <?php echo json_encode($sales_report_rpt->user_id->SelectionList) ?>;
fsales_reportrpt.lists["x_user_id"].popupOptions = <?php echo JsonEncode($sales_report_rpt->user_id->popupOptions()) ?>;
fsales_reportrpt.lists["x_user_id"].options = <?php echo JsonEncode($sales_report_rpt->user_id->lookupOptions()) ?>;
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
<div id="ew-center" class="<?php echo $sales_report_rpt->CenterContentClass ?>">
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
<form name="fsales_reportrpt" id="fsales_reportrpt" class="form-inline ew-form ew-ext-filter-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($Page->Filter <> "") ? " show" : " show"; ?>
<div id="fsales_reportrpt-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ew-row d-sm-flex">
<div id="c_user_id" class="ew-cell form-group">
	<label for="x_user_id" class="ew-search-caption ew-label"><?php echo $Page->user_id->caption() ?></label>
	<span class="ew-search-field">
<?php $Page->user_id->EditAttrs["onchange"] = "ew.forms(this).submit(); " . @$Page->user_id->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="sales_report" data-field="x_user_id" data-value-separator="<?php echo $Page->user_id->displayValueSeparatorAttribute() ?>" id="x_user_id" name="x_user_id"<?php echo $Page->user_id->editAttributes() ?>>
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
fsales_reportrpt.filterList = <?php echo $Page->getFilterList() ?>;
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
<div id="gmp_sales_report" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
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
<center><h2><u>sales_Report</u></h2></center>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->user_id->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="user_id"><div class="sales_report_user_id"><span class="ew-table-header-caption"><?php echo $Page->user_id->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="user_id">
<?php if ($Page->sortUrl($Page->user_id) == "") { ?>
		<div class="ew-table-header-btn sales_report_user_id">
			<span class="ew-table-header-caption"><?php echo $Page->user_id->caption() ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_user_id', form: 'fsales_reportrpt', name: 'sales_report_user_id', range: false, from: '<?php echo $Page->user_id->RangeFrom; ?>', to: '<?php echo $Page->user_id->RangeTo; ?>' });" id="x_user_id<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer sales_report_user_id" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->user_id) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->user_id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->user_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->user_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_user_id', form: 'fsales_reportrpt', name: 'sales_report_user_id', range: false, from: '<?php echo $Page->user_id->RangeFrom; ?>', to: '<?php echo $Page->user_id->RangeTo; ?>' });" id="x_user_id<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->product_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="product_name"><div class="sales_report_product_name"><span class="ew-table-header-caption"><?php echo $Page->product_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="product_name">
<?php if ($Page->sortUrl($Page->product_name) == "") { ?>
		<div class="ew-table-header-btn sales_report_product_name">
			<span class="ew-table-header-caption"><?php echo $Page->product_name->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer sales_report_product_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->product_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->product_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->product_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->product_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->date->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="date"><div class="sales_report_date"><span class="ew-table-header-caption"><?php echo $Page->date->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="date">
<?php if ($Page->sortUrl($Page->date) == "") { ?>
		<div class="ew-table-header-btn sales_report_date">
			<span class="ew-table-header-caption"><?php echo $Page->date->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer sales_report_date" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->date) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->date->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->qty->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="qty"><div class="sales_report_qty"><span class="ew-table-header-caption"><?php echo $Page->qty->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="qty">
<?php if ($Page->sortUrl($Page->qty) == "") { ?>
		<div class="ew-table-header-btn sales_report_qty">
			<span class="ew-table-header-caption"><?php echo $Page->qty->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer sales_report_qty" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->qty) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->qty->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->qty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->qty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->price->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="price"><div class="sales_report_price"><span class="ew-table-header-caption"><?php echo $Page->price->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="price">
<?php if ($Page->sortUrl($Page->price) == "") { ?>
		<div class="ew-table-header-btn sales_report_price">
			<span class="ew-table-header-caption"><?php echo $Page->price->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer sales_report_price" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->price) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->price->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->price->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->price->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
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
<?php if ($Page->product_name->Visible) { ?>
		<td data-field="product_name"<?php echo $Page->product_name->cellAttributes() ?>>
<span<?php echo $Page->product_name->viewAttributes() ?>><?php echo $Page->product_name->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->date->Visible) { ?>
		<td data-field="date"<?php echo $Page->date->cellAttributes() ?>>
<span<?php echo $Page->date->viewAttributes() ?>><?php echo $Page->date->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->qty->Visible) { ?>
		<td data-field="qty"<?php echo $Page->qty->cellAttributes() ?>>
<span<?php echo $Page->qty->viewAttributes() ?>><?php echo $Page->qty->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->price->Visible) { ?>
		<td data-field="price"<?php echo $Page->price->cellAttributes() ?>>
<span<?php echo $Page->price->viewAttributes() ?>><?php echo $Page->price->getViewValue() ?></span></td>
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
<div id="gmp_sales_report" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
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
<?php include "sales_report_pager.php" ?>
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