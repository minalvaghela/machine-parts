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
if (!isset($product_rpt))
	$product_rpt = new product_rpt();
if (isset($Page))
	$OldPage = $Page;
$Page = &$product_rpt;

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
<div id="ew-center" class="<?php echo $product_rpt->CenterContentClass ?>">
<?php } ?>
<!-- Summary Report begins -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="report_summary">
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
<div id="gmp_product" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->product_id->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="product_id"><div class="product_product_id"><span class="ew-table-header-caption"><?php echo $Page->product_id->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="product_id">
<?php if ($Page->sortUrl($Page->product_id) == "") { ?>
		<div class="ew-table-header-btn product_product_id">
			<span class="ew-table-header-caption"><?php echo $Page->product_id->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer product_product_id" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->product_id) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->product_id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->product_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->product_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->product_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="product_name"><div class="product_product_name"><span class="ew-table-header-caption"><?php echo $Page->product_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="product_name">
<?php if ($Page->sortUrl($Page->product_name) == "") { ?>
		<div class="ew-table-header-btn product_product_name">
			<span class="ew-table-header-caption"><?php echo $Page->product_name->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer product_product_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->product_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->product_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->product_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->product_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->price->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="price"><div class="product_price"><span class="ew-table-header-caption"><?php echo $Page->price->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="price">
<?php if ($Page->sortUrl($Page->price) == "") { ?>
		<div class="ew-table-header-btn product_price">
			<span class="ew-table-header-caption"><?php echo $Page->price->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer product_price" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->price) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->price->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->price->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->price->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->QOH->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="QOH"><div class="product_QOH"><span class="ew-table-header-caption"><?php echo $Page->QOH->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="QOH">
<?php if ($Page->sortUrl($Page->QOH) == "") { ?>
		<div class="ew-table-header-btn product_QOH">
			<span class="ew-table-header-caption"><?php echo $Page->QOH->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer product_QOH" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->QOH) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->QOH->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->QOH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->QOH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->product_category_product_category_id->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="product_category_product_category_id"><div class="product_product_category_product_category_id"><span class="ew-table-header-caption"><?php echo $Page->product_category_product_category_id->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="product_category_product_category_id">
<?php if ($Page->sortUrl($Page->product_category_product_category_id) == "") { ?>
		<div class="ew-table-header-btn product_product_category_product_category_id">
			<span class="ew-table-header-caption"><?php echo $Page->product_category_product_category_id->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer product_product_category_product_category_id" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->product_category_product_category_id) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->product_category_product_category_id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->product_category_product_category_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->product_category_product_category_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->No_of_freeservices->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="No_of_freeservices"><div class="product_No_of_freeservices"><span class="ew-table-header-caption"><?php echo $Page->No_of_freeservices->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="No_of_freeservices">
<?php if ($Page->sortUrl($Page->No_of_freeservices) == "") { ?>
		<div class="ew-table-header-btn product_No_of_freeservices">
			<span class="ew-table-header-caption"><?php echo $Page->No_of_freeservices->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer product_No_of_freeservices" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->No_of_freeservices) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->No_of_freeservices->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->No_of_freeservices->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->No_of_freeservices->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->product_image->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="product_image"><div class="product_product_image"><span class="ew-table-header-caption"><?php echo $Page->product_image->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="product_image">
<?php if ($Page->sortUrl($Page->product_image) == "") { ?>
		<div class="ew-table-header-btn product_product_image">
			<span class="ew-table-header-caption"><?php echo $Page->product_image->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer product_product_image" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->product_image) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->product_image->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->product_image->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->product_image->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
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
<?php if ($Page->product_id->Visible) { ?>
		<td data-field="product_id"<?php echo $Page->product_id->cellAttributes() ?>>
<span<?php echo $Page->product_id->viewAttributes() ?>><?php echo $Page->product_id->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->product_name->Visible) { ?>
		<td data-field="product_name"<?php echo $Page->product_name->cellAttributes() ?>>
<span<?php echo $Page->product_name->viewAttributes() ?>><?php echo $Page->product_name->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->price->Visible) { ?>
		<td data-field="price"<?php echo $Page->price->cellAttributes() ?>>
<span<?php echo $Page->price->viewAttributes() ?>><?php echo $Page->price->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->QOH->Visible) { ?>
		<td data-field="QOH"<?php echo $Page->QOH->cellAttributes() ?>>
<span<?php echo $Page->QOH->viewAttributes() ?>><?php echo $Page->QOH->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->product_category_product_category_id->Visible) { ?>
		<td data-field="product_category_product_category_id"<?php echo $Page->product_category_product_category_id->cellAttributes() ?>>
<span<?php echo $Page->product_category_product_category_id->viewAttributes() ?>><?php echo $Page->product_category_product_category_id->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->No_of_freeservices->Visible) { ?>
		<td data-field="No_of_freeservices"<?php echo $Page->No_of_freeservices->cellAttributes() ?>>
<span<?php echo $Page->No_of_freeservices->viewAttributes() ?>><?php echo $Page->No_of_freeservices->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->product_image->Visible) { ?>
		<td data-field="product_image"<?php echo $Page->product_image->cellAttributes() ?>>
<span<?php echo $Page->product_image->viewAttributes() ?>><?php echo $Page->product_image->getViewValue() ?></span></td>
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
<?php } elseif (!$Page->ShowHeader && FALSE) { // No header displayed ?>
<?php if ($Page->Export <> "pdf") { ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_product" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<?php } ?>
<?php if ($Page->TotalGroups > 0 || FALSE) { // Show footer ?>
</table>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php if ($Page->Export == "" && !($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php include "product_pager.php" ?>
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