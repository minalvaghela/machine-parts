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
if (!isset($production_datewise_rpt))
	$production_datewise_rpt = new production_datewise_rpt();
if (isset($Page))
	$OldPage = $Page;
$Page = &$production_datewise_rpt;

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
var fproduction_datewiserpt = currentForm = new ew.Form("fproduction_datewiserpt");

// Validate method
fproduction_datewiserpt.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj), elm;
		elm = this.getElements("x_date");
		if (elm && !ew.checkDateDef(elm.value)) {
			if (!this.onError(elm, "<?php echo JsEncode($Page->date->errorMessage()) ?>"))
				return false;
		}
		elm = this.getElements("y_date");
		if (elm && !ew.checkDateDef(elm.value)) {
			if (!this.onError(elm, "<?php echo JsEncode($Page->date->errorMessage()) ?>"))
				return false;
		}

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
fproduction_datewiserpt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}
<?php if (CLIENT_VALIDATE) { ?>
fproduction_datewiserpt.validateRequired = true; // Uses JavaScript validation
<?php } else { ?>
fproduction_datewiserpt.validateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
fproduction_datewiserpt.lists["x_product_name"] = <?php echo $production_datewise_rpt->product_name->Lookup->toClientList() ?>;
fproduction_datewiserpt.lists["x_product_name"].popupValues = <?php echo json_encode($production_datewise_rpt->product_name->SelectionList) ?>;
fproduction_datewiserpt.lists["x_product_name"].popupOptions = <?php echo JsonEncode($production_datewise_rpt->product_name->popupOptions()) ?>;
fproduction_datewiserpt.lists["x_product_name"].options = <?php echo JsonEncode($production_datewise_rpt->product_name->lookupOptions()) ?>;
fproduction_datewiserpt.lists["x_date"] = <?php echo $production_datewise_rpt->date->Lookup->toClientList() ?>;
fproduction_datewiserpt.lists["x_date"].popupValues = <?php echo json_encode($production_datewise_rpt->date->SelectionList) ?>;
fproduction_datewiserpt.lists["x_date"].popupOptions = <?php echo JsonEncode($production_datewise_rpt->date->popupOptions()) ?>;
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
<div id="ew-center" class="<?php echo $production_datewise_rpt->CenterContentClass ?>">
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
<form name="fproduction_datewiserpt" id="fproduction_datewiserpt" class="form-inline ew-form ew-ext-filter-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($Page->Filter <> "") ? " show" : " show"; ?>
<div id="fproduction_datewiserpt-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ew-row d-sm-flex">
<div id="c_product_name" class="ew-cell form-group">
	<label for="x_product_name" class="ew-search-caption ew-label"><?php echo $Page->product_name->caption() ?></label>
	<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="production_datewise" data-field="x_product_name" data-value-separator="<?php echo $Page->product_name->displayValueSeparatorAttribute() ?>" id="x_product_name" name="x_product_name"<?php echo $Page->product_name->editAttributes() ?>>
		<?php echo $Page->product_name->selectOptionListHtml("x_product_name") ?>
	</select>
</div>
<?php echo $Page->product_name->Lookup->getParamTag("p_x_product_name") ?>
</span>
</div>
</div>
<div id="r_2" class="ew-row d-sm-flex">
<div id="c_date" class="ew-cell form-group">
	<label for="x_date" class="ew-search-caption ew-label"><?php echo $Page->date->caption() ?></label>
	<span class="ew-search-operator"><?php echo $ReportLanguage->phrase("BETWEEN"); ?><input type="hidden" name="z_date" id="z_date" value="BETWEEN"></span>
	<span class="control-group ew-search-field">
<?php PrependClass($Page->date->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="production_datewise" data-field="x_date" id="x_date" name="x_date" maxlength="19" placeholder="<?php echo HtmlEncode($Page->date->getPlaceHolder()) ?>" value="<?php echo HtmlEncode($Page->date->AdvancedSearch->SearchValue) ?>"<?php echo $Page->date->editAttributes() ?>>
<?php if (!$production_datewise_base->date->ReadOnly && !$production_datewise_base->date->Disabled && !isset($production_datewise_base->date->EditAttrs["readonly"]) && !isset($production_datewise_base->date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fproduction_datewiserpt", "x_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	<span class="ew-search-cond btw1_date"><label><?php echo $ReportLanguage->Phrase("AND") ?></label></span>
	<span class="ew-search-field btw1_date">
<?php PrependClass($Page->date->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="production_datewise" data-field="x_date" id="y_date" name="y_date" maxlength="19" placeholder="<?php echo HtmlEncode($Page->date->getPlaceHolder()) ?>" value="<?php echo HtmlEncode($Page->date->AdvancedSearch->SearchValue2) ?>"<?php echo $Page->date->editAttributes() ?>>
<?php if (!$production_datewise_base->date->ReadOnly && !$production_datewise_base->date->Disabled && !isset($production_datewise_base->date->EditAttrs["readonly"]) && !isset($production_datewise_base->date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fproduction_datewiserpt", "y_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
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
fproduction_datewiserpt.filterList = <?php echo $Page->getFilterList() ?>;
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
<div id="gmp_production_datewise" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
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
<center><h2><u>production_Report</u></h2></center>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->product_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="product_name"><div class="production_datewise_product_name"><span class="ew-table-header-caption"><?php echo $Page->product_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="product_name">
<?php if ($Page->sortUrl($Page->product_name) == "") { ?>
		<div class="ew-table-header-btn production_datewise_product_name">
			<span class="ew-table-header-caption"><?php echo $Page->product_name->caption() ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_product_name', form: 'fproduction_datewiserpt', name: 'production_datewise_product_name', range: false, from: '<?php echo $Page->product_name->RangeFrom; ?>', to: '<?php echo $Page->product_name->RangeTo; ?>' });" id="x_product_name<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer production_datewise_product_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->product_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->product_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->product_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->product_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_product_name', form: 'fproduction_datewiserpt', name: 'production_datewise_product_name', range: false, from: '<?php echo $Page->product_name->RangeFrom; ?>', to: '<?php echo $Page->product_name->RangeTo; ?>' });" id="x_product_name<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->raw_material_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="raw_material_name"><div class="production_datewise_raw_material_name"><span class="ew-table-header-caption"><?php echo $Page->raw_material_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="raw_material_name">
<?php if ($Page->sortUrl($Page->raw_material_name) == "") { ?>
		<div class="ew-table-header-btn production_datewise_raw_material_name">
			<span class="ew-table-header-caption"><?php echo $Page->raw_material_name->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer production_datewise_raw_material_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->raw_material_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->raw_material_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->raw_material_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->raw_material_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->date->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="date"><div class="production_datewise_date"><span class="ew-table-header-caption"><?php echo $Page->date->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="date">
<?php if ($Page->sortUrl($Page->date) == "") { ?>
		<div class="ew-table-header-btn production_datewise_date">
			<span class="ew-table-header-caption"><?php echo $Page->date->caption() ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_date', form: 'fproduction_datewiserpt', name: 'production_datewise_date', range: false, from: '<?php echo $Page->date->RangeFrom; ?>', to: '<?php echo $Page->date->RangeTo; ?>' });" id="x_date<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer production_datewise_date" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->date) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->date->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_date', form: 'fproduction_datewiserpt', name: 'production_datewise_date', range: false, from: '<?php echo $Page->date->RangeFrom; ?>', to: '<?php echo $Page->date->RangeTo; ?>' });" id="x_date<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->rawmaterial_oty->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="rawmaterial_oty"><div class="production_datewise_rawmaterial_oty"><span class="ew-table-header-caption"><?php echo $Page->rawmaterial_oty->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="rawmaterial_oty">
<?php if ($Page->sortUrl($Page->rawmaterial_oty) == "") { ?>
		<div class="ew-table-header-btn production_datewise_rawmaterial_oty">
			<span class="ew-table-header-caption"><?php echo $Page->rawmaterial_oty->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer production_datewise_rawmaterial_oty" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->rawmaterial_oty) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->rawmaterial_oty->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->rawmaterial_oty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->rawmaterial_oty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
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
<?php if ($Page->product_name->Visible) { ?>
		<td data-field="product_name"<?php echo $Page->product_name->cellAttributes() ?>>
<span<?php echo $Page->product_name->viewAttributes() ?>><?php echo $Page->product_name->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->raw_material_name->Visible) { ?>
		<td data-field="raw_material_name"<?php echo $Page->raw_material_name->cellAttributes() ?>>
<span<?php echo $Page->raw_material_name->viewAttributes() ?>><?php echo $Page->raw_material_name->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->date->Visible) { ?>
		<td data-field="date"<?php echo $Page->date->cellAttributes() ?>>
<span<?php echo $Page->date->viewAttributes() ?>><?php echo $Page->date->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->rawmaterial_oty->Visible) { ?>
		<td data-field="rawmaterial_oty"<?php echo $Page->rawmaterial_oty->cellAttributes() ?>>
<span<?php echo $Page->rawmaterial_oty->viewAttributes() ?>><?php echo $Page->rawmaterial_oty->getViewValue() ?></span></td>
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
<div id="gmp_production_datewise" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
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
<?php include "production_datewise_pager.php" ?>
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